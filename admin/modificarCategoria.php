<!DOCTYPE html>
<html lang="es"> 
<html>
	<head>
    	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
		<title>Modificar Categoria</title>

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
				  					<strong>Éxito!</strong> Se ha modificado la categoría correctamente
								</div>
						<?php	
							}

							include("../conexion.php");
							include("redirigirPaginaAdminError.php");

		        			$idCategoria = $_REQUEST['id_categoria'];
							$sql = "select * from categorias where id_categoria = '$idCategoria'";
							$sqlResultado = mysql_query($sql, $link) or die(redirigirPaginaError(mysql_errno(), mysql_error(), basename($_SERVER['PHP_SELF'])));
							mysql_close($link);
							if ($fila = mysql_fetch_array($sqlResultado)){
						?>

			            <div class="alta-modificacion-admin content-md">
		        			<div class="container">
			          			<div style="width: 70%; min-width: 290px; margin: 0 auto;" class="">
			                   		<form id="sky-form-modificarCategoria" class="alta-modificacion-block sky-form" method="post" action="modificarCategoria2.php">
				                        <h2 class="texto">Modifique los datos necesarios de la Categoría</h2>
				 
				                        <div class="alta-modificacion-input">
				                            <section>
											    <label class="input">
											        <input type="text" name="txtIdCategoria" id="txtIdCategoria" placeholder="Id Categoría" class="form-control" value="<?php echo $idCategoria; ?>" readonly>
											    </label>
											</section>           
				                            <section>
											    <label class="input">
											        <input type="text" name="txtDescripcion" id="txtDescripcion" placeholder="Descripcion" class="form-control" value="<?php echo $fila['descripcion']; ?>" autofocus>
											    </label>
											</section>                
				                        </div>
			                			<button class="btn btn-success" style="width:100%" type="submit" onclick="return confirm('¿Deseas modificar esta categoria?')">Confirmar Modificación</button>
			                		</form>
		                    	</div>
			            	</div>
			        	</div>
		        		<?php
		        			}
		        			mysql_free_result($sqlResultado);
		        		?>
			            <br/>
			           		<a href="ABMCategorias.php" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-arrow-left"></span>Atrás</a>     
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
		<script  src="../js/forms/modificarCategoria.js"></script>
		<script   language="javascript">
		jQuery(document).ready(function() {
			ModificarCategoria.init(); 
	    });
		</script>
	</body>
</html>