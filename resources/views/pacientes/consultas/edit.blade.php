<x-app-layout>
    <x-prontuario.partials.navbar-short :paciente="$paciente"></x-prontuario.partials.navbar-short>
    <div class="widget-content widget-content-area br-6 mt-2">
        <form action="{{ route('consultas.update', ['paciente' => $paciente->id, 'consulta' => $consulta->id]) }}"
              method="POST">
            @csrf
            @method('PATCH')
            <div id="default-ordering_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                <div class="dt--top-section">
                    <div class="row mb-4">
                        <div class="col-md-5">
                            <label for="medico_id">Médico</label>
                            <select
                                id="medico_id"
                                name="medico_id"
                                class="form-control"
                                {{ $consulta->status_consulta != \App\Enum\Consulta\ConsultaStatusEnum::CANCELADA ? '' : 'disabled' }}>
                                <option value="" selected disabled>Selecione o Médico</option>
                                @foreach($medicos as $medico)
                                    <option
                                        value="{{ $medico->id }}"
                                        {{ $consulta->medico->id === $medico->id ? 'selected' : '' }}>
                                        {{ $medico->nome_completo }}
                                    </option>
                                @endforeach
                            </select>

                        </div>
                        <div class="col-md-3">
                            <label for="data_e_hora">Data e Hora da Consulta</label>
                            <input {{ $consulta->status_consulta != \App\Enum\Consulta\ConsultaStatusEnum::CANCELADA ? '' : 'disabled' }} type="datetime-local" id="data_e_hora" name="data_e_hora" class="form-control"
                                   value="{{ $consulta->data_e_hora }}">
                        </div>
                        <div class="col-md-4">
                            <label for="tipo_consulta">Tipo de Consulta</label>
                            <select
                                id="tipo_consulta"
                                name="tipo_consulta"
                                class="form-control"
                                {{ $consulta->status_consulta != \App\Enum\Consulta\ConsultaStatusEnum::CANCELADA ? '' : 'disabled' }}>
                                @foreach(\App\Enum\Consulta\ConsultaTypeEnum::cases() as $item)
                                    <option
                                        value="{{ $item->value }}"
                                        {{ $consulta->tipo_consulta->value === $item->value ? 'selected' : '' }}>
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="motivo_consulta">Motivo da Consulta</label>
                            <textarea {{ $consulta->status_consulta != \App\Enum\Consulta\ConsultaStatusEnum::CANCELADA ? '' : 'readonly' }} id="motivo_consulta" name="motivo_consulta"
                                      class="form-control">{{ $consulta->motivo_consulta }}</textarea>
                        </div>

                        <div class="col-md-6">
                            <label for="sintomas">Sintomas</label>
                            <textarea {{ $consulta->status_consulta != \App\Enum\Consulta\ConsultaStatusEnum::CANCELADA ? '' : 'readonly' }} id="sintomas" name="sintomas"
                                      class="form-control">{{ $consulta->sintomas }}</textarea>
                        </div>

                    </div>
                    <div class="row mb-4">

                        <div class="col-md-6">
                            <label for="diagnostico">Diagnóstico</label>
                            <textarea {{ $consulta->status_consulta != \App\Enum\Consulta\ConsultaStatusEnum::CANCELADA ? '' : 'readonly' }} id="diagnostico" name="diagnostico"
                                      class="form-control" {{ $consulta->diagnostico }}></textarea>
                        </div>

                        <div class="col-md-6">
                            <label for="prescricao_medica">Prescrição Médica</label>
                            <textarea {{ $consulta->status_consulta != \App\Enum\Consulta\ConsultaStatusEnum::CANCELADA ? '' : 'readonly' }} id="prescricao_medica" name="prescricao_medica"
                                      class="form-control" {{ $consulta->prescricao_medica }}></textarea>

                        </div>

                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="exames_solicitados">Exames Solicitados</label>
                            <textarea {{ $consulta->status_consulta != \App\Enum\Consulta\ConsultaStatusEnum::CANCELADA ? '' : 'readonly' }} id="exames_solicitados" name="exames_solicitados"
                                      class="form-control" {{ $consulta->exames_solicitados }}></textarea>
                        </div>

                        <div class="col-md-6">
                            <label for="observacoes_medicas">Observações Médicas</label>
                            <textarea {{ $consulta->status_consulta != \App\Enum\Consulta\ConsultaStatusEnum::CANCELADA ? '' : 'readonly' }} id="observacoes_medicas" name="observacoes_medicas"
                                      class="form-control" {{ $consulta->observacoes_medicas }}></textarea>

                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="historico_doenca_atual">Histórico da Doença Atual</label>
                            <textarea {{ $consulta->status_consulta != \App\Enum\Consulta\ConsultaStatusEnum::CANCELADA ? '' : 'readonly' }} id="historico_doenca_atual" name="historico_doenca_atual"
                                      class="form-control" {{ $consulta->historico_doenca_atual }}></textarea>
                        </div>

                        <div class="col-md-6">
                            <label for="historico_familiar">Histórico Familiar</label>
                            <textarea {{ $consulta->status_consulta != \App\Enum\Consulta\ConsultaStatusEnum::CANCELADA ? '' : 'readonly' }} id="historico_familiar" name="historico_familiar" class="form-control" {{ $consulta->historico_familiar }}></textarea>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="historico_medico">Histórico Médico</label>
                            <textarea
                                id="historico_medico"
                                name="historico_medico"
                                class="form-control"
                                {{ $consulta->status_consulta != \App\Enum\Consulta\ConsultaStatusEnum::CANCELADA ? '' : 'readonly' }}
                            >{{ $consulta->historico_medico }}</textarea>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <button type="reset" class="btn btn-secondary">Voltar</button>
                            @if($consulta->status_consulta != \App\Enum\Consulta\ConsultaStatusEnum::CANCELADA)
                                <button type="submit" class="btn btn-primary">Salvar Consulta</button>
                                <a href="{{ route('consultas.cancelamento', ['paciente' => $paciente->id ,'consulta' => $consulta->id]) }}" class="btn btn-danger">Cancelar Consulta</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>

</x-app-layout>
