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
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3">
                        <div id="default-ordering_filter" class="dataTables_filter">
                            <input type="search" class="form-control" placeholder="Pesquisar..." aria-controls="default-ordering">
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <h3>Permissões</h3>
                <form action="{{ route('role.update', $role->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <ul class="list-group">
                        @foreach($permissoes as $permissao)
                            <li class="list-group-item">
                                <div class="form-check">
                                    <label class="form-check-label" for="permissao_{{ $permissao->id }}">
                                        <input class="form-check-input" type="checkbox" name="permissoes[]" value="{{ $permissao->id }}" id="permissao_{{ $permissao->id }}"
                                            {{ $role->permissoes->contains($permissao->id) ? 'checked' : '' }}>
                                        <span class="text-black">{{ $permissao->descricao }}</span>
                                    </label>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <button type="submit" class="btn btn-primary mt-3">Atualizar Permissões</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
