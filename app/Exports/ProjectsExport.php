<?php

namespace App\Exports;

use App\Models\Project;
use App\Models\ProjectStudent;
use App\Models\User;
use App\Models\Student;
use App\Models\AcademicAdvisor;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ProjectsExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
    public function collection()
    {
        // Recoge todos los proyectos con sus estudiantes principales y detalles relevantes
        return Project::where('is_project', 1)
            ->with(['students' => function($query) {
                $query->wherePivot('is_main_student', 1)
                    ->with([
                        'user',
                        'group.program.division',
                        'academicAdvisor.user'
                    ]);
            }])->get();
    }

    public function headings(): array
    {
        return [
            'Nombre del Proyecto',
            'Estado del Proyecto',
            'Estudiante Principal',
            'Matrícula del Estudiante',
            'Carrera',
            'División',
            'Asesor Académico',
            'Nómina del Asesor',
            'Fecha de Inicio',
        ];
    }

    public function map($project): array
    {
        // Asume que siempre hay al menos un estudiante principal asociado al proyecto
        $student = $project->students->first();

        return [
            $project->name_project,
            $project->status,
            $student ? $student->user->name : 'N/A',
            $student ? $student->registration_number : 'N/A',
            $student ? $student->group->program->name : 'N/A',
            $student ? $student->group->program->division->name : 'N/A',
            $student && $student->academicAdvisor ? $student->academicAdvisor->user->name : 'N/A',
            $student && $student->academicAdvisor ? $student->academicAdvisor->payrol : 'N/A',
            $project->startproject_date,
        ];
    }
}
