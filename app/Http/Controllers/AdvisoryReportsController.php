<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Student;

class AdvisoryReportsController extends Controller
{
    public function index($slug)
    {
        $user = User::where('slug', $slug)->firstOrFail();
        if (!$user->hasRole('Asesor Académico')) {
            abort(404);
        }

        $academicAdvisor = $user->academicAdvisor;

        $students = $academicAdvisor->students()
                        ->with(['user', 'projects', 'group'])
                        ->whereHas('user', function ($query) {
                            $query->where('isActive', true);
                        })
                        ->get();

        return view('consultancy.advisor.Students', compact('students'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        return view('consultancy.advisor.AdvisoryReport');
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'message' => 'required|max:255'
        ]);
        $user = Student::where('id', $id)->firstOrFail();
        if (!$user->user->hasRole('Estudiante')) {
            abort(404);
        }
        $cantidad = $user->sanction + 1;
        $user->update(['sanction' => $cantidad]);
        return back()->with('success', 'Se ha sancionado al alumno exitosamente.');
    }

    public function destroy(string $id)
    {

    }
}
