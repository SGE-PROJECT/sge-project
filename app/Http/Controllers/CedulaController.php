<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;

class CedulaController extends Controller
{
    public function cedula()
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
            'title' => 'Cédula de Anteproyecto de Estadía',
            'student' => $student,
            'project' => $project,
        ];
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('exports.cedula', $data);
        return $pdf->stream('Cédula_Anteproyecto_' . $student->user->name . '.pdf');
    }
}
