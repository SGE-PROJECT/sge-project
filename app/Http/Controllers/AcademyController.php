<?php

namespace App\Http\Controllers;

use App\Models\AcademicDirector;
use App\Models\AcademicAdvisor;
use App\Models\Academy;
use App\Models\Student;
use App\Models\management\Program;
use App\Models\ManagmentAdmin;
use Illuminate\Http\Request;

class AcademyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $academicDirector = ManagmentAdmin::where('user_id', auth()->user()->id)->first();

        $divisionId = $academicDirector->division_id;

        $academies = Academy::whereHas('programs', function ($query) use ($divisionId) {
            $query->where('division_id', $divisionId);
        })->where('is_active', true)->get();


        $division = $academicDirector->division;

        return view('academy.show-academies', compact('academies', 'division'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $academicDirector = ManagmentAdmin::where('user_id', auth()->user()->id)->first();

        $divisionId = $academicDirector->division_id;

        $programs = Program::where('division_id', $divisionId)
            ->whereNull('academy_id')
            ->get();


        return view('academy.create-academy', compact('programs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación de los datos
        $request->validate([
            'name' => 'required|string',
            'programs' => 'required|array',
            'programs.*' => 'exists:programs,id',
        ]);

        $academy = new Academy();
        $academy->name = $request->name;
        $academy->save();

        foreach ($request->programs as $programId) {
            $program = Program::findOrFail($programId);
            $program->academy_id = $academy->id;
            $program->save();
        }

        return redirect()->route('academias.index')->with('success', 'Academia agregada correctamente');
    }


    /**
     * Display the specified resource.
     */
    public function show(Academy $academy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $academy = Academy::findOrFail($id);

        $academicDirector = ManagmentAdmin::where('user_id', auth()->user()->id)->first();
        $divisionId = $academicDirector->division_id;

        $allPrograms = Program::where('division_id', $divisionId)->get();

        $associatedPrograms = $academy->programs;

        $availablePrograms = $allPrograms->diff($associatedPrograms);

        $associatedProgramIds = $academy->programs()->pluck('id')->toArray();
        $availablePrograms = $allPrograms->whereNotIn('id', $associatedProgramIds)->whereNull('academy_id');


        return view('academy.edit-academy', compact('academy', 'associatedPrograms', 'availablePrograms'));
    }


    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, String $id)
    {
        $request->validate([
            'name' => 'required|string',
            'programs.*' => 'exists:programs,id',
        ]);

        $academy = Academy::findOrFail($id);

        $academy->update([
            'name' => $request->name,
        ]);


        $selectedProgramIds = $request->input('programs', []);

        $academy->programs()->update(['academy_id' => null]);

        foreach ($selectedProgramIds as $programId) {
            $program = Program::findOrFail($programId);
            $program->academy_id = $academy->id;
            $program->save();
        }

        return redirect()->route('academias.index')->with('success', 'Academia actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {

        $academy = Academy::findOrFail($id);

        $academy->update([
            'is_active' => false,
        ]);

        return redirect()->route('academias.index')->with('success', 'Academia eliminada correctamente');
    }

    public function asignarView()
    {
        $user_id = auth()->user()->id;
        $academicDirector = AcademicAdvisor::where('user_id', $user_id)->first();
        $divisionId = $academicDirector->division_id;
        $programs = Program::where('division_id', $divisionId)->get();
        $studentData = collect();
        foreach ($programs as $program) {
            $groups = $program->groups;
            foreach ($groups as $group) {
                $studentsInGroup = $group->students()->with('user')->get();
                foreach ($studentsInGroup as $student) {
                    $studentData->push([
                        'name' => $student->user->name,
                        'registration_number' => $student->registration_number
                    ]);
                }
            }
        }
        $advisors = AcademicAdvisor::where('division_id', $divisionId)->get();
        return view('academy.AdvisorStudent', compact('studentData', 'advisors'));
    }

    public function asignar(Request $request)
    {
        $request->validate([
            'advisor' => 'required',
            'students' => 'required|string',
        ]);
        $textoLimpio = str_replace(' ', '', $request->students);
        $arrayDeNumeros = explode(',', $textoLimpio);
        foreach ($arrayDeNumeros as $estudiante) {
            $user = Student::where('registration_number', $estudiante)->firstOrFail();
            $user->update([
                'academic_advisor_id' => $request->advisor,
            ]);
        }
        return redirect("/")->with('success', 'Asesorados asignados correctamente');
    }

}
