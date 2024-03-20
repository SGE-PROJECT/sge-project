<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdvisorySession;
use App\Models\ProjectsTest;
use Illuminate\Support\Facades\Validator;
use App\Models\Project;
use Carbon\Carbon;

class AdvisorySessionController extends Controller
{    

    public function index($id)
    {
        $sessions = AdvisorySession::with(['proyect'])->where('id_advisor_id', $id)->get();
        $Projects = ProjectsTest::where('id_advisor_id', $id)->get();
        $projects = ProjectsTest::with('students')->where('id_advisor_id', $id)->get();
        
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

        $allStudents = [];
        $colores = ["verde", "amarillo", "morado", "azul", "rosa"];
        $colorIndex = 0;
        foreach ($projects as $project) {
            $students = $project->students;
            foreach ($students as $student) {
                $student->color = $colores[$colorIndex % count($colores)];
                $allStudents[] = $student;
                $colorIndex++;
            }
        }

        return view('consultancy.Dates', compact(['sessions', 'sessionsThisWeek', 'Projects', 'allStudents']));
    }

    public function store(Request $request)
    {
        $fechaHora = $request->input('session_date') . ' ' . $request->input('hora');
        $validator = Validator::make(array_merge($request->all(), ['session_date' => $fechaHora]), [
            'session_date' => 'required|date_format:Y-m-d H:i',
            'description' => 'required|string|max:255',
            'id_project_id' => 'required|exists:projects_tests,id',
        ]);
        $validatedData = $validator->validated();
        $validatedData['is_confirmed'] = $request->input('is_confirmed', false);
        $validatedData['id_advisor_id'] = $request->input('id_advisor_id', 1);
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
