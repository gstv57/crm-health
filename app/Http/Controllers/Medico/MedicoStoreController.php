<?php

namespace App\Http\Controllers\Medico;

use App\Events\AtividadeNova;
use App\Http\Controllers\Controller;
use App\Http\Requests\Medico\MedicoStoreRequest;
use App\Models\{Medico, User};
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MedicoStoreController extends Controller
{
    public function __invoke(MedicoStoreRequest $request)
    {
        $data = $request->validated();

        DB::beginTransaction();

        try {
            $user     = User::find($request->user);
            $password = bcrypt(Str::random(10));

            if (!$user) {
                $user = User::create([
                    'name'     => $data['nome_completo'],
                    'email'    => $data['email'],
                    'password' => $password,
                ]);
            }

            $medico = Medico::create([
                'user_id'         => $user->id,
                'nome_completo'   => $data['nome_completo'],
                'cpf'             => $data['cpf'],
                'data_nascimento' => $data['data_nascimento'],
                'sexo'            => $data['sexo'],
                'crm'             => $data['crm'],
                'telefone'        => $data['telefone'],
                'cep'             => $data['cep'],
                'bairro'          => $data['bairro'],
                'cidade'          => $data['cidade'],
                'estado'          => $data['estado'],
                'numero'          => $data['numero'],
                'complemento'     => $data['complemento'],
                'endereco'        => $data['endereco'],
                'banco'           => $data['banco'],
                'agencia'         => $data['agencia'],
                'conta'           => $data['conta'],
            ]);

            $medico->especialidades()->sync($data['especialidade']);
            DB::commit();
            event(new AtividadeNova(User::find(auth()->user->id), 'cadastrou um novo médico.'));

            return redirect()->back()->with('success', 'Medico cadastrado com sucesso!');

        } catch (\Exception $error) {
            DB::rollback();
            dd($error->getMessage());
        }
    }

}
