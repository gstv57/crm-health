<?php

namespace App\Enum\Consulta;

enum ConsultaTypeEnum: string
{
    case PRESENCIAL   = 'Presencial';
    case TELEMEDICINA = 'Telemedicina';
}
