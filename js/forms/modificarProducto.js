var ModificarProducto = function () {

    return {
        
        //Masking
        init: function () {
	        // Validation for login form
	        $("#sky-form-modificarProducto").validate({
	            // Rules for form validation
	        	rules:
	            {
	        		txtDescripcion:
	                {
	                    required: true
	                },
	                txtPrecio:
	                {
	                    required: true,
	                    number: true
	                },
	                txtStock:
	                {
	                    required: true,
	                    digits: true
	                },
	                txtCantVend:
	                {
	                    required: true,
	                    digits:true
	                },
	                txtEspecificacion:
	                {
	                	required: true
	                }
	            },
	            
	            // Messages for form validation
	            messages:
	            {
	        		txtDescripcion:
	                {
	                    required: 'Por favor ingrese la descripción'
	                },
	                txtPrecio:
	                {
	                    required: 'Por favor ingrese el precio',
	                    number: 'Por favor ingrese un precio válido'
	                },
	                txtStock:
	                {
	                    required: 'Por favor ingrese el stock',
	                    digits: 'Por favor ingrese un stock válido'
	                },
	                txtCantVend:
	                {
	                    required: 'Por favor ingrese la cantidad vendida',
	                    digits: 'Por favor ingrese una cantidad vendida válida'
	                },
	                txtEspecificacion:
	                {
	                	required: 'Por favor ingrese la especificación'
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