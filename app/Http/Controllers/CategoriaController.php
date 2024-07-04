<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        Categoria::create([
            'nombre' => $request->nombre,
        ]);

        return redirect()->back()->with('success', 'Categoría agregada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_categoria)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $categoria = Categoria::findOrFail($id_categoria);
        $categoria->nombre = $request->nombre;
        $categoria->save();

        return redirect()->back()->with('success', 'Categoría actualizada correctamente.');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_categoria)
    {
        $categoria = Categoria::findOrFail($id_categoria);
        $categoria->delete();

        return redirect()->back()->with('success', 'Categoría eliminada correctamente.');
 
    }
}
