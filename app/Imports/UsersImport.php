<?php

namespace App\Imports;

use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Models\management\Division;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class UsersImport implements ToModel, WithHeadingRow, WithValidation
{
    public function model(array $row)
    {
        $user = User::updateOrCreate(
            ['email' => $row['correo_electronico']], // Usando los encabezados en español
            [
                'name' => $row['nombre'],
                'identifier_number' => $row['numero_de_identificacion'],
                'phone_number' => $row['numero_de_telefono'],
                'isActive' => strtolower($row['activo']) === 'sí' ? true : false, // Asumiendo que 'activo' podría ser 'Sí'/'No'
                'password' => Hash::make('defaultPassword'), // Considera manejar esto de manera más segura
            ]
        );

        // Asignación de roles
        if (!empty($row['roles'])) {
            $user->roles()->detach(); // Remover roles existentes
            $rolesNames = explode(', ', $row['roles']);
            foreach ($rolesNames as $roleName) {
                $role = Role::firstOrCreate(['name' => trim($roleName)]);
                $user->assignRole($role);
            }
        }

        // Asignación de división
        if (!empty($row['division'])) {
            $division = Division::firstOrCreate(['name' => $row['division']]);
            $user->division()->associate($division);
            $user->save();
        }

        return $user;
    }

    public function headingRow(): int
    {
        return 1;
    }

    public function rules(): array
    {
        return [
            'correo_electronico' => 'required|email|unique:users,email',
            // Añade aquí más reglas según sea necesario
        ];
    }
}
