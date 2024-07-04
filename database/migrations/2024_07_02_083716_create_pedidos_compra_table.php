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
        Schema::create('pedidos_compra', function (Blueprint $table) {
            $table->id('id_pedido');
            $table->unsignedBigInteger('proveedor_id');
            $table->date('fecha_pedido');
            $table->date('fecha_recepcion')->nullable();
            $table->string('estado', 50)->nullable();
            $table->decimal('total', 10, 2)->nullable();
            $table->timestamps();

            $table->foreign('proveedor_id')->references('id_proveedor')->on('proveedores')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos_compra');
    }
};
