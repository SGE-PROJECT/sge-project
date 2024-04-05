<?php

namespace App\Http\Controllers\profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('profile.viewprofile');

    }

    
    public function actualizarFoto(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $usuario = auth()->user();

        $imagen = $request->file('photo');
        $nombreImagen = time() . '.' . $imagen->extension();
        $imagen->move(public_path('fotos'), $nombreImagen);

        $usuario->photo = 'fotos/' . $nombreImagen;
        $usuario->save();

        return redirect()->back()->with('success', 'Foto de perfil actualizada exitosamente.');
    }

     
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
