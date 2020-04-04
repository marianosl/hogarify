<?php

$email = $_POST["txtEmail"];
$password = $_POST["txtPass"];
include("conexion.php");
include("redirigirPaginaError.php");
$sql = "select * from usuarios where email = '$email' and password = '$password' and fecha_baja is null;";
$sqlResultado = mysql_query($sql, $link) or die(redirigirPaginaError(mysql_errno(), mysql_error(), basename($_SERVER['PHP_SELF'])));
mysql_close($link);
if ($fila = mysql_fetch_array($sqlResultado)) {
    session_start();
    $_SESSION['nombre'] = $fila['nombre'];
    $_SESSION['email'] = $fila['email'];
    $_SESSION['rol'] = $fila['rol'];

    if ($fila['rol'] == 0) {
        mysql_free_result($sqlResultado);
        header('Location: admin/admin.php');
    } else {
        mysql_free_result($sqlResultado);
        header('Location: index.php');
    }
} else {
    //header('Location: login.php?errorLogin');
    ?>
}
    <form action='login.php?errorLogin' method='post' name='frm'>
        <input type='hidden' id='hfEmail' name='hfEmail' value='<?php echo $email; ?>'>
    </form>

    <script language="JavaScript">
        document.frm.submit();
    </script>
    <?php
    
}
?>