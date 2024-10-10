<?php

namespace App\Livewire\Consulta\Components;

use App\Enum\Pagamento\PagamentoStatusEnum;
use App\Models\Pagamento;
use Illuminate\Contracts\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;

class TransacoesAtividade extends Component
{
    use LivewireAlert;

    public function render(): View
    {
        return view('livewire.consulta.components.transacoes-atividade', [
            'pagamentos' => Pagamento::with('consulta.paciente')
                ->where('status_pagamento', PagamentoStatusEnum::PAGO)
                ->orderBy('created_at', 'desc')
                ->limit(10)
                ->get(),
        ]);
    }
    #[On('echo:payment-receive,PaymentReceive')]
    public function handlePaymentReceive(): void
    {
        $this->dispatch('$refresh')->self();
        $this->alert('success','Um novo pagamento acaba de ser recebido.');
    }
}
