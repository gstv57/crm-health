<?php

namespace App\Http\Controllers\Paciente;

use App\Http\Controllers\Controller;
use App\Http\Requests\Paciente\PacienteUpdateRequest;
use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteUpdateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Paciente $paciente, PacienteUpdateRequest $request)
    {
        $data = $request->validated();
        $paciente->update($data);

        return redirect()->route('paciente.edit', $paciente)->with('success', 'Paciente atualizado com sucesso!');
    }
}
