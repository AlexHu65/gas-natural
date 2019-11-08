var heightBrowser = $(window).height();
var widthBrowser = $(window).width();
var dir = $("#hdn_baseurl").val();
var actual = window.location.href;
var validEmail = true;

$(window).on('scroll', function(){
  if ( $(window).scrollTop() > 0 ){
    $('#nav-home').addClass('bg-dark');
  } else if(dir == actual){
    $('#nav-home').removeClass('bg-dark');

  }
});

// valida email

$("#emailInput").on('input',function(){
  var email = $(this).val();
  $.post('api/init/validEmail', {email:email}, function(response){
    if(response.band == 0){
      console.log(response.msg);
      $(".email-span").html(response.msg);
      $(".submit").attr('disabled', true);
      validEmail = false;
    }else{
      $(".email-span").html('');
      $(".submit").attr('disabled', false);
      validEmail = true;

    }
  } , 'json');
});

// obtener estado de mexico
$.ajax({
  type: "POST",
  url: "api/init/procesarEstados",
  data: { estados : "Mexico" }
}).done(function(data){
  $("#jmr_contacto_estado").html(data);
});

// Obtener municipios
$("#jmr_contacto_estado").change(function(){
  $('#jmr_contacto_municipio').attr("disabled", true);
  var estado = $("#jmr_contacto_estado option:selected").val();
  $.ajax({
    type: "POST",
    url: "api/init/procesarMunicipio",
    data: { municipios : estado }
  }).done(function(data){
    $("#jmr_contacto_municipio").html(data);
    $('#jmr_contacto_municipio').attr("disabled", false);

  });
});



/* FORMULARIOS */
var formularios = (function () {

  var suscripcion = {
    formulario: $('#frm-suscripcion'),
    campos: {
      nombre: {validators: {notEmpty: {message: "Este campo es requerido"},regexp: {regexp: /^[a-zA-ZÁáÉéÍíÓóÚúñ\s]+$/i,message: 'Solo se permiten letras'}}},
      lada: {validators: {notEmpty: {message: "Este campo es requerido"},regexp: {regexp: /^[0-9\s]+$/i,message: 'Sólo se permiten números'}}},
      telefono: {validators: {notEmpty: {message: "Este campo es requerido"},regexp: {regexp: /^[0-9\s]+$/i,message: 'Sólo se permiten números'}}},
      domicilio: {validators: {notEmpty: {message: "Este campo es requerido"},regexp: {regexp: /^[a-z0-9\s]+$/i,message: 'No se permiten caracteres especiales'}}},
      email: {validators: {notEmpty: {message: "Este campo es requerido"},emailAddress: {message: 'Email no valido'}}},
      colonia: {validators: {notEmpty: {message: "Este campo es requerido"},regexp: {regexp: /^[a-z0-9\s]+$/i,message: 'No se permiten caracteres especiales'}}},
      estado: {validators: {notEmpty: {message: "Este campo es requerido"}}},
      ciudad: {validators: {notEmpty: {message: "Este campo es requerido"}}},
      valid: {validators: {notEmpty: {message: "Este campo es requerido"}}},
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
      $(this).submit(function (e) {
        e.preventDefault();
        if(validEmail){
          $('.send').hide();
          $('.loading').removeClass('dn');
          var datos = $( this ).serialize();
          $.post('api/init/add', datos, function(response){
            console.log(response);
            $('.loading').addClass('dn');
            Swal.fire(
              response.title,
              response.msg,
              response.type
            );

          }, 'json');
          return false;
        }else{
          Swal.fire(
            "Email no valido",
            "Introduce otro email",
            "error"
          );
        }
      });
    });
  };

  return {
    FormSuscripcion: FormSuscripcion
  };
})();

formularios.FormSuscripcion();
