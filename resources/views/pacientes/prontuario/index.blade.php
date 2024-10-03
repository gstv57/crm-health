<x-app-layout>
    <x-prontuario.partials.navbar-short :paciente="$paciente"></x-prontuario.partials.navbar-short>
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
                            <a href="{{ route('prontuario.create', $paciente->id) }}" class="btn btn-success btn-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>
                                Criar
                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3">
                        <div id="style-3_filter" class="dataTables_filter">
                            <label>
                                <input type="search" class="form-control" placeholder="Pesquisar por cpf, nome, matricula..." aria-controls="style-3" title="Pesquisar por cpf, nome, matricula...">
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table id="style-3" class="table style-3 table-hover dataTable no-footer" role="grid" aria-describedby="style-3_info">
                    <thead>
                    <tr role="row">
                        <th class="checkbox-column text-center sorting_asc" tabindex="0" aria-controls="style-3" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Record Id : activate to sort column descending" style="width: 148.281px;">
                            ID
                        </th>
                        <th class="text-center sorting" tabindex="0" aria-controls="style-3" rowspan="1" colspan="1" aria-label="Image: activate to sort column ascending" style="width: 106.797px;">
                            CRIADO POR
                        </th>
                        <th class="text-center dt-no-sorting sorting" tabindex="0" aria-controls="style-3" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 117.016px;">
                            Ação
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($paciente->prontuarios as $prontuario)
                        <tr role="row">
                            <td class="checkbox-column text-center sorting_1">{{ $prontuario->id }}</td>
                            <td>{{ $prontuario->criador->name ?? 'N/A' }}</td>
                            <td>
                                oi
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">Nenhum prontuário encontrado</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>
