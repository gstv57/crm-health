<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, BelongsToMany, HasMany};

class Medico extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome_completo',
        'cpf',
        'data_nascimento',
        'sexo',
        'crm',
        'telefone',
        'email',
        'cep',
        'endereco',
        'bairro',
        'cidade',
        'estado',
        'numero',
        'complemento',
        'banco',
        'agencia',
        'conta',
        'user_id',
    ];

    public function user(): belongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function especialidades(): BelongsToMany
    {
        return $this->belongsToMany(Especialidade::class, 'especialidade_has_medicos', 'medico_id', 'especialidade_id');
    }
    public function consultas(): HasMany
    {
        return $this->hasMany(Consulta::class);
    }

}
