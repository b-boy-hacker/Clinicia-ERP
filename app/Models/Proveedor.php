<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;
    protected $table = 'proveedores';
    protected $primaryKey = 'id_proveedor';
    protected $fillable = ['nombre', 'direccion', 'telefono', 'email'];

    // public function pedidos()
    // {
    //     return $this->hasMany(PedidoCompra::class);
    // }
    public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'proveedor_id', 'id_proveedor');
    }
}
