<?php

namespace App\Models;

use App\Enum\Consulta\{ConsultaStatusEnum, ConsultaTypeEnum};
use App\Enum\Pagamento\{PagamentoStatusEnum, PagamentoTypeEnum};
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany};

class Consulta extends Model
{
    use HasFactory;

    protected $fillable = [
        'paciente_id',
        'medico_id',
        'prontuario_id',
        'usuario_agendamento_id',
        'cancelada_por',
        'numero_consulta',
        'data_e_hora',
        'tipo_consulta',
        'motivo_consulta',
        'sintomas',
        'diagnostico',
        'prescricao_medica',
        'exames_solicitados',
        'observacoes_medicas',
        'historico_doenca_atual',
        'historico_familiar',
        'historico_medico',
        'forma_pagamento',
        'valor_consulta',
        'status_pagamento',
        'status_consulta',
        'motivo_cancelamento',
        'exames_realizados',
        'procedimentos_realizados',
        'data_e_hora_inicio',
        'data_e_hora_fim',
        'duracao',
    ];

    protected $casts = [
        'data_e_hora'        => 'datetime',
        'data_e_hora_inicio' => 'datetime',
        'data_e_hora_fim'    => 'datetime',
        'status_consulta'    => ConsultaStatusEnum::class,
        'tipo_consulta'      => ConsultaTypeEnum::class,
        'forma_pagamento'    => PagamentoTypeEnum::class,
        'status_pagamento'   => PagamentoStatusEnum::class,
    ];

    public function paciente(): belongsTo
    {
        return $this->belongsTo(Paciente::class, 'paciente_id');
    }

    public function medico(): belongsTo
    {
        return $this->belongsTo(Medico::class, 'medico_id');
    }

    public function prontuario(): hasMany
    {
        return $this->hasMany(Prontuario::class);
    }

    public function agendadoPor(): belongsTo
    {
        return $this->belongsTo(User::class, 'usuario_agendamento_id');
    }

    public function canceladoPor(): belongsTo
    {
        return $this->belongsTo(User::class, 'cancelada_por');
    }
}
