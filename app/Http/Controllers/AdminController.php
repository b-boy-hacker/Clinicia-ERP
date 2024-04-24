<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth; 
use App\Models\User;
use App\Models\Rol;
use App\Models\Servicio;
use App\Models\Especialidad;
use App\Models\EspecialidadMediaco;




class AdminController extends Controller
{
    public function bienvenido(){
        return view('inicio.bienvenido');
    }

    public function redirigir(){
        $usertype = Auth::user()->usertype;
        if ($usertype == '1'){
            return view('admin.inicio'); // Redirige al usuario a la ruta definida como 'admin.home'
        }
        if ($usertype == '2'){
            return view('medico.inicio'); // Redirige al usuario a la ruta definida como 'admin.home'
        }
        if ($usertype == '3'){
            return view('paciente.inicio'); // Redirige al usuario a la ruta definida como 'paciente.home'
        }
       
    }

    public function mostrar_usuario(){
         $usuario = User::all(); // Suponiendo que Profesor es el modelo que representa la tabla de profesores
        $rol = Rol::all();
         return view('admin/usuario.mostrar_usuario', compact('usuario', 'rol'));
    }

    public function crear_usuario(){
        $usuario = User::all();
        $rol = Rol::all();
        return view('admin/usuario.crear_usuario', compact('usuario', 'rol'));
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
        $usuario->apellidos= $request->apellidos;
        $usuario->telefono= $request->telefono;
        $usuario->direccion= $request->direccion;
        $usuario->sexo= $request->sexo;
        $usuario->rol= $request->rol;
        $usuario->usertype= $request->usertype;
        $usuario->email= $request->email;
        $usuario->password = bcrypt($request->password);
        $usuario->save();
        return redirect()->back()->with('message','agregado exitosanmente');
    }

    public function mostrar_medico(){
      // Filtra los usuarios cuyo tipo de usuario sea "2"
        $usuario = User::where('usertype', 2)->get(); 
    
    // Retorna la vista con los usuarios filtrados
        return view('admin.medico.mostrar_medico', ['usuario' => $usuario]);
    }
   

   public function mostrar_paciente(){
    $usuario = User::where('usertype', 3)->get(); 
    
    // Retorna la vista con los usuarios filtrados
        return view('admin.paciente.mostrar_paciente', ['usuario' => $usuario]);
    }

//-------------------------------------------------------------------------------

    public function mostrar_especialidad(){
    $especialidad = Especialidad::all(); 
    // Retorna la vista con los usuarios filtrados
        return view('admin.especialidad.mostrar_especialidad', compact(
            'especialidad'
        ));//, ['usuario' => $usuario]);
    }
    
   
    public function ruta_especialidad(){
        return view('admin/especialidad.crear_especialidad');
    }

    public function crear_especialidad(Request $request){
        $especialidad=new Especialidad;
        $especialidad->nombre = $request->nombre;
        $especialidad->save();
     return redirect()->back()->with('message','agregado exitosanmente');
    }

    // public function actualizar_materia($id){
    //     $materia = Materia::find($id);
    //     return view('admin/materia.actualizar_materia', compact('materia'));
    // }

    // public function confirmar_materia (Request $request, $id){
    //     $materia = Materia::find($id);   
    //     $materia->Nombre = $request->Nombre;      
    //     $materia->save();      
    //     return redirect()->back()->with('message','actualizado exitosanmente');
    // }
    // public function borrar_materia($id){
    //     $borrar = Materia::find($id);
    //     $borrar->delete();
    //     return redirect()->back()->with('message','eliminado exitosanmente');
    // }
    // public function crear_especialidad(Request $request){
    //     $especialidad = new EspecialidadMediaco;
    //     $especialidad->medico_id = $request->padre_id;
    //     $especialidad->especialidad_id = $request->hijo_id;
    //     $especialidad->save();   
    //     return redirect()->back()->with('message', 'Agregado exitosamente');
    // }

    
}
