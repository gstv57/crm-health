<x-app-layout>
    <x-prontuario.partials.navbar-short :paciente="$paciente"></x-prontuario.partials.navbar-short>
    <div class="widget-content widget-content-area br-6 mt-2">
        <div id="default-ordering_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
            <div class="dt--top-section">
                <form action="{{ route('prontuario.store', $paciente->id) }}" method="POST">
                    @csrf
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="paciente_id">Paciente</label>
                            <input type="text" class="form-control" id="paciente_id" value="{{ $paciente->primeiro_nome . ' ' . $paciente->sobrenome }}">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label for="queixa_principal">Queixa Principal</label>
                            <textarea class="form-control" id="queixa_principal" name="queixa_principal" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label for="historia_da_doenca_atual">História da Doença Atual</label>
                            <textarea class="form-control" id="historia_da_doenca_atual" name="historia_da_doenca_atual" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="antecedentes_pessoais">Antecedentes Pessoais</label>
                            <textarea class="form-control" id="antecedentes_pessoais" name="antecedentes_pessoais" rows="3"></textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="medicamentos">Medicamentos</label>
                            <textarea class="form-control" id="medicamentos" name="medicamentos" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="alergias">Alergias</label>
                            <textarea class="form-control" id="alergias" name="alergias" rows="3"></textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="antecedentes_familiares">Antecedentes Familiares</label>
                            <textarea class="form-control" id="antecedentes_familiares" name="antecedentes_familiares" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="historico_social">Histórico Social</label>
                            <textarea class="form-control" id="historico_social" name="historico_social" rows="3"></textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="revisao_dos_sistemas">Revisão dos Sistemas</label>
                            <textarea class="form-control" id="revisao_dos_sistemas" name="revisao_dos_sistemas" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label for="exame_fisico">Exame Físico</label>
                            <textarea class="form-control" id="exame_fisico" name="exame_fisico" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="avaliacao">Avaliação</label>
                            <textarea class="form-control" id="avaliacao" name="avaliacao" rows="3"></textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="plano">Plano</label>
                            <textarea class="form-control" id="plano" name="plano" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Salvar Prontuário</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
