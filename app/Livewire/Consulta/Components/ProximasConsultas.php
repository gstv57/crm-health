<?php

namespace App\Livewire\Consulta\Components;

use App\Enum\Consulta\ConsultaStatusEnum;
use App\Models\Consulta;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class ProximasConsultas extends Component
{
    use LivewireAlert;

    public function render()
    {
        return view('livewire.consulta.components.proximas-consultas', [
            'proximas_consultas' => Consulta::with('medico', 'paciente')
                ->where('status_consulta', ConsultaStatusEnum::AGENDADA)
                ->whereBetween('data_e_hora', [now()->startOfDay(), now()->endOfDay()])
                ->where('data_e_hora', '>', now())
                ->limit(10)
                ->get(),
        ]);
    }
    //    #[On('echo:admin-updates,AppointmentFinished')]
    //    #[On('echo:admin-updates,AppointmentInProgress')]
    //    public function handleNewAppointmentInProgress(): void
    //    {
    //        $this->dispatch('$refresh')->self();
    //    }

}
