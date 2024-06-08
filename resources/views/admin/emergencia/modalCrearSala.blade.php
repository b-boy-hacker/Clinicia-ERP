    <!-- Modal de Añadir Sala Emergencia -->
    <div class="modal fade" id="modalCrearSala" tabindex="-1"
         aria-labelledby="modalCrearSalaLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCrearSalaLabel">Crear sala de emergencia</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action=" {{ url('/crearSalaEmergencia') }} " method="POST">
                    @csrf       
                         
                    <div class="modal-body">
                    
                        <div class="form-group">
                            <label for="">Nombe</label>
                            <input type="text" class="form-control" name="nombre" required>
                        </div>
                        <div class="form-group">
                            <label for="">estado</label>
                            <input type="text" class="form-control" name="estado" required>
                        </div>
                        <div class="form-group">
                            <label for="">equipo</label>
                            <select class="text_color" name="equipo_id" required="">
                                <option value="" selected>Seleccionar equipo...</option>
                                @foreach ($equipo as $equipoMedico)
                                    <option value="{{ $equipoMedico->id}}">
                                        {{ $equipoMedico->id}}
                                        {{ $equipoMedico->nombre}}                                                                           
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


