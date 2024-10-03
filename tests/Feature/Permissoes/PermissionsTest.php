<?php

use App\Models\{Paciente, Role, User};
use Faker\Factory as Faker;

# ROLES
test('admin can see all roles', function () {
    $role  = Role::create(['nome' => 'Administrador']);
    $admin = User::factory()->create();
    $admin->roles()->sync($role->id);

    $this->actingAs($admin);

    $response = $this->get('/roles');

    $response->assertStatus(200);
});

test('no one can see the roles, beyond the admin', function () {

    $role1 = Role::create(['nome' => 'Paciente']);

    $paciente = User::factory()->create();
    $paciente->roles()->sync($role1->id);

    $this->actingAs($paciente);
    $response = $this->get('/roles');
    $response->assertStatus(403);

});

test('no one can edit the roles, beyond the admin', function () {

    $role1 = Role::create(['nome' => 'Paciente']);
    $role2 = Role::create(['nome' => 'Administrador']);

    $paciente = User::factory()->create();
    $paciente->roles()->sync($role1->id);

    $admin = User::factory()->create();
    $admin->roles()->sync($role2->id);

    $this->actingAs($paciente);
    $response = $this->get(route('role.edit', ['role' => $role1->id]));
    $response->assertStatus(403);

    $this->actingAs($admin);
    $response = $this->get(route('role.edit', ['role' => $role1->id]));
    $response->assertStatus(200);
});

test('no one can update the roles, beyond the admin', function () {

    $role1 = Role::create(['nome' => 'Paciente']);
    $role2 = Role::create(['nome' => 'Administrador']);

    $paciente = User::factory()->create();
    $paciente->roles()->sync($role1->id);

    $admin = User::factory()->create();
    $admin->roles()->sync($role2->id);

    $this->actingAs($paciente);
    $response = $this->patch(route('role.update', ['role' => $role1->id]));
    $response->assertStatus(403);

    $this->actingAs($admin);
    $response = $this->patch(route('role.update', ['role' => $role1->id]));
    $response->assertStatus(302);
});

# USERS
test('admin can see all users', function () {
    $role  = Role::create(['nome' => 'Administrador']);
    $admin = User::factory()->create();
    $admin->roles()->sync($role->id);

    $this->actingAs($admin);

    $response = $this->get(route('usuario.index'));

    $response->assertStatus(200);
});

test('nobody can see the users, beyond the admin', function () {
    $role1 = Role::create(['nome' => 'Paciente']);

    $paciente = User::factory()->create();
    $paciente->roles()->sync($role1->id);

    $this->actingAs($paciente);

    $response = $this->get(route('usuario.index'));

    $response->assertStatus(403);
});

test('nobody can edit the users, beyond the admin', function () {

    $role1    = Role::create(['nome' => 'Paciente']);
    $paciente = User::factory()->create();
    $paciente->roles()->sync($role1->id);

    $this->actingAs($paciente);

    $response = $this->get(route('usuario.edit', ['usuario' => $paciente->id]));

    $response->assertStatus(403);

    $role  = Role::create(['nome' => 'Administrador']);
    $admin = User::factory()->create();
    $admin->roles()->sync($role->id);

    $this->actingAs($admin);

    $response = $this->get(route('usuario.edit', ['usuario' => $paciente->id]));

    $response->assertStatus(200);
});

test('nobody can update the users, beyond the admin', function () {
    $role1    = Role::create(['nome' => 'Paciente']);
    $paciente = User::factory()->create();
    $paciente->roles()->sync($role1->id);

    $payload = [
        'name'  => 'GUSTAVO',
        'email' => 'teste@example1.com.br',
        'roles' => [
            $role1->id,
        ],
    ];

    $this->actingAs($paciente);

    $response = $this->patch(route('usuario.update', ['usuario' => $paciente->id]), $payload);
    $response->assertStatus(403);

    $role  = Role::create(['nome' => 'Administrador']);
    $admin = User::factory()->create();
    $admin->roles()->sync($role->id);

    $this->actingAs($admin);

    $response = $this->patch(route('usuario.update', ['usuario' => $paciente->id]), $payload);

    $response->assertStatus(302);
});

test('nobody can store the users, beyond the admin', function () {

    $role1    = Role::create(['nome' => 'Paciente']);
    $paciente = User::factory()->create();
    $paciente->roles()->sync($role1->id);

    $payload = [
        'name'     => 'GUSTAVO',
        'email'    => 'teste@example1.com.br',
        'password' => 'example_password',
        'roles'    => [
            $role1->id,
        ],
    ];

    $this->actingAs($paciente);

    $response = $this->post(route('usuario.store'), $payload);
    $response->assertStatus(403);

    $role  = Role::create(['nome' => 'Administrador']);
    $admin = User::factory()->create();
    $admin->roles()->sync($role->id);

    $this->actingAs($admin);

    $response = $this->post(route('usuario.store'), $payload);

    $response->assertStatus(302);
});

