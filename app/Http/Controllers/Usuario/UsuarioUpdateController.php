<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use App\Http\Requests\Usuario\UsuarioUpdateRequest;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\{Log};

class UsuarioUpdateController extends Controller
{
    public function __invoke(User $usuario, UsuarioUpdateRequest $request)
    {
        $data = $request->validated();

        try {
            if (!empty($data['password'])) {
                $data['password'] = bcrypt($data['password']);
            }

            if (empty($data['password'])) {
                unset($data['password']);
            }
            $usuario->update($data);
            $usuario->roles()->sync($data['roles']);

            return redirect()->route('usuario.edit', $usuario->id)->with('success', 'Usuário atualizado com sucesso!');
        } catch (Exception $error) {
            Log::info($error->getMessage());

            return redirect()->route('usuario.edit', $usuario->id)->with('error', 'Algo de errado aconteceu ao atualizar o usuário, entre em contato com o suporte.');
        }
    }
}
