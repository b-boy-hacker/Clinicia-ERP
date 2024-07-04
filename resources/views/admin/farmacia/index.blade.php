@extends('adminlte::page')
@section('title', 'Dashboard Administración')


@section('content_header')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
@stop

@section('content')
    <div class="container mt-4">
        <h1>Panel de Administración</h1>

        <!-- Botones para abrir modales de agregar -->
        <div class="mb-4">
            <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCategoria">Agregar Categoría</button>
            <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProducto">Agregar Producto</button>
            <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProveedor">Agregar Proveedor</button>
            <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarPedido">Realizar Pedido</button>
        </div>

        <!-- Tabla de Categorías -->
        <div class="mb-4">
            <h2>Categorías</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Filas de categorías -->
                    @foreach ($categorias as $categoria)
                    <tr>
                        <td>{{ $categoria->id_categoria }}</td>
                        <td>{{ $categoria->nombre }}</td>
                        <td>
                            <!-- Botones para abrir modales de editar y eliminar -->
                            <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalEditarCategoria{{ $categoria->id_categoria }}">Editar</button>
                            <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modalEliminarCategoria{{ $categoria->id_categoria }}">Eliminar</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Modales para Categorías -->
        @include('modales.GestionFarmacia.modal_agregar_categoria')
        @foreach ($categorias as $categoria)
        @include('modales.GestionFarmacia.modal_editar_categoria', ['categoria' => $categoria])
        @include('modales.GestionFarmacia.modal_eliminar_categoria', ['categoria' => $categoria])
        @endforeach

        <!-- Tabla de Productos -->
        <div class="mb-4">
            <h2>Productos</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Filas de productos -->
                    @foreach ($productos as $producto)
                    <tr>
                        <td>{{ $producto->id_producto }}</td>
                        <td>{{ $producto->nombre }}</td>
                        <td>{{ $producto->descripcion }}</td>
                        <td>{{ $producto->precio }}</td>
                        <td>
                            <!-- Botones para abrir modales de editar y eliminar -->
                            <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalEditarProducto{{ $producto->id_producto }}">Editar</button>
                            <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modalEliminarProducto{{ $producto->id_producto }}">Eliminar</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Modales para Productos -->
        @include('modales.GestionFarmacia.modal_agregar_producto')
        @foreach ($productos as $producto)
        @include('modales.GestionFarmacia.modal_editar_producto', ['producto' => $producto])
        @include('modales.GestionFarmacia.modal_eliminar_producto', ['producto' => $producto])
        @endforeach


        <!-- Tabla de Proveedores -->
        <div class="mb-4">
            <h2>Proveedores</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Dirección</th>
                        <th>Teléfono</th>
                        <th>Email</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($proveedores as $proveedor)
                    <tr>
                        <td>{{ $proveedor->id_proveedor }}</td>
                        <td>{{ $proveedor->nombre }}</td>
                        <td>{{ $proveedor->direccion }}</td>
                        <td>{{ $proveedor->telefono }}</td>
                        <td>{{ $proveedor->email }}</td>
                        <td>
                            <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalEditarProveedor{{ $proveedor->id_proveedor }}">Editar</button>
                            <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modalEliminarProveedor{{ $proveedor->id_proveedor }}">Eliminar</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Modales para Proveedores -->
        @include('modales.GestionFarmacia.modal_agregar_proveedor')
        @foreach ($proveedores as $proveedor)
        @include('modales.GestionFarmacia.modal_editar_proveedor', ['proveedor' => $proveedor])
        @include('modales.GestionFarmacia.modal_eliminar_proveedor', ['proveedor' => $proveedor])
        @endforeach

        <!-- Tabla de Pedidos de Compra -->
        <div class="mb-4">
            <h2>Pedidos de Compra</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Proveedor</th>
                        <th>Fecha Pedido</th>
                        <th>Fecha Recepción</th>
                        <th>Estado</th>
                        <th>Total</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pedidos as $pedido)
                    <tr>
                        <td>{{ $pedido->id_pedido }}</td>
                        <td>{{ $pedido->proveedor->nombre }}</td>
                        <td>{{ $pedido->fecha_pedido }}</td>
                        <td>{{ $pedido->fecha_recepcion }}</td>
                        <td>{{ $pedido->estado }}</td>
                        <td>{{ $pedido->total }}</td>
                        <td>
                            <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalEditarPedido{{ $pedido->id_pedido }}">Editar</button>
                            <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modalEliminarPedido{{ $pedido->id_pedido }}">Eliminar</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Modales para Pedidos de Compra -->
        @include('modales.GestionFarmacia.modal_agregar_pedido')
        @foreach ($pedidos as $pedido)
        @include('modales.GestionFarmacia.modal_editar_pedido', ['pedido' => $pedido])
        @include('modales.GestionFarmacia.modal_eliminar_pedido', ['pedido' => $pedido])
        @endforeach
        <!-- Repetir la estructura para Proveedores y Pedidos de Compra -->

    </div>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <!-- Popper.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@stop
