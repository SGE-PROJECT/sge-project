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
        $adminUser = User::create([
            'first_name' => 'Guillermo',
            'last_name' => 'Garcia',
            'email' => 'guillermo.jesus.garcia.canul@gmail.com',
            'phone_number' => '9983187269',
            'password' => Hash::make('guillermo'), // Usar un hash seguro para la contraseña
            'avatar' => 'default.jpg',
            'is_active' => 1,
            'created_at' => now()
        ]);

        $teacherUser = User::create([
            'first_name' => 'Rafael',
            'last_name' => 'Villegas',
            'email' => 'rvillegas@gmail.com',
            'phone_number' => '9984127760',
            'password' => Hash::make('rafael'), // Usar un hash seguro para la contraseña
            'avatar' => 'default.jpg',
            'is_active' => 1,
            'created_at' => now()
        ]);

        $adviserUser = User::create([
            'first_name' => 'Alonso',
            'last_name' => 'Roano',
            'email' => 'alonroano@gmail.com',
            'phone_number' => '9981137469',
            'password' => Hash::make('alonso'), // Usar un hash seguro para la contraseña
            'avatar' => 'default.jpg',
            'is_active' => 1,
            'created_at' => now()
        ]);

        $studentUser = User::create([
            'first_name' => 'Leyva',
            'last_name' => 'Garcia',
            'email' => 'leyvagarcia@gmail.com',
            'phone_number' => '9985177869',
            'password' => Hash::make('leyva'), // Usar un hash seguro para la contraseña
            'avatar' => 'default.jpg',
            'is_active' => 1,
            'created_at' => now()
        ]);

        $directorUser = User::create([
            'first_name' => 'Rocío',
            'last_name' => 'Diaz',
            'email' => 'drocio@gmail.com',
            'phone_number' => '9987837169',
            'password' => Hash::make('rocio'), // Usar un hash seguro para la contraseña
            'avatar' => 'default.jpg',
            'is_active' => 1,
            'created_at' => now()
        ]);

        $licenciadeUser = User::create([
            'first_name' => 'Norma',
            'last_name' => 'Villegas',
            'email' => 'normavillegas@gmail.com',
            'phone_number' => '9981336169',
            'password' => Hash::make('norma'), // Usar un hash seguro para la contraseña
            'avatar' => 'default.jpg',
            'is_active' => 1,
            'created_at' => now()
        ]);

        $adminRole = Role::findByName('Admin');
        $teacherRole = Role::findByName('Teacher');
        $adviserRole = Role::findByName('Adviser');
        $studentRole = Role::findByName('Student');
        $directorRole = Role::findByName('Director');
        $licenciadeRole = Role::findByName('Licenciade');


        $adminUser->assignRole($adminRole);
        $teacherUser->assignRole($teacherRole);
        $adviserUser->assignRole($adviserRole);
        $studentUser->assignRole($studentRole);
        $directorUser->assignRole($directorRole);
        $licenciadeUser->assignRole($licenciadeRole);


    }
}
