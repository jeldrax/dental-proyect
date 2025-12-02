<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Usuario Administrador
        User::factory()->create([
            'name' => 'Administrador General',
            'email' => 'admin@dental.com',
            'password' => bcrypt('12345678'),
        ])->assignRole('Admin');

        // 2. Usuario Dentista
        User::factory()->create([
            'name' => 'Dr. Muelitas',
            'email' => 'doctor@dental.com',
            'password' => bcrypt('12345678'),
        ])->assignRole('Dentista');

        // 3. Usuario Recepcionista
        User::factory()->create([
            'name' => 'Ana Recepcionista',
            'email' => 'recepcion@dental.com',
            'password' => bcrypt('12345678'),
        ])->assignRole('Recepcionista');

        // 4. Crear 15 Pacientes falsos
        User::factory(15)->create()->each(function ($user) {
            $user->assignRole('Paciente');
        });
    }
}