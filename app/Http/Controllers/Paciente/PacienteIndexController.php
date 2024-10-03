<?php

namespace App\Http\Controllers\Paciente;

use App\Http\Controllers\Controller;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PacienteIndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        if (Gate::any(['admin', 'medico', 'recepcionista'])) {
            $pacientes = Paciente::with('user')->paginate();

            return view('pacientes.index', [
                'pacientes' => $pacientes,
            ]);
        }
        abort(403, 'Você não tem permissão para tal.');
    }
}
