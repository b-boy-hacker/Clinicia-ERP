<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $table = 'productos';
    protected $primaryKey = 'id_producto';
    protected $fillable = ['nombre', 'descripcion', 'precio', 'stock', 'fecha_expiracion', 'categoria_id', 'imagen_url'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
