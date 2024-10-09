<div class="card mb-4 shadow-sm border-0">
    <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Paciente</h4>
        <i class="bi bi-person-circle fs-3"></i>
    </div>
    <div class="card-body">
        <ul class="list-unstyled">
            <li class="mb-3 d-flex justify-content-between align-items-center">
                <strong>Nome:</strong>
                <span
                    class="badge badge-info">{{ Str::limit($consulta->paciente->primeiro_nome . ' ' . $consulta->paciente->sobrenome, 40) }}</span>
            </li>
            <li class="mb-3 d-flex justify-content-between align-items-center">
                <strong>Data de Nascimento:</strong>
                <span
                    class="badge badge-secondary">{{ $consulta->paciente->data_nascimento->format('d/m/Y') }}</span>
            </li>
            <li class="mb-3 d-flex justify-content-between align-items-center">
                <strong>Sexo:</strong>
                <span
                    class="badge {{ $consulta->paciente->sexo == 'Masculino' ? 'badge-primary' : 'badge-danger' }}">
                                {{ $consulta->paciente->sexo }}
                            </span>
            </li>
            <li class="mb-3 d-flex justify-content-between align-items-center">
                <strong>Matrícula:</strong>
                <span class="badge badge-warning">{{ $consulta->paciente->matricula }}</span>
            </li>
            <li class="mb-3 d-flex justify-content-between align-items-center">
                <strong>Motivo:</strong>
                <span class="badge badge-info">{{ $consulta->motivo_consulta }}</span>
            </li>
        </ul>
    </div>
</div>
