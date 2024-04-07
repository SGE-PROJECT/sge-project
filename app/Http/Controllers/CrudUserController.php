<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use App\Models\Secretary;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ManagmentAdmin;
use App\Models\AcademicAdvisor;
use App\Models\AcademicDirector;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;


class CrudUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with([
            'student.group.program.division',
            'secretary.division',
            'academicDirector.division',
            'academicAdvisor.division',
            'managmentAdmin.division'
        ])->get();

        // Iteramos sobre cada usuario para asignarle explícitamente division_id y division_name
        $users->each(function ($user) {
            if ($user->relationLoaded('student') && $user->student) {
                $division = $user->student->group->program->division ?? null;
            } elseif ($user->relationLoaded('secretary') && $user->secretary) {
                $division = $user->secretary->division ?? null;
            } elseif ($user->relationLoaded('academicDirector') && $user->academicDirector) {
                $division = $user->academicDirector->division ?? null;
            } elseif ($user->relationLoaded('academicAdvisor') && $user->academicAdvisor) {
                $division = $user->academicAdvisor->division ?? null;
            } elseif ($user->relationLoaded('managmentAdmin') && $user->managmentAdmin) {
                $division = $user->managmentAdmin->division ?? null;
            } else {
                $division = null;
            }

            // Asignamos los valores de division_id y division_name
            $user->division_id = $division ? $division->id : 'Sin ID de División';
            $user->division_name = $division ? $division->name : 'Sin División';
        });


        return view('users.cruduser', ['users' => $users]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all(); // Obtener todos los roles para el formulario
        $divisions = \App\Models\management\Division::all(); // Asumiendo que este es el namespace correcto para tu modelo Division

        // Pasar tanto roles como divisions a la vista
        return view('users.create', [
            'roles' => $roles,
            'divisions' => $divisions
        ]);
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
            'role' => 'required|exists:roles,name',
            'phone_number' => 'nullable|string|max:20',
            'division_id' => 'required|exists:divisions,id',
            // Otros campos necesarios...
        ]);

        // Creación del usuario
        $user = User::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name, '-'),
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone_number' => $request->phone_number ?? '',
            // Otros campos...
            'isActive' => true, // asumiendo que siempre es true al crear
        ]);

        // Asignación del rol
        $role = $request->role;
        $user->assignRole($role);

        // Asignación de la división basada en el rol
        $division_id = $request->division_id;
        switch ($role) {
            case 'Estudiante':
                Student::create(['user_id' => $user->id, 'division_id' => $division_id]);
                break;
            case 'Secretario':
                Secretary::create(['user_id' => $user->id, 'division_id' => $division_id]);
                break;
            case 'Director Académico':
                AcademicDirector::create(['user_id' => $user->id, 'division_id' => $division_id]);
                break;
            case 'Asesor Académico':
                AcademicAdvisor::create(['user_id' => $user->id, 'division_id' => $division_id]);
                break;
            case 'Administrador de División':
                ManagmentAdmin::create(['user_id' => $user->id, 'division_id' => $division_id]);
                break;

                // Agrega casos para otros roles según sea necesario
        }

        return redirect()->route('users.cruduser.index')->with('success', 'Usuario creado correctamente.');
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
        $userRole = $user->roles->pluck('name', 'name')->all();

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
