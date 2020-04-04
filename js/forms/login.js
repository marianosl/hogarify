var Login = function () {

    return {
        
        //Masking
        initLogin: function () {
	        // Validation for login form
	        $("#sky-form-login").validate({
	            // Rules for form validation
	            rules:
	            {
	        	txtEmail:
	                {
	                    required: true,
	                    email: true
	                },
	                txtPass:
	                {
	                    required: true,
	                    minlength: 6,
	                    maxlength: 20
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
	                txtPass:
	                {
	                    required: 'Por favor ingrese su contraseña',
	                    minlength: 'Debe ingresar al menos 6 caracteres',
	                    maxlength: 'Debe ingresar menos de 20 caracteres'
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