<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Group;
use App\Models\Student;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\AcademicAdvisor;
use App\Models\management\Program;
use Spatie\Permission\Models\Role;
use App\Models\management\Division;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class UsersImport implements ToModel, WithHeadingRow, WithValidation
{

    //DE GUILLE PARA QUIÉN CORRESPONDA: EL MODELO SENCILLAMENTE VALIDA SI EXISTE O NO UN USUARIO
    // EN BASE A LA RESPUESTA SE CREA UNO EN CASO DE NO EXISTIR
    //PARA ESO MANDAMOS A LLAMAR A FUNCIONES ESPECIFICAS
    public function model(array $row)
    {
        $division = Division::where('name', $row['division_name'])->first();
        $group = Group::where('name', $row['group_name'])->first();
        $advisor = User::role('Asesor Académico')->where('name', $row['advisor_name'])->first();

        if (!$division || !$group || !$advisor) {
            Log::error('No se pudo encontrar la división, grupo o asesor académico basado en los nombres proporcionados.');
            // Manejar adecuadamente esta situación, posiblemente devolviendo `null` o lanzando una excepción.
            return null;
        }
    
        $user = User::firstOrNew(['email' => $row['email']]);
        
        if (!$user->exists) {
            $user->slug = $this->makeSlugUnique(Str::slug($row['name'], '-'));
            $user->name = $row['name'];
            $user->password = Hash::make($row['password']);
            $user->phone_number = $row['phone_number'];
            $user->curp = $row['curp'];
            $user->birthdate = $row['birthdate'];
            $user->sex = $row['sex'];
            $user->nss = $row['nss'];
            $user->save();
            $this->assignRoleToUser($user, 'Estudiante');
        } else {
            $user->update([
                'name' => $row['name'],
                'password' => Hash::make($row['password']),
                'phone_number' => $row['phone_number'],
            ]);
        }
        
        Student::updateOrCreate(
            ['registration_number' => $row['registration_number']],
            [
                'user_id' => $user->id,
                'division_id' => $division->id,
                'group_id' => $group->id,
                'academic_advisor_id' => $advisor->academicAdvisor->id, // Asumimos que existe la relación academicAdvisor en el modelo User.
                'isReEntry' => isset($row['isReEntry']) && $row['isReEntry'] === 'true',
                ]
        );
    
        return null;
    }
    
    // Función para asignar el rol al usuario
    private function assignRoleToUser($user, $roleName)
    {
        $role = Role::firstOrCreate(['name' => $roleName]);
        $user->assignRole($role);
    }

    private function makeSlugUnique($slug)
    {
        $baseSlug = $slug;
        $counter = 1;
        while (User::where('slug', $slug)->exists()) {
            $slug = "{$baseSlug}-{$counter}";
            $counter++;
        }
        return $slug;
    }

    public function headingRow(): int
    {
        return 1;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
            'phone_number' => 'nullable|numeric',
            'registration_number' => 'required|numeric|unique:students,registration_number',
            'advisor_name' => 'required|string|exists:users,name',
            'division_name' => 'required|string|exists:divisions,name',
            'group_name' => 'required|string|exists:groups,name',
            'curp' => 'required|alpha_num|size:18', 
            'birthdate' => 'nullable|string',
            'sex' => 'required|in:M,F', 
            'nss' => 'nullable|numeric', 
            'isReEntry' => 'nullable|in:true,false',
        ];
    }
}
