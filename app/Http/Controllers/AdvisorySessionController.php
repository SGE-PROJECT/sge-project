<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdvisorySession;
use Illuminate\Support\Facades\Validator;

class AdvisorySessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sessions = AdvisorySession::with(['user', 'proyect'])->get();
        return response()->json($sessions);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'session_date' => 'required|date',
            'description' => 'required|string|max:255',
            'id_project_id' => 'required|exists:projects_tests,id',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $validatedData = $validator->validated();
        $validatedData['is_confirmed'] = $request->input('is_confirmed', false);
        $validatedData['id_advisor_id'] = $request->input('id_advisor_id', 1);

        $session = AdvisorySession::create($validatedData);

        return redirect()->route('consultancy.Dates');
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'session_date' => 'required|date',
            'description' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $session = AdvisorySession::find($id);

        if (!$session) {
            return response()->json(['message' => 'Session not found'], 404);
        }

        $session->update($validator->validated());

        return redirect()->route('consultancy.Dates');
    }

    public function destroy($id)
    {
        $session = AdvisorySession::find($id);

        if (!$session) {
            return response()->json(['message' => 'Session not found'], 404);
        }

        $session->delete();

        return response()->json(['message' => 'Session deleted successfully']);
    }
}
