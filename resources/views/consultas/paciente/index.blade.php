<x-app-layout>
    <div class="widget-content widget-content-area mt-2">
        <div id="style-3_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
            <div class="dt--top-section">
                <div class="row items-center">
                    <div class="col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center">
                        <div class="dataTables_length" id="style-3_length">
                            <select name="style-3_length" aria-controls="style-3" class="form-control">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="50">50</option>
                            </select>
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
                            ID Consulta
                        </th>
                        <th class="text-center sorting" tabindex="0" aria-controls="style-3" rowspan="1" colspan="1"
                            aria-label="Paciente: activate to sort column ascending" style="width: 150px;">Médico
                        </th>
                        <th class="text-center sorting" tabindex="0" aria-controls="style-3" rowspan="1" colspan="1"
                            aria-label="Paciente: activate to sort column ascending" style="width: 150px;">Motivo
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
                            <td>{{ $consulta->paciente->primeiro_nome . ' ' . $consulta->medico->nome_completo }}</td>
                            <td>{{ $consulta->motivo_consulta }}</td>
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
                                    \App\Enum\Consulta\ConsultaStatusEnum::ANDAMENTO => 'success',
                                    \App\Enum\Consulta\ConsultaStatusEnum::REALIZADA => 'primary',
                                    \App\Enum\Consulta\ConsultaStatusEnum::AGENDADA => 'secondary',
                                    \App\Enum\Consulta\ConsultaStatusEnum::CANCELADA => 'danger',
                                    \App\Enum\Consulta\ConsultaStatusEnum::REMARCADA => 'warning',
                                } }}">
                                    {{ strtoupper($consulta->status_consulta->value) }}
                                </span>
                            </td>
                            <td class="text-center">
                                <ul class="table-controls">
                                    <li>
                                        <a href="{{ route('minhas.consulta.show', ['consulta' => $consulta->id] ) }}" class="bs-tooltip"
                                           data-toggle="tooltip"
                                           data-placement="top" title="Visualizar">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                 stroke-linecap="round" stroke-linejoin="round"
                                                 class="feather feather-eye">
                                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                <circle cx="12" cy="12" r="3"></circle>
                                            </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="bs-tooltip" data-toggle="tooltip"
                                           data-placement="top" title="Cancelar">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                 stroke-linecap="round" stroke-linejoin="round"
                                                 class="feather feather-x-octagon">
                                                <polygon
                                                    points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon>
                                                <line x1="15" y1="9" x2="9" y2="15"></line>
                                                <line x1="9" y1="9" x2="15" y2="15"></line>
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
