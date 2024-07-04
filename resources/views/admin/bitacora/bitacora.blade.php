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
<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Descripción
                </th>
                <th scope="col" class="px-6 py-3">
                    Usuario
                </th>
                <th scope="col" class="px-6 py-3">
                    Id Usuario
                </th>
                <th scope="col" class="px-6 py-3">
                    IP
                </th>
                <th scope="col" class="px-6 py-3">
                    Navegador
                </th>
                <th scope="col" class="px-6 py-3">
                    Tabla Afectada
                </th>
                <th scope="col" class="px-6 py-3">
                    Registro ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Fecha y Hora
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bitacora as $bitacoras)
                <tr class="bg-white dark:bg-gray-800">
                    <th scope="row"
                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $bitacoras->id }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $bitacoras->descripcion }}
                    </td>
                    
                    <td class="px-6 py-4">
                        {{ $bitacoras->usuario }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $bitacoras->usuario_id }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $bitacoras->direccion_ip }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $bitacoras->navegador }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $bitacoras->tabla }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $bitacoras->registro_id }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $bitacoras->fecha_hora }}
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>
@stop
