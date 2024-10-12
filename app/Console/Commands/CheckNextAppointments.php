<?php

namespace App\Console\Commands;

use App\Enum\Consulta\ConsultaStatusEnum;
use App\Events\AppointmentReminder;
use App\Models\Consulta;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class CheckNextAppointments extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check-appointments';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Verify if exists upcoming appointments';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $proximas_consultas = Consulta::with('paciente', 'medico')
            ->where('reminded', false)
            ->where('data_e_hora', '>', Carbon::now())
            ->where('data_e_hora', '<=', Carbon::now()->addMinutes(5))
            ->where('status_consulta', '=', ConsultaStatusEnum::AGENDADA)
            ->get();

        // dispatch event to medico and pacient
        foreach ($proximas_consultas as $consulta) {
            event(new AppointmentReminder($consulta));
            $consulta->update(['reminded' => true]);
            $consulta->save();
        }
    }
}
