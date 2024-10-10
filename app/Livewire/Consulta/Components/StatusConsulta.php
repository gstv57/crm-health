<?php

namespace App\Livewire\Consulta\Components;

use App\Enum\Consulta\ConsultaStatusEnum;
use App\Livewire\Consulta\Medico\GerenciarConsultaComponent;
use App\Models\{Consulta};
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\{DB, Log};
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class StatusConsulta extends Component
{
    use LivewireAlert;

    public Consulta $consulta;

    public function render(): View
    {
        return view('livewire.consulta.components.status-consulta');
    }

    public function mount(Consulta $consulta): void
    {
        $this->consulta = $consulta;
    }

    public function handleChangeStatusConsulta(string $status): void
    {
        match ($status) {
            'finalizar' => $this->handleFinishConsulta(),
            'começar'   => $this->handleStartConsulta(),
            'cancelar'  => ConsultaStatusEnum::CANCELADA,
            default     => 'Action invalid',
        };
        $this->dispatch('updated-status-consulta')->to(GerenciarConsultaComponent::class);
    }
    protected function handleStartConsulta(): void
    {
        $consultas_em_andamento = Consulta::where('medico_id', $this->consulta->medico_id)
            ->where('status_consulta', ConsultaStatusEnum::ANDAMENTO)
            ->first();

        if ($consultas_em_andamento) {
            $this->alert('warning', 'Você precisa finalizas todas as consultas em andamento, antes de começar uma nova.');

            return;
        }

        try {
            DB::beginTransaction();
            $this->consulta->status_consulta    = ConsultaStatusEnum::ANDAMENTO;
            $this->consulta->data_e_hora_inicio = now();
            $this->consulta->save();
            DB::commit();
            $this->alert('success', 'A consulta foi iniciada com sucesso!');
        } catch (Exception $error) {
            DB::rollBack();
            Log::info($error->getMessage());
            $this->alert('warning', 'Algo de errado aconteceu, entre em contato com o suporte.');
        }
    }
    protected function handleFinishConsulta(): void
    {
        try {
            DB::beginTransaction();
            $this->consulta->status_consulta = ConsultaStatusEnum::REALIZADA;
            $this->consulta->data_e_hora_fim = now();
            $this->consulta->duracao         = intval($this->consulta->data_e_hora_inicio->diffInMinutes($this->consulta->data_e_hora_fim));
            $this->consulta->save();
            DB::commit();
            $this->alert('success', 'A consulta foi finalizada com sucesso!');
        } catch (Exception $error) {
            DB::rollBack();
            Log::info($error->getMessage());
            $this->alert('warning', 'Algo de errado aconteceu, entre em contato com o suporte.');
        }
    }
}
