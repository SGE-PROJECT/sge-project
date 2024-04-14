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
use App\Models\Project_students;
use Illuminate\Http\RedirectResponse;
use App\Models\Scores;
use App\Models\Student;


class ProjectController extends Controller
{
    // Vista del dashboard
    public function index()
    {
        $Projects = Project::paginate();
        $enDesarrolloCount = $Projects->where('status', 'En desarrollo')->count();
        $reprobadosCount = $Projects->where('status', 'Reprobado')->count();
        $completadosCount = $Projects->where('status', 'Completado')->count();
        return view("projects.ProjectsDash.projectDashboard", compact('Projects', 'enDesarrolloCount', 'reprobadosCount', 'completadosCount'));
    }


    public function dashgeneral()
    {
        $Projects = Project::where('is_project', 1)->paginate(10);
        $enCursoCount = $Projects->where('status', 'En curso')->count();
        $reprobadosCount = $Projects->where('status', 'Reprobado')->count();
        $finalizadosCount = $Projects->where('status', 'Finalizado')->count();
        $aprobadosCount = $Projects->where('status', 'Aprobado')->count();
        return view("administrator.project")
            ->with(compact('Projects', 'enCursoCount', 'reprobadosCount', 'finalizadosCount', 'aprobadosCount'));
    }


    public function dashAnteprojects()
    {
        $Anteprojects = Project::where('is_project', 0)->get();
        $registradosCount = $Anteprojects->where('status', 'Registrado')->count();
        $enRevisionCount = $Anteprojects->where('status', 'En revision')->count();
        $rechazadosCount = $Anteprojects->where('status', 'Rechazados')->count();
        return view("administrator.dashboard.DashboardAnteprojects")
          ->with(compact('Anteprojects', 'registradosCount', 'enRevisionCount', 'rechazadosCount'));
    }


    // Vista del usuario. En esta el usuario puede invitar colaboradores, ver su equipo, crear y editar proyectos.
    public function invitation()
    {
        // Verificar si el usuario tiene el rol de Estudiante
        if (Auth::user()->roles->contains('name', 'Estudiante')) {
            // Si el usuario tiene el rol de Estudiante, permitir el acceso a la vista
            return view("projects.ProjectUser.ProjectUser");
        } else {
            // Si el usuario no tiene el rol de Estudiante, redirigir al index con un mensaje de error
            return redirect()->route('dashboardProjects')->with('error', 'No tienes permiso para acceder a esta página.');
        }
    }


    // Dashboard de proyectos y anteproyectos con las gráficas
    public function dashboardproject()
    {
        $Projects = Project::with(['student.academicAdvisor'])->get();
        return view("projects.ProjectsDash.projectDashboard", compact('Projects'));
    }


    // Vista para contenido de antreproyectos relacionado a las vistas de Listado de Anteproyecto
    public function viewanteproject()
    {
        $Projects = Project::where('is_project', false)->paginate(3);
        return view('projects.viewsproject.ProjectsView', compact('Projects'));
    }


    // Vista para contenido de proyectos relacionado con la vista de Listado de Proyectos
    public function viewproject()
    {
        $Projects = Project::where('is_project', true)->paginate(3);
        return view('projects.viewsproject.AnteprojectsView', compact('Projects'));
    }


    // Formulario de creación de proyecto. Si el estudiante ya tiene un proyecto, entonces es enviado a la vista de editar.
    public function projectform()
    {
        // Obtener el usuario autenticado
        $user = Auth::user();

        // Verificar si el usuario ya tiene un proyecto creado
        $existingProject = project_students::where('student_id', $user->id)->first();

        if ($existingProject) {
            // Si el usuario ya tiene un proyecto creado, redirigir a la vista de edición
            return $this->edit($existingProject->id); //showMyProject
        } else {
            // Si el usuario no tiene un proyecto creado, redirigir a la ruta para crear un nuevo proyecto
            return view("projects.Forms.FormStudent");
        }
    }


    public function projectteams()
    {
        return view('projects.ProjectUser.projectteams');
    }


    //Store del controlador
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


        // Estados asignados prod efecto al guardar una cédula nueva.
        $proyecto->status = 'Registrado'; // Estado "Registrado" por defecto
        $proyecto->is_project = 0; // No marcar como proyecto

        $proyecto->save();

        $student = Student::where('user_id', Auth::user()->id)->first();
        Project_students::create([
            'student_id' => $student->id,
            'project_id' => $proyecto->id,
            'is_main_student' => true,
        ]);

        return redirect()->route('home');
        // return Redirect::to('/proyectoinvitacion')->withInput()->with('success', 'Proyecto guardado correctamente.');
    }


    //Vista del Asesor para asignar Likes, Comentarios y Calificar
    public function show(Project $project)
    {
        // Obtener el usuario autenticado
        $user = Auth::user();

        // Pasar el proyecto y el usuario a la vista
        return view('projects.Forms.show-formstudent', ['project' => $project, 'user' => $user]);
    }


    // Vista del estudiante para editar su cédula
    public function showMyProject()
    {
        $user = Auth::user();
        $student = Student::where('user_id', $user->id)->first();
        $Project = $student->projects()->first();


        $proyecto = Project::find($Project->id);

        if ($proyecto) {
            if ($proyecto->is_project) {
                return view('projects.Forms.show-project', compact('proyecto', 'student'));
            } else {
                return view('projects.Forms.show-anteproject', compact('proyecto', 'student'));
            }
        } else {
            return redirect()->route('projects.index')->with('error', 'El proyecto no existe.');
        }

    }


    //Vista para editar proyecto por parte del estudiante??? El edit es la función ShowMyProject
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


    // Update de una cédula
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

            // Redireccionar según el tipo de usuario
        if (Auth::user()->roles->contains('name', 'Estudiante')) {
            return redirect()->route('home')->withInput()->with('success', 'Proyecto actualizado correctamente.');
        } else if (Auth::user()->roles->contains('name', 'Asesor Académico')) {
            return redirect()->route('home')->withInput()->with('success', 'Proyecto actualizado correctamente.');
        }

        // En caso de que el usuario no tenga ningún rol válido, se puede redirigir a una página de error o a una página por defecto
        return redirect()->route('home')->with('error', 'Rol de usuario no válido.');
    }

    // Eliminar una cédula
    public function destroy(Project $project)
    {
        // Eliminar los registros relacionados en la tabla project_students
        $project->students()->detach();

        // Eliminar el proyecto
        $project->delete();

        return redirect()->route('home')->with('success', 'Proyecto eliminado correctamente.');
    }


    // Esta función permite asignar un puntaje a un proyecto. Solo se puede asignar puntaje una vez.
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
