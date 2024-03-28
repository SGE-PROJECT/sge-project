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
        $StudentUser1 = User::create([
            'name' => 'Guillermo Garcia',
            'email' => 'guillermo.jesus.garcia.canul@gmail.com',
            'password' => Hash::make('guillermo'),
            'division_id' => 2,
            'created_at' => now()
        ]);

        $StudentUser2 = User::create([
            'name' => 'Juan Villegas',
            'email' => 'juanvillegas@gmail.com',
            'password' => Hash::make('juan'),
            'division_id' => 2,
            'created_at' => now()
        ]);

        $StudentUser3 = User::create([
            'name' => 'Franklin Villegas',
            'email' => 'franklinvillegas@gmail.com',
            'password' => Hash::make('frank'),
            'division_id' => 2,
            'created_at' => now()
        ]);

        $StudentUser4 = User::create([
            'name' => 'Noeli Villegas',
            'email' => 'noelivillegas@gmail.com',
            'password' => Hash::make('noeli'),
            'division_id' => 2,
            'created_at' => now()
        ]);

        $StudentUser5 = User::create([
            'name' => 'Emmanuel Villegas',
            'email' => 'emmanuelvillegas@gmail.com',
            'password' => Hash::make('emmanuel'),
            'division_id' => 2,
            'created_at' => now()
        ]);

        $StudentUser6 = User::create([
            'name' => 'Rojas Villegas',
            'email' => 'rojasvillegas@gmail.com',
            'password' => Hash::make('rojas'),
            'division_id' => 2,
            'created_at' => now()
        ]);

        $StudentUser7 = User::create([
            'name' => 'luis Villegas',
            'email' => 'luisvillegas@gmail.com',
            'password' => Hash::make('luis'),
            'division_id' => 2,
            'created_at' => now()
        ]);

        $StudentUser8 = User::create([
            'name' => 'Alisson Alexandra',
            'email' => 'alissonalexandra@gmail.com',
            'password' => Hash::make('alisson'),
            'division_id' => 2,
            'created_at' => now()
        ]);

        $StudentUser9 = User::create([
            'name' => 'Mariana Garcia Medina',
            'email' => 'garciamedina@gmail.com',
            'password' => Hash::make('mariana'),
            'division_id' => 2,
            'created_at' => now()
        ]);

        $StudentUser = User::create([
            'name' => 'Jose Martinez',
            // 'last_name' => 'Garcia',
            'email' => 'jose@gmail.com',
            // 'phone_number' => '9983187269',
            'password' => Hash::make('jose'), // Usar un hash seguro para la contraseña
            // 'avatar' => 'default.jpg',
            // 'is_active' => 1,
            'created_at' => now()
        ]);


        $ManagmentAdminUser = User::create([

            'name' => 'Rafael Villegas',
            'email' => 'rvillegas@gmail.com',
            'password' => Hash::make('rafael'),
            'created_at' => now()
        ]);

        $AdviserUser = User::create([
            'name' => 'Alonso Roano',
            'email' => 'alonroano@gmail.com',
            'password' => Hash::make('alonso'),
            'created_at' => now()
        ]);

        $SecretaryUser = User::create([
            'name' => 'Andres Leyva',
            'email' => 'leyvagarcia@gmail.com',
            'password' => Hash::make('leyva'),
            'created_at' => now()
        ]);

        $SuperAdminUser = User::create([
            'name' => 'Rocío Diaz',
            'email' => 'drocio@gmail.com',
            'password' => Hash::make('rocio'),
            'created_at' => now()
        ]);

        $PresidentUser = User::create([
            'name' => 'Norma Villegas',
            'email' => 'normavillegas@gmail.com',
            'password' => Hash::make('norma'),
            'created_at' => now()
        ]);

        /* $AdministratorRole = Role::findByName('Administrator');
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
        $licenciadeUser->assignRole($licenciadeRole); */

        $SuperAdminRole  = Role::findByName('Super Administrador');
        $ManagmentAdminRole  = Role::findByName('Administrador de División');
        $AdviserRole  = Role::findByName('Asesor Académico');
        $StudentRole  = Role::findByName('Estudiante');
        $PresidentRole  = Role::findByName('Presidente Académico');
        $SecretaryRole  = Role::findByName('Asistente de Dirección');

        $SuperAdminUser->assignRole($SuperAdminRole);
        $ManagmentAdminUser->assignRole($ManagmentAdminRole);
        $AdviserUser->assignRole($AdviserRole);
        $StudentUser1->assignRole($StudentRole);
        $StudentUser2->assignRole($StudentRole);
        $StudentUser3->assignRole($StudentRole);
        $StudentUser4->assignRole($StudentRole);
        $StudentUser5->assignRole($StudentRole);
        $StudentUser6->assignRole($StudentRole);
        $StudentUser7->assignRole($StudentRole);
        $StudentUser8->assignRole($StudentRole);
        $StudentUser9->assignRole($StudentRole);
        $StudentUser->assignRole($StudentRole);
        $PresidentUser->assignRole($PresidentRole);
        $SecretaryUser->assignRole($SecretaryRole);






    }
}
