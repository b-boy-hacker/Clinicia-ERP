<?php

namespace App\Livewire;

use App\Models\Rol;
use App\Models\Uci;
use App\Models\User;
use App\Models\UsuarioRol;
use Livewire\Component;

class CrearUci extends Component
{

    public $nro_historia;
    public $name;
    public $categoria;
    public $doctor;
    public $ultimo_dia;
    public $cuidados_intensivos;



    protected $rules = [
        'nro_historia'=>'required|string',
        'name'=>'required',
        'categoria'=>'required',
        'doctor'=>'required',
        'ultimo_dia'=>'required',
        'cuidados_intensivos'=>'required'
    ];

    public function crearVacante()
    {
        $datos = $this->validate();

        Uci::create([
        'nro_historia'=>$datos['nro_historia'],
        'name'=>$datos['name'],
        'categoria'=>$datos['categoria'],
        'doctor'=>$datos['doctor'],
        'ultimo_dia'=>$datos['ultimo_dia'], 
        'cuidados_intensivos'=>$datos['cuidados_intensivos'],
        ]);
        
        session()->flash('mensaje','El Paciente se registró correctamente');
 

        return redirect()->route('uci.index');
    }

    public function render()
    {
    

        // $pacientes = UsuarioRol::where('id', '3')->get();
        // $doctores = UsuarioRol::where('id', '2')->get();
        // $pacientes1 = User::where('id', $pacientes->rol_id)->get();
         //$doctores1 = User::where('id', $doctores->rol_id)->get();
        // $medico = UsuarioRol::where('rol_id', 2)->get(); 

        $doctores = UsuarioRol::where('rol_id', 2)->get(); 
        $enfermeras = UsuarioRol::where('rol_id', 3)->get();
        $pacientes =UsuarioRol::where('rol_id', 4)->get();
        return view('livewire.crear-uci',[
           'pacientes'=>$pacientes,
            'doctores'=>$doctores,
            'enfermeras'=>$enfermeras
        
        ]);

    }
}
