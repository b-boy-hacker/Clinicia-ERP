<?php

namespace App\Http\Controllers;
// namespace  App\Http\Controllers\AuthController;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth; 
use App\Models\User;
use App\Models\Rol;
use App\Models\UsuarioRol;
use App\Models\Servicio;
use App\Models\Especialidad;
use App\Models\EspecialidadMedico;
use App\Models\Consultorio;
use App\Models\ConsultaMedica;
use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Horario;
use App\Models\RecetaMedica;
use App\Models\MedicoHorario;
use App\Models\EstadoConsulta;
use App\Models\Laboratorio;
use App\Models\Bitacora;
use Carbon\Carbon;

use Barryvdh\DomPDF\Facade\Pdf;

use TCPDF;
use Illuminate\Support\Facades\DB;
// use Barryvdh\DomPDF\Facade as PDF;



class AdminController extends Controller
{
    public function bienvenido(){
        return view('inicio.bienvenido');
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Cierra la sesión del usuario
        $request->session()->invalidate(); // Invalida la sesión
        $request->session()->regenerateToken(); // Regenera el token de sesión

        return view('/inicio.bienvenido'); // Redirige al usuario a la página de inicio de sesión
    }

    public function redirigir(){
        // Obtener el ID del usuario actualmente autenticado
        $userId = auth()->user()->id;
    
        // Obtener el registro UsuarioRol correspondiente al usuario actual
        $usuarioRol = UsuarioRol::where('usuario_id', $userId)->first();
    
        // Verificar si se encontró un registro UsuarioRol para el usuario actual
        if ($usuarioRol) {
            // Obtener el ID del rol del usuario actual
            $rolId = $usuarioRol->rol_id;
    
            // Redirigir al usuario según su rol
            if ($rolId == 1){
                return view('admin.inicio'); // Redirige al usuario a la vista de administrador
            }
            elseif ($rolId == 2){
                // Obtener las consultas médicas que no están finalizadas
                $medicoId = Auth::id();

                $consultas = ConsultaMedica::whereHas('consultorio', function ($query) use ($medicoId) {
                    $query->where('id_medico', $medicoId);
                })->get();
                
                 return view('medico.inicio', ['consultas' => $consultas]);
                //return view('medico.inicio',compact('consultas')); // Redirige al usuario a la vista de médico
            }
            elseif ($rolId == 3){
                $consultas=Consultorio::All();
                $consultamedicas=ConsultaMedica::All();
                $especialidades=Especialidad::All();
                $medicos = UsuarioRol::where('rol_id', 2)->get(); 
                $horarios=Horario::All();

               
                $pacienteId = Auth::id();
               // $paciente = Paciente::with('laboratorios')->find($pacienteId);
               $user = Auth::user();
                // Obtiene las recetas médicas del paciente autenticado
                $recetas = RecetaMedica::whereHas('consultaMedica', function ($query) use ($pacienteId) {
                    $query->where('id_paciente', $pacienteId);
                })->get();
                $laboratorios = Laboratorio::where('id', $user->id)->get();
                // return view('paciente.inicio', compact('recetas'));
                return view('paciente.inicio',compact('laboratorios','especialidades','medicos','horarios','recetas')); // Redirige al usuario a la vista de paciente
            }
        }
        
        // Si no se encuentra un registro UsuarioRol, o el rol no coincide con ninguno de los roles especificados, redirigir a una vista predeterminada
        return view('admin.inicio');
    }
    

    public function mostrarLaboratorios()
    {
        // Obtener el usuario autenticado
        $user = Auth::user();

        // Obtener los laboratorios del usuario autenticado a través de sus consultas médicas
        $laboratorios = Laboratorio::whereHas('consultaMedica', function ($query) use ($user) {
            $query->where('id_paciente', $user->id);
        })->get();

        // Pasar los laboratorios a la vista
        return view('paciente.inicio', ['laboratorios' => $laboratorios]);
    }
    public function obtenerMedicos(Request $request)
    {
        $especialidadId = $request->input('especialidad_id');

        // Realizar la consulta para obtener los nombres e IDs de los médicos
        $medicos = User::whereIn('id', function($query) use ($especialidadId) {
            $query->select('id_medico')
                ->from('medico_horarios')
                ->join('especialidads', 'especialidads.id', '=', 'medico_horarios.id_especialidades')
                ->where('especialidads.id', $especialidadId);
        })->select('id', 'nombres')->get();

        // Devolver los médicos en formato JSON
        return response()->json($medicos);
    }


