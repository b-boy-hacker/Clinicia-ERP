<!-- Modal Editar Categoría -->
<div class="modal fade" id="modalEditarCategoria{{ $categoria->id_categoria }}" tabindex="-1" role="dialog" aria-labelledby="modalEditarCategoria{{ $categoria->id_categoria }}Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditarCategoria{{ $categoria->id_categoria }}Label">Editar Categoría</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulario para editar categoría -->
                <form method="POST" action="{{ route('GestionFarmacia-categoria.update', ['id' => $categoria->id_categoria]) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nombreCategoria">Nombre</label>
                        <input type="text" class="form-control" id="nombreCategoria" name="nombre" value="{{ $categoria->nombre }}" placeholder="Ingrese el nombre de la categoría">
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </form>

            </div>
        </div>
    </div>
</div>
                                        