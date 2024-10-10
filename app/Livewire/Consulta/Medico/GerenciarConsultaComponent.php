<?php

namespace App\Livewire\Consulta\Medico;

use App\Events\LogActivityEvent;
use App\Models\{Consulta, Prontuario, User};
use Illuminate\Contracts\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;

class GerenciarConsultaComponent extends Component
{
    use LivewireAlert;

    public Consulta $consulta;

    public Prontuario $prontuario;

    public bool $mostrar_prontuario = false;

    protected $listeners = ['updated-status-consulta' => '$refresh'];
    public function render(): View
    {
        return view('livewire.consulta.medico.consulta-show-component', [
            'consulta' => $this->consulta->load('prontuario'),
        ]);
    }
    public function mount(Consulta $consulta): void
    {
        $this->consulta           = $consulta->load('prontuario');
        $this->mostrar_prontuario = false;
    }
    public function toggleMostrarProntuario(): void
    {
        $this->mostrar_prontuario = !$this->mostrar_prontuario;
    }
    public function handleDestroyProntuario(Prontuario $prontuario): void
    {
        $prontuario->delete();
        event(new LogActivityEvent(User::find($this->consulta->medico_id), 'excluiu um prontuario.'));
        $this->alert('success', 'Prontuario excluído com sucesso!');
    }
    #[On('prontuario_created')]
    public function handleProntuarioCreated(): void
    {
        $this->dispatch('$refresh');
        $this->mostrar_prontuario = false;
        event(new LogActivityEvent(User::find($this->consulta->medico_id), 'criou um novo prontuario.'));
    }
}
