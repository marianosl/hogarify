<!DOCTYPE html>
<html lang="es"> 
    <head>
        <title>Hogarify | Contacto</title>

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
                                                        <img src="<?php echo $value['imagen']; ?>" alt="Producto">              
                                                        <input type="hidden" name="paginaADireccionar" value="contacto.php"/>
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
                                <li><a href="productos.php">Productos</a></li>
                                <!-- PRODUCTOS -->
                                <!-- Contacto -->
                                <li class="active"><a href="#">Contacto</a></li>
                                <!-- Contacto -->

                            </ul>
                            <!-- End Nav Menu -->
                        </div>
                    </div>    
                </div>            
                <!-- End Navbar -->
            </div>
            <!--=== End Header v5 ===-->
            <!--=== Content Part ===-->
            <div class="container content">
                <div class="row margin-bottom-30">
                    <div class="col-md-9 mb-margin-bottom-30">
                        <div class="headline"><h2>Contacto</h2></div>
                        <p>Escríbanos y a la brevedad nos contactaremos con usted.</p><br />

                        <form action="enviarMailContacto.php" method="post" id="sky-form-contacto" class="sky-form contact-style">
                            <fieldset class="no-padding">
                                <label>Nombre <span class="color-red">*</span></label>
                                <div class="row sky-space-20">
                                    <div class="col-md-7 col-md-offset-0">
                                        <div>
                                            <input type="text" name="txtName" id="txtName" class="form-control" autofocus>
                                        </div>
                                    </div>
                                </div>

                                <label>Email <span class="color-red">*</span></label>
                                <div class="row sky-space-20">
                                    <div class="col-md-7 col-md-offset-0">
                                        <div>
                                            <input type="text" name="txtEmail" id="txtEmail" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <label>Mensaje <span class="color-red">*</span></label>
                                <div class="row sky-space-20">
                                    <div class="col-md-11 col-md-offset-0">
                                        <div>
                                            <textarea rows="8" name="txtMessage" id="txtMessage" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <p><button type="submit" class="btn-u">Enviar mensaje</button></p>
                            </fieldset>
                        </form>
                        <div id="contacto-mensajeenviado" class="submited">
                            <i class="rounded-x fa fa-check"></i>
                            <p>Su mensaje ha sido enviado correctamente</p>
                        </div>
                    </div><!--/col-md-9-->

                    <div class="col-md-3">
                        <!-- Contacts -->
                        <div class="headline"><h2>Información</h2></div>
                        <ul class="list-unstyled who margin-bottom-30">
                            <li><a href="https://www.google.com/maps/place/Mendoza+5500,+S2008BPJ+Rosario,+Santa+Fe/" target="_blank"><i class="fa fa-home"></i>Mendoza 5500, Rosario, Argentina</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i>contacto@hogarify.com</a></li>
                            <li><a href="#"><i class="fa fa-phone"></i>3413456789</a></li>
                        </ul>

                        <!-- Business Hours -->
                        <div class="headline"><h2>Abierto</h2></div>
                        <ul class="list-unstyled margin-bottom-30">
                            <li><strong>Lunes-Viernes:</strong> 08:00 a 17:00 hs</li>
                            <li><strong>Sábado:</strong> 08:00 a 12:00 hs</li>
                            <li><strong>Domingo:</strong> Cerrado</li>
                        </ul>

                        <!-- Why we are? -->
                        <div class="headline"><h2>Por qué comprar con nosotros?</h2></div>
                        <p>Porque somos la mejor opción para rediseñar <strong>tu hogar</strong> a <strong>tu medida</strong>.</p>
                        <p>Comprar con nosotros es:</p>
                        <ul class="list-unstyled">
                            <li><i class="fa fa-check color-green"></i> Fácil!</li>
                            <li><i class="fa fa-check color-green"></i> Económico!</li>
                            <li><i class="fa fa-check color-green"></i> Calidad garantizada!</li>
                        </ul>
                    </div><!--/col-md-3-->
                </div><!--/row-->

            </div><!--/container-->
            <!--=== End Content Part ===-->


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
        <script  src="plugins/scrollbar/js/jquery.mCustomScrollbar.concat.min.js"></script>
        <!-- Sky forms pro -->
        <script  src="plugins/sky-forms-pro/skyforms/js/jquery.form.min.js"></script>
        <script  src="plugins/sky-forms-pro/skyforms/js/jquery.validate.min.js"></script>
        <!-- JS Customization -->
        <script  src="js/custom.js"></script>
        <!-- JS Page Level -->
        <script  src="js/shop.app.js"></script>
        <script  src="js/forms/contacto.js"></script>

        <script  src="js/forms/product-quantity.js"></script>
        <script  >
                                                            jQuery(document).ready(function () {
                                                                App.init();
                                                                App.initScrollBar();
                                                                Contacto.init();
                                                            });
        </script>

        <!--[if lt IE 9]>
            <script src="plugins/respond.js"></script>
            <script src="plugins/html5shiv.js"></script>
            <script src="js/plugins/placeholder-IE-fixes.js"></script>    
        <![endif]-->

    </body>
</html> 