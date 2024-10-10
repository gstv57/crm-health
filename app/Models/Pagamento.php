<?php

namespace App\Models;

use App\Enum\Pagamento\{PagamentoStatusEnum, PagamentoTypeEnum};
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pagamento extends Model
{
    protected $fillable = ['forma_pagamento', 'status_pagamento', 'valor'];

    protected $casts = [
        'forma_pagamento'  => PagamentoTypeEnum::class,
        'status_pagamento' => PagamentoStatusEnum::class,
    ];

    public function consulta(): belongsTo
    {
        return $this->belongsTo(Consulta::class);
    }
}
