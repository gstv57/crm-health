<?php

namespace App\Jobs;

use App\Mail\AppointmentCancel;
use App\Models\Consulta;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class SendAppointmentCancel implements ShouldQueue
{
    use Queueable;
    /**
     * Create a new job instance.
     */
    public function __construct(public Consulta $consulta)
    {
        $this->consulta->load('paciente', 'medico');
    }
    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // dispatch mail to pacient and doctor
        Mail::to($this->consulta->paciente->user->email)->send(new AppointmentCancel($this->consulta));
        Mail::to($this->consulta->medico->user->email)->send(new AppointmentCancel($this->consulta));
    }
}
