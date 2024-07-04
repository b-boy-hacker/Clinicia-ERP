<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConsultaMedica;
use Illuminate\Support\Facades\Auth;
use App\Models\Consultorio;
use App\Models\Horario;
use App\Models\EquipoMedico;
use App\Models\Servicio;
use Illuminate\Support\Facades\DB;


class ConsultaMedicaControlador extends Controller
{
    private $horarioId;
    
    public function guardarCita(Request $request)
    {
        try {
            $horarioId = $request->input('horarioId');
            $fecha = $request->input('fecha');
            $idPaciente = Auth::id();
            $idEspecialidad = $request->input('idEspecialidad');
            $idMedico = $request->input('idmedico');

            $consultorio = DB::table('consultorio')
                ->select('id')
                ->where('id_medico', $idMedico)
                ->first();

            if (!$consultorio) {
                return response()->json(['error' => 'Consultorio no encontrado'], 404);
            }

            ConsultaMedica::create([
                'fecha' => $fecha,
                'id_paciente' => $idPaciente,
                'id_especialidad' => $idEspecialidad,
                'id_consultorio' => $consultorio->id,
                'id_medico'=>$idMedico,
                'id_horario' =>$horarioId
            ]);

            // Eliminar el horario reservado
            DB::table('medico_horarios')->where('id', $horarioId)->delete();

            return response()->json(['message' => 'Cita guardada correctamente']);
        } catch (\Exception $e) {
            \Log::error('Error al guardar la cita: ' . $e->getMessage());
            return response()->json(['error' => 'Error al guardar la cita: ' . $e->getMessage()], 500);
        }
    }
    public function obtenerConsultaMedica()
    {
         // Obtener el ID del paciente logueado
             $idPaciente = Auth::id();
            $consulta = DB::table('consulta_medica')
            ->join('users', 'consulta_medica.id_paciente', '=', 'users.id')
            ->join('especialidads', 'consulta_medica.id_especialidad', '=', 'especialidads.id')
            ->leftJoin('consultorio', 'consulta_medica.id_consultorio', '=', 'consultorio.id')
            ->select('consulta_medica.id', 'consulta_medica.fecha', 'users.nombres as nombre_usuario', 'especialidads.nombre as nombre_especialidad', 'consultorio.nombre as nombre_consultorio')
            ->where('consulta_medica.id_paciente', $idPaciente)
            ->get();
       /*        // Realizar la consulta para obtener los datos del horario y el nombre del turno asociado
            $horario = DB::table('horarios')
            ->join('turnos', 'horarios.id_turno', '=', 'turnos.id')
            ->select('horarios.horaI', 'horarios.horaF', 'horarios.dia', 'turnos.nombre as nombre_turno')
            ->where('horarios.id', $this->horarioId)
            ->first();

               // Combinar los resultados de ambas consultas en un solo objeto
        $resultado = [
            'consulta' => $consulta,
            'horario' => $horario,
        ]; */

        return response()->json($consulta);
    }
    public function eliminarHorario($id)
    {
        try {
            DB::table('medico_horarios')->where('id', $id)->delete();
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            \Log::error('Error al eliminar el horario: ' . $e->getMessage());
            return response()->json(['error' => 'Error al eliminar el horario: ' . $e->getMessage()], 500);
        }
    }

    public function mostrar_vista (){
        
        $consultas=Consultorio::All();
        $consultamedicas=ConsultaMedica::All();
        return view('paciente.inicio',compact('consultas','consultamedicas'));
    }
    public function mostrarRecetas()
    {
        $usuario = Auth::user();
        $recetas = $usuario->recetasMedicas;
        return view('paciente.inicio', compact('recetas'));
    }

}