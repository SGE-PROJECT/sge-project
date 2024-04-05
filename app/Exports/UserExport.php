<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class UserExport implements FromView
{
    use \Maatwebsite\Excel\Concerns\Exportable;

    public function view(): View
    {
        return view('exports.users', [
            'users' => User::with('roles')->get() // Asegúrate de ajustar la consulta según tus necesidades
        ]);
    }
}
