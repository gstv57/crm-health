<x-app-layout>
    <div class="widget-content widget-content-area br-6 mt-2">
        <div id="default-ordering_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
            <div class="dt--top-section">
                <form action="{{ route('medico.update', ['medico' => $medico->id]) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="row mb-4">
                        <!-- Nome Completo -->
                        <div class="col-md-6">
                            <label for="nome_completo">Nome Completo</label>
                            <input type="text" class="form-control" id="nome_completo" name="nome_completo" placeholder="Nome Completo" value="{{ $medico->nome_completo}}">
                        </div>
                        <!-- CPF -->
                        <div class="col-md-6">
                            <label for="cpf">CPF</label>
                            <input type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF" value="{{ $medico->cpf}}">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <!-- Data de Nascimento -->
                        <div class="col-md-6">
                            <label for="data_nascimento">Data de Nascimento</label>
                            <input class="form-control" id="data_nascimento" name="data_nascimento" value="{{ $medico->data_nascimento}}">
                        </div>

                        <!-- Sexo -->
                        <div class="col-md-6">
                            <label for="sexo">Sexo</label>
                            <select class="form-control" id="sexo" name="sexo">
                                <option value="masculino" {{ $medico->sexo === 'masculino' ? 'selected' : '' }}>Masculino</option>
                                <option value="feminino" {{ $medico->sexo === 'feminino' ? 'selected' : '' }}>Feminino</option>
                                <option value="outro" {{ $medico->sexo === 'outro' ? 'selected' : '' }}>Outro</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <!-- CRM -->
                        <div class="col-md-6">
                            <label for="crm">CRM</label>
                            <input type="text" class="form-control" id="crm" name="crm" placeholder="CRM" value="{{ $medico->crm }}">
                        </div>
                        <!-- Especialidade -->
                        <div class="col-md-6">
                            <label for="especialidade">Especialidade</label>
                            <select class="form-control" multiple="multiple" id="especialidade_select" name="especialidade[]">
                                @foreach($especialidades as $especialidade)
                                    <option value="{{ $especialidade->id }}" {{ $medico->especialidades->contains('id', $especialidade->id) ? 'selected' : '' }}>
                                        {{ $especialidade->nome }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <!-- Telefone -->
                        <div class="col-md-6">
                            <label for="telefone">Telefone</label>
                            <input type="tel" class="form-control" id="telefone" name="telefone" placeholder="Telefone" value="{{ $medico->telefone }}">
                        </div>

                        <!-- Email -->
                        <div class="col-md-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ $medico->user->email }}">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <!-- Endereço -->
                        <div class="col-md-12">
                            <label for="endereco">Endereço</label>
                            <input type="text" class="form-control" id="endereco" name="endereco" value="{{ $medico->endereco }}"
                                   placeholder="Endereço Completo">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <!-- Banco -->
                        <div class="col-md-6">
                            <label for="banco">Banco</label>
                            <input type="text" class="form-control" id="banco" name="banco" placeholder="Banco" value="{{ $medico->banco }}">
                        </div>

                        <!-- Agência -->
                        <div class="col-md-3">
                            <label for="agencia">Agência</label>
                            <input type="text" class="form-control" id="agencia" name="agencia" placeholder="Agência" value="{{ $medico->agencia }}">
                        </div>

                        <!-- Conta -->
                        <div class="col-md-3">
                            <label for="conta">Conta</label>
                            <input type="text" class="form-control" id="conta" name="conta" placeholder="Conta" value="{{ $medico->conta }}">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <!-- Botão de submissão -->
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Atualizar Médico</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
