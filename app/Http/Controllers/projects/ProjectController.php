<?php

namespace App\Http\Controllers\projects;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Projects\ProjectFormRequest;
use App\Models\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /*¿Cómo recuperar todos los registros? Se usa el Modelo*/
        $Projects = Project::paginate();

        return view("projects.ProjectsDash.projectDashboard", compact('Projects'));
    }

    public function invitation()
    {
        return view("projects.ProjectUser.ProjectUser");
    }

    public function dashboardproject()
    {
        return view("projects.ProjectsDash.projectDashboard");
    }

    public function viewproject()
    {
        return view ('projects.viewsproject.ProjectsView');
    }

    public function projectform()
    {
        return view("projects.Forms.FormStudent");
    }

    public function projectteams()
    {
        return view ('projects.ProjectUser.projectteams');
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
        $proyecto->group_student = $request->group_student;
        $proyecto->phone_student = $request->phone_student;
        $proyecto->email_student = $request->email_student;
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
        
        return redirect()->to('/projectdashboard')->with('success', 'Proyecto guardado correctamente.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
