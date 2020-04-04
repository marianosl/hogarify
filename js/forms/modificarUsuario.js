var ModificarUsuario = function () {

    return {
        
        //Masking
        init: function () {
	        // Validation for login form
	        $("#sky-form-modificarUsuario").validate({
	            // Rules for form validation
	        	rules:
	            {
	                txtPassword:
	                {
	                    required: true,
	                    minlength: 6,
	                    maxlength: 20
	                },
	                txtNombre:
	                {
	                    required: true,
                            minlength: 2
	                },
	                txtApellido:
	                {
	                    required: true,
                            minlength: 2
	                },
	                txtDNI:
	                {
	                	required: true,
	                	digits: true,
	                	maxlength: 9
	                },
	                txtDireccion:
	                {
	                    required: true,
                            minlength: 3
	                }
	            },
	            
	            // Messages for form validation
	            messages:
	            {
	                txtPassword:
	                {
	                	required: 'Por favor ingrese su contraseña',
	                    minlength: 'Debe ingresar al menos 6 caracteres',
	                    maxlength: 'Debe ingresar menos de 20 caracteres'
	                },
	                txtNombre:
	                {
	                    required: 'Por favor ingrese su nombre',
                            minlength: 'Por favor ingrese un nombre valido'
	                },
	                txtApellido:
	                {
	                    required: 'Por favor ingrese su apellido',
                            minlength: 'Por favor ingrese un apellido valido'
	                },
	                txtDNI:
	                {
	                	required: 'Por favor ingrese DNI',
	                	digits: 'Por favor ingrese un DNI válido',
	                	maxlength: 'Por favor ingrese un DNI valido'
	                },
	                txtDireccion:
	                {
	                    required: 'Por favor ingrese su dirección',
                            minlength: 'Por favor ingrese una dirección válida'
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