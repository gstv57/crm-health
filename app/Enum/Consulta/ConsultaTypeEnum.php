<?php

namespace App\Enum\Consulta;

enum ConsultaTypeEnum: string
{
    case PRESENCIAL   = 'presencial';
    case TELEMEDICINA = 'telemedicina';
}
