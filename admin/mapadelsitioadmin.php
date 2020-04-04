<!DOCTYPE html>
<html lang="es"> 
    <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
            <title>Mapa del Sitio Administrador</title>

            <?php
            include("../inc/checkAdmin.inc");
            ?>
            <link rel="stylesheet" href="../css/admin/mapadelsitioadmin.css">
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
                    <br/>
                    <br/>

                    <div class="mapadelsitio">
                        <ul>
                            <li><a href="admin.php">Inicio Admin</a></li>
                            <ul>
                                <li><a href="ABMUsuarios.php">ABM Usuarios</a></li>
                                <li><a href="ABMCategorias.php">ABM Categorias</a></li>
                                <li><a href="ABMProductos.php">ABM Productos</a></li>
                                <li><a href="ABMCompras.php">ABM Compras</a></li>                                
                            </ul>            
                        </ul>
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