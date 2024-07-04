<div class="modal fade" id="modalEditarProducto{{ $producto->id }}" tabindex="-1" role="dialog" aria-labelledby="modalEditarProductoLabel{{ $producto->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditarProductoLabel{{ $producto->id }}">Editar Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <form method="POST" action="{{ route('GestionFarmacia-Pro.update', ['id' => $producto->id_producto]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nombreProductoEdit">Nombre</label>
                        <input type="text" class="form-control" id="nombreProductoEdit" name="nombre" value="{{ $producto->nombre }}" placeholder="Nombre del producto" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcionProductoEdit">Descripción</label>
                        <textarea class="form-control" id="descripcionProductoEdit" name="descripcion" rows="3" placeholder="Descripción del producto">{{ $producto->descripcion }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="precioProductoEdit">Precio</label>
                        <input type="number" class="form-control" id="precioProductoEdit" name="precio" value="{{ $producto->precio }}" placeholder="Precio del producto" required>
                    </div>
                    <div class="form-group">
                        <label for="stockProductoEdit">Stock</label>
                        <input type="number" class="form-control" id="stockProductoEdit" name="stock" value="{{ $producto->stock }}" placeholder="Stock disponible" required>
                    </div>
                    <div class="form-group">
                        <label for="fechaExpiracionProductoEdit">Fecha de Expiración</label>
                        <input type="date" class="form-control" id="fechaExpiracionProductoEdit" name="fecha_expiracion" value="{{ $producto->fecha_expiracion }}">
                    </div>
                    <div class="form-group">
                        <label for="categoriaProductoEdit">Categoría</label>
                        <select class="form-control" id="categoriaProductoEdit" name="categoria_id" required>
                            @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="imagenProductoEdit">Imagen Actual</label><br>
                        <img src="{{ asset($producto->imagen_url) }}" alt="Imagen del producto" style="max-width: 200px; max-height: 200px;">
                    </div>
                    <div class="form-group">
                        <label for="imagenProductoEdit">Cambiar Imagen</label>
                        <input type="file" class="form-control-file" id="imagenProductoEdit" name="imagen">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
