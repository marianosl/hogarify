<!DOCTYPE html>
<html lang="es"> 
<head>
    <title>Hogarify | Productos</title>

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
    <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/shop.style.css">
    
    <!-- CSS Header and Footer -->
    <link rel="stylesheet" href="css/headers/header.css">
    <link rel="stylesheet" href="css/footers/footer.css">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="plugins/animate.css">    
    <link rel="stylesheet" href="plugins/line-icons/line-icons.css">
    <link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="plugins/noUiSlider/jquery.nouislider.min.css">
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
            <div class="container">
                <ul class="list-inline right-topbar pull-right">
                    <?php

                        session_start();
                        if (isset($_SESSION['email'])){
                    ?>
                            <li>Bienvenido, 
                                <span id="nombreUsuario"> <?php echo $_SESSION['nombre'] ?> </span>
                                | 
                                <a class="salirLogout" href="logout.php">Salir</a>
                            </li>
                    <?php
                        }
                        else{
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
                            <span class="badge badge-sea rounded-x"><?php echo (isset($_SESSION['carro']))? count($_SESSION['carro']) : 0 ;?></span>
                            <ul class="list-unstyled badge-open scrollbar" data-mcs-theme="minimal-dark">
                        	<?php 
                            	if(isset($_SESSION['carro'])){
                                    foreach ($_SESSION['carro'] as $key => $value) {
                        	?>
	                                <li>
	                                	<form action="eliminarProductoDelCarro.php" name="bajaProductoCompra" method="post">
		                                    <img src="<?php echo $value['imagen']; ?>" alt="Producto">              
		                                    <input type="hidden" name="paginaADireccionar" value="productos.php"/>
		                                    <input type="hidden" name="hfIdProducto" value="<?php echo $key; ?>"/>
		                                    <input type="submit" class="close" name="borrar_productoCompra" value="x" />
		                                    <div class="overflow-h">
		                                        <span><?php echo $value['descripcion']; ?></span>
		                                        <small><?php echo $value['cantidad']; ?> x <?php echo $value['precio']; ?> = <?php echo '$' . $value['subtotal'];?></small>
		                                    </div>
	                                    </form>    
	                                </li>
                            <?php 
                                    }
                                }
                                $total = 0;
                                if(isset($_SESSION['carro']))
                                {
                                    foreach ($_SESSION['carro'] as $key => $value) {
                                          $total = $total + $value['subtotal'];
                                      }  
                                }
                            ?>                                
                                <li class="subtotal">
                                    <div class="overflow-h margin-bottom-10">
                                        <span>Total</span>
                                        <span class="pull-right subtotal-cost"><?php echo "$".$total ?></span>
                                    </div>
                                    <div class="row">    
                                        <div class="col-xs-12">
                                        <?php
                                            if(isset($_SESSION['email']) && isset($_SESSION['carro']))
                                            {
                                        ?>
                                                <a href="confirmarCompra.php" class="btn-u btn-brd btn-brd-hover btn-u-sea-shop btn-block">Confirmar compra</a>
                                        <?php   
                                            }
                                            else if (isset($_SESSION['carro']))
                                            {
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
                        <li class="active"><a href="#">Productos</a></li>
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

    <!--=== Breadcrumbs v4 ===-->
    <div class="breadcrumbs-v4">
        <div class="container">
            <h1>
            <?php                             
                include("conexion.php");
                include("redirigirPaginaError.php");

                $sql="select * from categorias where fecha_baja is null order by descripcion";
                $sqlResultado = mysql_query($sql, $link) or die(redirigirPaginaError(mysql_errno(), mysql_error(), basename($_SERVER['PHP_SELF'])));

            	if (isset($_REQUEST['id_categoria'])){
                    $idCategoria = $_REQUEST['id_categoria'];
                    $sql="select * from categorias where fecha_baja is null and id_categoria = '$idCategoria';";
                    $sqlResultado = mysql_query($sql, $link) or die(redirigirPaginaError(mysql_errno(), mysql_error(), basename($_SERVER['PHP_SELF'])));
                    $fila = mysql_fetch_array($sqlResultado);
                    echo $fila['descripcion'];
                }
                else{
            		echo 'Todos los productos';
                }
            ?>
			</h1>
        </div><!--/end container-->
    </div> 
    <!--=== End Breadcrumbs v4 ===-->

    <!--=== Content Part ===-->
    <div class="content container">
        <div class="row">
            <div class="col-md-3 filter-by-block md-margin-bottom-60">
                <h1>Filtrar por:</h1>
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                    Categoría
                                    <i class="fa fa-angle-down"></i>
                                </a>
                            </h2>
                        </div>
                       
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <ul id="ulCollapseOne" class="list-unstyled checkbox-list">
                                	
                            	<?php
                                    $sql="select * from categorias where fecha_baja is null;";
                                    $sqlResultado = mysql_query($sql, $link) or die(redirigirPaginaError(mysql_errno(), mysql_error(), basename($_SERVER['PHP_SELF'])));
						            if (isset($idCategoria)){
					            ?>
						            	<li><a href="productos.php"> Todos los productos</a></li>
                                    <?php
                                        while($fila = mysql_fetch_array($sqlResultado))
                                        {						            	
						            		if($fila['id_categoria'] == $idCategoria){
                                    ?>
						            			<li class="active"><a href="#"> <?php echo $fila['descripcion']; ?></a></li>
                                        <?php
						            		} 
                                            else {
                                        ?>
						            		<li><a href="productos.php?id_categoria=<?php echo $fila['id_categoria'];?>"> <?php echo $fila['descripcion'];?></a></li>
					            	<?php
						            		}
						            	}
						            } 
                                    else {
                                    ?>
					            		<li class="active"><a href="#"> Todos los productos</a></li>
                                    <?php
                                        while($fila = mysql_fetch_array($sqlResultado))
                                        {
                                    ?>
						            		<li><a href="productos.php?id_categoria=<?php echo $fila['id_categoria'];?>"><?php echo $fila['descripcion'];?></a></li>
                                <?php
				            			}
						            }
                                ?>
                                </ul>        
                            </div>
                        </div>
                    </div>
                </div><!--/end panel group-->
			</div>

            <div class="col-md-9">
                <div class="row margin-bottom-5">
                    
                    
                </div><!--/end result category-->
			<?php
                if(isset($idCategoria))
                {
                    $sql = "select id_producto, productos.descripcion, precio, stock, cantidad_vendida, especificacion, productos.id_categoria, categorias.descripcion as desc_cat, imagen from productos inner join categorias on productos.id_categoria = categorias.id_categoria where productos.id_categoria = '$idCategoria' and stock > 0;";
                }
                else
                {
                    $sql = "select id_producto, productos.descripcion, precio, stock, cantidad_vendida, especificacion, productos.id_categoria, categorias.descripcion as desc_cat, imagen from productos inner join categorias on productos.id_categoria = categorias.id_categoria where categorias.fecha_baja is null and stock > 0 order by productos.descripcion;";
                }                    
                $sqlResultado = mysql_query($sql, $link) or die(redirigirPaginaError(mysql_errno(), mysql_error(), basename($_SERVER['PHP_SELF'])));
                $cantidad = mysql_num_rows($sqlResultado);
                ?>
                <div class="filter-results">
                <?php
                    $i = 0;
                    while ($fila = mysql_fetch_array($sqlResultado)){
                    	if($i%3 == 0){
                ?>
                    	   <div class="row illustration-v2 margin-bottom-30">
                    <?php
                    	}
                	?>
                		<div class="col-md-4">
                            <div class="product-img product-img-brd">
                                <a href="detalleProducto.php?id_producto=<?php echo $fila['id_producto']; ?>"><img class="full-width img-responsive" src="<?php echo $fila['imagen'];?>" alt="Producto"></a>
                                <a class="add-to-cart" href="detalleProducto.php?id_producto=<?php echo $fila['id_producto'];?>"><i class="fa fa-shopping-cart"></i>Ver producto</a>
                            </div> 
                            <div class="product-description product-description-brd margin-bottom-30">
                                <div class="overflow-h margin-bottom-5">
                                    <div class="pull-left">
                                        <h4 class="title-price"><a href="detalleProducto.php?id_producto=<?php echo $fila['id_producto']; ?>"><?php echo $fila['descripcion'];?></a></h4>
                                        
                                        <span class="gender"><?php echo $fila['desc_cat'];?></span>
                                    </div>    
                                    <div class="product-price">
                                        <span class="title-price"><?php echo "$" . $fila['precio']; ?></span>
                                    </div>
                                </div>    
                                   
                            </div>
                        </div>
                	<?php
                        if ($i%3 == 2 || $i == ($cantidad - 1)){
                	?>
           		  	        </div>
        	<?php
                	   } 
                    $i++;
                }
                mysql_free_result($sqlResultado);
                mysql_close($link);
            ?>
                
                </div><!--/end filter resilts-->
            </div>
        </div><!--/end row-->
    </div><!--/end container-->  
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
<script  src="plugins/noUiSlider/jquery.nouislider.all.min.js"></script>
<script  src="plugins/scrollbar/js/jquery.mCustomScrollbar.concat.min.js"></script>
<!-- JS Customization -->
<script  src="js/custom.js"></script>
<!-- JS Page Level -->           
<script  src="js/shop.app.js"></script>
<script  src="js/plugins/mouse-wheel.js"></script>
<script>
    jQuery(document).ready(function() {
        App.init();
        App.initScrollBar();        
        MouseWheel.initMouseWheel();     
    });
</script>
<!--[if lt IE 9]>
    <script src="plugins/respond.js"></script>
    <script src="plugins/html5shiv.js"></script>
    <script src="js/plugins/placeholder-IE-fixes.js"></script>    
<![endif]-->
<!--[if lt IE 10]>
    <script src="plugins/sky-forms-pro/skyforms/js/jquery.placeholder.min.js"></script>
<![endif]-->

</body>
</html> 