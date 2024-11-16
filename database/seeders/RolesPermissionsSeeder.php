<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


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

        $doctorUser = User::firstOrCreate(
            ['email' => 'doctor@example.com'], // Cambia este email si es necesario
            [
                'name' => 'Doctor User',
                'password' => Hash::make('doctor123'), // Cambia esta contraseña si es necesario
            ]
        );
        
        // Asignar el rol de doctor al usuario creado
        $doctorUser->assignRole('doctor');
        $this->createTestUsers();
    }

    private function createTestUsers()
    {
        // Crear 10 usuarios de tipo "paciente"
        for ($i = 1; $i <= 10; $i++) {
            $user = User::firstOrCreate(
                ['email' => "paciente{$i}@example.com"],
                [
                    'name' => "Paciente {$i}",
                    'password' => Hash::make('password123'), // Contraseña genérica
                ]
            );
            $user->assignRole('paciente');
        }

        // Crear 5 usuarios de tipo "doctor"
        for ($i = 1; $i <= 5; $i++) {
            $user = User::firstOrCreate(
                ['email' => "doctor{$i}@example.com"],
                [
                    'name' => "Doctor {$i}",
                    'password' => Hash::make('password123'), // Contraseña genérica
                ]
            );
            $user->assignRole('doctor');
        }
    }

    
}

