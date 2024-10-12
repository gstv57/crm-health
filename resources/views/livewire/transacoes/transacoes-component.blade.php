<div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
    <div class="widget-content widget-content-area br-6 mt-2">
        <div id="zero-config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
            <div class="table-responsive">
                <table id="zero-config" class="table dt-table-hover dataTable" style="width:100%" role="grid" aria-describedby="zero-config_info">
                    <thead>
                    <tr role="row">
                        <th class="sorting" tabindex="0" aria-controls="zero-config" rowspan="1" colspan="1"
                            aria-label="Name: activate to sort column ascending" style="width: 255.91px;">Consulta ID
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="zero-config" rowspan="1" colspan="1"
                            aria-label="Start date: activate to sort column ascending" style="width: 202.333px;">
                            Transação ID
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="zero-config" rowspan="1" colspan="1"
                            aria-label="Position: activate to sort column ascending" style="width: 389.677px;">
                            Forma de Pagamento
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="zero-config" rowspan="1" colspan="1"
                            aria-label="Office: activate to sort column ascending" style="width: 195.788px;">Status
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="zero-config" rowspan="1" colspan="1"
                            aria-label="Age: activate to sort column ascending" style="width: 111.205px;">Valor
                        </th>
                        <th class="sorting_desc" tabindex="0" aria-controls="zero-config" rowspan="1" colspan="1"
                            aria-label="Salary: activate to sort column ascending" aria-sort="descending"
                            style="width: 172.385px;">Data
                        </th>
                        <th class="no-content sorting" tabindex="0" aria-controls="zero-config" rowspan="1"
                            colspan="1" aria-label="Actions: activate to sort column ascending"
                            style="width: 164.174px;">Ação
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse($transacoes as $transacao)
                            <tr role="row">
                                <td class="">{{ $transacao->consulta_id ?? 'N/A' }}</td>
                                <td class="">{{ $transacao->id_transacao ?? 'N/A' }}</td>
                                <td>{{ $transacao->forma_pagamento }}</td>
                                <td>{{ $transacao->status_pagamento }}</td>
                                <td class="">{{ number_format($transacao->valor, 2) }}</td>
                                <td>{{ $transacao->created_at->format('d/m/Y H:i:s') }}</td>
                                <td>
                                    <a href="{{ route('consultas.edit', ['paciente' => $transacao->consulta->paciente->id, 'consulta' => $transacao->consulta->id]) }}" target="_blank">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                             stroke-linejoin="round" class="feather feather-x-circle table-cancel">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <line x1="15" y1="9" x2="9" y2="15"></line>
                                            <line x1="9" y1="9" x2="15" y2="15"></line>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @empty

                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="dt--bottom-section d-sm-flex justify-content-sm-between text-center">
                {{-- paginacao--}}
            </div>
        </div>
    </div>
</div>
