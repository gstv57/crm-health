<?php

namespace App\Livewire\Consulta\Medico;

use App\Models\Consulta;
use Livewire\Component;

class ConsultaShowComponent extends Component
{
    public Consulta $consulta;

    public function render()
    {
        return view('livewire.consulta.medico.consulta-show-component', [
            'consulta' => $this->consulta
        ]);
    }
    public function mount(Consulta $consulta)
    {
        $this->consulta = $consulta;
    }
}
