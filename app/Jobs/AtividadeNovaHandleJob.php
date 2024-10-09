<?php

namespace App\Jobs;

use App\Models\{Atividade, User};
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class AtividadeNovaHandleJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public User $user, public string $descricao)
    {
        //
    }
    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Atividade::create([
            'user_id'    => $this->user->id,
            'descricao'  => $this->descricao,
            'created_at' => now(),
        ]);
    }
}
