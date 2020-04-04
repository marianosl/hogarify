<!DOCTYPE html>
<html lang="es"> 
    <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
            <title>ABM Compras</title>

            <?php
            include("../inc/checkAdmin.inc");
            ?>

            <link rel="stylesheet" type="text/css" href="../css/admin/ABMCompras.css"/>
            <script type='text/javascript' src='../plugins/jquery/jquery-2.2.1.min.js'></script>
            <script type='text/javascript' src='../js/admin/ABMCompras.js'></script>
        </head>

        <body>

            <?php
            session_start();
            if (isset($_SESSION['email'])) {
                if ($_SESSION['rol'] == 0) {
                    ?>
                    <a href="../logout.php" class="btn btn-xs btn-danger">
                        <span class="glyphicon glyphicon-remove"></span> 
                        Cerrar Sesión
                    </a>

                    <h2 class="texto">Listado de Compras</h2>
                    <div class="table-bajarcategoriaresponsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nº de compra</th>
                                    <th>Email</th>
                                    <th>Productos</th>
                                    <th>Fecha y hora</th>
                                    <th>Total</th>
                                    <th>Nro tarjeta</th>
                                    <th>Cod. seguridad</th>
                                    <th>Modificar</th>
                                    <th>Borrar</th>
                                </tr>
                            </thead>

                            <tbody>
        <?php
        include("../conexion.php");
        include("redirigirPaginaAdminError.php");
        $sql = "select nro_compra, fecha_hora, total, compras.email, nro_tarjeta, cod_seguridad from compras inner join usuarios on compras.email = usuarios.email where fecha_baja is null;";
        $sqlResultado = mysql_query($sql, $link) or die(redirigirPaginaError(mysql_errno(), mysql_error(), basename($_SERVER['PHP_SELF'])));
        $i = 0;
        while ($fila = mysql_fetch_array($sqlResultado)) {
            $nroCompra = $fila['nro_compra'];
            ?>
                                    <tr>
                                        <td><?php echo $nroCompra ?></td>
                                        <td><?php echo $fila['email']; ?></td>
                                        <td>
                                            <div class="table-bajarcategoriaresponsive">
                                                <button type="button" class="btn btn-primary" id="btnMostrarProductoCantidad<?php echo $i; ?>" onclick="mostrarProductoCantidad(<?php echo $i; ?>)" style="float: left;">
                                                    Mostrar/Ocultar Producto-Cantidad
                                                </button>
                                                <br/>
                                                <table class="table table-bordered tablaProductoCantidad" id="tablaProductoCantidad<?php echo $i; ?>">
                                                    <thead>
                                                        <tr>
                                                            <th>Producto</th>
                                                            <th>Cantidad</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
            <?php
            $sql2 = "select productos_cantidad_compra.*, productos.descripcion from productos_cantidad_compra inner join productos on productos_cantidad_compra.id_producto = productos.id_producto where nro_compra = '$nroCompra'";
            $sqlResultado2 = mysql_query($sql2, $link) or die(redirigirPaginaError(mysql_errno(), mysql_error(), basename($_SERVER['PHP_SELF'])));
            while ($fila2 = mysql_fetch_array($sqlResultado2)) {
                ?>
                                                            <tr>
                                                                <td><?php echo $fila2['descripcion']; ?></td>
                                                                <td><?php echo $fila2['cantidad']; ?></td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        mysql_free_result($sqlResultado2);
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>

                                        <td><?php echo date_format(date_create($fila['fecha_hora']), 'd/m/Y H:i'); ?></td>
                                        <td><?php echo $fila['total']; ?></td>
                                        <td><?php echo $fila['nro_tarjeta']; ?></td>
                                        <td><?php echo $fila['cod_seguridad']; ?></td>

                                        <td><a href="modificarCompra.php?nro_compra=<?php echo $nroCompra; ?>" class="btn btn-sm btn-warning">Modificar</a></td>
                                        <td>
                                            <form action="bajaCompra.php" name="bajaCompra" method="post">
                                                <input type="hidden" name="nro_compra" value="<?php echo $nroCompra; ?>"/>
                                                <input type="submit" name="borrar_compra" value="Borrar" onclick="return confirm('Seguro que quieres eliminar la compra <?php echo $nroCompra; ?>);" class="btn btn-sm btn-danger"/>
                                            </form>
                                        </td>
                                    </tr>
            <?php
            $i++;
        }
        mysql_free_result($sqlResultado);
        mysql_close($link);
        ?>
                            </tbody>
                        </table>
                        <a href="altaCompra.php" class="btn btn-sm btn-success" style="float: right;">
                            <span class="glyphicon glyphicon-plus-sign"></span> 
                            Agregar una nueva compra
                        </a>
                    </div>
                    <br/>
                    <a href="admin.php" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-arrow-left"></span>Atrás</a>
                    <div class="mapadelsitio" style="margin: 2em auto">
                        <p style="text-align: center">
                            <a href="mapadelsitioadmin.php">Mapa del Sitio Administrador</a>
                        </p>
                    </div>
        <?php
    } else {
        ?>
                    <script  language="javascript">
                        window.alert("No tienes permisos de administrador para acceder a esta página");
                        window.location.replace("../index.php");
                    </script>
                    <?php
                }
            } else {
                header('Location: ../index.php');
            }
            ?>
        </body>
    </html>