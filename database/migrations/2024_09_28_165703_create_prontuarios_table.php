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
        Schema::create('prontuarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paciente_id');
            $table->foreign('paciente_id')->references('id')->on('pacientes');

            $table->unsignedBigInteger('criador_id');
            $table->foreign('criador_id')->references('id')->on('users');

            $table->text('queixa_principal')->nullable();
            $table->text('historia_da_doenca_atual')->nullable();
            $table->text('antecedentes_pessoais')->nullable();
            $table->text('medicamentos')->nullable();
            $table->text('alergias')->nullable();
            $table->text('antecedentes_familiares')->nullable();
            $table->text('historico_social')->nullable();
            $table->text('revisao_dos_sistemas')->nullable();
            $table->text('exame_fisico')->nullable();
            $table->text('avaliacao')->nullable();
            $table->text('plano')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prontuarios');
    }
};
