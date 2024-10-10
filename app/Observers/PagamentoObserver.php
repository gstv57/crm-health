<?php

namespace App\Observers;

use App\Enum\Pagamento\PagamentoStatusEnum;
use App\Jobs\HandleTypeInvoiceJob;
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
        //
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

    /**
     * Handle the Pagamento "force deleted" event.
     */
    public function forceDeleted(Pagamento $pagamento): void
    {
        //
    }
}
