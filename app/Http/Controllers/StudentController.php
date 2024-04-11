<?php

namespace App\Http\Controllers;

use App\Models\AdvisorySession;
use App\Models\Project;
use App\Models\ProjectStudent;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;


class StudentController extends Controller
{
    public function index() {
        $slug = Auth::user()->slug;
        $user = User::where('slug', $slug)->firstOrFail();
        if (!$user->hasRole('Estudiante')) {
            abort(404);
        }
        $student = $user->student;
        if (!$student) {
            abort(404);
        }

        $academicAdvisor = $student->academicAdvisor;

        if (!$academicAdvisor) {
            $advisor = false;
            return view('home.student', compact('advisor'));
        } else {
            $advisor = true;
            $advisorUserId = $academicAdvisor->user_id;

            $activeStudents = $academicAdvisor->students()->whereHas('user', function ($query) use ($slug) {
                $query->where('users.slug', $slug);
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
            });
            $Projects = $student->projects()->get();
            foreach ($Projects as $project) {
                $project->image = 'avatar.jpg';
                $project->name = $project->name_project;
                $project->description = $project->general_objective;
            }



            $Project = $student->projects()->first();
            $AcademicAdvisor = $student->academicAdvisor()->first();

            return view('home.student', compact('sessions', 'sessionsThisWeek', 'Projects','Project', 'AcademicAdvisor', 'advisor'));
        }


        

    }
    public function showProfile($userId)
    {
        $user = User::findOrFail($userId);
        
        $student = $user->student;
    
        return view('profile.student', compact('student'));
    }

    public function showAdviserProfile($userId)
{
    $user = User::findOrFail($userId);
    
    $academicAdvisor = $user->academicAdvisor;

    if ($academicAdvisor) {
        return view('profile.adviser', compact('academicAdvisor'));
    }
    
    abort(404);
}

    
}


