<?php
	session_start();
	if(isset($_SESSION['email']) && $_SESSION['rol'] == 0)
	{
		
    	include("../conexion.php");
		include("redirigirPaginaAdminError.php");
    	$nroCompra = $_REQUEST['nro_compra'];
    	$sql = "delete from productos_cantidad_compra where nro_compra = '$nroCompra'";
    	mysql_query($sql,$link) or die(redirigirPaginaError(mysql_errno(), mysql_error(), basename($_SERVER['PHP_SELF'])));

		$sql = "delete from compras where nro_compra = '$nroCompra';";
	   	mysql_query($sql, $link) or die(redirigirPaginaError(mysql_errno(), mysql_error(), basename($_SERVER['PHP_SELF'])));

    	mysql_close($link);
    	
    	header('Location: ABMCompras.php');
	}
	else
	{
		header('Location: ../index.php');
	}
?>