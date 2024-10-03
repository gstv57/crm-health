<?php

namespace App\Http\Requests\Prontuario;

use Illuminate\Foundation\Http\FormRequest;

class ProntuarioStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'queixa_principal'         => 'nullable|string|max:255',
            'historia_da_doenca_atual' => 'nullable|string|max:255',
            'antecedentes_pessoais'    => 'nullable|string|max:255',
            'medicamentos'             => 'nullable|string|max:255',
            'alergias'                 => 'nullable|string|max:255',
            'antecedentes_familiares'  => 'nullable|string|max:255',
            'historico_social'         => 'nullable|string|max:255',
            'revisao_dos_sistemas'     => 'nullable|string|max:255',
            'exame_fisico'             => 'nullable|string|max:255',
            'avaliacao'                => 'nullable|string|max:255',
            'plano'                    => 'nullable|string|max:255',
        ];
    }
}
