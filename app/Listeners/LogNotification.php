<?php

namespace App\Listeners;

use App\Events\LogActivityEvent;
use App\Jobs\HandleLogJob;

class LogNotification
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
    public function handle(LogActivityEvent $event): void
    {
        HandleLogJob::dispatch($event->user, $event->descricao);
    }
}
