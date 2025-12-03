<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // Crear roles
        $adminRole = Role::firstOrCreate(['name' => 'Admin']);
        $dentistaRole = Role::firstOrCreate(['name' => 'Dentista']);
        $recepcionistaRole = Role::firstOrCreate(['name' => 'Recepcionista']);
        $pacienteRole = Role::firstOrCreate(['name' => 'Paciente']);

        // Permisos para Admin
        $adminRole->syncPermissions(Permission::all());

        // Permisos para Dentista
        $dentistaRole->syncPermissions([
            'admin.users.index', // Ver lista de usuarios (pacientes)
            'admin.treatments.index', // Ver tratamientos
        ]);

        // Permisos para Recepcionista
        $recepcionistaRole->syncPermissions([
            'admin.users.index', // Ver lista de usuarios (pacientes)
            'admin.users.create', // Crear pacientes
            'admin.users.edit', // Editar pacientes
            'admin.treatments.index', // Ver tratamientos para cobrar
        ]);

        // Permisos para Paciente
        $pacienteRole->syncPermissions([
            'admin.treatments.index', // Ver menú de servicios
        ]);
    }
}
