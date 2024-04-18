<?php

namespace App\Http\Controllers;

use App\Models\AcademicAdvisor;
use Illuminate\Support\Facades\Auth;
use App\Models\Project;
use App\Models\Project_likes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProjectLikeController extends Controller
{
    public function store(Request $request, Project $project)
    {
        if (Auth::check()) {
            $user = Auth::user();

            $getAcademicAdvisorId = AcademicAdvisor::where('user_id', $user->id)->first();

            $existingLike = Project_likes::where('academic_advisor_id', $getAcademicAdvisorId->id)
                ->where('project_id', $project->id)
                ->first();

            if (!$existingLike) {
                $like = new Project_likes();
                $like->academic_advisor_id = $getAcademicAdvisorId->id;
                $like->project_id = $project->id;
                $like->save();

                // Verificar si se han registrado al menos tres likes para este proyecto
                $likeCount = Project_likes::where('project_id', $project->id)->count();

                if ($likeCount >= 3) {
                    // Llamar al método para actualizar el estado del proyecto
                    $this->updateProjectStatus($project->id);
                }

                return redirect()->back()->with('success', '¡Like agregado correctamente!');
            } else {
                $existingLike->delete();
                return redirect()->back()->with('error', '¡Like eliminado correctamente!');
            }
        } else {
            return redirect()->route('login')->with('error', '¡Debes iniciar sesión para dar like a un proyecto!');
        }
    }

    // Método para actualizar el estado del proyecto si se cumplen las condiciones
    private function updateProjectStatus($projectId)
    {
        // Obtener el proyecto
        $project = Project::find($projectId);

        // Verificar si el proyecto existe
        if ($project) {
            // Actualizar el estado del proyecto
            $project->status = 'En curso';
            $project->is_project = 1;
            $project->save();
        }
    }
}
