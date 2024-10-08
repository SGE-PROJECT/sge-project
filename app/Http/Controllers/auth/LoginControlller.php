<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;
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
                case 'Super Administrador':
                    return redirect()->route('Dashboard-Anteproyectos'); // Nos redirecciona al dashboard general

                case 'Administrador de División':
                    return redirect()->route('Division-Anteproyectos'); //Ese slash es provisional, solo hay que poner la ruta verdadera

                case 'Asesor Académico':
                    $adviserId = $user->slug;
                    return redirect()->route('home.advisor');

                    // return redirect("/asesorias/{$adviserId}");

                case 'Estudiante':
                    $studentId = $user->id;
                    $advisor = $user->student->sanction_advisor;
                    $company = $user->student->sanction_company;
                    $advisorNumber = intval($advisor);
                    $companyNumber = intval($company);
                    if($advisorNumber > 2 && $companyNumber > 2){
                        Auth::logout();
                        $request->session()->invalidate();
                        $request->session()->regenerateToken();
                        Cookie::forget('laravel_session');
                        Session::flush();
                        $rememberMeCookie = Auth::getRecallerName();
                        $cookie = Cookie::forget($rememberMeCookie);
                        return redirect("/Iniciar-sesion")->with('success', 'Haz alcanzado el limite de sanciones lamentablemente ya no se te permite ingresar al sistema.');
                    }
                    return redirect()->route('home');


                case 'Presidente Académico':
                    return redirect()->route('Dashboard-Anteproyectos'); // Nos redirecciona al dashboard general

                case 'Asistente de Dirección':
                    return redirect('/libros');


                default:
                    // Si el usuario no tiene un rol, lo redirige a una página predeterminada
                    return redirect('/perfil'); //Ese slash es provisional, solo hay que poner la ruta verdadera
            }  //Lo único que hay que hacer es seguir con el switch para seguir redireccionando
        } else {
            //Si la autenticación falla
            return back()->with('error', 'Credenciales incorrectas.');
        }
    }
}
