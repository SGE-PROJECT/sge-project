<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize; // Importa la interfaz

class UsersExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
    public function collection()
    {
        $users = User::with([
            'student.group.program.division',
            'secretary.division',
            'academicDirector.division',
            'academicAdvisor.division',
            'managmentAdmin.division',
            'roles'
        ])->get();

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

        return $users;
    }

    public function headings(): array
    {
        return [
            'Nombre',
            'Correo Electrónico',
            'Rol',
            'División',
            'Número de Teléfono',
            'Estado'
        ];
    }

    public function map($user): array
    {
        return [
            $user->name,
            $user->email,
            $user->roles->pluck('name')->implode(', '),
            $user->division_name,
            $user->phone_number,
            $user->isActive ? 'Activo' : 'Inactivo'
        ];
    }
}
