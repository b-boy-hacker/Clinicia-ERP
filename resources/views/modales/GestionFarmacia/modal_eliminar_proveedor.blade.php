<div class="modal fade" id="modalEliminarProveedor{{ $proveedor->id_proveedor }}" tabindex="-1" role="dialog" aria-labelledby="modalEliminarProveedorLabel{{ $proveedor->id_proveedor }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEliminarProveedorLabel{{ $proveedor->id_proveedor }}">Eliminar Proveedor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('GestionFarmacia-proveedor.destroy', $proveedor->id_proveedor) }}">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <p>¿Estás seguro de que quieres eliminar este proveedor?</p>
                    <p><strong>{{ $proveedor->nombre }}</strong></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>
