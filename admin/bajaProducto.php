<?php
	session_start();

	if(isset($_SESSION['email']) && $_SESSION['rol'] == 0)
	{

    	include("../conexion.php");
		include("redirigirPaginaAdminError.php");
    	$idProducto = $_REQUEST['id_producto'];
		$sql = "delete from productos where id_producto = '$idProducto';";
    	mysql_query($sql, $link) or die(redirigirPaginaError(mysql_errno(), mysql_error(), basename($_SERVER['PHP_SELF'])));

    	mysql_close($link);
    	
    	header('Location: ABMProductos.php');
	}
	else
	{
		header('Location: ../index.php');
	}
?>
