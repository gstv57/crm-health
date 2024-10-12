<?php

namespace App\Jobs;

use App\Models\{Notification, User};
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class HandleStoreNotificationJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public string $mensagem, public User $user)
    {
        //
    }
    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Notification::create([
            'mensagem' => $this->mensagem,
            'user_id'  => $this->user->id,
        ]);
    }
}
