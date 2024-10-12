<?php

namespace App\Livewire\Transacoes;

use App\Models\Pagamento;
use Illuminate\Contracts\View\View;
use Livewire\{Component};

class TransacoesComponent extends Component
{
    public function render(): View
    {
        return view('livewire.transacoes.transacoes-component', [
            'transacoes' => Pagamento::with('consulta.paciente')->paginate(20),
        ]);
    }
}
