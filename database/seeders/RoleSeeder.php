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
        $rolesNames = ['SuperAdmin', 'ManagmentAdmin', 'Adviser', 'Student', 'President', 'Secretary'];
        foreach ($rolesNames as $roleName) {
            Role::findOrCreate($roleName, 'web');
        }


        // Ahora, creamos los permisos y los asignamos a los roles correspondientes de forma segura
        $permissions = [
            //roles y permisos
            'roles.permissions.index' => [
                'roles' => ['SuperAdmin', 'ManagmentAdmin'],
                'description' => 'Ver el listado de roles'
            ],
            'roles.permissions.create' => [
                'roles' => ['SuperAdmin'],
                'description' => 'Crear roles'
            ],
            'roles.permissions.edit' => [
                'roles' => ['SuperAdmin'],
                'description' => 'Editar roles'
            ],

            'roles.permissions.destroy' => [
                'roles' => ['SuperAdmin'],
                'description' => 'Eliminar roles'
            ],
            'roles.permissions.show' => [
                'roles' => ['SuperAdmin'],
                'description' => 'Mostrar detalle de roles'
            ],
            //empresas
            'empresas.index' => [
                'roles' => ['ManagmentAdmin', 'Student', 'Secretary', 'President','Adviser'],
                'description' => 'Mostrar vista de empresas'
            ],
            'empresas.create' => [
                'roles' => ['ManagmentAdmin'],
                'description' => 'Crear empresas'
            ],
            'empresas.edit' => [
                'roles' => ['ManagmentAdmin'],
                'description' => 'Editar empresas'
            ],
            'empresas.destroy' => [
                'roles' => ['ManagmentAdmin'],
                'description' => 'Eliminar empresas'
            ],
            //divisiones
            'divisiones.index' => [
                'roles' => ['ManagmentAdmin', 'SuperAdmin','Student', 'Secretary', 'President','Adviser'],
                'description' => 'Ver divisiones'
            ],
            'divisiones.create' => [
                'roles' => ['ManagmentAdmin','SuperAdmin'],
                'description' => 'Crear divisiones'
            ],
            'divisiones.edit' => [
                'roles' => ['ManagmentAdmin','SuperAdmin'],
                'description' => 'Editar divisiones'
            ],
            'divisiones.destroy' => [
                'roles' => ['ManagmentAdmin','SuperAdmin'],
                'description' => 'Eliminar divisiones'
            ],
            //carreras
            'carreras.index' => [
                'roles' => ['ManagmentAdmin', 'SuperAdmin','Student', 'Secretary', 'President','Adviser'],
                'description' => 'Ver carreras'
            ],
            'carreras.create' => [
                'roles' => ['ManagmentAdmin','SuperAdmin'],
                'description' => 'Crear carreras'
            ],
            'carreras.edit' => [
                'roles' => ['ManagmentAdmin','SuperAdmin'],
                'description' => 'Editar carreras'
            ],
            'carreras.destroy' => [
                'roles' => ['ManagmentAdmin','SuperAdmin'],
                'description' => 'Eliminar carreras'
            ],
            
        ];


        foreach ($permissions as $permissionName => $permissionData) {
            $permission = Permission::updateOrCreate(
                ['name' => $permissionName],
                ['description' => $permissionData['description'], 'guard_name' => 'web'] // Actualiza o crea el permiso con la descripción y el guard_name
            );

            foreach ($permissionData['roles'] as $roleName) {
                $role = Role::findByName($roleName, 'web');
                $role->givePermissionTo($permission);
            }
        }




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