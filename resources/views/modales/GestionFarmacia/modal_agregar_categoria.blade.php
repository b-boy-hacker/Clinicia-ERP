<!-- Modal Agregar Categoría -->
<div class="modal fade" id="modalAgregarCategoria" tabindex="-1" role="dialog" aria-labelledby="modalAgregarCategoriaLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAgregarCategoriaLabel">Agregar Categoría</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulario para agregar categoría -->
                <form method="POST" action="{{ route('GestionFarmacia-categoria.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="nombreCategoria">Nombre</label>
                        <input type="text" class="form-control" id="nombreCategoria" name="nombre" placeholder="Ingrese el nombre de la categoría">
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>
