<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">

    <div class="widget widget-activity-four">

        <div class="widget-heading">
            <h5 class="">Atividades Recentes</h5>
        </div>

        <div class="widget-content">

            <div class="mt-container mx-auto ps ps--active-y">
                <div class="timeline-line">
                    @foreach($atividades_recentes as $atividade)
                        <div class="item-timeline timeline-primary">
                            <div class="t-dot" data-original-title="" title="">
                            </div>
                            <div class="t-text">
                                <p><span>{{ $atividade->user->name }}, {{ $atividade->descricao }}</span></p>
{{--                                <span class="badge">Pending</span>--}}
                                <p class="t-time">{{ $atividade->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                    <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                </div>
                <div class="ps__rail-y" style="top: 0px; height: 325px; right: 0px;">
                    <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 185px;"></div>
                </div>
            </div>

            <div class="tm-action-btn">
                <button class="btn"><span>View All</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round" class="feather feather-arrow-right">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                        <polyline points="12 5 19 12 12 19"></polyline>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>
