<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Student;
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

class UsersImport implements ToModel, WithHeadingRow, WithValidation
{
    public function model(array $row)
    {
        dd($row);
        return new User([
            'name'           => $row['nombre'],
            'email'          => $row['correo_electronico'],
            'slug'           => Str::slug($row['nombre'] . '-' . uniqid()), // Asegúrate de que sea único
            'password'       => Hash::make($row['contrasena'] ?? 'passwordPredeterminada'), // Asume una contraseña predeterminada si no se proporciona
            'phone_number'   => $row['numero_de_telefono'] ?? '',
            'isActive'       => strtolower($row['activo']) === 'si',
        ]);
    }

    public function headingRow(): int
    {
        return 1; // Asegura que la fila de encabezados es la primera fila
    }

    public function rules(): array
    {
        return [
            '*.nombre'             => 'required|string|max:255',
            '*.correo_electronico' => 'required|email|unique:users,email',
            '*.numero_de_identificacion' => 'nullable|string',
            '*.numero_de_telefono' => 'nullable|string|max:20',
            '*.activo'             => 'required|string|in:si,no',
            // No se requieren reglas de validación para contraseña ya que se asume una predeterminada
        ];
    }
}