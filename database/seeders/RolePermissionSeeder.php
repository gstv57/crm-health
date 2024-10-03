<?php

namespace Database\Seeders;

use App\Models\{Permissao, Role};
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $admin = Role::where('nome', 'Administrador')->first();
        $admin->permissoes()->attach(Permissao::all());
    }
}
