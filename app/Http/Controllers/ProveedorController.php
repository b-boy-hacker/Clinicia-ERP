<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;
class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    
    public function store(Request $request)
    {
        Proveedor::create($request->all());
        return redirect()->back()->with('success', 'Proveedor agregado correctamente.');
    }

    public function update(Request $request, $id)
    {
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->update($request->all());
        return redirect()->back()->with('success', 'Proveedor actualizado correctamente.');
    }

    public function destroy($id)
    {
        Proveedor::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Proveedor eliminado correctamente.');
    }
        
}