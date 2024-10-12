<x-app-layout>
    <x-prontuario.partials.navbar-short :paciente="$paciente"></x-prontuario.partials.navbar-short>
    <div class="widget-content widget-content-area mt-2">
        <div id="style-3_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
            <div class="dt--top-section">
                <div class="row items-center">
                    <div class="col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center">
                        <div class="dataTables_length" id="style-3_length">
                            <label>
                                <select name="style-3_length" aria-controls="style-3" class="form-control">
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="50">50</option>
                                </select>
                            </label>
                            <a href="{{ route('consultas.create', $paciente->id) }}" class="btn btn-success btn-lg">
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
                                       title="Pesquisar por cpf, nome, matricula...">
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
                            aria-label="Consulta ID : activate to sort column descending" style="width: 100px;">
                            Consulta ID
                        </th>
                        <th class="text-center sorting" tabindex="0" aria-controls="style-3" rowspan="1" colspan="1"
                            aria-label="Paciente: activate to sort column ascending" style="width: 150px;">Paciente
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="style-3" rowspan="1" colspan="1"
                            aria-label="Medico: activate to sort column ascending" style="width: 150px;">Médico
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="style-3" rowspan="1" colspan="1"
                            aria-label="Data Consulta: activate to sort column ascending" style="width: 120px;">Data e Hora
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="style-3" rowspan="1" colspan="1"
                            aria-label="Tipo Consulta: activate to sort column ascending" style="width: 150px;">Tipo de
                            Consulta
                        </th>
                        <th class="text-center sorting" tabindex="0" aria-controls="style-3" rowspan="1" colspan="1"
                            aria-label="Status: activate to sort column ascending" style="width: 100px;">Status
                        </th>
                        <th class="text-center dt-no-sorting sorting" tabindex="0" aria-controls="style-3" rowspan="1"
                            colspan="1" aria-label="Action: activate to sort column ascending"
                            style="width: 120px;">Ação
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($consultas as $consulta)
                        <tr role="row">
                            <td class="checkbox-column text-center sorting_1">{{ $consulta->id }}</td>
                            <td>{{ $consulta->paciente->primeiro_nome . ' ' . $consulta->paciente->sobrenome }}</td>
                            <td>{{ $consulta->medico->nome_completo }}</td>
                            <td>{{ $consulta->data_e_hora->format('d/m/Y H:i') }}</td>
                            <td>
                                <span class="shadow-none badge badge-{{ match($consulta->tipo_consulta) {
                                    \App\Enum\Consulta\ConsultaTypeEnum::PRESENCIAL => 'success',
                                    \App\Enum\Consulta\ConsultaTypeEnum::TELEMEDICINA => 'primary',
                                } }}">
                                     {{ ucfirst($consulta->tipo_consulta->value) }}
                                </span>
                            </td>
                            <td class="text-center">
                                <span class="shadow-none badge badge-{{ match($consulta->status_consulta) {
                                    \App\Enum\Consulta\ConsultaStatusEnum::AGENDADA => 'success',
                                    \App\Enum\Consulta\ConsultaStatusEnum::REALIZADA => 'primary',
                                    \App\Enum\Consulta\ConsultaStatusEnum::CANCELADA => 'danger',
                                    \App\Enum\Consulta\ConsultaStatusEnum::REMARCADA => 'warning',
                                    \App\Enum\Consulta\ConsultaStatusEnum::PENDENTE => 'dark',
                                } }}">
                                    {{ strtoupper($consulta->status_consulta->value) }}
                                </span>
                            </td>
                            <td class="text-center">
                                <ul class="table-controls">
                                    <li>
                                        <a href="{{ route('consultas.edit', ['paciente' => $paciente->id, 'consulta' => $consulta->id]) }}" class="bs-tooltip"
                                           data-toggle="tooltip"
                                           data-placement="top" title="Editar">
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
                                           data-placement="top" title="Deletar">
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
                        <tr>
                            <td colspan="8" class="text-center">Nenhuma consulta encontrada</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>

            </div>

        </div>
    </div>
</x-app-layout>
