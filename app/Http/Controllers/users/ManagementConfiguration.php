<?php

namespace App\Http\Controllers\users;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


use App\Models\User;


class ManagementConfiguration extends Controller
{
   
    public function index()
    {
        return view('users.Configuration');
    }



    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
    
        $request->validate([
            'name' => 'required|string|max:100|regex:/^[a-zA-ZáéíóúÁÉÍÓÚüÜ\s]+$/',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'phone_number' => 'required|string|digits:10|regex:/^[0-9]+$/',
        ]);
    
        $user->fill($request->only(['name', 'email', 'phone_number']));
    
        if ($request->filled('password')) {
            $request->validate([
                'password' => 'nullable|string|min:8|confirmed',
            ]);
            $user->password = Hash::make($request->password);
        }
    
    
        $validator = Validator::make($request->all(), [
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048|dimensions:min_width=450,min_height=450,ratio=1',
        ], [
            
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
        
    
        $user->save();

        
    
        return redirect()->route('users.configuration')->with('success', 'Datos actualizados correctamente.');
    }
    
    public function destroyProfilePhoto($id)
{
    // Busca al usuario por su ID
    $user = User::findOrFail($id);
    
    // Verifica si el usuario tiene una foto de perfil
    if ($user->photo) {
        // Elimina la foto de perfil del almacenamiento
        Storage::delete($user->photo);
        
        // Actualiza el campo 'photo' en la base de datos a null
        $user->photo = null;
        $user->save();
        
        // Redirige al usuario a la página de configuración de la cuenta con un mensaje de éxito
        return redirect()->route('users.configuration')->with('success', 'Foto de perfil eliminada exitosamente.');
    }
    
    // Si el usuario no tiene foto de perfil, redirige con un mensaje informativo
    return redirect()->route('users.configuration')->with('info', 'El usuario no tiene una foto de perfil.');
}


}
