<?php

namespace App\Http\Controllers;


use App\Models\ConsultaMedica;
use App\Models\EstadoConsulta;
use App\Models\RecetaMedica;
use App\Models\Laboratorio;
use Illuminate\Http\Request;

class MedicoController extends Controller
{
    public function index()
    {
        // Obtener las consultas médicas que no están finalizadas
        $consultasM = ConsultaMedica::with(['paciente', 'especialidad', 'consultorio', 'medico', 'estadoActual'])
            ->get()
            ->filter(function ($consulta) {
                return $consulta->estadoActual && $consulta->estadoActual->estado != 'finalizado';
            });

        return view('medico.inicio', compact('consultasM'));
    }
    public function updateEstado(Request $request, $id)
    {
        $consulta = ConsultaMedica::findOrFail($id);

        // Crear un nuevo estado para la consulta
        EstadoConsulta::create([
            'consulta_medica_id' => $consulta->id,
            'estado' => $request->input('estado'),
        ]);

        return redirect()->back()->with('success', 'Estado actualizado correctamente.');
    }
    public function storeReceta(Request $request, $id)
    {
        $consulta = ConsultaMedica::findOrFail($id);

        // Crear una nueva receta para la consulta
        RecetaMedica::create([
            'consulta_medica_id' => $consulta->id,
            'descripcion' => $request->input('descripcion'),
        ]);

        return redirect()->back()->with('success', 'Receta añadida correctamente.');
    }
    public function updateReceta(Request $request, $id)
    {
        $receta = RecetaMedica::findOrFail($id);
        $receta->descripcion = $request->descripcion;
        $receta->save();

        return redirect()->back()->with('success', 'Receta actualizada correctamente.');
    }
    public function storeLaboratorio(Request $request, $id)
{
    // Valida los datos de la solicitud
    $request->validate([
        'descripcion' => 'required|string|max:255',
    ]);

    try {
        // Encuentra la consulta médica por su ID
        $consulta = ConsultaMedica::findOrFail($id);

        // Crea la nueva solicitud de laboratorio y asigna el consulta_medica_id
        Laboratorio::create([
            'consulta_medica_id' => $consulta->id,
            'descripcion' => $request->descripcion,
        ]);

        return redirect()->back()->with('success', 'Solicitud de laboratorio agregada correctamente.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Ocurrió un error al procesar la solicitud.');
    }
}


}