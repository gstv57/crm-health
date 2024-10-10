<?php

namespace App\Http\Requests\Paciente\Consulta;

use App\Enum\Consulta\ConsultaTypeEnum;
use App\Enum\Pagamento\{PagamentoStatusEnum, PagamentoTypeEnum};
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ConsultaStoreRequest extends FormRequest
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
            'medico_id'                => ['required', 'exists:medicos,id'],
            'data_e_hora'              => ['required', 'date_format:d/m/Y H:i'],
            'tipo_consulta'            => ['required', 'string', Rule::in(ConsultaTypeEnum::cases())],
            'motivo_consulta'          => ['required', 'string'],
            'sintomas'                 => ['nullable', 'string'],
            'diagnostico'              => ['nullable', 'string'],
            'prescricao_medica'        => ['nullable', 'string'],
            'exames_solicitados'       => ['nullable', 'string'],
            'observacoes_medicas'      => ['nullable', 'string'],
            'historico_doenca_atual'   => ['nullable', 'string'],
            'historico_familiar'       => ['nullable', 'string'],
            'historico_medico'         => ['nullable', 'string'],
            'forma_pagamento'          => ['required', 'string', Rule::in(PagamentoTypeEnum::cases())],
            'valor'                    => ['nullable', 'numeric', 'min:0'],
            'status_pagamento'         => ['required', 'string', Rule::in(PagamentoStatusEnum::cases())],
            'exames_realizados'        => ['nullable', 'string'],
            'procedimentos_realizados' => ['nullable', 'string'],
        ];
    }
}
