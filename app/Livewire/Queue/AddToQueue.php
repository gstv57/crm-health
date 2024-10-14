<?php

namespace App\Livewire\Queue;

use App\Events\AddedToQueue;
use App\Models\{Paciente, Queue};
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Validate;
use Livewire\Component;

class AddToQueue extends Component
{
    #[Validate('unique:queues,paciente_id', message: 'O paciente já está na fila, remova-o e tente novamente.')]
    #[Validate('exists:pacientes,id', message: 'O paciente não existe.')]
    #[Validate('required', message: 'Você deve escolher um paciente.')]
    public $paciente;

    #[Validate('required')]
    public int $prioridade;

    public function render()
    {
        return view('livewire.queue.add-to-queue', [
            'pacientes' => Paciente::with('user')
                ->orderBy('primeiro_nome', 'ASC')
                ->get(),
        ]);
    }

    public function addToQueue()
    {
        $this->validate();

        DB::transaction(function () {
            $maxPosition = Queue::lockForUpdate()->max('posicao');
            $newPosition = $maxPosition ? $maxPosition + 1 : 1;

            Queue::create([
                'paciente_id' => Paciente::find($this->paciente)->id,
                'prioridade'  => $this->prioridade,
                'posicao'     => $newPosition,
            ]);
        });
        $this->reset();
        broadcast(new AddedToQueue());

        return redirect(route('fila.adicionar'));
    }
}
