var ModificarCompra = function () {

    return {
        
        //Masking
        init: function () {
	        // Validation for login form
	        $("#sky-form-modificarCompra").validate({
	            // Rules for form validation
	        	rules:
	            {
		        	txtCantidadProducto1:
	                {
	                	required: true,
	                	number: true
	                	
	                },
	                txtCantidadProducto2:
	                {
	                	required: true,
	                	number: true
	                	
	                },
	                txtCantidadProducto3:
	                {
	                	required: true,
	                	number: true
	                	
	                },
	                txtCantidadProducto4:
	                {
	                	required: true,
	                	number: true
	                	
	                },
	                txtCantidadProducto5:
	                {
	                	required: true,
	                	number: true
	                	
	                },
	                txtCantidadProducto6:
	                {
	                	required: true,
	                	number: true
	                	
	                },
	                txtCantidadProducto7:
	                {
	                	required: true,
	                	number: true
	                	
	                },
	                txtCantidadProducto8:
	                {
	                	required: true,
	                	number: true
	                	
	                },
	                txtCantidadProducto9:
	                {
	                	required: true,
	                	number: true
	                	
	                },
	                txtCantidadProducto10:
	                {
	                	required: true,
	                	number: true
	                	
	                },
	                txtNroTarjeta:
	                {
	                	required: true,
	                	digits: true,
	                	maxlength: 16 
	                },
	                txtCodSeguridad:
	                {
	                	required: true,
	                	digits: true,
	                	maxlength: 4
	                }
	            },
	            
	            // Messages for form validation
	            messages:
	            {
	            	txtCantidadProducto1:
	                {
	                	required: 'Por favor ingrese la cantidad',
	                	number: 'Por favor ingrese una cantidad válida',
	                	min: 'La cantidad debe ser mayor a 0'
	                },
	                txtCantidadProducto2:
	                {
	                	required: 'Por favor ingrese la cantidad',
	                	number: 'Por favor ingrese una cantidad válida',
	                	min: 'La cantidad debe ser mayor a 0'
	                },
	                txtCantidadProducto3:
	                {
	                	required: 'Por favor ingrese la cantidad',
	                	number: 'Por favor ingrese una cantidad válida',
	                	min: 'La cantidad debe ser mayor a 0'
	                },
	                txtCantidadProducto4:
	                {
	                	required: 'Por favor ingrese la cantidad',
	                	number: 'Por favor ingrese una cantidad válida',
	                	min: 'La cantidad debe ser mayor a 0'
	                },
	                txtCantidadProducto5:
	                {
	                	required: 'Por favor ingrese la cantidad',
	                	number: 'Por favor ingrese una cantidad válida',
	                	min: 'La cantidad debe ser mayor a 0'
	                },
	                txtCantidadProducto6:
	                {
	                	required: 'Por favor ingrese la cantidad',
	                	number: 'Por favor ingrese una cantidad válida',
	                	min: 'La cantidad debe ser mayor a 0'
	                },
	                txtCantidadProducto7:
	                {
	                	required: 'Por favor ingrese la cantidad',
	                	number: 'Por favor ingrese una cantidad válida',
	                	min: 'La cantidad debe ser mayor a 0'
	                },
	                txtCantidadProducto8:
	                {
	                	required: 'Por favor ingrese la cantidad',
	                	number: 'Por favor ingrese una cantidad válida',
	                	min: 'La cantidad debe ser mayor a 0'
	                },
	                txtCantidadProducto9:
	                {
	                	required: 'Por favor ingrese la cantidad',
	                	number: 'Por favor ingrese una cantidad válida',
	                	min: 'La cantidad debe ser mayor a 0'
	                },
	                txtCantidadProducto10:
	                {
	                	required: 'Por favor ingrese la cantidad',
	                	number: 'Por favor ingrese una cantidad válida',
	                	min: 'La cantidad debe ser mayor a 0'
	                },
	                txtNroTarjeta:
	                {
	                	required: 'Por favor ingrese la tarjeta de crédito',
	                	digits: 'Por favor ingrese una tarjeta de crédito válida',
	                    maxlength: 'La tarjeta de crédito debe tener menos de 16 números'
	                },
	                txtCodSeguridad:
	                {
	                    required: 'Por favor ingrese el código de seguridad',
	                    digits: 'Por favor ingrese un código de seguridad válido',
	                    maxlength: 'El código de seguridad debe tener menos de 4 números'	                    
	                }
	            },
	            
	            // Do not change code below
	            errorPlacement: function(error, element)
	            {
	                error.insertAfter(element.parent());
	            }
	        });
        }

    };

}();