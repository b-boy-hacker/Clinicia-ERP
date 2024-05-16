<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\consultaMedica;
use App\Models\Especialidad;
use App\Models\EspecialidadMedico;
use App\Models\MedicoHorario;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConsultaController extends Controller
{
    public function getEspecialidades()
    {
        $especialidades = Especialidad::all();
        return response($especialidades);
    }
    public function getMedicoToEspecialidad(Request $request)
    {
        $especialidadId = $request->especialidad_id;

        // Realizar la consulta para obtener los nombres e IDs de los médicos
        $medicos = User::whereIn('id', function($query) use ($especialidadId) {
            $query->select('id_medico')
                ->from('medico_horarios')
                ->join('especialidads', 'especialidads.id', '=', 'medico_horarios.id_especialidades')
                ->where('especialidads.id', $especialidadId);
        })->select('id', 'nombres')->get();

        // Devolver los médicos en formato JSON

        return response($medicos);
    }

    public function getHorarioToMedico(Request $request)
    {
        $medicoId = $request->medico_id;

        $horarios = MedicoHorario::join('horarios', 'medico_horarios.id_horario', '=', 'horarios.id')
            ->join('turnos', 'horarios.id_turno', '=', 'turnos.id')
            ->where('medico_horarios.id_medico', $medicoId)
            ->select('horarios.horaI', 'horarios.horaF', 'horarios.dia', 'turnos.nombre')
            ->get();


        return response($horarios);
    }

    public function pay(Request $request){
        try {
            consultaMedica::create([
                'fecha'=> Carbon::now(),
                'id_paciente'=> $request->paciente_id,
                'id_especialidad'=> $request->especialidad_id,
    
            ]);
            return response(['suecces' => true], 200);
        } catch (\Throwable $th) {
            return response(['message' => $th->getMessage()], 404);
        }
    }

    public function getConsultas(Request $request){
       $consultas = DB::table('consulta_medica')
       ->join('especialidads', 'consulta_medica.id_especialidad', '=', 'especialidads.id')
       ->select('consulta_medica.id', 'especialidads.nombre', 'consulta_medica.fecha')
       ->where('consulta_medica.id_paciente', $request->paciente_id)
       ->get();





       return response($consultas,200);
    }
}
