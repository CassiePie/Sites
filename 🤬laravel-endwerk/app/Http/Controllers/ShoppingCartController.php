<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\DiscountCode;
use Illuminate\Http\Request;
use App\Models\User;

class ShoppingCartController extends Controller
{
    public function index() {
        // Pas de "cart-item" include file aan zodat de "$product->pivot->quantity" in de formuliervalue ingevuld wordt
        // en de size ook met "$product->pivot->size" afgedrukt wordt.
        // Zorg ervoor dat je de juiste velden bij de relatie in het User model meegeeft (zie documentatie)
        // https://laravel.com/docs/9.x/eloquent-relationships#retrieving-intermediate-table-columns
        // Zorg ook dat de prijs berekening in het "cart-item" klopt.


        // Zoek de producten van de ingelogde gebruiker op.
        // $products = Product::take(4)->get();
        $user = User::find(auth()->id());
        $products = $user->products()->withPivot('quantity', 'size')->get();

        $shipping = 3.9;
        // DOE DE BEREKENING ALS LAATSTE STAP
        // Gebruik de "products" relatie op het user model (en gegevens de pivot table) om de producten te overlopen
        // en de volledige prijs van de winkelkar te berekenen.

        $subtotal = $products->sum(function ($product) {
            return $product->pivot->quantity * $product->price;
        });

        // Bereken de verzendkosten van 3.9eur bij het totaal
        $total = $subtotal + $shipping;

        // BONUS: Als de kortingscode bestaat in de sessie, zoek deze op in de databank en pas de korting toe op de berekening.
        // De kortingscode kan je dan ook naar de view hieronder doorsturen.
        // In de index view hieronder kan je dan ook het stukje in commentaar code tonen met de juiste gegegevens.
        // Indien er al een code ingevuld is zet je de input in de discount-code view file op "disabled"
        $discountAmount = 0;
        $discountCode = session()->get('discount.code');

        if ($discountCode) {
            $discount = DiscountCode::where('code', $discountCode)->first();
    
            if ($discount) {
                if ($discount->start_date <= now() && $discount->end_date >= now() && $discount->minimum_amount <= $subtotal) {
                    $discountAmount = $discount->calculateDiscount($subtotal);
                    $total -= $discountAmount;
                } else {
                    $discountCode = false;
                    session()->forget('discount.code');
                }
            } else {
                $discountCode = false;
                session()->forget('discount.code');
            }
        }
        
        
        return view('cart.index', [
            'products' => $products,
            'shipping' => $shipping,
            'subtotal' => $subtotal,
            'total' => $total,
            'discountCode' => $discountCode,
            'discountAmount' => $discountAmount
        ]);
    }

    public function add(Request $request, Product $product) {
        // Voeg een controle query in zodat je elk product_id maar 1 keer aan de cart kan toevoegen
        $user = User::find(auth()->id());
        $cartItem = $user->products()->where('product_id', $product->id)->first();

        if ($cartItem) {
            return redirect()->back()->with('error', 'This product is already in your cart.');
        }

        // "Attach" het product aan de ingelogde gebruiker
        // De size en quantity gegevens uit het formulier voeg je toe aan de "pivot" table (zie documentatie link)
        // https://laravel.com/docs/9.x/eloquent-relationships#attaching-detaching
        $size = $request->input('size');
        $quantity = $request->input('quantity');
        $user->products()->attach($product, ['size' => $size, 'quantity' => $quantity]);
    
        return redirect()->route('cart')->with('success', 'The product has been successfully added to your cart.');
    }
    

    public function delete(Product $product) {
        // "Detach" het product van de ingelogde gebruiker
        // https://laravel.com/docs/9.x/eloquent-relationships#attaching-detaching

        User::find(auth()->id())->products()->detach($product->id);

        return redirect()->route('cart');;

    }

    public function update(Request $request, Product $product) {
        // Update de gegevens van de pivot table met het product id
        // https://laravel.com/docs/9.x/eloquent-relationships#updating-a-record-on-the-intermediate-table
        
        $user = User::find(auth()->id());
        $cartItem = $user->products()->where('product_id', $product->id)->first();

        if (!$cartItem) {
            return redirect()->back()->with('error', 'Dit product is niet gevonden in je winkelkar.');
        }

        $cartItem->pivot->size = $request->input('size');
        $cartItem->pivot->quantity = $request->input('quantity');
        $cartItem->pivot->save();

        $discountCode = $request->input('discount_code');
        $discount = DiscountCode::where('code', $discountCode)->first();
        if (!$discount) {
            return redirect()->back()->with('error', 'De opgegeven kortingscode is niet gevonden.');
        }

        $request->session()->put('discount_code', $discount);

        return redirect()->route('cart')->with('success', 'Het product is succesvol bijgewerkt in je winkelkar.');
    }  

    /**
     * BONUS: DISCOUNTS
     */

    public function setDiscountCode(Request $request) {
        // Valideer het formulier (veld is verplicht) en vul het terug in bij foutmeldingen

        $validated = $request->validate([
            'code' => 'required'
        ]);

        $discount = DiscountCode::where('code', $validated['code'])->first();
        if ($discount) {
            session(['discount_code' => $validated['code']]);
        } else {
            return back()->withErrors(['code' => 'Invalid discount code']);
        }

        // BONUS
        // Zoek de discount code in de databank op die het CODE veld uit de request
        // Als de discount code gevonden werd:
            // Save de discount code naar de sessie zodat je deze later kan gebruiken bij checkout
            // https://laravel.com/docs/9.x/session#storing-data

        return redirect()->route('cart');

        // Als de discount code niet gevonden werd: ga terug met een foutmelding dat de code niet gevonden kon worden

    }

    public function removeDiscountCode() {
        // Verwijder de discount code uit de sessie
        session()->forget('discount_code');

        return back();
    }
}
