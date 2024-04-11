<?php

namespace App\Http\Controllers\studentDash;

use App\Http\Controllers\Controller;
use App\Models\ManagmentAdmin;
use App\Models\Student;
use App\Models\User;
use App\Models\Group; // Asumiendo que tienes un modelo para los grupos
use App\Models\AcademicAdvisor; // Asumiendo que tienes un modelo para los asesores académicos
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class StudentDashController extends Controller
{
    public function studentsForDivision(Request $request){
        // Obtener el usuario autenticado
        $user = Auth::user();
    
        // Verificar si el usuario está autenticado y tiene un rol
        if (!$user) {
            // Redirigir o mostrar un mensaje de error si el usuario no está autenticado
            return redirect()->route('login')->with('error', 'Debe estar autenticado para realizar esta acción');
        }
    
        // Obtener el rol del usuario utilizando Spatie Laravel Permission
        $role = $user->getRoleNames()->first(); // Obtener el primer rol asignado al usuario
    
        if ($role === 'Administrador de División') {
            $divId = ManagmentAdmin::where('user_id', $user->id)->select('division_id')->first(); 
            if (!$divId) {
                // Manejar el caso en que no se encuentra el ID de la división
                return redirect()->back()->with('error', 'No se encontró la división asociada al usuario');
            }
            $divisionId = $divId->division_id;
            
            // Asegúrate de que la consulta utilice 'paginate()' para la paginación
            $students = Student::join('groups', 'students.group_id', '=', 'groups.id')
                ->join('academic_advisors', 'students.academic_advisor_id', '=', 'academic_advisors.id')
                ->join('users as advisor_users', 'academic_advisors.user_id', '=', 'advisor_users.id') // Alias para los usuarios que son asesores
                ->join('programs', 'groups.program_id', '=', 'programs.id')
                ->join('divisions', 'programs.division_id', '=', 'divisions.id')
                ->join('users as student_users', 'students.user_id', '=', 'student_users.id') // Alias para los usuarios que son estudiantes
                ->where('divisions.id', $divisionId)
                ->select(
                    'students.*', 
                    'student_users.email as student_email',// Email del estudiante
                    'students.registration_number as student_matricula', // Matricula del estudiante
                    'student_users.name as student_name', // Nombre del estudiante
                    'groups.name as group_name', // Nombre del grupo
                    'advisor_users.name as advisor_name',// Nombre del asesor académico
                    'programs.name as program_name',  // Nombre de la carrera
                )
                ->paginate(10);
    
            return view('administrator.managementAdmin.student-dash', compact('students'));
        }
        // Considera manejar el caso en el que el usuario no sea 'Administrador de División'
    }
    
}
