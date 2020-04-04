<?php
	session_start();

	if(isset($_SESSION['email']) && $_SESSION['rol'] == 0)
	{
		include("../conexion.php");
		include("redirigirPaginaAdminError.php");

		$descripcion = $_POST['txtDescripcion'];

		$sql="insert into categorias (descripcion) values ('$descripcion');";

		mysql_query($sql,$link) or die(redirigirPaginaError(mysql_errno(), mysql_error(), basename($_SERVER['PHP_SELF'])));

		mysql_close($link);

		header('Location: altaCategoria.php?agregado');
	}
	else
	{
		header('Location: ../index.php');
	}
?>
	