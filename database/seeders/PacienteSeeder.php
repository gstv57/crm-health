<?php

namespace Database\Seeders;

use App\Models\{Consulta, Medico, Paciente};
use Illuminate\Database\Seeder;

class PacienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Medico::factory(5)->create()->each(function (Medico $medico) {
            $medico->especialidades()->attach(rand(1, 15));
            Paciente::factory(2)->create()->each(function ($paciente) use ($medico) {
                Consulta::factory(1)->create([
                    'paciente_id'            => $paciente->id,
                    'medico_id'              => $medico->id,
                    'usuario_agendamento_id' => $medico,
                ]);
            });
        });
    }
}
