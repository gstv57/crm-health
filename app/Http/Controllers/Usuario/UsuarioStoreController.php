<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use App\Http\Requests\Usuario\UsuarioStoreRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UsuarioStoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UsuarioStoreRequest $request)
    {
        $data             = $request->validated();
        $data['password'] = bcrypt($data['password']);

        try {
            $user = User::create($data);
            $user->roles()->attach($data['roles']);

            return to_route('usuario.index')->with('success', 'Usuario cadastrado com sucesso!');
        } catch (Exception $error) {
            Log::info($error->getMessage());

            return redirect()->back()->with('error', 'Algo de errado aconteceu ao cadastrar um novo usuário, entre em contato com o suporte.');
        }
    }
}
