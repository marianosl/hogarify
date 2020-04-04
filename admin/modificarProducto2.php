<?php
	session_start();

	if(isset($_SESSION['email']) && $_SESSION['rol'] == 0)
	{
  		include("../conexion.php");
		include("redirigirPaginaAdminError.php");
  		$idProducto = $_POST['txtIdProducto'];
  		$descripcion = $_POST['txtDescripcion'];
  		$precio = $_POST['txtPrecio'];
  		$stock = $_POST['txtStock'];
  		$cantVendida = $_POST['txtCantVend'];
  		$especificacion = $_POST['txtEspecificacion'];
  		$idCategoria = $_POST['comboCategoria'];

		$archivo_temp = $_FILES['fileImagen']['tmp_name'];
		//para colocar el nombre_img del archivo imagen subida y para mover de carpeta temporal a la carpeta img/productos
		if (is_uploaded_file($_FILES['fileImagen']['tmp_name']))
		{
			$nombreDirectorio = "../img/productos/";
			$nombreImg = $idProducto.'.png';
			move_uploaded_file($archivo_temp, $nombreDirectorio.$nombreImg);
      		$imagen = 'img/productos/'.$nombreImg;
      		$sql = "update productos set descripcion = '$descripcion', precio = '$precio', stock = '$stock', cantidad_vendida = '$cantVendida', especificacion = '$especificacion', id_categoria = '$idCategoria', imagen = '$imagen' where id_producto = '$idProducto';";
		} 
		else
		{
      		$sql = "update productos set descripcion = '$descripcion', precio = '$precio', stock = '$stock', cantidad_vendida = '$cantVendida', especificacion = '$especificacion', id_categoria = '$idCategoria' where id_producto = '$idProducto';";
		}
		
  		mysql_query($sql,$link) or die(redirigirPaginaError(mysql_errno(), mysql_error(), basename($_SERVER['PHP_SELF'])));

  		mysql_close($link);

    	header("Location: modificarProducto.php?id_producto=$idProducto&modificado");
	}
	else
	{
		header('Location: ../index.php');
	}
?>
	

		<?php


		?>
