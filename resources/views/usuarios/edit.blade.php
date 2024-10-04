<x-app-layout>
    <div class="widget-content widget-content-area br-6 mt-2">
        <div id="default-ordering_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
            <div class="dt--top-section">
                <form action="{{ route('usuario.update', $usuario->id) }}" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="{{ $usuario->email }}">
                        </div>
                        <div class="col-md-6">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-9">
                            <label for="name">Nome completo</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nome completo" value="{{ $usuario->name }}">
                        </div>
                        <div class="col-md-3">
                            <label for="name">Função</label>
                            <select class="form-control basic" name="roles">
                                <option>Selecione uma opção</option>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}" {{ $usuario->roles->first()?->id === $role->id ? 'selected' : '' }}>{{ $role->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success mt-3">Atualizar</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
