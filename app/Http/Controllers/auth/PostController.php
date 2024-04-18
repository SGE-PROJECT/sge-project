<?php

namespace App\Http\Controllers\auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $role = optional($user->roles->first())->name;
        switch ($role) {
            case 'Super Administrador':
                return redirect()->route('Dashboard-Anteproyectos');
            case 'Administrador de División':
                return redirect()->route('Division-Anteproyectos');
            case 'Asesor Académico':
                $adviserId = $user->slug;
                return redirect()->route('home.advisor');
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
                return redirect('/perfil');
        }
    }
}
