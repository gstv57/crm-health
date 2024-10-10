<x-app-layout>
    <x-prontuario.partials.navbar-short :paciente="$paciente"></x-prontuario.partials.navbar-short>
    <div class="widget-content widget-content-area br-6 mt-2">
        <div id="default-ordering_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
            <div class="dt--top-section">
                <form action="{{ route('paciente.update', $paciente->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="primeiro_nome">Nome</label>
                            <input type="text" class="form-control" id="primeiro_nome" name="primeiro_nome" value="{{ $paciente->primeiro_nome }}">
                        </div>
                        <div class="col-md-6">
                            <label for="sobrenome">Sobrenome</label>
                            <input type="text" class="form-control" id="sobrenome" name="sobrenome" placeholder="Sobrenome" value="{{ $paciente->sobrenome }}">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="data_nascimento">Data de Nascimento</label>
{{--                            <input type="date" class="form-control" id="" name="data_nascimento" value="{{ $paciente->data_nascimento }}">--}}
                            <input id="data_nascimento"  name="data_nascimento" value="{{ $paciente->data_nascimento }}" class="form-control"  placeholder="Select Date..">
                        </div>
                        <div class="col-md-6">
                            <label for="sexo">Sexo</label>
                            <input type="text" class="form-control" id="sexo" name="sexo" placeholder="Sexo" value="{{ $paciente->sexo }}">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="cpf">CPF</label>
                            <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Cpf" value="{{ $paciente->cpf }}">
                        </div>
                        <div class="col-md-6">
                            <label for="rg">RG</label>
                            <input type="text" class="form-control" id="rg" name="rg" placeholder="Rg" value="{{ $paciente->rg }}">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-4">
                            <label for="endereco">Endereço</label>
                            <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Endereco" value="{{ $paciente->endereco }}">
                        </div>
                        <div class="col-md-4">
                            <label for="numero">Número</label>
                            <input type="text" class="form-control" id="numero" name="numero" placeholder="Número" value="{{ $paciente->numero }}">
                        </div>
                        <div class="col-md-4">
                            <label for="complemento">Complemento</label>
                            <input type="text" class="form-control" id="complemento" name="complemento" placeholder="Complemento" value="{{ $paciente->complemento }}">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-4">
                            <label for="bairro">Bairro</label>
                            <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Bairro" value="{{ $paciente->bairro }}">
                        </div>
                        <div class="col-md-4">
                            <label for="cidade">Cidade</label>
                            <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade" value="{{ $paciente->cidade }}">
                        </div>
                        <div class="col-md-1">
                            <label for="estado">Estado</label>
                            <input type="text" class="form-control" id="estado" name="estado" placeholder="Estado" value="{{ $paciente->estado }}">
                        </div>
                        <div class="col-md-3">
                            <label for="cep">CEP</label>
                            <input type="tel" class="form-control" id="cep" name="cep" placeholder="Cep" value="{{ $paciente->cep }}">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-3">
                            <label for="telefone">Telefone</label>
                            <input type="tel" class="form-control" id="telefone" name="telefone" placeholder="Telefone" value="{{ $paciente->telefone }}">
                        </div>
                        <div class="col-md-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="{{ $paciente->user?->email }}">
                        </div>
                        <div class="col-md-2">
                            <label for="user_id">Usuário</label>
                            <input type="tel" class="form-control" id="user_id" name="user_id" value="{{ $paciente->user?->id }}">
                        </div>
                        <div class="col-md-2">
                            <label for="matricula">Matricula</label>
                            <input type="text" class="form-control" id="matricula" name="matricula" value="{{ $paciente->matricula }}">
                        </div>
                        <div class="col-md-2">
                            <label for="matricula">CUSTOMER_ID</label>
                            <input type="text" class="form-control" id="matricula" name="matricula" value="{{ $paciente->customer_id ?? 'SEM CUSTOMER_ID' }}">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success mt-3">Atualizar</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
