<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SalaEmergencia;
use App\Models\EquipoMedico;
use App\Models\Categoria_Emergencia;
use App\Models\User;
use App\Models\UsuarioRol;
use App\Models\Emergencia;


class EmergenciaController extends Controller
{
    public function sala_emergencia(){
        $sala = SalaEmergencia::all();
        $equipo = EquipoMedico::all();
        return view('admin.emergencia.salaEmergencia',
             compact('sala', 'equipo'));
    }

    public function crearSalaEmergencia(Request $request){
        $sala = new SalaEmergencia;
        $sala->nombre = $request->nombre;
        $sala->estado = $request->estado;
        $sala->equipo_id = $request->equipo_id;
        $sala->save();
        return redirect()->back()->with('message','agregado exitosanmente');
    }
    
    public function borrar_sala($id){
        $borrar = SalaEmergencia::find($id);
        $borrar->delete();
        return redirect()->back()->with('message','eliminado exitosanmente');
    }

    public function editar_sala (Request $request, $id){
        $sala = SalaEmergencia::find($id);
        $sala->nombre = $request->nombre;
        $sala->estado = $request->estado;
        $sala->equipo_id = $request->equipo_id;
        $sala->save();      
        return redirect()->back()->with('message','actualizado exitosanmente');
    }

    public function categoria_emergencia(){
        $categoria = Categoria_Emergencia::all();
        return view('admin.emergencia.categoriaEmergencia',
             compact('categoria',));
    }

    public function crearCategoriaEmergencia(Request $request){
        $categoria = new Categoria_Emergencia;
        $categoria->nombre = $request->nombre;
        
        $categoria->save();
        return redirect()->back()->with('message','agregado exitosanmente');
    }

    public function editar_categoria (Request $request, $id){
        $categoria = Categoria_Emergencia::find($id);
        $categoria->nombre = $request->nombre;
        $categoria->save();
        return redirect()->back()->with('message','actualizado exitosanmente');
    }

    public function borrar_categoria($id){
        $borrar = Categoria_Emergencia::find($id);
        $borrar->delete();
        return redirect()->back()->with('message','eliminado exitosanmente');
    }

    public function emergencia(){
        $usuario = User::all();
        $emergencia = Emergencia::all();
        $paciente = UsuarioRol::where('rol_id', 3)->get(); 
        $medico = UsuarioRol::where('rol_id', 2)->get(); 
        $sala = SalaEmergencia::all();
        $categoria = Categoria_Emergencia::all();

        return view('admin.emergencia.emergencia',
             compact('emergencia','paciente','medico', 'sala', 'categoria', 'usuario'));
    }

    public function crearEmergencia(Request $request){
        $emergencia = new Emergencia;
        $emergencia->nombre = $request->nombre;
        $emergencia->fecha = $request->fecha;
        $emergencia->hora = $request->hora;
        $emergencia->paciente_id = $request->paciente_id;
        $emergencia->medico_id = $request->medico_id;
        $emergencia->sala_id = $request->sala_id;
        $emergencia->catEmergencia_id = $request->catEmergencia_id;

        $emergencia->save();
        return redirect()->back()->with('message','agregado exitosanmente');
    }

    public function editar_emergencia (Request $request, $id){
        $emergencia = Emergencia::find($id);
        $emergencia->nombre = $request->nombre;
        $emergencia->fecha = $request->fecha;
        $emergencia->hora = $request->hora;
        $emergencia->paciente_id = $request->paciente_id;
        $emergencia->medico_id = $request->medico_id;
        $emergencia->sala_id = $request->sala_id;
        $emergencia->catEmergencia_id = $request->catEmergencia_id;    
        $emergencia->save();
        return redirect()->back()->with('message','actualizado exitosanmente');
    }

    public function borrar_emergencia($id){
        $borrar = Emergencia::find($id);
        $borrar->delete();
        return redirect()->back()->with('message','eliminado exitosanmente');
    }
}
