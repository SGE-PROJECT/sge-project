<?php

namespace App\Exports;

use App\Models\ManagmentAdmin;
use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\Exportable;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Illuminate\Support\Facades\Auth;

class StudentsExport implements FromQuery, WithHeadings, WithStyles, ShouldAutoSize, WithColumnFormatting
{
    use Exportable;

    public function query()
    {
        $user = Auth::user();
        if ($user && $user->getRoleNames()->first() === 'Administrador de División') {
            $divId = ManagmentAdmin::where('user_id', $user->id)->select('division_id')->first();
            if ($divId) {
                return Student::query()
                    ->join('groups', 'students.group_id', '=', 'groups.id')
                    ->join('academic_advisors', 'students.academic_advisor_id', '=', 'academic_advisors.id')
                    ->join('users as advisor_users', 'academic_advisors.user_id', '=', 'advisor_users.id')
                    ->join('programs', 'groups.program_id', '=', 'programs.id')
                    ->join('divisions', 'programs.division_id', '=', 'divisions.id')
                    ->join('users as student_users', 'students.user_id', '=', 'student_users.id')
                    ->where('divisions.id', $divId->division_id)
                    ->select(
                        'students.registration_number as student_matricula',
                        'student_users.name as student_name',
                        'student_users.email as student_email',
                        'groups.name as group_name',
                        'advisor_users.name as advisor_name',
                        'programs.name as program_name'
                    );
            }
        }
        return null; // En caso de que no haya usuario autenticado o no se encuentre la división.
    }

    public function headings(): array
    {
        return [
            'Matrícula',
            'Nombre del Estudiante',
            'Email',
            'Grupo',
            'Nombre del Asesor',
            'Programa'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Aplica estilo a la primera fila
            1    => ['font' => ['bold' => true, 'size' => 12]],
            // Puedes definir más estilos aquí
        ];
    }

    public function columnFormats(): array
    {
        return [
            'C' => NumberFormat::FORMAT_NUMBER,
            // Puedes definir más formatos aquí
        ];
    }
}
