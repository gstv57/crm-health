<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany};

class Paciente extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'primeiro_nome',
        'sobrenome',
        'data_nascimento',
        'sexo',
        'cpf',
        'rg',
        'endereco',
        'numero',
        'complemento',
        'bairro',
        'cidade',
        'estado',
        'cep',
        'telefone',
        'matricula',
    ];

    protected $casts = ['data_nascimento' => 'date'];

    public function user(): belongsTo
    {
        return $this->belongsTo(User::class);
    }

    public static function createMatricula(): string
    {
        do {
            $randomNumber = rand(1, 999999);
            $paddedNumber = str_pad((string)$randomNumber, 6, '0', STR_PAD_LEFT);
            $matricula    = 'A-' . $paddedNumber;
        } while (self::where('matricula', $matricula)->exists());

        return $matricula;
    }
    public static function gerarCpf(): string
    {
        $baseNumeroCpf = str_pad((string)rand(0, 999999999), 9, '0', STR_PAD_LEFT);

        $multiplicadores1 = [10, 9, 8, 7, 6, 5, 4, 3, 2];
        $multiplicadores2 = [11, 10, 9, 8, 7, 6, 5, 4, 3, 2];

        // Calcula o primeiro dígito verificador
        $soma = 0;

        for ($i = 0; $i < 9; $i++) {
            $soma += (int)$baseNumeroCpf[$i] * $multiplicadores1[$i];
        }
        $primeiroDigito = ($soma % 11) < 2 ? 0 : 11 - ($soma % 11);

        // Calcula o segundo dígito verificador
        $soma = 0;

        for ($i = 0; $i < 9; $i++) {
            $soma += (int)$baseNumeroCpf[$i] * $multiplicadores2[$i];
        }
        $soma += $primeiroDigito * $multiplicadores2[9];
        $segundoDigito = ($soma % 11) < 2 ? 0 : 11 - ($soma % 11);

        return $baseNumeroCpf . $primeiroDigito . $segundoDigito;
    }

    public function prontuarios(): hasMany
    {
        return $this->hasMany(Prontuario::class);
    }

    public function consultas(): hasMany
    {
        return $this->hasMany(Consulta::class);
    }

}
