<?php

namespace App\Enum\Pagamento;

enum PagamentoStatusEnum: string
{
    case PAGO             = 'Pago';
    case PENDENTE         = 'Pendente';
    case CANCELADO        = 'Cancelado';
    case EM_PROCESSAMENTO = 'Em Processamento';
    case REEMBOLSADO      = 'Reembolsado';
    case ATRASADO         = 'Atrasado';
    case RECUSADO         = 'Recusado';
}
