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
        // $usertype = Auth::user()->usertype;
        // if ($usertype == '1'){
        //     return view('admin.inicio'); // Redirige al usuario a la ruta definida como 'admin.home'
        // }
        // if ($usertype == '2'){
        //     return view('medico.inicio'); // Redirige al usuario a la ruta definida como 'admin.home'
        // }
        // if ($usertype == '3'){
        //     return view('paciente.inicio'); // Redirige al usuario a la ruta definida como 'paciente.home'
        // }
        return view('admin.inicio');
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
   
    public function ver_esp_medico(){

        $especialidad =  Especialidad::all();
        $medico = UsuarioRol::where('rol_id', 2)->get(); 
        $espMed =  EspecialidadMedico::all();
        return view('admin.especialidad_medico.ver_esp_medico',compact('espMed','especialidad','medico'));//, ['usuario' => $usuario]);
    }

    public function crear_esp_medico(Request $request){
        $especialidad = new EspecialidadMedico;
        $especialidad->medico_id = $request->medico_id;
        $especialidad->especialidad_id = $request->especialidad_id;
        $especialidad->save();   
        return redirect()->back()->with('message', 'Agregado exitosamente');
    }
    
}
