<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos de Farmacia</title>
    <!-- Agregar los estilos de Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Estilos personalizados para la lista de productos -->
    <style>
        /* Estilos para las tarjetas de productos */
        .producto-card {
            margin-bottom: 20px;
            border: 1px solid #e0e0e0;
            border-radius: 5px;
            padding: 10px;
            background-color: #f8f9fa; /* Fondo de la tarjeta */
        }
        .producto-card img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
        }
        .producto-card .card-body {
            padding: 10px;
        }
        .producto-card .card-title {
            font-size: 1.2rem;
            font-weight: bold;
        }
        .producto-card .card-text {
            margin-top: 5px;
        }
        /* Estilos para el contador del carrito */
        .contador-carrito {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #007bff;
            color: #fff;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            text-align: center;
            line-height: 30px;
            font-size: 1rem;
            z-index: 1000;
            cursor: pointer; /* Agregar cursor de puntero para indicar que es clickeable */
        }
        /* Estilos para la lista de productos en el carrito */
        .modal-content {
            background-color: #fff;
            border: 1px solid #ccc;
        }
        .modal-body {
            max-height: 300px;
            overflow-y: auto;
        }
        .producto-carrito {
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }
        .carrito-imagen {
            max-width: 50px;
            max-height: 50px;
            border-radius: 5px;
        }
        .monto-total {
            background-color: #28a745;
            color: #fff;
            border-radius: 5px;
            padding: 10px;
            margin-top: 10px;
        }
        .eliminar-producto {
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="mt-4 mb-4">Productos de la Farmacia</h2>

        <!-- Contador de productos en el carrito -->
        <div class="contador-carrito" id="contador-carrito" data-toggle="modal" data-target="#carritoModal">0</div>

        @if (count($productos) > 0)
            <div class="row">
                @foreach ($productos as $producto)
                    <div class="col-md-4">
                        <div class="card producto-card">
                            <img class="card-img-top" src="{{ asset($producto->imagen_url) }}" alt="{{ $producto->nombre }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $producto->nombre }}</h5>
                                <p class="card-text">Precio: {{ $producto->precio }}</p>
                                <!-- Agregar más detalles del producto si es necesario -->
                                <button class="btn btn-primary agregar-carrito" data-id="{{ $producto->id }}" data-nombre="{{ $producto->nombre }}" data-precio="{{ $producto->precio }}" data-imagen="{{ asset($producto->imagen_url) }}">Agregar al Carrito</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="mt-4">No hay productos disponibles en la farmacia.</p>
        @endif
    </div>

    <!-- Modal del Carrito -->
    <div class="modal fade" id="carritoModal" tabindex="-1" role="dialog" aria-labelledby="carritoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="carritoModalLabel">Carrito de Compras</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="carritoModalBody">
                    <ul id="carrito-lista">
                        <!-- Aquí se agregarán los elementos del carrito -->
                    </ul>
                </div>
                <div class="modal-footer">
                <a href="{{ route('pago-T') }}" class="btn btn-secondary">Pagar</a>
                    <div class="monto-total">
                        Total: $<span id="total">0.00</span>
                    </div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts de Bootstrap y jQuery (si es necesario) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Script personalizado para la funcionalidad de agregar al carrito -->
    <script>
        // Selector de botones "Agregar al Carrito"
        const agregarBotones = document.querySelectorAll('.agregar-carrito');
        let contadorCarrito = 0;
        let totalCarrito = 0;
        const productosCarrito = [];

        // Función para agregar al carrito
        function agregarAlCarrito(idProducto, nombreProducto, precioProducto, imagenProducto) {
            contadorCarrito++;
            actualizarContadorCarrito();
            productosCarrito.push({ id: idProducto, nombre: nombreProducto, precio: precioProducto, imagen: imagenProducto });
            agregarProductoLista(idProducto, nombreProducto, precioProducto, imagenProducto);
            calcularTotalCarrito();
        }

        // Función para actualizar el contador del carrito
        function actualizarContadorCarrito() {
            document.getElementById('contador-carrito').textContent = contadorCarrito;
        }

        // Función para agregar un producto a la lista del carrito
        function agregarProductoLista(idProducto, nombreProducto, precioProducto, imagenProducto) {
            const listaCarrito = document.getElementById('carrito-lista');
            const nuevoElemento = document.createElement('li');
            nuevoElemento.classList.add('producto-carrito');
            nuevoElemento.setAttribute('data-id', idProducto); // Añadir un data-id para identificar el producto en el DOM
            nuevoElemento.innerHTML = `
                <div class="row">
                    <div class="col-md-2">
                        <img src="${imagenProducto}" alt="${nombreProducto}" class="carrito-imagen">
                    </div>
                    <div class="col-md-6">
                        <h6>${nombreProducto}</h6>
                        <p>Precio: ${precioProducto}</p>
                    </div>
                    <div class="col-md-4 text-right">
                        <button class="btn btn-sm btn-danger eliminar-producto">Eliminar</button>
                    </div>
                </div>
            `;
            listaCarrito.appendChild(nuevoElemento);

            // Añadir evento de clic al botón eliminar
            const btnEliminar = nuevoElemento.querySelector('.eliminar-producto');
            btnEliminar.addEventListener('click', function() {
                eliminarProducto(idProducto);
            });
        }

        // Función para calcular el total del carrito
        function calcularTotalCarrito() {
            totalCarrito = 0;
            productosCarrito.forEach(producto => {
                totalCarrito += producto.precio;
            });
            document.getElementById('total').textContent = totalCarrito.toFixed(2);
        }

        // Función para eliminar un producto del carrito
        function eliminarProducto(idProducto) {
            const productoIndex = productosCarrito.findIndex(producto => producto.id === idProducto);
            if (productoIndex !== -1) {
                productosCarrito.splice(productoIndex, 1); // Eliminar del array de productos
                contadorCarrito--;
                actualizarContadorCarrito();
                
                // Eliminar del DOM
                const listaCarrito = document.getElementById('carrito-lista');
                // const productoDOM = listaCarrito.querySelector([data-id="${idProducto}"]);
                const productoDOM = listaCarrito.querySelector(`[data-id="${idProducto}"]`);
                listaCarrito.removeChild(productoDOM);
                
                calcularTotalCarrito();
            }
        }

        // Manejar clic en los botones "Agregar al Carrito"
        agregarBotones.forEach(boton => {
            boton.addEventListener('click', function() {
                const idProducto = this.getAttribute('data-id');
                const nombreProducto = this.getAttribute('data-nombre');
                const precioProducto = parseFloat(this.getAttribute('data-precio'));
                const imagenProducto = this.getAttribute('data-imagen');
                agregarAlCarrito(idProducto, nombreProducto, precioProducto, imagenProducto);
            });
        });
    </script>
</body>
</html>