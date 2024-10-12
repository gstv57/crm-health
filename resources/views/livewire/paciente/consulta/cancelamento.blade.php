<div class="container p-3 rounded mt-2 widget-content widget-content-area">
    <form>
        <div class="form-group mb-4">
           <label for="numero_consulta">Número da consulta</label>
            <input readonly type="text" class="form-control" id="numero_consulta" name="numero_consulta" value="{{ $consulta->numero_consulta }}">
        </div>
        <div class="form-group mb-4">
           <label for="medico">Nome do médico</label>
            <input readonly type="text" class="form-control" id="medico" value="{{ $consulta->medico->nome_completo }}">
        </div>
        <div class="form-group">
            <label for="date-e-hora">Data da consulta</label>
            <input readonly type="datetime-local" class="form-control" id="date-e-hora" name="date-e-hora" value="{{ $consulta->data_e_hora }}">
        </div>
        <div class="form-group">
            <label for="motivo_cancelamento">Motivo cancelamento<span class="text-danger">*</span></label>
            <textarea class="form-control" id="motivo_cancelamento" wire:model="motivo_cancelamento"></textarea>
            @error('motivo_cancelamento')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div>
           <div class="d-flex justify-content-center">
               <button wire:click.prevent="handle" class="btn btn-danger mt-4">Confirmar Cancelamento</button>
           </div>
            <div class="d-flex justify-content-center mt-1">
                <small>Essa ação não pode ser desfeita.</small>
            </div>
        </div>
    </form>

</div>
