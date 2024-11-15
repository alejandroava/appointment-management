<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear permisos
        $permissions = ['view_appointment', 'create_appointment', 'edit_appointment','admin_panel'];
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Crear roles y asignar permisos
        $roles = [
            'usuario_publico' => [],
            'paciente' => ['view_appointment','create_appointment'],
            'doctor' => ['view_appointment', 'edit_appointment','admin_panel'],
            'admin' => ['view_appointment', 'create_appointment', 'edit_appointment','admin_panel']
        ];

        foreach ($roles as $roleName => $perms) {
            $role = Role::firstOrCreate(['name' => $roleName]);
            $role->syncPermissions($perms);
        }

        // Crear un usuario administrador
        $adminUser = User::firstOrCreate(
            ['email' => 'admin@admin.com'], // Cambia este email si es necesario
            [
                'name' => 'Admin User',
                'password' => Hash::make('admin123'), // Cambia esta contraseña si es necesario
            ]
        );

        // Asignar el rol de admin al usuario creado
        $adminUser->assignRole('admin');
    }
}
