<?php

namespace Database\Factories;

use App\Models\{Paciente, User};
use Illuminate\Database\Eloquent\Factories\Factory;

class PacienteFactory extends Factory
{
    protected $model = Paciente::class;

    public function definition(): array
    {
        $user = User::factory()->create(['password' => 123]);

        $user->roles()->sync(['4']);

        return [
            'user_id'         => $user,
            'primeiro_nome'   => $this->faker->name(),
            'sobrenome'       => $this->faker->name(),
            'data_nascimento' => $this->faker->dateTimeBetween('-80 years', '-18 years')->format('Y-m-d'),
            'sexo'            => $this->faker->randomElement(['Masculino', 'Feminino', 'Outro']),
            'cpf'             => $this->faker->cpf(false),
            'rg'              => $this->faker->rg(false),
            'endereco'        => $this->faker->address(),
            'numero'          => $this->faker->buildingNumber(),
            'complemento'     => $this->faker->buildingNumber(),
            'bairro'          => $this->faker->word,
            'cidade'          => $this->faker->city(),
            'estado'          => $this->faker->regionAbbr(),
            'cep'             => $this->faker->postcode(),
            'telefone'        => $this->faker->cellphoneNumber(),
            'matricula'       => Paciente::createMatricula(),
        ];
    }
}
