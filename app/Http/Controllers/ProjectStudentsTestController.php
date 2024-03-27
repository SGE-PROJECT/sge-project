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
        $project = ProjectsTest::findOrFail($projectId);
        $students = $project->hasStudents()->with('student')->get()->map(function ($proyectStudentTest) {
            return $proyectStudentTest->student;
        });
        
        return response()->json($students);
    }
}
