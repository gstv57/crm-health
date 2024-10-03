<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use App\Models\{Role, User};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UsuarioEditController extends Controller
{
    public function __invoke(User $usuario, Request $request)
    {
        Gate::authorize('admin');

        $roles = Role::all();

        return view('usuarios.edit', [
            'roles'   => $roles,
            'usuario' => $usuario,
        ]);
    }
}
