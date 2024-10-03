<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    use HasFactory;
    public const ADMIN_COLOR         = 'dark';
    public const MEDICO_COLOR        = 'danger';
    public const PACIENTE_COLOR      = 'primary';
    public const RECEPCIONISTA_COLOR = 'secondary';

    protected $fillable = ['nome', 'descricao'];

    public function users(): belongsToMany
    {
        return $this->belongsToMany(User::class, 'user_has_roles', 'role_id', 'user_id');
    }
    public function permissoes(): belongsToMany
    {
        return $this->belongsToMany(Permissao::class, 'permissao_has_roles', 'role_id', 'permissao_id');
    }

    public function getBadgeClass(): string
    {
        return match ($this->id) {
            User::ADMIN         => self::ADMIN_COLOR,
            User::MEDICO        => self::MEDICO_COLOR,
            User::PACIENTE      => self::PACIENTE_COLOR,
            User::RECEPCIONISTA => self::RECEPCIONISTA_COLOR,
            default             => 'light',
        };
    }
}
