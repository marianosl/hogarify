<!DOCTYPE html>
<html lang="es"> 
    <head>
        <title>Hogarify | Compra realizada</title>

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
        <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/shop.style.css">

        <!-- CSS Header and Footer -->
        <link rel="stylesheet" href="css/headers/header.css">
        <link rel="stylesheet" href="css/footers/footer.css">

        <!-- CSS Implementing Plugins -->
        <link rel="stylesheet" href="plugins/animate.css">    
        <link rel="stylesheet" href="plugins/line-icons/line-icons.css">
        <link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="plugins/jquery-steps/css/custom-jquery.steps.css">
        <link rel="stylesheet" href="plugins/scrollbar/css/jquery.mCustomScrollbar.css">

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
                    <div class="search-open">
                        <div class="container">
                            <input type="text" class="form-control" placeholder="Search">
                            <div class="search-close"><i class="icon-close"></i></div>
                        </div>    
                    </div>

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
                            <!-- Nav Menu -->
                            <ul class="nav navbar-nav">
                                <!-- HOME -->
                                <li><a href="index.php">Inicio</a></li>
                                <!-- HOME -->
                                <!-- PRODUCTOS -->
                                <li><a href="productos.php">Productos</a></li>
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

            <div class="mensaje-compraexitosa">
                <div class="alert alert-success fade in">
                    <h4>Se ha realizado la compra exitosamente!</h4>
                    Su Nº de compra es <?php echo $_SESSION['nroCompra'] ?>
                </div>
            </div>

            <!--=== Content Medium Part ===-->
            <div class="content-md margin-bottom-30">
                <div class="container">
                    <form class="shopping-cart" role="form" method="post" action="AltaCompraServlet">
                        <div>
                            <section>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Producto</th>
                                                <th>Precio</th>
                                                <th>Cantidad</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($_SESSION['carro'] as $key => $value) {
                                                ?>
                                                <tr>
                                                    <td class="product-in-table">
                                                        <img class="img-responsive" src="<?php echo $value['imagen']; ?>" alt="Producto">
                                                        <div class="product-it-in">
                                                            <h3><?php echo $value['descripcion']; ?></h3>
                                                            <span><?php echo $value['categoria'] ?></span>
                                                        </div>
                                                    </td>
                                                    <td>$ <?php echo $value['precio']; ?></td>
                                                    <td>
                                                        <?php echo $value['cantidad']; ?>
                                                    </td>
                                                    <td class="shop-red">$ <?php echo $value['subtotal']; ?></td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </section>

                            <div class="coupon-code">
                                <div class="row">
                                    <div class="col-sm-3 col-sm-offset-5">
                                        <ul class="list-inline total-result">
                                            <li class="divider"></li>
                                            <li class="total-price">
                                                <h4>Total:</h4>
                                                <div class="total-result-in">
                                                    <?php
                                                    $total = 0;
                                                    foreach ($_SESSION['carro'] as $key => $value) {
                                                        $total = $total + $value['subtotal'];
                                                    }
                                                    unset($_SESSION['carro']);
                                                    unset($_SESSION['nroCompra']);
                                                    ?>
                                                    <span>$ <?php echo $total; ?></span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>    
                        </div>
                    </form>
                </div><!--/end container-->
            </div>
            <!--=== End Content Medium Part ===-->

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
        <script  src="plugins/jquery-steps/build/jquery.steps.js"></script>
        <script  src="plugins/scrollbar/js/jquery.mCustomScrollbar.concat.min.js"></script>
        <script  src="plugins/sky-forms-pro/skyforms/js/jquery.validate.min.js"></script>
        <!-- JS Customization -->
        <script  src="js/custom.js"></script>
        <!-- JS Page Level -->           
        <script  src="js/shop.app.js"></script>
        <script  src="js/forms/page_login.js"></script>
        <script  src="js/plugins/stepWizard.js"></script>
        <script  src="js/forms/product-quantity.js"></script>
        <script  >
            jQuery(document).ready(function () {
                App.init();
                App.initScrollBar();
                StepWizard.initStepWizard();
                //StyleSwitcher.initStyleSwitcher();      
            });
        </script>

        <!--[if lt IE 9]>
            <script src="plugins/respond.js"></script>
            <script src="plugins/html5shiv.js"></script>
            <script src="plugins/sky-forms-pro/skyforms/js/sky-forms-ie8.js"></script>
        <![endif]-->
        <!--[if lt IE 10]>
            <script src="plugins/sky-forms-pro/skyforms/js/jquery.placeholder.min.js"></script>
        <![endif]-->

    </body>
</html> 