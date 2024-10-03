<?php

namespace App\Http\Controllers\Paciente\Consulta;

use App\Http\Controllers\Controller;
use App\Models\{Medico, Paciente};
use Illuminate\Http\Request;

class ConsultaCreateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Paciente $paciente, Request $request)
    {
        return view('pacientes.consultas.create', [
            'paciente' => $paciente,
            'medicos'  => Medico::with('especialidades')->get(),
        ]);
    }
}
