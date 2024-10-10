<?php

namespace App\Observers;

use App\Enum\Pagamento\PagamentoStatusEnum;
use App\Jobs\HandleTypeInvoiceJob;
use App\Models\Consulta;
use Illuminate\Contracts\Events\ShouldHandleEventsAfterCommit;

class ConsultaObserver implements ShouldHandleEventsAfterCommit
{
    /**
     * Handle the Consulta "created" event.
     */
    public function created(Consulta $consulta): void
    {
        if ($consulta->status_pagamento === PagamentoStatusEnum::PENDENTE) {
            HandleTypeInvoiceJob::dispatch($consulta);
        }
    }

    /**
     * Handle the Consulta "updated" event.
     */
    public function updated(Consulta $consulta): void
    {
        //
    }

    /**
     * Handle the Consulta "deleted" event.
     */
    public function deleted(Consulta $consulta): void
    {
        //
    }

    /**
     * Handle the Consulta "restored" event.
     */
    public function restored(Consulta $consulta): void
    {
        //
    }

    /**
     * Handle the Consulta "force deleted" event.
     */
    public function forceDeleted(Consulta $consulta): void
    {
        //
    }
}
