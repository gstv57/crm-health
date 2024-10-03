<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::factory()->create([
            'nome' => 'Administrador',
        ]);
        Role::factory()->create([
            'nome' => 'Médico',
        ]);
        Role::factory()->create([
            'nome' => 'Recepcionista',
        ]);
        Role::factory()->create([
            'nome' => 'Paciente',
        ]);
    }
}
