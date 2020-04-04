var AltaCategoria = function () {

    return {
        
        //Masking
        init: function () {
	        // Validation for login form
	        $("#sky-form-altaCategoria").validate({
	            // Rules for form validation
	        	rules:
	            {
	                txtDescripcion:
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