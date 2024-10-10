<?php

use App\Models\{Paciente, Role, User};
use Faker\Factory as Faker;

test('list-all-pacients', function () {
    $faker = Faker::create();

    $role  = Role::create(['nome' => 'Paciente']);
    $role2 = Role::create(['nome' => 'Administrador']);
    $users = User::factory()->count(3)->create();

    $user_to_test = User::factory()->create();
    $user_to_test->roles()->attach($role2->id);

    foreach ($users as $user) {
        $user->roles()->attach($role->id);
        $user->paciente()->create([
            'primeiro_nome'   => $faker->firstName,
            'sobrenome'       => $faker->lastName,
            'telefone'        => $faker->phoneNumber,
            'data_nascimento' => $faker->date,
            'sexo'            => $faker->randomElement(['masculino', 'feminino']),
            'cpf'             => Paciente::gerarCpf(),
            'rg'              => Paciente::gerarCpf(),
            'endereco'        => $faker->address,
            'numero'          => $faker->buildingNumber,
            'bairro'          => $faker->streetName,
            'cep'             => $faker->postcode,
            'cidade'          => $faker->city,
            'estado'          => $faker->state,
            'matricula'       => Paciente::createMatricula(),
        ]);
    }

    $this->actingAs($user_to_test);

    $response = $this->get(route('paciente.index'));

    $response->assertStatus(200);
    $response->assertViewIs('pacientes.index');
    $response->assertViewHas('pacientes');

    $this->assertEquals(3, $response->viewData('pacientes')->count());

    foreach ($users as $user) {
        $response->assertSee($user->paciente->primeiro_nome);
        $response->assertSee($user->paciente->sobrenome);
        $response->assertSee($user->paciente->telefone);
    }
});

test('create-new-paciente', function () {
    $faker = Faker::create();
    $role  = Role::create(['nome' => 'Administrador']);
    $user  = User::factory()->create();
    $user->roles()->attach($role->id);

    $this->actingAs($user);

    $payload = [
        'email'           => $faker->email,
        'primeiro_nome'   => $faker->firstName,
        'sobrenome'       => $faker->lastName,
        'telefone'        => $faker->phoneNumber,
        'data_nascimento' => $faker->dateTimeBetween('-80 years', '-18 years')->format('Y-m-d'),
        'sexo'            => $faker->randomElement(['Masculino', 'Feminino', 'Outro']),
        'cpf'             => Paciente::gerarCpf(),
        'rg'              => Paciente::gerarCpf(),
        'endereco'        => $faker->address,
        'numero'          => $faker->buildingNumber,
        'bairro'          => $faker->streetName,
        'cep'             => '18077099',
        'cidade'          => $faker->city,
        'estado'          => 'SP',
    ];

    $response = $this->post(route('paciente.store'), $payload);

    $response->assertStatus(302);

    $response->assertSessionHas('success', 'Paciente cadastrado com sucesso!');

    $this->assertDatabaseHas('pacientes', [
        'primeiro_nome'   => $payload['primeiro_nome'],
        'sobrenome'       => $payload['sobrenome'],
        'telefone'        => $payload['telefone'],
        'data_nascimento' => $payload['data_nascimento'],
        'sexo'            => $payload['sexo'],
        'cpf'             => $payload['cpf'],
        'rg'              => $payload['rg'],
        'endereco'        => $payload['endereco'],
        'numero'          => $payload['numero'],
        'bairro'          => $payload['bairro'],
        'cep'             => $payload['cep'],
        'cidade'          => $payload['cidade'],
        'estado'          => $payload['estado'],
    ]);

    $paciente = Paciente::where('cpf', $payload['cpf'])->first();
    $this->assertNotNull($paciente->user);
});
