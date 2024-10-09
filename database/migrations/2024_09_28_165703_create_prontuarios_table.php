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

            $table->unsignedBigInteger('consulta_id');
            $table->foreign('consulta_id')->references('id')->on('consultas');

            $table->unsignedBigInteger('paciente_id');
            $table->foreign('paciente_id')->references('id')->on('pacientes');

            $table->unsignedBigInteger('criador_id');
            $table->foreign('criador_id')->references('id')->on('users');

            $table->text('queixa_principal')->nullable();
            $table->text('historia_doenca_atual')->nullable();
            $table->text('historia_patologica_pregressa')->nullable();
            $table->text('historia_familiar')->nullable();

            $table->text('antecedentes_pessoais')->nullable();
            $table->text('medicamentos')->nullable();
            $table->text('alergias')->nullable();
            $table->text('historico_social')->nullable();

            $table->string('pressao_arterial')->nullable();
            $table->integer('frequencia_cardiaca')->nullable();
            $table->decimal('temperatura', 3, 1)->nullable();
            $table->integer('frequencia_respiratoria')->nullable();
            $table->text('exame_fisico_geral')->nullable();
            $table->text('exame_sistematico')->nullable();

            $table->text('hipoteses_diagnosticas')->nullable();

            $table->text('exames_solicitados')->nullable();
            $table->text('resultados_exames')->nullable();

            $table->text('diagnostico_final')->nullable();
            $table->text('plano_terapeutico')->nullable();
            $table->text('prescricao_medica')->nullable();

            $table->text('revisao_dos_sistemas')->nullable();
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
