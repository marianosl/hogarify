<!DOCTYPE html>
<html lang="es"> 
    <head>
        <title>Hogarify | Detalles del producto</title>

        <!-- Meta -->
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Comprá online y decorá tu casa!">
        <meta name="author" content="Mariano Lapunzina">

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
        <link rel="stylesheet" href="plugins/sky-forms-pro/skyforms/css/sky-forms.css">
        <link rel="stylesheet" href="plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.css">
        <link rel="stylesheet" href="plugins/master-slider/quick-start/masterslider/style/masterslider.css">
        <link rel='stylesheet' href="plugins/master-slider/quick-start/masterslider/skins/default/style.css">

        <!-- Style Switcher -->
        <link rel="stylesheet" href="css/plugins/style-switcher.css">

        <!-- CSS Theme -->
        <link rel="stylesheet" href="css/theme-colors/default.css">

        <!-- CSS Customization -->
        <link rel="stylesheet" href="css/custom.css">
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
                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                    <span class="badge badge-sea rounded-x"><?php echo (isset($_SESSION['carro'])) ? count($_SESSION['carro']) : 0; ?></span>
                                    <ul class="list-unstyled badge-open scrollbar" data-mcs-theme="minimal-dark">
                                        <?php
                                        if (isset($_SESSION['carro'])) {
                                            foreach ($_SESSION['carro'] as $key => $value) {
                                                ?>
                                                <li>
                                                    <form action="eliminarProductoDelCarro.php" name="bajaProductoCompra" method="post">
                                                        <img src="<?php echo $value['imagen']; ?>" alt="Imágen de producto">              
                                                        <input type="hidden" name="paginaADireccionar" value="detalleProducto.php"/>
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
                                <li><a href="index.php">Inicio</a></li>
                                <!-- HOME -->
                                <!-- PRODUCTOS -->
                                <li class="active"><a href="productos.php">Productos</a></li>
                                <!-- PRODUCTOS -->
                                <!-- Contacto -->
                                <li><a href="contacto.php">Contacto</a></li>
                                <!-- Contacto -->

                            </ul>
                            <!-- End Nav Menu -->
                        </div>
                    </div>    
                </div>            
                <!-- End Navbar -->
            </div>
            <!--=== End Header v5 ===-->
            <!--=== Shop Product ===-->
            <div class="shop-product">
                <?php
                include("conexion.php");
                include("redirigirPaginaError.php");
                $idProducto = $_REQUEST['id_producto'];
                $sql = "select productos.*, categorias.descripcion as desc_cat from productos inner join categorias on productos.id_categoria = categorias.id_categoria where id_producto = '$idProducto';";
                $sqlResultado = mysql_query($sql, $link) or die(redirigirPaginaError(mysql_errno(), mysql_error(), basename($_SERVER['PHP_SELF'])));

                $fila = mysql_fetch_array($sqlResultado);
                $idCategoria = $fila['id_categoria'];
                ?>
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 md-margin-bottom-50">
                            <div class="ms-showcase2-template">
                                <!-- Master Slider -->
                                <div class="master-slider ms-skin-default" id="masterslider">
                                    <div class="ms-slide">
                                        <img class="ms-brd" src="assets/img/blank.gif" data-src="<?php echo $fila['imagen']; ?>" alt="Imágen de producto">
                                    </div>
                                </div>
                                <!-- End Master Slider -->
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="shop-product-heading">
                                <h2><?php echo $fila['descripcion']; ?></h2>
                            </div><!--/end shop product social-->



                            <p><?php echo $fila['especificacion']; ?></p><br>

                            <ul class="list-inline shop-product-prices margin-bottom-30">
                                <li class="shop-red">$<?php echo $fila['precio']; ?></li>
                            </ul><!--/end shop product prices-->

                            <h3 class="shop-product-title">Cantidad</h3>
                            <div class="margin-bottom-30 padding-bottom-30 add-to-wishlist-brd">
                                <form name="f1" method="post" action="agregarProductoAlCarro.php" class="product-quantity sm-margin-bottom-20">          
                                    <input type='hidden' id='hfIdProducto' name='hfIdProducto' value='<?php echo $fila['id_producto']; ?>'>
                                    <input type='hidden' id='hfDescProducto' name='hfDescProducto' value='<?php echo $fila['descripcion']; ?>'>
                                    <input type='hidden' id='hfDescCategoria' name='hfDescCategoria' value='<?php echo $fila['desc_cat']; ?>'>
                                    <input type='hidden' id='hfPrecio' name='hfPrecio' value='<?php echo $fila['precio']; ?>'>
                                    <input type='hidden' id='hfImagen' name='hfImagen' value='<?php echo $fila['imagen']; ?>'>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button type='button' class="quantity-button" name='subtract' onclick='disminuirTxtCantidad(document.getElementById("txtCantidad").value)' value='-'>-</button>
                                            <input type='number' min='1' max='10' class="quantity-field" name='txtCantidad' value="1" id='txtCantidad' readonly/>
                                            <button type='button' class="quantity-button" name='add' onclick='incrementarTxtCantidad(document.getElementById("txtCantidad").value, <?php echo $fila['stock']; ?>);' value='+'>+</button>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="submit" class="btn-u btn-u-sea-shop btn-u-lg">Agregar al carro</button>
                                        </div>
                                    </div>
                                </form>

                            </div><!--/end product quantity-->    

                            <p class="wishlist-category"><strong>Categoría: </strong><?php echo $fila['desc_cat']; ?></p>
                        </div>
                    </div><!--/end row-->
                </div>    
            </div>
            <!--=== End Shop Product ===-->

            <!--=== Illustration v2 ===-->
            <div class="container">
                <div class="heading heading-v1 margin-bottom-20">
                    <h2>Productos Relacionados</h2>
                </div>

                <div class="illustration-v2 margin-bottom-60">
                    <div class="customNavigation margin-bottom-25">
                        <a class="owl-btn prev rounded-x"><i class="fa fa-angle-left"></i></a>
                        <a class="owl-btn next rounded-x"><i class="fa fa-angle-right"></i></a>
                    </div>

                    <ul class="list-inline owl-slider-v4">
                        <?php
                        $sql = "select * from productos where id_categoria = '$idCategoria' and id_producto != '$idProducto' and stock > 0;";
                        $sqlResultado = mysql_query($sql, $link) or die(redirigirPaginaError(mysql_errno(), mysql_error(), basename($_SERVER['PHP_SELF'])));

                        while ($fila = mysql_fetch_array($sqlResultado)) {
                            ?>
                            <li class="item">
                                <a href="detalleProducto.php?id_producto=<?php echo $fila['id_producto']; ?>"><img class="img-responsive" src="<?php echo $fila['imagen']; ?>" alt="Imágen de producto"></a>
                                <div class="product-description-v2">
                                    <div class="margin-bottom-5">
                                        <h4 class="title-price"><a href="#"><?php echo $fila['descripcion']; ?></a></h4>
                                        <span class="title-price">$<?php echo $fila['precio']; ?></span>
                                    </div>       
                                </div>
                            </li>  
                            <?php
                        }
                        mysql_free_result($sqlResultado);
                        mysql_close($link);
                        ?>  
                    </ul>
                </div> 
            </div>    
            <!--=== End Illustration v2 ===-->


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
        <script  src="plugins/owl-carousel/owl-carousel/owl.carousel.js"></script>
        <script  src="plugins/scrollbar/js/jquery.mCustomScrollbar.concat.min.js"></script>
        <!-- Master Slider -->
        <script  src="plugins/master-slider/quick-start/masterslider/masterslider.min.js"></script>
        <script  src="plugins/master-slider/quick-start/masterslider/jquery.easing.min.js"></script>
        <!-- JS Customization -->
        <script  src="js/custom.js"></script>
        <!-- JS Page Level -->
        <script  src="js/shop.app.js"></script>
        <script  src="js/plugins/owl-carousel.js"></script>
        <script  src="js/plugins/master-slider.js"></script>
        <script  src="js/forms/product-quantity.js"></script>
        <script  >
                                                jQuery(document).ready(function () {
                                                    App.init();
                                                    App.initScrollBar();
                                                    OwlCarousel.initOwlCarousel();
                                                    MasterSliderShowcase2.initMasterSliderShowcase2();
                                                });

                                                function incrementarTxtCantidad(cantidad, stock) {
                                                    if (cantidad >= stock) {
                                                        alert("Stock máximo");
                                                    }
                                                    else {
                                                        document.getElementById("txtCantidad").value++;
                                                    }
                                                }
                                                function disminuirTxtCantidad(cantidad) {
                                                    if (cantidad <= 1) {

                                                    }
                                                    else {
                                                        document.getElementById("txtCantidad").value--;
                                                    }
                                                }


        </script>

        <!--[if lt IE 9]>
            <script src="plugins/respond.js"></script>
            <script src="plugins/html5shiv.js"></script>
            <script src="js/plugins/placeholder-IE-fixes.js"></script>    
        <![endif]-->

    </body>
</html> 