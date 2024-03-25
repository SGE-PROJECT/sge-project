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
        $rolesNames = [
            ['name' => 'SuperAdmin', 'namespanish' => 'Super Administrador'],
            ['name' => 'ManagmentAdmin', 'namespanish' => 'Administrador de División'],
            ['name' => 'Adviser', 'namespanish' => 'Asesor'],
            ['name' => 'Student', 'namespanish' => 'Estudiante'],
            ['name' => 'President', 'namespanish' => 'Presidente Académico'],
            ['name' => 'Secretary', 'namespanish' => 'Asistente de dirección'],
        ];
        
        foreach ($rolesNames as $roleData) {
            Role::updateOrCreate(
                ['name' => $roleData['name']],
                ['name' => $roleData['name'], 'namespanish' => $roleData['namespanish'], 'guard_name' => 'web']
            );
        }

        // Primero, se crea el rol SuperAdmin si no existe
        $superAdminRole = Role::findOrCreate('SuperAdmin', 'web');

        // Ahora, creamos los permisos y los asignamos a los roles correspondientes de forma segura
        $permissions = [
            //roles y permisos
            'roles.permissions.index' => [
                'roles' => ['SuperAdmin','ManagmentAdmin'],
                'description' => 'Ver el listado de roles'
            ],
            'roles.permissions.create' => [
                'roles' => ['SuperAdmin'],
                'description' => 'Agregar un nuevo rol'
            ],
            'roles.permissions.edit' => [
                'roles' => ['SuperAdmin'],
                'description' => 'Modificación de roles'
            ],

            'roles.permissions.destroy' => [
                'roles' => ['SuperAdmin'],
                'description' => 'Remover roles'
            ],
            'roles.permissions.show' => [
                'roles' => ['SuperAdmin'],
                'description' => 'Mostrar los detalles de los roles'
            ],
            //empresas
            'empresas.index' => [
                'roles' => ['ManagmentAdmin', 'SuperAdmin', 'Student', 'Secretary', 'President', 'Adviser'],
                'description' => 'Consultar la lista de empresas'
            ],
            'empresas.create' => [
                'roles' => ['ManagmentAdmin', 'SuperAdmin'],
                'description' => 'Agregar nuevas empresas'
            ],
            'empresas.edit' => [
                'roles' => ['ManagmentAdmin', 'SuperAdmin'],
                'description' => 'Moficicación de empresas'
            ],
            'empresas.destroy' => [
                'roles' => ['ManagmentAdmin', 'SuperAdmin'],
                'description' => 'Remover empresas'
            ],
            //divisiones
            'divisiones.index' => [
                'roles' => ['ManagmentAdmin', 'SuperAdmin', 'President', 'Adviser'],
                'description' => 'Consultar las divisiones'
            ],
            'divisiones.create' => [
                'roles' => [ 'SuperAdmin'],
                'description' => 'Agregar nueva división'
            ],
            'divisiones.edit' => [
                'roles' => [ 'SuperAdmin'],
                'description' => 'Modificar las divisiones'
            ],
            'divisiones.destroy' => [
                'roles' => [ 'SuperAdmin'],
                'description' => 'Remover divisiones'
            ],
            //carreras
            'carreras.index' => [
                'roles' => ['ManagmentAdmin', 'SuperAdmin', 'President', 'Adviser'],
                'description' => 'Consultar carreras'
            ],
            'carreras.create' => [
                'roles' => ['ManagmentAdmin', 'SuperAdmin'],
                'description' => 'Agregar nuevas carreras'
            ],
            'carreras.edit' => [
                'roles' => ['ManagmentAdmin', 'SuperAdmin'],
                'description' => 'Modificación de carreras'
            ],
            'carreras.destroy' => [
                'roles' => ['ManagmentAdmin', 'SuperAdmin'],
                'description' => 'Remover carreras'
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