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

        //Se declaran los roles del sistema

        $Admin = Role::create(['name'=>'Admin']);
        $Teacher = Role::create(['name'=>'Teacher']);
        $Adviser = Role::create(['name'=>'Adviser']);
        $Student = Role::create(['name'=>'Student']);
        $Director = Role::create(['name'=>'Director']);
        $Licenciade = Role::create(['name'=>'Licenciade']);
        $AcademicPresident = Role::create(['name'=>'AcademicPresident']);

        //Se declaran los permisos de los roles

        //En esta parte declaramos las rutas de administrador, En el caso de Dashboard users vamos a manejar el crud para estos

        Permission::create(['name' => 'administrator.dashboard.DashboardUsers'])->syncRoles([$Admin, $Director, $Licenciade]);

        //En esta parte declaramos permisos para usar botones del crud

        Permission::create(['name' => 'administrator.categories.index'])   ->syncRoles([$Admin, $Director, $Licenciade]);
        Permission::create(['name' => 'administrator.categories.create'])  ->syncRoles([$Admin, $Director, $Licenciade]);
        Permission::create(['name' => 'administrator.categories.edit'])    ->syncRoles([$Admin, $Director, $Licenciade]);
        Permission::create(['name' => 'administrator.categories.destroy']) ->syncRoles([$Admin, $Director, $Licenciade]);

        //En este apartado los permisos para visualizar funciones o etiqeuetas en base al rol

        Permission::create(['name' => 'administrator.tags.index'])    ->syncRoles([$Admin, $Director, $Licenciade]);
        Permission::create(['name' => 'administrator.tags.create'])   ->syncRoles([$Admin, $Director, $Licenciade]);
        Permission::create(['name' => 'administrator.tags.edit'])     ->syncRoles([$Admin, $Director, $Licenciade]);
        Permission::create(['name' => 'administrator.tags.destroy'])  ->syncRoles([$Admin, $Director, $Licenciade]);

        //En este apartado los permisos para hacer uso de los métodos post

        Permission::create(['name' => 'administrator.post.index'])   ->syncRoles([$Admin, $Director, $Licenciade]);
        Permission::create(['name' => 'administrator.post.create'])  ->syncRoles([$Admin, $Director, $Licenciade]);
        Permission::create(['name' => 'administrator.post.edit'])    ->syncRoles([$Admin, $Director, $Licenciade]);
        Permission::create(['name' => 'administrator.post.destroy']) ->syncRoles([$Admin, $Director, $Licenciade]);



    }
}
