<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 5px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Listado de Usuarios</h1>
    <table>
        <thead>
            <tr>
                @foreach($atributos as $atributo)
                    <th>{{ ucfirst(str_replace('_', ' ', $atributo)) }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $usuario)
                <tr>
                    @foreach($atributos as $atributo)
                        <td>{{ $usuario->$atributo }}</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>