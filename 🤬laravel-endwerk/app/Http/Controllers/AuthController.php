<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login() 
    {
        if (Auth::check()) {
            return redirect()->route('profile');
        }
        return view('auth.login');
    }

    public function handleLogin(Request $request) 
    {
        // Valideer het formulier
        // Elk veld is verplicht
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Schrijf de aanmeld logica om in te loggen.
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Als je ingelogd bent stuur je de bezoeker door naar de intented "profile" route (zie hieronder)
            return redirect()->intended(route('profile'));
        } else {
            // Als je gegevens fout zijn stuur je terug naar het formulier met
            // een melding voor het email veld dat de gegevens niet correct zijn.
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }
    }

    public function register() {
        if (Auth::check()) {
            return redirect()->route('profile');
        }
        return view('auth.register');
    }

    public function handleRegister(Request $request) {
        // dd('handleRegister method is being called');
        // dd($request->all());

        // Valideer het formulier.
        // Elk veld is verplicht / Wachtwoord en confirmatie moeten overeen komen / Email adres moet uniek zijn
        // Bewaar een nieuwe gebruiker in de databank met een beveiligd wachtwoord.
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8',
        ]);


        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->save();
        // dd($validatedData);
        
        $user->save();

        // BONUS: Verstuur een email naar de gebruiker waarin staat dat er een nieuwe account geregistreerd is voor de gebruiker.
        
        // dd($user);
        return redirect()->route('login');
        // dd($validatedData);
    }

    public function logout(Request $request) {
        // Gebruiker moet uitloggen
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return back();

    }
}
