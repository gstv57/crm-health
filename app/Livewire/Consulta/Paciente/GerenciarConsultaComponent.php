<?php

namespace App\Livewire\Consulta\Paciente;

use App\Models\Consulta;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class GerenciarConsultaComponent extends Component
{
    public Consulta $consulta;

    public function render(): View
    {
        return view('livewire.consulta.paciente.gerenciar-consulta-component');
    }

    public function mount(Consulta $consulta): void
    {
        $this->consulta = $consulta;
    }
}
