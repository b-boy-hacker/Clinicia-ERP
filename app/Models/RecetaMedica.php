<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecetaMedica extends Model
{
    use HasFactory;
    protected $table = 'recetas_medicas';
    protected $fillable = [
        'consulta_medica_id',
        'descripcion',
    ];

    public function consultaMedica()
    {
        return $this->belongsTo(ConsultaMedica::class, 'consulta_medica_id');
    }
}
