<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            // Permisos para administrar usuarios
            'admin.users.index',
            'admin.users.create',
            'admin.users.edit',
            'admin.users.delete',

            // Permisos para administrar tratamientos
            'admin.treatments.index',
            'admin.treatments.create',
            'admin.treatments.edit',
            'admin.treatments.delete',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
    }
}