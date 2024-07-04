<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Proveedor;
use App\Models\PedidoCompra;
class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos= Producto::all();
        $categorias= Categoria::all();
        $proveedores= Proveedor::all();
        $pedidos= PedidoCompra::all();
        return view('admin.farmacia.index',
        compact('productos','categorias','proveedores',
        'pedidos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      //  dd($request->all());
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validación para archivos de imagen
            'fecha_expiracion' => 'nullable|date',
            'categoria_id' => 'nullable|exists:categorias,id',
        ]);

        $producto = new Producto();
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->stock = $request->stock;
        $producto->fecha_expiracion = $request->fecha_expiracion;
        $producto->categoria_id = $request->categoria_id;

        // Procesamiento y almacenamiento de la imagen si se proporciona
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            $rutaImagen = $imagen->storeAs('public/imagenes/productos', $nombreImagen);
            $producto->imagen_url = 'storage/imagenes/productos/' . $nombreImagen; // Guarda la URL en la base de datos
        }

        $producto->save();

        return redirect()->back()->with('success', 'Producto agregado correctamente.');
    }

    public function update(Request $request, $id)
    {
       // dd('Llega al controlador');
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'fecha_expiracion' => 'nullable|date',
            'categoria_id' => 'nullable|exists:categorias,id',
        ]);
    
        $producto = Producto::findOrFail($id);
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->stock = $request->stock;
        $producto->fecha_expiracion = $request->fecha_expiracion;
        $producto->categoria_id = $request->categoria_id;
    
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            $rutaImagen = $imagen->storeAs('public/imagenes/productos', $nombreImagen);
            $producto->imagen_url = 'storage/imagenes/productos/' . $nombreImagen;
        }
    
        $producto->save();
    
        return redirect()->back()->with('success', 'Producto actualizado correctamente.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $producto = Producto::findOrFail($id);
    $producto->delete();

    return redirect()->back()->with('success', 'Producto eliminado correctamente.');
}

}