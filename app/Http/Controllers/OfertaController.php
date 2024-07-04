<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Oferta;
use App\Models\Servicio;
use Illuminate\Support\Facades\Storage;

class OfertaController extends Controller
{
    public function ver_oferta(){
        $oferta= Oferta::all();
        $servicio = Servicio::all();
        return view('admin.ofertaServicio.ver_oferta', compact('oferta','servicio'));
    }

    public function crearOferta(Request $request)
{
    // Validar los datos de entrada
    $request->validate([
        'servicio' => 'required|string|max:255',
        'descripcion' => 'required|string',
        'precio' => 'required|numeric',
        'descuento' => 'nullable|numeric',
        'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // validación del archivo de imagen
    ]);

    // Crear una nueva instancia del modelo Oferta
    $oferta = new Oferta;
    $oferta->servicio = $request->servicio;
    $oferta->descripcion = $request->descripcion;
    $oferta->precio = $request->precio;
    $oferta->descuento = $request->descuento;

    // Verificar si el archivo de imagen fue subido
    if ($request->hasFile('imagen')) {
        $foto = $request->file('imagen');
        $imageName = time() . '.' . $foto->getClientOriginalExtension();
        $foto->move(public_path('oferta'), $imageName); // Mover la imagen a la carpeta 'public/oferta'
        $oferta->imagen = $imageName;
    }

    // Guardar la oferta en la base de datos
    $oferta->save();

    // Redirigir de vuelta con un mensaje de éxito
    return redirect()->back()->with('message', 'Agregado exitosamente');
}


    public function borrarOferta($id){
        $oferta = Oferta::find($id);
        $oferta->delete();
        return redirect()->back()->with('message','eliminado exitosanmente');
    }
    
    public function editarOferta(Request $request, $id){
        // Crear una nueva instancia del modelo Oferta
        $oferta=Oferta::find($id);
        $oferta->servicio = $request->servicio;
        $oferta->descripcion = $request->descripcion;
        $oferta->precio = $request->precio;
        $oferta->descuento = $request->descuento;

        // Verificar si el archivo de imagen fue subido
        if ($request->hasFile('imagen')) {
            $foto = $request->file('imagen');
            $imageName = time() . '.' . $foto->getClientOriginalExtension();
            $foto->move(public_path('oferta'), $imageName); // Mover la imagen a la carpeta 'public/oferta'
            $oferta->imagen = $imageName;
        }

        // Guardar la oferta en la base de datos
        $oferta->save();

        // Redirigir de vuelta con un mensaje de éxito
        return redirect()->back()->with('message', 'Agregado exitosamente');
    }
    //----------------------------------------------------
   
    public function mostrar_oferta()
    {
        $ofertas = Oferta::all();
        return view('ver_oferta.ver_oferta', compact('ofertas'));
    }

    
    
}
