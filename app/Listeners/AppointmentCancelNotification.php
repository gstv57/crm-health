<?php

namespace App\Listeners;

use App\Events\AppointmentCancel;
use App\Jobs\SendAppointmentCancel;

class AppointmentCancelNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(AppointmentCancel $event): void
    {
        SendAppointmentCancel::dispatch($event->consulta);
    }
}
