<?php

// App\Http\Controllers\FarmaciaController.php

namespace App\Http\Controllers;
use App\Models\Producto;
use Illuminate\Http\Request;

class FarmaciaController extends Controller
{
    public function productos()
    {
        // Lógica para obtener todos los productos de la farmacia
        $productos = Producto::All(); // Aquí deberías obtener los productos desde la base de datos o donde los tengas almacenados

        return view('farmacia.productos', compact('productos'));
    }
    public function pagoTarjeta (){
        return view('pago.tarjeta');
    }
    public function procesarPago(Request $request)
    {
        // Lógica para procesar el pago con los datos de la tarjeta
        $validatedData = $request->validate([
            'card_number' => 'required|numeric',
            'expiry_date' => 'required|date_format:m/y',
            'cvv' => 'required|numeric'
        ]);

        // Aquí puedes agregar la lógica para procesar el pago con un proveedor de pagos

        // Redirigir a una página de confirmación de pago
        return redirect()->route('confirmacion-pago');
    }
}