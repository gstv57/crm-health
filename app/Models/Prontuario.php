<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Prontuario extends Model
{
    use HasFactory;

    protected $fillable = [
        'paciente_id',
        'criador_id',
        'queixa_principal',
        'historia_da_doenca_atual',
        'antecedentes_pessoais',
        'medicamentos',
        'alergias',
        'antecedentes_familiares',
        'historico_social',
        'revisao_dos_sistemas',
        'exame_fisico',
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
    public function consultas()
    {
        return $this->hasMany(Consulta::class, 'prontuario_id');
    }
}