test('nobody can acess create view the users, beyond the admin', function () {

    $role1    = Role::create(['nome' => 'Paciente']);
    $paciente = User::factory()->create();
    $paciente->roles()->sync($role1->id);

    $payload = [
        'name'     => 'GUSTAVO',
        'email'    => 'teste@example1.com.br',
        'password' => 'example_password',
        'roles'    => [
            $role1->id,
        ],
    ];

    $this->actingAs($paciente);

    $response = $this->get(route('usuario.create'), $payload);
    $response->assertStatus(403);

    $role  = Role::create(['nome' => 'Administrador']);
    $admin = User::factory()->create();
    $admin->roles()->sync($role->id);

    $this->actingAs($admin);

    $response = $this->get(route('usuario.create'), $payload);

    $response->assertStatus(200);
});

# PACIENTS
test('nobody can acess index view the pacients, beyond the admin/medico/recepcionista', function () {
    $role1    = Role::create(['nome' => 'Paciente']);
    $paciente = User::factory()->create();
    $paciente->roles()->sync($role1->id);
    $this->actingAs($paciente);

    $response = $this->get(route('paciente.index'));
    $response->assertStatus(403);

    $admin_role = Role::create(['nome' => 'Administrador']);
    $admin      = User::factory()->create();
    $admin->roles()->sync($admin_role->id);
    $this->actingAs($admin);
    $response = $this->get(route('paciente.index'));
    $response->assertStatus(200);

    $role_medico = Role::create(['nome' => 'Médico']);
    $medico      = User::factory()->create();
    $medico->roles()->sync($role_medico->id);
    $this->actingAs($medico);
    $response = $this->get(route('paciente.index'));
    $response->assertStatus(200);

    $role_recepcionista = Role::create(['nome' => 'Recepcionista']);
    $recepcionista      = User::factory()->create();
    $recepcionista->roles()->sync($role_recepcionista->id);
    $this->actingAs($recepcionista);
    $response = $this->get(route('paciente.index'));
    $response->assertStatus(200);
});

test('nobody can acess create view the pacients, beyond the admin/medico/recepcionista', function () {

    $admin_role = Role::create(['nome' => 'Administrador']);
    $admin      = User::factory()->create();
    $admin->roles()->sync($admin_role->id);
    $this->actingAs($admin);
    $response = $this->get(route('paciente.create'));
    $response->assertStatus(200);

    $role_medico = Role::create(['nome' => 'Médico']);
    $medico      = User::factory()->create();
    $medico->roles()->sync($role_medico->id);
    $this->actingAs($medico);
    $response = $this->get(route('paciente.create'));
    $response->assertStatus(200);

    $role_recepcionista = Role::create(['nome' => 'Recepcionista']);
    $recepcionista      = User::factory()->create();
    $recepcionista->roles()->sync($role_recepcionista->id);
    $this->actingAs($recepcionista);
    $response = $this->get(route('paciente.create'));
    $response->assertStatus(200);

    $paciente_role = Role::create(['nome' => 'Paciente']);
    $paciente      = User::factory()->create();
    $paciente->roles()->sync($paciente_role->id);
    $this->actingAs($paciente);

    $response = $this->get(route('paciente.create'));
    $response->assertStatus(403);
});

test('nobody can acess edit view the pacients, beyond the admin/medico/recepcionista', function () {
    $admin_role         = Role::create(['nome' => 'Administrador']);
    $role_medico        = Role::create(['nome' => 'Médico']);
    $role_recepcionista = Role::create(['nome' => 'Recepcionista']);
    $paciente_role      = Role::create(['nome' => 'Paciente']);

    $paciente = Paciente::factory()->create();

    $admin = User::factory()->create();
    $admin->roles()->sync($admin_role->id);
    $this->actingAs($admin);
    $response = $this->get(route('paciente.edit', ['paciente' => $paciente->user_id]));
    $response->assertStatus(200);

    $medico = User::factory()->create();
    $medico->roles()->sync($role_medico->id);
    $this->actingAs($medico);
    $response = $this->get(route('paciente.edit', ['paciente' => $paciente->user_id]));
    $response->assertStatus(200);

    $recepcionista = User::factory()->create();
    $recepcionista->roles()->sync($role_recepcionista->id);
    $this->actingAs($recepcionista);
    $response = $this->get(route('paciente.edit', ['paciente' => $paciente->user_id]));
    $response->assertStatus(200);

    $paciente->user->roles()->attach($paciente_role->id);
    $this->actingAs($paciente->user);
    $response = $this->get(route('paciente.edit', ['paciente' => $paciente->user_id]));
    $response->assertStatus(403);
});

