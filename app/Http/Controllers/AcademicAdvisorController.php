<?php

namespace App\Http\Controllers;

use App\Models\AcademicAdvisor;
use App\Models\Project;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AcademicAdvisorController extends Controller
{
    public function index()
    {
        $slug = Auth::user()->slug;
        $user = User::where('slug', $slug)->firstOrFail();
        if (!$user->hasRole('Asesor Académico')) {
            abort(404);
        }

        $academicAdvisor = $user->academicAdvisor;
        $getIdAdvisor = AcademicAdvisor::where('user_id', auth()->user()->id)->first();
        $getStudents = Student::where('academic_advisor_id', $getIdAdvisor->id)->get();

        $students = $academicAdvisor->students()->with('user')->whereHas('user', function ($query) {$query->where('isActive', true);})->get();
        $studentIds = $students->pluck('id');

        $Projects = collect();

        foreach ($students as $student) {
            $projects = $student->projects;
            $Projects = $Projects->merge($projects);
        }

        $Projects = $Projects->unique('id');

        foreach ($Projects as $project) {
            $project->students = $project->students()->pluck('students.id')->toArray();
            $project->image = 'avatar.jpg';
            $project->name = $project->name_project;
            $project->description = $project->general_objective;
            $project->students = $project->students()->whereIn('students.id', $studentIds)->pluck('students.id')->toArray();
        }


        return view('home.academic-advisor', compact('getStudents', 'Projects'));
    }
}
