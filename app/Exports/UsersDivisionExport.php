<?php

namespace App\Exports;

use App\Models\ManagmentAdmin;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class UsersDivisionExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize,  WithStyles
{


    public function collection()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Debe estar autenticado para realizar esta acción');
        }
        $role = $user->getRoleNames()->first(); // Obtener el primer rol asignado al usuario

        if ($role !== 'Administrador de División') {
            return redirect()->back()->with('error', 'Acceso no autorizado');
        }
        $divisionId = optional(ManagmentAdmin::where('user_id', $user->id)->first())->division_id;
        if (!$divisionId) {
            return redirect()->back()->with('error', 'No se encontró la división asociada al usuario');
        }
        if (!$divisionId) {
            return collect(); // Devolver una colección vacía
        }

        // Obtener los usuarios que pertenecen a la misma división que el usuario logueado
        $users = User::whereHas('roles', function ($query) {
            $query->where('name', '!=', 'Super Admin'); // Excluir al Super Admin
        })
            ->where(function ($query) use ($divisionId) {
                $query->whereHas('student.group.program.division', function ($query) use ($divisionId) {
                    $query->where('id', $divisionId);
                })
                    ->orWhereHas('secretary.division', function ($query) use ($divisionId) {
                        $query->where('id', $divisionId);
                    })
                    ->orWhereHas('academicDirector.division', function ($query) use ($divisionId) {
                        $query->where('id', $divisionId);
                    })
                    ->orWhereHas('academicAdvisor.division', function ($query) use ($divisionId) {
                        $query->where('id', $divisionId);
                    })
                    ->orWhereHas('managmentAdmin.division', function ($query) use ($divisionId) {
                        $query->where('id', $divisionId);
                    });
            })
            ->with([
                'student.group.program.division',
                'secretary.division',
                'academicDirector.division',
                'academicAdvisor.division',
                'managmentAdmin.division',
                'roles'
            ])
            ->get();

        // Agregar el nombre de la división al usuario
        $users->each(function ($user) {
            $user->division_name = $user->division ? $user->division->name : 'Sin División';
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

    public function styles(Worksheet $sheet)
    {
        return [
            'A:F' => [
                'font' => [
                    'name' => 'Arial',
                    'size' => 10
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
                ]
            ],
            1 => [
                'font' => [
                    'bold' => true
                ]
            ]
        ];
    }
}
