<!-- Modal Eliminar Categoría -->
<div class="modal fade" id="modalEliminarCategoria{{ $categoria->id }}" tabindex="-1" role="dialog" aria-labelledby="modalEliminarCategoria{{ $categoria->id }}Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEliminarCategoria{{ $categoria->id }}Label">Eliminar Categoría</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>¿Estás seguro de que deseas eliminar la categoría "{{ $categoria->nombre }}"?</p>
            </div>
            <div class="modal-footer">
                <form method="POST" action="{{ route('GestionFarmacia-categoria.destroy', ['id' => $categoria->id_categoria]) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
