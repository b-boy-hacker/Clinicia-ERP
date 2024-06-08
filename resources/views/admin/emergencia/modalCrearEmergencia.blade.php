    <!-- Modal de Añadir Emergencia -->
    <div class="modal fade" id="modalCrearEmergencia" tabindex="-1"
         aria-labelledby="modalCrearEmergenciaLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCrearEmergenciaLabel">Crear emergencia</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action=" {{ url('/crearEmergencia') }} " method="POST">
                    @csrf       
                         
                    <div class="modal-body">
                    
                        <div class="form-group">
                            <label for="">Nombe</label>
                            <input type="text" class="form-control" name="nombre" required>
                        </div>
                        <div class="form-group">
                            <label for="">Hora</label>
                            <input type="time" class="form-control" name="hora" required>
                        </div>
                        <div class="form-group">
                            <label for="">Fecha</label>
                            <input type="date" class="form-control" name="fecha" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="">Paciente</label>
                            <select class="text_color" name="paciente_id" required="">
                                <option value="" selected>Seleccionar equipo...</option>
                                @foreach ($paciente as $pacienteRol)
                                    <option value="{{ $pacienteRol->user->id}}">
                                        {{ $pacienteRol->user->id}}
                                        {{ $pacienteRol->user->nombres}}                                                                           
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Medico</label>
                            <select class="text_color" name="medico_id" required="">
                                <option value="" selected>Seleccionar equipo...</option>
                                @foreach ($medico as $medicoRol)
                                <option value="{{ $medicoRol->user->id}}">
                                    {{ $medicoRol->user->id}}
                                    {{ $medicoRol->user->nombres}}                                                                           
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Sala</label>
                            <select class="text_color" name="sala_id" required="">
                                <option value="" selected>Seleccionar equipo...</option>
                                @foreach ($sala as $salaEmergencia)
                                    <option value="{{ $salaEmergencia->id}}">
                                        {{ $salaEmergencia->id}}
                                        {{ $salaEmergencia->nombre}}                                                                           
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Categoria</label>
                            <select class="text_color" name="catEmergencia_id" required="">
                                <option value="" selected>Seleccionar equipo...</option>
                                @foreach ($categoria as $categoriaEmergencia)
                                    <option value="{{ $categoriaEmergencia->id}}">
                                        {{ $categoriaEmergencia->id}}
                                        {{ $categoriaEmergencia->nombre}}                                                                           
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                    </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Crear</button>
                        </div>  
                </form>
            </div>
        </div>
    </div>


