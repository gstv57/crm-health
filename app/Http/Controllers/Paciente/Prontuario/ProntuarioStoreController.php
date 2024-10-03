<?php

namespace App\Http\Controllers\Paciente\Prontuario;

use App\Http\Controllers\Controller;
use App\Http\Requests\Prontuario\ProntuarioStoreRequest;
use App\Models\{Paciente};
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProntuarioStoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Paciente $paciente, ProntuarioStoreRequest $request)
    {
        $data = $request->validated();

        try {
            $data['criador_id'] = auth()->id();
            $paciente->prontuarios()->create($data);

            return redirect()->back()->with('success', 'Prontuario cadastrado com sucesso!');
        } catch (Exception $error) {
            Log::info($error->getMessage());

            return redirect()->back()->with('error', 'Erro na criação do prontuario, entre em contato com o suporte!');
        }
    }
}
