<?php

use App\Models\Consulta;
use App\Models\Medico;
use App\Models\Paciente;
use App\Models\Role;

test('should show to doctor your appointments', function () {
    Role::create(['nome' => 'Administrador']);
    Role::create(['nome' => 'Médico']);
    Role::create(['nome' => 'Recepcionista']);
    Role::create(['nome' => 'Paciente']);

    $medico = Medico::factory()->create()->user;

    $paciente = Paciente::factory()->create();

    Consulta::factory()->create([
        'paciente_id'            => $paciente->id,
        'medico_id'              => $medico->id,
        'usuario_agendamento_id' => $medico,
    ]);

    $this->actingAs($medico);

    $response = $this->get(route('medicos.consulta.index'));


    $response->assertStatus(200);
    $response->assertViewIs('consultas.medico.index');
    $response->assertViewHas('consultas');
});


test('should show to doctor appointments tha pacient x', function () {
    Role::create(['nome' => 'Administrador']);
    Role::create(['nome' => 'Médico']);
    Role::create(['nome' => 'Recepcionista']);
    Role::create(['nome' => 'Paciente']);

    $medico = Medico::factory()->create()->user;

    $paciente = Paciente::factory()->create();

    Consulta::factory()->create([
        'paciente_id'            => $paciente->id,
        'medico_id'              => $medico->id,
        'usuario_agendamento_id' => $medico,
    ]);

    $this->actingAs($medico);

    $response = $this->get(route('medicos.consulta.index'));


    $response->assertStatus(200);
    $response->assertViewIs('consultas.medico.index');
    $response->assertViewHas('consultas');
});

