<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $StudentUser = User::create([
            'name' => 'Guillermo Garcia',
            // 'last_name' => 'Garcia',
            'email' => 'guillermo.jesus.garcia.canul@gmail.com',
            // 'phone_number' => '9983187269',
            'password' => Hash::make('guillermo'), // Usar un hash seguro para la contraseña
            // 'avatar' => 'default.jpg',
            // 'is_active' => 1,
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
            // 'last_name' => 'Villegas',
            'email' => 'rvillegas@gmail.com',
            // 'phone_number' => '9984127760',
            'password' => Hash::make('rafael'), // Usar un hash seguro para la contraseña
            // 'avatar' => 'default.jpg',
            // 'is_active' => 1,
            'created_at' => now()
        ]);

        $AdviserUser = User::create([
            'name' => 'Alonso Roano',
            // 'last_name' => 'Roano',
            'email' => 'alonroano@gmail.com',
            // 'phone_number' => '9981137469',
            'password' => Hash::make('alonso'), // Usar un hash seguro para la contraseña
            // 'avatar' => 'default.jpg',
            // 'is_active' => 1,
            'created_at' => now()
        ]);

        $SecretaryUser = User::create([
            'name' => 'Andres Leyva',
            // 'last_name' => 'Garcia',
            'email' => 'leyvagarcia@gmail.com',
            // 'phone_number' => '9985177869',
            'password' => Hash::make('leyva'), // Usar un hash seguro para la contraseña
            // 'avatar' => 'default.jpg',
            // 'is_active' => 1,
            'created_at' => now()
        ]);

        $SuperAdminUser = User::create([
            'name' => 'Rocío Diaz',
            // 'last_name' => 'Diaz',
            'email' => 'drocio@gmail.com',
            // 'phone_number' => '9987837169',
            'password' => Hash::make('rocio'), // Usar un hash seguro para la contraseña
            // 'avatar' => 'default.jpg',
            // 'is_active' => 1,
            'created_at' => now()
        ]);

        $PresidentUser = User::create([
            'name' => 'Norma Villegas',
            // 'last_name' => 'Villegas',
            'email' => 'normavillegas@gmail.com',
            // 'phone_number' => '9981336169',
            'password' => Hash::make('norma'), // Usar un hash seguro para la contraseña
            // 'avatar' => 'default.jpg',
            // 'is_active' => 1,
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

        $SuperAdminRole  = Role::findByName('SuperAdmin');
        $ManagmentAdminRole  = Role::findByName('ManagmentAdmin');
        $AdviserRole  = Role::findByName('Adviser');
        $StudentRole  = Role::findByName('Student');
        $PresidentRole  = Role::findByName('President');
        $SecretaryRole  = Role::findByName('Secretary');

        $SuperAdminUser->assignRole($SuperAdminRole);
        $ManagmentAdminUser->assignRole($ManagmentAdminRole);
        $AdviserUser->assignRole($AdviserRole);
        $StudentUser->assignRole($StudentRole);
        $PresidentUser->assignRole($PresidentRole);
        $SecretaryUser->assignRole($SecretaryRole);


            



    }
}