<?php

namespace Database\Factories;

use App\Enum\Consulta\{ConsultaStatusEnum, ConsultaTypeEnum};
use App\Enum\Pagamento\{PagamentoStatusEnum, PagamentoTypeEnum};
use App\Models\{Consulta};
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\{Carbon, Str};

class ConsultaFactory extends Factory
{
    protected $model = Consulta::class;

    public function definition(): array
    {
        return [
            'numero_consulta'          => Str::random(7),
            'data_e_hora'              => Carbon::now(),
            'tipo_consulta'            => $this->faker->randomElement(ConsultaTypeEnum::cases()),
            'motivo_consulta'          => $this->faker->word(),
            'sintomas'                 => $this->faker->word(),
            'diagnostico'              => $this->faker->word(),
            'prescricao_medica'        => $this->faker->word(),
            'exames_solicitados'       => $this->faker->word(),
            'observacoes_medicas'      => $this->faker->word(),
            'historico_doenca_atual'   => $this->faker->word(),
            'historico_familiar'       => $this->faker->word(),
            'historico_medico'         => $this->faker->word(),
            'forma_pagamento'          => $this->faker->randomElement(PagamentoTypeEnum::cases()),
            'valor_consulta'           => $this->faker->randomFloat(2, 0, 1000),
            'status_pagamento'         => $this->faker->randomElement(PagamentoStatusEnum::cases()),
            'status_consulta'          => $this->faker->randomElement(ConsultaStatusEnum::cases()),
            'motivo_cancelamento'      => $this->faker->word(),
            'exames_realizados'        => $this->faker->word(),
            'procedimentos_realizados' => $this->faker->word(),
            'created_at'               => Carbon::now(),
            'updated_at'               => Carbon::now(),
            'cancelada_por'            => null,
        ];
    }
}
