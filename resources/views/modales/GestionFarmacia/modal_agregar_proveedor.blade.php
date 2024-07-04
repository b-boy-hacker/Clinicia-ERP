<div class="modal fade" id="modalAgregarProveedor" tabindex="-1" role="dialog" aria-labelledby="modalAgregarProveedorLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAgregarProveedorLabel">Agregar Proveedor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('GestionFarmacia-proveedor.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nombreProveedor">Nombre</label>
                        <input type="text" class="form-control" id="nombreProveedor" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="direccionProveedor">Dirección</label>
                        <input type="text" class="form-control" id="direccionProveedor" name="direccion" required>
                    </div>
                    <div class="form-group">
                        <label for="telefonoProveedor">Teléfono</label>
                        <input type="text" class="form-control" id="telefonoProveedor" name="telefono" required>
                    </div>
                    <div class="form-group">
                        <label for="emailProveedor">Email</label>
                        <input type="email" class="form-control" id="emailProveedor" name="email" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>
