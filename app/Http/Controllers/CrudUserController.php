<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;


class CrudUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all(); // Obtener todos los usuarios
        return view('users.cruduser', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all(); // Obtener todos los roles para el formulario
        return view('users.create', ['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required',
            'division_id' => 'required|exists:divisions,id', // Asegúrate de validar que el ID de la división exista
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'division_id' => $request->division_id, // Agrega la asignación de división
        ]);

        $user->assignRole($request->role);

        return redirect()->route('users.cruduser.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Este método podría usarse para mostrar detalles de un usuario específico si es necesario.
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        $roles = Role::all();
        $userRole = $user->roles->pluck('name','name')->all();

        return view('users.edit', ['user' => $user, 'roles' => $roles, 'userRole' => $userRole]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8',
            'role' => 'required',
        ]);

        $user = User::find($id);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->filled('password') ? Hash::make($request->password) : $user->password,
        ]);

        $user->syncRoles($request->role);

        return redirect()->route('users.cruduser.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
        }

        return redirect()->route('users.cruduser');
    }
}
