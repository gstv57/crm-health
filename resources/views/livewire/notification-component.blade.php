<li class="nav-item dropdown notification-dropdown">
        <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="notificationDropdown"
           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                 class="feather feather-bell">
                <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
            </svg>
            <span class="badge badge-success"></span>
        </a>
    <div class="dropdown-menu position-absolute" aria-labelledby="notificationDropdown">
        <div class="notification-scroll">
{{--            <div class="dropdown-item">--}}
{{--                <div class="media server-log">--}}
{{--                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"--}}
{{--                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"--}}
{{--                         stroke-linejoin="round" class="feather feather-server">--}}
{{--                        <rect x="2" y="2" width="20" height="8" rx="2" ry="2"></rect>--}}
{{--                        <rect x="2" y="14" width="20" height="8" rx="2" ry="2"></rect>--}}
{{--                        <line x1="6" y1="6" x2="6" y2="6"></line>--}}
{{--                        <line x1="6" y1="18" x2="6" y2="18"></line>--}}
{{--                    </svg>--}}
{{--                    <div class="media-body">--}}
{{--                        <div class="data-info">--}}
{{--                            <h6 class="">Server Rebooted</h6>--}}
{{--                            <p class="">45 min ago</p>--}}
{{--                        </div>--}}

{{--                        <div class="icon-status">--}}
{{--                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"--}}
{{--                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"--}}
{{--                                 stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">--}}
{{--                                <line x1="18" y1="6" x2="6" y2="18"></line>--}}
{{--                                <line x1="6" y1="6" x2="18" y2="18"></line>--}}
{{--                            </svg>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="dropdown-item">--}}
{{--                <div class="media ">--}}
{{--                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"--}}
{{--                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"--}}
{{--                         stroke-linejoin="round" class="feather feather-heart">--}}
{{--                        <path--}}
{{--                            d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>--}}
{{--                    </svg>--}}
{{--                    <div class="media-body">--}}
{{--                        <div class="data-info">--}}
{{--                            <h6 class="">Licence Expiring Soon</h6>--}}
{{--                            <p class="">8 hrs ago</p>--}}
{{--                        </div>--}}

{{--                        <div class="icon-status">--}}
{{--                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"--}}
{{--                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"--}}
{{--                                 stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">--}}
{{--                                <line x1="18" y1="6" x2="6" y2="18"></line>--}}
{{--                                <line x1="6" y1="6" x2="18" y2="18"></line>--}}
{{--                            </svg>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

            @forelse($notifications->where('lida', false) as $notification)
                <div class="dropdown-item">
                    <div class="media file-upload">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                             stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-check">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        <div class="media-body">
                            <div class="data-info">
                                <h6 class="">{{ $notification->mensagem }}</h6>
                                <p class="">{{ $notification->created_at->DiffForHumans() }}</p>
                            </div>

                        </div>
                    </div>
                </div>
            @empty
                <div class="dropdown-item">
                    <div class="media file-upload">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round" class="feather feather-file-text">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                            <polyline points="14 2 14 8 20 8"></polyline>
                            <line x1="16" y1="13" x2="8" y2="13"></line>
                            <line x1="16" y1="17" x2="8" y2="17"></line>
                            <polyline points="10 9 9 9 8 9"></polyline>
                        </svg>
                        <div class="media-body">
                            <div class="data-info">
                                <h6 class="">Sem notificações disponíveis</h6>
                            </div>

                            <div class="icon-status">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.143 17.082a24.248 24.248 0 0 0 3.844.148m-3.844-.148a23.856 23.856 0 0 1-5.455-1.31 8.964 8.964 0 0 0 2.3-5.542m3.155 6.852a3 3 0 0 0 5.667 1.97m1.965-2.277L21 21m-4.225-4.225a23.81 23.81 0 0 0 3.536-1.003A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6.53 6.53m10.245 10.245L6.53 6.53M3 3l3.53 3.53" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</li>
