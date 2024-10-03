<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UsuarioCreateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        Gate::authorize('admin');

        // TODO - Change format name to create one new user, replace fullname for name and surname, after this auto complete form patient if necessary
        $roles = Role::all();

        return view('usuarios.create', [
            'roles' => $roles,
        ]);
    }
}
