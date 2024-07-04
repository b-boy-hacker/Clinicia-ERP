<?php

namespace App\Livewire;

use App\Models\Enfermera;
use App\Models\Internacion;
use App\Models\UsuarioRol;
///use Database\Seeders\EnfermeraSeeder;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class CrearInternacion extends Component
{


    public $nro_historia;
    public $name;
    public $categoria;
    public $doctor;
    public $enfermera;
    public $ultimo_dia;
    public $cuidados_intensivos;

//  use WithFileUploads;

    protected $rules = [
        'nro_historia'=>'required|string',
        'name'=>'required',
        'categoria'=>'required',
        'doctor'=>'required',
        'enfermera'=>'required',
        'ultimo_dia'=>'required',
        'cuidados_intensivos'=>'required'
    ];

    public function crearInterno()
    {
        $datos = $this->validate();
     

        Internacion::create([
        'nro_historia'=>$datos['nro_historia'],
        'name'=>$datos['name'],
        'categoria'=>$datos['categoria'],
        'doctor'=>$datos['doctor'],
        'enfermera'=>$datos['enfermera'],
        'ultimo_dia'=>$datos['ultimo_dia'], 
        'cuidados_intensivos'=>$datos['cuidados_intensivos'],
        ]);
        
        session()->flash('mensaje','El Paciente se registró correctamente');
 

        return redirect()->route('internacion.index');
    }

    public function render()
    {   
       
        $doctores = UsuarioRol::where('rol_id', 2)->get(); 
        $enfermeras = UsuarioRol::where('rol_id', 3)->get();
        $pacientes =UsuarioRol::where('rol_id', 4)->get();
        return view('livewire.crear-internacion',[
            'pacientes'=>$pacientes,
            'doctores'=>$doctores,
            'enfermeras'=>$enfermeras
        ]);
    }
}
