<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ManagmentAdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ManagmentAdminUser = User::create([
            'user_id' => 11,
            'division_id' => 1,
            'created_at' => now()
        ]);

        $ManagmentAdminUser1 = User::create([
            'user_id' => 12,
            'division_id' => 1,
            'created_at' => now()
        ]);

        $ManagmentAdminUser2 = User::create([
            'user_id' => 13,
            'division_id' => 1,
            'created_at' => now()
        ]);

        $ManagmentAdminUser3 = User::create([
            'user_id' => 14,
            'division_id' => 1,
            'created_at' => now()
        ]);

        $ManagmentAdminUser4 = User::create([
            'user_id' => 15,
            'division_id' => 1,
            'created_at' => now()
        ]);

        $ManagmentAdminUser5 = User::create([
            'user_id' => 16,
            'division_id' => 1,
            'created_at' => now()
        ]);

        $ManagmentAdminUser6 = User::create([
            'user_id' => 17,
            'division_id' => 1,
            'created_at' => now()
        ]);

        $ManagmentAdminUser7 = User::create([
            'user_id' => 18,
            'division_id' => 1,
            'created_at' => now()
        ]);

        $ManagmentAdminUser8 = User::create([
            'user_id' => 19,
            'division_id' => 1,
            'created_at' => now()
        ]);

        $ManagmentAdminUser9 = User::create([
            'user_id' => 20,
            'division_id' => 1,
            'created_at' => now()
        ]);

        $ManagmentAdminRole  = Role::findByName('Administrador de División');
        
        $ManagmentAdminUser->assignRole($ManagmentAdminRole);
        $ManagmentAdminUser1->assignRole($ManagmentAdminRole);
        $ManagmentAdminUser2->assignRole($ManagmentAdminRole);
        $ManagmentAdminUser3->assignRole($ManagmentAdminRole);
        $ManagmentAdminUser4->assignRole($ManagmentAdminRole);
        $ManagmentAdminUser5->assignRole($ManagmentAdminRole);
        $ManagmentAdminUser6->assignRole($ManagmentAdminRole);
        $ManagmentAdminUser7->assignRole($ManagmentAdminRole);
        $ManagmentAdminUser8->assignRole($ManagmentAdminRole);
        $ManagmentAdminUser9->assignRole($ManagmentAdminRole);
    }
}
