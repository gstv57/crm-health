<?php

namespace App\Jobs;

use App\Enum\Pagamento\PagamentoTypeEnum;
use App\Models\{Consulta, Pagamento};
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Validation\ValidationException;

class HandleTypeInvoiceJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public Pagamento $pagamento)
    {
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        match ($this->pagamento->forma_pagamento) {
            PagamentoTypeEnum::PIX => SendInvoicePixJob::dispatch(Consulta::find($this->pagamento->consulta->id), Pagamento::find($this->pagamento->id)),
            default                => throw ValidationException::withMessages(['forma_pagamento' => 'Esse tipo de pagamento não existe.']),
        };
    }
}
