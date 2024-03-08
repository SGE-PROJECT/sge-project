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

        Permission::create(['name' => 'administrator.dashboard.dashboard-general']);
    }
}
