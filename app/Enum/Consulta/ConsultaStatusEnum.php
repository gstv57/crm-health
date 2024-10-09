<?php

namespace App\Enum\Consulta;

enum ConsultaStatusEnum: string
{
    case AGENDADA             = 'Agendada';
    case REALIZADA            = 'Realizada';
    case CANCELADA            = 'Cancelada';
    case REMARCADA            = 'Remarcada';
    case ANDAMENTO            = 'Em andamento';
    case CONFIRMADA           = 'Confirmada';
    case NAO_COMPARECEU       = 'Nao compareceu';
    case AGUARDANDO_PAGAMENTO = 'Aguardando pagamento';
}
