<?php

namespace App\Http\Controllers;

use App\Models\DiscountCode;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class OrdersController extends Controller
{
    public function checkout() {
        return view('orders.checkout');
    }

    public function store(Request $request) {
        // Valideer het formulier zodat alle velden verplicht zijn.
        // Vul het formulier terug in, en toon de foutmeldingen.
        $request->validate([
            'voornaam' => 'required',
            'achternaam' => 'required',
            'straat' => 'required',
            'huisnummer' => 'required',
            'postcode' => 'required',
            'woonplaats' => 'required'
        ]);

        // Maak een nieuw "order" met de gegevens uit het formulier in de databank
        // Zorg ervoor dat het order gekoppeld is aan de ingelogde gebruiker.
        $order = new Order();
        $order->voornaam = $request->voornaam;
        $order->achternaam = $request->achternaam;
        $order->straat = $request->straat;
        $order->huisnummer = $request->huisnummer;
        $order->postcode = $request->postcode;
        $order->woonplaats = $request->woonplaats;
        $order->user_id = Auth::id();

        // BONUS: Als er een discount code in de sessie zit koppel je deze aan het discount_code_id in het order model
        // Verwijder nadien ook de discount code uit de sessie
        if(session('discount')) {
            $order->discount_code_id = session('discount');
            session()->forget('discount');
        }

        $order->save();

        // Zoek alle producten op die gekoppeld zijn aan de ingelogde gebruiker (shopping cart)
        // Overloop alle gekoppelde producten van een user (shopping cart)
        foreach(Auth::user()->cart as $product) {
            // Attach het product, met bijhorende quantity en size, aan het order
            // https://laravel.com/docs/9.x/eloquent-relationships#retrieving-intermediate-table-columns
            $order->products()->attach($product->id, [
                'quantity' => $product->pivot->quantity,
                'size' => $product->pivot->size,
            ]);
        }
        // Detach tegelijk het product van de ingelogde gebruiker zodat de shopping cart terug leeg wordt
        Auth::user()->cart()->detach();

        // BONUS: Stuur een e-mail naar de gebruiker met de melding dat zijn bestelling gelukt is,
        // samen met een knop of link naar de show pagina van het order


        // Pas het ID hier aan naar de net aangemaakte Order
        // Redirect naar de show pagina van het order en pas de functie daar aan
        return redirect()->route('orders.show', $order);
    }

    public function index() {
        // Zoek alle orders van de ingelogde gebruiker op
        $orders = Auth::user()->orders;

        // Pas de views aan zodat de juiste info van een order getoond word in de "order" include file
        return view('orders.index', [
            'orders' => $orders
        ]);
    }

    public function show(Order $order) { // Order $order
        // Beveilig het order met een GATE zodat je enkel jouw eigen orders kunt bekijken.
        if (! Gate::allows('show-order', $order)) {
            return redirect()->route('orders.index');
        }

        // In de URL wordt het id van een order verstuurd. Zoek het order uit de url op.
        // Zoek de bijbehorende producten van het order hieronder op.
        $products = $order->products;

        // Geef de juiste data door aan de view
        // Pas de "order-item" include file aan zodat de gegevens van het order juist getoond worden in de website
        return view('orders.show', [
            'order' => $order,
            'products' => $products
        ]);
    }
}
