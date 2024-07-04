<!DOCTYPE html>
<html lang="es">
<head>
    <base href="/public">
    @include('inicio.antesCabecera')
    <link rel="icon" type="image/x-icon" href="Farmacia/assets/favicon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="oferta/css/styles.css" rel="stylesheet" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
</head> 
<body>

<!-- Encabezado -->

<header class="top-header">
    <div class="container">
        <div class="row">
            <div class="col-xs-5 header-logo">
                <!-- Puedes incluir aquí tu logo u otros elementos de encabezado -->
                <br>
                {{-- <a href="index.html"><img src="inicio/img/logo.png" alt="" class="img-responsive logo"></a> --}}
            </div>

            <div class="col-md-7">
                <nav class="navbar navbar-default">
                    <div class="container-fluid nav-bar">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right">
                                <li><a class="menu active" href="/">Inicio</a></li>
                                {{-- <li><a class="menu" href="#about">Acerca</a></li> --}}
                                <li><a class="menu" href="mostrar_oferta">Oferta-Servicio</a></li>
                                <li><a class="menu" href="ver_farmacia">Farmacia</a></li>
                                <li><a class="menu" href="login">Iniciar Sesión</a></li>
                                <li><a class="menu" href="#team"></a></li>
                            </ul>
                        </div><!-- /navbar-collapse -->
                    </div><!-- / .container-fluid -->
                </nav>
            </div>
        </div>
    </div>
</header> <!-- end of header area -->



<!-- Contenido principal -->
<main>
    <!-- CSS personalizado -->
    <style type="text/css">
        /* Estilos generales */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .section-title {
            text-align: center;
            margin-bottom: 30px;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .col-sm-6,
        .col-md-4,
        .col-lg-4 {
            flex: 0 0 calc(50% - 20px);
            margin-bottom: 40px;
            padding: 0 10px;
        }

        .box {
            border: 1px solid #ddd;
            padding: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
        }

        .box:hover {
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }

        .img-box {
            position: relative;
            overflow: hidden;
            margin-bottom: 15px;
        }

        .img-box img {
            width: 100%;
            height: auto;
            transition: transform 0.3s ease;
        }

        .img-box:hover img {
            transform: scale(1.1);
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            color: #fff;
            opacity: 0;
            transition: opacity 0.3s ease;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .img-box:hover .overlay {
            opacity: 1;
        }

        .overlay .text {
            text-align: center;
        }

        .option_container {
            position: absolute;
            top: 10px;
            right: 10px;
        }

        .options {
            background: rgba(255, 255, 255, 0.7);
            padding: 5px 10px;
            border-radius: 5px;
            transition: background 0.3s ease;
        }

        .option_container:hover .options {
            background: rgba(255, 255, 255, 0.9);
        }

        .option1 {
            color: #333;
            text-decoration: none;
        }

        /* Estilos específicos para texto de oferta y precio */
        .price {
            margin-bottom: 10px;
            text-align: center;
            font-size: 25px;
        }

        .price.discount {
            color: blue;
        }

        .price.regular {
            text-decoration: line-through;
            color: red;
        }

        .price.normal {
            color: green;
        }
    </style>

    <!-- Sección de productos -->
    <section class="product-section">
        <div class="container">
            <div class="section-title">
                <h1 style="padding-top: 100px">Nuestras <span>Ofertas</span></h2>
            </div>
            <div class="row">
                @foreach ($ofertas as $ofer)
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="box">
                        <div class="option_container">
                            <!-- Opciones (si las tienes) -->
                        </div>
                        <div class="img-box">
                            <img src="oferta/{{$ofer->imagen}}" alt="{{$ofer->servicio}}">
                            <div class="overlay">
                                <div class="text">
                                    <h2>{{$ofer->servicio}}</h2>
                                    <h3>{{$ofer->descripcion}}</h3>
                                </div>
                            </div>
                        </div>
                        @if ($ofer->descuento != null)
                        <div class="price discount">
                            OFERTA <br>
                            {{$ofer->descuento}} Bs
                        </div>
                        <div class="price regular">
                            PRECIO <br>
                            {{$ofer->precio}} Bs
                        </div>
                        @else
                        <div class="price normal">
                            PRECIO <br>
                            {{$ofer->precio}} Bs
                        </div>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Fin de la sección de productos -->
</main>

<!-- Scripts adicionales si es necesario -->

</body>
</html>
