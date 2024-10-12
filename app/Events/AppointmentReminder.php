<?php

namespace App\Events;

use App\Models\{Consulta};
use Illuminate\Broadcasting\{InteractsWithSockets, PrivateChannel};
use Illuminate\Contracts\Events\ShouldDispatchAfterCommit;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AppointmentReminder implements ShouldDispatchAfterCommit
{
    use Dispatchable;
    use InteractsWithSockets;
    use SerializesModels;

    public function __construct(public Consulta $consulta)
    {
        //
    }

    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('appointment-reminder'),
        ];
    }
}
