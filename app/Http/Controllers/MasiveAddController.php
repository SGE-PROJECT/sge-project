<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Exports\UserExport;
use App\Exports\RolesExport;
use App\Imports\RolesImport;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use App\Exports\UserExportTemplate;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Support\Facades\Log; // Importación correcta para Laravel


class MasiveAddController extends Controller
{
    public function __construct(){
        $this->middleware("can:masive.index")->only('index');
        $this->middleware("can:masive.create")->only('create');
        $this->middleware("can:masive.store")->only('store');
        $this->middleware("can:masive.determineImportClass")->only('determineImportClass');
        $this->middleware("can:masive.exportCsv")->only('exportCsv');
        $this->middleware("can:masive.exportTemplate")->only('exportTemplate');
        $this->middleware("can:masive.exportTemplateUsers")->only('exportTemplateUsers');
    }

    public function index()
    {

        //Apartado de paginación
       

        $users = User::with([
            'student.group.program.division',
            'secretary.division',
            'academicDirector.division',
            'academicAdvisor.division',
            'managmentAdmin.division'
        ])->paginate(10);
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

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,xls,csv|max:2048', // Limita a archivos Excel y de hasta 2MB
        ]);

        if (!$request->hasFile('file')) {
            return back()->with('error', 'No se recibió ningún archivo.');
        }

        $file = $request->file('file');
        $importClass = $this->determineImportClass($file);

        if (is_null($importClass)) {
            return back()->with('error', 'No se pudo determinar el tipo de archivo de importación.');
        }

        try {
            Excel::import(new $importClass, $file);
        } catch (\Exception $e) {
            Log::error('Error al importar: ' . $e->getMessage());
            return back()->with('error', 'Hubo un problema al importar: ' . $e->getMessage());
        }

        return back()->with('success', 'Importación realizada correctamente.');
    }

    private function determineImportClass($file)
    {
        // Leer las primeras filas del archivo para determinar su estructura
        $reader = Excel::toCollection(new UsersImport, $file)->first();

        if (is_null($reader) || $reader->isEmpty()) {
            return null;
        }

        $firstRow = $reader->first();
        if ($firstRow->has('payrol')) {
            return RolesImport::class; // La clase que se usa para importar roles
        } else {
            return UsersImport::class; // La clase que se usa para importar usuarios
        }
    }
    public function exportCsv()
    {
        return Excel::download(new UserExport, 'users.xlsx');
    }

    public function exportTemplate()
    {
        return Excel::download(new UserExportTemplate, 'UserImportTemplate.xlsx');
    }

    public function exportTemplateUsers()
    {
        return Excel::download(new RolesExport, 'RolesImportTemplate.xlsx');
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
