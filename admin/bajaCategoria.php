<?php
	session_start();
	
	if(isset($_SESSION['email']) && $_SESSION['rol'] == 0)
	{
		
    	include("../conexion.php");
		include("redirigirPaginaAdminError.php");
    	$idCategoria = $_REQUEST['id_categoria'];
    	$sql="update categorias set fecha_baja = current_timestamp() where id_categoria = ".$idCategoria;
    	mysql_query($sql, $link) or die(redirigirPaginaError(mysql_errno(), mysql_error(), basename($_SERVER['PHP_SELF'])));

    	mysql_close($link);
    	
    	header('Location: ABMCategorias.php');
	}
	else
	{
		header('Location: ../index.php');
	}
?>