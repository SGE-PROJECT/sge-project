<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
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
    public function show($id)
{
    try {
        $role = Role::findOrFail($id);
        return view('roles.show', compact('role'));
    } catch (\Exception $e) {
        return redirect()->route('roles.permissions.index')->with('error', 'Error al mostrar el rol: ' . $e->getMessage());
    }
}

    /**
     * Show the form for editing the specified resource.
     */
    public function create()
{
    $permissions = Permission::all(); // Otra opción: obtener los permisos según tu lógica de aplicación
    return view('roles.create', compact('permissions'));
}

public function store(Request $request)
{
    // Validar los datos del formulario
    $request->validate([
        'name' => 'required|unique:roles,name', // El nombre del rol debe ser único en la tabla roles
        'permissions' => 'required|array', // Se espera un array de permisos
    ]);

    try {
        // Crear un nuevo rol con el nombre proporcionado
        $role = Role::create(['name' => $request->name]);

        // Sincronizar los permisos asociados con el nuevo rol
        $role->syncPermissions($request->permissions);

        // Redirigir al usuario de vuelta al índice de roles con un mensaje de éxito
        return redirect()->route('roles.permissions.index')->with('success', 'Rol agregado exitosamente');
    } catch (\Exception $e) {
        // En caso de error, volver a la página anterior con un mensaje de error
        return back()->withErrors('Error al crear el rol: ' . $e->getMessage())->withInput();
    }
}



public function edit($id)
{
    $role = Role::findOrFail($id);
    $permissions = Permission::all();
    return view('roles.edit', compact('role', 'permissions'));
}


public function update(Request $request, $id)
{
    $role = Role::findOrFail($id);

    // Validar el nombre del rol
    $request->validate([
        'name' => 'required|unique:roles,name,'.$role->id,
        'permissions' => 'array',
    ]);

    // Actualizar el nombre del rol
    $role->name = $request->name;
    $role->save();

    // Verificar si los permisos proporcionados existen en la base de datos
    $permissions = $request->input('permissions', []);
    $existingPermissions = Permission::whereIn('id', $permissions)->pluck('id')->toArray();
    $invalidPermissions = array_diff($permissions, $existingPermissions);

    // Si hay permisos no válidos, mostrar un mensaje de error
    if (!empty($invalidPermissions)) {
        return back()->withErrors('Los siguientes permisos no existen: ' . implode(', ', $invalidPermissions))->withInput();
    }

    // Intentar sincronizar los permisos con el rol
    try {
        $role->syncPermissions($existingPermissions);
        return redirect()->route('roles.permissions.index')->with('success', 'Rol actualizado correctamente');
    } catch (\Exception $e) {
        // Manejar el error si ocurre algún problema durante la sincronización de permisos
        return back()->withErrors('Error al actualizar permisos: ' . $e->getMessage())->withInput();
    }
}


    
public function destroy($id)
{
    try {
        $role = Role::findOrFail($id);
        $role->delete();
        return redirect()->route('roles.permissions.index')->with('success', 'Rol eliminado correctamente');
    } catch (\Exception $e) {
        return redirect()->route('roles.permissions.index')->with('error', 'Error al eliminar el rol: ' . $e->getMessage());
    }
}
}
