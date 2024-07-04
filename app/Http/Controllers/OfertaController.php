<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OfertaController extends Controller
{
    public function ver_oferta(){
        return view('admin.ofertaServicio.ver_oferta');
    }

    public function crearOferta(){
        return view('admin.ofertaServicio.crear');
    }

    public function borrarOferta(){
        return view('admin.ofertaServicio.ver_oferta');
    }
    
    public function editarOferta(){
        return view('admin.ofertaServicio.ver_oferta');
    }
}
