<?php

namespace App\Http\Requests\Paciente;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Gate;

class PacienteStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Gate::any(['admin', 'medico', 'recepcionista']);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'primeiro_nome'   => 'required|string|max:255',
            'sobrenome'       => 'required|string|max:255',
            'data_nascimento' => [
                'required',
                'date',
                'before_or_equal:today',
                'after_or_equal:' . Carbon::now()->subYears(120)->format('Y-m-d'),
            ],
            'sexo'        => 'required|in:Masculino,Feminino,Outro',
            'cpf'         => 'required|cpf|unique:pacientes,cpf',
            'rg'          => 'nullable|string|max:20|unique:pacientes,rg',
            'endereco'    => 'required|string|max:255',
            'numero'      => 'required|integer|min:1',
            'complemento' => 'nullable|string|max:255',
            'bairro'      => 'required|string|max:255',
            'cidade'      => 'required|string|max:255',
            'estado'      => 'required|string|size:2',
            'cep'         => 'required|string|size:8',
            'telefone'    => 'nullable', // Formato (11) 1234-5678 ou (11) 12345-6789
            'email'       => 'required|email|max:255|unique:users,email',
        ];
    }
}
