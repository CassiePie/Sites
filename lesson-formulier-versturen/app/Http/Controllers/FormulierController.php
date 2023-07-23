<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendSimpleFormMail;
use Illuminate\Support\Facades\Mail;

class FormulierController extends Controller
{
    public function formulier() {
        return view('formulieren.formulier');
    }
    public function verzenden(Request $request) {

        $request->validate([
            'naam' => 'required|min:10',
            'email' => 'required|email',
            'voorwaarden' => 'accepted'

        ]);

        // dd($request->all());
        Mail::to('ece.dupont@outlook.com')->send(new SendSimpleFormMail([
            'naam' => $request->naam,
            'email' => $request->email
        ]));
        return back();
    }
}
