<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    public function checkout() {
        return view('orders.checkout');
    }

    public function store(Request $request) {
        // Valideer het formulier zodat alle velden verplicht zijn.
        // Vul het formulier terug in, en toon de foutmeldingen.
        $validated = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'street' => 'required|string',
            'house_number' => 'required|string',
            'postcode' => 'required|string',
            'residence' => 'required|string',
        ]);

        $user = User::findOrFail(auth()->id());
        // Maak een nieuw "order" met de gegevens uit het formulier in de databank
        // Zorg ervoor dat hett order gekoppeld is aan de ingelogde gebruiker.
        $order = new Order([
            'user_id' => auth()->id(),
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'street' => $validated['street'],
            'house_number' => $validated['house_number'],
            'postcode' => $validated['postcode'],
            'residence' => $validated['residence'],
        ]);

        // Zoek alle producten op die gekoppeld zijn aan de ingelogde gebruiker (shopping cart)
        if (Auth::check()) {
            $user = Auth::user();
            $products = $user->products;
            
            // Overloop alle gekoppelde producten van een user (shopping cart)
            foreach ($products as $product) {
                // Attach het product, met bijhorende quantity en size, aan het order
                // https://laravel.com/docs/9.x/eloquent-relationships#retrieving-intermediate-table-columns
                // Detach tegelijk het product van de ingelogde gebruiker zodat de shopping cart terug leeg wordt
                $order->products()->attach($product->id, [
                    'quantity' => $product->pivot->quantity,
                    'size' => $product->pivot->size,
                ]);
                $product->users()->detach(Auth::user()->id);
                    
                return view('cart.index', compact('products'));
            }
            $products = collect();
            return view('cart.index', compact('products'));
        }
        
        // BONUS: Als er een discount code in de sessie zit koppel je deze aan het discount_code_id in het order model
        // Verwijder nadien ook de discount code uit de sessie
        if ($request->session()->has('discount_code')) {
            $order->discount_code_id = $request->session()->get('discount_code')->id;
            $order->save();
            $request->session()->forget('discount_code');
        }


        // BONUS: Stuur een e-mail naar de gebruiker met de melding dat zijn bestelling gelukt is,
        // samen met een knop of link naar de show pagina van het order


        // Redirect naar de show pagina van het order en pas de functie daar aan
        return redirect()->route('orders.show', 1);
    }

    public function index() 
    {
        // Zoek alle orders van de ingelogde gebruiker op. Vervang de "range" hieronder met de juiste code
        // $orders = range(0,1);
        $user_id = auth()->id();
        $orders = Order::where('user_id', $user_id)->get();
            // Pas de views aan zodat de juiste info van een order getoond word in de "order" include file
            return view('orders.index', [
                'orders' => $orders
            ]);
    }

    public function show($id) { // Order $order
        // Beveilig het order met een GATE zodat je enkel jouw eigen orders kunt bekijken.
        $order = Order::findOrFail($id);
        $this->authorize('view', $order);
        // In de URL wordt het id van een order verstuurd. Zoek het order uit de url op.
        // Zoek de bijbehorende producten van het order hieronder op.
        
        // $products = Product::take(4)->get();
        $products = $order->products;

        // Geef de juiste data door aan de view
        // Pas de "order-item" include file aan zodat de gegevens van het order juist getoond worden in de website
        return view('orders.show', [
            'order' => $order,
            'products' => $products
        ]);
    }
}
