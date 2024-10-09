<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Atividade extends Model
{
    protected $fillable = ['user_id', 'descricao'];

    public function user(): belongsTo
    {
        return $this->belongsTo(User::class);
    }
}
