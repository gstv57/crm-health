<?php

namespace App\Http\Controllers\Paciente;

use App\Http\Controllers\Controller;
use App\Models\Paciente;
use Illuminate\Support\Facades\Gate;

class PacienteEditController extends Controller
{
    public function __invoke(Paciente $paciente)
    {
        if (Gate::any(['admin', 'medico', 'recepcionista'])) {
            return view('pacientes.edit', [
                'paciente' => $paciente->load('user'),
            ]);
        }
        abort(403, 'Você não tem permissão para tal.');
    }
}
