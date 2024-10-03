<?php

namespace App\Http\Controllers\Paciente\Prontuario;

use App\Http\Controllers\Controller;
use App\Models\Paciente;
use Illuminate\Http\Request;

class ProntuarioCreateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Paciente $paciente, Request $request)
    {
        return view('pacientes.prontuario.create', [
            'paciente' => $paciente,
        ]);
    }
}
