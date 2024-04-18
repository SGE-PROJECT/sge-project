<?php

namespace App\Http\Controllers\studentDash;

use App\Http\Controllers\Controller;
use App\Models\ManagmentAdmin;
use App\Models\Student;
use App\Models\User;
use App\Models\Group;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class projectsDivisionController extends Controller
{

    public function projectsForDivision(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'Debe estar autenticado para realizar esta acción');
        }

        // Obtener el rol del usuario utilizando Spatie Laravel Permission
        $role = $user->getRoleNames()->first(); // Obtener el primer rol asignado al usuario

        if ($role !== 'Administrador de División') {
            return redirect()->back()->with('error', 'Acceso no autorizado');
        }

        $divisionId = optional(ManagmentAdmin::where('user_id', $user->id)->first())->division_id;
        if (!$divisionId) {
            return redirect()->back()->with('error', 'No se encontró la división asociada al usuario');
        }

        $projects = Project::where('is_project', 1)
                           ->whereHas('students.group.program', function ($query) use ($divisionId) {
                               $query->where('division_id', $divisionId);
                           })
                           ->with(['students', 'students.group', 'students.group.program'])
                           ->paginate(10);

        return view('administrator.managementAdmin.projects-dash', compact('projects'));
    }

}
