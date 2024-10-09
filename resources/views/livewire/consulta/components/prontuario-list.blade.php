<div class="row">
    @foreach($consulta->prontuario as $item)
        <div class="col-md-3" wire:key="{{ $item->id }}">
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
