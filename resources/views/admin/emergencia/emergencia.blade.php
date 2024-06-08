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
    @if (session()->has('message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
            {{ session()->get('message') }}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <h1>Lista de emergencias</h1>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCrearEmergencia">
        Agregar sala de emergencia
    </button>

        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>ID</th> 
                    <th>Nombre</th> 
                    <th>Categoria</th> 
                    <th>Hora</th> 
                    <th>Fecha</th> 
                    <th>Paciente</th> 
                    <th>Medico</th> 
                    <th>Sala</th> 
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                 @foreach ($emergencia as $emergencias)
                <tr>
                    <td>{{$emergencias->id}}</td>
                    <td>{{$emergencias->nombre}}                    
                    <td>{{$emergencias->categoriaEmergencia->nombre}}
                    <td>{{$emergencias->hora}}
                    <td>{{$emergencias->fecha}}
                    <td>{{$emergencias->paciente->nombres}}
                    <td>{{$emergencias->medico->nombres}}
                    <td>{{$emergencias->salaEmergencia->nombre}}                        
                    <td> 
                            <button href="{{url('editar_emergencia', $emergencias->id)}}" type="button" 
                                        class="btn btn-warning" data-toggle="modal"
                                        data-target="#modalEditarEmergencia-{{ $emergencias->id }}" 
                                        >                           
                                    Editar
                            </button>
    
                        
                            <form action="{{ url('borrar_emergencia', $emergencias->id) }}" method="POST"
                                style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Está seguro de eliminar?')">
                                    Eliminar
                                </button>
                            </form>
                               @include('admin.emergencia.modalEditarEmergencia')                               
                    </td>    
                </tr>
                @endforeach   
            </tbody>
        </table>
    
    @include('admin.emergencia.modalCrearEmergencia')
</div>
@stop

