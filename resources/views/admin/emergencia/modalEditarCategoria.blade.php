    <!-- Modal de Añadir Servicio -->
    <div class="modal fade" id="modalEditarCategoria-{{ $categoriaEmergencia->id }}" tabindex="-1"
        aria-labelledby="modalEditarCategoriaLabel-{{ $categoriaEmergencia->id }}" aria-hidden="true">
       <div class="modal-dialog">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="modalEditarCategoriaLabel-{{ $categoriaEmergencia->id }}">Editar categoria</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <form action=" {{ url('/editar_categoria', $categoriaEmergencia->id) }} " method="POST">
                   @csrf       
                        
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="">Nombe</label>
                            <input type="text" class="form-control" name="nombre" required>
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