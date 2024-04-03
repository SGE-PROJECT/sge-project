<?php

namespace Database\Seeders;

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
        $AdviserUser = User::create([
            'user_id' => 21,
            'division_id' => 1,
            'created_at' => now()
        ]);

        $AdviserUser1 = User::create([
            'user_id' => 22,
            'division_id' => 1,
            'created_at' => now()
        ]);

        $AdviserUser2 = User::create([
            'user_id' => 23,
            'division_id' => 1,
            'created_at' => now()
        ]);

        $AdviserUser3 = User::create([
            'user_id' => 24,
            'division_id' => 1,
            'created_at' => now()
        ]);

        $AdviserUser4 = User::create([
            'user_id' => 25,
            'division_id' => 1,
            'created_at' => now()
        ]);

        $AdviserUser5 = User::create([
            'user_id' => 26,
            'division_id' => 1,
            'created_at' => now()
        ]);

        $AdviserUser6 = User::create([
            'user_id' => 27,
            'division_id' => 1,
            'created_at' => now()
        ]);

        $AdviserUser7 = User::create([
            'user_id' => 28,
            'division_id' => 1,
            'created_at' => now()
        ]);

        $AdviserUser8 = User::create([
            'user_id' => 29,
            'division_id' => 1,
            'created_at' => now()
        ]);

        $AdviserUser9 = User::create([
            'user_id' => 30,
            'division_id' => 1,
            'created_at' => now()
        ]);

        $AdviserRole  = Role::findByName('Asesor Académico');
        
        $AdviserUser->assignRole($AdviserRole);
        $AdviserUser1->assignRole($AdviserRole);
        $AdviserUser2->assignRole($AdviserRole);
        $AdviserUser3->assignRole($AdviserRole);
        $AdviserUser4->assignRole($AdviserRole);
        $AdviserUser5->assignRole($AdviserRole);
        $AdviserUser6->assignRole($AdviserRole);
        $AdviserUser7->assignRole($AdviserRole);
        $AdviserUser8->assignRole($AdviserRole);
        $AdviserUser9->assignRole($AdviserRole);    }
}
