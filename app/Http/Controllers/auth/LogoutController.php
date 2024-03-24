<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;

class LogoutController extends Controller
{
    public function store(Request $request)
    {
        Auth::logout(); // Cerrar sesión del usuario
        
        $request->session()->invalidate(); // Invalidar la sesión actual
        $request->session()->regenerateToken(); // Regenerar el token CSRF

        Cookie::forget('laravel_session'); // Limpiar la cookie de sesión

        return redirect()->route('login'); // Redirigir al usuario a la página de inicio de sesión
    }
}
