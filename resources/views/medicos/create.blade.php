<x-app-layout>
    <div class="widget-content widget-content-area br-6 mt-2">
        <div id="default-ordering_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
            <div class="dt--top-section">
                <form action="{{ route('medico.store') }}" method="POST">
                    @csrf
                    <div class="row mb-4">
                        <!-- Nome Completo -->
                        <div class="col-md-6">
                            <label for="nome_completo">Nome Completo</label>
                            <input type="text" class="form-control" id="nome_completo" name="nome_completo"
                                   placeholder="Nome Completo" value="{{ old('nome_completo') }}">
                        </div>

                        <!-- CPF -->
                        <div class="col-md-6">
                            <label for="cpf">CPF</label>
                            <input type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF" value="{{ old('cpf') }}">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <!-- Data de Nascimento -->
                        <div class="col-md-6">
                            <label for="data_nascimento">Data de Nascimento</label>
                            <input type="datetime-local" class="form-control" id="data_nascimento" name="data_nascimento" value="{{ old('data_nascimento') }}" required>
                        </div>

                        <!-- Sexo -->
                        <div class="col-md-6">
                            <label for="sexo">Sexo</label>
                            <select class="form-control" id="sexo" name="sexo" >
                                <option value="">Selecione</option>
                                @foreach(\App\Enum\User\GenderEnum::cases() as $case)
                                    <option value=""{{ $case->value }}>{{ $case->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <!-- CRM -->
                        <div class="col-md-6">
                            <label for="crm">CRM</label>
                            <input type="text" class="form-control" id="crm" name="crm" placeholder="CRM" value="{{ old('crm') }}">
                        </div>
                        <!-- Especialidade -->
                        <div class="col-md-6">
                            <label for="especialidade">Especialidade</label>
                            <select class="form-control" multiple="multiple" id="especialidade_select" name="especialidade[]">
                                @foreach($especialidades as $especialidade)
                                    <option value="{{ $especialidade->id }}"
                                        {{ in_array($especialidade->id, old('especialidade', [])) ? 'selected' : '' }}>
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
                            <input type="tel" class="form-control" id="telefone" name="telefone" placeholder="Telefone" value="{{ old('telefone') }}">
                        </div>

                        <!-- Email -->
                        <div class="col-md-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ old('email') }}">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <!-- CEP -->
                        <div class="col-md-3">
                            <label for="cep">CEP</label>
                            <input type="text" class="form-control" id="cep" name="cep" value="{{ old('cep') }}"
                                   placeholder="CEP" onblur="fetchAddress()">
                        </div>

                        <!-- Bairro -->
                        <div class="col-md-3">
                            <label for="bairro">Bairro</label>
                            <input type="text" class="form-control" id="bairro" name="bairro" value="{{ old('bairro') }}"
                                   placeholder="Bairro">
                        </div>

                        <!-- Cidade -->
                        <div class="col-md-3">
                            <label for="cidade">Cidade</label>
                            <input type="text" class="form-control" id="cidade" name="cidade" value="{{ old('cidade') }}"
                                   placeholder="Cidade">
                        </div>

                        <!-- Estado -->
                        <div class="col-md-3">
                            <label for="estado">Estado</label>
                            <input type="text" class="form-control" id="estado" name="estado" value="{{ old('estado') }}"
                                   placeholder="Estado">
                        </div>


                        <!-- Endereço -->
                        <div class="col-md-6">
                            <label for="endereco">Endereço</label>
                            <input type="text" class="form-control" id="endereco" name="endereco" value="{{ old('endereco') }}"
                                   placeholder="Endereço Completo">
                        </div>

                        <!-- Número -->
                        <div class="col-md-2">
                            <label for="numero">Número</label>
                            <input type="text" class="form-control" id="numero" name="numero" value="{{ old('numero') }}"
                                   placeholder="Número">
                        </div>

                        <div class="col-md-4">
                            <label for="complemento">Complemento</label>
                            <input type="text" class="form-control" id="complemento" name="complemento" value="{{ old('complemento') }}"
                                   placeholder="Complemento">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <!-- Banco -->
                        <div class="col-md-6">
                            <label for="banco">Banco</label>
                            <input type="text" class="form-control" id="banco" name="banco" placeholder="Banco" value="{{ old('banco') }}">
                        </div>

                        <!-- Agência -->
                        <div class="col-md-3">
                            <label for="agencia">Agência</label>
                            <input type="text" class="form-control" id="agencia" name="agencia" placeholder="Agência" value="{{ old('agencia') }}">
                        </div>

                        <!-- Conta -->
                        <div class="col-md-3">
                            <label for="conta">Conta</label>
                            <input type="text" class="form-control" id="conta" name="conta" placeholder="Conta" value="{{ old('conta') }}">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <!-- Botão de submissão -->
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Cadastrar Médico</button>
                        </div>
                    </div>
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
