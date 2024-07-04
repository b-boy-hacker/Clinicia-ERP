<div class="modal fade" id="modalEditarProveedor{{ $proveedor->id_proveedor }}" tabindex="-1" role="dialog" aria-labelledby="modalEditarProveedorLabel{{ $proveedor->id_proveedor }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditarProveedorLabel{{ $proveedor->id_proveedor }}">Editar Proveedor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('GestionFarmacia-proveedor.update', $proveedor->id_proveedor) }}">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nombreProveedor{{ $proveedor->id_proveedor }}">Nombre</label>
                        <input type="text" class="form-control" id="nombreProveedor{{ $proveedor->id_proveedor }}" name="nombre" value="{{ $proveedor->nombre }}" required>
                    </div>
                    <div class="form-group">
                        <label for="direccionProveedor{{ $proveedor->id_proveedor }}">Dirección</label>
                        <input type="text" class="form-control" id="direccionProveedor{{ $proveedor->id_proveedor }}" name="direccion" value="{{ $proveedor->direccion }}" required>
                    </div>
                    <div class="form-group">
                        <label for="telefonoProveedor{{ $proveedor->id_proveedor }}">Teléfono</label>
                        <input type="text" class="form-control" id="telefonoProveedor{{ $proveedor->id_proveedor }}" name="telefono" value="{{ $proveedor->telefono }}" required>
                    </div>
                    <div class="form-group">
                        <label for="emailProveedor{{ $proveedor->id_proveedor }}">Email</label>
                        <input type="email" class="form-control" id="emailProveedor{{ $proveedor->id_proveedor }}" name="email" value="{{ $proveedor->email }}" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
