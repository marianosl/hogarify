<?php
	session_start();

	if(isset($_SESSION['email']) && $_SESSION['rol'] == 0)
	{
		include("../conexion.php");
		include("redirigirPaginaAdminError.php");

		$productosCantidad = array();
		if($_POST['txtCantidadProducto1'] > 0 && $_POST['comboProducto1'] != 0)
		{
			$idProducto = $_POST['comboProducto1'];
			$sql = "select precio from productos where id_producto = '$idProducto'";
			$sqlResultado = mysql_query($sql, $link) or die(redirigirPaginaError(mysql_errno(), mysql_error(), basename($_SERVER['PHP_SELF'])));
			$fila = mysql_fetch_array($sqlResultado);
			$productosCantidad[$idProducto] = array('precio' => $fila['precio'], 'cantidad' => $_POST['txtCantidadProducto1']);
			if($_POST['txtCantidadProducto2'] > 0 && $_POST['comboProducto2'] != 0)
			{
				$idProducto = $_POST['comboProducto2'];
				$sql = "select precio from productos where id_producto = '$idProducto'";
				$sqlResultado = mysql_query($sql, $link) or die(redirigirPaginaError(mysql_errno(), mysql_error(), basename($_SERVER['PHP_SELF'])));
				$fila = mysql_fetch_array($sqlResultado);
				$productosCantidad[$idProducto] = array('precio' => $fila['precio'], 'cantidad' => $_POST['txtCantidadProducto2']);
				if($_POST['txtCantidadProducto3'] > 0 && $_POST['comboProducto3'] != 0)
				{
					$idProducto = $_POST['comboProducto3'];
					$sql = "select precio from productos where id_producto = '$idProducto'";
					$sqlResultado = mysql_query($sql, $link) or die(redirigirPaginaError(mysql_errno(), mysql_error(), basename($_SERVER['PHP_SELF'])));
					$fila = mysql_fetch_array($sqlResultado);
					$productosCantidad[$idProducto] = array('precio' => $fila['precio'], 'cantidad' => $_POST['txtCantidadProducto3']);
					if($_POST['txtCantidadProducto4'] > 0 && $_POST['comboProducto4'] != 0)
					{
						$idProducto = $_POST['comboProducto4'];
						$sql = "select precio from productos where id_producto = '$idProducto'";
						$sqlResultado = mysql_query($sql, $link) or die(redirigirPaginaError(mysql_errno(), mysql_error(), basename($_SERVER['PHP_SELF'])));
						$fila = mysql_fetch_array($sqlResultado);
						$productosCantidad[$idProducto] = array('precio' => $fila['precio'], 'cantidad' => $_POST['txtCantidadProducto4']);
						if($_POST['txtCantidadProducto5'] > 0 && $_POST['comboProducto5'] != 0)
						{
							$idProducto = $_POST['comboProducto5'];
							$sql = "select precio from productos where id_producto = '$idProducto'";
							$sqlResultado = mysql_query($sql, $link) or die(redirigirPaginaError(mysql_errno(), mysql_error(), basename($_SERVER['PHP_SELF'])));
							$fila = mysql_fetch_array($sqlResultado);
							$productosCantidad[$idProducto] = array('precio' => $fila['precio'], 'cantidad' => $_POST['txtCantidadProducto5']);
							if($_POST['txtCantidadProducto6'] > 0 && $_POST['comboProducto6'] != 0)
							{
								$idProducto = $_POST['comboProducto6'];
								$sql = "select precio from productos where id_producto = '$idProducto'";
								$sqlResultado = mysql_query($sql, $link) or die(redirigirPaginaError(mysql_errno(), mysql_error(), basename($_SERVER['PHP_SELF'])));
								$fila = mysql_fetch_array($sqlResultado);
								$productosCantidad[$idProducto] = array('precio' => $fila['precio'], 'cantidad' => $_POST['txtCantidadProducto6']);
								if($_POST['txtCantidadProducto7'] > 0 && $_POST['comboProducto7'] != 0)
								{
									$idProducto = $_POST['comboProducto7'];
									$sql = "select precio from productos where id_producto = '$idProducto'";
									$sqlResultado = mysql_query($sql, $link) or die(redirigirPaginaError(mysql_errno(), mysql_error(), basename($_SERVER['PHP_SELF'])));
									$fila = mysql_fetch_array($sqlResultado);
									$productosCantidad[$idProducto] = array('precio' => $fila['precio'], 'cantidad' => $_POST['txtCantidadProducto7']);
									if($_POST['txtCantidadProducto8'] > 0 && $_POST['comboProducto8'] != 0)
									{
										$idProducto = $_POST['comboProducto8'];
										$sql = "select precio from productos where id_producto = '$idProducto'";
										$sqlResultado = mysql_query($sql, $link) or die(redirigirPaginaError(mysql_errno(), mysql_error(), basename($_SERVER['PHP_SELF'])));
										$fila = mysql_fetch_array($sqlResultado);
										$productosCantidad[$idProducto] = array('precio' => $fila['precio'], 'cantidad' => $_POST['txtCantidadProducto8']);
										if($_POST['txtCantidadProducto9'] > 0 && $_POST['comboProducto9'] != 0)
										{
											$idProducto = $_POST['comboProducto9'];
											$sql = "select precio from productos where id_producto = '$idProducto'";
											$sqlResultado = mysql_query($sql, $link) or die(redirigirPaginaError(mysql_errno(), mysql_error(), basename($_SERVER['PHP_SELF'])));
											$fila = mysql_fetch_array($sqlResultado);
											$productosCantidad[$idProducto] = array('precio' => $fila['precio'], 'cantidad' => $_POST['txtCantidadProducto9']);
											if($_POST['txtCantidadProducto10'] > 0 && $_POST['comboProducto10'] != 0)
											{
												$idProducto = $_POST['comboProducto10'];
												$sql = "select precio from productos where id_producto = '$idProducto'";
												$sqlResultado = mysql_query($sql, $link) or die(redirigirPaginaError(mysql_errno(), mysql_error(), basename($_SERVER['PHP_SELF'])));
												$fila = mysql_fetch_array($sqlResultado);
												$productosCantidad[$idProducto] = array('precio' => $fila['precio'], 'cantidad' => $_POST['txtCantidadProducto10']);
											}
										}
									}
								}
							}
						}
					}
				}
			}
		}

		$total = 0;
		foreach ($productosCantidad as $key => $value) {
			$total = $total + $value['precio'] * $value['cantidad'];
		}

		$email = $_POST['txtEmail'];
		$nroTarjeta = $_POST['txtNroTarjeta'];
		$codSeguridad = $_POST['txtCodSeguridad'];
		

		$sql = "insert into compras (fecha_hora, total, email, nro_tarjeta, cod_seguridad) values (current_timestamp, '$total' , '$email', '$nroTarjeta', '$codSeguridad');";
		$sqlResultado = mysql_query($sql, $link) or die(redirigirPaginaError(mysql_errno(), mysql_error(), basename($_SERVER['PHP_SELF'])));
	
		$nroCompra = mysql_insert_id($link);

		$sql = "insert into productos_cantidad_compra (cantidad, id_producto, nro_compra) values";

		foreach ($productosCantidad as $key => $value) {
			$cantidad = $value['cantidad'];
			$sql = $sql . " ('$cantidad', '$key', '$nroCompra'),";
		}

		mysql_query(rtrim($sql, ','), $link) or die(redirigirPaginaError(mysql_errno(), mysql_error(), basename($_SERVER['PHP_SELF'])));

		mysql_close($link);

		header('Location: altaCompra.php?agregado');
	}
	else
	{
		header('Location: ../index.php');
	}
?>
	