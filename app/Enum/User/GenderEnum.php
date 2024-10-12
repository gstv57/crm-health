<?php

namespace App\Enum\User;

enum GenderEnum: string
{
    case MASCULINO = 'Masculino';
    case FEMININO  = 'Feminino';
    case OUTRO     = 'Outro';
}
