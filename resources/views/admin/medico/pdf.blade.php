<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Médicos</title>
    <!-- Puedes incluir estilos CSS adicionales si es necesario -->
    <style>
        /* Estilos para la tabla */
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #d8d6d6;
        }
    </style>
</head>
<body>
    <h1>Lista de Médicos habilidados</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>CI</th>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                {{-- <th>Sexo</th> --}}
                <th>Teléfono</th> 
                <th>Dirección</th> 
                <th>Correo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuariosMedicos as $usuarioMedico)
            <tr>
                <td>{{ $usuarioMedico->user->id }}</td>
                <td>{{ $usuarioMedico->user->ci }}</td>
                <td>{{ $usuarioMedico->user->nombres }}</td>
                <td>{{ $usuarioMedico->user->apellido_paterno }}</td>
                <td>{{ $usuarioMedico->user->apellido_materno }}</td>
                {{-- <td>{{ $usuarioMedico ->user->sexo }}</td> --}}
                <td>{{ $usuarioMedico->user->telefono }}</td>
                <td>{{ $usuarioMedico->user->direccion }}</td>
                <td>{{ $usuarioMedico->user->email }}</td>
            </tr>
            @endforeach 
        </tbody>
    </table>
    
</body>
</html>
.