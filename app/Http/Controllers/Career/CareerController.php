<?php

namespace App\Http\Controllers\Career;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\management\Division;
use App\Models\management\Career;
use App\Models\management\CareerImage;


class CareerController extends Controller
{
    public function __construct(){
        $this->middleware("can:carreras.index")->only('index');
        $this->middleware("can:carreras.edit")->only('edit', 'update');
        $this->middleware("can:carreras.create")->only('create', 'store');
        $this->middleware("can:carreras.destroy")->only('destroy');
    }
    public function index()
    {
        $careers = Career::with('careerImage', 'division')->get();
        $divisions = Division::all();
        return view('management.careers.Careers', compact('careers', 'divisions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $divisions = Division::all();
        return view('management.careers.add-career', compact('divisions')); // Asegúrate de que la vista se llama add-career.blade.php
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
    
            $career = Career::create($request->all());
    
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('images/career'), $imageName);
    
                $careerImage = new CareerImage([
                    'career_id' => $career->id,
                    'image_path' => 'images/career/' . $imageName,
                ]);
                $careerImage->save();
            }
    
            return redirect()->route('carreras.index')->with('success', 'Carrera creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $career = Career::with('careerImage', 'division')->findOrFail($id);
            return view('management.careers.show', compact('career'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $career = Career::findOrFail($id);
        $divisions = Division::all();
        return view('management.careers.edit-career', compact('career', 'divisions')); // Asegúrate de que la vista se llama edit-career.blade.php
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

        $career = Career::findOrFail($id);
        $career->update($request->all());

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/career'), $imageName);

            // Actualiza o crea una nueva imagen para la carrera
            $careerImage = $career->careerImage ?: new CareerImage(['career_id' => $career->id]);
            $careerImage->image_path = 'images/career/' . $imageName;
            $careerImage->save();
        }

        return redirect()->route('carreras.index')->with('success', 'Carrera actualizada con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $career = Career::findOrFail($id);

        // Elimina la imagen asociada si existe
        if ($career->careerImage) {
            $path = public_path($career->careerImage->image_path);
            if (file_exists($path)) {
                @unlink($path);
            }
            $career->careerImage()->delete();
        }

        $career->delete();
        return redirect()->route('carreras.index')->with('success', 'Carrera eliminada con éxito.');
    }
}
