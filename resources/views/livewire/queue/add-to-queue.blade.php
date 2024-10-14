<div class="statbox widget box box-shadow mt-2">
    <form wire:submit="addToQueue">
        <div class="form-group">
            <label for="paciente">Paciente</label>
            <select wire:model="paciente" id="paciente" class="form-control">
                <option value="">Selecione o paciente</option>
                @foreach($pacientes as $paciente)
                    <option value="{{ $paciente->id }}">{{ $paciente->primeiro_nome .' ' . $paciente->sobrenome . ' '. $paciente->matricula }}</option>
                @endforeach
            </select>
            @error('paciente') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="prioridade">Prioridade</label>
            <select wire:model="prioridade" id="prioridade" class="form-control">
                <option value="">Selecione a prioridade</option>
                <option value="1">1 - Não urgente</option>
                <option value="2">2 - Pouco urgente</option>
                <option value="3">3 - Urgente</option>
                <option value="4">4 - Muito urgente</option>
                <option value="5">5 - Emergência</option>
            </select>
            @error('prioridade') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Adicionar à Fila</button>
    </form>
</div>
