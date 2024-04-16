<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;
use App\Models\management\Program;
use App\Models\management\Division;

class GroupController extends Controller
{

    public function getProgramsByDivision($divisionId)
    {
        $programs = Program::where('division_id', $divisionId)->get();
        return response()->json($programs);
    }
        
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $groups = Group::with('program.division')->get();

        return view('management.group.show-groups', compact('groups'));
       }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $divisions = Division::all();
        $programs = Program::all();

        return view('management.group.create-group', compact('divisions', 'programs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable',
            'program_id' => 'required|exists:programs,id',
            'four-month-period' => 'nullable',
        ]);

        $group = Group::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'program_id' => $validatedData['program_id'],
            'four-month-period' => $validatedData['four-month-period'],
        ]);

        return redirect()->route('grupos.index')->with('success', 'Grupo creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $group = Group::with('program.division')->findOrFail($id);
        $divisions = Division::all();
        $programs = Program::where('division_id', $group->program->division_id)->get();
    
        return view('management.group.edit-group', compact('group', 'divisions', 'programs'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {    //management.group.edit-group
        $group = Group::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable',
            'program_id' => 'required|exists:programs,id',
            'four-month-period' => 'nullable|integer|min:1|max:18', 
        ]);
    
        $group->update($validatedData);
    
        return redirect()->route('grupos.index')->with('success', 'Grupo actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $group = Group::findOrFail($id);  
            $group->delete(); 
            return redirect()->route('grupos.index')->with('success', 'Grupo eliminado correctamente.');
        } catch (\Exception $e) {
            return redirect()->route('grupos.index')->with('error', 'Error al eliminar el grupo.');
        }
    }
}
