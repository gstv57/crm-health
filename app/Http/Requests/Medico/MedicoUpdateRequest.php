<?php

namespace App\Http\Requests\Medico;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;

class MedicoUpdateRequest extends FormRequest
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
            'nome_completo' => 'required|string|max:255',
            'cpf'           => [
                'required',
                'cpf',
                Rule::unique('medicos')->ignore($this->route('medico')),
            ],
            'data_nascimento' => [
                'required',
                'date',
                'before_or_equal:today',
                'after_or_equal:' . Carbon::now()->subYears(120)->format('Y-m-d'),
            ],
            'sexo' => 'required|in:masculino,feminino,outro',
            'crm'  => [
                'required',
                'string',
                'max:10',
                Rule::unique('medicos')->ignore($this->route('medico')),
            ],
            'especialidade'   => 'required|array|min:1',
            'especialidade.*' => 'exists:especialidades,id',
            'telefone'        => 'required|string',
            'email'           => [
                'required',
                'email',
                'max:255',
                Rule::unique('users')->ignore($this->route('medico')),
            ],
            'endereco' => 'required|string|max:255',
            'banco'    => 'required|string|max:255',
            'agencia'  => 'required|string|max:10',
            'conta'    => 'required|string|max:10',
        ];
    }
}
