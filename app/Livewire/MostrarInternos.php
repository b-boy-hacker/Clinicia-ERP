<?php

namespace App\Livewire;

use App\Models\Internacion;
use Livewire\Component;

class MostrarInternos extends Component
{

    protected $listeners = ['eliminarPaciente'];

    // public function eliminarPaciente(Uci $uci)
    // {
    //     $uci->delete();
    // }


    public function render()
    {
        $pacientes = Internacion::all();
        return view('livewire.mostrar-internos',[
            'pacientes'=>$pacientes,
        ]);
    }
}
