<?php
	function redirigirPaginaError($nroError, $error, $pagina)
	{
?>
		Cargando...
    	<form action='admin.php' method='post' name='frm'>
	    	<input type='hidden' id='hfNroError' name='hfNroError' value='<?php echo $nroError;?>'>
	    	<input type='hidden' id='hfError' name='hfError' value='<?php echo $error;?>'>
	    	<input type='hidden' id='hfPagina' name='hfPagina' value='<?php echo $pagina;?>'>
    	</form>
    	
    	<script language="JavaScript">
			document.frm.submit();
		</script>
<?php
	}
?>