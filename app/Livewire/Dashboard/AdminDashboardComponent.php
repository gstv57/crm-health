<?php

namespace App\Livewire\Dashboard;

use App\Models\Consulta;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class AdminDashboardComponent extends Component
{
    public function render(): View
    {
        return view('livewire.dashboard.admin-dashboard-component');
    }
    public function redirectToConsulta(Consulta $consulta)
    {
        return to_route('consultas.edit', ['paciente' => $consulta->paciente->id, 'consulta' => $consulta->id]);
    }
}
