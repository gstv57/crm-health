<?php

namespace App\Listeners;

use App\Events\AppointmentReminder;
use App\Jobs\HandleAppointmentReminder;

class AppointmentRemindeNotification
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
    public function handle(AppointmentReminder $event): void
    {
        HandleAppointmentReminder::dispatch($event->consulta);
    }
}
