<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;

class AprobacionController extends Controller
{
    public function aprobar()
    {
        $student = Auth::user()->student;
        $project = $student->projects()->first();

        if (!$student) {
            abort(404);
        }

        $data = [
            'title' => 'CARTA DE APROBACIÓN DE MEMORIA',
            'student' => $student,
            'project' => $project
        ];

        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('exports.aprobacion', $data);
        return $pdf->stream();
    }
}
