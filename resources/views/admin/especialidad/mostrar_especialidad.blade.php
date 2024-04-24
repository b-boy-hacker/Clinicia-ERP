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
            max-width: 60%;
            border: 1px solid #000;
            margin: auto;
        }
        th, td {
            width: 20%;
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
<div style="text-align: center;">
    <div style="color: white; display: inline-block;">
        <a class="btn btn-primary" href="{{url('ruta_especialidad')}}">crear especialidad</a>
        {{--  --}}
    </div>
</div>


<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">

            @if (session()->has('message'))
                <div class="alert alert-success">
                                <button type="button" class="close"
                                          data-dismiss="alert" aria-hidden="true">
                                       X
                                  </button>
                                      {{session()->get('message')}}
                             </div>
            @endif



            {{-- <p class="font_size">CREAR PROFESOR</p>    --}}
            <div class="div_center">

                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                   {{-- {{ url('/crear_curso_alumno') }} --}}
                    {{-- <div class="div_design">
                        <label class="text-align:center;">Nombre del Curso</label>
                        <select class="text_color" name="curso_id" required="">
                            <option value="" selected="">Seleccionar curso...</option>
                            @foreach ($curso as $aula)
                                <option value="{{ $aula->id}}"> 
                                    id: {{ $aula->id }} - {{ $aula->Grado }}
                                </option>
                            @endforeach  
                        </select>
                    </div> 
                    <div class="div_design">
                        <label class="text-align:center;">Nombre del Alumno</label>
                        <select class="text_color" name="alumno_id" required="">
                            <option value="" selected="">Seleccionar curso...</option>
                            @foreach ($alumno as $estudiante)
                                <option value="{{ $estudiante->id}}"> 
                                    id: {{ $estudiante->id }} - {{ $estudiante->Nombre }} {{$estudiante->ApellidoPaterno}}
                                </option>
                            @endforeach  
                        </select>
                    </div> 
                    <div class="div_design">
                        <label class="text-align:center;">Nombre del profesor</label>
                        <select class="text_color" name="profesor_id" required="">
                            <option value="" selected="">Seleccionar estudiante...</option>
                            @foreach ($profesor as $profe)
                                <option value="{{ $profe->id }}"> 
                                    id: {{ $profe->id }} - {{ $profe->Nombre }} {{$profe->ApellidoPaterno}}  
                                </option>
                            @endforeach  
                        </select>
                    </div> --}}
                    
                    {{-- <div class="div_design">
                        <input type="submit" value="Registrar especialidad" class="btn btn-primary">                        
                    </div> --}}
                </form>
                
                
            </div> 
        </div>
    </div>
</div>
  

@stop


@section('content')
<div class="div_center">
    <p>Lista de especialidades medicas</p>
</div>
    
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th class="th_deg" scope="col">Id</th> 
                <th class="th_deg" scope="col">Especialidad</th>                             
                {{-- <th class="th_degA" scope="col">Acciones</th> --}}
            </tr>
        </thead>
        <tbody>
            
           @foreach ($especialidad as $especialidad)
            <tr>
                 <td>{{$especialidad->id}}</td>
                <td>{{$especialidad->nombre}}
               
                {{-- <td>
                    <div style="display: flex; justify-content: space-between;">
                        <a class="btn btn-warning" href="">editar</a>
                        {{url('actualizar_materia', $mate->id)}} --}}
                        {{-- <a class="btn btn-danger" onclick="return confirm('¿Estás seguro?')"
                           href="">eliminar</a> --}}
                           {{--{{url('borrar_materia', $mate->id)}}  
                    </div>
                </td>                         --}}
            </tr>
             @endforeach  
        </tbody>
    </table>
</div>


            

@stop 