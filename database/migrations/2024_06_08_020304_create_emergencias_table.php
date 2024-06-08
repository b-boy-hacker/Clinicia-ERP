<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('emergencias', function (Blueprint $table) {
            $table->id();

            $table->string('nombre');
            $table->string('fecha');
            $table->string('hora');
            $table->unsignedBigInteger('paciente_id')->nullable();
            $table->foreign('paciente_id')->references('id')->on('users')
            ->cascadeOnUpdate()->cascadeOnDelete();
            $table->unsignedBigInteger('medico_id')->nullable();
            $table->foreign('medico_id')->references('id')->on('users')
            ->cascadeOnUpdate()->cascadeOnDelete();
            $table->unsignedBigInteger('catEmergencia_id')->nullable();
            $table->foreign('catEmergencia_id')->references('id')->on('categoria__emergencias')
            ->cascadeOnUpdate()->cascadeOnDelete();
            $table->unsignedBigInteger('sala_id')->nullable();
            $table->foreign('sala_id')->references('id')->on('sala_emergencias')
            ->cascadeOnUpdate()->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emergencias');
    }
};
