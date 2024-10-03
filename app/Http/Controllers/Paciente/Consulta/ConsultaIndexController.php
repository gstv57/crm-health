<?php

namespace App\Http\Controllers\Paciente\Consulta;

use App\Http\Controllers\Controller;
use App\Models\{Consulta, Paciente};
use Illuminate\Http\Request;

class ConsultaIndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Paciente $paciente, Request $request)
    {
        return view('pacientes.consultas.index', [
            'consultas' => Consulta::with('paciente', 'medico', 'prontuario', 'agendadoPor', 'canceladoPor')
                ->where('paciente_id', $paciente->id)
                ->orderBy('created_at', 'desc')
                ->paginate(10),
            'paciente' => $paciente,
        ]);
    }
}
