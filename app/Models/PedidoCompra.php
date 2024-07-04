<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoCompra extends Model
{
    use HasFactory;
    protected $table = 'pedidos_compra';
    protected $primaryKey = 'id_pedido';
    protected $fillable = ['proveedor_id', 'fecha_pedido', 'fecha_recepcion', 'estado', 'total'];

    // public function proveedor()
    // {
    //     return $this->belongsTo(Proveedor::class);
    // }
    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'proveedor_id', 'id_proveedor');
    }
}
