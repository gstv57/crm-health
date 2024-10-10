<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\{InteractsWithSockets, PrivateChannel};
use Illuminate\Contracts\Events\ShouldDispatchAfterCommit;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class LogActivityEvent implements ShouldDispatchAfterCommit
{
    use Dispatchable;
    use InteractsWithSockets;
    use SerializesModels;

    public function __construct(public User $user, public string $descricao)
    {
    }
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('atividade-nova'),
        ];
    }
}
