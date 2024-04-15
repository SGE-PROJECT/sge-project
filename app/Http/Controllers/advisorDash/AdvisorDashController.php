<?php

namespace App\Http\Controllers\advisorDash;

use App\Http\Controllers\Controller;
use App\Models\ManagmentAdmin;
use App\Models\AcademicAdvisor;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdvisorDashController extends Controller
{
    public function advisorsForDivision(Request $request){
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
            $advisors = AcademicAdvisor::where('academic_advisors.division_id', $divisionId)
            ->join('users', 'academic_advisors.user_id', '=', 'users.id')
            ->join('divisions', 'academic_advisors.division_id', '=', 'divisions.id') // Join with divisions table
            ->select(
                'academic_advisors.payrol as advisor_nomina',
                'users.email as advisor_email', // Email del asesor
                'users.name as advisor_name', // Nombre del asesor
                'users.phone_number as advisor_phone', // Teléfono del asesor
                'divisions.name as division_name' // Nombre de la división
            )
            ->paginate(10);

        return view('administrator.managementAdmin.advisor-dash', compact('advisors'));

        }
        // Considera manejar el caso en el que el usuario no sea 'Administrador de División'
        else {
            // Redirigir o manejar otros roles aquí
        }
    }

}
