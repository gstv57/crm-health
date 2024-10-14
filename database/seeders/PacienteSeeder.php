<?php

namespace Database\Seeders;

use App\Enum\Pagamento\{PagamentoStatusEnum, PagamentoTypeEnum};
use App\Models\{Consulta, Medico, Paciente};
use Illuminate\Database\Seeder;

class PacienteSeeder extends Seeder
{
    public function run(): void
    {
        Medico::factory(1)->create()->each(function (Medico $medico) {
            $medico->especialidades()->attach(rand(1, 15));
            Paciente::factory(5)->create()->each(function ($paciente) use ($medico) {
                $consulta = Consulta::factory()->create([
                    'paciente_id'            => $paciente->id,
                    'medico_id'              => $medico->id,
                    'usuario_agendamento_id' => $medico,
                ]);
                //                $consulta->pagamentos()->create([
                //                    'forma_pagamento'  => $faker->randomElement(PagamentoTypeEnum::cases()),
                //                    'valor_consulta'   => $faker->randomFloat(2, 0, 1000),
                //                    'status_pagamento' => $faker->randomElement(PagamentoStatusEnum::cases()),
                //                ]);
                //                TODO - precisa ser finalizado isso, ajusta o seeder
            });
        });
    }
}
