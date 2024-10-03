<?php

namespace App\Enum\Pagamento;

enum PagamentoTypeEnum: string
{
    case CC       = 'cartão de crédito';
    case PIX      = 'pix';
    case BOLETO   = 'boleto';
    case CONVENIO = 'convenio';

}
