    <!-- Modal de Añadir Servicio -->
    <div class="modal fade" id="modalEditarOferta-{{ $o->id }}" tabindex="-1"
        aria-labelledby="modalEditarOfertaLabel-{{ $o->id }}" aria-hidden="true">
       <div class="modal-dialog">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="modalEditarOfertaEspLabel-{{ $o->id }}">Editar Oferta de servicio</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <form action=" {{ url('/editarOferta', $o->id) }} " method="POST" enctype="multipart/form-data">
                   @csrf       
                        
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="servicio">Servicio</label>
                            <select class="text_color form-control" name="servicio" required>
                                <option value="" selected>Seleccionar servicio...</option>
                                @foreach ($servicio as $ser)
                                    <option value="{{ $ser->tipo_servicio }}">
                                        {{ $ser->id }} - {{ $ser->tipo_servicio }}                                                                           
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <input type="text" class="form-control" name="descripcion" required>
                        </div>
                        <div class="form-group">
                            <label for="precio">Precio</label>
                            <input type="number" class="form-control" name="precio" required>
                        </div>
                        <div class="form-group">
                            <label for="descuento">Descuento</label>
                            <input type="number" class="form-control" name="descuento">
                        </div>
                        <div class="form-group">
                            <label for="imagen">Imagen</label>
                            <input type="file" class="form-control" name="imagen" required>
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