<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdvisorySession;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use App\Models\Project;
use Carbon\Carbon;

class AdvisorySessionController extends Controller
{

    public function index($slug)
    {
        $user = User::where('slug', $slug)->firstOrFail();
        if (!$user->hasRole('Asesor Académico')) {
            abort(404);
        }

        $academicAdvisor = $user->academicAdvisor;

        $students = $academicAdvisor->students()->with('user')->get();
        $studentIds = $students->pluck('id');

        $Projects = Project::whereIn('id_student', $studentIds)->get();

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
            $student->avatar = $student->user->avatar;
            $student->name = $student->user->name;
            $student->color = $colores[$colorIndex];
            return $student;
        });


        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();

        $sessions = AdvisorySession::with(['proyect'])->where('id_advisor_id', $user->id)->get();
        $sessionsThisWeek = $sessions->filter(function ($session) use ($startOfWeek, $endOfWeek) {
            $sessionDate = Carbon::parse($session->session_date);
            return $sessionDate->between($startOfWeek, $endOfWeek);
        })->values()->map(function ($session) {
            $sessionDateTime = Carbon::parse($session->session_date);
            $session->date_only = $sessionDateTime->toDateString();
            $session->time_only = $sessionDateTime->toTimeString();
            return $session;
        });
        return view('consultancy.Dates', compact(['sessions', 'sessionsThisWeek', 'Projects', 'allStudents']));
    }

    public function all($slug)
    {
        $user = User::where('slug', $slug)->firstOrFail();
        if (!$user->hasRole('Asesor Académico')) {
            abort(404);
        }

        $academicAdvisor = $user->academicAdvisor;

        $students = $academicAdvisor->students()->with('user')->get();
        $studentIds = $students->pluck('id');

        $Projects = Project::whereIn('id_student', $studentIds)->get();

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
            $student->avatar = $student->user->avatar;
            $student->name = $student->user->name;
            $student->color = $colores[$colorIndex];
            return $student;
        });


        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();

        $sessions = AdvisorySession::with(['proyect'])->where('id_advisor_id', $user->id)->get();
        $sessionsThisWeek = $sessions->filter(function ($session) use ($startOfWeek, $endOfWeek) {
            $sessionDate = Carbon::parse($session->session_date);
            return $sessionDate->between($startOfWeek, $endOfWeek);
        })->values()->map(function ($session) {
            $sessionDateTime = Carbon::parse($session->session_date);
            $session->date_only = $sessionDateTime->toDateString();
            $session->time_only = $sessionDateTime->toTimeString();
            return $session;
        });
        return view('consultancy.DatesAll', compact(['sessions', 'sessionsThisWeek', 'Projects', 'allStudents']));
    }

    public function student($slug)
    {
        $user = User::where('slug', $slug)->firstOrFail();
        if (!$user->hasRole('Estudiante')) {
            abort(404);
        }
        $student = $user->student;
        if (!$student) {
            abort(404);
        }
        $Projects = $student->projects()->get();
        foreach ($Projects as $project) {
            $project->image = 'avatar.jpg';
            $project->name = $project->name_project;
            $project->description = $project->general_objective;
        }
        $projectsid = $student->projects()->pluck('projects.id');
        $sessions = AdvisorySession::whereIn('id_project_id', $projectsid)->get();
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();
        $sessionsThisWeek = $sessions->filter(function ($session) use ($startOfWeek, $endOfWeek) {
            $sessionDate = Carbon::parse($session->session_date);
            return $sessionDate->between($startOfWeek, $endOfWeek);
        });
        return view('consultancy.DatesStudent', compact(['sessions', 'sessionsThisWeek', 'Projects',]));
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
