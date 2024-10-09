<div>
    <form wire:submit.prevent="submit" class="form-row">
        <div class="form-group col-md-6">
            <label for="queixa_principal" class="bg-dark">Queixa Principal</label>
            <textarea class="form-control" id="queixa_principal" wire:model="queixa_principal" rows="3"></textarea>
        </div>
        <div class="form-group col-md-6">
            <label for="historia_doenca_atual" class="bg-dark">História da Doença Atual</label>
            <textarea class="form-control" id="historia_doenca_atual" wire:model="historia_doenca_atual"
                      rows="3"></textarea>
        </div>
        <div class="form-group col-md-6">
            <label for="historia_patologica_pregressa" class="bg-dark">História Patológica Pregressa</label>
            <textarea class="form-control" id="historia_patologica_pregressa" wire:model="historia_patologica_pregressa"
                      rows="3"></textarea>
        </div>
        <div class="form-group col-md-6">
            <label for="historia_familiar" class="bg-dark">História Familiar</label>
            <textarea class="form-control" id="historia_familiar" wire:model="historia_familiar" rows="3"></textarea>
        </div>
        <div class="form-group col-md-6">
            <label for="antecedentes_pessoais" class="bg-dark">Antecedentes Pessoais</label>
            <textarea class="form-control" id="antecedentes_pessoais" wire:model="antecedentes_pessoais"
                      rows="3"></textarea>
        </div>
        <div class="form-group col-md-6">
            <label for="medicamentos" class="bg-dark">Medicamentos</label>
            <textarea class="form-control" id="medicamentos" wire:model="medicamentos" rows="2"></textarea>
        </div>

        <div class="form-group col-md-6">
            <label for="alergias" class="bg-dark">Alergias</label>
            <textarea class="form-control" id="alergias" wire:model="alergias" rows="2"></textarea>
        </div>

        <div class="form-group col-md-6">
            <label for="antecedentes_familiares" class="bg-dark">Antecedentes Familiares</label>
            <textarea class="form-control" id="antecedentes_familiares" wire:model="antecedentes_familiares"
                      rows="3"></textarea>
        </div>

        <div class="form-group col-md-6">
            <label for="historico_social" class="bg-dark">Histórico Social</label>
            <textarea class="form-control" id="historico_social" wire:model="historico_social" rows="3"></textarea>
        </div>

        <div class="form-group col-md-6">
            <label for="pressao_arterial" class="bg-dark">Pressão Arterial</label>
            <input type="text" class="form-control" id="pressao_arterial" wire:model="pressao_arterial">
        </div>

        <div class="form-group col-md-6">
            <label for="frequencia_cardiaca" class="bg-dark">Frequência Cardíaca</label>
            <input type="text" class="form-control" id="frequencia_cardiaca" wire:model="frequencia_cardiaca">
        </div>

        <div class="form-group col-md-6">
            <label for="temperatura" class="bg-dark">Temperatura</label>
            <input type="text" class="form-control" id="temperatura" wire:model="temperatura">
        </div>

        <div class="form-group col-md-6">
            <label for="frequencia_respiratoria" class="bg-dark">Frequência Respiratória</label>
            <input type="text" class="form-control" id="frequencia_respiratoria" wire:model="frequencia_respiratoria">
        </div>

        <div class="form-group col-md-6">
            <label for="exame_fisico_geral" class="bg-dark"> Exame Físico Geral</label>
            <textarea class="form-control" id="exame_fisico_geral" wire:model="exame_fisico_geral" rows="3"></textarea>
        </div>

        <div class="form-group col-md-6">
            <label for="exame_sistematico" class="bg-dark">Exame Sistemático</label>
            <textarea class="form-control" id="exame_sistematico" wire:model="exame_sistematico" rows="3"></textarea>
        </div>

        <div class="form-group col-md-6">
            <label for="hipoteses_diagnosticas" class="bg-dark">Hipóteses Diagnósticas</label>
            <textarea class="form-control" id="hipoteses_diagnosticas" wire:model="hipoteses_diagnosticas"
                      rows="3"></textarea>
        </div>

        <div class="form-group col-md-6">
            <label for="exames_solicitados" class="bg-dark">Exames Solicitados</label>
            <textarea class="form-control" id="exames_solicitados" wire:model="exames_solicitados" rows="3"></textarea>
        </div>

        <div class="form-group col-md-6">
            <label for="resultados_exames" class="bg-dark">Resultados de Exames</label>
            <textarea class="form-control" id="resultados_exames" wire:model="resultados_exames" rows="3"></textarea>
        </div>

        <div class="form-group col-md-6">
            <label for="diagnostico_final" class="bg-dark">Diagnóstico Final</label>
            <textarea class="form-control" id="diagnostico_final" wire:model="diagnostico_final" rows="3"></textarea>
        </div>

        <div class="form-group col-md-6">
            <label for="plano_terapeutico" class="bg-dark">Plano Terapêutico</label>
            <textarea class="form-control" id="plano_terapeutico" wire:model="plano_terapeutico" rows="3"></textarea>
        </div>

        <div class="form-group col-md-6">
            <label for="prescricao_medica" class="bg-dark">Prescrição Médica</label>
            <textarea class="form-control" id="prescricao_medica" wire:model="prescricao_medica" rows="3"></textarea>
        </div>

        <div class="form-group col-md-6">
            <label for="revisao_dos_sistemas" class="bg-dark">Revisão dos Sistemas</label>
            <textarea class="form-control" id="revisao_dos_sistemas" wire:model="revisao_dos_sistemas"
                      rows="3"></textarea>
        </div>

        <div class="form-group col-md-6">
            <label for="avaliacao" class="bg-dark">Avaliação</label>
            <textarea class="form-control" id="avaliacao" wire:model="avaliacao" rows="3"></textarea>
        </div>

        <div class="form-group col-md-6">
            <label for="plano" class="bg-dark">Plano</label>
            <textarea class="form-control" id="plano" wire:model="plano" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>
