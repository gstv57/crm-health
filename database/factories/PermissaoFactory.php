<?php

namespace Database\Factories;

use App\Models\Permissao;
use Illuminate\Database\Eloquent\Factories\Factory;

class PermissaoFactory extends Factory
{
    protected $model = Permissao::class;

    public function definition(): array
    {
        return [
            'nome'       => $this->faker->name(),
            'descricao'  => $this->faker->text(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
