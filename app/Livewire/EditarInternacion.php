<?php

namespace App\Livewire;

use App\Models\Internacion;
use App\Models\UsuarioRol;
use Carbon\Carbon;
use Livewire\Component;

class EditarInternacion extends Component
{
    public $internacion_id;
    public $name;
    public $nro_historia;
    public $categoria;
    public $doctor;
    public $enfermera;
    public $ultimo_dia;
    public $cuidados_intensivos;

    protected $rules = [
        'nro_historia'=>'required|string',
        'name'=>'required',
        'categoria'=>'required',
        'doctor'=>'required',
        'enfermera'=>'required',
        'ultimo_dia'=>'required',
        'cuidados_intensivos'=>'required'
    ];


    public function mount( Internacion $internacion )
    {
        $this->internacion_id = $internacion->id;
        $this->nro_historia = $internacion->nro_historia;
        $this->name = $internacion->name;
        $this->categoria = $internacion->categoria;
        $this->doctor = $internacion->doctor;
        $this->enfermera = $internacion->enfermera;
        $this->ultimo_dia = Carbon::parse( $internacion->ultimo_dia)->format('Y-m-d');
        $this->cuidados_intensivos = $internacion->cuidados_intensivos;
    
    }

    public function editarVacante()
    {
        $datos = $this->validate();
        
        //Encontrar la vacante a editar
        $internacion = Internacion::find($this->internacion_id);

        //Asignar los valores
        $internacion->nro_historia=$datos['nro_historia'];
        $internacion->name=$datos['name'];
        $internacion->categoria=$datos['categoria'];
        $internacion->doctor=$datos['doctor'];
        $internacion->enfermera=$datos['enfermera'];
        $internacion->ultimo_dia=$datos['ultimo_dia'];
        $internacion->cuidados_intensivos=$datos['cuidados_intensivos'];

        // Guardar la vacante
        $internacion->save();

        // redireccionar
        session()->flash('mensaje', 'El Paciente se actualizó Correctamente');

        return redirect()->route('internacion.index');
    }

    public function render()
    {
        $doctores = UsuarioRol::where('rol_id', 2)->get();
        $enfermeras = UsuarioRol::where('rol_id', 3)->get();  
        $pacientes =UsuarioRol::where('rol_id', 4)->get();

        return view('livewire.editar-internacion',[
            'pacientes'=>$pacientes,
            'doctores'=>$doctores,
            'enfermeras'=>$enfermeras

        ]);
      
    }
}
