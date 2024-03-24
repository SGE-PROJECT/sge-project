<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redirect;

class LogoutController extends Controller
{
    public function store(Request $request)
    {
        // Cerrar sesión del usuario
        Auth::logout();

        // Invalidar la sesión actual
        $request->session()->invalidate();

        // Regenerar el token CSRF
        $request->session()->regenerateToken();

        // Limpiar la cookie de sesión
        Cookie::forget('laravel_session');

        // Flush de la sesión para eliminar cualquier variable de sesión residual
        Session::flush();

        // Obtener el nombre de la cookie remember_me
        $rememberMeCookie = Auth::getRecallerName();

        // Olvidar la cookie remember_me
        $cookie = Cookie::forget($rememberMeCookie);

        // Asociar la cookie con la redirección
        return Redirect::to('/')->withCookie($cookie);
    }
}
