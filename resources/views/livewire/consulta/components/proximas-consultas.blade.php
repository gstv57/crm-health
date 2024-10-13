<style>
    .widget-three .consulta-item {
        transition: all 0.3s ease;
        border-left: 3px solid transparent;
    }
    .widget-three .consulta-item:hover {
        transform: translateX(5px);
        background-color: #f8f9fa;
        border-left: 3px solid #4361ee;
    }
    .widget-three .consulta-item .icon {
        transition: all 0.3s ease;
    }
    .widget-three .consulta-item:hover .icon {
        transform: scale(1.1);
    }
    .widget-three .consulta-item:hover #medico_nome {
        color: #4361ee;
        transition: color 0.3s ease;
    }
</style>

<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
    <div class="widget widget-three">
        <div class="widget-heading">
            <h5 class="">Próximas Consultas</h5>
            <div class="task-action">
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" role="button" id="pendingTask" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round" class="feather feather-more-horizontal">
                            <circle cx="12" cy="12" r="1"></circle>
                            <circle cx="19" cy="12" r="1"></circle>
                            <circle cx="5" cy="12" r="1"></circle>
                        </svg>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="pendingTask">
                        <a class="dropdown-item" href="javascript:void(0);">Ver Relatório</a>
                        <a class="dropdown-item" href="javascript:void(0);">Editar Relatório</a>
                        <a class="dropdown-item" href="javascript:void(0);">Marcar como Concluído</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="widget-content">
            <div class="order-summary" wire:poll.300s>
                @forelse($proximas_consultas as $proxima_consulta)
                    <div class="consulta-item d-flex align-items-center mb-3 p-3 rounded shadow-sm" wire:key="{{ $proxima_consulta->id }}" wire:click="redirectToConsulta({{ $proxima_consulta->id }})">
                        <div class="icon mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus text-primary">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="8.5" cy="7" r="4"></circle>
                                <line x1="20" y1="8" x2="20" y2="14"></line>
                                <line x1="23" y1="11" x2="17" y2="11"></line>
                            </svg>
                        </div>
                        <div class="w-100">
                            <h6 class="mb-1" id="medico_nome">{{ $proxima_consulta->medico->nome_completo }}</h6>
                            <div class="d-flex justify-content-between align-items-center" wire>
                                <p class="mb-0 text-muted">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar mr-1">
                                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                        <line x1="16" y1="2" x2="16" y2="6"></line>
                                        <line x1="8" y1="2" x2="8" y2="6"></line>
                                        <line x1="3" y1="10" x2="21" y2="10"></line>
                                    </svg>
                                    {{ $proxima_consulta->data_e_hora->format('d/m/Y H:i') }}
                                </p>
                                <span class="badge badge-pill badge-primary">
                                    {{ $proxima_consulta->paciente->primeiro_nome }}
                                </span>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-info text-center py-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info mb-2">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="12" y1="16" x2="12" y2="12"></line>
                            <line x1="12" y1="8" x2="12.01" y2="8"></line>
                        </svg>
                        <p class="mb-0 text-black">Sem consultas futuras para hoje até o momento.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
