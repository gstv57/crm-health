<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany};

class Prontuario extends Model
{
    use HasFactory;

    protected $fillable = [
        'consulta_id',
        'paciente_id',
        'criador_id',
        'queixa_principal',
        'historia_doenca_atual',
        'historia_patologica_pregressa',
        'historia_familiar',
        'antecedentes_pessoais',
        'medicamentos',
        'alergias',
        'antecedentes_familiares',
        'historico_social',
        'pressao_arterial',
        'frequencia_cardiaca',
        'temperatura',
        'frequencia_respiratoria',
        'exame_fisico_geral',
        'exame_sistematico',
        'hipoteses_diagnosticas',
        'exames_solicitados',
        'resultados_exames',
        'diagnostico_final',
        'plano_terapeutico',
        'prescricao_medica',
        'revisao_dos_sistemas',
        'avaliacao',
        'plano',
    ];

    public function paciente(): belongsTo
    {
        return $this->belongsTo(User::class, 'paciente_id');
    }
    public function criador(): belongsTo
    {
        return $this->belongsTo(User::class, 'criador_id');
    }
    public function consultas(): hasMany
    {
        return $this->hasMany(Consulta::class, 'prontuario_id');
    }
}
