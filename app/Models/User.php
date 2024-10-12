<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\{BelongsToMany, HasMany, HasOne};
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory;
    use Notifiable;

    public const ADMIN  = 1;
    public const MEDICO = 2;

    public const RECEPCIONISTA = 3;

    public const PACIENTE = 4;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'active',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password'          => 'hashed',
        ];
    }
    public function roles(): belongsToMany
    {
        return $this->belongsToMany(Role::class, 'user_has_roles', 'user_id', 'role_id');
    }
    public function paciente(): hasOne
    {
        return $this->hasOne(Paciente::class);
    }
    public function medico(): hasOne
    {
        return $this->hasOne(Medico::class);
    }

    /**
     * Verifica se o usuário tem a role especifica.
     *
     * @param string $role
     * @return bool
     */
    public function hasRole(string $role): bool
    {
        return $this->roles->contains('nome', $role);
    }

    /**
     * Verifica se o usuário tem qualquer uma das roles
     *
     * @param array $role
     * @return bool
     */
    public function hasAnyRole(array $role): bool
    {
        return $this->roles->pluck('nome')->intersect($role)->isNotEmpty();
    }

    public function notifications(): HasMany
    {
        return $this->hasMany(Notification::class);
    }
}
