<?php

namespace Database\Factories;

use App\Models\{Medico, User};
use Illuminate\Database\Eloquent\Factories\Factory;

class MedicoFactory extends Factory
{
    protected $model = Medico::class;

    public function definition(): array
    {
        $user = User::factory()->create(['password' => 123]);

        $user->roles()->sync([User::MEDICO]);

        return [
            'user_id'         => $user,
            'nome_completo'   => $user->name,
            'cpf'             => $this->faker->cpf(false),
            'data_nascimento' => $this->faker->dateTimeBetween('-80 years', '-18 years')->format('Y-m-d'),
            'sexo'            => $this->faker->randomElement(['masculino', 'feminino', 'outro']),
            'crm'             => $this->faker->unique()->numerify('######'),
            'telefone'        => $this->faker->cellphoneNumber(),
            'cep'             => '18077099',
            'endereco'        => $this->faker->address(),
            'bairro'          => $this->faker->word(),
            'cidade'          => $this->faker->city(),
            'estado'          => $this->faker->region(),
            'numero'          => $this->faker->numerify('####'),
            'complemento'     => $this->faker->text(),
            'banco'           => $this->faker->company(),
            'agencia'         => $this->faker->numerify('####'),
            'conta'           => $this->faker->numerify('######'),
        ];
    }
}
