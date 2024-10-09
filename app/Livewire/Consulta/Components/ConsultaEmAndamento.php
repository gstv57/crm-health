<?php

namespace App\Livewire\Consulta\Components;

use App\Enum\Consulta\ConsultaStatusEnum;
use App\Models\Consulta;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class ConsultaEmAndamento extends Component
{
    public $consultas_em_andamento;

    public function render(): View
    {
        return view('livewire.consulta.consulta-em-andamento-component');
    }

    public function mount(): void
    {
        $this->consultas_em_andamento = Consulta::with('medico', 'paciente')
            ->where('status_consulta', ConsultaStatusEnum::ANDAMENTO)->limit(10)->get();
    }
}
