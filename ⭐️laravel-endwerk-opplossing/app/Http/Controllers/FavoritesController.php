<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoritesController extends Controller
{
    public function favorites() {
        // Zoek enkel de favoriete producten van de ingelogde gebruiker op
        $favorites = Auth::user()->favorites;
        return view('profile.favorites', ['products' => $favorites]);
    }

    public function toggleFavorite(Product $product) {
        // Toggle het product id op de "favorites" relatie van de ingelogde user.
        // https://laravel.com/docs/9.x/eloquent-relationships#toggling-associations

        Auth::user()->favorites()->toggle([$product->id]);

        return back();
    }
}
