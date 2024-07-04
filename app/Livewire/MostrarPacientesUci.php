<?php

namespace App\Livewire;

use App\Models\Uci;
use App\Models\UsuarioRol;
use Livewire\Component;

class MostrarPacientesUci extends Component
{
    protected $listeners = ['eliminarPaciente'];

    public function eliminarPaciente(Uci $uci)
    {
        $uci->delete();
    }

    public function render()
    {
        $pacientes= Uci::all();
        //$pacientes =UsuarioRol::where('rol_id', 3)->paginate(10);
        return view('livewire.mostrar-pacientes-uci',[
            'pacientes'=>$pacientes,
        ]);
    }
}
