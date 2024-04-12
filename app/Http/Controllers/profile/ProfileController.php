<?php

namespace App\Http\Controllers\profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


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
        $validator = Validator::make($request->all(), [
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048|dimensions:min_width=450,min_height=450,ratio=1',
        ], [
            'photo.required' => 'La imagen es requerida.',
            'photo.image' => 'El archivo debe ser una imagen.',
            'photo.mimes' => 'La imagen debe ser de tipo jpeg, png, jpg o gif.',
            'photo.max' => 'La imagen no debe exceder los 2048 kilobytes.',
            'photo.dimensions' => 'La imagen debe ser cuadrada con un tamaño mínimo de 450x450 píxeles.',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $usuario = auth()->user();
    
        if ($request->hasFile('photo')) {
            $imagen = $request->file('photo');
            $nombreImagen = time() . '.' . $imagen->extension();
            $imagen->move(public_path('fotos'), $nombreImagen);
            $usuario->photo = 'fotos/' . $nombreImagen;
            $usuario->save();
        }
    
        return redirect()->back()->with('success', 'Foto de perfil actualizada exitosamente.');
    }
    

    public function showUserProfile($userId) {
    // Recuperar el usuario seleccionado desde la base de datos
    $user = User::findOrFail($userId);
    // Pasar los datos del usuario a la vista
    return view('user.profile', ['user' => $user]);
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
