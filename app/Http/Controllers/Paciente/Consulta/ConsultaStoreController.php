<?php

namespace App\Http\Controllers\Paciente\Consulta;

use App\Http\Controllers\Controller;
use App\Http\Requests\Paciente\Consulta\ConsultaStoreRequest;
use App\Models\{Consulta, Paciente};
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\{Carbon, Str};

class ConsultaStoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Paciente $paciente, ConsultaStoreRequest $request)
    {
        $data = $request->validated();

        try {
            $data['paciente_id']            = $paciente->id;
            $data['usuario_agendamento_id'] = auth()->user()->id;
            $data['data_e_hora']            = Carbon::createFromFormat('d/m/Y H:i', $data['data_e_hora']);
            $data['numero_consulta']        = Str::random(10);
            // TODO - secured race condition to not happening multi records to data and hours
            Consulta::create($data);

            return to_route('consultas.index', $paciente->id)->with('success', 'Consulta cadastrada com sucesso!');
        } catch (Exception $error) {
            Log::info($error->getMessage());

            return to_route('consultas.index', $paciente->id)->with('error', 'Algo de errado aconteceu, entre em contato com o suporte.');
        }
    }
}
