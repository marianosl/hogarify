<?php
	session_start();
	
	if(isset($_SESSION['email']) && $_SESSION['rol'] == 0)
	{
		
    	include("../conexion.php");
		include("redirigirPaginaAdminError.php");
    	$email = $_REQUEST['email_usuario'];

		$sql = "update usuarios set fecha_baja = current_timestamp() where email = '$email';";

    	mysql_query($sql, $link) or die(redirigirPaginaError(mysql_errno(), mysql_error(), basename($_SERVER['PHP_SELF'])));

    	mysql_close($link);
    	
    	header('Location: ABMUsuarios.php');
	}
	else
	{
		header('Location: ../index.php');
	}
?>