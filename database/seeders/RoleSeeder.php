<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        //Se declaran y crean los roles del sistema de forma segura
        $rolesNames = ['Administrator', 'Teacher', 'Adviser', 'Student', 'Director', 'Licenciade', 'AcademicPresident'];
        foreach ($rolesNames as $roleName) {
            Role::findOrCreate($roleName, 'web');
        }

        //Se declaran los permisos de los roles

        // Ahora, creamos los permisos y los asignamos a los roles correspondientes de forma segura
        $permissions = [
            'administrator.dashboard.DashboardUsers' => ['Administrator', 'Director', 'Licenciade'],
            'administrator.dashboard.dashboardTeam' => ['Administrator', 'Director', 'Licenciade'],
            'books-notifications.books.list' => ['Administrator', 'Director', 'Licenciade', 'Student', 'AcademicPresident', 'Teacher', 'Adviser'],
            // Agrega aquí otros permisos según sea necesario
        ];

        foreach ($permissions as $permissionName => $roles) {
            $permission = Permission::findOrCreate($permissionName, 'web');
            foreach ($roles as $roleName) {
                $role = Role::findByName($roleName, 'web');
                $role->givePermissionTo($permission);
            }
        }
        //En esta parte declaramos las rutas de administrador, En el caso de Dashboard users vamos a manejar el crud para estos

        Permission::create(['name' => 'administrator.dashboard.DashboardUsers'])->syncRoles([$Administrator, $Director, $Licenciade]);
        Permission::create(['name' => 'administrator.dashboard.dashboardTeam'])->syncRoles([$Administrator, $Director, $Licenciade]);
        Permission::create(['name' => 'books-notifications.books.list'])->syncRoles([$Administrator, $Director, $Licenciade, $Student, $AcademicPresident, $Teacher, $Adviser]);



        /*  //En esta parte declaramos permisos para usar botones del crud

         Permission::create(['name' => 'administrator.categories.index'])   ->syncRoles([$Administrator, $Director, $Licenciade]);
         Permission::create(['name' => 'administrator.categories.create'])  ->syncRoles([$Administrator, $Director, $Licenciade]);
         Permission::create(['name' => 'administrator.categories.edit'])    ->syncRoles([$Administrator, $Director, $Licenciade]);
         Permission::create(['name' => 'administrator.categories.destroy']) ->syncRoles([$Administrator, $Director, $Licenciade]);

         //En este apartado los permisos para visualizar funciones o etiqeuetas en base al rol

         Permission::create(['name' => 'administrator.tags.index'])    ->syncRoles([$Administrator, $Director, $Licenciade]);
         Permission::create(['name' => 'administrator.tags.create'])   ->syncRoles([$Administrator, $Director, $Licenciade]);
         Permission::create(['name' => 'administrator.tags.edit'])     ->syncRoles([$Administrator, $Director, $Licenciade]);
         Permission::create(['name' => 'administrator.tags.destroy'])  ->syncRoles([$Administrator, $Director, $Licenciade]);

         //En este apartado los permisos para hacer uso de los métodos post

         Permission::create(['name' => 'administrator.post.index'])   ->syncRoles([$Administrator, $Director, $Licenciade]);
         Permission::create(['name' => 'administrator.post.create'])  ->syncRoles([$Administrator, $Director, $Licenciade]);
         Permission::create(['name' => 'administrator.post.edit'])    ->syncRoles([$Administrator, $Director, $Licenciade]);
         Permission::create(['name' => 'administrator.post.destroy']) ->syncRoles([$Administrator, $Director, $Licenciade]);
  */


    }
}
