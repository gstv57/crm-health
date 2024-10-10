<x-app-layout>
    <div class="row layout-top-spacing">


        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
            <div class="widget widget-three">
                <div class="widget-heading">
                    <h5 class="">Consultas em Andamento</h5>

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
                    <div class="order-summary">
                        <div class="summary-list">
                            <div class="w-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-shopping-bag">
                                    <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                                    <line x1="3" y1="6" x2="21" y2="6"></line>
                                    <path d="M16 10a4 4 0 0 1-8 0"></path>
                                </svg>
                            </div>
                            <div class="w-summary-details">

                                <div class="w-summary-info">
                                    <h6>Renda</h6>
                                    <p class="summary-count">$92,600</p>
                                </div>

                                <div class="w-summary-stats">
                                    <div class="progress">
                                        <div class="progress-bar bg-gradient-secondary" role="progressbar"
                                             style="width: 90%" aria-valuenow="90" aria-valuemin="0"
                                             aria-valuemax="100"></div>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="summary-list">
                            <div class="w-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-tag">
                                    <path
                                        d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path>
                                    <line x1="7" y1="7" x2="7" y2="7"></line>
                                </svg>
                            </div>
                            <div class="w-summary-details">

                                <div class="w-summary-info">
                                    <h6>Lucros</h6>
                                    <p class="summary-count">$37,515</p>
                                </div>

                                <div class="w-summary-stats">
                                    <div class="progress">
                                        <div class="progress-bar bg-gradient-success" role="progressbar"
                                             style="width: 65%" aria-valuenow="65" aria-valuemin="0"
                                             aria-valuemax="100"></div>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="summary-list">
                            <div class="w-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-credit-card">
                                    <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                    <line x1="1" y1="10" x2="23" y2="10"></line>
                                </svg>
                            </div>
                            <div class="w-summary-details">

                                <div class="w-summary-info">
                                    <h6>Despesas</h6>
                                    <p class="summary-count">$55,085</p>
                                </div>

                                <div class="w-summary-stats">
                                    <div class="progress">
                                        <div class="progress-bar bg-gradient-warning" role="progressbar"
                                             style="width: 80%" aria-valuenow="80" aria-valuemin="0"
                                             aria-valuemax="100"></div>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
            <div class="widget-one widget">
                <div class="widget-content">
                    <div class="w-numeric-value">
                        <div class="w-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-shopping-cart">
                                <circle cx="9" cy="21" r="1"></circle>
                                <circle cx="20" cy="21" r="1"></circle>
                                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                            </svg>
                        </div>
                        <div class="w-content">
                            <span class="w-value">3,192</span>
                            <span class="w-numeric-title">Total Orders</span>
                        </div>
                    </div>
                    <div class="w-chart" style="position: relative;">
                        <div id="total-orders" style="min-height: 290px;">
                            <div id="apexchartsq3mguruo" class="apexcharts-canvas apexchartsq3mguruo light"
                                 style="width: 526px; height: 290px;">
                                <svg id="SvgjsSvg1039" width="526" height="290" xmlns="http://www.w3.org/2000/svg"
                                     version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                                     xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg"
                                     xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                     style="background: transparent;">
                                    <g id="SvgjsG1041" class="apexcharts-inner apexcharts-graphical"
                                       transform="translate(0, 125)">
                                        <defs id="SvgjsDefs1040">
                                            <clipPath id="gridRectMaskq3mguruo">
                                                <rect id="SvgjsRect1045" width="528" height="167" x="-1" y="-1" rx="0"
                                                      ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none"
                                                      stroke-dasharray="0"></rect>
                                            </clipPath>
                                            <clipPath id="gridRectMarkerMaskq3mguruo">
                                                <rect id="SvgjsRect1046" width="528" height="167" x="-1" y="-1" rx="0"
                                                      ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none"
                                                      stroke-dasharray="0"></rect>
                                            </clipPath>
                                            <linearGradient id="SvgjsLinearGradient1052" x1="0" y1="0" x2="0" y2="1">
                                                <stop id="SvgjsStop1053" stop-opacity="0.3"
                                                      stop-color="rgba(26,188,156,0.3)" offset="1"></stop>
                                                <stop id="SvgjsStop1054" stop-opacity="0.05"
                                                      stop-color="rgba(255,255,255,0.05)" offset="1"></stop>
                                                <stop id="SvgjsStop1055" stop-opacity="0.05"
                                                      stop-color="rgba(255,255,255,0.05)" offset="1"></stop>
                                            </linearGradient>
                                        </defs>
                                        <line id="SvgjsLine1044" x1="0" y1="0" x2="0" y2="165" stroke="#b6b6b6"
                                              stroke-dasharray="3" class="apexcharts-xcrosshairs" x="0" y="0" width="1"
                                              height="165" fill="#b1b9c4" filter="none" fill-opacity="0.9"
                                              stroke-width="1"></line>
                                        <g id="SvgjsG1058" class="apexcharts-xaxis" transform="translate(0, 0)">
                                            <g id="SvgjsG1059" class="apexcharts-xaxis-texts-g"
                                               transform="translate(0, -4)"></g>
                                        </g>
                                        <g id="SvgjsG1062" class="apexcharts-grid">
                                            <line id="SvgjsLine1064" x1="0" y1="165" x2="526" y2="165"
                                                  stroke="transparent" stroke-dasharray="0"></line>
                                            <line id="SvgjsLine1063" x1="0" y1="1" x2="0" y2="165" stroke="transparent"
                                                  stroke-dasharray="0"></line>
                                        </g>
                                        <g id="SvgjsG1048" class="apexcharts-area-series apexcharts-plot-series">
                                            <g id="SvgjsG1049" class="apexcharts-series" seriesName="Sales"
                                               data:longestSeries="true" rel="1" data:realIndex="0">
                                                <path id="apexcharts-area-0"
                                                      d="M0 165L0 89.99999999999999C20.455555555555552 89.99999999999999 37.988888888888894 57.85714285714285 58.44444444444444 57.85714285714285C78.89999999999999 57.85714285714285 96.43333333333334 68.57142857142856 116.88888888888889 68.57142857142856C137.34444444444443 68.57142857142856 154.87777777777777 25.714285714285694 175.33333333333331 25.714285714285694C195.78888888888886 25.714285714285694 213.32222222222222 63.21428571428571 233.77777777777777 63.21428571428571C254.23333333333332 63.21428571428571 271.76666666666665 4.285714285714278 292.22222222222223 4.285714285714278C312.67777777777775 4.285714285714278 330.2111111111111 63.21428571428571 350.66666666666663 63.21428571428571C371.1222222222222 63.21428571428571 388.6555555555555 25.714285714285694 409.1111111111111 25.714285714285694C429.56666666666666 25.714285714285694 447.09999999999997 68.57142857142856 467.55555555555554 68.57142857142856C488.0111111111111 68.57142857142856 505.5444444444444 57.85714285714285 526 57.85714285714285C526 57.85714285714285 526 57.85714285714285 526 165M526 57.85714285714285C526 57.85714285714285 526 57.85714285714285 526 57.85714285714285 "
                                                      fill="url(#SvgjsLinearGradient1052)" fill-opacity="1"
                                                      stroke-opacity="1" stroke-linecap="butt" stroke-width="0"
                                                      stroke-dasharray="0" class="apexcharts-area" index="0"
                                                      clip-path="url(#gridRectMaskq3mguruo)"
                                                      pathTo="M 0 165L 0 89.99999999999999C 20.455555555555552 89.99999999999999 37.988888888888894 57.85714285714285 58.44444444444444 57.85714285714285C 78.89999999999999 57.85714285714285 96.43333333333334 68.57142857142856 116.88888888888889 68.57142857142856C 137.34444444444443 68.57142857142856 154.87777777777777 25.714285714285694 175.33333333333331 25.714285714285694C 195.78888888888886 25.714285714285694 213.32222222222222 63.21428571428571 233.77777777777777 63.21428571428571C 254.23333333333332 63.21428571428571 271.76666666666665 4.285714285714278 292.22222222222223 4.285714285714278C 312.67777777777775 4.285714285714278 330.2111111111111 63.21428571428571 350.66666666666663 63.21428571428571C 371.1222222222222 63.21428571428571 388.6555555555555 25.714285714285694 409.1111111111111 25.714285714285694C 429.56666666666666 25.714285714285694 447.09999999999997 68.57142857142856 467.55555555555554 68.57142857142856C 488.0111111111111 68.57142857142856 505.5444444444444 57.85714285714285 526 57.85714285714285C 526 57.85714285714285 526 57.85714285714285 526 165M 526 57.85714285714285z"
                                                      pathFrom="M -1 165L -1 165L 58.44444444444444 165L 116.88888888888889 165L 175.33333333333331 165L 233.77777777777777 165L 292.22222222222223 165L 350.66666666666663 165L 409.1111111111111 165L 467.55555555555554 165L 526 165"></path>
                                                <path id="apexcharts-area-0"
                                                      d="M0 89.99999999999999C20.455555555555552 89.99999999999999 37.988888888888894 57.85714285714285 58.44444444444444 57.85714285714285C78.89999999999999 57.85714285714285 96.43333333333334 68.57142857142856 116.88888888888889 68.57142857142856C137.34444444444443 68.57142857142856 154.87777777777777 25.714285714285694 175.33333333333331 25.714285714285694C195.78888888888886 25.714285714285694 213.32222222222222 63.21428571428571 233.77777777777777 63.21428571428571C254.23333333333332 63.21428571428571 271.76666666666665 4.285714285714278 292.22222222222223 4.285714285714278C312.67777777777775 4.285714285714278 330.2111111111111 63.21428571428571 350.66666666666663 63.21428571428571C371.1222222222222 63.21428571428571 388.6555555555555 25.714285714285694 409.1111111111111 25.714285714285694C429.56666666666666 25.714285714285694 447.09999999999997 68.57142857142856 467.55555555555554 68.57142857142856C488.0111111111111 68.57142857142856 505.5444444444444 57.85714285714285 526 57.85714285714285C526 57.85714285714285 526 57.85714285714285 526 57.85714285714285 "
                                                      fill="none" fill-opacity="1" stroke="#1abc9c" stroke-opacity="1"
                                                      stroke-linecap="butt" stroke-width="2" stroke-dasharray="0"
                                                      class="apexcharts-area" index="0"
                                                      clip-path="url(#gridRectMaskq3mguruo)"
                                                      pathTo="M 0 89.99999999999999C 20.455555555555552 89.99999999999999 37.988888888888894 57.85714285714285 58.44444444444444 57.85714285714285C 78.89999999999999 57.85714285714285 96.43333333333334 68.57142857142856 116.88888888888889 68.57142857142856C 137.34444444444443 68.57142857142856 154.87777777777777 25.714285714285694 175.33333333333331 25.714285714285694C 195.78888888888886 25.714285714285694 213.32222222222222 63.21428571428571 233.77777777777777 63.21428571428571C 254.23333333333332 63.21428571428571 271.76666666666665 4.285714285714278 292.22222222222223 4.285714285714278C 312.67777777777775 4.285714285714278 330.2111111111111 63.21428571428571 350.66666666666663 63.21428571428571C 371.1222222222222 63.21428571428571 388.6555555555555 25.714285714285694 409.1111111111111 25.714285714285694C 429.56666666666666 25.714285714285694 447.09999999999997 68.57142857142856 467.55555555555554 68.57142857142856C 488.0111111111111 68.57142857142856 505.5444444444444 57.85714285714285 526 57.85714285714285"
                                                      pathFrom="M -1 165L -1 165L 58.44444444444444 165L 116.88888888888889 165L 175.33333333333331 165L 233.77777777777777 165L 292.22222222222223 165L 350.66666666666663 165L 409.1111111111111 165L 467.55555555555554 165L 526 165"></path>
                                                <g id="SvgjsG1050" class="apexcharts-series-markers-wrap">
                                                    <g class="apexcharts-series-markers">
                                                        <circle id="SvgjsCircle1070" r="0" cx="0" cy="0"
                                                                class="apexcharts-marker wjncpt7rz no-pointer-events"
                                                                stroke="#ffffff" fill="#1abc9c" fill-opacity="1"
                                                                stroke-width="2" stroke-opacity="0.9"
                                                                default-marker-size="0"></circle>
                                                    </g>
                                                </g>
                                                <g id="SvgjsG1051" class="apexcharts-datalabels"></g>
                                            </g>
                                        </g>
                                        <line id="SvgjsLine1065" x1="0" y1="0" x2="526" y2="0" stroke="#b6b6b6"
                                              stroke-dasharray="0" stroke-width="1"
                                              class="apexcharts-ycrosshairs"></line>
                                        <line id="SvgjsLine1066" x1="0" y1="0" x2="526" y2="0" stroke-dasharray="0"
                                              stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line>
                                        <g id="SvgjsG1067" class="apexcharts-yaxis-annotations"></g>
                                        <g id="SvgjsG1068" class="apexcharts-xaxis-annotations"></g>
                                        <g id="SvgjsG1069" class="apexcharts-point-annotations"></g>
                                    </g>
                                    <rect id="SvgjsRect1043" width="0" height="0" x="0" y="0" rx="0" ry="0"
                                          fill="#fefefe" opacity="1" stroke-width="0" stroke="none"
                                          stroke-dasharray="0"></rect>
                                    <g id="SvgjsG1060" class="apexcharts-yaxis" rel="0" transform="translate(-21, 0)">
                                        <g id="SvgjsG1061" class="apexcharts-yaxis-texts-g"></g>
                                    </g>
                                </svg>
                                <div class="apexcharts-legend"></div>
                                <div class="apexcharts-tooltip dark">
                                    <div class="apexcharts-tooltip-series-group"><span class="apexcharts-tooltip-marker"
                                                                                       style="background-color: rgb(26, 188, 156);"></span>
                                        <div class="apexcharts-tooltip-text"
                                             style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                            <div class="apexcharts-tooltip-y-group"><span
                                                    class="apexcharts-tooltip-text-label"></span><span
                                                    class="apexcharts-tooltip-text-value"></span></div>
                                            <div class="apexcharts-tooltip-z-group"><span
                                                    class="apexcharts-tooltip-text-z-label"></span><span
                                                    class="apexcharts-tooltip-text-z-value"></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="resize-triggers">
                            <div class="expand-trigger">
                                <div style="width: 527px; height: 291px;"></div>
                            </div>
                            <div class="contract-trigger"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">

            <div class="widget widget-activity-four">

                <div class="widget-heading">
                    <h5 class="">Atividades Recentes</h5>
                </div>

                <div class="widget-content">

                    <div class="mt-container mx-auto ps ps--active-y">
                        <div class="timeline-line">

                            <div class="item-timeline timeline-primary">
                                <div class="t-dot" data-original-title="" title="">
                                </div>
                                <div class="t-text">
                                    <p><span>Updated</span> Server Logs</p>
                                    <span class="badge">Pending</span>
                                    <p class="t-time">Just Now</p>
                                </div>
                            </div>

                            <div class="item-timeline timeline-success">
                                <div class="t-dot" data-original-title="" title="">
                                </div>
                                <div class="t-text">
                                    <p>Send Mail to <a href="javascript:void(0);">HR</a> and <a
                                            href="javascript:void(0);">Admin</a></p>
                                    <span class="badge">Completed</span>
                                    <p class="t-time">2 min ago</p>
                                </div>
                            </div>

                            <div class="item-timeline  timeline-danger">
                                <div class="t-dot" data-original-title="" title="">
                                </div>
                                <div class="t-text">
                                    <p>Backup <span>Files EOD</span></p>
                                    <span class="badge">Pending</span>
                                    <p class="t-time">14:00</p>
                                </div>
                            </div>

                            <div class="item-timeline  timeline-dark">
                                <div class="t-dot" data-original-title="" title="">
                                </div>
                                <div class="t-text">
                                    <p>Collect documents from <a href="javascript:void(0);">Sara</a></p>
                                    <span class="badge">Completed</span>
                                    <p class="t-time">16:00</p>
                                </div>
                            </div>

                            <div class="item-timeline  timeline-warning">
                                <div class="t-dot" data-original-title="" title="">
                                </div>
                                <div class="t-text">
                                    <p>Conference call with <a href="javascript:void(0);">Marketing Manager</a>.</p>
                                    <span class="badge">In progress</span>
                                    <p class="t-time">17:00</p>
                                </div>
                            </div>

                            <div class="item-timeline  timeline-secondary">
                                <div class="t-dot" data-original-title="" title="">
                                </div>
                                <div class="t-text">
                                    <p>Rebooted Server</p>
                                    <span class="badge">Completed</span>
                                    <p class="t-time">17:00</p>
                                </div>
                            </div>

                            <div class="item-timeline  timeline-warning">
                                <div class="t-dot" data-original-title="" title="">
                                </div>
                                <div class="t-text">
                                    <p>Send contract details to Freelancer</p>
                                    <span class="badge">Pending</span>
                                    <p class="t-time">18:00</p>
                                </div>
                            </div>

                            <div class="item-timeline  timeline-dark">
                                <div class="t-dot" data-original-title="" title="">
                                </div>
                                <div class="t-text">
                                    <p>Kelly want to increase the time of the project.</p>
                                    <span class="badge">In Progress</span>
                                    <p class="t-time">19:00</p>
                                </div>
                            </div>

                            <div class="item-timeline  timeline-success">
                                <div class="t-dot" data-original-title="" title="">
                                </div>
                                <div class="t-text">
                                    <p>Server down for maintanence</p>
                                    <span class="badge">Completed</span>
                                    <p class="t-time">19:00</p>
                                </div>
                            </div>

                            <div class="item-timeline  timeline-secondary">
                                <div class="t-dot" data-original-title="" title="">
                                </div>
                                <div class="t-text">
                                    <p>Malicious link detected</p>
                                    <span class="badge">Block</span>
                                    <p class="t-time">20:00</p>
                                </div>
                            </div>

                            <div class="item-timeline  timeline-warning">
                                <div class="t-dot" data-original-title="" title="">
                                </div>
                                <div class="t-text">
                                    <p>Rebooted Server</p>
                                    <span class="badge">Completed</span>
                                    <p class="t-time">23:00</p>
                                </div>
                            </div>

                            <div class="item-timeline timeline-primary">
                                <div class="t-dot" data-original-title="" title="">
                                </div>
                                <div class="t-text">
                                    <p><span>Updated</span> Server Logs</p>
                                    <span class="badge">Pending</span>
                                    <p class="t-time">Just Now</p>
                                </div>
                            </div>

                            <div class="item-timeline timeline-success">
                                <div class="t-dot" data-original-title="" title="">
                                </div>
                                <div class="t-text">
                                    <p>Send Mail to <a href="javascript:void(0);">HR</a> and <a
                                            href="javascript:void(0);">Admin</a></p>
                                    <span class="badge">Completed</span>
                                    <p class="t-time">2 min ago</p>
                                </div>
                            </div>

                            <div class="item-timeline  timeline-danger">
                                <div class="t-dot" data-original-title="" title="">
                                </div>
                                <div class="t-text">
                                    <p>Backup <span>Files EOD</span></p>
                                    <span class="badge">Pending</span>
                                    <p class="t-time">14:00</p>
                                </div>
                            </div>

                            <div class="item-timeline  timeline-dark">
                                <div class="t-dot" data-original-title="" title="">
                                </div>
                                <div class="t-text">
                                    <p>Collect documents from <a href="javascript:void(0);">Sara</a></p>
                                    <span class="badge">Completed</span>
                                    <p class="t-time">16:00</p>
                                </div>
                            </div>

                            <div class="item-timeline  timeline-warning">
                                <div class="t-dot" data-original-title="" title="">
                                </div>
                                <div class="t-text">
                                    <p>Conference call with <a href="javascript:void(0);">Marketing Manager</a>.</p>
                                    <span class="badge">In progress</span>
                                    <p class="t-time">17:00</p>
                                </div>
                            </div>

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
                    <div class="transactions-list">
                        <div class="t-item">
                            <div class="t-company-name">
                                <div class="t-icon">
                                    <div class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             class="feather feather-home">
                                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                        </svg>
                                    </div>
                                </div>
                                <div class="t-name">
                                    <h4>Electricity Bill</h4>
                                    <p class="meta-date">04 Jan 1:00PM</p>
                                </div>

                            </div>
                            <div class="t-rate rate-dec">
                                <p><span>-$16.44</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="transactions-list">
                        <div class="t-item">
                            <div class="t-company-name">
                                <div class="t-icon">
                                    <div class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             class="feather feather-home">
                                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                        </svg>
                                    </div>
                                </div>
                                <div class="t-name">
                                    <h4>Electricity Bill</h4>
                                    <p class="meta-date">04 Jan 1:00PM</p>
                                </div>

                            </div>
                            <div class="t-rate rate-dec">
                                <p><span>-$16.44</span></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
