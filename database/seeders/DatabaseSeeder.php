<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Crear los roles
        $this->call(RoleSeeder::class);

        // 2. Crear o buscar al administrador
        $admin = User::firstOrCreate(
            ['email' => 'admin@glow.com'],
            [
                'name' => 'Administrador Glow',
                'password' => bcrypt('123456'), // Tu contraseña
            ]
        );

        // 3. Asignar el rol de una
        $admin->assignRole('Admin');
    }
}
