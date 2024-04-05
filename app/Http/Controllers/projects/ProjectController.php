<?php

namespace App\Http\Controllers\projects;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Projects\ProjectFormRequest;
use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Models\Scores;
use Illuminate\Support\Facades\DB;



class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Projects = Project::paginate();
        $enDesarrolloCount = $Projects->where('status', 'En desarrollo')->count();
        $reprobadosCount = $Projects->where('status', 'Reprobado')->count();
        $completadosCount = $Projects->where('status', 'Completado')->count();
        return view("projects.ProjectsDash.projectDashboard", compact('Projects', 'enDesarrolloCount', 'reprobadosCount', 'completadosCount'));
    }

    public function list()
    {
        $Projects = Project::all();
        
        $enDesarrolloCount = $Projects->where('status', 'En desarrollo')->count();
        $reprobadosCount = $Projects->where('status', 'Reprobado')->count();
        $completadosCount = $Projects->where('status', 'Completado')->count();
        return view("administrator.project")
            ->with(compact('Projects', 'enDesarrolloCount', 'reprobadosCount', 'completadosCount'));
    }
    public function dashgeneral()
    {
        $Projects = Project::all();
        $enDesarrolloCount = $Projects->where('status', 'En desarrollo')->count();
        $reprobadosCount = $Projects->where('status', 'Reprobado')->count();
        $completadosCount = $Projects->where('status', 'Completado')->count();
        return view("administrator.dashboard.dashboard-general")
            ->with(compact('Projects', 'enDesarrolloCount', 'reprobadosCount', 'completadosCount'));
    }
    public function invitation()
    {
        return view("projects.ProjectUser.ProjectUser");
    }

    public function dashboardproject()
    {
        $Projects = Project::with(['student.academicAdvisor'])->get();
        return view("projects.ProjectsDash.projectDashboard", compact('Projects'));
    }

    public function viewproject()
    {
        $Projects = Project::paginate(3);
        return view('projects.viewsproject.ProjectsView', compact('Projects'));
    }

    public function projectform()
    {
        return view("projects.Forms.FormStudent");
    }

    public function projectteams()
    {
        return view('projects.ProjectUser.projectteams');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectFormRequest $request)
    {
        $proyecto = new Project();
        $proyecto->fullname_student = $request->fullname_student;
        $proyecto->id_student = $request->id_student;
        $proyecto->group_student = Auth::user()->student->group->name;
        $proyecto->email_student = $request->email_student;
        $proyecto->phone_student = $request->phone_student;
        $proyecto->startproject_date = $request->startproject_date;
        $proyecto->endproject_date = $request->endproject_date;
        $proyecto->name_project = $request->name_project;
        $proyecto->company_name = $request->company_name;
        $proyecto->company_address = $request->company_address;
        $proyecto->advisor_business_name = $request->advisor_business_name;
        $proyecto->advisor_business_position = $request->advisor_business_position;
        $proyecto->advisor_business_phone = $request->advisor_business_phone;
        $proyecto->advisor_business_email = $request->advisor_business_email;
        $proyecto->project_area = $request->project_area;
        $proyecto->general_objective = $request->general_objective;
        $proyecto->problem_statement = $request->problem_statement;
        $proyecto->justification = $request->justification;
        $proyecto->activities = $request->activities;

        $proyecto->save();

        return Redirect::to('/projectdashboard')->withInput()->with('success', 'Proyecto guardado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {

        // Obtener el usuario autenticado
        $user = Auth::user();

        // Pasar el proyecto y el usuario a la vista
        return view('projects.Forms.show-formstudent', ['project' => $project, 'user' => $user]);
    }





    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $proyecto = Project::find($id);
        return view('projects.Forms.edit-formstudent', compact('proyecto'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectFormRequest $request, $id): RedirectResponse
    {
        $proyecto = Project::find($id);
        $proyecto->update($request->all());

        return redirect()->route('projects.index')->withInput()->with('success', 'Proyecto actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $project = Project::find($id);
        if (!$project) {
            return back()->with('error', '¡No se pudo encontrar el proyecto para eliminar!');
        }
        $deleted = $project->delete();
        if ($deleted) {
            return redirect()->route('dashboardProjects')->with('success', '¡El proyecto ha sido eliminado exitosamente!');
        } else {
            return back()->with('error', '¡Se produjo un error al eliminar el proyecto!');
        }
    }


    public function rateProject(Request $request, $projectId)
    {
        $user = Auth::user();

        // Verificar si el usuario ya asignó una calificación al proyecto
        $existingScore = Scores::where('user_id', $user->id)
            ->where('project_id', $projectId)
            ->first();

        if ($existingScore) {
            return redirect()->back()->with('error', 'Ya has asignado una calificación a este proyecto. No puedes cambiar tu calificación.');
        }

        // Crear una nueva puntuación
        Scores::create([
            'user_id' => $user->id,
            'project_id' => $projectId,
            'score' => $request->input('score'),
        ]);

        // Calcular el total de puntuaciones para el proyecto
        $totalScore = Scores::where('project_id', $projectId)->sum('score');

        // Actualizar el campo 'total_score' en la tabla 'Scores' con la nueva calificación
        $projectScores = Scores::where('project_id', $projectId)->get();
        foreach ($projectScores as $score) {
            $score->total_score = $totalScore;
            $score->save();
        }

        return redirect()->back()->with('success', 'Calificación asignada exitosamente al proyecto.');
    }
}
