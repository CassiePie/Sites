<?php

namespace App\Http\Controllers;

use App\Models\DiscountCode;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShoppingCartController extends Controller
{
    public function index() {
        // Pas de "cart-item" include file aan zodat de "$product->pivot->quantity" in de formuliervalue ingevuld wordt
        // en de size ook met "$product->pivot->size" afgedrukt wordt.
        // Zorg ervoor dat je de juiste velden bij de relatie in het User model meegeeft (zie documentatie)
        // https://laravel.com/docs/9.x/eloquent-relationships#retrieving-intermediate-table-columns
        // Zorg ook dat de prijs berekening in het "cart-item" klopt.


        // Zoek de producten van de ingelogde gebruiker op.
        $products = Auth::user()->cart;


        $shipping = 3.9;
        // DOE DE BEREKENING ALS LAATSTE STAP
        // Gebruik de "products" relatie op het user model (en gegevens de pivot table) om de producten te overlopen
        // en de volledige prijs van de winkelkar te berekenen.
        $subtotal = Auth::user()->cart->map(function($i) {
            return $i->price * $i->pivot->quantity;
        })->sum();

        // Berekend de verzendkosten van 3.9eur bij het totaal
        $total = $subtotal + $shipping;

        // BONUS: Als de kortingscode bestaat in de sessie, zoek deze op in de databank en pas de korting toe op de berekening.
        // De kortingscode kan je dan ook naar de view hieronder doorsturen.
        // In de index view hieronder kan je dan ook het stukje in commentaar code tonen met de juiste gegegevens.
        // Indien er al een code ingevuld is zet je de input in de discount-code view file op "disabled"
        $discountAmount = 0;
        $discountCode = false;
        if (session('discount')) {
            $discountCode = DiscountCode::find(session('discount'));
            $discountAmount = $total * ($discountCode->discount/100);
            $total = $total - $discountAmount;
        }

        return view('cart.index', [
            'products' => $products,
            'subtotal' => $subtotal,
            'total' => $total,
            'shipping' => $shipping,
            'discountCode' => $discountCode,
            'discountAmount' => $discountAmount
        ]);
    }

    public function add(Request $request, Product $product) {
        // "Attach" het product aan de ingelogde gebruiker
        // De size en quantity gegevens uit het formulier voeg je toe aan de "intermediate" table (zie documentatie link)
        // https://laravel.com/docs/9.x/eloquent-relationships#attaching-detaching

        $request->validate([
            'size' => 'required',
            'quantity' => 'required'
        ]);

        if(!Auth::user()->cart()->where('product_id', $product->id)->count()) {
            Auth::user()->cart()->attach($product->id, [
                'size' => $request->size,
                'quantity' => $request->quantity
            ]);
            return redirect()->route('cart');
        }

        return back()->with('message', 'Dit product is al in jouw winkelkarretje geplaatst');
    }

    public function delete(Product $product) {
        // "Detach" het product van de ingelogde gebruiker
        // https://laravel.com/docs/9.x/eloquent-relationships#attaching-detaching

        Auth::user()->cart()->detach($product->id);

        return redirect()->route('cart');
    }

    public function update(Request $request, Product $product) {
        // Update de gegevens van de pivot table met het product id
        // https://laravel.com/docs/9.x/eloquent-relationships#updating-a-record-on-the-intermediate-table

        $request->validate([
            'quantity' => 'required'
        ]);

        Auth::user()->cart()->updateExistingPivot($product->id, [
            'quantity' => $request->quantity
        ]);

        return redirect()->route('cart');
    }


    /**
     * BONUS
     */

    public function setDiscountCode(Request $request) {
        // Valideer het formulier (veld is verplicht) en vul het terug in bij foutmeldingen
        $request->validate([
            'code' => 'required'
        ]);

        // BONUS
        // Zoek de discount code in de databank op die het CODE veld uit de request
        $code = DiscountCode::where('code', $request->code)->first();

        if ($code) {
            // Als de discount code gevonden werd:
                // Save de discount code naar de sessie zodat je deze later kan gebruiken bij checkout
                // https://laravel.com/docs/9.x/session#storing-data
            $request->session()->put('discount', $code->id);

            return redirect()->route('cart');
        }

        // Als de discount code niet gevonden werd: ga terug met een foutmelding dat de code niet gevonden kon worden
        return back()->withErrors(['code' => 'Deze code kan niet toegepast worden.']);
    }

    public function removeDiscountCode(Request $request) {
        // Verwijder de discount code uit de sessie
        $request->session()->forget('discount');
        return back();
    }
}
