<?php

namespace App\Jobs;

use App\Mail\ConsultaFaturaMail;
use App\Models\{Consulta, Pagamento};
use App\Services\Asaas\{CreatePaymentCreditCard};
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class SendInvoiceCreditCardJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public Consulta $consulta, public Pagamento $pagamento)
    {
        $this->consulta->Load('paciente');
    }

    public function handle(): void
    {
        $invoice_order_prep            = new CreatePaymentCreditCard($this->consulta->paciente->customer_id, $this->pagamento->valor);
        $data                          = $invoice_order_prep->handle();
        $this->pagamento->id_transacao = $data['id_transacao'];
        $this->pagamento->save();

        Mail::to($this->consulta->paciente->user->email)->send(new ConsultaFaturaMail($data['url']));
    }
}
