<?php

namespace App\Http\Controllers\Paciente\Consulta;

use App\Http\Controllers\Controller;
use App\Http\Requests\Paciente\Consulta\ConsultaUpdateRequest;
use App\Models\{Consulta, Paciente};
use Exception;
use Illuminate\Support\Facades\{DB, Log};
use Illuminate\Support\{Carbon};

class ConsultaUpdateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Paciente $paciente, Consulta $consulta, ConsultaUpdateRequest $request)
    {
        $data = $request->validated();
        DB::beginTransaction();

        try {
            $data['usuario_agendamento_id'] = auth()->user()->id;
            $data['data_e_hora']            = Carbon::createFromFormat('d/m/Y H:i', $data['data_e_hora']);
            $consulta->update($data);
            DB::commit();

            return to_route('consultas.edit', ['paciente' => $paciente->id, 'consulta' => $consulta->id])->with('success', 'Consulta atualizada com sucesso!');
        } catch (Exception $error) {
            DB::rollback();
            Log::info($error->getMessage());

            return to_route('consultas.edit', ['paciente' => $paciente->id, 'consulta' => $consulta->id])->with('error', 'Algo de errado aconteceu, entre em contato com o suporte.');
        }
    }
}
