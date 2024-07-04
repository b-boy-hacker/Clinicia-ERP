<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class consultaMedica extends Model
{
    use HasFactory;
    protected $table = 'consulta_medica';
    protected $fillable = [
        'fecha',
        'id_paciente',
        'id_especialidad',
        'id_consultorio',
        'id_medico',
        'id_horario'
    ];
    public function consultorio()
    {
        return $this->belongsTo(Consultorio::class, 'id_consultorio');
    }
    public function servicios()
    {
        return $this->belongsTo(Servicio::class, 'id_servicios');
    }
    public function consultasMedicas()
    {
        return $this->hasMany(ConsultaMedica::class, 'id_medico');
    }
    public function paciente()
    {
        return $this->belongsTo(User::class, 'id_paciente');
        //return User::find($this->id_paciente);
    }
    public function horario()
    {
        return $this->belongsTo(Horario::class, 'id_horario');
        //return User::find($this->id_paciente);
    }
    
    public function especialidad()
    {
        return $this->belongsTo(Especialidad::class, 'id_especialidad');
    }
    public function medico()
    {
        return $this->belongsTo(User::class, 'id_medico');
    }
    public function estados()
    {
        return $this->hasMany(EstadoConsulta::class, 'consulta_medica_id');
    }
    public function estadoActual()
    {
        return $this->hasOne(EstadoConsulta::class, 'consulta_medica_id')->latest();
    }
    public function recetasMedicas()
    {
        return $this->hasMany(RecetaMedica::class, 'consulta_medica_id');
    }
    public function laboratorios()
    {
        return $this->hasMany(Laboratorio::class,'consulta_medica_id');
    }
}
