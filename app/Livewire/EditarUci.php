<?php

namespace App\Livewire;

use App\Models\Uci;
use App\Models\UsuarioRol;
use Illuminate\Support\Carbon;
use Livewire\Component;

class EditarUci extends Component
{
    public $uci_id;
    public $name;
    public $nro_historia;
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


    public function mount( Uci $uci )
    {
        $this->uci_id = $uci->id;
        $this->nro_historia = $uci->nro_historia;
        $this->name = $uci->name;
        $this->categoria = $uci->categoria;
        $this->doctor = $uci->doctor;
        $this->ultimo_dia = Carbon::parse( $uci->ultimo_dia)->format('Y-m-d');
        $this->cuidados_intensivos = $uci->cuidados_intensivos;
    
    }

    public function editarVacante()
    {
        $datos = $this->validate();
        
        //Encontrar la vacante a editar
        $uci = Uci::find($this->uci_id);

        //Asignar los valores
        $uci->nro_historia=$datos['nro_historia'];
        $uci->name=$datos['name'];
        $uci->categoria=$datos['categoria'];
        $uci->doctor=$datos['doctor'];
        $uci->ultimo_dia=$datos['ultimo_dia'];
        $uci->cuidados_intensivos=$datos['cuidados_intensivos'];

        // Guardar la vacante
        $uci->save();

        // redireccionar
        session()->flash('mensaje', 'El Paciente se actualizó Correctamente');

        return redirect()->route('uci.index');
    }

    public function render()
    {   
        $pacientes =UsuarioRol::where('rol_id', 3)->get();
        $doctores = UsuarioRol::where('rol_id', 2)->get(); 
        return view('livewire.editar-uci',[
            'pacientes'=>$pacientes,
            'doctores'=>$doctores
        ]);
    }
}
