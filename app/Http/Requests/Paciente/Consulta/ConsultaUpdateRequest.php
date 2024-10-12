<?php

namespace App\Http\Requests\Paciente\Consulta;

use App\Enum\Consulta\ConsultaTypeEnum;
use App\Models\Consulta;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;

class ConsultaUpdateRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'medico_id'                => ['required', 'exists:medicos,id'],
            'data_e_hora' => [
                'required',
                'date_format:d/m/Y H:i',
                'after:now',
                function ($attribute, $value, $fail) {
                    $dataEHora = Carbon::createFromFormat('d/m/Y H:i', $value);

                    $conflito = Consulta::where('data_e_hora', $dataEHora)
                        ->where('medico_id', $this->medico_id)
                        ->exists();

                    if ($conflito) {
                        $fail('Já existe uma consulta agendada para este horário para o médico selecionado.');
                    }
                },
            ],
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
            'exames_realizados'        => ['nullable', 'string'],
            'procedimentos_realizados' => ['nullable', 'string'],
        ];
    }
}
