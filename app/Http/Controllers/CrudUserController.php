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
        $divisions = \App\Models\management\Division::all();
        $groups = \App\Models\Group::all();
        $academicAdvisors = \App\Models\AcademicAdvisor::with('user')->get();

        return view('users.create', [
            'roles' => $roles,
            'divisions' => $divisions,
            'groups' => $groups,
            'academicAdvisors' => $academicAdvisors,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validationRules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|exists:roles,name',
            'phone_number' => 'nullable|string|max:20',
            'division_id' => 'required|exists:divisions,id',
        ];

        if ($request->role === 'Estudiante') {
            $validationRules['group_id'] = 'required|exists:groups,id';
            $validationRules['registration_number'] = 'required|string|unique:students,registration_number';
            $validationRules['academic_advisor_id'] = 'required|exists:academic_advisors,id';
        } elseif ($request->role === 'Asistente de Dirección') {
            $validationRules['payrol'] = 'required|string|min:4|max:6';
        } elseif ($request->role === 'Presidente Académico') {
            $validationRules['payrol'] = 'required|string|min:4|max:6';
        } elseif ($request->role === 'Asesor Académico') {
            $validationRules['payrol'] = 'required|string|min:4|max:6';
        } elseif ($request->role === 'Administrador de División') {
            $validationRules['payrol'] = 'required|string|min:4|max:6';
        }

        $request->validate($validationRules);

        $baseSlug = Str::slug($request->name, '-');
        $slug = $baseSlug;
        $counter = 1;

        // Busca otros usuarios con el mismo slug y ajusta el slug para evitar duplicados
        while (User::where('slug', $slug)->exists()) {
            $slug = $baseSlug . $counter;
            $counter++;
        }

        // Creación del usuario
        $user = User::create([
            'name' => $request->name,
            'slug' => $slug,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone_number' => $request->phone_number ?? '',
            'isActive' => true, // asumiendo que siempre es true al crear
        ]);

        // Asignación del rol
        $user->assignRole($request->role);

        switch ($request->role) {
            case 'Estudiante':
                Student::create([
                    'user_id' => $user->id,
                    'division_id' => $request->division_id,
                    'group_id' => $request->group_id,
                    'registration_number' => $request->registration_number,
                    'academic_advisor_id' => $request->academic_advisor_id,
                ]);
                break;
            case 'Asistente de Dirección':
                Secretary::create([
                    'user_id' => $user->id,
                    'division_id' => $request->division_id,
                    'payrol' => $request->payrol,
                ]);
                break;
            case 'Presidente Académico':
                AcademicDirector::create([
                    'user_id' => $user->id,
                    'division_id' => $request->division_id,
                    'payrol' => $request->payrol,
                ]);
                break;
            case 'Asesor Académico':
                AcademicAdvisor::create([
                    'user_id' => $user->id,
                    'division_id' => $request->division_id,
                    'payrol' => $request->payrol,
                ]);
                break;
            case 'Administrador de División':
                ManagmentAdmin::create([
                    'user_id' => $user->id,
                    'division_id' => $request->division_id,
                    'payrol' => $request->payrol,
                ]);
                break;
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
        $user = User::with('roles')->find($id);
        $roles = Role::all();
        $divisions = \App\Models\management\Division::all();
        $groups = \App\Models\Group::all();
        $academicAdvisors = \App\Models\AcademicAdvisor::with('user')->get();
        $userRole = $user->roles->pluck('name')->first();

        $payrol = null;

        if ($userRole && $user->secretary) {
            $payrol = $user->secretary->payrol;
        } else if ($userRole && $user->academicadvisor) {
            $payrol = $user->academicadvisor->payrol;
        } else if ($userRole && $user->academicdirector) {
            $payrol = $user->academicdirector->payrol;
        } else if ($userRole && $user->managmentadmin) {
            $payrol = $user->managmentadmin->payrol;
        } 

        return view('users.edit', [
            'user' => $user,
            'roles' => $roles,
            'divisions' => $divisions,
            'groups' => $groups,
            'academicAdvisors' => $academicAdvisors,
            'userRole' => $userRole,
            'payrol' => $payrol,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $validationRules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'required|string|min:8',
            'role' => 'required|exists:roles,name',
            'phone_number' => 'nullable|string|max:20',
            'division_id' => 'required|exists:divisions,id',
        ];

        if ($request->role === 'Estudiante') {
            $validationRules['group_id'] = 'required|exists:groups,id';
            $validationRules['registration_number'] = 'required|string|unique:students,registration_number';
            $validationRules['academic_advisor_id'] = 'required|exists:academic_advisors,id';
        } elseif ($request->role === 'Asistente de Dirección') {
            $validationRules['payrol'] = 'required|string|min:4|max:6';
        } elseif ($request->role === 'Presidente Académico') {
            $validationRules['payrol'] = 'required|string|min:4|max:6';
        } elseif ($request->role === 'Asesor Académico') {
            $validationRules['payrol'] = 'required|string|min:4|max:6';
        } elseif ($request->role === 'Administrador de División') {
            $validationRules['payrol'] = 'required|string|min:4|max:6';
        }

        $request->validate($validationRules);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number ?? '',
            'password' => $request->filled('password') ? Hash::make($request->password) : $user->password,
        ]);

        $user->syncRoles($request->role);

        switch ($request->role) {
            case 'Estudiante':
                Student::updateOrCreate(
                    ['user_id' => $user->id],
                    [
                        'division_id' => $request->division_id,
                        'group_id' => $request->group_id,
                        'registration_number' => $request->registration_number,
                        'academic_advisor_id' => $request->academic_advisor_id,
                    ]
                );
                break;
            case 'Asistente de Dirección':
                Secretary::updateOrCreate(
                    ['user_id' => $user->id],
                    [
                        'division_id' => $request->division_id,
                        'payrol' => $request->payrol,
                    ]
                );
                break;
            case 'Presidente Académico':
                AcademicDirector::updateOrCreate(
                    ['user_id' => $user->id],
                    [
                        'division_id' => $request->division_id,
                        'payrol' => $request->payrol,
                    ]
                );
                break;
            case 'Asesor Académico':
                AcademicAdvisor::updateOrCreate(
                    ['user_id' => $user->id],
                    [
                        'division_id' => $request->division_id,
                        'payrol' => $request->payrol,
                    ]
                );
                break;
            case 'Administrador de División':
                ManagmentAdmin::updateOrCreate(
                    ['user_id' => $user->id],
                    [
                        'division_id' => $request->division_id,
                        'payrol' => $request->payrol,
                    ]
                );
                break;
        }

        return redirect()->route('users.cruduser.index')->with('success', 'Usuario actualizado correctamente.');
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

        return redirect()->route('users.cruduser.index');
    }

    //Mapear usuarios en la vista DashboardUsers
    public function dashboardUsers()
{
    $users = User::with([
        'student.group.program.division',
        'secretary.division',
        'academicDirector.division',
        'academicAdvisor.division',
        'managmentAdmin.division',
        'roles' // Asegúrate de incluir la relación de roles también
    ])->paginate(10);

    $users->each(function ($user) {
        $division = null;

        if ($user->student) {
            $division = $user->student->group->program->division ?? null;
        } elseif ($user->secretary) {
            $division = $user->secretary->division ?? null;
        } elseif ($user->academicDirector) {
            $division = $user->academicDirector->division ?? null;
        } elseif ($user->academicAdvisor) {
            $division = $user->academicAdvisor->division ?? null;
        } elseif ($user->managmentAdmin) {
            $division = $user->managmentAdmin->division ?? null;
        }

        $user->division_name = $division ? $division->name : 'Sin División';
    });

    // Contar el total de usuarios por cada rol
    $superAdminCount = Role::findByName('Super Administrador')->users()->count();
    $managmentAdminCount = Role::findByName('Administrador de División')->users()->count();
    $adviserCount = Role::findByName('Asesor Académico')->users()->count();
    $studentCount = Role::findByName('Estudiante')->users()->count();
    $presidentCount = Role::findByName('Presidente Académico')->users()->count();
    $secretaryCount = Role::findByName('Asistente de Dirección')->users()->count();

    return view('administrator.dashboard.DashboardUsers', compact('users', 'superAdminCount', 'managmentAdminCount', 'adviserCount', 'studentCount', 'presidentCount', 'secretaryCount'));
}


}
