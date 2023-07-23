<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;




class ProfileController extends Controller
{
    public function index()
    {
        // Pas de views aan zodat je de juiste item counts kunt tonen in de knoppen op de profiel pagina.
        // dd(auth()->user());
        $user = User::find(Auth::id());

        $favoritesCount = $user->favorites()->count();
        $cartCount = $user->cart()->sum('quantity');

        return view('profile.index', [
            'favoritesCount' => $favoritesCount,
            'cartCount' => $cartCount,
        ]);
    }

    public function edit()
    {
        // Vul het email adres van de ingelogde gebruiker in het formulier in
        $user = User::find(Auth::id());
        return view('profile.edit', ['email' => $user->email]);

    }

    public function updateEmail(Request $request)
    {
        $user = User::find(Auth::id());

        // Valideer het formulier, zorg dat het terug ingevuld wordt, en toon de foutmeldingen
        // Emailadres is verplicht en moet uniek zijn (behalve voor het huidge id van de gebruiker).
        // https://laravel.com/docs/9.x/validation#rule-unique -> Forcing A Unique Rule To Ignore A Given ID
        // Update de gegevens van de ingelogde gebruiker

        $request->validate([
            'email' => 'required|email|unique:users,email,' . auth()->id()
        ]);

        
        $user->email = $request->email;
        $user->save();

        // BONUS: Stuur een e-mail naar de gebruiker met de melding dat zijn e-mailadres gewijzigd is.
       
        return redirect()->route('profile.edit');
    }

    public function updatePassword(Request $request)
    {
        // Valideer het formulier, zorg dat het terug ingevuld wordt, en toon de foutmeldingen
        // Wachtwoord is verplicht en moet confirmed zijn.
        // Update de gegevens van de ingelogde gebruiker met het nieuwe "hashed" password
        $request->validate([
            'password' => ['required', 'confirmed'],
        ]);
    
        $user = User::find(Auth::id());
        $user->password = Hash::make($request->password);
        $user->save();

    
        // BONUS: Stuur een e-mail naar de gebruiker met de melding dat zijn wachtwoord gewijzigd is.
    
        return redirect()->route('profile.edit');
    
    }
}
