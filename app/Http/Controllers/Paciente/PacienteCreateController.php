<?php

namespace App\Http\Controllers\Paciente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PacienteCreateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        if (Gate::any(['admin', 'medico', 'recepcionista'])) {
            return view('pacientes.create');
        }
        abort(403, 'Você não tem permissão para tal.');
    }
}
