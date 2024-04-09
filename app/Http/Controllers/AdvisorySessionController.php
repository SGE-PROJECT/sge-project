<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdvisorySession;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use App\Models\Project;
use Carbon\Carbon;
use App\Mail\AdvisorySesionMail;
use Illuminate\Support\Facades\Mail;
use App\Notifications\AdvisorySesionNotification;
use Illuminate\Support\Facades\Notification;
use App\Notifications\DateRequestNotification;
use App\Mail\DateRequestMail;

class AdvisorySessionController extends Controller
{

    public function index($slug)
    {
        $user = User::where('slug', $slug)->firstOrFail();
        if (!$user->hasRole('Asesor Académico')) {
            abort(404);
        }

        $academicAdvisor = $user->academicAdvisor;

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
            // Filtrar los estudiantes para asegurarse de que solo se incluyan aquellos que están asociados a este proyecto
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

        return view('consultancy.Dates', compact('sessions', 'sessionsThisWeek', 'Projects', 'allStudents', 'slug'));
    }

    public function all($slug)
    {
        $user = User::where('slug', $slug)->firstOrFail();
        if (!$user->hasRole('Asesor Académico')) {
            abort(404);
        }

        $academicAdvisor = $user->academicAdvisor;

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

        $allStudents = $students->map(function ($student, $key) {
            $colores = ["verde", "amarillo", "morado", "azul", "rosa"];
            $colorIndex = $key % count($colores);
            $student->avatar = $student->user->avatar;
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

        return view('consultancy.DatesAll', compact(['sessions', 'sessionsThisWeek', 'Projects', 'allStudents', 'slug']));
    }

    public function student($slug)
    {
        $advisor = true;
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
            return view('consultancy.DatesStudent', compact('slug', 'advisor'));
        }
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

        return view('consultancy.DatesStudent', compact('sessions', 'sessionsThisWeek', 'Projects', 'slug', 'advisor'));
    }

    public function enviar(Request $request, $id)
    {
        $user = User::where('id', $id)->firstOrFail();
        if (!$user->hasRole('Estudiante')) {
            abort(404);
        }
        $validatedData = $request->validate([
            'message' => 'required|max:255'
        ]);
        Notification::send($user->student->academicAdvisor->user,new DateRequestNotification($user->student->academicAdvisor->user,$user->name, $request));
        Mail::to($user->student->academicAdvisor->user->email)->send(new DateRequestMail($user->student->academicAdvisor->user,$user->name, $request));
        return back()->with('success', 'Se ha solicitado al asesor exitosamente.');
    }

    public function store(Request $request)
    {
        $fechaHora = $request->input('session_date') . ' ' . $request->input('hora');
        $validator = Validator::make(array_merge($request->all(), ['session_date' => $fechaHora]), [
            'session_date' => 'required|date_format:Y-m-d H:i',
            'description' => 'required|string|max:255',
            'id_project_id' => 'required',
            'id_advisor_id' => 'required'
        ]);
        $validatedData = $validator->validated();
        $validatedData['is_confirmed'] = $request->input('is_confirmed', false);
        $session = AdvisorySession::create($validatedData);
        $asesor = $session->user->academicAdvisor->id;
        $message=$session->session_date;
        $date = explode(' ', $message);
        $users = [];
        foreach ($session->proyect->students->where('academic_advisor_id', $asesor) as $student) {
            $users[] = $student->user;
        }

        foreach ($users as $user) {
            Notification::send($user,new AdvisorySesionNotification($user, $date));
        }
        foreach ($users as $user) {
            Mail::to($user->email)->send(new AdvisorySesionMail($user, $date));
        }

        return back()->with('success', 'La sesión de asesoría ha sido creada exitosamente.');
    }

    public function update(Request $request, $id)
    {
        $fechaHora = $request->input('session_date') . ' ' . $request->input('hora');
        $validator = Validator::make(array_merge($request->all(), ['session_date' => $fechaHora]), [
            'session_date' => 'required|date_format:Y-m-d H:i',
            'description' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json($request);
        }

        $session = AdvisorySession::find($id);

        if (!$session) {
            return response()->json(['message' => 'Session not found'], 404);
        }

        $session->update($validator->validated());

        return back()->with('success', 'La sesión de asesoría ha sido editada exitosamente.');
    }

    public function destroy($id)
    {
        $session = AdvisorySession::find($id);

        if (!$session) {
            return response()->json(['message' => 'Session not found'], 404);
        }

        $session->delete();

        return back()->with('success', 'La sesión de asesoría ha sido editada exitosamente.');
    }

}
