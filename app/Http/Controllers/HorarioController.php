<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Horario;
use App\Models\Turno;

use Illuminate\Support\Facades\DB;

class HorarioController extends Controller
{
    public function mostrarVista()
    {
        $horarios = DB::table('horario')->get();
        $turnos = DB::table('turno')->get();
        return view('admin.servicio.horario',compact('horarios','turnos'));
    }
    public function storeTurno(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required',
    
        ]);

        // Crear un nuevo horario con los datos proporcionados
        $turno = new Turno();
        $turno->nombre = $request->nombre;
        $turno->save();

        // Retornar una respuesta
        return redirect()->route('horario.mostrarVista')->with('success', 'Turno creado con éxito.');

        
    }
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'horaI' => 'required',
            'horaF' => 'required',
            'dia' => 'required'
        ]);

        // Crear un nuevo horario con los datos proporcionados
        $horario = new Horario();
        $horario->horaI = $request->horaI;
        $horario->horaF = $request->horaF;
        $horario->dia = $request->dia;
        $horario->save();

        // Retornar una respuesta
        return response()->json(['message' => 'Horario creado exitosamente'], 201);

    }
    public function destroyTurno($id)
    {
        $turno = Turno::findOrFail($id);
        $turno->delete();
        return redirect()->route('horario.mostrarVista')->with('success', 'Turno eliminado con éxito.');
    }
    public function destroy($id)
    {
        $horario = Horario::findOrFail($id);
        $horario->delete();
        return redirect()->route('horario.mostrarVista')->with('success', 'horario eliminado con éxito.');
    }
   
}
