<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Project;

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
    }
}
