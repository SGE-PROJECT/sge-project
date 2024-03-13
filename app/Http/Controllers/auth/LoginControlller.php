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
    $this->validate($request, [
        'email'=> 'required|email',
        'password'=> 'required'
    ]);

    if (auth()->attempt($request->only('email', 'password'))) {
        // Obtener el usuario autenticado
        $user = auth()->user();

        // Redireccionar según el rol del usuario
        if ($user->hasRole('Administrator')) {
            return redirect()->route('/projectsdash');
        } elseif ($user->hasRole('teacher')) {
            return redirect()->route('teacher.dashboard');
        } elseif ($user->hasRole('student')) {
            return redirect()->route('student.dashboard');
        } else {
            // Por defecto, redirecciona a una ruta común
            return redirect()->route('/empresas');
        }
    }

    return back()->with('mensaje', 'Credenciales incorrectas');
}

}