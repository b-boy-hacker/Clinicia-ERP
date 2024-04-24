<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EspecialidadMediaco extends Model
{
    use HasFactory;
    public function especialidad()
    {
        return $this->belongsTo(Padre::class, 'especialidad_id', 'id');
    }
    public function medico()
    {
        return $this->belongsTo(Alumno::class, 'medico_id', 'id');
    }
}
