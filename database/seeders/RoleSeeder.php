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
        $rolesNames = ['SuperAdmin', 'ManagmentAdmin', 'Adviser', 'Student', 'President'];
        foreach ($rolesNames as $roleName) {
            Role::findOrCreate($roleName, 'web');
        }

        // Primero, se crea el rol SuperAdmin si no existe
        $superAdminRole = Role::findOrCreate('SuperAdmin', 'web');

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
<<<<<<< HEAD
                'roles' => ['ManagmentAdmin', 'Student', 'President','Adviser'],
=======
                'roles' => ['ManagmentAdmin', 'SuperAdmin', 'Student', 'Secretary', 'President', 'Adviser'],
>>>>>>> develop
                'description' => 'Mostrar vista de empresas'
            ],
            'empresas.create' => [
                'roles' => ['ManagmentAdmin', 'SuperAdmin'],
                'description' => 'Crear empresas'
            ],
            'empresas.edit' => [
                'roles' => ['ManagmentAdmin', 'SuperAdmin'],
                'description' => 'Editar empresas'
            ],
            'empresas.destroy' => [
                'roles' => ['ManagmentAdmin', 'SuperAdmin'],
                'description' => 'Eliminar empresas'
            ],
            //divisiones
            'divisiones.index' => [
<<<<<<< HEAD
                'roles' => ['ManagmentAdmin', 'SuperAdmin','Student', 'President','Adviser'],
=======
                'roles' => ['ManagmentAdmin', 'SuperAdmin', 'Student', 'Secretary', 'President', 'Adviser'],
>>>>>>> develop
                'description' => 'Ver divisiones'
            ],
            'divisiones.create' => [
                'roles' => ['ManagmentAdmin', 'SuperAdmin'],
                'description' => 'Crear divisiones'
            ],
            'divisiones.edit' => [
                'roles' => ['ManagmentAdmin', 'SuperAdmin'],
                'description' => 'Editar divisiones'
            ],
            'divisiones.destroy' => [
                'roles' => ['ManagmentAdmin', 'SuperAdmin'],
                'description' => 'Eliminar divisiones'
            ],
            //carreras
            'carreras.index' => [
<<<<<<< HEAD
                'roles' => ['ManagmentAdmin', 'SuperAdmin','Student', 'President','Adviser'],
=======
                'roles' => ['ManagmentAdmin', 'SuperAdmin', 'Student', 'Secretary', 'President', 'Adviser'],
>>>>>>> develop
                'description' => 'Ver carreras'
            ],
            'carreras.create' => [
                'roles' => ['ManagmentAdmin', 'SuperAdmin'],
                'description' => 'Crear carreras'
            ],
            'carreras.edit' => [
                'roles' => ['ManagmentAdmin', 'SuperAdmin'],
                'description' => 'Editar carreras'
            ],
            'carreras.destroy' => [
                'roles' => ['ManagmentAdmin', 'SuperAdmin'],
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

        // Se crea un permiso especial que actúa como wildcard para todos los permisos posibles.
        // Se crea un permiso especial que actúa como wildcard para todos los permisos posibles.
        // Esto es correcto para updateOrCreate
        $superAdminPermission = Permission::updateOrCreate(
            ['name' => 'superadmin.*', 'guard_name' => 'web'],
            ['description' => 'Acceso sin restricciones a todas las áreas']
        );

        $superAdminRole->givePermissionTo($superAdminPermission);


        // Opcionalmente, se puede asignar directamente este permiso especial al SuperAdmin
        $superAdminRole->givePermissionTo(Permission::all());
    }
}
