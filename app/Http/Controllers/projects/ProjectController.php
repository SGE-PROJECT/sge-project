<?php

namespace App\Http\Controllers\projects;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectEdit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Projects\ProjectFormRequest;
use App\Models\AcademicAdvisor;
use App\Models\BusinessAdvisor;
use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Models\Scores;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;




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
        return view("administrator.project")
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
        $Projects = Project::where('is_project', false)->paginate(3);
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
        // Obtener el usuario autenticado
        $user = Auth::user();

        // Verificar si el usuario ya tiene un proyecto creado
        $existingProject = Project::where('user_id', $user->id)->first();

        if ($existingProject) {
            return redirect()->back()->with('error', 'Ya has creado un anteproyecto. No puedes crear otro.');
        }

        // Si el usuario no tiene ningún proyecto creado, mostrar el formulario de creación
        return view('projects.Forms.FormStudent');
       //return view('projects.ProjectsDash.projectDashboard');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectFormRequest $request)
    {

        $business_advisor = BusinessAdvisor::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'position' => $request->position,

        ]);

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
        $proyecto->business_advisor_id = $business_advisor->id;
        $proyecto->project_area = $request->project_area;
        $proyecto->general_objective = $request->general_objective;
        $proyecto->problem_statement = $request->problem_statement;
        $proyecto->justification = $request->justification;
        $proyecto->activities = $request->activities;


        // Verificar qué botón se presionó
        if ($request->action == 'publicar') {
            $proyecto->status = 'En revision'; // Estado "Publicado"
            $proyecto->is_project = 1; // Marcar como proyecto
        } else {
            $proyecto->status = 'Registrado'; // Estado "Registrado" por defecto
            $proyecto->is_project = 0; // No marcar como proyecto
        }

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
    
        if ($proyecto) {
            if ($proyecto->is_project) {
                // Redirigir a la vista para proyectos
                return view('projects.Forms.edit-formstudent-isproject', compact('proyecto'));
            } else {
                // Redirigir a la vista para no proyectos
                return view('projects.Forms.edit-formstudent', compact('proyecto'));
            }
        } else {
            // Manejar el caso en que el proyecto no existe
            return redirect()->route('projects.index')->with('error', 'El proyecto no existe.');
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectEdit $request, $id): RedirectResponse
    {

        $proyecto = Project::find($id);
        $proyecto->update($request->all());

        $getBusinessAdvisor = BusinessAdvisor::find($proyecto->business_advisor_id);

        $getBusinessAdvisor->update(
            [
                'name' => $request->advisor_business_name,
                'email' => $request->advisor_business_email,
                'phone' => $request->advisor_business_phone,
                'position' => $request->advisor_business_position,
            ]
        );

        // Verificar si se está publicando el proyecto  
        if ($request->status === 'En curso') {
            $proyecto->status = 'En curso'; // Estado "Aprobado"
            $proyecto->is_project = 1; // Marcar como proyecto
            $proyecto->save();
        }
        

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
        // Obtener el usuario actual
        $user = Auth::user();

        $getAdvisorId = AcademicAdvisor::where('user_id', $user->id)->first();

        // Verificar si el usuario es un estudiante
        if ($user->roles->contains('name', 'Estudiante')) {
            // Si el usuario es un estudiante, redirigir con un mensaje de error
            return redirect()->back()->with('error', 'Los estudiantes no pueden asignar puntajes a proyectos.');
        }

        // Si el usuario no es un estudiante, proceder con la asignación de puntaje
        // Verificar si el usuario ya asignó una calificación al proyecto
        $existingScore = Scores::where('academic_advisor_id', $getAdvisorId->id)
            ->where('project_id', $projectId)
            ->first();

        if ($existingScore) {
            return redirect()->back()->with('error', 'Ya has asignado una calificación a este proyecto. No puedes cambiar tu calificación.');
        }

        // Crear una nueva puntuación
        Scores::create([
            'academic_advisor_id' => $getAdvisorId->id,
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
