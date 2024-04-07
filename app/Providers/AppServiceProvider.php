<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
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

        //Usuarios
        View::composer('administrator.graphs.graph-users', function ($view) {
            $activeUsersCount = User::where('isActive', true)->count();

            // Cualquier otro conteo o datos específicos que necesites
            // Por ejemplo, si tienes diferentes roles de usuarios y quieres contarlos:
            // $adminsCount = User::role('admin')->count();
            // $editorsCount = User::role('editor')->count();

            $view->with(compact('activeUsersCount'));
        });
    }
}
