<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PedidoCompra;
class PedidoController extends Controller
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
        PedidoCompra::create($request->all());
        return redirect()->back()->with('success', 'Pedido agregado correctamente.');
    }

    public function update(Request $request, $id)
    {
        $pedido = PedidoCompra::findOrFail($id);
        $pedido->update($request->all());
        return redirect()->back()->with('success', 'Pedido actualizado correctamente.');
    }

    public function destroy($id)
    {
        PedidoCompra::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Pedido eliminado correctamente.');
    }
}