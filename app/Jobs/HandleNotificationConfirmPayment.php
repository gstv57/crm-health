<?php

namespace App\Jobs;

use App\Mail\PaymentReceiveMail;
use App\Models\{Pagamento};
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class HandleNotificationConfirmPayment implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public Pagamento $pagamento)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        HandleStoreNotificationJob::dispatch('Pagamento recebido com sucesso!', $this->pagamento->consulta->paciente->user);
        Mail::to($this->pagamento->consulta->paciente->user->email)->send(new PaymentReceiveMail($this->pagamento));
    }
}
