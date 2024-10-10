<?php

namespace App\Jobs;

use App\Enum\Consulta\ConsultaStatusEnum;
use App\Models\Consulta;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class HandleConfirmConsulta implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public Consulta $consulta)
    {
        //
    }
    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->consulta->status_consulta = ConsultaStatusEnum::AGENDADA;
        $this->consulta->save();
    }
}