    public function obtenerHorarios(Request $request)
    {
        $medicoId = $request->input('medico_id');

        // Agregar una declaración de depuración para verificar el ID del médico
        \Log::info('ID del médico recibido:', ['medico_id' => $medicoId]);

        // Realizar la consulta para obtener los horarios disponibles para el médico seleccionado
        $horarios = MedicoHorario::join('horarios', 'medico_horarios.id_horario', '=', 'horarios.id')
            ->join('turnos', 'horarios.id_turno', '=', 'turnos.id')
            ->where('medico_horarios.id_medico', $medicoId)
            ->select('horarios.id','horarios.horaI', 'horarios.horaF', 'horarios.dia', 'turnos.nombre')
            ->get();
            $horariosArray = $horarios->toArray();
        // Agregar una declaración de depuración para verificar los horarios obtenidos
        \Log::info('Horarios obtenidos:', $horariosArray);

        // Devolver los horarios en formato JSON
        return response()->json($horarios);
    }

    public function otraManera()
    {
        // Obtener el usuario actual
        $user = Auth::user();

        // Verificar si el usuario es administrador
        if ($user->tieneRol(1)) { // Suponiendo que 1 es el ID del rol de administrador
            return view('admin.inicio');
        } 
        // Verificar si el usuario es médico
        elseif ($user->tieneRol(2)) { // Suponiendo que 2 es el ID del rol de médico
            return view('medico.inicio');
        } 
        // Verificar si el usuario es paciente
        elseif ($user->tieneRol(3)) { // Suponiendo que 3 es el ID del rol de paciente
            return view('paciente.inicio');
        }

        // Si el usuario no tiene un rol específico, puedes redirigirlo a una vista predeterminada
        return view('admin.inicio');
    }

    // Dentro del modelo de Usuario (User)
    public function tieneRol($rolId)
    {
        return $this->usuario_rols()->where('id', $rolId)->exists();
    }



    public function index() {
        // Aquí puedes agregar lógica para mostrar una lista de recursos si es necesario
        $usuario = User::all(); // Suponiendo que Profesor es el modelo que representa la tabla de profesores
        $rol = Rol::all();
         return view('admin/usuario/mostrar_usuario', compact('usuario', 'rol'));
    }

    // public function mostrar_usuario(){
    //     $usuario = User::all(); // Suponiendo que Profesor es el modelo que representa la tabla de profesores
    //     $rol = Rol::all();
    //      return view('mostrar_usuario.usuario.mostrar_usuario', compact('usuario', 'rol'));
    // }


    public function crear_usuario(){
        $usuario = User::all();
        //$rol = Rol::all();
        return view('admin/usuario/crear_usuario', compact('usuario'));
    }
    
   
    public function crear_nuevo_usuario(Request $request){
        $existingUsuario = User::where('id', $request->id)->first();
    
        // Si el ID ya existe, devuelve un mensaje de error
        if ($existingUsuario) {
            return redirect()->back()->with('error', 'El ID ya está en uso. Por favor, elige otro ID.');
        }
    
        $usuario=new User;
        $usuario->id= $request->id;
        $usuario->ci= $request->ci;
        $usuario->nombres= $request->nombres;
        $usuario->apellido_paterno= $request->apellido_paterno;
        $usuario->apellido_materno= $request->apellido_materno;
        $usuario->telefono= $request->telefono;
        $usuario->direccion= $request->direccion;
        $usuario->sexo= $request->sexo;
        $usuario->email= $request->email;
        $usuario->password = bcrypt($request->password);
        $usuario->save();
        return redirect()->back()->with('message','agregado exitosanmente');
    }

    public function editar_Usuario(Request $request, $id) {
        $usuario = User::find($id);       
        $usuario->id= $request->id;
        $usuario->ci= $request->ci;
        $usuario->nombres= $request->nombres;
        $usuario->apellido_paterno= $request->apellido_paterno;
        $usuario->apellido_materno= $request->apellido_materno;
        $usuario->telefono= $request->telefono;
        $usuario->direccion= $request->direccion;
        $usuario->sexo= $request->sexo;
        $usuario->email= $request->email;
        $usuario->password = bcrypt($request->password);
        $usuario->save();
        return redirect()->back()->with('message','agregado exitosanmente');
    }

