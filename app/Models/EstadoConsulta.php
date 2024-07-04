<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoConsulta extends Model
{
    use HasFactory;
    protected $table = 'estado_consulta';
    protected $fillable = [
        'consulta_medica_id',
        'estado',
    ];

    public function consultaMedica()
    {
        return $this->belongsTo(ConsultaMedica::class, 'consulta_medica_id');
    }
}
