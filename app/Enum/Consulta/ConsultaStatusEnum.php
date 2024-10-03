<?php

namespace App\Enum\Consulta;

enum ConsultaStatusEnum: string
{
    case AGENDADA  = 'agendada';
    case REALIZADA = 'realizada';
    case CANCELADA = 'cancelada';
    case REMARCADA = 'remarcada';
}
