<div class="table-responsive">
    <table class="table mb-4 contextual-table">
        <thead class="thead-dark">
            <tr>
                <th class="text-center font-weight-bold">SENHA</th>
                <th class="text-center font-weight-bold">PRIORIDADE</th>
            </tr>
        </thead>
        <tbody>
            @forelse($queue as $item)
                <tr class="table-light text-uppercase font-weight-bold">
                    <td class="text-black text-center font-weight-bold">#{{ str_pad($item->posicao, 3, '0', STR_PAD_LEFT) }}</td>
                    <td class="text-black text-center font-weight-bold">{{ $item->prioridade }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Nenhum paciente na fila</td>
                </tr>
           @endforelse
        </tbody>
    </table>
</div>

