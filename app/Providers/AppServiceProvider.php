<?php

namespace App\Providers;

use App\Models\AcademicAdvisor;
use App\Models\management\Program;
use App\Models\ManagmentAdmin;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Spatie\Permission\Models\Role;
use App\Models\Project;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer(['administrator.graphs.graph-projects', 'administrator.section-projects'], function ($view) {
            $Projects = Project::where('is_project', 1)->get();
            $enCursoCount = $Projects->where('status', 'En curso')->count();
            $reprobadosCount = $Projects->where('status', 'Reprobado')->count();
            $finalizadosCount = $Projects->where('status', 'Finalizado')->count();
            $totalProjectsCount = $Projects->count();

            // Calcular porcentajes
            $enCursoPercentage = $totalProjectsCount > 0 ? ($enCursoCount / $totalProjectsCount) * 100 : 0;
            $reprobadosPercentage = $totalProjectsCount > 0 ? ($reprobadosCount / $totalProjectsCount) * 100 : 0;
            $finalizadosPercentage = $totalProjectsCount > 0 ? ($finalizadosCount / $totalProjectsCount) * 100 : 0;

            $view->with(compact(
                'Projects',
                'totalProjectsCount',
                'enCursoCount',
                'reprobadosCount',
                'finalizadosCount',
                'enCursoPercentage',
                'reprobadosPercentage',
                'finalizadosPercentage'
            ));
    });

        //Anteproyectos
        View::composer(['administrator.graphs.graph-anteprojects', 'administrator.section-anteprojects'], function ($view) {
            $Anteprojects = Project::where('is_project', 0)->get();
            $registradosCount = $Anteprojects->where('status', 'Registrado')->count();
            $enRevisionCount = $Anteprojects->where('status', 'En revision')->count();
            $rechazadosCount = $Anteprojects->where('status', 'Rechazados')->count();
            $totalAnteprojectsCount = $Anteprojects->count();

            // Calcular porcentajes
            $registradosPercentage = $totalAnteprojectsCount > 0 ? ($registradosCount / $totalAnteprojectsCount) * 100 : 0;
            $enRevisionPercentage = $totalAnteprojectsCount > 0 ? ($enRevisionCount / $totalAnteprojectsCount) * 100 : 0;
            $rechazadosPercentage = $totalAnteprojectsCount > 0 ? ($rechazadosCount / $totalAnteprojectsCount) * 100 : 0;

            $view->with(compact(
                'Anteprojects',
                'registradosCount',
                'enRevisionCount',
                'rechazadosCount',
                'totalAnteprojectsCount',
                'registradosPercentage',
                'enRevisionPercentage',
                'rechazadosPercentage'
            ));
        });

        //Usuarios
        View::composer(['administrator.graphs.graph-users', 'administrator.section-users'], function ($view) {
            $activeUsersCount = User::where('isActive', true)->count();

            // Obtener los roles por nombre y contar los usuarios
            $superAdminCount = Role::findByName('Super Administrador')->users()->count();
            $managmentAdminCount = Role::findByName('Administrador de División')->users()->count();
            $adviserCount = Role::findByName('Asesor Académico')->users()->count();
            $studentCount = Role::findByName('Estudiante')->users()->count();
            $presidentCount = Role::findByName('Presidente Académico')->users()->count();
            $secretaryCount = Role::findByName('Asistente de Dirección')->users()->count();

            // Calcular porcentajes
            $superAdminPercentage = $activeUsersCount > 0 ? number_format(($superAdminCount / $activeUsersCount) * 100, 2) : 0;
            $managmentAdminPercentage = $activeUsersCount > 0 ? number_format(($managmentAdminCount / $activeUsersCount) * 100, 2) : 0;
            $adviserPercentage = $activeUsersCount > 0 ? number_format(($adviserCount / $activeUsersCount) * 100, 2) : 0;
            $studentPercentage = $activeUsersCount > 0 ? number_format(($studentCount / $activeUsersCount) * 100, 2) : 0;
            $presidentPercentage = $activeUsersCount > 0 ? number_format(($presidentCount / $activeUsersCount) * 100, 2) : 0;
            $secretaryPercentage = $activeUsersCount > 0 ? number_format(($secretaryCount / $activeUsersCount) * 100, 2) : 0;

            // Pasar estos conteos y porcentajes a la vista
            $view->with(compact(
                'activeUsersCount',
                'superAdminCount',
                'managmentAdminCount',
                'adviserCount',
                'studentCount',
                'presidentCount',
                'secretaryCount',
                'superAdminPercentage',
                'managmentAdminPercentage',
                'adviserPercentage',
                'studentPercentage',
                'presidentPercentage',
                'secretaryPercentage'
            ));
        });

        View::composer(['administrator.graphs.graph-students-dash', 'administrator.section-students', 'administrator.managementAdmin.student-dash'], function ($view) {
            // Obtener el usuario autenticado
            $user = Auth::user();
        
            // Inicializar variables para almacenar la información de los programas y el conteo total de estudiantes
            $programsData = [];
            $totalStudentsInDivision = 0;
        
            if ($user && $user->hasRole('Administrador de División')) {
                // Obtener el ID de la división del administrador de división
                $divisionId = ManagmentAdmin::where('user_id', $user->id)->select('division_id')->first();
        
                $programs = Program::where('division_id', $divisionId->division_id)
                ->with(['groups' => function ($query) {
                    $query->withCount('students');
                }])
                ->get()
                ->map(function ($program) {
                    // Suma el conteo de estudiantes de todos los grupos asociados a cada programa
                    $program->students_count = $program->groups->sum('students_count');
                    return $program;
                });

        
                foreach ($programs as $program) {
                    // El conteo de estudiantes ya se obtuvo mediante 'withCount'
                    $studentCount = $program->students_count;
        
                    // Sumar al total de estudiantes en la división
                    $totalStudentsInDivision += $studentCount;
        
                    // Añadir la información del programa y el conteo de estudiantes al array
                    $programsData[] = [
                        'program_name' => $program->name,
                        'student_count' => $studentCount,
                        // El porcentaje se inicializa en 0 y se calculará después de conocer el total de estudiantes
                        'percentage' => 0
                    ];
                }
        
                // Calcular y asignar el porcentaje de estudiantes por programa respecto al total de la división
                foreach ($programsData as $key => $programData) {
                    if ($totalStudentsInDivision > 0) {
                        $programsData[$key]['percentage'] = number_format(($programData['student_count'] / $totalStudentsInDivision) * 100, 2);
                    }
                }
            }
        
            // Pasar la información de los programas, el total de estudiantes y los porcentajes a la vista
            $view->with('programsData', $programsData)->with('totalStudentsInDivision', $totalStudentsInDivision);
        });

        //Asesores
      View::composer(['administrator.graphs.graph-advisor', 'administrator.managementAdmin.advisor-dash'], function ($view) {
    // Obtener el usuario autenticado
    $user = Auth::user();

    // Inicializar datos de asesores
    $advisorData = [
        'totalAdvisorsInDivision' => 0,
        'divisionName' => null,
    ];

    if ($user && $user->hasRole('Administrador de División')) {
        // Obtener la información de la división del administrador de división
        $division = ManagmentAdmin::where('user_id', $user->id)
                      ->with('division') // Asegúrese de tener una relación 'division' en el modelo ManagmentAdmin
                      ->first();

        if ($division && $division->division) {
            // Obtener el total de asesores académicos para la división
            $advisorData['totalAdvisorsInDivision'] = AcademicAdvisor::where('division_id', $division->division_id)->count();
            // Asignar el nombre de la división
            $advisorData['divisionName'] = $division->division->name;
        }
    }

    // Pasar los datos de asesores a la vista
    $view->with('advisorData', $advisorData);
});
        
        
    }
}
