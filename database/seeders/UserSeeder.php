<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Crea el usuario administrador por defecto
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@siemprelimpio.cl',
            'password' => Hash::make('admin123'), // Contraseña encriptada de forma segura
        ]);
    }
}