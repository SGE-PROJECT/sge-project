<?php

namespace App\Http\Controllers\studentDash;

use App\Exports\StudentsExport;
use App\Http\Controllers\Controller;
use App\Exports\UsersDivisionExport;
use App\Models\ManagmentAdmin;
use App\Models\Student;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class AdminDivisionExportController extends Controller
{
    public function exportExcelD()
    {
        return Excel::download(new UsersDivisionExport, 'usuariosDivision.xlsx');
    }
    public function exportPdfD()
    {
        // Obtener el usuario logueado
        $loggedInUser = Auth::user();

        // Obtener la división asociada al usuario logueado
        $division = null;
        if ($loggedInUser->student) {
            $division = $loggedInUser->student->group->program->division;
        } elseif ($loggedInUser->secretary) {
            $division = $loggedInUser->secretary->division;
        } elseif ($loggedInUser->academicDirector) {
            $division = $loggedInUser->academicDirector->division;
        } elseif ($loggedInUser->academicAdvisor) {
            $division = $loggedInUser->academicAdvisor->division;
        } elseif ($loggedInUser->managmentAdmin) {
            $division = $loggedInUser->managmentAdmin->division;
        }

        // Verificar si se encontró la división
        if (!$division) {
            // Si no se encontró la división, retornar un error o redireccionar a una página de error
            return redirect()->back()->with('error', 'No se pudo determinar la división asociada al usuario.');
        }

        // Obtener solo los usuarios que pertenecen a la división del usuario logueado
        $users = User::whereHas('division', function ($query) use ($division) {
            $query->where('id', $division->id);
        })->with('roles')->get();

        // Generar el PDF
        $pdf = Pdf::loadView('exports.usersdivision_pdf', compact('users'));
        $pdf->setPaper('letter', 'landscape');
        return $pdf->download('usuariosdivision.pdf');
    }

    public function exportStudentsPdf()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Debe estar autenticado para realizar esta acción');
        }

        $role = $user->getRoleNames()->first();

        if ($role === 'Administrador de División') {
            $divId = ManagmentAdmin::where('user_id', $user->id)->select('division_id')->first();
            if (!$divId) {
                return redirect()->back()->with('error', 'No se encontró la división asociada al usuario');
            }
            $divisionId = $divId->division_id;

            $students = Student::join('groups', 'students.group_id', '=', 'groups.id')
                ->join('academic_advisors', 'students.academic_advisor_id', '=', 'academic_advisors.id')
                ->join('users as advisor_users', 'academic_advisors.user_id', '=', 'advisor_users.id')
                ->join('programs', 'groups.program_id', '=', 'programs.id')
                ->join('divisions', 'programs.division_id', '=', 'divisions.id')
                ->join('users as student_users', 'students.user_id', '=', 'student_users.id')
                ->where('divisions.id', $divisionId)
                ->select(
                    'students.*',
                    'student_users.email as student_email',
                    'students.registration_number as student_matricula',
                    'student_users.name as student_name',
                    'groups.name as group_name',
                    'advisor_users.name as advisor_name',
                    'programs.name as program_name'
                )
                ->get(); // Cambié paginate() por get() porque estamos exportando a un PDF

            $pdf = PDF::loadView('exports.students_pdf', compact('students'));
            $pdf->setPaper('a4', 'landscape'); // Configuración del tamaño y orientación del papel

            return $pdf->download('lista_estudiantes.pdf');
        } else {
            return redirect()->back()->with('error', 'Acceso no autorizado. Solo para Administradores de División');
        }
    }

    public function exportStudentsExcel()
{
    return (new StudentsExport)->download('lista_estudiantes.xlsx');
}
}
