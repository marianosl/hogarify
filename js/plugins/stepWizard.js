var StepWizard = function () {

    return {

        initStepWizard: function () {
            var form = $("#sky-form-confirmarCompra");
                form.validate({
                    rules: {
                        txtNroTarjeta:
    	                {
    	                	required: true,
    	                	number: true,
                                minlength: 4,
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
                    messages:{
                    	txtNroTarjeta:
    	                {
    	                	required: 'Por favor ingrese la tarjeta de credito',
    	                    number: 'Por favor ingrese una tarjeta de credito valida',
    	                    minlength: 'La tarjeta de credito debe tener al menos 4 digitos',
                            maxlength: 'La tarjeta de credito debe tener como máximo 16 digitos'
    	                },
    	                txtCodSeguridad:
    	                {
    	                    required: 'Por favor ingrese el codigo de seguridad',
    	                    number: 'Por favor ingrese un codigo de seguridad valido',
                            minlength: 'El codigo de seguridad debe tener al menos 3 digitos',
    	                    maxlength: 'El codigo de seguridad debe tener como máximo 4 digitos'	                    
    	                }
                    },
                    errorPlacement: function errorPlacement(error, element) { element.before(error); }
                });
                form.children("div").steps({
                    headerTag: ".header-tags",
                    bodyTag: "section",
                    transitionEffect: "fade",
                    onStepChanging: function (event, currentIndex, newIndex) {
                        // Allways allow previous action even if the current form is not valid!
                        if (currentIndex > newIndex)
                        {
                            return true;
                        }
                        form.validate().settings.ignore = ":disabled,:hidden";
                        return form.valid();
                    },
                    onFinishing: function (event, currentIndex) {
                        form.validate().settings.ignore = ":disabled";
                        return form.valid();
                    },
                    onFinished: function (event, currentIndex) {
                       // alert("Submitted!");
                    	form.submit();
                    }
                });
        }

    };
}();