<x-app-layout>
    <div class="widget-content widget-content-area mt-2">
        <div id="default-ordering_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
            <div class="dt--top-section">
                <form action="{{ route('usuario.store') }}" method="POST">
                    @csrf
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Email" name="email">
                        </div>
                        <div class="col-md-6">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-9">
                            <label for="name">Nome completo</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nome completo">
                        </div>
                        <div class="col-md-3">
                            <label for="name">Função</label>
                            <select class="form-control basic" name="roles">
                                <option selected="selected">Selecione uma opção</option>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success mt-3">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
