<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function login() {
        // dd('showLoginForm method called');        
        return view('auth.login');
    }

    public function handleLogin(Request $request) 
{
    $credentials = $request->only('username', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        return redirect()->intended('/posts');
    }

    return back()->withErrors([
        'username' => 'The provided credentials do not match our records.',
    ]);
}

    
    public function register() {
        return view('auth.register');
    }

    public function handleRegister(Request $request) 
    {
        // dd('handleRegister method called', $request->all());

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // dd('validation passed', $request->all());

        $user = new User([
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);
        $user->save();

        Auth::login($user);

        return redirect()->route('posts.index');
    }

    public function logout(Request $request) 
    {

        Auth::logout();
    
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect()->route('login.get')->with('success', 'You have been logged out successfully!');
    }
    
}

