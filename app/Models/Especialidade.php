<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especialidade extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'ativo', 'descricao'];

    public function medicos()
    {
        return $this->belongsToMany(Medico::class, 'especialidade_has_medicos', 'especialidade_id', 'medico_id');
    }
}
