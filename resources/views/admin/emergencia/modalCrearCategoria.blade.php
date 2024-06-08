 <!-- Modal de Añadir Categoria Emergencia -->
 <div class="modal fade" id="modalCrearCategoria" tabindex="-1"
 aria-labelledby="modalCrearCategoriaLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modalCrearCategoriaLabel">Crear categoria de emergencia</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action=" {{ url('/crearCategoriaEmergencia') }} " method="POST">
            @csrf       
                 
            <div class="modal-body">
            
                <div class="form-group">
                    <label for="">Nombe</label>
                    <input type="text" class="form-control" name="nombre" required>
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