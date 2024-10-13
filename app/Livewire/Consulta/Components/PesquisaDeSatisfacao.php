<?php

namespace App\Livewire\Consulta\Components;

use App\Models\Consulta;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\{DB, Log};
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class PesquisaDeSatisfacao extends Component
{
    use LivewireAlert;

    public Consulta $consulta;

    public int $rating = 0;

    public string $comment = '';

    public function render(): View
    {
        return view('livewire.consulta.components.pesquisa-de-satisfacao');
    }

    public function mount(Consulta $consulta): void
    {
        $this->consulta = $consulta;
    }

    public function handle(): void
    {
        try {
            $this->validate();
            DB::beginTransaction();
            $this->consulta->rating  = $this->rating;
            $this->consulta->comment = $this->comment;
            $this->consulta->save();
            DB::commit();
            $this->flash('success', 'Seu feedback foi recebido com sucesso!', [], route('consultas.index', ['paciente' => $this->consulta->paciente->id]));
        } catch (Exception $error) {
            DB::rollBack();
            Log::warning($error->getMessage());
            $this->flash('error', 'Algo de errado ao enviar seu feedback, tente novamente em breve.', [], route('minhas.consulta.show', $this->consulta));
        }
    }

    public function rules(): array
    {
        return [
            'rating'  => 'required|integer|min:1|max:10',
            'comment' => 'nullable|string|max:255',
        ];
    }
}
