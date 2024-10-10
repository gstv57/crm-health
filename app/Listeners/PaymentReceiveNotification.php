<?php

namespace App\Listeners;

use App\Events\PaymentReceive;
use App\Jobs\HandleNotificationConfirmPayment;

class PaymentReceiveNotification
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
    public function handle(PaymentReceive $event): void
    {
        HandleNotificationConfirmPayment::dispatch($event->pagamento);
    }
}
