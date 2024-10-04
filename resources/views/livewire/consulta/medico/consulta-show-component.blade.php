<div class="container-fluid mt-2">
    <div class="row gx-1">
        <!-- Informações do Usuário -->
        <div class="col-3">
            <div class="card mb-4">
                <div class="card-header">
                    <h4>Informações do Paciente</h4>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled">
                        <li><strong>Nome:</strong> João da Silva</li>
                        <li><strong>Data de Nascimento:</strong> 15/08/1985</li>
                        <li><strong>Peso:</strong> 75 kg</li>
                    </ul>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <h4>Prontuario</h4>
                </div>
                <div class="card-body">
                    <div class="form-group mb-3">
                        <label for="prontuario">Descreva..</label>
                        <textarea id="prontuario" wire:model="prontuario" class="form-control" rows="3"></textarea>
                    </div>
                </div>

            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <h4>Status</h4>
                </div>
                <div class="card-body d-flex">
                    <button class="btn btn-sm btn-primary me-2" style="margin-right: 10px;">
                        <svg> ... </svg> Em Progresso
                    </button>
                    <button class="btn btn-sm btn-danger me-2" style="margin-right: 10px;">
                        <svg> ... </svg> Cancelar
                    </button>
                    <button class="btn btn-sm btn-dark">
                        <svg> ... </svg> Finalizar
                    </button>
                </div>
            </div>

        </div>
        <!-- Detalhes da Consulta -->
        <div class="col-9">
            <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: {{ $consultaProgresso ?? 50 }}%;" aria-valuenow="{{ $consultaProgresso ?? 50 }}" aria-valuemin="0" aria-valuemax="100">{{ $consultaProgresso ?? 50}}%</div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <h4>Detalhes da Consulta</h4>
                </div>
                <div class="card-body">
                    <!-- Link para Telemedicina -->
                    <div class="form-group mb-3">
                        <div class="clipboard">
                            <form class="form-horizontal">
                                <input type="text" class="form-control mb-4" id="input-copy" value="http://www.admin-dashboard.com">
                                <a class="mb-1 btn btn-primary" href="javascript:;" data-clipboard-action="copy" data-clipboard-target="#input-copy"><svg> ... </svg> Copiar</a>
                            </form>
                        </div>
                    </div>

                    <!-- Anotações da Consulta -->
                    <div class="form-group mb-3">
                        <label for="anotacoes">Anotações sobre a Consulta</label>
                        <textarea id="anotacoes" wire:model="anotacoes" class="form-control" rows="3"></textarea>
                    </div>

                    <!-- Botão para Criar Prontuário -->
                    <div class="text-end">
                        <button wire:click="criarProntuario" class="btn btn-primary">Criar Nota</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
