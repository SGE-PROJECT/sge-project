<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();

        return view('roles.permissions', ['roles' => $roles]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        return view('roles.permissions.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
{
    $rolePermissions = $role->permissions()->pluck('name')->toArray();
    $allPermissions = Permission::pluck('name')->toArray(); // Asegúrate de importar el modelo Permission

    return view('roles.permissions', compact('role', 'rolePermissions', 'allPermissions'));
}

    
    
    
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
{
    // Valida los datos recibidos del formulario
    $request->validate([
        'permisos' => 'required|array',
    ]);

    try {
        // Obtiene los permisos del formulario
        $permisos = $request->input('permisos', []);

        // Actualiza los permisos del rol
        $role->syncPermissions($permisos);

        // Redirige de vuelta a la página de índice de permisos con un mensaje de éxito
        return redirect()->route('roles.permissions.index')->with('success', 'Permisos actualizados correctamente');
    } catch (\Exception $e) {
        // Maneja cualquier excepción que ocurra durante el proceso de actualización
        return back()->withErrors('Error al actualizar permisos: ' . $e->getMessage())->withInput();
    }
}
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        // Aquí puedes agregar la lógica para eliminar un rol si es necesario
    }
}
