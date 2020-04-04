<!DOCTYPE html>
<html lang="es"> 
<html>
	<head>
    	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
		<title>Modificar Producto</title>
		<link rel="stylesheet" href="../css/admin/modificarProductoImagen.css" type="text/css"></link>
    	<?php
    		include("../inc/checkAdmin.inc");
    	?>
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
			  					<strong>Éxito!</strong> Se ha modificado el producto correctamente
							</div>
						<?php
							}

							include("../conexion.php");
							include("redirigirPaginaAdminError.php");

		        			$idProducto = $_REQUEST['id_producto'];
							$sql = "select * from productos where id_producto = '$idProducto';";
							$sqlResultado = mysql_query($sql, $link) or die(redirigirPaginaError(mysql_errno(), mysql_error(), basename($_SERVER['PHP_SELF'])));

							if ($fila = mysql_fetch_array($sqlResultado)){
						?>
						
					            <div class="alta-modificacion-admin content-md">
				        			<div class="container">
					          			<div style="width: 70%; min-width: 290px; margin: 0 auto;" class="">
				                    		<form id="sky-form-modificarProducto" class="alta-modificacion-block sky-form" enctype="multipart/form-data" method="post" action="modificarProducto2.php">
					                        	<h2>Modifique los datos necesarios del Producto</h2>
						                        <div class="alta-modificacion-input">
						                        	<section>
						                        		<label class="input">		                        			
					            			        		<input type="text" class="form-control" placeholder="ID Producto" name="txtIdProducto" id="txtIdProducto" value="<?php echo $idProducto;?>" readonly/>
						                        		</label>		                        	
						                        	</section>
						                            
						                            <section>
													    <label class="input">
													        <input type="text" name="txtDescripcion" id="txtDescripcion" placeholder="Descripción" class="form-control" autofocus value="<?php echo $fila['descripcion']; ?>">
													    </label>
													</section>
						                            
						                            <section>
													    <label class="input">
													        <input type="text" name="txtPrecio" id="txtPrecio" placeholder="Precio" class="form-control" value="<?php echo $fila['precio']; ?>">
													    </label>
													</section>
													
						                            <section>
													    <label class="input">
													        <input type="text" name="txtStock" id="txtStock" placeholder="Stock" class="form-control" value="<?php echo $fila['stock']; ?>" >
													    </label>
													</section>
													
						                            <section>
													    <label class="input">
													        <input type="text" name="txtCantVend" id="txtCantVend" placeholder="Cantidad Vendida" class="form-control" value="<?php echo $fila['cantidad_vendida']; ?>" >
													    </label>
													</section>
													
						                            <section>
													    <label class="input">									 
					            			        		<textarea type="text" rows="5" class="form-control" placeholder="Especificación" name="txtEspecificacion" id="txtEspecificacion" ><?php echo $fila['especificacion'];?></textarea>
													    </label>
													</section>
													
						                            <section>
													    <label class="dropdown">
									            		 	<select name="comboCategoria" class="form-control" id="comboCategoria">
							            			        	<?php
														        	include("../conexion.php");
														        	$sqlCat ="select * from categorias where fecha_baja is null order by descripcion";
														        	$sqlResultadoCat = mysql_query($sqlCat, $link) or die(redirigirPaginaError(mysql_errno(), mysql_error(), basename($_SERVER['PHP_SELF'])));
														        	while ($filaCat = mysql_fetch_array($sqlResultadoCat)){
														        		echo '<option value=';
														        		echo $filaCat["id_categoria"];
														        		if($fila['id_categoria'] == $filaCat['id_categoria']){

														        			echo ' selected ';
														        		}
														        		echo '>';
														        		echo $filaCat["descripcion"];
														        		echo '</option>';
											                    	}
									                        	?>
							                            	</select>
													    </label>
													</section>

						                            <section>
														<label class="input">Imagen Actual
															<img src="../<?php echo $fila['imagen']; ?>" class="imagen-modificar-producto" alt="Imagen producto"/>	
														</label>
													 </section>
				                            		
				                            		<section>
				                            			<label>
			               									<input type="file" placeholder="Subir imagen" name="fileImagen" id="fileImagen"/>
													    </label>
													</section>          

						                        </div>
			                						<button class="btn btn-success" style="width:100%" type="submit" onclick="return confirm('¿Deseas modificar este producto?')">Confirmar Modificación</button>
				                    		</form>
				                		</div>
				                	</div>
				 	    		</div>
				 	    	<?php
				 	    		mysql_free_result($sqlResultado);
				 	    		mysql_free_result($sqlResultadoCat);
				 	    		mysql_close($link);
				 	    		}
				 	    	?>
			            
			            <br/>
		           		<a href="ABMProductos.php" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-arrow-left"></span>Atrás</a>     
					</div>
			<?php 
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
		<script  src="../js/forms/modificarProducto.js"></script>
		<script  language="javascript">
			jQuery(document).ready(function() {
				ModificarProducto.init(); 
		    });
		</script>		
	</body>
</html>