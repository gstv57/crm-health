<x-app-layout>
    <x-prontuario.partials.navbar-short :paciente="$paciente"></x-prontuario.partials.navbar-short>
    <div class="widget-content widget-content-area br-6 mt-2">
        <form action="{{ route('consultas.store', $paciente->id) }}" method="POST">
            @csrf
            <div id="default-ordering_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                <div class="dt--top-section">
                    <div class="row mb-4">
                        <div class="col-md-5">
                            <label for="medico_id">Médico</label>
                            <select id="medico_id" name="medico_id" class="form-control">
                                <option value="" disabled {{ old('medico_id') ? '' : 'selected' }}>Selecione o Médico</option>
                                @foreach($medicos as $medico)
                                    <option value="{{ $medico->id }}" {{ old('medico_id') == $medico->id ? 'selected' : '' }}>
                                        {{ $medico->nome_completo }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="data_e_hora">Data e Hora da Consulta</label>
                            <input type="datetime-local" id="data_e_hora" name="data_e_hora" class="form-control" value="{{ old('data_e_hora') }}" required>
                        </div>
                        <div class="col-md-4">
                            <label for="tipo_consulta">Tipo de Consulta</label>
                            <select id="tipo_consulta" name="tipo_consulta" class="form-control" required>
                                <option value="" disabled {{ old('tipo_consulta') ? '' : 'selected' }}>Selecione o Tipo de Consulta</option>
                                @foreach(\App\Enum\Consulta\ConsultaTypeEnum::cases() as $item)
                                    <option value="{{ $item->value }}" {{ old('tipo_consulta') == $item->value ? 'selected' : '' }}>
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="motivo_consulta">Motivo da Consulta</label>
                            <textarea id="motivo_consulta" name="motivo_consulta" class="form-control" required>{{ old('motivo_consulta') }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="sintomas">Sintomas</label>
                            <textarea id="sintomas" name="sintomas" class="form-control" placeholder="Descreva os sintomas (opcional)">{{ old('sintomas') }}</textarea>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="diagnostico">Diagnóstico</label>
                            <textarea id="diagnostico" name="diagnostico" class="form-control" placeholder="Descreva o diagnóstico (opcional)">{{ old('diagnostico') }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="prescricao_medica">Prescrição Médica</label>
                            <textarea id="prescricao_medica" name="prescricao_medica" class="form-control" placeholder="Prescrição médica (opcional)">{{ old('prescricao_medica') }}</textarea>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="exames_solicitados">Exames Solicitados</label>
                            <textarea id="exames_solicitados" name="exames_solicitados" class="form-control" placeholder="Exames solicitados (opcional)">{{ old('exames_solicitados') }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="observacoes_medicas">Observações Médicas</label>
                            <textarea id="observacoes_medicas" name="observacoes_medicas" class="form-control" placeholder="Observações médicas (opcional)">{{ old('observacoes_medicas') }}</textarea>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="historico_doenca_atual">Histórico da Doença Atual</label>
                            <textarea id="historico_doenca_atual" name="historico_doenca_atual" class="form-control" placeholder="Histórico da doença atual (opcional)">{{ old('historico_doenca_atual') }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="historico_familiar">Histórico Familiar</label>
                            <textarea id="historico_familiar" name="historico_familiar" class="form-control" placeholder="Histórico familiar (opcional)">{{ old('historico_familiar') }}</textarea>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="historico_medico">Histórico Médico</label>
                            <textarea id="historico_medico" name="historico_medico" class="form-control" placeholder="Histórico médico (opcional)">{{ old('historico_medico') }}</textarea>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="forma_pagamento">Forma de Pagamento</label>
                            <select id="forma_pagamento" name="forma_pagamento" class="form-control" required>
                                <option value="" disabled {{ old('forma_pagamento') ? '' : 'selected' }}>Selecione o tipo de Pagamento</option>
                                @foreach(\App\Enum\Pagamento\PagamentoTypeEnum::cases() as $item)
                                    <option value="{{ $item->value }}" {{ old('forma_pagamento') == $item->value ? 'selected' : '' }}>
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="valor">Valor da Consulta</label>
                            <input type="number" id="valor" name="valor" class="form-control" step="0.01" placeholder="Valor da consulta (opcional)" value="{{ old('valor') }}">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="status_pagamento">Status de Pagamento</label>
                            <select id="status_pagamento" name="status_pagamento" class="form-control" required>
                                <option value="" disabled {{ old('status_pagamento') ? '' : 'selected' }}>Selecione o status de pagamento</option>
                                @foreach(\App\Enum\Pagamento\PagamentoStatusEnum::cases() as $item)
                                    <option value="{{ $item->value }}" {{ old('status_pagamento') == $item->value ? 'selected' : '' }}>
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <button type="reset" class="btn btn-secondary">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Salvar Consulta</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
