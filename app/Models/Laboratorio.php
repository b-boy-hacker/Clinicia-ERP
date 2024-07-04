<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laboratorio extends Model
{
    use HasFactory;
    protected $table = 'laboratorios';

    protected $fillable = [
        'consulta_medica_id',
        'descripcion',
    ];

    public function consultaMedica()
    {
        return $this->belongsTo(ConsultaMedica::class, 'consulta_medica_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
