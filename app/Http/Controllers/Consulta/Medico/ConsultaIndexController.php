<?php

namespace App\Http\Controllers\Consulta\Medico;

use App\Http\Controllers\Controller;
use App\Http\Requests\Consulta\Medico\ConsultaIndexRequest;
use Exception;
use Illuminate\Support\Facades\Log;

class ConsultaIndexController extends Controller
{
    public function __invoke(ConsultaIndexRequest $request)
    {
        try {
            return view('consultas.medico.index', [
                'consultas' => auth()
                    ->user()->medico->consultas
                    ->load('paciente', 'prontuario', 'canceladoPor', 'agendadoPor'),
            ]);
        } catch (Exception $error) {
            Log::info($error->getMessage());

            return redirect()->route('dashboard')->with('error', 'Algo de errado ao abrir minhas consultas. Entre em contato com o suporte.');
        }
    }
}
