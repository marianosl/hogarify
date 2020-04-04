<?php
	session_start();

	if(isset($_SESSION['email']) && $_SESSION['rol'] == 0)
	{
  		include("../conexion.php");
		include("redirigirPaginaAdminError.php");
  		$descripcion = $_POST['txtDescripcion'];
  		$precio = $_POST['txtPrecio'];
  		$stock = $_POST['txtStock'];
  		$cantVendida = $_POST['txtCantVend'];
  		$especificacion = $_POST['txtEspecificacion'];
  		$idCategoria = $_POST['comboCategoria'];


		$imagen = 'img/productos/default.png';


		$sql = "insert into productos (descripcion, precio, stock, cantidad_vendida, especificacion, id_categoria, imagen) values ('$descripcion', '$precio', '$stock', '$cantVendida', '$especificacion', '$idCategoria', '$imagen');";
  		mysql_query($sql,$link) or die(redirigirPaginaError(mysql_errno(), mysql_error(), basename($_SERVER['PHP_SELF'])));
  		$idProducto = mysql_insert_id($link);	

		$archivo_temp = $_FILES['fileImagen']['tmp_name'];
		//para colocar el nombre_img del archivo imagen subida y para mover de carpeta temporal a la carpeta img/productos
		if (is_uploaded_file($_FILES['fileImagen']['tmp_name']))
		{
			$nombreDirectorio = "../img/productos/";
			$nombreImg = $idProducto.'.png';
			move_uploaded_file($archivo_temp, $nombreDirectorio.$nombreImg);
      		$imagen = 'img/productos/'.$nombreImg;
      		$sql = "update productos set imagen = '$imagen' where id_producto = '$idProducto';";
      		mysql_query($sql,$link) or die(redirigirPaginaError(mysql_errno(), mysql_error(), basename($_SERVER['PHP_SELF'])));
		} 
		
  		mysql_close($link);

    	header('Location: altaProducto.php?agregado');
	}
	else
	{
		header('Location: ../index.php');
	}
?>

