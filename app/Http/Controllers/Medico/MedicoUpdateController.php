<?php

namespace App\Http\Controllers\Medico;

use App\Http\Controllers\Controller;
use App\Http\Requests\Medico\MedicoUpdateRequest;
use App\Models\{Medico, User};
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MedicoUpdateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Medico $medico, MedicoUpdateRequest $request)
    {
        $data = $request->validated();

        try {
            $user = User::find($medico->user_id);

            $user->update([
                'name'  => $data['nome_completo'],
                'email' => $data['email'],
            ]);

            $medico->update([
                'nome_completo'   => $data['nome_completo'],
                'cpf'             => $data['cpf'],
                'data_nascimento' => $data['data_nascimento'],
                'sexo'            => $data['sexo'],
                'crm'             => $data['crm'],
                'telefone'        => $data['telefone'],
                'endereco'        => $data['endereco'],
                'banco'           => $data['banco'],
                'agencia'         => $data['agencia'],
                'conta'           => $data['conta'],
            ]);

            $medico->especialidades()->sync($data['especialidade']);

            return redirect()->back()->with('success', 'Medico atualizado com sucesso!');

        } catch (Exception $error) {
            Log::info($error->getMessage());

            return redirect()->back()->with('error', 'Medico não atualizado, entre em contato com o suporte.');
        }
    }
}
