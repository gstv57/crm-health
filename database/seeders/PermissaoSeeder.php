<?php

namespace Database\Seeders;

use App\Models\{Permissao, Role, User};
use Illuminate\Database\Seeder;

class PermissaoSeeder extends Seeder
{
    public function run(): void
    {
        // Associando permissões às roles
        $admin = Role::where('id', User::ADMIN)->first();

        $permissions = [
            // Users
            ['nome' => 'create_user', 'descricao' => 'Criar usuário'],
            ['nome' => 'read_user', 'descricao' => 'Visualizar usuário'],
            ['nome' => 'update_user', 'descricao' => 'Atualizar usuário'],
            ['nome' => 'delete_user', 'descricao' => 'Excluir usuário'],

            // Pacientes
            ['nome' => 'create_patient', 'descricao' => 'Criar paciente'],
            ['nome' => 'read_patient', 'descricao' => 'Visualizar paciente'],
            ['nome' => 'update_patient', 'descricao' => 'Atualizar paciente'],
            ['nome' => 'delete_patient', 'descricao' => 'Excluir paciente'],

            // Roles
            ['nome' => 'create_role', 'descricao' => 'Criar role'],
            ['nome' => 'read_role', 'descricao' => 'Visualizar role'],
            ['nome' => 'update_role', 'descricao' => 'Atualizar role'],
            ['nome' => 'delete_role', 'descricao' => 'Excluir role'],
        ];

        foreach ($permissions as $permission) {
            Permissao::create($permission);
        }
    }
}