    public function borrar_Usuario($id){
        $borrar = User::find($id);
        $borrar->delete();
        return redirect()->back()->with('message','eliminado exitosanmente');
    }
//-------------------------------------------------------------------------------

    public function rol(){
        $usuario = User::all();
        $rol = Rol::all();
        $usuario_rol = UsuarioRol::all();
        return view('admin/rol/rol', compact('usuario', 'rol', 'usuario_rol'));
    }

    public function asignar_rol(Request $request){
        $usuario_rol = new UsuarioRol;
        $usuario_rol->usuario_id = $request->usuario_id;
        $usuario_rol->rol_id = $request->rol_id;
        $usuario_rol->save();
        return redirect()->back()->with('message','agregado exitosanmente');
    }

    public function editar_UserRol(Request $request, $id) {
        // Busca el registro de UsuarioRol por su ID
        $usuario_rol = UsuarioRol::find($id);   
        // Actualiza los campos con los datos del formulario
        $usuario_rol->usuario_id = $request->usuario_id;
        $usuario_rol->rol_id = $request->rol_id;
        // $usuario_rol = UsuarioRol::orderBy('id', 'asc')->get();
        // Guarda los cambios en la base de datos
        $usuario_rol->save();
    
        // Redirige de vuelta a la página anterior con un mensaje de éxito
        return redirect()->back()->with('message', '¡Actualizado exitosamente!');
    }
    
    public function borrar_UserRol($id){
        $borrar = UsuarioRol::find($id);
        $borrar->delete();
        return redirect()->back()->with('message','eliminado exitosanmente');
    }


//-------------------------------------------------------------------------------
    public function mostrar_medico(){
        $medico = UsuarioRol::where('rol_id', 2)->get(); 
        return view('admin.medico.mostrar_medico', ['medico' => $medico]);
    }

   public function mostrar_paciente(){
        $paciente = UsuarioRol::where('rol_id', 3)->get(); 
        return view('admin.paciente.mostrar_paciente', ['paciente' => $paciente]);
    }
//-------------------------------------------------------------------------------

    public function mostrar_especialidad(){
        $especialidad = Especialidad::all();
        return view('admin.especialidad.mostrar_especialidad', compact('especialidad'));//, ['usuario' => $usuario]);
    }
    
    public function crear_especialidad(Request $request){
        $especialidad=new Especialidad;
        $especialidad->nombre = $request->nombre;
        $especialidad->save();
     return redirect()->back()->with('message','agregado exitosanmente');
    }

    public function editar_especialidad (Request $request, $id){
        $especialidad = Especialidad::find($id);   
        $especialidad->nombre = $request->nombre;      
        $especialidad->save();      
        return redirect()->back()->with('message','actualizado exitosanmente');
    }

    public function borrar_especialidad($id){
        $borrar = Especialidad::find($id);
        $borrar->delete();
        return redirect()->back()->with('message','eliminado exitosanmente');
    }
//-------------------------------------------------------------------------------
public function ver_esp_medico(){
    $especialidad =  Especialidad::all();
    $medico = UsuarioRol::where('rol_id', 2)->get(); 
    $espMed =  EspecialidadMedico::all();
    $bitacora= Bitacora::all();
    return view('admin.especialidad_medico.ver_esp_medico',
    compact('espMed','especialidad','medico','bitacora'));//, ['usuario' => $usuario]);
}


public function bitacora()
    {
        $bitacora = Bitacora::all();
        $especialidad = EspecialidadMedico::all();

        return view('admin.bitacora.bitacora', compact('bitacora', 'especialidad'));
    }

public function crear_esp_medico(Request $request){
    $especialidad = new EspecialidadMedico;
    $especialidad->nombres = $request->nombres;
    $especialidad->apellido_paterno = $request->apellido_paterno;
    $especialidad->apellido_materno = $request->apellido_materno;
    $especialidad->especialidad_id = $request->especialidad_id;
    $especialidad->save();  
    
    $bitacora = new Bitacora();
    $bitacora->descripcion = "Creación de Especialidad exitosa";
    
    $bitacora->usuario = $request->nombres;
    $bitacora->usuario_id = auth()->user()->id;
    $bitacora->direccion_ip = $request->ip();
    $bitacora->navegador = $request->header('user-agent');

    $bitacora->tabla = "Especialidad Medico";
    $bitacora->registro_id = $especialidad->id;
    $bitacora->fecha_hora = Carbon::now();
    $bitacora->save();
    return redirect()->back()->with('message', 'Agregado exitosamente');
}


