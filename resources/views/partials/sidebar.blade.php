<div class="sidebar-wrapper sidebar-theme">
    @can('admin')
        <nav id="sidebar">
            <div class="shadow-bottom"></div>
            <ul class="list-unstyled menu-categories" id="accordionExample">
                <li class="menu {{ Request::is('dashboard*') ? 'active' : '' }}">
                    <a href="#dashboard" data-active="{{ Request::is('dashboard*') ? 'true' : 'false' }}"
                       data-toggle="collapse" aria-expanded="{{ Request::is('dashboard*') ? 'true' : 'false' }}"
                       class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-home">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg>
                            <span>Dashboard</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled {{ Request::is('dashboard*') ? 'show' : '' }}"
                        id="dashboard" data-parent="#accordionExample">
                        <li class="{{ Request::is('dashboard/vendas') ? 'active' : '' }}">
                            <a href="{{ url('dashboard/vendas') }}"> Vendas </a>
                        </li>
                        <li class="{{ Request::is('dashboard/analise') ? 'active' : '' }}">
                            <a href="{{ route('dashboard.analise') }}"> Análise </a>
                        </li>
                    </ul>
                </li>
                <li class="menu {{ Request::is('usuarios*') ? 'active' : '' }}">
                    <a href="#app" data-toggle="collapse"
                       aria-expanded="{{ Request::is('usuarios*') ? 'true' : 'false' }}" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 class="feather feather-user">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                            <span>Usuários</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled {{ Request::is('usuarios*') ? 'show' : '' }}" id="app"
                        data-parent="#accordionExample">
                        <li class="{{ Request::routeIs('usuario.index') ? 'active' : '' }}">
                            <a href="{{ route('usuario.index') }}"> Listar todos </a>
                        </li>
                        <li class="{{ Request::routeIs('usuario.create') ? 'active' : '' }}">
                            <a href="{{ route('usuario.create') }}"> Criar um novo </a>
                        </li>
                    </ul>
                </li>

                <li class="menu {{ Request::is('pacientes*') ? 'active' : '' }}">
                    <a href="#components" data-toggle="collapse"
                       aria-expanded="{{ Request::is('pacientes*') ? 'true' : 'false' }}" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-users">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                            <span>Pacientes</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled {{ Request::is('pacientes*') ? 'show' : '' }}"
                        id="components" data-parent="#accordionExample">
                        <li class="{{ Request::routeIs('paciente.index') ? 'active' : '' }}">
                            <a href="{{ route('paciente.index') }}"> Listar todos </a>
                        </li>
                        <li class="{{ Request::routeIs('paciente.create') ? 'active' : '' }}">
                            <a href="{{ route('paciente.create') }}"> Criar um novo </a>
                        </li>
                        <li class="{{ Request::routeIs('paciente.buscar.matricula') ? 'active' : '' }}">
                            <a href=""> Busca por matrícula </a>
                        </li>
                        <li class="{{ Request::routeIs('paciente.buscar.complexa') ? 'active' : '' }}">
                            <a href=""> Busca complexa </a>
                        </li>
                    </ul>
                </li>


                <li class="menu {{ Request::is('medicos*') ? 'active' : '' }}">
                    <a href="#medicos" data-toggle="collapse"
                       aria-expanded="{{ Request::is('medicos*') ? 'true' : 'false' }}" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-activity">
                                <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                            </svg>
                            <span>Médicos</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled {{ Request::is('medicos*') ? 'show' : '' }}" id="medicos"
                        data-parent="#accordionExample">
                        <li class="{{ Request::routeIs('medico.index') ? 'active' : '' }}">
                            <a href="{{ route('medico.index') }}"> Listar todos </a>
                        </li>
                        <li class="{{ Request::routeIs('medico.create') ? 'active' : '' }}">
                            <a href="{{ route('medico.create') }}"> Criar um novo </a>
                        </li>
                        <li class="{{ Request::routeIs('paciente.buscar.matricula') ? 'active' : '' }}">
                            <a href=""> Busca por matrícula </a>
                        </li>
                        <li class="{{ Request::routeIs('paciente.buscar.complexa') ? 'active' : '' }}">
                            <a href=""> Busca complexa </a>
                        </li>
                    </ul>
                </li>


                <li class="menu {{ Request::is('roles*') ? 'active' : '' }}">
                    <a href="#elements" data-toggle="collapse"
                       aria-expanded="{{ Request::is('roles*') ? 'true' : 'false' }}" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-zap">
                                <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
                            </svg>
                            <span>Cargos</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled {{ Request::is('roles*') ? 'show' : '' }}" id="elements"
                        data-parent="#accordionExample">
                        <li class="{{ Request::routeIs('role.index') ? 'active' : '' }}">
                            <a href="{{ route('role.index') }}"> Ver todos </a>
                        </li>
                        <li class="{{ Request::is('element_badges') ? 'active' : '' }}">
                            <a href="element_badges.html"> Busca por código </a>
                        </li>
                    </ul>
                </li>


            </ul>
        </nav>
    @endcan
    @can('medico')
        <nav id="sidebar">
            <div class="shadow-bottom"></div>
            <ul class="list-unstyled menu-categories" id="accordionExample">
                <li class="menu {{ Request::is('pacientes*') ? 'active' : '' }}">
                    <a href="#components" data-toggle="collapse"
                       aria-expanded="{{ Request::is('pacientes*') ? 'true' : 'false' }}" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-users">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                            <span>Pacientes</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled {{ Request::is('pacientes*') ? 'show' : '' }}"
                        id="components" data-parent="#accordionExample">
                        <li class="{{ Request::routeIs('paciente.index') ? 'active' : '' }}">
                            <a href="{{ route('paciente.index') }}"> Listar todos </a>
                        </li>
                        <li class="{{ Request::routeIs('paciente.create') ? 'active' : '' }}">
                            <a href="{{ route('paciente.create') }}"> Criar um novo </a>
                        </li>
                        <li class="{{ Request::routeIs('paciente.buscar.matricula') ? 'active' : '' }}">
                            <a href=""> Busca por matrícula </a>
                        </li>
                        <li class="{{ Request::routeIs('paciente.buscar.complexa') ? 'active' : '' }}">
                            <a href=""> Busca complexa </a>
                        </li>
                    </ul>
                </li>

                <li class="menu {{ Request::is('medicos/consulta*') ? 'active' : '' }}">
                    <a href="#consultas-menu" data-toggle="collapse"
                       aria-expanded="{{ Request::is('medicos/consulta*') ? 'true' : 'false' }}"
                       class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-shield">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                            </svg>
                            <span>Consultas</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled {{ Request::is('medicos/consulta*') ? 'show' : '' }}"
                        id="consultas-menu" data-parent="#accordionExample">
                        <li class="{{ Request::routeIs('medicos.consulta.index') ? 'active' : '' }}">
                            <a href="{{ route('medicos.consulta.index') }}"> Listar todas </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>

    @endcan
    @can('recepcionista')
        <nav id="sidebar">
            <div class="shadow-bottom"></div>
            <ul class="list-unstyled menu-categories" id="accordionExample">
                <li class="menu {{ Request::is('pacientes*') ? 'active' : '' }}">
                    <a href="#components" data-toggle="collapse"
                       aria-expanded="{{ Request::is('pacientes*') ? 'true' : 'false' }}" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-users">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                            <span>Pacientes</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled {{ Request::is('pacientes*') ? 'show' : '' }}"
                        id="components" data-parent="#accordionExample">
                        <li class="{{ Request::routeIs('paciente.index') ? 'active' : '' }}">
                            <a href="{{ route('paciente.index') }}"> Listar todos </a>
                        </li>
                        <li class="{{ Request::routeIs('paciente.create') ? 'active' : '' }}">
                            <a href="{{ route('paciente.create') }}"> Criar um novo </a>
                        </li>
                        <li class="{{ Request::routeIs('paciente.buscar.matricula') ? 'active' : '' }}">
                            <a href=""> Busca por matrícula </a>
                        </li>
                        <li class="{{ Request::routeIs('paciente.buscar.complexa') ? 'active' : '' }}">
                            <a href=""> Busca complexa </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    @endcan

    @can('paciente')
        <nav id="sidebar">
            <div class="shadow-bottom"></div>
            <ul class="list-unstyled menu-categories" id="accordionExample">
                <li class="menu {{ Request::is('pacientes*') ? 'active' : '' }}">
                    <a href="#components" data-toggle="collapse"
                       aria-expanded="{{ Request::is('minhas-consultas*') ? 'true' : 'false' }}" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-users">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                            <span>Minhas Consultas</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled {{ Request::is('minhas-consultas*') ? 'show' : '' }}"
                        id="components" data-parent="#accordionExample">
                        <li class="{{ Request::routeIs('minhas.consulta.index') ? 'active' : '' }}">
                            <a href="{{ route('minhas.consulta.index') }}">Todas</a>
                        </li>
                        <li class="{{ Request::routeIs('paciente.create') ? 'active' : '' }}">
                            <a href="{{ route('paciente.create') }}">Agendamento</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    @endcan
</div>
