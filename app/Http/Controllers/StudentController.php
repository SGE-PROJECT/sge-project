<?php

namespace App\Http\Controllers;

use App\Models\AdvisorySession;
use App\Models\Project;
use App\Models\ProjectStudent;
use App\Models\Student;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function index()
    {
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

            $students = $academicAdvisor->students()->with('user')->whereHas('user', function ($query) {
                $query->where('isActive', true);
            })->get();
            $studentIds = $students->pluck('id');

            $existProject = true;
            $getAllMembersForProject = [];
            if (!$Project) {
                $existProject = false;
            } else {
                $getIdsStudentsForProject = $project->students()->whereIn('students.id', $studentIds)->pluck('students.id');

                $getAllMembersForProject = Student::whereIn('id', $getIdsStudentsForProject)->get();
            }


            $AcademicAdvisor = $student->academicAdvisor()->first();

            return view('home.student', compact('existProject', 'sessions', 'sessionsThisWeek', 'Projects', 'Project', 'AcademicAdvisor', 'advisor', 'getAllMembersForProject'));
        }
    }
}
