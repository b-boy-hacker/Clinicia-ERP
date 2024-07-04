@extends('adminlte::page')

@section('title', 'Dashboard Administración')

@section('content_header')

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('/service/service.css') }}">
    <!-- CSS de Bootstrap -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- JS de Bootstrap (con Popper.js incluido) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@stop

    

@section('content')
<div class="container">
    
    <h1>Lista de Enfermeria</h1>
   
    @include('admin.usuario.modalCrear')

    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th class="th_deg" scope="col">ID</th>
                <th class="th_deg" scope="col">CI</th>
                <th class="th_deg" scope="col">Nombre</th>
                <th class="th_deg" scope="col">Apellido Paterno</th>
                <th class="th_deg" scope="col">Apellido Materno</th>
                <th class="th_deg" scope="col">Sexo</th>
                <th class="th_deg" scope="col">Telefono</th> 
                <th class="th_deg" scope="col">Direccion</th> 
                <th class="th_deg" scope="col">Correo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($enfermera as $usuarioEnfermera)
            <tr>
                <td>{{$usuarioEnfermera->user->id}}</td>
                <td>{{$usuarioEnfermera->user->ci}}</td>
                <td>{{$usuarioEnfermera->user->nombres}}</td>
                <td>{{$usuarioEnfermera->user->apellido_paterno}}</td>
                <td>{{$usuarioEnfermera->user->apellido_materno}}</td>
                <td>{{$usuarioEnfermera->user->sexo}}</td>
                <td>{{$usuarioEnfermera->user->telefono}}</td>
                <td>{{$usuarioEnfermera->user->direccion}}</td>
                <td>{{$usuarioEnfermera->user->email}}</td>
            </tr>
            @endforeach 
        </tbody>
    </table>
</div>

@stop