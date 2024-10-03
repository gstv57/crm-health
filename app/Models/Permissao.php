<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Permissao extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'descricao'];

    public function roles(): belongsToMany
    {
        return $this->belongsToMany(Role::class, 'permissao_has_roles', 'permissao_id', 'role_id');
    }
}
