<?php

use App\Models\{Role, User};

test('list-all-users', function () {

    $role = Role::create(['nome' => 'Administrador']);
    $user = User::factory()->create();
    $user->roles()->attach($role->id);

    $this->actingAs($user);

    $response = $this->get('/usuarios');

    $response->assertStatus(200);
    $response->assertViewIs('usuarios.index');
    $response->assertViewHas('usuarios');
    $this->assertEquals(1, $response->viewData('usuarios')->count());

    $response->assertSee($user->name);
    $response->assertSee($user->roles()->first()->nome);
});

test('create-new-user', function () {

    $role = Role::create(['nome' => 'Administrador']);
    $user = User::factory()->create();
    $user->roles()->attach($role->id);

    $this->actingAs($user);

    $payload = [
        'name'     => 'Novo Usuário',
        'email'    => 'novo@exemplo.com',
        'password' => 'senha123@',
        'roles'    => [$role->id],
    ];

    $response = $this->post(route('usuario.store'), $payload);
    $response->assertStatus(302);
    $response->assertRedirect(route('usuario.index'));
    $response->assertSessionHas('success', 'Usuario cadastrado com sucesso!');

    $this->assertDatabaseHas('users', [
        'name'  => 'Novo Usuário',
        'email' => 'novo@exemplo.com',
    ]);

    $exists_user = User::where('email', 'novo@exemplo.com')->first();
    $this->assertTrue($exists_user->roles->contains($role));
});

test('edit-user', function () {
    $role = Role::create(['nome' => 'Administrador']);
    $user = User::factory()->create();
    $user->roles()->attach($role->id);

    $this->actingAs($user);

    $newPassword = 'senha123@1';

    $payload = [
        'id'                    => $user->id,
        'name'                  => 'Novo Nome',
        'email'                 => 'novo@email.com',
        'password'              => $newPassword,
        'password_confirmation' => $newPassword,
        'roles'                 => [$role->id],
    ];

    $response = $this->patch(route('usuario.update', $user->id), $payload);

    $response->assertStatus(302);
    $response->assertRedirect(route('usuario.edit', $user->id));
    $response->assertSessionHas('success', 'Usuário atualizado com sucesso!');

    $updatedUser = User::find($user->id);

    $this->assertEquals('Novo Nome', $updatedUser->name);
    $this->assertEquals('novo@email.com', $updatedUser->email);

    $this->assertTrue(Hash::check($newPassword, $updatedUser->password));

    $this->assertTrue($updatedUser->roles->contains($role));
});
