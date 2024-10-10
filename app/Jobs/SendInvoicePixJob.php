<?php

namespace App\Jobs;

use App\Mail\ConsultaFaturaMail;
use App\Models\{Consulta, Pagamento};
use App\Services\Asaas\CreatePaymentPix;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class SendInvoicePixJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public Consulta $consulta, public Pagamento $pagamento)
    {
        $this->consulta->load('paciente');
    }
    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $invoice_order_prep = new CreatePaymentPix($this->consulta->paciente->customer_id, $this->pagamento->valor);
        $invoice_url        = $invoice_order_prep->handle();
        Mail::to($this->consulta->paciente->user->email)->send(new ConsultaFaturaMail($invoice_url));
    }
}