test('nobody can store the pacients, beyond the admin/medico/recepcionista', function () {
    $admin_role = Role::create(['nome' => 'Administrador']);
    Role::create(['nome' => 'Médico']);
    Role::create(['nome' => 'Recepcionista']);
    $paciente_role = Role::create(['nome' => 'Paciente']);

    $faker   = Faker::create('pt_BR');
    $payload = [
        'primeiro_nome'   => 'ooooi',
        'sobrenome'       => 'ooooi',
        'data_nascimento' => '15/08/1985',
        'sexo'            => 'masculino',
        'cpf'             => Paciente::gerarCpf(),
        'rg'              => $faker->numerify('#########'),
        'endereco'        => $faker->streetName,
        'numero'          => $faker->randomNumber(3),
        'complemento'     => $faker->optional()->secondaryAddress,
        'bairro'          => $faker->citySuffix,
        'cidade'          => $faker->city,
        'estado'          => $faker->stateAbbr,
        'cep'             => $faker->numerify('########'),
        'telefone'        => $faker->phoneNumber,
        'email'           => $faker->email,
    ];

    $admin = User::factory()->create();
    $admin->roles()->sync($admin_role->id);
    $this->actingAs($admin);
    $response = $this->post(route('paciente.store'), $payload);
    $response->assertStatus(302);

    $payload2 = [
        'primeiro_nome'   => 'ooooi',
        'sobrenome'       => 'ooooi',
        'data_nascimento' => '15/08/1985',
        'sexo'            => 'masculino',
        'cpf'             => Paciente::gerarCpf(),
        'rg'              => $faker->numerify('#########'),
        'endereco'        => $faker->streetName,
        'numero'          => $faker->randomNumber(3),
        'complemento'     => $faker->optional()->secondaryAddress,
        'bairro'          => $faker->citySuffix,
        'cidade'          => $faker->city,
        'estado'          => $faker->stateAbbr,
        'cep'             => $faker->numerify('########'),
        'telefone'        => $faker->phoneNumber,
        'email'           => $faker->email,
    ];

    $paciente = Paciente::factory()->create();
    $paciente->user->roles()->attach($paciente_role->id);
    $this->actingAs($paciente->user);
    $response = $this->post(route('paciente.store'), $payload2);
    $response->assertStatus(403);
});

test('nobody can update the pacients, beyond the admin/medico/recepcionista', function () {
    $faker = Faker::create('pt_BR');
    Role::create(['nome' => 'Administrador']);
    Role::create(['nome' => 'Médico']);
    Role::create(['nome' => 'Recepcionista']);
    Role::create(['nome' => 'Paciente']);
    $paciente = Paciente::factory()->create();

    $payload = [
        'primeiro_nome'   => 'ooooi',
        'sobrenome'       => 'ooooi',
        'data_nascimento' => '15/08/1985',
        'sexo'            => 'masculino',
        'cpf'             => $paciente->cpf,
        'rg'              => $paciente->rg,
        'endereco'        => $faker->streetName,
        'numero'          => $faker->randomNumber(3),
        'complemento'     => $faker->optional()->secondaryAddress,
        'bairro'          => $faker->citySuffix,
        'cidade'          => $faker->city,
        'estado'          => $faker->stateAbbr,
        'cep'             => '12345-678',
        'telefone'        => $faker->phoneNumber,
        'email'           => $paciente->user->email,
    ];

    $admin = User::factory()->create();

    $admin->roles()->sync([User::ADMIN]);
    $this->actingAs($admin);
    $response = $this->patch(route('paciente.update', ['paciente' => $paciente->id]), $payload);
    $response->assertStatus(302);

    $payload2 = [
        'primeiro_nome'   => 'ooooi',
        'sobrenome'       => 'ooooi',
        'data_nascimento' => '15/08/1985',
        'sexo'            => 'masculino',
        'cpf'             => $paciente->cpf,
        'rg'              => $paciente->rg,
        'endereco'        => $faker->streetName,
        'numero'          => $faker->randomNumber(3),
        'complemento'     => $faker->optional()->secondaryAddress,
        'bairro'          => $faker->citySuffix,
        'cidade'          => $faker->city,
        'estado'          => $faker->stateAbbr,
        'cep'             => '12345-678',
        'telefone'        => $faker->phoneNumber,
        'email'           => $paciente->user->email,
    ];

    $this->actingAs($paciente->user);
    $response = $this->patch(route('paciente.update', ['paciente' => $paciente->id]), $payload2);
    $response->assertStatus(403);
});

# Doctors
