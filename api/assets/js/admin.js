function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#folder-open')
      .attr('src', e.target.result)
    };
  };
  reader.readAsDataURL(input.files[0]);
}


function readURL2(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#folder-open2')
      .attr('src', e.target.result)
    };
  };
  reader.readAsDataURL(input.files[0]);
}

function readURL3(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#home-thumbnail')
      .attr('src', e.target.result)
    };
  };
  reader.readAsDataURL(input.files[0]);
}


(function() {

  $(document).ajaxStart(function () {
    Swal.showLoading();
  })
  .ajaxStop(function () {
    Swal.close();
  });

  var common = (function () {
    var dir = $('#hdn_baseurl').val();

    var dataTables = function() {
      $(document).ready(function() {
        $('#tabla').DataTable({
          "language": {
            "decimal":        "",
            "emptyTable":     "No hay información disponible",
            "info":           "Mostrando _START_ a _END_ de _TOTAL_ registros",
            "infoEmpty":      "Mostrando 0 a 0 de 0 registros",
            "lengthMenu":     "Mostrando _MENU_ registros",
            "loadingRecords": "Cargando...",
            "processing":     "Procesando...",
            "search":         "Buscar:",
            "zeroRecords":    "No se encontraron registros que coincidan",
            "paginate": {
              "first":      "Primero",
              "last":       "Último",
              "next":       "Siguiente",
              "previous":   "Anterior"
            }
          }
        });
      });
    };

    var imgButton = function(){
      $("#img-button").click(function(e){
        e.preventDefault();
        $("#imagen").click();
      })
    }

    var imgButton2 = function(){
      $("#img-button2").click(function(e){
        e.preventDefault();
        $("#imagen2").click();
      })
    }

    var homeBanner = function(){
      $("#home-banner-admin").click(function(e){
        e.preventDefault();
        $("#imagen-banner").click();
      });

      $("#frm-banner-home").submit(function(e){

        e.preventDefault();

        var data = new FormData();
        var file =  $("#imagen-banner")[0].files[0];
        data.append("img" , file);

        $.ajax({
          url: "admin/updateAjaxBanner",
          type: "post",
          data: data,
          cache: false,
          dataType: "json",
          contentType: false,
          processData: false
        })
        .done(function(response){
          alert(response.msg);
        });
      });
    }

    var modalAdd = function(){
      $("#addModal").on('hidden.bs.modal', function () {
        $("#add-form")[0].reset();
        $('#folder-open').attr('src', "http://difraxion.com/sitios/luis-quero/codeigniter/assets/img/lq_quero_open.png");
      });
    }

    var resetBanner = function(){
      $("#cancel-banner").click(function(){
        $("#frm-banner-home")[0].reset();
        let banner = $("#hdn_banner").val();
        $("#home-thumbnail").attr('src' , banner);
      });
    }

    var modalEdit = function(){
      $("#editModal").on('hidden.bs.modal', function () {
        $(".post-ajax").html("");
        $("#selectPostdEdit option[value=default]").prop("selected",true);
      });
    }

    var modalDelete = function(){
      $("#deleteModal").on('hidden.bs.modal', function () {
        $(".post-ajax-delete").html("");
        $("#selectPostdDelete option[value=default]").prop("selected",true);
      });
    }

    var editMenuSelect  = function(){
      $("#selectPostdEdit").change(function(){

        var id =  $(this).find("option:selected").attr('value');
        $.post(dir+'admin/ajaxPost', {'id': id}, function(response){
          var html =  response;
          if(html){
            $(".post-ajax").html(function(){
              return  $(html).hide().fadeIn(1000);
            });
            imgButton2();
            thumbnail();
          }
        });

      });
    }

    var deleteMenuSelect  = function(){

      $("#selectPostdDelete").change(function(){

        var id =  $(this).find("option:selected").attr('value');
        $.post(dir+'admin/ajaxPost', {'id': id , 'delete' : true}, function(response){
          var html =  response;
          if(html){
            $(".post-ajax-delete").html(function(){
              return  $(html).hide().fadeIn(1000);
            });
          }
        });
      });
    }

    var deletePost = function(){
      $("#delete-form").submit(function(e){
        e.preventDefault();
        var data  = new FormData();
        data = $(this).serialize();
        Swal.fire({
          title: '¿Estas seguro?',
          text: "No podrás revertir esto",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si, borrar entrada'
        }).then((result) => {

          if(result.value){
            $.post(dir+'admin/delete', data, function(response){
              alert(response.msg);
              window.location = dir+'webadmin';

            }, "json");
          }
        })
      });

      $("#deleteAction").click(function(e){
        e.preventDefault();
        var data  = new FormData();
        data = $(this).serialize();
        Swal.fire({
          title: '¿Estas seguro?',
          text: "No podrás revertir esto",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si, borrar entrada'
        }).then((result) => {

          if(result.value){
            $.post(dir+'admin/delete', data, function(response){
              alert(response.msg);
              window.location = dir+'webadmin';

            }, "json");
          }
        })
      });
    }

    var addPost  = function(){
      $("#add-form").submit(function(e){

        e.preventDefault();

        var data = new FormData();
        var tipo  = $("#tipo-add").val();
        var file =  $("#imagen")[0].files[0];
        var titulo =  $("#titulo-add").val();
        var contenido =  $("#contenido-add").val();
        var categoria =  $("#categoria-add").val();

        data.append("tipo" , tipo);
        data.append("img" , file);
        data.append("titulo" , titulo);
        data.append("contenido" , contenido);
        data.append("categoria" , categoria);

        $.ajax({
          url: "admin/addAjax",
          type: "post",
          data: data,
          cache: false,
          dataType: "json",
          contentType: false,
          processData: false
        })
        .done(function(response){
          alert(response.msg);
          window.location = dir + "webadmin";
        });


      });

    }

    var addCategorias = function(){

      $("#frm-info-categoria").submit(function(e){
        e.preventDefault();
        var data  = new FormData();
        data = $(this).serialize();
        Swal.fire({
          title: 'Agregar nueva categoría',
          text: "Se agregará una nueva categoría",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si, agregara categoría'
        }).then((result) => {

          if(result.value){
            $.post(dir+'admin/addAjaxCategoria', data, function(response){
              alert(response.msg);
            }, "json");
          }
        })
      });

    }

    var updatePost  = function(){
      $("#edit-form").submit(function(e){

        e.preventDefault();

        var data = new FormData();
        var id =  $("#idPost").val();
        var tipo  = $("#tipo").val();
        var file =  $("#imagen2")[0].files[0];
        var titulo =  $("#titulo").val();
        var contenido =  $("#contenido").val();
        var categoria =  $("#categoria").val();

        data.append("id" , id);
        data.append("tipo" , tipo);
        data.append("img" , file);
        data.append("titulo" , titulo);
        data.append("contenido" , contenido);
        data.append("categoria" , categoria);

        $.ajax({
          url: "admin/updateAjax",
          type: "post",
          data: data,
          cache: false,
          dataType: "json",
          contentType: false,
          processData: false
        })
        .done(function(response){
          alert(response.msg);
          window.location = dir+'webadmin';
        });

      });

    }

    var contactoInfo = function(){
      $("#frm-info-contacto").submit(function(e){
        e.preventDefault();
        var data  = new FormData();
        data = $(this).serialize();
        Swal.fire({
          title: '¿Estas seguro?',
          text: "Se guardara la información de contacto",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si, actualizar información'
        }).then((result) => {

          if(result.value){
            $.post(dir+'admin/updateContact', data, function(response){
              alert(response.msg);
            }, "json");
          }
        })
      });
    }

    var thumbnail =  function(){
      $("#imagen2").on("change", function(){
        readURL2(this);
      });
    }

    var submenu = function() {
      $('.has-subnav').on('click', function(){
        var sub = $(this).find('ul');
        sub.slideToggle();
      });
    };

    var initialize = function () {
      dataTables();
      submenu();
      imgButton();
      imgButton2();
      editMenuSelect();
      modalEdit();
      modalDelete();
      deleteMenuSelect();
      deletePost();
      addPost();
      contactoInfo();
      updatePost();
      modalAdd();
      addCategorias();
      homeBanner();
      resetBanner();
    };

    return {
      init: initialize
    };
  })();

  common.init();

  /* FORMULARIOS */
  var formularios = (function () {
    var dir = $('#hdn_baseurl').val();

    var login = {
      formulario: $('#frm-login'),
      campos: {
        email: {validators: {notEmpty: {message: "Este campo es requerido"},emailAddress: {message: 'Correo no válido'}}},
        password: {validators: {notEmpty: {message: "Este campo es requerido"}}}
      }
    };

    var bootstrapValidator = function (selector, fields, callback) {
      var options = {
        feedbackIcons : {
          valid : "glyphicon glyphicon-ok",
          invalid : "glyphicon glyphicon-remove",
          validating : "glyphicon glyphicon-refresh"
        },
        fields : fields,
        onSuccess : function (e) {
          if (callback != []._ && callback.call) callback.call(selector);
        }
      }

      selector.bootstrapValidator(options);
    };


    var FormLogin = function () {
      bootstrapValidator(login.formulario, login.campos, function(){
        $(this).submit(function () {
          $('.acciones').hide();
          $('.loading').show();
          var datos = $( this ).serialize();
          $.post(dir+'login/do_login', datos, function(response){

            if(response.band == 1){
              window.location = dir+'webadmin';
            }else{
            alert(response.msg);
            }
          }, 'json');
          return false;
        });
      });
    };

    return {
      FormLogin: FormLogin
    };

  })();

  formularios.FormLogin();


}).call(this);
