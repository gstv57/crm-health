<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use App\Models\{Permissao, Role};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RoleEditController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Role $role, Request $request)
    {
        Gate::authorize('admin');

        $permissoes = Permissao::all();

        return view('roles.edit', [
            'role'       => $role,
            'permissoes' => $permissoes,
        ]);
    }
}
