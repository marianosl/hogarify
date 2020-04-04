<!DOCTYPE html>
<html lang="es"> 
<html>
	<head>
    	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
		<title>Modificar Usuario</title>
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

		        			$email = $_REQUEST['email_usuario'];
							$sql = "select * from usuarios where email = '$email';";
							$sqlResultado = mysql_query($sql, $link) or die(redirigirPaginaError(mysql_errno(), mysql_error(), basename($_SERVER['PHP_SELF'])));
							mysql_close($link);
							if ($fila = mysql_fetch_array($sqlResultado))
							{
						?>       	
	          					<div class="alta-modificacion-admin content-md">
				        			<div class="container">
					          			<div style="width: 70%; min-width: 290px; margin: 0 auto;" class="">
					                   		<form id="sky-form-modificarUsuario" class="alta-modificacion-block sky-form" method="post" action="modificarUsuario2.php">
					                        <h2>Modifique los datos necesarios del Usuario</h2>
					 
					                        <div class="alta-modificacion-input">
					                            <section>
												    <label class="input">
												        <input type="text" name="txtEmail" id="txtEmail" placeholder="Email" class="form-control" value="<?php echo $fila['email']; ?>" readonly>
												    </label>
												</section>
					                            
					                            <section>
												    <label class="input">
												        <input type="text" name="txtNombre" id="txtNombre" placeholder="Nombre" class="form-control" value="<?php echo $fila['nombre'];?>" autofocus>
												    </label>
												</section>
												
					                            <section>
												    <label class="input">
												        <input type="text" name="txtApellido" id="txtApellido" placeholder="Apellido" class="form-control" value="<?php echo $fila['apellido']; ?>">
												    </label>
												</section>
												
					                            <section>
												    <label class="input">
												        <input type="text" name="txtPassword" id="txtPassword" placeholder="Contraseña" class="form-control" value="<?php echo $fila['password']; ?>">
												    </label>
												</section>
												
					                            <section>
												    <label class="input">
												        <input type="text" name="txtDireccion" id="txtDireccion" placeholder="Direccion" class="form-control" value="<?php echo $fila['direccion']; ?>">
												    </label>
												</section>
												
					                            <section>
												    <label class="input">
												        <input type="text" name="txtDNI" id="txtDNI" placeholder="DNI" class="form-control" value="<?php echo $fila['dni']; ?>">
												    </label>
												</section>
					                            <section>
												    <label class="dropdown">
														<select class="form-control" name="comboRol" id="comboRol">
														     <option value="0" <?php echo ($fila['rol'] == 0)? "selected" : "" ?>>Administrador</option>
														     <option value="1" <?php echo ($fila['rol'] == 1)? "selected" : "" ?>>Usuario</option>
														</select>
												    </label>
												</section>                  
					                        </div>
				                        	<button class="btn btn-success" style="width:100%" type="submit" onclick="return confirm('¿Deseas modificar este usuario?')">Confirmar Modificación</button>
				                    	</form>
				                    </div>
					            </div>
					        </div>
						<?php
							}
							mysql_free_result($sqlResultado);
						?>
				            <br/>
				       		<a href="ABMUsuarios.php" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-arrow-left"></span>Atrás</a>     
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
		<script  src="../js/forms/modificarUsuario.js"></script>
		<script  language="javascript">
			jQuery(document).ready(function() {
				ModificarUsuario.init(); 
		    });
		</script>
	</body>
</html>