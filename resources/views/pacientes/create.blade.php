<x-app-layout>
    <div class="widget-content widget-content-area br-6 mt-2">
        <div id="default-ordering_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
            <div class="dt--top-section">
                <form action="{{ route('paciente.store') }}" method="POST">
                    @csrf
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="primeiro_nome">Nome</label>
                            <input type="text" class="form-control" id="primeiro_nome" name="primeiro_nome" placeholder="Primeiro nome">
                        </div>
                        <div class="col-md-6">
                            <label for="sobrenome">Sobrenome</label>
                            <input type="text" class="form-control" id="sobrenome" name="sobrenome" placeholder="Sobrenome">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="data_nascimento">Data de Nascimento</label>
                            <input type="date" class="form-control" id="data_nascimento" name="data_nascimento">
                        </div>
                        <div class="col-md-6">
                            <label for="sexo">Sexo</label>
                            <select class="form-control" id="sexo" name="sexo" >
                                <option value="">Selecione</option>
                                @foreach(\App\Enum\User\GenderEnum::cases() as $case)
                                    <option value="{{ $case->value }}">{{ $case->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="cpf">CPF</label>
                            <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Cpf">
                        </div>
                        <div class="col-md-6">
                            <label for="rg">RG</label>
                            <input type="text" class="form-control" id="rg" name="rg" placeholder="Rg">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-3">
                            <label for="cep">CEP</label>
                            <input type="tel" class="form-control" id="cep" name="cep" placeholder="Cep" onblur="fetchAddress()">
                        </div>
                        <div class="col-md-4">
                            <label for="bairro">Bairro</label>
                            <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Bairro">
                        </div>
                        <div class="col-md-4">
                            <label for="cidade">Cidade</label>
                            <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade">
                        </div>

                        <div class="col-md-1">
                            <label for="estado">Estado</label>
                            <input type="text" class="form-control" id="estado" name="estado" placeholder="Estado">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <label for="endereco">Endereço</label>
                            <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Endereco">
                        </div>
                        <div class="col-md-4">
                            <label for="numero">Número</label>
                            <input type="text" class="form-control" id="numero" name="numero" placeholder="Número">
                        </div>
                        <div class="col-md-4">
                            <label for="complemento">Complemento</label>
                            <input type="text" class="form-control" id="complemento" name="complemento" placeholder="Complemento">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-3">
                            <label for="telefone">Telefone</label>
                            <input type="tel" class="form-control" id="telefone" name="telefone" placeholder="Telefone">
                        </div>
                        <div class="col-md-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Email" name="email" >
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success mt-3">Cadastrar</button>
                </form>
            </div>
        </div>
        <script>
            async function fetchAddress() {
                const cep = document.getElementById('cep').value.replace(/\D/g, '');
                if (cep.length === 8) {
                    try {
                        const response = await fetch(`https://viacep.com.br/ws/${cep}/json/`);

                        const data = await response.json();

                        if (!data.erro) {

                            document.getElementById('endereco').value = data.logradouro;
                            document.getElementById('bairro').value = data.bairro;
                            document.getElementById('cidade').value = data.localidade;
                            document.getElementById('estado').value = data.uf;
                        } else {
                            alert('CEP não encontrado.');
                            clearAddressFields();
                        }
                    } catch (error) {
                        console.error('Erro ao buscar o endereço:', error);
                        alert('Erro ao buscar o endereço. Tente novamente.');
                        clearAddressFields();
                    }
                } else {
                    alert('CEP inválido. O CEP deve ter 8 dígitos.');
                    clearAddressFields();
                }
            }

            function clearAddressFields() {
                document.getElementById('logradouro').value = '';
                document.getElementById('bairro').value = '';
                document.getElementById('cidade').value = '';
                document.getElementById('estado').value = '';
            }
        </script>
    </div>
</x-app-layout>
