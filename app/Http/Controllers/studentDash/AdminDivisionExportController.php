<?php

namespace App\Http\Controllers\studentDash;

use App\Http\Controllers\Controller;
use App\Exports\UsersDivisionExport;
use App\Models\ManagmentAdmin;
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
}
