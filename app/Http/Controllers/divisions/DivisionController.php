<?php

namespace App\Http\Controllers\divisions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\management\Division;
use App\Models\management\Division_image;

class DivisionController extends Controller
{
    public function __construct(){
        $this->middleware("can:divisiones.index")->only('index');
        $this->middleware("can:divisiones.edit")->only('edit', 'update');
        $this->middleware("can:divisiones.create")->only('create', 'store');
        $this->middleware("can:divisiones.destroy")->only('destroy');
    }
    public function index()
    {
        $divisions = Division::with('divisionImage')->get();

        return view('management.divisions.divisions', compact('divisions'));
    }

    public function getProjectsPerDivision()
    {

        return view("management.divisions.projects-per-division");
    }

    public function create()
    {
        return view('management.divisions.add-division');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif',
        ]);

        $division = new Division();
        $division->name = $request->name;
        $division->description = $request->description;
        $division->save();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();

            // Guardar la imagen en la carpeta deseada
            $image->move(public_path('images/divisions'), $imageName);

            $divisionImage = new Division_image();
            $divisionImage->division_id = $division->id;
            $divisionImage->image_path = 'images/divisions/' . $imageName;
            $divisionImage->save();
        }

        return redirect()->route('divisiones.index')->with('success', 'Division created successfully');
    }




    public function show(string $id)
    {
        $division = Division::findOrFail($id);
        return view('management.divisions.show', compact('division'));
    }

    public function edit(string $id)
    {
        $division = Division::findOrFail($id);
        return view('management.divisions.edit-division', compact('division'));
    }

    public function update(Request $request, string $id)
    {
    $request->validate([
        'name' => 'required',
        'description' => 'nullable|string',
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

        $division->divisionImage()->delete();

        $division->delete();

        return redirect()->route('divisiones.index')->with('success', 'División eliminada correctamente.');
    }
}
