<?php

namespace Database\Seeders;

use App\Models\AcademicAdvisor;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AcademicAdvisorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $AdviserUser =  AcademicAdvisor::create([
            'user_id' => 21,
            'division_id' => 1,
        ]);

        $AdviserUser1 = AcademicAdvisor::create([
            'user_id' => 22,
            'division_id' => 1,
        ]);

        $AdviserUser2 = AcademicAdvisor::create([
            'user_id' => 23,
            'division_id' => 1,
        ]);

        $AdviserUser3 = AcademicAdvisor::create([
            'user_id' => 24,
            'division_id' => 1,
        ]);

        $AdviserUser4 = AcademicAdvisor::create([
            'user_id' => 25,
            'division_id' => 1,
        ]);

        $AdviserUser5 = AcademicAdvisor::create([
            'user_id' => 26,
            'division_id' => 1,
        ]);

        $AdviserUser6 = AcademicAdvisor::create([
            'user_id' => 27,
            'division_id' => 1,
        ]);

        $AdviserUser7 = AcademicAdvisor::create([
            'user_id' => 28,
            'division_id' => 1,
        ]);

        $AdviserUser8 = AcademicAdvisor::create([
            'user_id' => 29,
            'division_id' => 1,
        ]);

        $AdviserUser9 = AcademicAdvisor::create([
            'user_id' => 30,
            'division_id' => 1,
        ]);

        $AdviserRole  = Role::findByName('Asesor Académico');
}
}
