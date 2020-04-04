<!DOCTYPE html>
<html lang="es"> 
<html>
	<head>
    	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
		<title>Página del Administrador</title>

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
					<a href="../logout.php" class="btn btn-xs btn-danger">
		    			<span class="glyphicon glyphicon-remove"></span> 
			    		Cerrar Sesión
					</a>
					<br/>
					<br/>
					<div class="alert alert-success" role="alert">
			    		<strong>Bienvenido <?php echo $_SESSION['nombre'];?></strong>
			    		<br/>
			    		¿Qué quieres hacer?
					</div>
				<?php
					if (isset($_POST["hfError"]))
					{
				?>
						<div class="alert alert-danger">
		  					<strong>Se produjo un error!</strong> Contáctese con sistemas. Nº Error: <?php echo $_POST['hfNroError']; ?>  - Error: <?php echo $_POST['hfError']; ?> - Página: <?php echo $_POST['hfPagina']; ?> 
						</div>
				<?php
					}
				?>
                                        <div>
                                        <p>
			    		<a href="ABMUsuarios.php" class="btn btn-lg btn-primary btn-block">ABM Usuarios</a> 
			    		<br/>
			    		<a href="ABMCategorias.php" class="btn btn-lg btn-primary btn-block">ABM Categorías</a> 
			    		<br/>
			    		<a href="ABMProductos.php" class="btn btn-lg btn-primary btn-block">ABM Productos</a> 
			    		<br/>
			    		<a href="ABMCompras.php" class="btn btn-lg btn-primary btn-block">ABM Compras</a> 
			    		<br/>
					</p>
                                        </div>
                                        <div class="mapadelsitio" style="margin: 2em auto">
                                            <p style="text-align: center">
                                                <a href="mapadelsitioadmin.php">Mapa del Sitio Administrador</a>
                                            </p>
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
	</body>
</html>