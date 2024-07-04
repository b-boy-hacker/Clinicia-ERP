<div class="modal fade" id="modalEliminarPedido{{ $pedido->id_pedido }}" tabindex="-1" role="dialog" aria-labelledby="modalEliminarPedidoLabel{{ $pedido->id_pedido }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEliminarPedidoLabel{{ $pedido->id_pedido }}">Eliminar Pedido</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('GestionFarmacia-pedidos.destroy', $pedido->id_pedido) }}">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <p>¿Estás seguro de que quieres eliminar este pedido?</p>
                    <p><strong>Pedido ID: {{ $pedido->id_pedido }}</strong></p>
                    <p><strong>Proveedor: {{ $pedido->proveedor->nombre }}</strong></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>
