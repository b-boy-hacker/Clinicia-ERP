<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HorarioAPIController extends Controller
{
    public function obtenerHorarios()
    {
        $horarios = DB::table('horario')->get(); // Aquí puedes obtener los horarios desde tu base de datos u otra fuente
        $turnos = DB::table('turno')->get();
        return response()->json($horarios,$turnos);
    }
}
