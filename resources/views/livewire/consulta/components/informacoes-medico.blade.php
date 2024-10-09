<div class="card mb-4 shadow-sm border-0">
    <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Médico</h4>
        <i class="bi bi-person-circle fs-3"></i>
    </div>
    <div class="card-body">
        <ul class="list-unstyled">
            <li class="mb-3 d-flex justify-content-between align-items-center">
                <strong>Nome:</strong>
                <span
                    class="badge badge-info">{{ $consulta->medico->nome_completo }}</span>
            </li>
            <li class="mb-3 d-flex justify-content-between align-items-center">
                <strong>CRM:</strong>
                <span class="badge badge-warning">{{ $consulta->medico->crm }}</span>
            </li>
            <li class="mb-3 d-flex justify-content-between align-items-center">
                <strong>Especialidade:</strong>
                @foreach($consulta->medico->especialidades as $especialidade)
                    <span class="badge badge-warning">{{ $especialidade->nome  }}</span>
                @endforeach
            </li>
        </ul>
    </div>
</div>
