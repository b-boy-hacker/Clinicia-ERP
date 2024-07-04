<div class="modal fade" id="modalEditarPedido{{ $pedido->id_pedido }}" tabindex="-1" role="dialog" aria-labelledby="modalEditarPedidoLabel{{ $pedido->id_pedido }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditarPedidoLabel{{ $pedido->id_pedido }}">Editar Pedido</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('GestionFarmacia-pedidos.update', $pedido->id_pedido) }}">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="proveedorPedido{{ $pedido->id_pedido }}">Proveedor</label>
                        <select class="form-control" id="proveedorPedido{{ $pedido->id_pedido }}" name="proveedor_id" required>
                            @foreach ($proveedores as $proveedor)
                                <option value="{{ $proveedor->id_proveedor }}" @if($proveedor->id_proveedor == $pedido->proveedor_id) selected @endif>{{ $proveedor->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="fechaPedido{{ $pedido->id_pedido }}">Fecha Pedido</label>
                        <input type="date" class="form-control" id="fechaPedido{{ $pedido->id_pedido }}" name="fecha_pedido" value="{{ $pedido->fecha_pedido }}" required>
                    </div>
                    <div class="form-group">
                        <label for="fechaRecepcion{{ $pedido->id_pedido }}">Fecha Recepción</label>
                        <input type="date" class="form-control" id="fechaRecepcion{{ $pedido->id_pedido }}" name="fecha_recepcion" value="{{ $pedido->fecha_recepcion }}" required>
                    </div>
                    <div class="form-group">
                        <label for="estadoPedido{{ $pedido->id_pedido }}">Estado</label>
                        <input type="text" class="form-control" id="estadoPedido{{ $pedido->id_pedido }}" name="estado" value="{{ $pedido->estado }}" required>
                    </div>
                    <div class="form-group">
                        <label for="totalPedido{{ $pedido->id_pedido }}">Total</label>
                        <input type="number" class="form-control" id="totalPedido{{ $pedido->id_pedido }}" name="total" step="0.01" value="{{ $pedido->total }}" required>
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
