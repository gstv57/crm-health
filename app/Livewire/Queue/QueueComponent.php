<?php

namespace App\Livewire\Queue;

use App\Models\Queue;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\{On};
use Livewire\Component;

class QueueComponent extends Component
{
    #[On('echo:fila,AddedToQueue')]
    #[On('echo:fila,LeavingToQueue')] # TO-DO
    public function render(): View
    {
        return view('livewire.queue.queue-component', [
            'queue' => Queue::with('paciente')
                ->select('posicao', 'prioridade')
                ->orderBy('prioridade', 'desc')
                ->orderBy('posicao')
                ->limit(10)
                ->get(),
        ])->layout('layouts.fila');
    }
}
