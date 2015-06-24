//NAVBAR cuando llega a lo alto se detiene (fixed)
$(document).ready(function() {
    var menu = $('#nav');
    var menu_offset = menu.offset();
    // Comprobaremos el estado del menu
    // cada vez que se haga scroll en la página
    // y lo vamos a alternaremos entre 'fixed' y 'static' según su posición.
    $(window).on('scroll', function() {
        if($(window).scrollTop() > menu_offset.top) {
            $('#home').css('margin-bottom', '7rem');
            menu.addClass('navbar-fixed-top');
        } else {
            $('#home').css('margin-bottom', '0');
            menu.removeClass('navbar-fixed-top');
        }
    });
//Enviar el formulario vía jQuery AJAX
    $('#form, #contacto').submit(function() {
        $('#enviar').attr('disabled', 'disabled').html("Enviando <i class='fa fa-spinner fa-spin'></i>");
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function(data) {
                // Success message
                $('#enviar').html("Enviado  <i class='fa fa-check'></i>");
                $('#result').html(data);
                $('#result').delay(1000).fadeIn(1000);
                $('#result').delay(4000).fadeOut('slow');
                setTimeout(function(){$('#enviar').html("Enviar");},5000);
                //clear all fields
                $('#contacto').trigger("reset");
            },
        });
        return false;
    }); 
});
//scroll script
$('.scroll-me a').bind('click', function (event) { //just pass scroll-me class and start scrolling
    var $anchor = $(this);
    $('html, body').stop().animate({
        scrollTop: $($anchor.attr('href')).offset().top
    }, 1000, 'easeInOutQuad');
    event.preventDefault();
});
//Validar el formuario
$('#contacto').bootstrapValidator({
    message: 'Valor no aceptado',
    fields: {
        name: {
            message: 'El nombre no es válido',
            validators: {
                notEmpty: {
                    message: 'El nombre es requerido'
                },
                stringLength: {
                    min: 3,
                    max: 60,
                    message: 'El nombre debe tener de tres a 60 letras.'
                },
                regexp: {
                    regexp: /^[a-zA-Z ]+$/,
                    message: 'El nombre debe contener solo letras.'
                }
            }
        },
        email: {
            validators: {
                notEmpty: {
                    message: 'El correo electrónico es requerido'
                },
                emailAddress: {
                    message: 'Ingrese un correo electrónico válido'
                }
            }
        },
        phone: {
            message: 'El teléfono no es válido',
            validators: {
                notEmpty: {
                    message: 'El número de teléfono es requerido'
                },
                stringLength: {
                    min: 10,
                    max: 10,
                    message: 'El no. de teléfono debe contener diez dígitos'
                },
                regexp: {
                    regexp: /^[0-9]+$/,
                    message: 'El teléfono debe contener solo números.'
                }
            }
        },
        message: {
            message: 'El mensaje no es válido',
            validators: {
                notEmpty: {
                    message: 'Debe escribir un mensaje.'
                }
            }
        }
    }
});