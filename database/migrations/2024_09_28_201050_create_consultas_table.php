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
        Schema::create('consultas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paciente_id')->nullable();
            $table->unsignedBigInteger('medico_id')->nullable();
            $table->unsignedBigInteger('usuario_agendamento_id')->nullable();
            $table->unsignedBigInteger('cancelada_por')->nullable();
            $table->dateTime('cancelada_em')->nullable();
            $table->string('numero_consulta')->unique();
            $table->dateTime('data_e_hora');
            $table->string('tipo_consulta');
            $table->text('motivo_consulta');
            $table->text('sintomas')->nullable();
            $table->text('diagnostico')->nullable();
            $table->text('prescricao_medica')->nullable();
            $table->text('exames_solicitados')->nullable();
            $table->text('observacoes_medicas')->nullable();
            $table->text('historico_doenca_atual')->nullable();
            $table->text('historico_familiar')->nullable();
            $table->text('historico_medico')->nullable();

            $table->string('status_consulta');
            $table->text('motivo_cancelamento')->nullable();
            $table->text('exames_realizados')->nullable();
            $table->text('procedimentos_realizados')->nullable();

            $table->dateTime('data_e_hora_inicio')->nullable();
            $table->dateTime('data_e_hora_fim')->nullable();
            $table->integer('duracao')->nullable();
            $table->boolean('reminded')->default(false);
            $table->integer('rating')->nullable();
            $table->text('comment')->nullable();

            $table->foreign('paciente_id')->references('id')->on('pacientes')->onDelete('set null');
            $table->foreign('medico_id')->references('id')->on('medicos')->onDelete('set null');
            $table->foreign('usuario_agendamento_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('cancelada_por')->references('id')->on('users')->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultas');
    }
};
