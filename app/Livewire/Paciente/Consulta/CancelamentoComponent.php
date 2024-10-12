<?php

namespace App\Livewire\Paciente\Consulta;

use App\Enum\Consulta\ConsultaStatusEnum;
use App\Models\{Consulta, Paciente};
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Gate;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class CancelamentoComponent extends Component
{
    use LivewireAlert;

    public Paciente $paciente;

    public Consulta $consulta;

    public string $motivo_cancelamento = '';

    public function rules(): array
    {
        return [
            'motivo_cancelamento' => 'required|string|max:200',
        ];
    }

    public function messages(): array
    {
        return [
            'motivo_cancelamento.required' => 'O :attribute é necessário para efetuar o cancelamento da consulta.',
        ];
    }

    public function render(): View
    {
        return view('livewire.paciente.consulta.cancelamento');
    }

    public function mount(Paciente $paciente, Consulta $consulta): void
    {
        if (Gate::any(['admin', 'medico', 'recepcionista'])) {
            if ($consulta->status_consulta === ConsultaStatusEnum::CANCELADA) {
                $this->flash('warning', 'A consulta já se encontra cancelada!', [], route('consultas.edit', ['consulta' => $this->consulta->id, 'paciente' => $this->paciente->id]));

                return;
            }
            $this->paciente = $paciente;
            $this->consulta = $consulta;
        }
    }
    public function handle(): void
    {
        $this->validate();

        $this->consulta->status_consulta     = ConsultaStatusEnum::CANCELADA;
        $this->consulta->cancelada_por       = auth()->user()->id;
        $this->consulta->cancelada_em        = Carbon::now();
        $this->consulta->motivo_cancelamento = $this->motivo_cancelamento;
        $this->consulta->save();
        $this->flash('success', 'A consulta foi cancelada com sucesso!', [], route('consultas.edit', ['consulta' => $this->consulta->id, 'paciente' => $this->paciente->id]));
    }
}
