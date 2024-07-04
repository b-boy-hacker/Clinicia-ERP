<!-- Modal Eliminar Producto -->
<div class="modal fade" id="modalEliminarProducto{{ $producto->id_producto }}" tabindex="-1" aria-labelledby="modalEliminarProductoLabel{{ $producto->id_producto }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('GestionFarmacia-Pro.destroy', ['id' => $producto->id_producto]) }}">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEliminarProductoLabel{{ $producto->id_producto }}">Eliminar Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>¿Estás seguro de que deseas eliminar el producto "{{ $producto->nombre }}"?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>
