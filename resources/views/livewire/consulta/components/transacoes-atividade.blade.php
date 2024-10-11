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
                <x-transacoes-icons :pagamento="$pagamento" type="{{ $pagamento->forma_pagamento }}"></x-transacoes-icons>
            @empty

            @endforelse
        </div>
    </div>
</div>
