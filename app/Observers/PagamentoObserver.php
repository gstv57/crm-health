<?php

namespace App\Observers;

use App\Enum\Pagamento\PagamentoStatusEnum;
use App\Events\PaymentReceive;
use App\Jobs\{HandleConfirmConsulta, HandleTypeInvoiceJob};
use App\Models\Pagamento;

class PagamentoObserver
{
    /**
     * Handle the Pagamento "created" event.
     */
    public function created(Pagamento $pagamento): void
    {
        $pagamento->load('consulta');

        if ($pagamento->status_pagamento === PagamentoStatusEnum::PENDENTE) {
            HandleTypeInvoiceJob::dispatch($pagamento);
        }
    }

    /**
     * Handle the Pagamento "updated" event.
     */
    public function updated(Pagamento $pagamento): void
    {
        if ($pagamento->status_pagamento === PagamentoStatusEnum::PAGO) {
            $pagamento->load('consulta');

            HandleConfirmConsulta::dispatch($pagamento->consulta);
            event(new PaymentReceive($pagamento));
        }
    }
    /**
     * Handle the Pagamento "deleted" event.
     */
    public function deleted(Pagamento $pagamento): void
    {
        //
    }

    /**
     * Handle the Pagamento "restored" event.
     */
    public function restored(Pagamento $pagamento): void
    {
        //
    }

}
