<?php

namespace App\Jobs;

use App\Enum\Pagamento\PagamentoTypeEnum;
use App\Models\Consulta;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Validation\ValidationException;

class HandleTypeInvoiceJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public Consulta $consulta)
    {
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        match ($this->consulta->forma_pagamento) {
            PagamentoTypeEnum::PIX => SendInvoicePixJob::dispatch($this->consulta),
            default                => throw ValidationException::withMessages(['forma_pagamento' => 'Esse tipo de pagamento não existe.']),
        };
    }
}
