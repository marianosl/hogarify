<?php
	session_start();

	if(isset($_SESSION['email']) && $_SESSION['rol'] == 0)
	{
		include("../conexion.php");
		include("redirigirPaginaAdminError.php");
		$email = $_POST['txtEmail'];
		$nombre = $_POST['txtNombre'];
		$apellido = $_POST['txtApellido'];
		$password = $_POST['txtPassword'];
		$direccion = $_POST['txtDireccion'];
		$dni = $_POST['txtDNI'];
		$rol = $_POST['comboRol'];

		$sql = "insert into usuarios (email, nombre, apellido, password, direccion, dni, rol) values ('$email', '$nombre', '$apellido', '$password', '$direccion', '$dni', '$rol');";

		mysql_query($sql,$link) or die(redirigirPaginaError(mysql_errno(), mysql_error(), basename($_SERVER['PHP_SELF'])));

		mysql_close($link);

		header('Location: altaUsuario.php?agregado');
	}
	else
	{
		header('Location: ../index.php');
	}
?>
	