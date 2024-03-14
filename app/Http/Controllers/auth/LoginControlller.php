<?php

namespace App\Http\Controllers\auth;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class LoginControlller extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        // dd('Autenticando...');
        $this->validate($request, [
            'email'=> 'required|email',
            'password'=> 'required'
        ]);

        if(!auth()->attempt($request->only('email', 'password'))) {
            return back()->with('mensaje', 'Credenciales incorrectas');
        }

        return redirect()->route('posts.index');

    }   
}