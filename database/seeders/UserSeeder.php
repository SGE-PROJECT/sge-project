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

        $ManagmentAdminUser1 = User::create([

            'name' => 'Alonso Garcia',
            'email' => 'agarcia@gmail.com',
            'password' => Hash::make('alonso'),
            'created_at' => now()
        ]);

        $ManagmentAdminUser2 = User::create([

            'name' => 'Carlos Garcia',
            'email' => 'carlosgarcia@gmail.com',
            'password' => Hash::make('carlos'),
            'created_at' => now()
        ]);

        $ManagmentAdminUser3 = User::create([

            'name' => 'Anthony Garcia',
            'email' => 'anthonygarcia@gmail.com',
            'password' => Hash::make('anthony'),
            'created_at' => now()
        ]);

        $ManagmentAdminUser4 = User::create([

            'name' => 'Juan Garcia',
            'email' => 'juangarcia@gmail.com',
            'password' => Hash::make('juan'),
            'created_at' => now()
        ]);

        $ManagmentAdminUser5 = User::create([

            'name' => 'Noeli Garcia',
            'email' => 'noeligarcia@gmail.com',
            'password' => Hash::make('noeli'),
            'created_at' => now()
        ]);

        $ManagmentAdminUser6 = User::create([

            'name' => 'Leyva Garcia',
            'email' => 'leyvagarcia@gmail.com',
            'password' => Hash::make('leyva'),
            'created_at' => now()
        ]);

        $ManagmentAdminUser7 = User::create([

            'name' => 'Gerardo Garcia',
            'email' => 'gerardogarcia@gmail.com',
            'password' => Hash::make('gerardo'),
            'created_at' => now()
        ]);

        $ManagmentAdminUser8 = User::create([

            'name' => 'Rocio Garcia',
            'email' => 'rociogarcia@gmail.com',
            'password' => Hash::make('rocio'),
            'created_at' => now()
        ]);

        $ManagmentAdminUser9 = User::create([

            'name' => 'Merith Garcia',
            'email' => 'merithgarcia@gmail.com',
            'password' => Hash::make('merith'),
            'created_at' => now()
        ]);

        $AdviserUser = User::create([
            'name' => 'Alonso Roano',
            'email' => 'alonroano@gmail.com',
            'password' => Hash::make('alonso'),
            'created_at' => now()
        ]);

        $AdviserUser1 = User::create([
            'name' => 'Juan Roano',
            'email' => 'juanroano@gmail.com',
            'password' => Hash::make('juan'),
            'created_at' => now()
        ]);

        $AdviserUser2 = User::create([
            'name' => 'Anthony Roano',
            'email' => 'anthonyroano@gmail.com',
            'password' => Hash::make('anthony'),
            'created_at' => now()
        ]);

        $AdviserUser3 = User::create([
            'name' => 'Leyva Roano',
            'email' => 'leyvaroano@gmail.com',
            'password' => Hash::make('leyva'),
            'created_at' => now()
        ]);

        $AdviserUser4 = User::create([
            'name' => 'Gerardo Roano',
            'email' => 'gerardoroano@gmail.com',
            'password' => Hash::make('gerardo'),
            'created_at' => now()
        ]);

        $AdviserUser5 = User::create([
            'name' => 'Cochi Roano',
            'email' => 'cochiroano@gmail.com',
            'password' => Hash::make('cochi'),
            'created_at' => now()
        ]);

        $AdviserUser6 = User::create([
            'name' => 'Misael Roano',
            'email' => 'michiroano@gmail.com',
            'password' => Hash::make('michi'),
            'created_at' => now()
        ]);

        $AdviserUser7 = User::create([
            'name' => 'Lobato Roano',
            'email' => 'lobatoroano@gmail.com',
            'password' => Hash::make('lobato'),
            'created_at' => now()
        ]);

        $AdviserUser8 = User::create([
            'name' => 'Susanita Roano',
            'email' => 'susanitaroano@gmail.com',
            'password' => Hash::make('susanita'),
            'created_at' => now()
        ]);

        $AdviserUser9 = User::create([
            'name' => 'Evelyn Roano',
            'email' => 'evelynroano@gmail.com',
            'password' => Hash::make('evelyn'),
            'created_at' => now()
        ]);

        $SecretaryUser = User::create([
            'name' => 'Andres Leyva',
            'email' => 'leyvagarcia2@gmail.com',
            'password' => Hash::make('leyva'),
            'created_at' => now()
        ]);

        $SecretaryUser1 = User::create([
            'name' => 'Juan Leyva',
            'email' => 'leyvajuan@gmail.com',
            'password' => Hash::make('leyva'),
            'created_at' => now()
        ]);

        $SecretaryUser2 = User::create([
            'name' => 'Cochi Leyva',
            'email' => 'leyvacochi@gmail.com',
            'password' => Hash::make('leyva'),
            'created_at' => now()
        ]);

        $SecretaryUser3 = User::create([
            'name' => 'Anthony Leyva',
            'email' => 'leyvaanthony@gmail.com',
            'password' => Hash::make('leyva'),
            'created_at' => now()
        ]);

        $SecretaryUser4 = User::create([
            'name' => 'Roano Leyva',
            'email' => 'leyvagogogoroano@gmail.com',
            'password' => Hash::make('leyva'),
            'created_at' => now()
        ]);

        $SecretaryUser5 = User::create([
            'name' => 'Evelyn Leyva',
            'email' => 'leyvaevelyn@gmail.com',
            'password' => Hash::make('leyva'),
            'created_at' => now()
        ]);

        $SecretaryUser6 = User::create([
            'name' => 'Noeli Leyva',
            'email' => 'leyvanoeli@gmail.com',
            'password' => Hash::make('leyva'),
            'created_at' => now()
        ]);

        $SecretaryUser7 = User::create([
            'name' => 'Juanxxproxx Leyva',
            'email' => 'leyvaproxd@gmail.com',
            'password' => Hash::make('leyva'),
            'created_at' => now()
        ]);

        $SecretaryUser8 = User::create([
            'name' => 'Katochiri Leyva',
            'email' => 'leyvakatochiri@gmail.com',
            'password' => Hash::make('leyva'),
            'created_at' => now()
        ]);

        $SecretaryUser9 = User::create([
            'name' => 'Rafael Leyva',
            'email' => 'leyvarafael@gmail.com',
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

        $PresidentUser1 = User::create([
            'name' => 'Anthony Salazar',
            'email' => 'Anthonyvsalazar@gmail.com',
            'password' => Hash::make('norma'),
            'created_at' => now()
        ]);

        $PresidentUser2 = User::create([
            'name' => 'Juan Salazar',
            'email' => 'Juan_Salazar@gmail.com',
            'password' => Hash::make('norma'),
            'created_at' => now()
        ]);

        $PresidentUser3 = User::create([
            'name' => 'Minecraft Salazar',
            'email' => 'Minecraft_Salazar@gmail.com',
            'password' => Hash::make('norma'),
            'created_at' => now()
        ]);

        $PresidentUser4 = User::create([
            'name' => 'Gerardo Salazar',
            'email' => 'Gerardo_Salazar@gmail.com',
            'password' => Hash::make('norma'),
            'created_at' => now()
        ]);

        $PresidentUser5 = User::create([
            'name' => 'Raul Salazar',
            'email' => 'Raul_Salazar@gmail.com',
            'password' => Hash::make('norma'),
            'created_at' => now()
        ]);

        $PresidentUser6 = User::create([
            'name' => 'Cod Salazar',
            'email' => 'Cod_Salazar@gmail.com',
            'password' => Hash::make('norma'),
            'created_at' => now()
        ]);

        $PresidentUser7 = User::create([
            'name' => 'Fiora Salazar',
            'email' => 'Fiora_Salazar@gmail.com',
            'password' => Hash::make('norma'),
            'created_at' => now()
        ]);

        $PresidentUser8 = User::create([
            'name' => 'Fortune Salazar',
            'email' => 'Fortune_Salazar@gmail.com',
            'password' => Hash::make('norma'),
            'created_at' => now()
        ]);

        $PresidentUser9 = User::create([
            'name' => 'Xerath Salazar',
            'email' => 'Xerath_Salazar@gmail.com',
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

        //Administradores de división
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

        //Asesores Académicos
        $AdviserUser->assignRole($AdviserRole);
        $AdviserUser1->assignRole($AdviserRole);
        $AdviserUser2->assignRole($AdviserRole);
        $AdviserUser3->assignRole($AdviserRole);
        $AdviserUser4->assignRole($AdviserRole);
        $AdviserUser5->assignRole($AdviserRole);
        $AdviserUser6->assignRole($AdviserRole);
        $AdviserUser7->assignRole($AdviserRole);
        $AdviserUser8->assignRole($AdviserRole);
        $AdviserUser9->assignRole($AdviserRole);


        //Creamos Estudiantes
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

        //Presidentes
        $PresidentUser->assignRole($PresidentRole);
        $PresidentUser1->assignRole($PresidentRole);
        $PresidentUser2->assignRole($PresidentRole);
        $PresidentUser3->assignRole($PresidentRole);
        $PresidentUser4->assignRole($PresidentRole);
        $PresidentUser5->assignRole($PresidentRole);
        $PresidentUser6->assignRole($PresidentRole);
        $PresidentUser7->assignRole($PresidentRole);
        $PresidentUser8->assignRole($PresidentRole);
        $PresidentUser9->assignRole($PresidentRole);


        //Secretarias
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
