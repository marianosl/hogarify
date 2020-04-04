<!DOCTYPE html>
<html lang="es"> 
<html>
	<head>
    	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
		<title>Modificar Compra</title>
    	<?php
    		include("../inc/checkAdmin.inc");
    	?>
		<link rel="stylesheet" type="text/css" href="../css/admin/altaCompra.css"/>
		<script type='text/javascript' src='../plugins/jquery/jquery-2.2.1.min.js'></script>
		<script type='text/javascript' src='../js/admin/modificarCompra.js'></script>
	</head>

	<body>
	<?php
		session_start();
			if(isset($_SESSION['email']))
			{	
				if($_SESSION['rol'] == 0)
				{
	?>
					<div class="container">
						<a href="../logout.php" class="btn btn-xs btn-danger">
		    				<span class="glyphicon glyphicon-remove"></span> 
			    			Cerrar Sesión
						</a>				
						<?php

							if (isset($_REQUEST["modificado"]))
							{
						?>
							<br></br>
							<div class="alert alert-success">
			  					<strong>Éxito!</strong> Se ha modificado la compra correctamente
							</div>
						<?php
							}
						?>           
			          	<div class="alta-modificacion-admin content-md">
		        			<div class="container">
			          			<div style="width: 70%; min-width: 290px; margin: 0 auto;" class="">
		                    		<form id="sky-form-modificarCompra" class="alta-modificacion-block sky-form" method="post" action="modificarCompra2.php">
			                        	<h2>Modifique los datos necesarios de la Compra</h2>
			 
			                		<?php
			                			include('../conexion.php');
			                			$nroCompra = $_REQUEST["nro_compra"];
			                			$sql2 ="select * from compras where nro_compra = '$nroCompra'";
			                			$sqlResultado2 = mysql_query($sql2, $link);
			                			$fila2 = mysql_fetch_array($sqlResultado2);
			                			$sql3 = "select * from productos_cantidad_compra where nro_compra = '$nroCompra';";
			                			$sqlResultado3 = mysql_query($sql3, $link);
			                			$productosCantidad = array(mysql_num_rows($sqlResultado3));
			                			$i = 0;
			                			while ($fila = mysql_fetch_array($sqlResultado3))
			                			{
			                				$productosCantidad[$i] = array('producto' => $fila['id_producto'], 'cantidad' => $fila['cantidad']); 
			                				$i++;
			                			}
			                        ?>
				                        <div class="alta-modificacion-input">
				                        	<section>
				                        		<label class="input">
		            			        			<input type="text" class="form-control" placeholder="Nro Compra" name="txtNroCompra" id="txtNroCompra" required="" autofocus="" value="<?php echo $fila2['nro_compra']; ?>" readonly />		                        		
				                        		</label>		                        	
				                        	</section>
				                            <section>
											    <label class="input">
											        <input type="text" name="txtEmail" id="txtEmail" placeholder="Email" class="form-control" value="<?php echo $fila2['email']; ?>" readonly>
											    </label>
											</section>

											<?php
					                			$sql = "select * from productos order by descripcion;";
					                			$sqlResultado = mysql_query($sql, $link);
			                					mysql_close($link);
											?>
											
					                            <div class="ProductoCantidad1">
					                            	<section>
					                            		<div class="col-md-6">
							                            	<label class="input">
							                            		Producto
										            		 	<select name="comboProducto1" class="form-control" id="comboProducto1">
										            		 		<option value="0" selected>Seleccione un producto</option>
									            		        <?php

									            		        	while($fila = mysql_fetch_array($sqlResultado))
									            		        	{
									            		        ?>
											                        	<option value="<?php echo $fila['id_producto'];?>" <?php echo (count($productosCantidad) >= 1 && $productosCantidad[0]['producto'] == $fila['id_producto'])? 'selected' : '' ;?>> <?php echo $fila['descripcion']; ?></option>
											                    <?php
											                    	}
											                    ?>
										                      	</select>
									                      	</label>
								                      	</div>
								                      	<div class="col-md-6">
									                      	<label class="input">Cantidad
								               			    	<input type="text" min="0" class="form-control" name="txtCantidadProducto1" id="txtCantidadProducto1" value="<?php echo (count($productosCantidad) >= 1)? $productosCantidad[0]['cantidad'] : '0';?>"/>				               			
								               				</label>
							               				</div>
													</section>
												</div>

					                            <div class="ProductoCantidad2">
					                            	<section>
					                            		<div class="col-md-6">
							                            	<label class="input">
							                            		Producto
										            		 	<select name="comboProducto2" class="form-control" id="comboProducto2">
										            		 		<option value="0" selected>Seleccione un producto</option>
									            		        <?php
									            		        	mysql_data_seek($sqlResultado, 0);
									            		        	while($fila = mysql_fetch_array($sqlResultado))
									            		        	{
									            		        ?>
											                        	<option value="<?php echo $fila['id_producto']; ?>" <?php echo (count($productosCantidad) >= 2 && $productosCantidad[1]['producto'] == $fila['id_producto'])? 'selected' : '' ;?>> <?php echo $fila['descripcion']; ?></option>
											                    <?php
											                    	}
											                    ?>
										                      	</select>
									                      	</label>
								                      	</div>
								                      	<div class="col-md-6">
									                      	<label class="input">Cantidad
								               			    	<input type="text" min="0" class="form-control" name="txtCantidadProducto2" id="txtCantidadProducto2" value="<?php echo (count($productosCantidad) >= 2)? $productosCantidad[1]['cantidad'] : '0';?>"/>				               			
								               				</label>
							               				</div>
													</section>
												</div>	

												<div class="ProductoCantidad3">
					                            	<section>
					                            		<div class="col-md-6">
							                            	<label class="input">
							                            		Producto
										            		 	<select name="comboProducto3" class="form-control" id="comboProducto3">
										            		 		<option value="0" selected>Seleccione un producto</option>
									            		        <?php
									            		        	mysql_data_seek($sqlResultado, 0);
									            		        	while($fila = mysql_fetch_array($sqlResultado))
									            		        	{
									            		        ?>
											                        	<option value="<?php echo $fila['id_producto']; ?>" <?php echo (count($productosCantidad) >= 3 && $productosCantidad[2]['producto'] == $fila['id_producto'])? 'selected' : '' ;?>> <?php echo $fila['descripcion']; ?></option>
											                    <?php
											                    	}
											                    ?>
										                      	</select>
									                      	</label>
								                      	</div>
								                      	<div class="col-md-6">
									                      	<label class="input">Cantidad
								               			    	<input type="text" min="0" class="form-control" name="txtCantidadProducto3" id="txtCantidadProducto3" value="<?php echo (count($productosCantidad) >= 3)? $productosCantidad[2]['cantidad'] : '0';?>"/>				               			
								               				</label>
							               				</div>
													</section>
												</div>	

												<div class="ProductoCantidad4">
					                            	<section>
					                            		<div class="col-md-6">
							                            	<label class="input">
							                            		Producto
										            		 	<select name="comboProducto4" class="form-control" id="comboProducto4">
										            		 		<option value="0" selected>Seleccione un producto</option>
									            		        <?php
									            		        	mysql_data_seek($sqlResultado, 0);
									            		        	while($fila = mysql_fetch_array($sqlResultado))
									            		        	{
									            		        ?>
											                        	<option value="<?php echo $fila['id_producto']; ?>" <?php echo (count($productosCantidad) >= 4 && $productosCantidad[3]['producto'] == $fila['id_producto'])? 'selected' : '' ;?>> <?php echo $fila['descripcion']; ?></option>
											                    <?php
											                    	}
											                    ?>
										                      	</select>
									                      	</label>
								                      	</div>
								                      	<div class="col-md-6">
									                      	<label class="input">Cantidad
								               			    	<input type="text" min="0" class="form-control" name="txtCantidadProducto4" id="txtCantidadProducto4" value="<?php echo (count($productosCantidad) >= 4)? $productosCantidad[3]['cantidad'] : '0';?>"/>				               			
								               				</label>
							               				</div>
													</section>
												</div>

												<div class="ProductoCantidad5">
					                            	<section>
					                            		<div class="col-md-6">
							                            	<label class="input">
							                            		Producto
										            		 	<select name="comboProducto5" class="form-control" id="comboProducto5">
										            		 		<option value="0" selected>Seleccione un producto</option>
									            		        <?php
									            		        	mysql_data_seek($sqlResultado, 0);
									            		        	while($fila = mysql_fetch_array($sqlResultado))
									            		        	{
									            		        ?>
											                        	<option value="<?php echo $fila['id_producto']; ?>" <?php echo (count($productosCantidad) >= 5 && $productosCantidad[4]['producto'] == $fila['id_producto'])? 'selected' : '' ;?>> <?php echo $fila['descripcion']; ?></option>
											                    <?php
											                    	}
											                    ?>
										                      	</select>
									                      	</label>
								                      	</div>
								                      	<div class="col-md-6">
									                      	<label class="input">Cantidad
								               			    	<input type="text" min="0" class="form-control" name="txtCantidadProducto5" id="txtCantidadProducto5" value="<?php echo (count($productosCantidad) >= 5)? $productosCantidad[4]['cantidad'] : '0';?>"/>				               			
								               				</label>
							               				</div>
													</section>
												</div>

												<div class="ProductoCantidad6">
					                            	<section>
					                            		<div class="col-md-6">
							                            	<label class="input">
							                            		Producto
										            		 	<select name="comboProducto6" class="form-control" id="comboProducto6">
										            		 		<option value="0" selected>Seleccione un producto</option>
									            		        <?php
									            		        	mysql_data_seek($sqlResultado, 0);
									            		        	while($fila = mysql_fetch_array($sqlResultado))
									            		        	{
									            		        ?>
											                        	<option value="<?php echo $fila['id_producto']; ?>" <?php echo (count($productosCantidad) >= 6 && $productosCantidad[5]['producto'] == $fila['id_producto'])? 'selected' : '' ;?>> <?php echo $fila['descripcion']; ?></option>
											                    <?php
											                    	}
											                    ?>
										                      	</select>
									                      	</label>
								                      	</div>
								                      	<div class="col-md-6">
									                      	<label class="input">Cantidad
								               			    	<input type="text" min="0" class="form-control" name="txtCantidadProducto6" id="txtCantidadProducto6" value="<?php echo (count($productosCantidad) >= 6)? $productosCantidad[5]['cantidad'] : '0';?>"/>				               			
								               				</label>
							               				</div>
													</section>
												</div>

												<div class="ProductoCantidad7">
					                            	<section>
					                            		<div class="col-md-6">
							                            	<label class="input">
							                            		Producto
										            		 	<select name="comboProducto7" class="form-control" id="comboProducto7">
										            		 		<option value="0" selected>Seleccione un producto</option>
									            		        <?php
									            		        	mysql_data_seek($sqlResultado, 0);
									            		        	while($fila = mysql_fetch_array($sqlResultado))
									            		        	{
									            		        ?>
											                        	<option value="<?php echo $fila['id_producto']; ?>" <?php echo (count($productosCantidad) >= 7 && $productosCantidad[6]['producto'] == $fila['id_producto'])? 'selected' : '' ;?>> <?php echo $fila['descripcion']; ?></option>
											                    <?php
											                    	}
											                    ?>
										                      	</select>
									                      	</label>
								                      	</div>
								                      	<div class="col-md-6">
									                      	<label class="input">Cantidad
								               			    	<input type="text" min="0" class="form-control" name="txtCantidadProducto7" id="txtCantidadProducto7" value="<?php echo (count($productosCantidad) >= 7)? $productosCantidad[6]['cantidad'] : '0';?>"/>				               			
								               				</label>
							               				</div>
													</section>
												</div>

												<div class="ProductoCantidad8">
					                            	<section>
					                            		<div class="col-md-6">
							                            	<label class="input">
							                            		Producto
										            		 	<select name="comboProducto8" class="form-control" id="comboProducto8">
										            		 		<option value="0" selected>Seleccione un producto</option>
									            		        <?php
									            		        	mysql_data_seek($sqlResultado, 0);
									            		        	while($fila = mysql_fetch_array($sqlResultado))
									            		        	{
									            		        ?>
											                        	<option value="<?php echo $fila['id_producto']; ?>" <?php echo (count($productosCantidad) >= 8 && $productosCantidad[7]['producto'] == $fila['id_producto'])? 'selected' : '' ;?>> <?php echo $fila['descripcion']; ?></option>
											                    <?php
											                    	}
											                    ?>
										                      	</select>
									                      	</label>
								                      	</div>
								                      	<div class="col-md-6">
									                      	<label class="input">Cantidad
								               			    	<input type="text" min="0" class="form-control" name="txtCantidadProducto8" id="txtCantidadProducto8" value="<?php echo (count($productosCantidad) >= 8)? $productosCantidad[7]['cantidad'] : '0';?>"/>				               			
								               				</label>
							               				</div>
													</section>
												</div>

												<div class="ProductoCantidad9">
					                            	<section>
					                            		<div class="col-md-6">
							                            	<label class="input">
							                            		Producto
										            		 	<select name="comboProducto9" class="form-control" id="comboProducto9">
										            		 		<option value="0" selected>Seleccione un producto</option>
									            		        <?php
									            		        	mysql_data_seek($sqlResultado, 0);
									            		        	while($fila = mysql_fetch_array($sqlResultado))
									            		        	{
									            		        ?>
											                        	<option value="<?php echo $fila['id_producto']; ?>" <?php echo (count($productosCantidad) >= 9 && $productosCantidad[8]['producto'] == $fila['id_producto'])? 'selected' : '' ;?>> <?php echo $fila['descripcion']; ?></option>
											                    <?php
											                    	}
											                    ?>
										                      	</select>
									                      	</label>
								                      	</div>
								                      	<div class="col-md-6">
									                      	<label class="input">Cantidad
								               			    	<input type="text" min="0" class="form-control" name="txtCantidadProducto9" id="txtCantidadProducto9" value="<?php echo (count($productosCantidad) >= 9)? $productosCantidad[8]['cantidad'] : '0';?>"/>				               			
								               				</label>
							               				</div>
													</section>
												</div>

												<div class="ProductoCantidad10">
					                            	<section>
					                            		<div class="col-md-6">
							                            	<label class="input">
							                            		Producto
										            		 	<select name="comboProducto10" class="form-control" id="comboProducto10">
										            		 		<option value="0" selected>Seleccione un producto</option>
									            		        <?php
									            		        	mysql_data_seek($sqlResultado, 0);
									            		        	while($fila = mysql_fetch_array($sqlResultado))
									            		        	{
									            		        ?>
											                        	<option value="<?php echo $fila['id_producto']; ?>" <?php echo (count($productosCantidad) >= 10 && $productosCantidad[9]['producto'] == $fila['id_producto'])? 'selected' : '' ;?>> <?php echo $fila['descripcion']; ?></option>
											                    <?php
											                    	}
											                    ?>
										                      	</select>
									                      	</label>
								                      	</div>
								                      	<div class="col-md-6">
									                      	<label class="input">Cantidad
								               			    	<input type="text" min="0" class="form-control" name="txtCantidadProducto10" id="txtCantidadProducto10" value="<?php echo (count($productosCantidad) >= 10)? $productosCantidad[9]['cantidad'] : '0';?>"/>				               			
								               				</label>
							               				</div>
													</section>
												</div>										

						                		<button type="button" class="btn btn-primary" id="btnAgregarProductoCantidad" style="width:40%; float:right;">
					                				Agregar Producto-Cantidad
					                			</button>
				                			</section>
											<section>
					                			<label class="input">
					            			        <input type="text" class="form-control" placeholder="Nº Tarjeta" name="txtNroTarjeta" id="txtNroTarjeta" value="<?php echo $fila2['nro_tarjeta']; ?>"/>
					                			</label>
				                			</section>
				                			<section>
				                				<label class="input">
					            			        <input type="text" class="form-control" placeholder="Cod. Seguridad" name="txtCodSeguridad" id="txtCodSeguridad" value="<?php echo $fila2['cod_seguridad']; ?>"/>
					                			</label>
				                			</section>
													            
				                        </div>				                		
			                			<button class="btn btn-success" style="width:100%" type="submit" onclick="return confirm('¿Deseas modificar esta compra')">
			                				Modificar Compra
			                			</button>
		                    		</form>
		                		</div>
		                	</div>
		 	    		</div>
			          	<a href="ABMCompras.php" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-arrow-left"></span>Atrás</a>     
					</div>
			<?php
				mysql_free_result($sqlResultado);
				mysql_free_result($sqlResultado2);
				mysql_free_result($sqlResultado3); 
				}
				else{
			?>
			    	<script  language="javascript">
			       		window.alert("¡No tienes permisos de administrador para acceder a esta página!"); 
			       		window.location.replace("../index.php");
			    	</script>
			<?php
				}
		}
		else
		{
			header('Location: ../index.php');
		}
		?>
		
		<script  src="../plugins/jquery/jquery.min.js"></script>
		<script  src="../plugins/jquery/jquery-migrate.min.js"></script>
		<script  src="../plugins/bootstrap/js/bootstrap.min.js"></script>
		<script  src="../plugins/sky-forms-pro/skyforms/js/jquery.form.min.js"></script>
		<script  src="../plugins/sky-forms-pro/skyforms/js/jquery.validate.min.js"></script>
		<script  src="../js/forms/modificarCompra.js"></script>
		<script  language="javascript">
			jQuery(document).ready(function() {
				ModificarCompra.init(); 
		    });
		</script>
	</body>
</html>