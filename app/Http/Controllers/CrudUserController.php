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
use App\Models\management\Division;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;


class CrudUserController extends Controller
{
    public function __construct(){
        $this->middleware("can:user.index")->only('index');
        $this->middleware("can:user.create")->only('create');
        $this->middleware("can:user.store")->only('store');
        $this->middleware("can:user.show")->only('show');
        $this->middleware("can:user.edit")->only('edit');
        $this->middleware("can:user.update")->only('update');
        $this->middleware("can:user.destroy")->only('destroy');
        $this->middleware("can:user.dashboardUsers")->only('dashboardUsers');
    }
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

    public function store(Request $request)
    {
        $validationRules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|exists:roles,name',
            'phone_number' => 'nullable|string|max:20',
            'division_id' => 'required  |exists:divisions,id',
            'curp' => 'nullable|alpha_num|size:18',
            'birthdate' => 'nullable|date_format:Y-m-d',
            'sex' => 'nullable|in:M,F',
            'nss' => 'nullable|digits_between:11,11',
        ];

        if ($request->role === 'Estudiante') {
            $validationRules['group_id'] = 'required|exists:groups,id';
            $validationRules['registration_number'] = 'required|string|unique:students,registration_number';
            $validationRules['academic_advisor_id'] = 'required|exists:academic_advisors,id';
            $validationRules['isReEntry'] = 'required|in:Si,No';
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
            'curp' => $request->curp,
            'birthdate' => $request->birthdate,
            'sex' => $request->sex,
            'nss' => $request->nss,
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
                    'isReEntry' => $request->isReEntry,
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

    public function show(string $id)
    {
        // Este método podría usarse para mostrar detalles de un usuario específico si es necesario.
    }

    public function edit(string $id)
    {
        $user = User::with('roles')->find($id);
        $roles = Role::all();
        $divisions = \App\Models\management\Division::all();
        $user->load('student.group.program.division');
        $user->load([
            'secretary.division', // Para el rol de Asistente de Dirección
            'academicAdvisor.division', // Para el rol de Asesor Académico
            'academicDirector.division', // Para el rol de Presidente Académico
            'managmentAdmin.division', // Para el rol de Administrador de División
        ]);
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

    public function update(Request $request, string $id)
    {
       // dd($request->all());
        $user = User::findOrFail($id);

        $validationRules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'required|string|min:8',
            'role' => 'required|exists:roles,name',
            'phone_number' => 'nullable|string|max:20',
            'division_id' => 'required|exists:divisions,id',
           // 'curp' => 'nullable|alpha_num|size:18',
          //  'birthdate' => 'nullable|date_format:Y-m-d',
           // 'sex' => 'nullable|in:M,F',
            'nss' => 'nullable|digits_between:11,11',
        ];

        if ($request->role === 'Estudiante') {
            $validationRules['group_id'] = 'required|exists:groups,id';
            $validationRules['registration_number'] = 'required|string|unique:students,registration_number';
            $validationRules['academic_advisor_id'] = 'required|exists:academic_advisors,id';
            $validationRules['isReEntry'] = 'required|in:Si,No';
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
           // 'curp' => $request->curp,
           // 'birthdate' => $request->birthdate,
          //  'sex' => $request->sex,
            'nss' => $request->nss,
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
                        'isReEntry' => $request->isReEntry,
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
        Log::info();

        return redirect()->route('users.cruduser.index')->with('success', 'Usuario actualizado correctamente.');
    }

    public function destroy(string $id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
        }

        return redirect()->route('users.cruduser.index');
    }

}

