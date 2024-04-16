<?php

namespace App\Http\Controllers\studentDash;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Student;
use App\Models\Secretary;
use App\Models\ManagmentAdmin;
use App\Models\AcademicAdvisor;
use App\Models\AcademicDirector;
use Spatie\Permission\Models\Role;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\UsersExport;
use App\Exports\ProjectsExport;
use App\Exports\AnteprojectsExport;
use App\Models\Project;
use App\Models\ProjectStudent;

class AdminExportController extends Controller
{
        //Mapear usuarios en la vista DashboardUsers
        public function dashboardUsers()
        {
            $users = User::with([
                'student.group.program.division',
                'secretary.division',
                'academicDirector.division',
                'academicAdvisor.division',
                'managmentAdmin.division',
                'roles' // Asegúrate de incluir la relación de roles también
            ])->paginate(10);

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

            // Contar el total de usuarios por cada rol
            $superAdminCount = Role::findByName('Super Administrador')->users()->count();
            $managmentAdminCount = Role::findByName('Administrador de División')->users()->count();
            $adviserCount = Role::findByName('Asesor Académico')->users()->count();
            $studentCount = Role::findByName('Estudiante')->users()->count();
            $presidentCount = Role::findByName('Presidente Académico')->users()->count();
            $secretaryCount = Role::findByName('Asistente de Dirección')->users()->count();

            return view('administrator.dashboard.DashboardUsers', compact('users', 'superAdminCount', 'managmentAdminCount', 'adviserCount', 'studentCount', 'presidentCount', 'secretaryCount'));
        }

    //Exportar usuarios en Excel
    public function exportExcel()
    {
        return Excel::download(new UsersExport, 'usuarios.xlsx');
    }

    //Exportar usuarios en PDF
    public function exportPdf()
    {
        $users = User::with([
            'student.group.program.division',
                'secretary.division',
                'academicDirector.division',
                'academicAdvisor.division',
                'managmentAdmin.division',
                'roles' // Asegúrate de incluir la relación de roles también
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

        $pdf = Pdf::loadView('exports.users_pdf', compact('users'));
        $pdf->setPaper('letter', 'landscape'); // Setea el papel a Carta en horizontal
        return $pdf->download('usuarios.pdf');
    }

    //Exportar proyectos a PDF
    public function exportProjectsPdf()
    {
        $projects = Project::where('is_project', 1)
            ->with(['students' => function($query) {
                $query->wherePivot('is_main_student', 1)
                    ->with([
                        'user',
                        'group.program.division',
                        'academicAdvisor.user'
                    ]);
            }])->get();

        $pdf = PDF::loadView('exports.projects_pdf', compact('projects'));
        $pdf->setPaper('letter', 'landscape'); // Ajusta el tamaño del papel a Carta en orientación horizontal
        return $pdf->download('proyectos.pdf');
    }

    //Exportar proyectos a Excel
    public function exportProjectsExcel()
    {
        return Excel::download(new ProjectsExport, 'proyectos.xlsx');
    }

    //Exportar anteproyectos a PDF
    public function exportAnteprojectsPdf()
    {
        $anteprojects = Project::where('is_project', 0)
            ->with(['students' => function($query) {
                $query->wherePivot('is_main_student', 1)
                    ->with([
                        'user',
                        'group.program.division',
                        'academicAdvisor.user'
                    ]);
            }])->get();

        $pdf = PDF::loadView('exports.anteprojects_pdf', compact('anteprojects'));
        $pdf->setPaper('letter', 'landscape'); // Ajusta el tamaño del papel a Carta en orientación horizontal
        return $pdf->download('anteproyectos.pdf');
    }

    //Exportar anteproyectos a Excel
    public function exportAnteprojectsExcel()
    {
        return Excel::download(new AnteprojectsExport, 'anteproyectos.xlsx');
    }

}
