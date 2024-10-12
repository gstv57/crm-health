<?php

use App\Models\{Role, User};

test('login screen can be rendered', function () {
    $response = $this->get('/login');

    $response->assertStatus(200);
});

it('admin users can authenticate and are redirected to the admin dashboard', function () {
    $user = User::factory()->create();
    $role = Role::create(['nome' => 'Administrador']);
    $user->roles()->attach($role->id);

    $response = $this->post('/login', [
        'email'    => $user->email,
        'password' => 'password',
    ]);

    $this->assertAuthenticatedAs($user);
    $response->assertRedirect(route('dashboard.analise', absolute: false));
});

# TO-DO finalizar os testes para redirecionamento conforme o role do user autenticated

//it('medico users can authenticate and are redirected to the medical consultations', function () {
//    $user = User::factory()->create();
//    $role = Role::create(['nome' => 'Médico']);
//    $user->roles()->attach($role->id);
//
//    $response = $this->post('/login', [
//        'email'    => $user->email,
//        'password' => 'password',
//    ]);
//
//    $this->assertAuthenticatedAs($user);
//    $response->assertRedirect(route('medicos.consulta.index', absolute: false));
//});
//
//it('recepcionista users can authenticate and are redirected to the patient consultations', function () {
//    $user = User::factory()->create();
//    $role = Role::create(['nome' => 'Recepcionista']);
//    $user->roles()->attach($role->id);
//
//    $response = $this->post('/login', [
//        'email'    => $user->email,
//        'password' => 'password',
//    ]);
//
//    $this->assertAuthenticatedAs($user);
//    $response->assertRedirect(route('paciente.index', absolute: false));
//});
//
//it('paciente users can authenticate and are redirected to their consultations', function () {
//    $user = User::factory()->create();
//    $role = Role::create(['nome' => 'Paciente']);
//    $user->roles()->attach($role->id);
//
//    $response = $this->post('/login', [
//        'email'    => $user->email,
//        'password' => 'password',
//    ]);
//
//    $this->assertAuthenticatedAs($user);
//    $response->assertRedirect(route('minhas.consulta.index', absolute: false));
//});

test('users can not authenticate with invalid password', function () {
    $user = User::factory()->create();

    $this->post('/login', [
        'email'    => $user->email,
        'password' => 'wrong-password',
    ]);

    $this->assertGuest();
});

test('users can logout', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post('/logout');

    $this->assertGuest();
    $response->assertRedirect('/');
});
