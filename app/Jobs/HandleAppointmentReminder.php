<?php

namespace App\Jobs;

use App\Mail\{AppointmentReminderDoctorMail, AppointmentReminderPacientMail};
use App\Models\Consulta;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Mail;

class HandleAppointmentReminder implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public Consulta $consulta) {}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $paciente = $this->consulta->paciente->user->email;
        $medico   = $this->consulta->medico->user->email;

        Mail::to($medico)->send(new AppointmentReminderDoctorMail($this->consulta));
        Mail::to($paciente)->send(new AppointmentReminderPacientMail($this->consulta));
    }
}
