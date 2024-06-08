    <!-- Modal de Añadir Servicio -->
    <div class="modal fade" id="modalEditarSala-{{ $salaEmergencia->id }}" tabindex="-1"
        aria-labelledby="modalEditarEspLabel-{{ $salaEmergencia->id }}" aria-hidden="true">
       <div class="modal-dialog">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="modalEditarSalaLabel-{{ $salaEmergencia->id }}">Editar Sala de emergencia</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <form action=" {{ url('/editar_sala', $salaEmergencia->id) }} " method="POST">
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
                       <button type="submit" class="btn btn-primary">Actualizar</button>
                   </div>
               </form>
           </div>
       </div>
   </div>