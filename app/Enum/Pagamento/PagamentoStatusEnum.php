<?php

namespace App\Enum\Pagamento;

enum PagamentoStatusEnum: string
{
    case PAGO      = 'pago';
    case PENDENTE  = 'pendente';
    case CANCELADO = 'cancelado';

}
