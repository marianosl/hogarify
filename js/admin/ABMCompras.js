function mostrarProductoCantidad(fila){
	if($('#tablaProductoCantidad'+fila).css('display')=='none'){
		$('#tablaProductoCantidad'+fila).css('display', 'inline');
	}
	else{
		$('#tablaProductoCantidad'+fila).css('display','none');
	}
}