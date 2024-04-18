<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('auth.recoverPassword');
    }

    public function sendPassword(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $user = User::where('email', $request->email)->first();

        if ($user) {
            $newPassword = Str::random(10); // Generar una nueva contraseña aleatoria
            $user->password = Hash::make($newPassword); // Hashear la nueva contraseña antes de asignarla

            // Guardar la nueva contraseña en la base de datos
            $user->save();

            // Enviar la contraseña por correo electrónico
            Mail::raw('Aquí está tu contraseña temporal, cámbiala luego de ingresar: ' . $newPassword, function ($message) use ($request) {
                $message->to($request->email)->subject('Cambio de contraseña');
            });

            return back()->with('status', 'La nueva contraseña ha sido enviada a tu correo electrónico.');
        } else {
            return back()->withErrors(['email' => 'No se encontró ninguna cuenta asociada a este correo electrónico.']);
        }

        // Redirigir al usuario al login
        return redirect()->route('Iniciar-sesion');

    }
}
