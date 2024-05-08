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
        Schema::table('medico_horario', function (Blueprint $table) {
            // Elimina la clave foránea existente
            $table->dropForeign(['id_medico']);

            // Elimina la columna id_medico
            $table->dropColumn('id_medico');

            // Agrega el nuevo atributo id_especialidad
            $table->unsignedBigInteger('id_especialidad')->nullable();
            $table->foreign('id_especialidad')->references('id')->on('especialidads')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('medico_horario', function (Blueprint $table) {
            // Elimina la clave foránea de id_especialidad
            $table->dropForeign(['id_especialidad']);

            // Elimina la columna id_especialidad
            $table->dropColumn('id_especialidad');

            // Vuelve a agregar la columna id_medico
            $table->unsignedBigInteger('id_medico');
            $table->foreign('id_medico')->references('id')->on('especialidad_medicos')->onDelete('cascade')->onUpdate('cascade');
        });
    }
};
