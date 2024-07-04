<div class="modal fade" id="modalAgregarPedido" tabindex="-1" role="dialog" aria-labelledby="modalAgregarPedidoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAgregarPedidoLabel">Realizar Pedido</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('GestionFarmacia-pedidos.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="proveedorPedido">Proveedor</label>
                        <select class="form-control" id="proveedorPedido" name="proveedor_id" required>
                            @foreach ($proveedores as $proveedor)
                                <option value="{{ $proveedor->id_proveedor }}">{{ $proveedor->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="fechaPedido">Fecha Pedido</label>
                        <input type="date" class="form-control" id="fechaPedido" name="fecha_pedido" required>
                    </div>
                    <div class="form-group">
                        <label for="fechaRecepcion">Fecha Recepción</label>
                        <input type="date" class="form-control" id="fechaRecepcion" name="fecha_recepcion" required>
                    </div>
                    <div class="form-group">
                        <label for="estadoPedido">Estado</label>
                        <input type="text" class="form-control" id="estadoPedido" name="estado" required>
                    </div>
                    <div class="form-group">
                        <label for="totalPedido">Total</label>
                        <input type="number" class="form-control" id="totalPedido" name="total" step="0.01" required>
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
