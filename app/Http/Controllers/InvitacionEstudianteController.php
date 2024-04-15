<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;

class InvitacionEstudianteController extends Controller
{
    public function enviarInvitacion(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre_estudiante' => 'required|string',
            'email_estudiante' => 'required|email',
            'project_id' => 'required|exists:projects,id',
        ]);

        // Obtener los datos del formulario
        $nombreEstudiante = $request->input('nombre_estudiante');
        $correoEstudiante = $request->input('email_estudiante');
        $projectId = $request->input('project_id');

        // Verificar si el estudiante existe
        $estudiante = User::where('name', $nombreEstudiante)
                             ->orWhere('email', $correoEstudiante)
                             ->first();

        // Si el estudiante no existe, mostrar mensaje de error
        if (!$estudiante) {
            return redirect()->back()->with('error', 'El estudiante no existe.');
        }

        // Verificar si el estudiante tiene asociado un proyecto con "is_project" igual a 1
        $existingProject = $estudiante->student->projects()->where('is_project', 1)->first();
        if ($existingProject) {
            return redirect()->back()->with('error', 'El estudiante ya tiene un proyecto.');
        }



        // Obtener el proyecto actual
        $proyecto = Project::find($projectId);

        // Verificar si el proyecto existe
        if (!$proyecto) {
            return redirect()->back()->with('error', 'El proyecto no existe.');
        }

        // Asociar el estudiante al proyecto
        $proyecto->students()->attach($estudiante->student->id);

        // Redireccionar de vuelta a la vista del proyecto con un mensaje de éxito
        return redirect()->back()->with('success', 'Estudiante invitado al proyecto exitosamente.');
    }
}
