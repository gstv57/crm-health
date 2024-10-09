<?php

namespace App\Listeners;

use App\Events\AtividadeNova;
use App\Jobs\AtividadeNovaHandleJob;

class AtividadeNovaNotification
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
    public function handle(AtividadeNova $event): void
    {
        AtividadeNovaHandleJob::dispatch($event->user, $event->descricao);
    }
}
