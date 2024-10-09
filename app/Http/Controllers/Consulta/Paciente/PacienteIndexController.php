<?php

namespace App\Http\Controllers\Consulta\Paciente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PacienteIndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('consultas.paciente.index', [
            'consultas' => auth()->user()->paciente->consultas,
        ]);
    }
}
