$(document).ready(function () {
    $('#form1').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            txtNombreTipo: {
                message: 'Este campo no es válido',
                validators: {
                    notEmpty: {
                        message: 'Este campo es requerido'
                    },
                    stringLength: {
                        min: 3,
                        max: 30,
                        message: 'El campo debe tener entre 3 y 30 caracteres'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z\ñ\Ñ\0-9_\-.]+$/,
                        message: 'El campo no pueden contener caracteres especiales'
                    }
                }
            },
            txtNombre: {
                message: 'El nombre no es válido',
                validators: {
                    notEmpty: {
                        message: 'El nombre es requerido'
                    },
                    stringLength: {
                        min: 3,
                        max: 30,
                        message: 'El nombre debe tener entre 3 y 30 caracteres'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z\.]+$/,
                        message: 'El nombre solo pueden contener letras'
                    }
                }
            },
            txtDocumento: {
                validators: {
                    notEmpty: {
                        message: 'Este campo es requerido'
                    },
                    integer: {
                        message: 'El valor no es entero'
                    },
                    stringLength: {
                        min: 6,
                        max: 11,
                        message: 'El Numero de documento debe tener entre 6 y 11 caracteres'
                    },
                }
            },
            txtUsuario: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'The username is required and can\'t be empty'
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: 'The username must be more than 6 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_\.]+$/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    }
                }
            },
            txtAnual: {
                validators: {
                    notEmpty: {
                        message: 'Este campo es requerido'
                    },
                    integer: {
                        message: 'El valor no es entero'
                    },
                    lessThan: {
                        value: 2100,
                        inclusive: true,
                        message: 'El año no puede ser mayor de 2100'
                    },
                    greaterThan: {
                        value: 2000,
                        inclusive: false,
                        message: 'El año no puede ser menor de 2000'
                    }
                }
            },
            txtFecha: {
                validators: {
                    notEmpty: {
                        message: 'Este campo es requerido'
                    },
                    date: {
                        format: 'DD/MM/YYYY',
                        message: 'La fecha no es válida'
                    },
                }
            },
            txtFecha1: {
                validators: {
                    notEmpty: {
                        message: 'Este campo es requerido'
                    },
                    date: {
                        format: 'DD/MM/YYYY',
                        message: 'La fecha no es válida'
                    }
                }
            },
            txtFecha2: {
                validators: {
                    notEmpty: {
                        message: 'Este campo es requerido'
                    },
                    date: {
                        format: 'DD/MM/YYYY',
                        message: 'La fecha no es válida'
                    }
                }
            },
            txtCorreo: {
                validators: {
                    notEmpty: {
                        message: 'Este campo es requerido'
                    },
                    emailAddress: {
                        message: 'Debe digitar un correo válido'
                    }
                }
            },
            txtPassword: {
                validators: {
                    notEmpty: {
                        message: 'Este campo es requerido'
                    }
                }
            },
            'txtTabla1[]': {
                        validators: {
                            notEmpty: {
                                message: 'Este campo es requerido'
                            }
                        }
                    },
            
            
            
            country: {
                validators: {
                    notEmpty: {
                        message: 'The country is required and can\'t be empty'
                    }
                }
            },
            acceptTerms: {
                validators: {
                    notEmpty: {
                        message: 'You have to accept the terms and policies'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'The email address is required and can\'t be empty'
                    },
                    emailAddress: {
                        message: 'The input is not a valid email address'
                    }
                }
            },
            website: {
                validators: {
                    uri: {
                        allowLocal: true,
                        message: 'The input is not a valid URL'
                    }
                }
            },
            phoneNumberUS: {
                validators: {
                    phone: {
                        message: 'The input is not a valid US phone number'
                    }
                }
            },
            phoneNumberUK: {
                validators: {
                    phone: {
                        message: 'The input is not a valid UK phone number',
                        country: 'GB'
                    }
                }
            },
            color: {
                validators: {
                    hexColor: {
                        message: 'The input is not a valid hex color'
                    }
                }
            },
            zipCode: {
                validators: {
                    zipCode: {
                        country: 'US',
                        message: 'The input is not a valid US zip code'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'The password is required and can\'t be empty'
                    },
                    identical: {
                        field: 'confirmPassword',
                        message: 'The password and its confirm are not the same'
                    }
                }
            },
            confirmPassword: {
                validators: {
                    notEmpty: {
                        message: 'The confirm password is required and can\'t be empty'
                    },
                    identical: {
                        field: 'password',
                        message: 'The password and its confirm are not the same'
                    }
                }
            },
            date: {
                validators: {
                    date: {
                        format: 'DD/MM/YYYY',
                        message: 'The birthday is not valid'
                    }
                }
            },
            ages: {
                validators: {
                    lessThan: {
                        value: 100,
                        inclusive: true,
                        message: 'The ages has to be less than 100'
                    },
                    greaterThan: {
                        value: 10,
                        inclusive: false,
                        message: 'The ages has to be greater than or equals to 10'
                    }
                }
            }
        }
    });
    // Validate the form manually
    $('#validateBtn').click(function () {
        $('#form1').bootstrapValidator('validate');
    });

    $('#resetBtn').click(function () {
        $('#form1').data('bootstrapValidator').resetForm(true);
    });
});