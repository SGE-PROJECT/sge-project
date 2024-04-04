<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class UserExport implements FromCollection, WithHeadings, WithMapping
{
    use \Maatwebsite\Excel\Concerns\Exportable;

    public function collection()
    {
        // Cargar previamente la relación roles para optimizar la consulta
        return User::with('roles')->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Email',
            'Identifier Number',
            'Roles', // Cambiado de 'Role' a 'Roles' para reflejar que puede haber múltiples
            'Division ID',
            'Phone Number',
            'Avatar',
            'Is Active',
            // Agrega más cabeceras según sea necesario
        ];
    }

    public function map($user): array
    {
        return [
            $user->id,
            $user->name,
            $user->email,
            $user->identifier_number,
            implode(', ', $user->roles->pluck('name')->toArray()), // Modificado para usar la relación cargada y unir todos los nombres de roles
            $user->division_id,
            $user->phone_number,
            $user->avatar,
            $user->isActive ? 'Yes' : 'No',
        ];
    }
}
