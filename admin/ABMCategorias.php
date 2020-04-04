<!DOCTYPE html>
<html lang="es"> 
    <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
            <title>ABM Categorías</title>

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

                    <h2 class="texto">Listado de Categorías</h2>
                    <div class="table-bajarcategoriaresponsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Id Categoría</th>
                                    <th>Descripción</th>
                                    <th>Modificar</th>
                                    <th>Borrar</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                include("../conexion.php");
                                include("redirigirPaginaAdminError.php");
                                $sql = "select * from categorias where fecha_baja is null order by descripcion";
                                $sqlResultado = mysql_query($sql, $link) or die(redirigirPaginaError(mysql_errno(), mysql_error(), basename($_SERVER['PHP_SELF'])));
                                mysql_close($link);
                                while ($fila = mysql_fetch_array($sqlResultado)) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $fila["id_categoria"]; ?>
                                        </td>
                                        <td>
                                            <?php echo $fila["descripcion"]; ?>
                                        </td>
                                        <td>
                                            <a href="modificarCategoria.php?id_categoria=<?php echo $fila["id_categoria"]; ?>" class="btn btn-sm btn-warning">Modificar</a>
                                        </td>
                                        <td>
                                            <a href="bajaCategoria.php?id_categoria=<?php echo $fila["id_categoria"]; ?>" onclick="return confirm('Seguro que quieres eliminar la categoría <?php echo $fila["descripcion"]; ?>?');" class="btn btn-sm btn-danger">Borrar</a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                mysql_free_result($sqlResultado);
                                ?>
                            </tbody>
                        </table>
                        <a href="altaCategoria.php" class="btn btn-sm btn-success" style="float: right;">
                            <span class="glyphicon glyphicon-plus-sign"></span> 
                            Agregar una nueva categoría
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