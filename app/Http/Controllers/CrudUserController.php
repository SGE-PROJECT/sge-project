<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\AcademicAdvisor;
use App\Models\AcademicDirector;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class CrudUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with(['student', 'secretary', 'academicDirector', 'academicAdvisor', 'managmentAdmin'])->get();
    
        // Iterar sobre los usuarios para adjuntar el division_id y/o division_name
        $users->each(function ($user) {
            $division = null;
            if ($user->student) {
                $division = $user->student->division;
            } elseif ($user->secretary) {
                $division = $user->secretary->division;
            } elseif ($user->academicDirector) {
                $division = $user->academicDirector->division;
            } elseif ($user->academicAdvisor) {
                $division = $user->academicAdvisor->division;
            } elseif ($user->managmentAdmin) {
                $division = $user->managmentAdmin->division;
            }
    
            // Adjunta division_id y division_name como propiedades dinámicas
            $user->division_id = $division ? $division->id : null;
            $user->division_name = $division ? $division->name : 'Sin división';
        });
    
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
            'identifier_number' => 'required|string',
            'role' => 'required',
            //'division_id' => 'required|exists:divisions,id', // Asegúrate de validar que el ID de la división exista
            'phone_number' => 'required|string|max:20',
            'avatar' => 'nullable|string|max:500',
            'isActive' => 'required|boolean',
        ]);

        // Generar el slug a partir del nombre
        $slug = Str::slug($request->name, '-');

        $user = User::create([
            'name' => $request->name,
            'slug' => $slug,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            //'division_id' => $request->division_id,
            'phone_number' => $request->phone_number,
            'avatar' => $request->avatar,
            'isActive' => $request->isActive,
        ]);

        $userId = $user->id; // Obtener el ID del usuario creado

        $user->assignRole($request->role);

        if ($request->role === 'Estudiante') {
            $request->validate([
                'group_id' => 'required|exists:groups,id',
                'academic_advisor_id' => 'required|exists:academic_advisors,id',
            ]);
            Student::create([
                'user_id' => $userId,
                'registration_number' => $request->identifier_number,
                'group_id' => $request->group_id,
                'academic_advisor_id' => $request->academic_advisor_id,
                'division_id' => $request->division_id,
            ]);
        } elseif ($request->role === 'Asesor Académico') {
            AcademicAdvisor::create([
                'user_id' => $userId,
                'payroll' => $request->identifier_number,
                'division_id' => $request->adivision_id,
            ]);
        } else {
            AcademicDirector::create([
                'user_id' => $userId,
                'payroll' => $request->identifier_number,
                'division_id' => $request->adivision_id,
            ]);
        }
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
