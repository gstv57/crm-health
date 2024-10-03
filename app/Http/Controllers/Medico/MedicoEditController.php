<?php

namespace App\Http\Controllers\Medico;

use App\Http\Controllers\Controller;
use App\Models\{Especialidade, Medico};
use Illuminate\Http\Request;

class MedicoEditController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Medico $medico, Request $request)
    {
        // TODO - put input what are pending this route/view
        return view('medicos.edit', [
            'medico'         => $medico->load('user', 'especialidades'),
            'especialidades' => Especialidade::get()->unique('nome'),
        ]);
    }
}
