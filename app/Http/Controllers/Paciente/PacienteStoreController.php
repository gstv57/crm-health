<?php

namespace App\Http\Controllers\Paciente;

use App\Http\Controllers\Controller;
use App\Http\Requests\Paciente\PacienteStoreRequest;
use App\Models\{Paciente, User};
use App\Services\Asaas\CreateCustomer;
use Exception;
use Illuminate\Support\Facades\{DB, Log};
use Illuminate\Support\Str;

class PacienteStoreController extends Controller
{
    public function __invoke(PacienteStoreRequest $request)
    {
        $data = $request->validated();
        // TODO - Pacient should has same email which User
        // TODO - After create User, insert name, surname, email and user_id auto-complete.
        DB::beginTransaction();
        $asaas_client = new CreateCustomer($data['primeiro_nome'] . ' ' . $data['sobrenome'], $data['cpf']);
        $customer_id  = $asaas_client->handle();

        try {
            $data['matricula']   = Paciente::createMatricula();
            $data['customer_id'] = $customer_id;
            $paciente            = Paciente::create($data);

            if (!$paciente->user_id) {
                $password = Str::random(10);
                $user     = User::create([
                    'name'       => $paciente->primeiro_nome . ' ' . $paciente->sobrenome,
                    'email'      => $data['email'],
                    'password'   => bcrypt($password),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
                $paciente->user_id = $user->id;
                $paciente->save();

                DB::commit();

                return to_route('paciente.edit', $paciente)->with('success', 'Paciente cadastrado com sucesso!');
            }

            return redirect()->back()->with('success', 'Paciente cadastrado com sucesso!');

        } catch (Exception $error) {
            Log::error($error->getMessage());
            DB::rollback();

            return redirect()->back()->with(['error' => 'Algo de errado ao cadastrar o paciente, entre em contato com o suporte para mais informações sobre o problema.']);
        }
    }
}
