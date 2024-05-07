<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicoHorario extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'medico_horario';
    protected $fillable = [
        'id_horario',
        'id_medico',
    ];
    public function horario()
    {
        return $this->belongsTo(Horario::class, 'id_horario');
    }
    public function Medico()
    {
        return $this->belongsTo(User::class, 'id_medico');
    }
}