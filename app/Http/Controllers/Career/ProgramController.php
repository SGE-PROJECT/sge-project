<?php

namespace App\Http\Controllers\Career;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\management\Division;
use App\Models\management\Program;
use App\Models\management\ProgramImage;


class ProgramController extends Controller
{
    public function __construct(){
        $this->middleware("can:carreras.index")->only('index');
        $this->middleware("can:carreras.edit")->only('edit', 'update');
        $this->middleware("can:carreras.create")->only('create', 'store');
        $this->middleware("can:carreras.destroy")->only('destroy');
    }
    public function index()
    {
        $programs = Program::with('programImage', 'division')->get();
        $divisions = Division::all();
        $totalCarreras = Program::count();
        $totalDivisiones = Division::count();
        return view('management.careers.Careers', compact('programs', 'divisions','totalCarreras', 'totalDivisiones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $divisions = Division::all();
        return view('management.careers.add-career', compact('divisions')); // Asegúrate de que la vista se llama add-program.blade.php
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
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $program = Program::create($request->all());

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('images/program'), $imageName);

                $programImage = new ProgramImage([
                    'program_id' => $program->id,
                    'image_path' => 'images/program/' . $imageName,
                ]);
                $programImage->save();
            }

            return redirect()->route('carreras.index')->with('success', 'Carrera creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $program = Program::with('programImage', 'division')->findOrFail($id);
            return view('management.careers.show', compact('program'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $program = Program::findOrFail($id);
        $divisions = Division::all();
        return view('management.careers.edit-career', compact('program', 'divisions')); // Asegúrate de que la vista se llama edit-program.blade.php
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
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $program = Program::findOrFail($id);
        $program->update($request->all());

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/program'), $imageName);

            // Actualiza o crea una nueva imagen para la carrera
            $programImage = $program->programImage ?: new ProgramImage(['program_id' => $program->id]);
            $programImage->image_path = 'images/program/' . $imageName;
            $programImage->save();
        }

        return redirect()->route('carreras.index')->with('success', 'Carrera actualizada con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $program = Program::findOrFail($id);

        // Elimina la imagen asociada si existe
        if ($program->programImage) {
            $path = public_path($program->programImage->image_path);
            if (file_exists($path)) {
                @unlink($path);
            }
            $program->programImage()->delete();
        }

        $program->delete();
        return redirect()->route('carreras.index')->with('success', 'Carrera eliminada con éxito.');
    }
}
