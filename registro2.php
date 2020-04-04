<?php
$nombre = $_POST['txtNombre'];
$apellido = $_POST['txtApellido'];
$dni = $_POST['txtDNI'];
$direccion = $_POST['txtDireccion'];
$email = $_POST['txtEmail'];
$rol = 1;
$password = $_POST['txtPassword'];

include("conexion.php");
include("redirigirPaginaError.php");
$sql = "select * from usuarios where email = '$email';";
$sqlResultado = mysql_query($sql, $link) or die(redirigirPaginaError(mysql_errno(), mysql_error(), basename($_SERVER['PHP_SELF'])));
if (mysql_num_rows($sqlResultado) == 0) {

    $sql = "insert into usuarios (email, nombre, apellido, password, direccion, dni, rol) values ('$email', '$nombre', '$apellido', '$password', '$direccion', '$dni', '$rol');";
    mysql_query($sql, $link) or die(redirigirPaginaError(mysql_errno(), mysql_error(), basename($_SERVER['PHP_SELF'])));

    mysql_close($link);

    session_start();

    $_SESSION['email'] = $email;
    $_SESSION['rol'] = $rol;
    $_SESSION['nombre'] = $nombre;

    $fecha = date("d-m-Y");
    $hora = date("H:i:s");
    $destino = $_POST['txtEmail'];
    $asunto = "Registro Hogarify";
    $desde = 'From: registro@hogarify.com';
    $comentario = "
		\n
		Se ha registrado correctamente en nuestro sitio.\n
		Ya puede realizar su compra online!\n
		Gracias.\n
		\n
		Hogarify\n
		Enviado el $fecha a las $hora\n";
    mail($destino, $asunto, $comentario, $desde);


    header('Location: index.php');
} else {
    ?>
    Cargando...
    <form action='registro.php' method='post' name='frm'>
        <input type='hidden' id='hfNombre' name='hfNombre' value='<?php echo $nombre; ?>'>
        <input type='hidden' id='hfApellido' name='hfApellido' value='<?php echo $apellido; ?>'>
        <input type='hidden' id='hfDNI' name='hfDNI' value='<?php echo $dni; ?>'>
        <input type='hidden' id='hfDireccion' name='hfDireccion' value='<?php echo $direccion; ?>'>
        <input type='hidden' id='hfEmail' name='hfEmail' value='<?php echo $email; ?>'>
    </form>

    <script language="JavaScript">
        document.frm.submit();
    </script>
    <?php
}
?>