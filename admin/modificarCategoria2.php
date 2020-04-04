<?php
	session_start();

	if(isset($_SESSION['email']) && $_SESSION['rol'] == 0)
	{
  		include("../conexion.php");
		include("redirigirPaginaAdminError.php");

  		$idCategoria = $_POST['txtIdCategoria'];
  		$descripcion = $_POST['txtDescripcion'];

  		$sql="update categorias set descripcion = '$descripcion' where id_categoria = '$idCategoria';";

  		mysql_query($sql,$link) or die(redirigirPaginaError(mysql_errno(), mysql_error(), basename($_SERVER['PHP_SELF'])));

  		mysql_close($link);

    	header("Location: modificarCategoria.php?id_categoria=$idCategoria&modificado");
	}
	else
	{
		header('Location: ../index.php');
	}
?>