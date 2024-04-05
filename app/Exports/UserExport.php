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
        $users = User::with([
            'roles', 
            'student.group.program.division', 
            'secretary.division', 
            'academicDirector.division', 
            'academicAdvisor.division', 
            'managmentAdmin.division'
        ])->get();

        foreach ($users as $user) {
            // Inicializa division_name
            $user->division_name = $this->determineDivisionName($user);
        }

        return view('exports.users', [
            'users' => $users
        ]);


    }
    protected function determineDivisionName($user)
    {
        if ($user->student && $user->student->group && $user->student->group->program && $user->student->group->program->division) {
            return $user->student->group->program->division->name;
        } elseif ($user->secretary && $user->secretary->division) {
            return $user->secretary->division->name;
        } elseif ($user->academicDirector && $user->academicDirector->division) {
            return $user->academicDirector->division->name;
        } elseif ($user->academicAdvisor && $user->academicAdvisor->division) {
            return $user->academicAdvisor->division->name;
        } elseif ($user->managmentAdmin && $user->managmentAdmin->division) {
            return $user->managmentAdmin->division->name;
        }
        return 'Sin división';
    }
}
