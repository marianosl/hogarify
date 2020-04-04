var Contacto = function () {

    return {
        //Contact Form
        init: function () {
            // Validation
            $("#sky-form-contacto").validate({
                // Rules for form validation
                rules:
                        {
                            txtName:
                                    {
                                        required: true,
                                        minlength: 2
                                    },
                            txtEmail:
                                    {
                                        required: true,
                                        email: true
                                    },
                            txtMessage:
                                    {
                                        required: true,
                                        minlength: 10
                                    }
                        },
                // Messages for form validation
                messages:
                        {
                            txtName:
                                    {
                                        required: 'Por favor ingrese su nombre',
                                        minlength: 'Por favor ingrese un nombre valido'
                                    },
                            txtEmail:
                                    {
                                        required: 'Por favor ingrese su email',
                                        email: 'Por favor ingrese una cuenta de email válida'
                                    },
                            txtMessage:
                                    {
                                        required: 'Por favor ingrese su mensaje',
                                        minlength: 'El mensaje debe contener al menos 10 caracteres'
                                    }
                        },
                // Ajax form submition                  
                submitHandler: function (form)
                {
                    $('#sky-form-contacto').hide();
                    //alert('Su mensaje ha sido enviado');
                    $('#contacto-mensajeenviado').show();

                    $(form).ajaxSubmit(
                            {
                                beforeSend: function ()
                                {
                                    //$('#sky-form-contacto button[type="submit"]').attr('disabled', true);
                                    //$('#sky-form-contacto').attr('display', 'none');
                                    //$('.submited').attr('display', 'block');
                                },
                                success: function ()
                                {
                                    //$('#sky-form-contacto').attr('display', 'none');
                                    //$('.submited').attr('display', 'block');
                                }
                            });
                },
                // Do not change code below
                errorPlacement: function (error, element)
                {
                    error.insertAfter(element.parent());
                }
            });
        }

    };

}();