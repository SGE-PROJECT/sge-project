<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectsTest;
use App\Models\UsersTest;

class ProjectStudentsTestController extends Controller
{
    /**
     * Display a listing of the students belonging to a specific project.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($projectId)
    {
        // Encuentra el proyecto por su ID
        $project = ProjectsTest::findOrFail($projectId);
        
        // Carga los estudiantes asociados a través de la relación hasMany en ProyectStudentTest
        $students = $project->hasStudents()->with('student')->get()->map(function ($proyectStudentTest) {
            // Devuelve solo los datos del estudiante, no el modelo pivote
            return $proyectStudentTest->student;
        });

        // Retorna los estudiantes como JSON
        return response()->json($students);
    }
}
