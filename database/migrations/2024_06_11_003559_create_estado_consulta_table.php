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
        Schema::create('estado_consulta', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('consulta_medica_id');
            $table->string('estado');
            $table->timestamps();

            $table->foreign('consulta_medica_id')->references('id')->on('consulta_medica')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estado_consulta');
    }
};
