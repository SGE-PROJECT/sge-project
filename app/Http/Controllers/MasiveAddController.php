<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Exports\UserExport;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
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
        //
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

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,xls,csv', // Asegúrate de permitir los tipos de archivo correctos
        ]);

        Excel::import(new UsersImport, $request->file('file'));

        return back()->with('success', 'Usuarios importados correctamente.');
    }
    public function exportCsv()
    {
        return Excel::download(new UserExport, 'users.xlsx');
    }
}
