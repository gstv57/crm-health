<x-app-layout>
    <div class="widget-content widget-content-area mt-2">
        <div id="style-3_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
            <div class="dt--top-section">
                <div class="row">
                    <div class="col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center">
                        <div class="dataTables_length" id="style-3_length">
                            <label>Results :
                                <select name="style-3_length" aria-controls="style-3" class="form-control">
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="50">50</option>
                                </select>
                            </label>
                            <a href="{{ route('medico.create') }}" class="btn btn-success btn-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-user-plus">
                                    <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="8.5" cy="7" r="4"></circle>
                                    <line x1="20" y1="8" x2="20" y2="14"></line>
                                    <line x1="23" y1="11" x2="17" y2="11"></line>
                                </svg>
                                Criar
                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3">
                        <div id="style-3_filter" class="dataTables_filter">
                            <label>
                                <input type="search" class="form-control"
                                       placeholder="Pesquisar por cpf, nome, matricula..." aria-controls="style-3"
                                       title="Pesquisar por crm, nome, cpf...">
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table id="style-3" class="table style-3 table-hover dataTable no-footer" role="grid"
                       aria-describedby="style-3_info">
                    <thead>
                    <tr role="row">
                        <th class="checkbox-column text-center sorting_asc" tabindex="0" aria-controls="style-3"
                            rowspan="1" colspan="1" aria-sort="ascending"
                            aria-label=" Record Id : activate to sort column descending" style="width: 148.281px;">
                            CRM
                        </th>
                        <th class="text-center sorting" tabindex="0" aria-controls="style-3" rowspan="1" colspan="1"
                            aria-label="Image: activate to sort column ascending" style="width: 106.797px;">Foto
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="style-3" rowspan="1" colspan="1"
                            aria-label="First Name: activate to sort column ascending" style="width: 165.719px;">Nome
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="style-3" rowspan="1" colspan="1"
                            aria-label="Last Name: activate to sort column ascending" style="width: 161.641px;">
                            Sobrenome
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="style-3" rowspan="1" colspan="1"
                            aria-label="Especialidade: activate to sort column ascending" style="width: 225.578px;">
                            Especialidade
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="style-3" rowspan="1" colspan="1"
                            aria-label="Email: activate to sort column ascending" style="width: 225.578px;">Email
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="style-3" rowspan="1" colspan="1"
                            aria-label="Mobile No.: activate to sort column ascending" style="width: 166.109px;">
                            Telefone
                        </th>
                        <th class="text-center sorting" tabindex="0" aria-controls="style-3" rowspan="1" colspan="1"
                            aria-label="Status: activate to sort column ascending" style="width: 139.859px;">Status
                        </th>
                        <th class="text-center dt-no-sorting sorting" tabindex="0" aria-controls="style-3" rowspan="1"
                            colspan="1" aria-label="Action: activate to sort column ascending"
                            style="width: 117.016px;">Ação
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($medicos as $medico)
                        <tr role="row">
                            <td class="checkbox-column text-center sorting_1">{{ $medico->crm }}</td>
                            <td class="text-center">
                                <span><img src="assets/img/90x90.jpg" class="profile-img" alt="avatar"></span>
                            </td>
                            <td>{{ explode(' ', $medico->nome_completo)[0] }}</td>
                            <td>{{ $medico->nome_completo ? explode(' ', $medico->nome_completo)[count(explode(' ', $medico->nome_completo)) - 1] : '' }}</td>
                            <td>
                                @forelse($medico->especialidades as $especialidade)
                                    <span class="shadow-none badge badge-success">
                                        {{$especialidade->nome}}
                                    </span>
                                @empty
                                    <span class="shadow-none badge badge-danger">
                                        SEM DADOS
                                    </span>
                                @endforelse
                            </td>
                            <td>{{ $medico->user->email }}</td>
                            <td>{{ $medico->telefone }}</td>
                            <td class="text-center">
                               <span class="shadow-none badge badge-{{ $medico->ativo ? 'success' : 'danger' }}">
                                   {{ $medico->ativo ? 'ATIVO' : 'NÃO ATIVO' }}
                               </span>
                            </td>
                            <td class="text-center">
                                <ul class="table-controls">
                                    <li>
                                        <a href="{{ route('medico.edit', $medico->id) }}" class="bs-tooltip" data-toggle="tooltip"
                                           data-placement="top" title="" data-original-title="Edit">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                 stroke-linecap="round" stroke-linejoin="round"
                                                 class="feather feather-edit-2 p-1 br-6 mb-1">
                                                <path
                                                    d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                            </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="bs-tooltip" data-toggle="tooltip"
                                           data-placement="top" title="" data-original-title="Delete">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                 stroke-linecap="round" stroke-linejoin="round"
                                                 class="feather feather-trash p-1 br-6 mb-1">
                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                <path
                                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                            </svg>
                                        </a>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                    @empty
                    @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>
