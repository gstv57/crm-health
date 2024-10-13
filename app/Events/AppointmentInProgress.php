<?php

namespace App\Events;

use App\Models\Consulta;
use Illuminate\Broadcasting\{Channel, InteractsWithSockets};
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AppointmentInProgress implements ShouldBroadcast
{
    use Dispatchable;
    use InteractsWithSockets;
    use SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct(public Consulta $consulta)
    {
        //
    }

    public function broadcastOn(): array
    {
        return [
            new Channel('admin-updates'),
        ];
    }
}
