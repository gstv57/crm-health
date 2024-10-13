<div class="container-fluid mt-3">
    <div class="row gx-2">
        <!-- Informações do Paciente -->
        <div class="col-3">
            <livewire:consulta.components.informacoes-medico :consulta="$consulta" />

            <livewire:consulta.components.status-consulta :consulta="$consulta"/>
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
                    @if ($consulta->status_consulta == \App\Enum\Consulta\ConsultaStatusEnum::REALIZADA && empty($consulta->rating) && empty($consulta->comment))
                        <livewire:consulta.components.pesquisa-de-satisfacao :consulta="$consulta"/>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
