<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Spatie\Permission\Models\Role;
use App\Models\Project;
use App\Models\User;

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
    }
}
