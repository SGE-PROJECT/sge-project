<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProjectsTest;

class ProjectsTestController extends Controller
{
    public function index() {
        $projects = ProjectsTest::with('hasStudents.student')->get()->map(function ($project) {
            $studentIds = [];
            foreach ($project->hasStudents as $proyectStudent) {
                $studentIds[] = $proyectStudent->student->id;
            }
            $project->student_ids = $studentIds;
            return $project;
        });

        return response()->json($projects);
    }
}

