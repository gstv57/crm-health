<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
    <div class="widget widget-table-one">
        <div class="widget-heading">
            <h5 class="">Transações</h5>
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

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="pendingTask"
                         style="will-change: transform;">
                        <a class="dropdown-item" href="javascript:void(0);">View Report</a>
                        <a class="dropdown-item" href="javascript:void(0);">Edit Report</a>
                        <a class="dropdown-item" href="javascript:void(0);">Mark as Done</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="widget-content">
            @forelse($pagamentos as $pagamento)
                <div class="transactions-list">
                    <div class="t-item">
                        <div class="t-company-name">
                            <div class="t-icon">
                                <div class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round" class="feather feather-user">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                </div>
                            </div>
                            <div class="t-name">
                                <h4><a href="{{ route('paciente.edit',['paciente' => $pagamento->consulta->paciente->id ] ) }}">{{ $pagamento->consulta->paciente->primeiro_nome }}</a></h4>
                                <p class="meta-date">{{ $pagamento->updated_at->format('d/m/Y H:i') }}</p>
                            </div>

                        </div>
                        <div class="t-rate rate-dec">
                            <p><span class="text-success">+ {{ number_format($pagamento->valor, 2) }}</span></p>
                        </div>
                    </div>
                </div>
            @empty

            @endforelse
        </div>
    </div>
</div>
