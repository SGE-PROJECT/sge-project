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
        $Lic = Role::create(['name'=>'Lic']);
        $AcademicPresident = Role::create(['name'=>'AcademicPresident']);

        //Se declaran los permisos de los roles
        //En esta parte declaramos las rutas de administrador
        Permission::create(['name' => 'administrator.dashboard.dashboard-general']);
        //En esta parte declaramos permisos para crear botones 
        Permission::create(['name' => 'administrator.dashboard.index']);
        Permission::create(['name' => 'administrator.dashboard.create']);
        Permission::create(['name' => 'administrator.dashboard.edit']);
        Permission::create(['name' => 'administrator.dashboard.destroy']);



    }
}
