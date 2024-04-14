<?php

namespace App\Http\Controllers\divisions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\management\Division;
use App\Models\management\Division_image;
use App\Models\AcademicDirector;
use App\Models\User;

class DivisionController extends Controller
{
    public function __construct(){
        $this->middleware("can:divisiones.index")->only('index');
        $this->middleware("can:divisiones.edit")->only('edit', 'update');
        $this->middleware("can:divisiones.create")->only('create', 'store');
        $this->middleware("can:divisiones.destroy")->only('destroy');
        $this->middleware("can:divisiones.activate")->only('activate');
    }

    public function index()
    {
    $divisions = Division::with('divisionImage')->get();

    $academicDirectors = AcademicDirector::with('user')->whereIn('division_id', $divisions->pluck('id'))->get()->groupBy('division_id');

    return view('management.divisions.divisions', compact('divisions', 'academicDirectors'));
    }

    public function create()
    {
        return view('management.divisions.add-division');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|regex:/^[a-zA-Z0-9]+$/',
            'description' => 'required|string|regex:/^[a-zA-Z0-9]+$/',
            'image' => 'image|mimes:jpeg,png,jpg,gif',
        ]);

        $division = new Division();
        $division->name = $request->name;
        $division->description = $request->description;
        $division->save();

        // Verificar si se seleccionó una imagen personalizada
        if ($request->hasFile('custom_image')) {
            $image = $request->file('custom_image');
            $imageName = $image->getClientOriginalName();

            // Guardar la imagen personalizada en la carpeta deseada
            $image->move(public_path('images/divisions'), $imageName);

            $divisionImage = new Division_image();
            $divisionImage->division_id = $division->id;
            $divisionImage->image_path = 'images/divisions/' . $imageName;
            $divisionImage->save();
        } elseif ($request->has('image')) {
            // Si se seleccionó una imagen predeterminada, utilizarla
            $selectedImage = $request->input('image');
            $divisionImage = new Division_image();
            $divisionImage->division_id = $division->id;
            $divisionImage->image_path = $selectedImage;
            $divisionImage->save();
        }

        return redirect()->route('divisiones.index')->with('success', 'División creada correctamente.');
    }

    public function show(string $id)
    {
        $division = Division::findOrFail($id);
        return view('management.divisions.show', compact('division'));
    }

    public function edit(string $id)
{
    $divisions = Division::with('divisionImage')->get();
    $division = Division::findOrFail($id);

    // Obtener los presidentes académicos de cada división con sus nombres
    $academicDirectors = AcademicDirector::with('user')
        ->whereIn('division_id', $divisions->pluck('id'))
        ->get()
        ->groupBy('division_id')
        ->map(function ($academicDirectors) {
            return $academicDirectors->pluck('user.name')->implode(', ');
        });

    return view('management.divisions.edit-division', compact('division', 'divisions', 'academicDirectors'));
}


    public function update(Request $request, string $id)
    {

        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif',
        ]);

        $division = Division::findOrFail($id);
        $division->name = $request->name;
        $division->description = $request->description;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();

            $image->move(public_path('images/divisions'), $imageName);

            if ($division->divisionImage) {
                $division->divisionImage->delete();
            }

            $divisionImage = new Division_image();
            $divisionImage->division_id = $division->id;
            $divisionImage->image_path = 'images/divisions/' . $imageName;
            $divisionImage->save();
        }

        $division->save();

        return redirect()->route('divisiones.index')->with('success', 'División actualizada correctamente.');
    }

    public function destroy(string $id)
    {
    $division = Division::findOrFail($id);

    $division->isActive = false;
    $division->save();

    return redirect()->route('divisiones.index')->with('success', 'División desactivada correctamente.');
    }
    public function activate(string $id)
{
    $division = Division::findOrFail($id);

    $division->isActive = true;
    $division->save();

    return redirect()->route('divisiones.index')->with('success', 'División activada correctamente.');
}
}
