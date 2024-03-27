<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AcademicDirectorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $PresidentUser = User::create([
            'user_id' => 42,
            'division_id' => 1,
            'created_at' => now()
        ]);

        $PresidentUser1 = User::create([
            'user_id' => 43,
            'division_id' => 1,
            'created_at' => now()
        ]);

        $PresidentUser2 = User::create([
            'user_id' => 44,
            'division_id' => 1,
            'created_at' => now()
        ]);

        $PresidentUser3 = User::create([
            'user_id' => 45,
            'division_id' => 1,
            'created_at' => now()
        ]);

        $PresidentUser4 = User::create([
            'user_id' => 46,
            'division_id' => 1,
            'created_at' => now()
        ]);

        $PresidentUser5 = User::create([
            'user_id' => 47,
            'division_id' => 1,
            'created_at' => now()
        ]);

        $PresidentUser6 = User::create([
            'user_id' => 48,
            'division_id' => 1,
            'created_at' => now()
        ]);

        $PresidentUser7 = User::create([
            'user_id' => 49,
            'division_id' => 1,
            'created_at' => now()
        ]);

        $PresidentUser8 = User::create([
            'user_id' => 50,
            'division_id' => 1,
            'created_at' => now()
        ]);

        $PresidentUser9 = User::create([
            'user_id' => 51,
            'division_id' => 1,
            'created_at' => now()
        ]);

        $PresidentRole  = Role::findByName('Presidente Académico');
        
        $PresidentUser->assignRole($PresidentRole);
        $PresidentUser1->assignRole($PresidentRole);
        $PresidentUser2->assignRole($PresidentRole);
        $PresidentUser3->assignRole($PresidentRole);
        $PresidentUser4->assignRole($PresidentRole);
        $PresidentUser5->assignRole($PresidentRole);
        $PresidentUser6->assignRole($PresidentRole);
        $PresidentUser7->assignRole($PresidentRole);
        $PresidentUser8->assignRole($PresidentRole);
        $PresidentUser9->assignRole($PresidentRole);    }
}
