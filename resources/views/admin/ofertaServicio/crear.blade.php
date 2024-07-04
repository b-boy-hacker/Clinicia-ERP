    <!-- Modal de Añadir Servicio -->
    <div class="modal fade" id="modalCrearOferta" tabindex="-1"
         aria-labelledby="modalCrearOfertaLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCrearOfertaLabel">Crear oferta de servicios</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action=" {{ url('/crearOferta') }} " method="POST">
                    @csrf       
                         
                    <div class="modal-body">
                    
                        <div class="form-group">
                            <label for="tipo_servicio">Servicio</label>
                            <select class="text_color" name="nombres" required="">
                                <option value="" selected>Seleccionar usuario...</option>
                                @foreach ($medico as $usuario_rol)
                                    <option value="{{ $usuario_rol->user->nombres}}">
                                        {{ $usuario_rol->user->id}}
                                        {{ $usuario_rol->user->nombres}}                                                                           
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="tipo_servicio">Servicio</label>
                            <input type="text" class="form-control" name="nombre" required>
                        </div>
                   
        
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Crear</button>
                    </div>
                </form>
            </div>
        </div>
    </div>