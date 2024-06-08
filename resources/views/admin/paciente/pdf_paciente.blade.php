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
    <h1>Lista de Pacientes</h1>
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
            @foreach ($usuariosPacientes as $usuarioPaciente)
            <tr>
                <td>{{$usuarioPaciente->user->id}}</td>
                <td>{{$usuarioPaciente->user->ci}}</td>
                <td>{{$usuarioPaciente->user->nombres}}</td>
                <td>{{$usuarioPaciente->user->apellido_paterno}}</td>
                <td>{{$usuarioPaciente->user->apellido_materno}}</td>
                <td>{{$usuarioPaciente->user->sexo}}</td>
                <td>{{$usuarioPaciente->user->telefono}}</td>
                <td>{{$usuarioPaciente->user->direccion}}</td>
                <td>{{$usuarioPaciente->user->email}}</td>
            </tr>
            @endforeach 
        </tbody>
    </table>
    
</body>
</html>
.