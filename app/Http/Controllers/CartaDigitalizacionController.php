<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;

class CartaDigitalizacionController extends Controller
{
    public function digitalizacion()
    {
        if (!Auth::user()->hasRole('Estudiante')) {
            abort(404, 'El usuario no tiene permisos para acceder a esta página.');
        }
        $student = Auth::user()->student;
        if (!$student) {
            abort(404, 'No se encontró un estudiante asociado a este usuario.');
        }
        $project = $student->projects()->first();
        $data = [
            'title' => 'Carta de Digitalización',
            'student' => $student,
            'project' => $project,
        ];
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('exports.carta-digitalizacion', $data);
        return $pdf->stream('Carta_Digitalizacion_' . $student->user->name . '.pdf');
    }
}
