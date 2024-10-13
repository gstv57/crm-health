<?php

namespace App\Livewire\Consulta\Components;

use App\Enum\Consulta\ConsultaStatusEnum;
use App\Models\Consulta;
use Illuminate\Contracts\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;

class ConsultaEmAndamento extends Component
{
    use LivewireAlert;

    public function render(): View
    {
        return view('livewire.consulta.consulta-em-andamento-component', [
            'consultas_em_andamento' => Consulta::with('medico', 'paciente')
                ->where('status_consulta', ConsultaStatusEnum::ANDAMENTO)->limit(10)->get(),
        ]);
    }
    #[On('echo:admin-updates,AppointmentFinished')]
    #[On('echo:admin-updates,AppointmentInProgress')]
    public function handleNewAppointmentInProgress(): void
    {
        $this->dispatch('$refresh')->self();
    }
}
