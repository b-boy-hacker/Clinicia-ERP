<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uci extends Model
{
    use HasFactory;

    protected $casts = ['ultimo_dia'=>'date'];

    protected $fillable =[
        'nro_historia',
        'name',
        'categoria',
        'doctor',
        'ultimo_dia',
        'cuidados_intensivos'
    ];

}
