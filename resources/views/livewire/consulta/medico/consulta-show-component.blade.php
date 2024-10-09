<div class="container-fluid mt-3">
    <div class="row gx-2">
        <!-- Informações do Paciente -->
        <div class="col-3">
            <livewire:consulta.components.informacoes-paciente :consulta="$consulta"/>

            <livewire:consulta.components.status-consulta :consulta="$consulta" />

        </div>
        <!-- Detalhes da Consulta -->
        <div class="col-9">
            <div class="card mb-4 shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Detalhes da Consulta</h4>
                    <i class="bi bi-clipboard-check fs-4"></i>
                </div>
                <div class="card-body">
                    @if($consulta->tipo_consulta == \App\Enum\Consulta\ConsultaTypeEnum::TELEMEDICINA)
                        <!-- Link para Telemedicina -->
                        <div class="form-group mb-3">
                            <div class="input-group">
                                <input type="text" class="form-control" id="input-copy"
                                       value="http://www.admin-dashboard.com" readonly>
                                <button class="btn btn-primary" data-clipboard-action="copy"
                                        data-clipboard-target="#input-copy">
                                    <i class="bi bi-clipboard"></i> Copiar Link
                                </button>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            @if($consulta->status_consulta == \App\Enum\Consulta\ConsultaStatusEnum::ANDAMENTO)
                <!-- Botão de Exibir/Esconder Prontuário -->
                <button class="btn btn-primary mb-3" wire:click="toggleMostrarProntuario">
                    <i class="bi {{ $mostrar_prontuario ? 'bi-eye-slash' : 'bi-eye' }} me-1"></i>
                    {{ $mostrar_prontuario ? 'Ocultar Prontuário' : 'Criar Novo Prontuário' }}
                </button>
           @endif

            <!-- Lista de Prontuários -->
            @if(!$mostrar_prontuario)
                <div class="row">
                    @foreach($consulta->prontuario as $item)
                        <div class="col-md-3">
                            <div class="card mb-4 shadow-sm">
                                <div class="card-header d-flex justify-content-between">
                                    <span class="badge badge-dark">{{ $item->created_at->format('d/m/Y H:i') }}</span> <span class="badge badge-info">#{{ $item->id }}</span>
                                </div>
                                <div class="card-footer d-flex justify-content-between">
                                    <button class="btn btn-primary">
                                        <i class="bi bi-file-earmark-text"></i> Ver
                                    </button>
                                    <button class="btn btn-danger"
                                            wire:click="handleDestroyProntuario({{ $item->id }})"
                                            wire:confirm.prompt="Você tem certeza que deseja excluír esse prontuario?\n\nDigite EXCLUIR para confirmar|EXCLUIR"
                                    >
                                        <i class="bi bi-trash"></i> Excluir
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            <!-- Formulário de Criação de Prontuário -->
            @if($mostrar_prontuario)
                <livewire:prontuario.prontuario-create-component :consulta="$consulta"></livewire:prontuario.prontuario-create-component>
            @else
                <div style="height: 500px;"></div>
            @endif
        </div>
    </div>
</div>
