<!DOCTYPE html>
<html lang="es"> 
    <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
            <title>ABM Usuarios</title>

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


                    <h2 class="texto">Listado de Usuarios</h2>
                    <div class="table-bajarcategoriaresponsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>E-mail</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Contraseña</th>
                                    <th>Dirección</th>
                                    <th>DNI</th>
                                    <th>Rol</th>
                                    <th>Modificar</th>
                                    <th>Borrar</th>
                                </tr>
                            </thead>

                            <tbody>
        <?php
        include("../conexion.php");
        include("redirigirPaginaAdminError.php");
        $sql = "select * from usuarios where fecha_baja is null";
        $sqlResultado = mysql_query($sql, $link) or die(redirigirPaginaError(mysql_errno(), mysql_error(), basename($_SERVER['PHP_SELF'])));
        mysql_close($link);
        while ($fila = mysql_fetch_array($sqlResultado)) {
            ?>
                                    <tr>
                                        <td><?php echo $fila['email']; ?></td>
                                        <td><?php echo $fila['nombre']; ?></td>
                                        <td><?php echo $fila['apellido']; ?></td>
                                        <td><?php echo $fila['password']; ?></td>
                                        <td><?php echo $fila['direccion']; ?></td>
                                        <td><?php echo $fila['dni']; ?></td>
                                        <td>
            <?php
            if ($fila['rol'] == 0) {
                echo "Administrador";
            } else {
                echo "Usuario";
            }
            ?>
                                        </td>
                                        <td><a href="modificarUsuario.php?email_usuario=<?php echo $fila['email']; ?>" class="btn btn-sm btn-warning">Modificar</a></td>
                                        <td>
                                            <form action="bajaUsuario.php" name="bajaUsuario" method="post">
                                                <input type="hidden" name="email_usuario" value="<?php echo $fila['email']; ?>"/>
                                                <input type="submit" name="borrar_usuario" value="Borrar" onclick="return confirm('Seguro que quieres eliminar el usuario <?php echo $fila ['email']; ?>?');" class="btn btn-sm btn-danger"/>
                                            </form>
                                        </td>
                                    </tr>
            <?php
        }
        mysql_free_result($sqlResultado);
        ?>
                            </tbody>
                        </table>
                        <a href="altaUsuario.php" class="btn btn-sm btn-success" style="float: right;">
                            <span class="glyphicon glyphicon-plus-sign"></span> 
                            Agregar un nuevo usuario
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