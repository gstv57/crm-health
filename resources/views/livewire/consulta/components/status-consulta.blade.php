<div class="card mb-4 shadow-sm">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="card-title mb-0">Consulta</h5>
            <span class="badge rounded-pill
                {{ match($consulta->status_consulta) {
                    \App\Enum\Consulta\ConsultaStatusEnum::AGENDADA => 'bg-info',
                    \App\Enum\Consulta\ConsultaStatusEnum::REALIZADA => 'bg-success',
                    \App\Enum\Consulta\ConsultaStatusEnum::CANCELADA => 'bg-danger',
                    \App\Enum\Consulta\ConsultaStatusEnum::REMARCADA => 'bg-warning text-dark',
                    \App\Enum\Consulta\ConsultaStatusEnum::ANDAMENTO => 'bg-primary',
                    default => 'bg-secondary'
                } }}">
                {{ $consulta->status_consulta }}
             </span>
        </div>
        <ul class="list-unstyled">
            <li class="mb-3 d-flex justify-content-between align-items-center">
                <strong>Início:</strong>
                <span
                    class="badge badge-secondary">{{ $consulta->data_e_hora_inicio ? $consulta->data_e_hora_inicio->format('d/m/Y H:i') : 'Não iniciada' }}</span>
            </li>
            <li class="mb-3 d-flex justify-content-between align-items-center">
                <strong>Fim:</strong>
                <span
                    class="badge badge-secondary">{{ $consulta->data_e_hora_fim ? $consulta->data_e_hora_fim->format('d/m/Y H:i') : 'Não finalizada' }}</span>
            </li>
            <li class="mb-3 d-flex justify-content-between align-items-center">
                <strong>Duração:</strong>
                <span
                    class="badge badge-secondary">{{ $consulta->duracao ? $consulta->duracao . ' minutos' : 'N/A' }}</span>
            </li>
            <li class="d-flex justify-content-between align-items-center">
                <strong>Tipo de Consulta:</strong>
                <span class="badge badge-dark">{{ $consulta->tipo_consulta }}</span>
            </li>
        </ul>
        @can('medico')
            <!-- Botões de Ação -->
            <div class="d-flex flex-wrap gap-2">
                @switch($consulta->status_consulta)
                    @case(\App\Enum\Consulta\ConsultaStatusEnum::AGENDADA)
                        <button wire:click="handleChangeStatusConsulta('começar')" class="btn btn-primary">
                            <i class="bi bi-play-circle me-1"></i> Começar
                        </button>
                        <button wire:click="handleChangeStatusConsulta('cancelar')"
                                wire:confirm.prompt="Você tem certeza que deseja cancelar essa consulta?\n\nDigite CANCELAR para confirmar|CANCELAR"
                                class="btn btn-danger">
                            <i class="bi bi-x-circle me-1"></i> Cancelar
                        </button>
                        <button wire:click="handleChangeStatusConsulta('remarcar')" class="btn btn-warning">
                            <i class="bi bi-calendar-event me-1"></i> Remarcar
                        </button>
                        @break
                    @case(\App\Enum\Consulta\ConsultaStatusEnum::ANDAMENTO)
                        <button wire:click="handleChangeStatusConsulta('finalizar')" class="btn btn-success">
                            <i class="bi bi-check-circle me-1"></i> Finalizar
                        </button>
                        @break
                    @case(\App\Enum\Consulta\ConsultaStatusEnum::REMARCADA)
                        <button wire:click="handleChangeStatusConsulta('começar')" class="btn btn-primary">
                            <i class="bi bi-play-circle me-1"></i> Começar
                        </button>
                        <button wire:click="handleChangeStatusConsulta('cancelar')" class="btn btn-danger">
                            <i class="bi bi-x-circle me-1"></i> Cancelar
                        </button>
                        @break
                @endswitch
            </div>
        @endcan
    </div>
</div>
