<?php

namespace App\Http\Controllers\divisions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\management\Division;
use App\Models\management\Division_image;
use Illuminate\Support\Facades\Storage;

class DivisionController extends Controller
{
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
        return view('management.divisions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $division = new Division();
        $division->name = $request->name;
        $division->save();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $imagePath = $image->storeAs('division_images', $imageName, 'public');

            $divisionImage = new Division_image();
            $divisionImage->division_id = $division->id;
            $divisionImage->image_path = $imagePath;
            $divisionImage->save();
        }

        return redirect()->route('divisions.index')->with('success', 'Division created successfully');
    }

    public function show(string $id)
    {
        $division = Division::findOrFail($id);
        return view('management.divisions.show', compact('division'));
    }

    public function edit(string $id)
    {
        $division = Division::findOrFail($id);
        return view('management.divisions.edit', compact('division'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $division = Division::findOrFail($id);
        $division->name = $request->name;
        $division->save();

        return redirect()->route('divisions.index')->with('success', 'Division updated successfully');
    }

    public function destroy(string $id)
    {
        $division = Division::findOrFail($id);
        $division->delete();

        return redirect()->route('divisions.index')->with('success', 'Division deleted successfully');
    }
}
