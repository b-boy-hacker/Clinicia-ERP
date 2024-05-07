<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Horarios</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link href="{{ asset('inicio/css/horario.css') }}" rel="stylesheet">

</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">CRUD de Horarios</h1>
        <!-- Botón para abrir el modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#crearTurnoModal">
            Añadir Turno
        </button>
        <!-- Botón para abrir modal de creación -->
        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#crearModal">
            Crear Horario
        </button>
        <!-- Tabla de horarios -->
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Turno</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($turnos as $turno)
                <tr>
                    <td>{{ $turno->id }}</td>
                    <td>{{ $turno->nombre }}</td>
                    <td>
                        <!-- Aquí puedes colocar los botones de acciones, por ejemplo: -->
                        <button class="btn btn-primary">Editar</button>
                        <form action="{{ route('turno.destroyTurno', $turno->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Está seguro de eliminar este turno?')">Eliminar</button>
                        </form>
                        
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


        <!-- Tabla de horarios -->
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Hora de Inicio</th>
                    <th>Hora de Fin</th>
                    <th>Día</th>
                    <th>Turno</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($horarios as $horario)
            <tr>
            <td>{{ $horario->id }}</td>
            <td>{{ $horario->horaI }}</td>
            <td>{{ $horario->horaF }}</td>
            <td>{{ $horario->dia }}</td>
            <td>{{horario->turno->nombre}}</td>
            </tr>
                {{ $horario->dia }}: {{ $horario->horaI }} - {{ $horario->horaF }}
                <button class="btn btn-primary">Editar</button>
            <form action="{{ route('horario.destroy', $horario->id) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Está seguro de eliminar este horario?')">Eliminar</button>
            </form>
            @endforeach
           
                <!-- Aquí se llenará dinámicamente con datos -->
            </tbody>
        </table>
    </div>
<!-- Modal para añadir un turno -->
<div class="modal fade" id="crearTurnoModal" tabindex="-1" role="dialog" aria-labelledby="crearTurnoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="crearTurnoModalLabel">Añadir Turno</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulario para añadir un turno -->
                <form id="crearTurnoForm"action="{{ route('turno-horario.storeTurno') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre">
                    </div>
                    <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary" onclick="guardarTurno()">Guardar</button>
            </div>
                    <!-- Otros campos del turno aquí, si es necesario -->
                </form>
            </div>
            
        </div>
    </div>
    <script>
        function guardarTurno() {
    var formData = $('#crearTurnoForm').serialize();

    $.ajax({
        type: 'POST',
        url: '{{ route("horario.store") }}',
        data: formData,
        success: function(response) {
            // Mostrar una alerta de éxito
            alert('Turno creado exitosamente');

            // Opcional: Limpiar el formulario o realizar otras acciones necesarias
            $('#crearTurnoForm')[0].reset();
        },
        error: function(xhr, status, error) {
            // Mostrar una alerta de error
            alert('Error al agregar el turno: ' + error);
        }
    });
}

    </script>
</div>
    <!-- Modal de creación -->
<div class="modal fade" id="crearModal" tabindex="-1" role="dialog" aria-labelledby="crearModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="crearModalLabel">Crear Horario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Contenido del formulario de creación aquí -->
                <form id="crearForm"action="{{ route('horario.store') }}" method="POST">
                @csrf
                    <div class="form-group">
                        <label for="horaI">Hora de Inicio:</label>
                        <input type="time" class="form-control" id="horaI" name="horaI">
                    </div>
                    <div class="form-group">
                        <label for="horaF">Hora de Fin:</label>
                        <input type="time" class="form-control" id="horaF" name="horaF">
                    </div>
                    <div class="form-group">
                        <label for="dia">Día:</label>
                        <input type="text" class="form-control" id="dia" name="dia">
                    </div>
                    <div class="form-group">
                        <label for="turno">Turno:</label>
                        <input type="text" class="form-control" id="dia" name="dia">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                    
                </form>
            </div>
            
        </div>
    </div>
</div>

<!-- Modal de edición -->
<div class="modal fade" id="editarModal" tabindex="-1" role="dialog" aria-labelledby="editarModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarModalLabel">Editar Horario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Contenido del formulario de edición aquí -->
                <form id="editarForm">
                    <div class="form-group">
                        <label for="editarHoraI">Hora de Inicio:</label>
                        <input type="time" class="form-control" id="editarHoraI" name="editarHoraI">
                    </div>
                    <div class="form-group">
                        <label for="editarHoraF">Hora de Fin:</label>
                        <input type="time" class="form-control" id="editarHoraF" name="editarHoraF">
                    </div>
                    <div class="form-group">
                        <label for="editarDia">Día:</label>
                        <input type="text" class="form-control" id="editarDia" name="editarDia">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Guardar Cambios</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal de eliminación -->
<div class="modal fade" id="eliminarModal" tabindex="-1" role="dialog" aria-labelledby="eliminarModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eliminarModalLabel">Eliminar Horario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>¿Estás seguro de que deseas eliminar este horario?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger">Eliminar</button>
            </div>
        </div>
    </div>
</div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // JavaScript para manejar interacciones y eventos
    </script>
</body>
</html>
