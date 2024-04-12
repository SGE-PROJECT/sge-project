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
        $rolesNames = ['Super Administrador', 'Administrador de División', 'Asesor Académico', 'Estudiante', 'Presidente Académico', 'Asistente de Dirección'];
        foreach ($rolesNames as $roleName) {
            Role::findOrCreate($roleName, 'web');
        }

        // Primero, se crea el rol Super Administrador si no existe
        $SuperAdministradorRole = Role::findOrCreate('Super Administrador', 'web');

        // Ahora, creamos los permisos y los asignamos a los roles correspondientes de forma segura
        $permissions = [
            //roles y permisos
            'roles.permissions.index' => [
                'roles' => ['Super Administrador','Administrador de División'],
                'description' => 'Ver el listado de roles'
            ],
            'roles.permissions.create' => [
                'roles' => ['Super Administrador'],
                'description' => 'Agregar un nuevo rol'
            ],
            'roles.permissions.edit' => [
                'roles' => ['Super Administrador'],
                'description' => 'Modificación de roles'
            ],

            'roles.permissions.destroy' => [
                'roles' => ['Super Administrador'],
                'description' => 'Remover roles'
            ],
            'roles.permissions.show' => [
                'roles' => ['Super Administrador'],
                'description' => 'Mostrar los detalles de los roles'
            ],
            //empresas
            'empresas.index' => [
                'roles' => [ 'Super Administrador','Administrador de División'],
                'description' => 'Consultar la lista de empresas'
            ],
            'empresas.create' => [
                'roles' => ['Administrador de División', 'Super Administrador'],
                'description' => 'Agregar nuevas empresas'
            ],
            'empresas.edit' => [
                'roles' => ['Administrador de División', 'Super Administrador'],
                'description' => 'Moficicación de empresas'
            ],
            'empresas.destroy' => [
                'roles' => ['Administrador de División', 'Super Administrador'],
                'description' => 'Remover empresas'
            ],
            'empresas.showTable' => [
                'roles' => ['Administrador de División', 'Asesor Académico'],
                'description' => 'Remover empresas'
            ],
            //divisiones
            'divisiones.index' => [
                'roles' => ['Administrador de División', 'Super Administrador', 'Presidente Académico', 'Asesor Académico'],
                'description' => 'Consultar las divisiones'
            ],
            'divisiones.create' => [
                'roles' => [ 'Super Administrador'],
                'description' => 'Agregar nueva división'
            ],
            'divisiones.edit' => [
                'roles' => [ 'Super Administrador'],
                'description' => 'Modificar las divisiones'
            ],
            'divisiones.destroy' => [
                'roles' => [ 'Super Administrador'],
                'description' => 'Remover divisiones'
            ],
            //carreras
            'carreras.index' => [
                'roles' => ['Super Administrador'], // Solo Super Administrador
                'description' => 'Consultar las carreras'
            ],
            'carreras.create' => [
                'roles' => ['Super Administrador'], // Solo Super Administrador
                'description' => 'Agregar nuevas carreras'
            ],
            'carreras.edit' => [
                'roles' => ['Super Administrador'], // Solo Super Administrador
                'description' => 'Modificación de carreras'
            ],
            'carreras.destroy' => [
                'roles' => ['Super Administrador'], // Solo Super Administrador
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
        $SuperAdministradorPermission = Permission::updateOrCreate(
            ['name' => 'Super Administrador.*', 'guard_name' => 'web'],
            ['description' => 'Acceso sin restricciones a todas las áreas']
        );

        $SuperAdministradorRole->givePermissionTo($SuperAdministradorPermission);


        // Opcionalmente, se puede asignar directamente este permiso especial al Super Administrador
        $SuperAdministradorRole->givePermissionTo(Permission::all());
    }
}
