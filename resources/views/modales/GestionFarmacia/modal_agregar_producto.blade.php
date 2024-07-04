<!-- Modal Agregar Producto -->
<div class="modal fade" id="modalAgregarProducto" tabindex="-1" role="dialog" aria-labelledby="modalAgregarProductoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAgregarProductoLabel">Agregar Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('GestionFarmacia-Pro.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nombreProducto">Nombre</label>
                        <input type="text" class="form-control" id="nombreProducto" name="nombre" placeholder="Nombre del producto" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcionProducto">Descripción</label>
                        <textarea class="form-control" id="descripcionProducto" name="descripcion" rows="3" placeholder="Descripción del producto"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="precioProducto">Precio</label>
                        <input type="number" class="form-control" id="precioProducto" name="precio" placeholder="Precio del producto" required>
                    </div>
                    <div class="form-group">
                        <label for="stockProducto">Stock</label>
                        <input type="number" class="form-control" id="stockProducto" name="stock" placeholder="Stock disponible" required>
                    </div>
                    <div class="form-group">
                        <label for="fechaExpiracionProducto">Fecha de Expiración</label>
                        <input type="date" class="form-control" id="fechaExpiracionProducto" name="fecha_expiracion">
                    </div>
                    <div class="form-group">
                        <label for="categoriaProducto">Categoría</label>
                        <select class="form-control" id="categoriaProducto" name="categoria_id" required>
                            <option value="">Selecciona una categoría</option> <!-- Esta opción es para asegurarse de que algo está seleccionado -->
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->id_categoria }}">{{ $categoria->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="imagenProducto">Imagen</label>
                        <input type="file" class="form-control-file" id="imagenProducto" name="imagen">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Agregar Producto</button>
                </div>
            </form>
        </div>
    </div>
</div>
