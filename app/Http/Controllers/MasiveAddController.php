<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log; // Importación correcta para Laravel
use App\Models\User;
use App\Exports\UserExport;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use App\Exports\UserExportTemplate;
use Maatwebsite\Excel\Facades\Excel;


class MasiveAddController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with([
            'student.group.program.division',
            'secretary.division',
            'academicDirector.division',
            'academicAdvisor.division',
            'managmentAdmin.division'
        ])->get();

        // Iteramos sobre cada usuario para asignarle explícitamente division_id y division_name
        $users->each(function ($user) {
            if ($user->relationLoaded('student') && $user->student) {
                $division = $user->student->group->program->division ?? null;
            } elseif ($user->relationLoaded('secretary') && $user->secretary) {
                $division = $user->secretary->division ?? null;
            } elseif ($user->relationLoaded('academicDirector') && $user->academicDirector) {
                $division = $user->academicDirector->division ?? null;
            } elseif ($user->relationLoaded('academicAdvisor') && $user->academicAdvisor) {
                $division = $user->academicAdvisor->division ?? null;
            } elseif ($user->relationLoaded('managmentAdmin') && $user->managmentAdmin) {
                $division = $user->managmentAdmin->division ?? null;
            } else {
                $division = null;
            }

            // Asignamos los valores de division_id y division_name
            $user->division_id = $division ? $division->id : 'Sin ID de División';
            $user->division_name = $division ? $division->name : 'Sin División';
        });

        return view('users.masiveadd', ['users' => $users]);
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
    public function store(Request $request)
    {
        // Validación básica para el archivo
        $request->validate([
            'file' => 'required|file|mimes:xlsx,xls,csv|max:2048', // Limita a archivos Excel y de hasta 2MB
        ]);
    
        if (!$request->hasFile('file')) {
            return back()->with('error', 'No se recibió ningún archivo.');
        }
    
        $file = $request->file('file');
        
        try {
            Excel::import(new UsersImport, $file);
        } catch (\Exception $e) {
            // Atrapar errores generales durante la importación
            Log::error('Error al importar usuarios: ' . $e->getMessage());
            return back()->with('error', 'Hubo un problema al importar los usuarios. Por favor, intenta de nuevo.');
        }
    
        return back()->with('success', 'Usuarios importados correctamente.');
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

    public function exportCsv()
    {
        return Excel::download(new UserExport, 'users.xlsx');
    }

    public function exportTemplate()
    {
        return Excel::download(new UserExportTemplate, 'UserImportTemplate.xlsx');
    }
}
