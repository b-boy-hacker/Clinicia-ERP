<x-app-layout>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('/service/service.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <div class="container">
        <h1>Consultas Médicas</h1>

        @include('admin.usuario.modalCrear')

        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Fecha</th>
                    <th>Paciente</th>
                    <th>Especialidad</th>
                    <th>Consultorio</th>
                    <th>Médico</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($consultas as $consulta)
                    <tr>
                        <td>{{ $consulta->id }}</td>
                        <td>{{ $consulta->fecha }} - {{ $consulta->Horario->horaI ?? 'N/A' }} - {{ $consulta->Horario->horaF ?? 'N/A' }}</td>
                        <td>{{ $consulta->paciente->nombres }}</td>
                        <td>{{ $consulta->especialidad->nombre }}</td>
                        <td>{{ $consulta->consultorio->nombre }}</td>
                        <td>{{ $consulta->consultorio->medico->nombres }}</td>
                        <td>{{ $consulta->estadoActual->estado ?? 'Sin estado' }}</td>
                        <td>
                            <form action="{{ route('medicos.updateEstado', $consulta->id) }}" method="POST">
                                @csrf
                                <select name="estado" onchange="this.form.submit()">
                                    <option value="en proceso" {{ $consulta->estadoActual && $consulta->estadoActual->estado == 'en proceso' ? 'selected' : '' }}>En proceso</option>
                                    <option value="finalizado" {{ $consulta->estadoActual && $consulta->estadoActual->estado == 'finalizado' ? 'selected' : '' }}>Finalizado</option>
                                </select>
                            </form>
                            <a href="#" class="btn btn-primary mt-2" data-toggle="modal" data-target="#addRecetaModal{{ $consulta->id }}">Añadir receta</a>
                            @foreach($consulta->recetasMedicas as $receta)
                                <a href="#" class="btn btn-primary mt-2" data-toggle="modal" data-target="#editRecetaModal{{ $receta->id }}">Editar receta</a>
                            @endforeach
                            <a href="#" class="btn btn-secondary mt-2" data-toggle="modal" data-target="#solicitarLaboratorioModal{{ $consulta->id }}">Solicitar Laboratorio</a>
                        </td>
                    </tr>

                    <!-- Modal para añadir receta -->
                    <div class="modal fade" id="addRecetaModal{{ $consulta->id }}" tabindex="-1" role="dialog" aria-labelledby="addRecetaModalLabel{{ $consulta->id }}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addRecetaModalLabel{{ $consulta->id }}">Añadir Receta</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('medicos.storeReceta', $consulta->id) }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="descripcion">Descripción de la Receta</label>
                                            <textarea name="descripcion" class="form-control" required></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary">Guardar Receta</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Modal para editar receta -->
                    @foreach($consulta->recetasMedicas as $receta)
                        <div class="modal fade" id="editRecetaModal{{ $receta->id }}" tabindex="-1" role="dialog" aria-labelledby="editRecetaModalLabel{{ $receta->id }}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editRecetaModalLabel{{ $receta->id }}">Editar Receta</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('medicos.updateReceta', $receta->id) }}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="descripcion">Descripción de la Receta</label>
                                                <textarea name="descripcion" class="form-control" required>{{ $receta->descripcion }}</textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <!-- Modal para solicitar laboratorio -->
                    <div class="modal fade" id="solicitarLaboratorioModal{{ $consulta->id }}" tabindex="-1" role="dialog" aria-labelledby="solicitarLaboratorioModalLabel{{ $consulta->id }}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="solicitarLaboratorioModalLabel{{ $consulta->id }}">Solicitar Laboratorio</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('medicos.storeLaboratorio', $consulta->id) }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="descripcion">Descripción de la Solicitud</label>
                                            <textarea name="descripcion" class="form-control" required></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary">Guardar Solicitud</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>