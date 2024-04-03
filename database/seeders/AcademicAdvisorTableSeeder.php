<?php

namespace Database\Seeders;

use App\Models\AcademicAdvisor;
use App\Models\User;
use App\Models\AcademicAdvisor;
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
        $AdviserUser = AcademicAdvisor::create([
            'user_id' => 21,
            'payrol' => '1111',
            'division_id' => 1,
        ]);

        $AdviserUser1 = AcademicAdvisor::create([
            'user_id' => 22,
            'payrol' => '2222',
            'division_id' => 1,
        ]);

        $AdviserUser2 = AcademicAdvisor::create([
            'user_id' => 23,
            'payrol' => '3333',
            'division_id' => 1,
        ]);

        $AdviserUser3 = AcademicAdvisor::create([
            'user_id' => 24,
            'payrol' => '4444',
            'division_id' => 1,
        ]);

        $AdviserUser4 = AcademicAdvisor::create([
            'user_id' => 25,
            'payrol' => '5555',
            'division_id' => 1,
        ]);

        $AdviserUser5 = AcademicAdvisor::create([
            'user_id' => 26,
            'payrol' => '6666',
            'division_id' => 1,
        ]);

        $AdviserUser6 = AcademicAdvisor::create([
            'user_id' => 27,
            'payrol' => '7777',
            'division_id' => 1,
        ]);

        $AdviserUser7 = AcademicAdvisor::create([
            'user_id' => 28,
            'payrol' => '8888',
            'division_id' => 1,
        ]);

        $AdviserUser8 = AcademicAdvisor::create([
            'user_id' => 29,
            'payrol' => '9999',
            'division_id' => 1,
        ]);

        $AdviserUser9 = AcademicAdvisor::create([
            'user_id' => 30,
            'payrol' => '0000',
            'division_id' => 1,
        ]);
    }
}
