<?php

namespace App\Livewire\Consulta\Components;

use App\Models\Consulta;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class InformacoesPaciente extends Component
{
    public Consulta $consulta;

    public function render(): View
    {
        return view('livewire.consulta.components.informacoes-paciente');
    }

    public function mount(Consulta $consulta): void
    {
        $this->consulta = $consulta;
    }

}
