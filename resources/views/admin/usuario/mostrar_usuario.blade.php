@extends('adminlte::page')
@section('title', 'agenda-escolar')

@section('content_header')
    <style type="text/css">
        .div_center{
            color: black; 
            text-align: center;
            font-weight: bold;
            font-size: 25px;
        }

        table {
            width: 10px;
            border: 1px solid #000;
            margin: auto;
        }
        th, td {
            width: 15%;
            text-align: left;
            vertical-align: top;
            border: 1px solid #000;
            border-collapse: collapse;
            padding: 0.3em;
            caption-side: bottom;
        }
        caption {
            padding: 0.3em;
            color: #fff;
                background: #c84747;
        }
        th {
            background: #3A4546;
        }
        .th_deg{
            color: whitesmoke;
        }

        .th_degA{
            color: whitesmoke;
            text-align: center
        }
    </style>

<div class="row justify-content-center">
    <div class="col-md-4" style="margin-top: 10px;">
        <a class="btn btn-primary btn-block" href="{{url('crear_usuario')}}">Crear usuario</a>
    </div>
    
</div>



@stop


@section('content')
<div class="div_center">
    <p>Lista de usuarios</p>
</div>
    @if (session()->has('message'))
                <div class="alert alert-success">
                                <button type="button" class="close"
                                          data-dismiss="alert" aria-hidden="true">
                                       X
                                  </button>
                                      {{session()->get('message')}}
                             </div>
            @endif
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th class="th_deg" scope="col">ID</th>
                <th class="th_deg" scope="col">Nombre Completo</th>
                <th class="th_deg" scope="col">Correo</th>
                <th class="th_deg" scope="col">tipo</th>
                <th class="th_deg" scope="col">rol</th>
                {{-- <th class="th_degA" scope="col">Acciones</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($usuario as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->nombres}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->usertype}}</td>
                <td>{{$user->rol}}</td>


                {{-- <td>
                    <div style="display: flex; justify-content: space-between;">
                        <a class="btn btn-warning" href="{{url('actualizar_profesor', $profesor->id)}}">editar</a>
                        <a class="btn btn-danger" onclick="return confirm('¿Estás seguro?')"
                           href="{{url('borrar_profesor', $profesor->id)}}">eliminar</a>
                    </div>
                </td>                         --}}
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


            

@stop 