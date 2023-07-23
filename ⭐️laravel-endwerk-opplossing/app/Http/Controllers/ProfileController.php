<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function index() {
        // Pas de views aan zodat je de juiste item counts voor favorites en orders kunt tonen in de knoppen op de profiel pagina.
        // Dit doe je pas nadat je de favorites of orders gemaakt hebt.
        return view('profile.index');
    }

    public function edit() {
        // Vul het email adres van de ingelogde gebruiker in het formulier in

        return view('profile.edit');
    }

    public function updateEmail(Request $request) {
        // Valideer het formulier, zorg dat het terug ingevuld wordt, en toon de foutmeldingen
        // Emailadres is verplicht en moet uniek zijn (behalve voor het huidge id van de gebruiker).
        // https://laravel.com/docs/9.x/validation#rule-unique -> Forcing A Unique Rule To Ignore A Given ID
        $request->validate([
            'email' => [
                'required',
                Rule::unique('users')->ignore(Auth::id()),
            ]
        ]);

        // Update de gegevens van de ingelogde gebruiker
        Auth::user()->email = $request->email;
        Auth::user()->save();

        // BONUS: Stuur een e-mail naar de gebruiker met de melding dat zijn e-mailadres gewijzigd is.

        return redirect()->route('profile.edit');
    }

    public function updatePassword(Request $request) {
        // Valideer het formulier, zorg dat het terug ingevuld wordt, en toon de foutmeldingen
        // Wachtwoord is verplicht en moet confirmed zijn.
        $request->validate([
            'password' => 'required|confirmed',
        ]);


        // Update de gegevens van de ingelogde gebruiker met het nieuwe "hashed" password
        Auth::user()->password = Hash::make($request->password);
        Auth::user()->save();

        // BONUS: Stuur een e-mail naar de gebruiker met de melding dat zijn wachtwoord gewijzigd is.

        return redirect()->route('profile.edit');
    }
}
