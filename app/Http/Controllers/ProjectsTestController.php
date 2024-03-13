<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProjectsTest;

class ProjectsTestController extends Controller
{
    public function index()
    {
        $projects = ProjectsTest::with('hasStudents.student')->get()->map(function ($project) {
            // Inicializa el arreglo de IDs de estudiantes para este proyecto
            $studentIds = [];

            // Itera sobre cada asociación ProyectStudentTest para este proyecto
            foreach ($project->hasStudents as $proyectStudent) {
                // Asumiendo que 'student' es el nombre de la relación en ProyectStudentTest que apunta a UsersTest
                $studentIds[] = $proyectStudent->student->id; // Agrega el ID del estudiante al arreglo
            }

            // Agrega el arreglo de IDs de estudiantes como una propiedad del proyecto
            $project->student_ids = $studentIds;

            return $project;
        });

        return response()->json($projects);
    }
}

