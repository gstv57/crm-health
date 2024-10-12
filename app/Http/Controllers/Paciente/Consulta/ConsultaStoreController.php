<?php

namespace App\Http\Controllers\Paciente\Consulta;

use App\Enum\Consulta\ConsultaStatusEnum;
use App\Enum\Pagamento\PagamentoStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Paciente\Consulta\ConsultaStoreRequest;
use App\Models\{Consulta, Paciente};
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\{Carbon, Facades\DB, Str};

class ConsultaStoreController extends Controller
{
    public function __invoke(Paciente $paciente, ConsultaStoreRequest $request)
    {
        $data = $request->validated();
        DB::beginTransaction();

        try {
            $data['paciente_id']            = $paciente->id;
            $data['usuario_agendamento_id'] = auth()->user()->id;
            $data['data_e_hora']            = Carbon::createFromFormat('d/m/Y H:i', $data['data_e_hora']);
            $data['numero_consulta']        = Str::random(10);
            $data['status_consulta']        = $data['status_pagamento'] === PagamentoStatusEnum::PAGO->value ? ConsultaStatusEnum::AGENDADA : ConsultaStatusEnum::PENDENTE;
            $consulta                       = Consulta::create($data);

            $consulta->pagamentos()->create([
                'forma_pagamento'  => $data['forma_pagamento'],
                'valor'            => $data['valor'],
                'status_pagamento' => $data['status_pagamento'],
            ]);
            DB::commit();

            return to_route('consultas.index', $paciente->id)->with('success', 'Consulta cadastrada com sucesso!');
        } catch (Exception $error) {
            DB::rollBack();
            Log::info($error->getMessage());

            return to_route('consultas.index', $paciente->id)->with('error', 'Algo de errado aconteceu, entre em contato com o suporte.');
        }
    }
}
