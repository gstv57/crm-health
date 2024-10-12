<?php

namespace App\Http\Controllers\Paciente\Consulta;

use App\Http\Controllers\Controller;
use App\Models\{Consulta, Medico, Paciente};
use Illuminate\Http\Request;

class ConsultaEditController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Paciente $paciente, Consulta $consulta)
    {
        return view('pacientes.consultas.edit', [
            'paciente' => $paciente,
            'consulta' => $consulta->load('pagamentos', 'medico'),
            'medicos'  => Medico::with('especialidades')->get(),
        ]);
    }
}
