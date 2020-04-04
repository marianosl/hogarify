<!DOCTYPE html>
<html lang="es"> 
    <head>
        <title>Hogarify | Registrarse</title>

        <!-- Meta -->
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Comprá online y decorá tu casa!">
        <meta name="author" content="Mariano Lapunzina">
        
        <link rel="canonical" href="http://www.hogarify.ml/index.php">

        <!-- Favicon -->
        <link rel="shortcut icon" href="iconoH.ico">

        <!-- Web Fonts -->
        <link rel='stylesheet' type='text/css' href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin'>

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
        <link rel="stylesheet" href="plugins/scrollbar/css/jquery.mCustomScrollbar.css">

        <!-- CSS Page Style -->
        <link rel="stylesheet" href="css/pages/log-reg-v3.css">

        <!-- Style Switcher -->
        <link rel="stylesheet" href="css/plugins/style-switcher.css">

        <!-- CSS Theme -->
        <link rel="stylesheet" href="css/theme-colors/default.css">

        <!-- CSS Customization -->
        <link rel="stylesheet" href="css/custom.css">
    </head>

    <body class="header-fixed">
        <?php
        session_start();
        if (isset($_SESSION['email'])) {
            if ($_SESSION['rol'] == 0) {
                header('Location: admin/admin.php');
            } else {
                header('Location: index.php');
            }
        }

        if (isset($_POST['hfEmail'])) {
            ?>
            <script  language="javascript">
                window.alert("Usuario ya registrado previamente.");
            </script>
    <?php
}
?>

        <div class="wrapper">
            <!--=== Header v5 ===-->  
            <div class="header-v5 header-static">
                <!-- Topbar v3 -->
                <div class="topbar-v3">

                    <div class="container">
                        <ul class="list-inline right-topbar pull-right">
                            <li><a href="login.php">Ingreso</a></li>
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
                                                        <input type="hidden" name="paginaADireccionar" value="registro.php"/>
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

            <!--=== Login ===-->
            <div class="log-reg-v3 content-md">
                <div class="container">
                    <div class="">


                        <div style="width: 70%; min-width: 290px; margin: 0 auto;" class="">
                            <form id="sky-form-registro" class="log-reg-block sky-form" method="post" action="registro2.php">
                                <h2>Crear nueva cuenta</h2>

                                <div class="login-input reg-input">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <section>
                                                <label class="input">
                                                    <input type="text" name="txtNombre" placeholder="Nombre" class="form-control" value="<?php echo (isset($_POST['hfNombre'])) ? $_POST['hfNombre'] : ''; ?>" autofocus>
                                                </label>
                                            </section>
                                        </div>
                                        <div class="col-sm-6">
                                            <section>
                                                <label class="input">
                                                    <input type="text" name="txtApellido" placeholder="Apellido" class="form-control" value="<?php echo (isset($_POST['hfApellido'])) ? $_POST['hfApellido'] : ''; ?>">
                                                </label>
                                            </section>        
                                        </div>
                                    </div>  
                                    <section>
                                        <label class="input">
                                            <input type="text" name="txtDNI" placeholder="D.N.I." class="form-control" value="<?php echo (isset($_POST['hfDNI'])) ? $_POST['hfDNI'] : ''; ?>">
                                        </label>
                                    </section>      
                                    <section>
                                        <label class="input">
                                            <input type="text" name="txtDireccion" placeholder="Dirección" class="form-control" value="<?php echo (isset($_POST['hfDireccion'])) ? $_POST['hfDireccion'] : ''; ?>">
                                        </label>
                                    </section>          
                                    <section>
                                        <label class="input">
                                            <input type="email" name="txtEmail" placeholder="Email" class="form-control" value="<?php echo (isset($_POST['hfEmail'])) ? $_POST['hfEmail'] : ''; ?>">
                                        </label>
                                    </section>                                
                                    <section>
                                        <label class="input">
                                            <input type="password" name="txtPassword" placeholder="Contraseña" id="password" class="form-control">
                                        </label>
                                    </section>                                
                                    <section>
                                        <label class="input">
                                            <input type="password" name="txtPassword2" placeholder="Repetir Contraseña" class="form-control">
                                        </label>
                                    </section>                                
                                </div>
                                <button class="btn-u btn-u-sea-shop btn-block margin-bottom-20" type="submit">Crear cuenta</button>
                            </form>

                            <div class="margin-bottom-20"></div>
                            <p class="text-center">Ya tienes una cuenta? <a href="login.php">Ingreso</a></p>  
                        </div>
                    </div><!--/end row-->
                </div><!--/end container-->
            </div>
            <!--=== End Login ===-->

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
        <script  src="plugins/sky-forms-pro/skyforms/js/jquery.form.min.js"></script>
        <script  src="plugins/sky-forms-pro/skyforms/js/jquery.validate.min.js"></script>
        <!-- JS Customization -->
        <script  src="js/custom.js"></script>
        <!-- JS Page Level -->
        <script  src="js/shop.app.js"></script>
        <script  src="js/forms/registro.js"></script>
        <script  >
                                                            jQuery(document).ready(function () {
                                                                App.init();
                                                                Registro.initRegistration();
                                                                App.initScrollBar();
                                                            });
        </script>
        <!--[if lt IE 9]>
            <script src="plugins/respond.js"></script>
            <script src="plugins/html5shiv.js"></script>
            <script src="js/plugins/placeholder-IE-fixes.js"></script>    
            <script src="plugins/sky-forms-pro/skyforms/js/sky-forms-ie8.js"></script>
        <![endif]-->
        <!--[if lt IE 10]>
            <script src="plugins/sky-forms-pro/skyforms/js/jquery.placeholder.min.js"></script>
        <![endif]-->

    </body>
</html>