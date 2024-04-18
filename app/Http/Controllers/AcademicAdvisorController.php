<?php

namespace App\Http\Controllers;

use App\Models\AcademicAdvisor;
use App\Models\AdvisorySession;
use App\Models\Project;
use App\Models\Student;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AcademicAdvisorController extends Controller
{

public function getAdvisorsByDivision($divisionId)
{
    $advisors = AcademicAdvisor::with('user') 
                        ->where('division_id', $divisionId)
                        ->get();

    return response()->json($advisors);
}

    

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

        $students = $academicAdvisor->students()->with('user')->whereHas('user', function ($query) {
            $query->where('isActive', true);
        })->get();
        $studentIds = $students->pluck('id');

        $Projects = collect();

        foreach ($students as $student) {
            $projects = $student->projects;
            $Projects = $Projects->merge($projects);
        }

        $Projects = $Projects->unique('id');

        foreach ($Projects as $project) {
            $estudiantes = $project->students()->whereIn('students.id', $studentIds)->get();
            $estudiante = $estudiantes->first();
            $project->students = $project->students()->pluck('students.id')->toArray();
            $project->image = $estudiante->user->photo;
            $project->name = $project->name_project;
            $project->description = $project->general_objective;
            $project->students = $project->students()->whereIn('students.id', $studentIds)->pluck('students.id')->toArray();
        }

        $allStudents = $students->map(function ($student, $key) {
            $colores = ["verde", "amarillo", "morado", "azul", "rosa"];
            $colorIndex = $key % count($colores);
            $student->avatar = $student->user->photo;
            $student->name = $student->user->name;
            $student->color = $colores[$colorIndex];
            return $student;
        });

        $activeStudents = $academicAdvisor->students()->whereHas('user', function ($query) {
            $query->where('isActive', true);
        })->get();

        $projectIds = $activeStudents->flatMap(function ($student) {
            return $student->projects->pluck('id');
        })->unique();

        $sessions = AdvisorySession::with(['proyect'])
            ->whereIn('id_project_id', $projectIds)
            ->where('session_date', '>', now())
            ->get();

        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();

        $sessionsThisWeek = $sessions->filter(function ($session) use ($startOfWeek, $endOfWeek) {
            $sessionDate = Carbon::parse($session->session_date);
            return $sessionDate->between($startOfWeek, $endOfWeek);
        })->values()->map(function ($session) {
            $sessionDateTime = Carbon::parse($session->session_date);
            $session->date_only = $sessionDateTime->toDateString();
            $session->time_only = $sessionDateTime->toTimeString();
            return $session;
        });


        return view('home.academic-advisor', compact('getStudents', 'Projects', 'sessionsThisWeek', 'academicAdvisor', 'activeStudents', 'sessions', 'allStudents'));
    }
}
