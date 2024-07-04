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
        Schema::create('internacions', function (Blueprint $table) {
            $table->id();
            $table->string('nro_historia');
            $table->string('name');
            $table->string('categoria');
            $table->string('doctor');
            $table->string('enfermera');
            $table->date('ultimo_dia');
            $table->string('cuidados_intensivos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('internacions');
    }
};
