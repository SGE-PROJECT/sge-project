<?php

namespace App\Http\Controllers\Career;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\management\Division;
use App\Models\management\Careers;



class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        return view('management.careers.Careers', compact('careers', 'divisions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $divisions = \App\Models\management\Division::all();
        return view('management.careers.create', compact('divisions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'division_id' => 'required|exists:divisions,id',
        ]);
    
        \App\Models\management\Careers::create($request->all());
    
        return redirect()->route('careers.index')->with('success', 'Carrera creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $career = Careers::findOrFail($id);
    return view('management.careers.show', compact('career'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $career = Careers::findOrFail($id);
    $divisions = Division::all(); // Para seleccionar otra división si es necesario
    return view('management.careers.edit', compact('career', 'divisions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'division_id' => 'required|exists:divisions,id',
        ]);
    
        $career = Careers::findOrFail($id);
        $career->update($request->all());
    
        return redirect()->route('careers.index')->with('success', 'Carrera actualizada con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $career = Careers::findOrFail($id);
    $career->delete();

    return redirect()->route('careers.index')->with('success', 'Carrera eliminada con éxito.');
    }
}
