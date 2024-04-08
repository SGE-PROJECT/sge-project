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
        View::composer('administrator.graphs.graph-projects', function ($view) {
            $Projects = Project::all();
            $enDesarrolloCount = $Projects->where('status', 'En desarrollo')->count();
            $reprobadosCount = $Projects->where('status', 'Reprobado')->count();
            $completadosCount = $Projects->where('status', 'Completado')->count();
            $totalProjectsCount = $Projects->count();

            $view->with(compact('Projects', 'enDesarrolloCount', 'reprobadosCount', 'completadosCount', 'totalProjectsCount'));
        });


        //Anteproyectos
        View::composer('administrator.graphs.graph-anteprojects', function ($view) {
            $Anteprojects = Project::where('is_project', 0)->get();
            $registradosCount = $Anteprojects->where('status', 'Registrado')->count();
            $enRevisionCount = $Anteprojects->where('status', 'En revision')->count();
            $rechazadosCount = $Anteprojects->where('status', 'Rechazados')->count();
            $totalAnteprojectsCount = $Anteprojects->count();

            $view->with(compact('Anteprojects', 'registradosCount', 'enRevisionCount', 'rechazadosCount', 'totalAnteprojectsCount'));
        });

        //Usuarios
        View::composer('administrator.graphs.graph-users', function ($view) {
            $activeUsersCount = User::where('isActive', true)->count();

                // Obtener los roles por nombre
                $superAdminCount = Role::findByName('Super Administrador')->users()->count();
                $managmentAdminCount = Role::findByName('Administrador de División')->users()->count();
                $adviserCount = Role::findByName('Asesor Académico')->users()->count();
                $studentCount = Role::findByName('Estudiante')->users()->count();
                $presidentCount = Role::findByName('Presidente Académico')->users()->count();
                $secretaryCount = Role::findByName('Asistente de Dirección')->users()->count();

                // Pasar estos conteos a la vista
                $view->with(compact('activeUsersCount','superAdminCount', 'managmentAdminCount', 'adviserCount', 'studentCount', 'presidentCount', 'secretaryCount'));
            });
    }
}
