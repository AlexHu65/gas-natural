var heightBrowser = $(window).height();
var widthBrowser = $(window).width();
var dir = $("#hdn_baseurl").val();
var actual = window.location.href;

$(window).on('scroll', function(){
  if ( $(window).scrollTop() > 0 ){
    $('#nav-home').addClass('bg-dark');
  } else if(dir == actual){
    $('#nav-home').removeClass('bg-dark');

  }
});

// ENVIO DE FORMULARIO



/* FORMULARIOS */
var formularios = (function () {

  var suscripcion = {
    formulario: $('#frm_contacto2'),
    campos: {
      nombre: {validators: {notEmpty: {message: "Este campo es requerido"},regexp: {regexp: /^[a-z\s]+$/i,message: 'Solo se permiten letras'}}},
      email: {validators: {notEmpty: {message: "Este campo es requerido"},emailAddress: {message: 'Email no valido'}}},
      asunto: {validators: {notEmpty: {message: "Este campo es requerido"},regexp: {regexp: /^[a-z0-9\s]+$/i,message: 'No se permiten caracters especiales'}}},
      mensaje: {validators: {notEmpty: {message: "Este campo es requerido"},stringLength: {max: 300,message: 'Estas excediendo el maximo de caracteres permitidos'}}},
      // asunto: {validators: {notEmpty: {message: "Este campo es requerido"},regexp: {regexp: /^[a-z\s]+$/i,message: 'Solo se permiten rapido'}}},

    }
  };

  var bootstrapValidator = function (selector, fields, callback) {
    var options = {
      fields : fields,
      onSuccess : function (e) {
        if (callback != []._ && callback.call) callback.call(selector);
      }
    }
    selector.bootstrapValidator(options);
  };

  var FormSuscripcion = function () {
    bootstrapValidator(suscripcion.formulario, suscripcion.campos, function(){
      $(this).submit(function () {
        $('.send').hide();
        $('.loading').removeClass('dn');
        var datos = $( this ).serialize();
        $.post('api/init/add', datos, function(response){
          $('.loading').addClass('dn');
          $('.msg').html(response.msg);
          $('.msg').removeClass('dn');
        }, 'json');
        return false;
      });
    });
  };

  return {
    FormSuscripcion: FormSuscripcion
  };
})();

formularios.FormSuscripcion();
