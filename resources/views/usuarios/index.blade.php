<x-app-layout>
    <div class="widget-content widget-content-area br-6 mt-2">
        <div id="default-ordering_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
            <div class="dt--top-section">
                <div class="row">
                    <div class="col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center">
                        <div class="dataTables_length" id="default-ordering_length">
                            <label>Resultados
                                <select name="default-ordering_length" aria-controls="default-ordering" class="form-control">
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="50">50</option>
                                </select>
                            </label>
                            <a href="{{ route('usuario.create') }}" class="btn btn-success btn-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>
                                Criar
                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3">
                        <div id="default-ordering_filter" class="dataTables_filter">
                            <input type="search" class="form-control" placeholder="Pesquisar..." aria-controls="default-ordering">
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table id="default-ordering" class="table table-hover dataTable" style="width:100%" role="grid" aria-describedby="default-ordering_info">
                    <thead>
                    <tr role="row">
                        <th class="sorting" tabindex="0" aria-controls="default-ordering" rowspan="1" colspan="1"
                            aria-label="Name: activate to sort column ascending" style="width: 223.109px;">ID
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="default-ordering" rowspan="1" colspan="1"
                            aria-label="Name: activate to sort column ascending" style="width: 223.109px;">Nome
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="default-ordering" rowspan="1" colspan="1"
                            aria-label="Position: activate to sort column ascending" style="width: 342.594px;">Posição
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="default-ordering" rowspan="1" colspan="1"
                            aria-label="Start date: activate to sort column ascending" style="width: 175.141px;">Começou em
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="default-ordering" rowspan="1" colspan="1"
                            aria-label="Salary: activate to sort column ascending" style="width: 129.047px;">Sálario
                        </th>
                        <th class="text-center dt-no-sorting sorting" tabindex="0" aria-controls="default-ordering"
                            rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending"
                            style="width: 146.906px;">Ação
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($usuarios as $usuario)
                        <tr role="row">
                            <td>{{ $usuario->id }}</td>
                            <td>{{ $usuario->name }}</td>
                            <td>
                                @foreach($usuario->roles as $role)
                                    <span class="shadow-none badge badge-{{ $role->getBadgeClass() }}">
                                        {{ $role->nome }}
                                    </span>
                                @endforeach
                            </td>
                            <td>{{ $usuario->created_at->format('d/m/Y H:i') }}</td>
                            <td>$217,500</td>
                            <td class="text-center">
                                <a href="{{ route('usuario.edit', $usuario->id) }}" class="btn btn-primary btn-sm w-25">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-up-right"><line x1="7" y1="17" x2="17" y2="7"></line><polyline points="7 7 17 7 17 17"></polyline></svg>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr role="row">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="sorting_1"></td>
                            <td></td>
                            <td></td>
                            <td class="text-center"></td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            <div class="dt--bottom-section d-sm-flex justify-content-sm-center text-center">
                pagination
            </div>
        </div>
    </div>
</x-app-layout>
