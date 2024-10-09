<?php

namespace App\Enum\Pagamento;

enum PagamentoTypeEnum: string
{
    case CC       = 'Cartão de Crédito';
    case PIX      = 'Pix';
    case BOLETO   = 'Boleto';
    case CONVENIO = 'Convenio';

}
