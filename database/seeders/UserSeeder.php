<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Usuarios administradores del panel (dueño y colega)
        User::create([
            'name' => 'Eduar',
            'email' => 'eduar@siemprelimpiospa.cl',
            'password' => Hash::make('Eduar123'),
        ]);

        User::create([
            'name' => 'Dagoberto',
            'email' => 'dagoberto@siemprelimpiospa.cl',
            'password' => Hash::make('Dagoberto123'),
        ]);

        // Usuario del desarrollador para soporte/mantenimiento.
        // TODO: cambiar o eliminar esta contraseña antes de pasar a producción.
        User::create([
            'name' => 'root',
            'email' => 'root@siemprelimpiospa.cl',
            'password' => Hash::make('Nomeacuerdo'),
        ]);
    }
}