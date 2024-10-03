@props([
    'paciente'
])

<div class="mt-2">
    <a href="{{ route('paciente.edit', $paciente->id) }}" class="btn btn-warning mb-3 rounded bs-tooltip" title="Acessar Paciente">
        Paciente
    </a>
    <a href="{{ route('prontuario.index', $paciente->id) }}" class="btn btn-primary mb-3 rounded bs-tooltip" title="Acessar Prontuarios do Paciente">
        Prontuario
    </a>

    <a href="javascript:void(0);" class="btn btn-success mb-3 rounded bs-tooltip" title="Acessar Receitas do Paciente">
        Receita
    </a>
    <a href="{{ route('consultas.index', $paciente->id) }}" class="btn btn-secondary mb-3 rounded bs-tooltip" title="Acessar Consultas do Paciente">
        Consultas
    </a>
</div>
