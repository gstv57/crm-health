<?php

namespace App\Http\Requests\Medico;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;

class MedicoStoreRequest extends FormRequest
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
            'nome_completo'   => 'required|string|max:255',
            'cpf'             => 'required|string|size:11|unique:medicos,cpf',
            'data_nascimento' => [
                'required',
                'date',
                'before_or_equal:today',
                'after_or_equal:' . Carbon::now()->subYears(120)->format('Y-m-d'),
            ],
            'sexo'            => 'required|in:masculino,feminino,outro',
            'crm'             => 'required|string|max:10|unique:medicos,crm',
            'especialidade'   => 'required|array|min:1',
            'especialidade.*' => 'exists:especialidades,id',
            'telefone'        => 'required|string|size:11',
            'email'           => [
                'required',
                'email',
                'max:255',
                Rule::unique('users')->ignore($this->query('user')),
            ],
            'cep'         => 'required|string|size:8',
            'bairro'      => 'required|string|max:255',
            'cidade'      => 'required|string|max:255',
            'estado'      => 'required|string|max:2',
            'numero'      => 'required|string|max:10',
            'complemento' => 'required|string|max:255',
            'endereco'    => 'required|string|max:255',
            'banco'       => 'required|string|max:255',
            'agencia'     => 'required|string|max:10',
            'conta'       => 'required|string|max:10',
        ];
    }

}
