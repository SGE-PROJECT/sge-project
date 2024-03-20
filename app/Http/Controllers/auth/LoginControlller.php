<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class LoginControlller extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        // Hacemos la validación manual
        $request->validate([
            'email' => 'required|email', // Capamos que email sea requerido y deba ser un correo electrónico 
            'password' => 'required' // Requerimos el password
        ]);

        $credentials = $request->only('email', 'password'); // Obtenemos las credenciales del formulario

        if (Auth::attempt($credentials)) { // Intentamos autenticar al usuario en el if 
            // En caso de que la autenticación sea exitosa
            $user = Auth::user(); // Obtenemos al usuario autenticado
            $role = optional($user->roles->first())->name; // Obtenemos el nombre del rol del usuario

            // Comenzamos a redireccionar según el rol del usuario, con el switch, una maravilla
            switch ($role) {
                case 'SuperAdmin':
                    return redirect()->route('posts.index'); // Nos redirecciona al dashboard general
                    break;
                case 'ManagmentAdmin':
                    return redirect('/perfil'); //Ese slash es provisional, solo hay que poner la ruta verdadera 
                    break;
                case 'Adviser':
                    return redirect('/notificaciones');
                    break;
                case 'Student':
                    return redirect('/asesorias');
                    break;
                case 'President':
                    return redirect('/notificaciones');
                    break;
                case 'Secretary': 
                    return redirect('/proyectos');
                    break;
                
                default:
                    // Si el usuario no tiene un rol, lo redirige a una página predeterminada
                    return redirect('/proyectos'); //Ese slash es provisional, solo hay que poner la ruta verdadera 
            }  //Lo único que hay que hacer es seguir con el switch para seguir redireccionando 
        } else {
            //Si la autenticación falla
            return back()->with('error', 'Credenciales incorrectas.');
        }
    }
}
