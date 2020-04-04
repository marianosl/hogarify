<!DOCTYPE html>
<html lang="es"> 
    <head>
        <title>Hogarify | Inicio</title>

        <!-- Meta -->
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Comprá online y decorá tu casa!">
        <meta name="author" content="Mariano Lapunzina">

        <link rel="canonical" href="http://www.hogarify.ml/index.php">

        <!-- Favicon -->
        <link rel="shortcut icon" href="iconoH.ico">

        <!-- Web Fonts -->
        <link rel='stylesheet' type='text/css' href='css/fonts/fonts.css'>

        <!-- CSS Global Compulsory -->
        <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="css/shop.style.css">

        <!-- CSS Header and Footer -->
        <link rel="stylesheet" href="css/headers/header.css">
        <link rel="stylesheet" href="css/footers/footer.css">

        <!-- CSS Implementing Plugins -->
        <link rel="stylesheet" href="plugins/animate.css">    
        <link rel="stylesheet" href="plugins/line-icons/line-icons.css">
        <link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="plugins/scrollbar/css/jquery.mCustomScrollbar.css">
        <link rel="stylesheet" href="plugins/owl-carousel/owl-carousel/owl.carousel.css">
        <!--<link rel="stylesheet" href="plugins/revolution-slider/rs-plugin/css/settings.css">-->

        <!-- CSS Theme -->
        <link rel="stylesheet" href="css/theme-colors/default.css" >

        <!-- CSS Customization -->
        <link rel="stylesheet" href="css/custom.css">
        <link rel="stylesheet" href="css/app.css">
        <link rel="stylesheet" href="css/shop.blocks.css">
        <link rel="stylesheet" href="css/shop.plugins.css">
        <link rel="stylesheet" href="css/shop.style.css">
    </head>

    <body class="header-fixed">

        <div class="wrapper">
            <!--=== Header v5 ===-->   
            <div class="header-v5 header-static">
                <!-- Topbar v3 -->
                <div class="topbar-v3">

                    <div class="container">
                        <ul class="list-inline right-topbar pull-right">
                            <?php
                            session_start();
                            if (isset($_SESSION['email'])) {
                                ?>
                                <li>Bienvenido, 
                                    <span id="nombreUsuario"> <?php echo $_SESSION['nombre'] ?> </span>
                                    | 
                                    <a class="salirLogout" href="logout.php">Salir</a>
                                </li>
                                <?php
                            } else {
                                ?>
                                <li><a href="login.php">Ingreso</a> | <a href="registro.php">Registrarse</a></li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div><!--/container-->
                </div>
                <!-- End Topbar v3 -->

                <!-- Navbar -->
                <div class="navbar navbar-default mega-menu" role="navigation">
                    <div class="container">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="index.php">
                                <img id="logo-header" src="img/logo.png" alt="Logo">
                            </a>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse navbar-responsive-collapse">
                            <!-- Shopping Cart -->
                            <ul class="list-inline shop-badge badge-lists badge-icons pull-right">
                                <li>
                                    <span><i class="fa fa-shopping-cart"></i></span>
                                    <span class="badge badge-sea rounded-x"><?php echo (isset($_SESSION['carro'])) ? count($_SESSION['carro']) : 0; ?></span>
                                    <ul class="list-unstyled badge-open scrollbar" data-mcs-theme="minimal-dark">
                                    <!--<ul class="list-unstyled badge-open mCustomScrollbar" data-mcs-theme="minimal-dark">-->    
                                        <?php
                                        if (isset($_SESSION['carro'])) {
                                            foreach ($_SESSION['carro'] as $key => $value) {
                                                ?>
                                                <li>
                                                    <form action="eliminarProductoDelCarro.php" name="bajaProductoCompra" method="post">
                                                        <img src="<?php echo $value['imagen']; ?>" alt="Producto">              
                                                        <input type="hidden" name="paginaADireccionar" value="index.php"/>
                                                        <input type="hidden" name="hfIdProducto" value="<?php echo $key; ?>"/>
                                                        <input type="submit" class="close" name="borrar_productoCompra" value="x" />
                                                        <div class="overflow-h">
                                                            <span><?php echo $value['descripcion']; ?></span>
                                                            <small><?php echo $value['cantidad']; ?> x <?php echo $value['precio']; ?> = <?php echo '$' . $value['subtotal']; ?></small>
                                                        </div>
                                                    </form>    
                                                </li>
                                                <?php
                                            }
                                        }
                                        $total = 0;
                                        if (isset($_SESSION['carro'])) {
                                            foreach ($_SESSION['carro'] as $key => $value) {
                                                $total = $total + $value['subtotal'];
                                            }
                                        }
                                        ?>                                
                                        <li class="subtotal">
                                            <div class="overflow-h margin-bottom-10">
                                                <span>Total</span>
                                                <span class="pull-right subtotal-cost"><?php echo "$" . $total ?></span>
                                            </div>
                                            <div class="row">    
                                                <div class="col-xs-12">
                                                    <?php
                                                    if (isset($_SESSION['email']) && isset($_SESSION['carro'])) {
                                                        ?>
                                                        <a href="confirmarCompra.php" class="btn-u btn-brd btn-brd-hover btn-u-sea-shop btn-block">Confirmar compra</a>
                                                        <?php
                                                    } else if (isset($_SESSION['carro'])) {
                                                        ?>
                                                        <a href="login.php" class="btn-u btn-brd btn-brd-hover btn-u-sea-shop btn-block" onclick="alert('Debes loguearte para realizar la compra')">Confirmar compra</a>

                                                        <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>        
                                        </li>
                                        
                                    </ul>
                                </li>
                            </ul>
                            <!-- End Shopping Cart -->

                            <!-- Nav Menu -->
                            <ul class="nav navbar-nav">
                                <!-- HOME -->
                                <li class="active"><a href="#">Inicio</a></li>

                                <!-- PRODUCTOS -->
                                <li><a href="productos.php">Productos</a></li>

                                <!-- CONTACTO -->
                                <li><a href="contacto.php">Contacto</a></li>

                            </ul>
                            <!-- End Nav Menu -->
                        </div>
                    </div>    
                </div>            
                <!-- End Navbar -->
            </div>
            <!--=== End Header v5 ===-->

            <div class="hero-image">
                <div class="hero-text">
                    <h1 class="mensajeBienvenida">Los mejores productos para el hogar</h1>
                    <p class="subMensajeBienvenida">A sólo un click de distancia</p>
                </div>
            </div>

            <!--=== Product Content ===-->
            <div class="container content-md">


                <div class="heading heading-v1 margin-bottom-40">
                    <h2>Las últimas novedades</h2>
                </div>

                <!--=== Illustration v2 ===-->
                <div class="row illustration-v2">
                    <?php
                    include("conexion.php");
                    include("redirigirPaginaError.php");

                    $sql = "select id_producto, productos.descripcion, precio, stock, cantidad_vendida, especificacion, productos.id_categoria, categorias.descripcion as desc_cat, imagen from productos inner join categorias on productos.id_categoria = categorias.id_categoria where fecha_baja is null and stock > 0 order by id_producto desc limit 4;";
                    $sqlResultado = mysql_query($sql, $link) or die(redirigirPaginaError(mysql_errno(), mysql_error(), basename($_SERVER['PHP_SELF'])));
                    while ($fila = mysql_fetch_array($sqlResultado)) {
                        ?>
                        <div class="col-md-3 col-sm-6 md-margin-bottom-30">
                            <div class="product-img">
                                <a href="detalleProducto.php?id_producto=<?php echo $fila['id_producto']; ?>"><img class="full-width img-responsive" src="<?php echo $fila['imagen']; ?>" alt="<?php echo "Ver producto ".$fila['descripcion']; ?>"></a>
                                <!--<a class="add-to-cart" href="detalleProducto.php?id_producto=<?php echo $fila['id_producto']; ?>"><i class="fa fa-shopping-cart"></i>Ver producto</a> -->
                            </div>
                            <div class="product-description product-description-brd">
                                <div class="overflow-h margin-bottom-5">
                                    <div class="pull-left">
                                        <h3 class="title-price"><a href="detalleProducto.php?id_producto=<?php echo $fila['id_producto']; ?>"><?php echo $fila['descripcion']; ?></a></h3>
                                        <span class="gender"><?php echo $fila['desc_cat']; ?></span>

                                    </div>
                                    <div class="product-price">
                                        <span class="title-price"><?php echo "$" . $fila['precio']; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div> 
                <!--=== End Illustration v2 ===-->


                <div class="heading heading-v1 margin-bottom-40 margin-top-40">
                    <h2>Los más vendidos</h2>
                </div>

                <!--=== Illustration v2 ===-->
                <div class="row illustration-v2">
                    <?php
                    $sql = "select id_producto, productos.descripcion, precio, stock, cantidad_vendida, especificacion, productos.id_categoria, categorias.descripcion as desc_cat, imagen from productos inner join categorias on productos.id_categoria = categorias.id_categoria where fecha_baja is null and stock > 0 order by cantidad_vendida desc limit 4;";
                    $sqlResultado = mysql_query($sql, $link) or die(redirigirPaginaError(mysql_errno(), mysql_error(), basename($_SERVER['PHP_SELF'])));
                    while ($fila = mysql_fetch_array($sqlResultado)) {
                        ?>
                        <div class="col-md-3 col-sm-6 md-margin-bottom-30">
                            <div class="product-img">
                                <a href="detalleProducto.php?id_producto=<?php echo $fila['id_producto']; ?>"><img class="full-width img-responsive" src="<?php echo $fila['imagen']; ?>" alt="<?php echo "Ver producto ".$fila['descripcion']; ?>"></a>
                                <!--<a class="add-to-cart" href="detalleProducto.php?id_producto=<?php echo $fila['id_producto']; ?>"><i class="fa fa-shopping-cart"></i>Ver producto</a> -->
                            </div>
                            <div class="product-description product-description-brd">
                                <div class="overflow-h margin-bottom-5">
                                    <div class="pull-left">
                                        <h3 class="title-price"><a href="detalleProducto.php?id_producto=<?php echo $fila['id_producto']; ?>"><?php echo $fila['descripcion']; ?></a></h3>
                                        <span class="gender"><?php echo $fila['desc_cat']; ?></span>
                                    </div>
                                    <div class="product-price">
                                        <span class="title-price"><?php echo "$" . $fila['precio']; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    mysql_free_result($sqlResultado);
                    mysql_close($link);
                    ?>
                </div> 
                <!--=== End Illustration v2 ===-->
            </div>
            <!--=== End Product Content ===-->

            <!--=== Footer v4 ===-->
            <div class="footer-v4">
                <div class="footer">
                    <div class="container">
                        <div class="row">
                            <!-- About -->
                            <div class="col-md-4 md-margin-bottom-40">
                                <a href="index.php"><img class="footer-logo" src="img/logo-2.png" alt="Logo"></a>
                            </div>

                            <div class="col-md-4 md-margin-bottom-40">

                            </div>

                            <div class="col-md-4 md-margin-bottom-40">
                                <ul class="list-unstyled address-list margin-bottom-20">
                                    <li><i class="fa fa-angle-right"></i>Mendoza 5500, Rosario, Argentina</li>
                                    <li><i class="fa fa-angle-right"></i>Teléfono: 3413456789</li>
                                    <li><i class="fa fa-angle-right"></i>Correo: contacto@hogarify.com</li>
                                    <li><a href="mapadelsitio.php">Mapa del Sitio</a></li>                                    
                                </ul>

                            </div>
                            <!-- End Simple List -->
                        </div><!--/end row-->
                    </div><!--/end continer-->
                </div><!--/footer-->

                <div class="copyright">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">                     
                                <p>
                                    Derechos de autor &copy; 2020 - Hogarify
                                </p>
                            </div>
                        </div>
                    </div> 
                </div><!--/copyright--> 
            </div>
            <!--=== End Footer v4 ===-->
        </div><!--/wrapper-->

        <!-- JS Global Compulsory -->
        <script  src="plugins/jquery/jquery.min.js"></script>
        <script  src="plugins/jquery/jquery-migrate.min.js"></script>
        <script  src="plugins/bootstrap/js/bootstrap.min.js"></script>
        <!-- JS Implementing Plugins -->
        <script  src="plugins/back-to-top.js"></script>
        <script  src="plugins/smoothScroll.js"></script>
        <script  src="plugins/jquery.parallax.js"></script>
        <script  src="plugins/owl-carousel/owl-carousel/owl.carousel.js"></script>
        <script  src="plugins/scrollbar/js/jquery.mCustomScrollbar.concat.min.js"></script>
        <!--<script  src="plugins/revolution-slider/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
        <script  src="plugins/revolution-slider/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>-->
        <!-- JS Customization -->
        <script  src="js/custom.js"></script>
        <!-- JS Page Level -->
        <script  src="js/shop.app.js"></script>
        <script  src="js/plugins/owl-carousel.js"></script>
        <!--<script  src="js/plugins/revolution-slider.js"></script>-->
        <script>
                                                            jQuery(document).ready(function () {
                                                                App.init();
                                                                App.initScrollBar();
                                                                App.initParallaxBg();
                                                                OwlCarousel.initOwlCarousel();
//                                                                RevolutionSlider.initRSfullWidth();
                                                            });
        </script>
        <!--[if lt IE 9]>
            <script src="plugins/respond.js"></script>
            <script src="plugins/html5shiv.js"></script>
            <script src="js/plugins/placeholder-IE-fixes.js"></script>
        <![endif]-->

    </body>
</html> 