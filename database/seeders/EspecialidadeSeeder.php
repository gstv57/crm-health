<?php

namespace Database\Seeders;

use App\Models\Especialidade;
use Illuminate\Database\Seeder;

class EspecialidadeSeeder extends Seeder
{
    private array $especialidades = [
        'Cardiologia',
        'Dermatologia',
        'Pediatria',
        'Ginecologia',
        'Oftalmologia',
        'Ortopedia',
        'Neurologia',
        'Psiquiatria',
        'Endocrinologia',
        'Reumatologia',
        'Urologia',
        'Gastroenterologia',
        'Oncologia',
        'Pneumologia',
        'Otorinolaringologia',
    ];

    public function run(): void
    {
        foreach ($this->especialidades as $especialidade) {
            Especialidade::factory()->create([
                'nome' => $especialidade,
            ]);
        }
    }
}
