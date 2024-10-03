<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UsuarioIndexController extends Controller
{
    public function __invoke(Request $request)
    {
        Gate::authorize('admin');

        // TODO - Filter and pagination
        // TODO - Upload Photo Patient and User if necessary
        try {
            $usuarios = User::with('roles')
                ->orderBy('created_at', 'desc')
                ->paginate(20);

            return view('usuarios.index', [
                'usuarios' => $usuarios,
            ]);
        } catch (Exception $error) {
            dd($error->getMessage());
        }
    }
}
