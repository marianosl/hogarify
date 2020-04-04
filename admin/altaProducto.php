<!DOCTYPE html>
<html lang="es"> 
<html>
	<head>
    	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
		<title>Alta Producto</title>

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

							if (isset($_REQUEST["agregado"]))
							{
						?>
							<br></br>
							<div class="alert alert-success">
			  					<strong>Éxito!</strong> Se ha agregado el producto correctamente
							</div>
						<?php
							}
						?>
			          	<div class="alta-modificacion-admin content-md">
		        			<div class="container">
			          			<div style="width: 70%; min-width: 290px; margin: 0 auto;" class="">
		                    		<form id="sky-form-altaProducto" class="alta-modificacion-block sky-form" enctype="multipart/form-data" method="post" action="altaProducto2.php">
			                        	<h2>Ingrese los datos necesarios del nuevo producto</h2>
				                        <div class="alta-modificacion-input">
				                            <section>
											    <label class="input">
											        <input type="text" name="txtDescripcion" id="txtDescripcion" placeholder="Descripcion" class="form-control" autofocus>
											    </label>
											</section>
				                            
				                            <section>
											    <label class="input">
											        <input type="text" name="txtPrecio" id="txtPrecio" placeholder="Precio" class="form-control" >
											    </label>
											</section>
											
				                            <section>
											    <label class="input">
											        <input type="text" name="txtStock" id="txtStock" placeholder="Stock" class="form-control" >
											    </label>
											</section>
											
				                            <section>
											    <label class="input">
											        <input type="text" name="txtCantVend" id="txtCantVend" placeholder="Cantidad Vendida" class="form-control" >
											    </label>
											</section>
											
				                            <section>
											    <label class="input">									 
			            			        		<textarea type="text" rows="5" class="form-control" placeholder="Especificación" name="txtEspecificacion" id="txtEspecificacion" ></textarea>
											    </label>
											</section>
											
				                            <section>
											    <label class="dropdown">
							            		 	<select name="comboCategoria" class="form-control" name="comboCategoria" id="comboCategoria">
							            		 		<option value="" selected>Seleccione una Categoría</option>
								            		        <?php
													        	include("../conexion.php");
													        	$sql="select * from categorias where fecha_baja is null order by descripcion";
													        	$sqlResultado = mysql_query($sql, $link);
													        	while ($fila = mysql_fetch_array($sqlResultado)){
													        		echo '<option value=';
													        		echo $fila["id_categoria"];
													        		echo '>';
													        		echo $fila["descripcion"];
													        		echo '</option>';
										                    	}
									                        ?>
							                      	</select>
											    </label>
											</section>
				                            <section>
				                            	<label>									    
			               							<input type="file" placeholder="Subir imagen" name="fileImagen" id="fileImagen"/>
											    </label>
											</section>                   
				                        </div>
			                			<button class="btn btn-success" style="width:100%" type="submit" onclick="return confirm('¿Deseas agregar este producto?')">
			                				Agregar Producto
			                			</button>
		                    		</form>
		                		</div>
		                	</div>
		 	    		</div>
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
		<script  src="../js/forms/altaProducto.js"></script>
		<script   language="javascript">
			jQuery(document).ready(function() {
				AltaProducto.init(); 
		    });
		</script>		
	</body>
</html>