<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('primeiro_nome');
            $table->string('sobrenome');
            $table->date('data_nascimento');
            $table->string('sexo');
            $table->string('cpf')->unique();
            $table->string('rg')->unique()->nullable();
            $table->text('endereco');
            $table->string('numero');
            $table->text('complemento')->nullable();
            $table->text('bairro');
            $table->text('cidade');
            $table->string('estado');
            $table->string('cep');
            $table->string('telefone');
            $table->uuid('matricula')->unique();
            $table->boolean('ativo')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacientes');
    }
};
