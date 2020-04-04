$(document).ready( function(){

	var contador = 1;
	$('#btnAgregarProductoCantidad').click( function(){
		switch(contador){
		case 1:
			$('.ProductoCantidad1').css('display', 'inline');
			contador++;
			break;
		case 2:
			if($('#comboProducto1').val() != 0 && $('#txtCantidadProducto1').val() != 0){
				$('.ProductoCantidad2').css('display', 'inline');
				contador++;
			}
			break;
		case 3:
			if($('#comboProducto2').val() != 0 && $('#txtCantidadProducto2').val() != '0'){
				$('.ProductoCantidad3').css('display', 'inline');
				contador++;
			}
			break;
		case 4:
			if($('#comboProducto3').val() != 0 && $('#txtCantidadProducto3').val() != '0'){
				$('.ProductoCantidad4').css('display', 'inline');
				contador++;
			}
			break;
		case 5:
			if($('#comboProducto4').val() != 0 && $('#txtCantidadProducto4').val() != '0'){
				$('.ProductoCantidad5').css('display', 'inline');
				contador++;
			}
			break;
		case 6:
			if($('#comboProducto5').val() != 0 && $('#txtCantidadProducto5').val() != '0'){
				$('.ProductoCantidad6').css('display', 'inline');
				contador++;
			}
			break;
		case 7:
			if($('#comboProducto6').val() != 0 && $('#txtCantidadProducto6').val() != '0'){
				$('.ProductoCantidad7').css('display', 'inline');
				contador++;
			}
			break;
		case 8:
			if($('#comboProducto7').val() != 0 && $('#txtCantidadProducto7').val() != '0'){
				$('.ProductoCantidad8').css('display', 'inline');
				contador++;
			}
			break;
		case 9:
			if($('#comboProducto8').val() != 0 && $('#txtCantidadProducto8').val() != '0'){
				$('.ProductoCantidad9').css('display', 'inline');
				contador++;
			}
			break;
		case 10:
			if($('#comboProducto9').val() != 0 && $('#txtCantidadProducto9').val() != '0'){
				$('.ProductoCantidad10').css('display', 'inline');
				contador++;
			}
			break;
		default:
			alert("La cantidad máxima de producto-cantidad es 10");
		}
	});
});