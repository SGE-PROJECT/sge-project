<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SecretariesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $SecretaryUser = User::create([
            'user_id' => 31,
            'division_id' => 1,
            'created_at' => now()
        ]);

        $SecretaryUser1 = User::create([
            'user_id' => 32,
            'division_id' => 1,
            'created_at' => now()
        ]);

        $SecretaryUser2 = User::create([
            'user_id' => 33,
            'division_id' => 1,
            'created_at' => now()
        ]);

        $SecretaryUser3 = User::create([
            'user_id' => 34,
            'division_id' => 1,
            'created_at' => now()
        ]);

        $SecretaryUser4 = User::create([
            'user_id' => 35,
            'division_id' => 1,
            'created_at' => now()
        ]);

        $SecretaryUser5 = User::create([
            'user_id' => 36,
            'division_id' => 1,
            'created_at' => now()
        ]);

        $SecretaryUser6 = User::create([
            'user_id' => 37,
            'division_id' => 1,
            'created_at' => now()
        ]);

        $SecretaryUser7 = User::create([
            'user_id' => 38,
            'division_id' => 1,
            'created_at' => now()
        ]);

        $SecretaryUser8 = User::create([
            'user_id' => 39,
            'division_id' => 1,
            'created_at' => now()
        ]);

        $SecretaryUser9 = User::create([
            'user_id' => 40,
            'division_id' => 1,
            'created_at' => now()
        ]);

        $SecretaryRole  = Role::findByName('Asistente de Dirección');
        
        $SecretaryUser->assignRole($SecretaryRole);
        $SecretaryUser1->assignRole($SecretaryRole);
        $SecretaryUser2->assignRole($SecretaryRole);
        $SecretaryUser3->assignRole($SecretaryRole);
        $SecretaryUser4->assignRole($SecretaryRole);
        $SecretaryUser5->assignRole($SecretaryRole);
        $SecretaryUser6->assignRole($SecretaryRole);
        $SecretaryUser7->assignRole($SecretaryRole);
        $SecretaryUser8->assignRole($SecretaryRole);
        $SecretaryUser9->assignRole($SecretaryRole);

    }
}
