<?php

namespace App\Livewire\Dashboard;

use App\Models\Atividade;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class AtividadesRecentesComponent extends Component
{
    public $atividades_recentes;

    public function render(): View
    {
        return view('livewire.dashboard.atividades-recentes-component');
    }

    public function mount(): void
    {
        $this->atividades_recentes = Atividade::with('user')->orderBy('created_at', 'desc')->take(10)->get();
    }
}
