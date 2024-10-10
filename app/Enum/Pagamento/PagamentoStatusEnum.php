<?php

namespace App\Enum\Pagamento;

enum PagamentoStatusEnum: string
{
    case PAGO     = 'Pago';
    case PENDENTE = 'Pendente';
}
