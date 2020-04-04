var Registro = function () {

    return {
        
        //Registration Form
        initRegistration: function () {
	        // Validation       
	        $("#sky-form-registro").validate({                   
	            // Rules for form validation
	            rules:
	            {
	        		txtEmail:
	                {
	                    required: true,
	                    email: true
	                },
	                txtPassword:
	                {
	                    required: true,
	                    minlength: 6,
	                    maxlength: 20
	                },
	                txtPassword2:
	                {
	                    required: true,
	                    equalTo: '#password'
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
	            	txtEmail:
	                {
	                	required: 'Por favor ingrese su email',
	                    email: 'Por favor ingrese una cuenta de email válida'
	                },
	                txtPassword:
	                {
	                	required: 'Por favor ingrese su contraseña',
	                    minlength: 'Debe ingresar al menos 6 caracteres',
	                    maxlength: 'Debe ingresar menos de 20 caracteres'
	                },
	                txtPassword2:
	                {
	                	required: 'Por favor ingrese la contraseña. Ambas deben coincidir',
	                    equalTo: 'Las contraseñas no coinciden'
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