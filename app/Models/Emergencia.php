<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Categoria_Emergencia;
use App\Models\UsuarioRol;

class Emergencia extends Model
{
    use HasFactory;
    public function paciente()
    {
        return $this->belongsTo(User::class, 'paciente_id', 'id');
    }
    public function medico()
    {
        return $this->belongsTo(User::class, 'medico_id', 'id');
    }
    public function categoriaEmergencia()
    {
        return $this->belongsTo(Categoria_Emergencia::class, 'catEmergencia_id', 'id');
    }
    public function salaEmergencia()
    {
        return $this->belongsTo(SalaEmergencia::class, 'sala_id', 'id');
    }
}
