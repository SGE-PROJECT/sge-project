<?php

namespace App\Http\Controllers\divisions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\management\Division;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $divisions = Division::with('divisionImage')->get();
        return view('management.divisions.divisions', compact('divisions'));
    }


    public function getProjectsPerDivision()
    {
        return view("management.divisions.projects-per-division");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
