<!DOCTYPE html>
<html lang="es"> 
    <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
            <title>ABM Productos</title>

            <?php
            include("../inc/checkAdmin.inc");
            ?>
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

                    <h2 class="texto">Listado de Productos</h2>
                    <div class="table-bajarcategoriaresponsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Id Producto</th>
                                    <th>Descripción</th>
                                    <th>Precio</th>
                                    <th>Stock</th>
                                    <th>Cantidad Vendida</th>
                                    <th>Especificación</th>
                                    <th>Categoría</th>
                                    <th>Modificar</th>
                                    <th>Borrar</th>
                                </tr>
                            </thead>

                            <tbody>
        <?php
        include("../conexion.php");
        include("redirigirPaginaAdminError.php");
        $sql = "select id_producto, productos.descripcion, precio, stock, cantidad_vendida, especificacion, productos.id_categoria, imagen, categorias.descripcion as descripcion_categoria from productos inner join categorias on productos.id_categoria = categorias.id_categoria where fecha_baja is null order by productos.descripcion;";
        $sqlResultado = mysql_query($sql, $link) or die(redirigirPaginaError(mysql_errno(), mysql_error(), basename($_SERVER['PHP_SELF'])));
        mysql_close($link);
        while ($fila = mysql_fetch_array($sqlResultado)) {
            ?>

                                    <tr>
                                        <td>
            <?php echo $fila["id_producto"]; ?>
                                        </td>
                                        <td>
                                            <?php echo $fila["descripcion"]; ?>
                                        </td>
                                        <td>
                                            <?php echo $fila["precio"]; ?>
                                        </td>
                                        <td>
                                            <?php echo $fila["stock"]; ?>
                                        </td>
                                        <td>
                                            <?php echo $fila["cantidad_vendida"]; ?>
                                        </td>
                                        <td>
                                            <?php echo $fila["especificacion"]; ?>
                                        </td>
                                        <td>
                                            <?php echo $fila["descripcion_categoria"]; ?>
                                        </td>

                                        <td>
                                            <a href="modificarProducto.php?id_producto=<?php echo $fila["id_producto"]; ?>" class="btn btn-sm btn-warning">Modificar</a>
                                        </td>
                                        <td>
                                            <a href="bajaProducto.php?id_producto=<?php echo $fila["id_producto"]; ?>" onclick="return confirm('Seguro que quieres eliminar el producto <?php echo $fila["descripcion"]; ?>?');" class="btn btn-sm btn-danger">Borrar</a>
                                        </td>
                                    </tr>
            <?php
        }
        mysql_free_result($sqlResultado);
        ?>
                            </tbody>
                        </table>
                        <a href="altaProducto.php" class="btn btn-sm btn-success" style="float: right;">
                            <span class="glyphicon glyphicon-plus-sign"></span> 
                            Agregar un nuevo producto
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
                        window.alert("¡No tienes permisos de administrador para acceder a esta página!");
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