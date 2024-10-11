@props([
    'pagamento',
    'type'
])

@php
    $cores = [
        \App\Enum\Pagamento\PagamentoTypeEnum::CC->value => '#007bff',
        \App\Enum\Pagamento\PagamentoTypeEnum::DINHEIRO->value => '#6f42c1',
        \App\Enum\Pagamento\PagamentoTypeEnum::BOLETO->value => '#fd7e14',
        \App\Enum\Pagamento\PagamentoTypeEnum::PIX->value => '#28a745'
    ];
    $corIcone = $cores[$type] ?? 'white'; // Default
@endphp

<div class="transactions-list">
    <div class="t-item">
        <div class="t-company-name">
            <div class="t-icon">
                <div class="icon" style="background-color: {{ $corIcone }};">
                    @switch($type)
                        @case(\App\Enum\Pagamento\PagamentoTypeEnum::CC->value)
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z"/>
                            </svg>
                            @break
                        @case(\App\Enum\Pagamento\PagamentoTypeEnum::DINHEIRO->value)
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                            </svg>
                            @break

                        @case(\App\Enum\Pagamento\PagamentoTypeEnum::BOLETO->value)
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 0 1 0 3.75H5.625a1.875 1.875 0 0 1 0-3.75Z"/>
                            </svg>
                            @break

                        @case(\App\Enum\Pagamento\PagamentoTypeEnum::PIX->value)
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="white">
                                <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path
                                    d="M242.4 292.5C247.8 287.1 257.1 287.1 262.5 292.5L339.5 369.5C353.7 383.7 372.6 391.5 392.6 391.5H407.7L310.6 488.6C280.3 518.1 231.1 518.1 200.8 488.6L103.3 391.2H112.6C132.6 391.2 151.5 383.4 165.7 369.2L242.4 292.5zM262.5 218.9C256.1 224.4 247.9 224.5 242.4 218.9L165.7 142.2C151.5 127.1 132.6 120.2 112.6 120.2H103.3L200.7 22.8C231.1-7.6 280.3-7.6 310.6 22.8L407.8 119.9H392.6C372.6 119.9 353.7 127.7 339.5 141.9L262.5 218.9zM112.6 142.7C126.4 142.7 139.1 148.3 149.7 158.1L226.4 234.8C233.6 241.1 243 245.6 252.5 245.6C261.9 245.6 271.3 241.1 278.5 234.8L355.5 157.8C365.3 148.1 378.8 142.5 392.6 142.5H430.3L488.6 200.8C518.9 231.1 518.9 280.3 488.6 310.6L430.3 368.9H392.6C378.8 368.9 365.3 363.3 355.5 353.5L278.5 276.5C264.6 262.6 240.3 262.6 226.4 276.6L149.7 353.2C139.1 363 126.4 368.6 112.6 368.6H80.8L22.8 310.6C-7.6 280.3-7.6 231.1 22.8 200.8L80.8 142.7H112.6z"/>
                            </svg>
                            @break
                        @default
                            sem icon
                    @endswitch
                </div>
            </div>

            <div class="t-name">
                <h4><a href="{{ route('paciente.edit',['paciente' => $pagamento->consulta->paciente->id ] ) }}">{{ $pagamento->consulta->paciente->primeiro_nome }}</a></h4>
                <p class="meta-date">{{ $pagamento->updated_at->format('d/m/Y H:i') }}</p>
            </div>

        </div>
        <div class="t-rate rate-dec">
            <p><span class="text-success">+ {{ number_format($pagamento->valor, 2) }}</span></p>
        </div>
    </div>
</div>
