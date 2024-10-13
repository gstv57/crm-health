<div class="container mt-5">
    <h2 class="text-center mb-4">Pesquisa de Satisfação</h2>
    <p class="text-center">Por favor, avalie sua experiência de consulta.</p>

    @if (session()->has('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="handle" class="border p-4 rounded shadow">
        <div class="form-group mb-4">
            <select class="form-control @error('rating') is-invalid @enderror" id="pesquisa-de-satisfacao" wire:model="rating">
                <option value="">Selecione uma nota</option>
                @for ($i = 1; $i <= 10; $i++)
                <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
            @error('rating')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="comment" class="form-label">Comentários</label>
            <textarea id="comment" wire:model="comment" class="form-control @error('comment') is-invalid @enderror" rows="4"></textarea>
            @error('comment')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>
