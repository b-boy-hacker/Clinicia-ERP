<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'horario';
    protected $fillable = [
        'horaI',
        'horaF',
        'dia',
        'id_turno',
    ];
    public function turno()
    {
        return $this->belongsTo(Turno::class, 'id_turno');
    }
}
