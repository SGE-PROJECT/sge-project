<?php

namespace App\Http\Controllers\projects;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Projects; // Asegúrate de importar el modelo correcto


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /*¿Cómo recuperar todos los registros? Se usa el Modelo*/
        $Projects = projects::paginate();

        return view("projects.ProjectsDash.projectDashboard", compact('Projects'));
    }

    public function invitation()
    {
        return view("projects.ProjectUser.ProjectUser");
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("projects.Forms.FormStudent");
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
