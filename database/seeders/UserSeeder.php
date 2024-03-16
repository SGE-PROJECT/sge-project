<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $AdministratorUser = User::create([
            'name' => 'Guillermo Garcia',
            'email' => 'guillermo.jesus.garcia.canul@gmail.com',
            'password' => Hash::make('guillermo'),
            'created_at' => now()
        ]);

        $teacherUser = User::create([
            'name' => 'Rafael Villegas',
            'email' => 'rvillegas@gmail.com',
            'password' => Hash::make('rafael'),
            'created_at' => now()
        ]);

        $adviserUser = User::create([
            'name' => 'Alonso Roano',
            'email' => 'alonroano@gmail.com',
            'password' => Hash::make('alonso'),
            'created_at' => now()
        ]);

        $studentUser = User::create([
            'name' => 'Andres Leyva',
            'email' => 'leyvagarcia@gmail.com',
            'password' => Hash::make('leyva'),
            'created_at' => now()
        ]);

        $directorUser = User::create([
            'name' => 'Rocío Diaz',
            'email' => 'drocio@gmail.com',
            'password' => Hash::make('rocio'),
            'created_at' => now()
        ]);

        $licenciadeUser = User::create([
            'name' => 'Norma Villegas',
            'email' => 'normavillegas@gmail.com',
            'password' => Hash::make('norma'),
            'created_at' => now()
        ]);

        // Asignar roles a los usuarios creados
        $AdministratorRole = Role::findByName('Administrator');
        $teacherRole = Role::findByName('Teacher');
        $adviserRole = Role::findByName('Adviser');
        $studentRole = Role::findByName('Student');
        $directorRole = Role::findByName('Director');
        $licenciadeRole = Role::findByName('Licenciade');

        $AdministratorUser->assignRole($AdministratorRole);
        $teacherUser->assignRole($teacherRole);
        $adviserUser->assignRole($adviserRole);
        $studentUser->assignRole($studentRole);
        $directorUser->assignRole($directorRole);
        $licenciadeUser->assignRole($licenciadeRole);
    }
}
