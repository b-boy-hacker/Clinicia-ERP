<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\EquipoMedico;

class SalaEmergencia extends Model
{
    use HasFactory;
    public function equipo()
    {
        return $this->belongsTo(EquipoMedico::class, 'equipo_id', 'id');
    }
}