    public function editar_esp_med (Request $request, $id){
        $especialidad = EspecialidadMedico::find($id);   
        $especialidad->nombres = $request->nombres;
        $especialidad->apellido_paterno = $request->apellido_paterno;
        $especialidad->apellido_materno = $request->apellido_materno;
        $especialidad->especialidad_id = $request->especialidad_id;
        $especialidad->save();      
        return redirect()->back()->with('message','actualizado exitosanmente');
    }
    public function borrar_esp_med($id){
        $borrar = EspecialidadMedico::find($id);
        $borrar->delete();
        return redirect()->back()->with('message','eliminado exitosanmente');
    }

    public function ver_farmacia(){
        return view('inicio.ver_farmacia');
    }

    public function pdf(){
        // Obtén solo los usuarios que tienen el rol de médico
        $usuariosMedicos = UsuarioRol::where('rol_id', 2)->with('user')->get(); 
        
        // Carga la vista 'pdf' y pasa la variable $usuariosMedicos
        $pdf = PDF::loadView('admin.medico.pdf', compact('usuariosMedicos')); 
        
        // Muestra el PDF en el navegador con el nombre 'medicos.pdf'
        return $pdf->stream('medicos.pdf'); 
    }
    
    public function pdf_paciente(){
        // Obtén solo los usuarios que tienen el rol de médico
        $usuariosPacientes = UsuarioRol::where('rol_id', 3)->get();
        
        // Carga la vista 'pdf' y pasa la variable $usuariosMedicos
        $pdf = PDF::loadView('admin.paciente.pdf_paciente', compact('usuariosPacientes')); 
        
        // Muestra el PDF en el navegador con el nombre 'medicos.pdf'
        return $pdf->stream('paciente.pdf_paciente'); 
    }


    public function generatePDF(Request $request)
    {
        $rol = $request->input('rol'); // Obtener el rol filtrado desde el request
        $atributos = $request->input('atributos', [
            'ci', 'nombres', 'apellido_paterno', 'apellido_materno', 'sexo', 'telefono', 'direccion', 'email'
        ]); // Obtener los atributos seleccionados (con valores por defecto)
        $fechaRegistro = $request->input('fecha_registro');
    
        // Construir la consulta SQL para obtener los usuarios según el rol
        $query = DB::table('users')
            ->join('usuario_rols', 'users.id', '=', 'usuario_rols.usuario_id')
            ->join('rols', 'usuario_rols.rol_id', '=', 'rols.id')
            ->where('rols.rol', $rol)
            ->select($atributos);
    
        // Aplicar filtro por fecha de registro si está definida
        if ($fechaRegistro) {
            $query->whereDate('users.created_at', '=', $fechaRegistro);
        }
    
        // Ejecutar la consulta
        $usuarios = $query->get();
    
        // Depurar para ver el contenido de $usuarios
        if ($usuarios->isEmpty()) {
            dd('No se encontraron usuarios con los filtros especificados.');
        }
    
        // Crear una nueva instancia de TCPDF
        $pdf = new TCPDF();
    
        // Configurar el documento PDF
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Tu Nombre');
        $pdf->SetTitle('Usuarios');
        $pdf->SetSubject('Listado de Usuarios');
        $pdf->SetKeywords('TCPDF, PDF, usuarios, listado');
    
        // Agregar una página
        $pdf->AddPage();
    
        // Crear el contenido del PDF
        $html = view('pdf.usuarios', compact('usuarios', 'atributos'))->render();
    
        // Escribir el contenido en el PDF
        $pdf->writeHTML($html, true, false, true, false, '');
    
        // Descargar el PDF
        $pdf->Output('usuarios.pdf', 'D');
    }


}
