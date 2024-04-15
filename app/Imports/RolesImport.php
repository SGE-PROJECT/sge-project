<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Secretary;
use Illuminate\Support\Str;
use App\Models\ManagmentAdmin;
use App\Models\AcademicAdvisor;
use App\Models\AcademicDirector;
use Spatie\Permission\Models\Role;
use App\Models\management\Division;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class RolesImport implements ToModel, WithHeadingRow, WithValidation
{

    public function model(array $row)
    {
        $division = Division::where('name', $row['division_name'])->first();


        $baseSlug = Str::slug($row['name'], '-');
        $slug = $baseSlug;
        $counter = 1;
        while (User::where('slug', $slug)->exists()) {
            $slug = "{$baseSlug}-{$counter}";
            $counter++;
        }

        $user = User::create([
            'name' => $row['name'],
            'email' => $row['email'],
            'password' => Hash::make($row['password']),
            'role' => $row['role'],
            'phone_number' => $row['phone_number'],
            'isActive' => true,
            'slug' => $slug,
            'curp' => $row['curp'],
            'birthdate' => $row['birthdate'],
            'sex' => $row['sex'],
            'nss' => $row['nss'],
        ]);

        $role = Role::where('name', $row['role'])->first();
        if ($role) {
            $user->assignRole($role->name);
        }

        switch ($row['role']) {
            case 'Asistente de Dirección':
                Secretary::create([
                    'user_id' => $user->id,
                    'division_id' => $division->id,
                    'payrol' => $row['payrol'],
                ]);
                break;
            case 'Presidente Académico':
                AcademicDirector::create([
                    'user_id' => $user->id,
                    'division_id' => $division->id,
                    'payrol' => $row['payrol'],
                ]);
                break;
            case 'Asesor Académico':
                AcademicAdvisor::create([
                    'user_id' => $user->id,
                    'division_id' => $division->id,
                    'payrol' => $row['payrol'],
                ]);
                break;
            case 'Administrador de División':
                ManagmentAdmin::create([
                    'user_id' => $user->id,
                    'division_id' => $division->id,
                    'payrol' => $row['payrol'],
                ]);
                break;
        }
    }

    public function headingRow(): int
    {
        return 1;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|exists:roles,name',
            'phone_number' => 'nullable|numeric',
            'division_name' => 'required|string|exists:divisions,name',
            'payrol' => 'required|numeric',
            'curp' => 'required|alpha_num|size:18',
            'birthdate' => 'nullable|string',
            'sex' => 'required|in:M,F',
            'nss' => 'nullable|numeric',
        ];

    }
}
