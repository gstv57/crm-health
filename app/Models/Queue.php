<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Queue extends Model
{
    protected $fillable = ['paciente_id', 'posicao'];

    public function paciente(): belongsTo
    {
        return $this->belongsTo(Paciente::class);
    }
}
