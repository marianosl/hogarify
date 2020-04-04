var AltaCompra = function () {

    return {
        
        //Masking
        init: function () {
	        // Validation for login form
	        $("#sky-form-altaCompra").validate({
	            // Rules for form validation
	        	rules:
	            {
	        		txtEmail:
	                {
	                    required: true,
	                    email: true
	                },
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
	                	number: true,
                                minlegth: 4,
	                	maxlength: 16 
	                },
	                txtCodSeguridad:
	                {
	                	required: true,
	                	number: true,
	                	minlength: 3,
    	                	maxlength: 4
	                }
	            },
	            
	            // Messages for form validation
	            messages:
	            {
	            	txtEmail:
	                {
	                	required: 'Por favor ingrese el email',
	                    email: 'Por favor ingrese una cuenta de email válida'
	                },
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
	                	number: 'Por favor ingrese una tarjeta de crédito válida',
	                        minlength: 'La tarjeta de credito debe tener al menos 4 digitos',
                                maxlength: 'La tarjeta de credito debe tener como máximo 16 digitos'
	                },
	                txtCodSeguridad:
	                {
	                    required: 'Por favor ingrese el código de seguridad',
	                    number: 'Por favor ingrese un código de seguridad válido',
	                    minlength: 'El codigo de seguridad debe tener al menos 3 digitos',
    	                    maxlength: 'El codigo de seguridad debe tener como máximo 4 digitos'	                    
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