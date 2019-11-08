(function(){

  var dir =  $("#base_url").val();

  var cron = {
    time: 3000,
    // time: 900000,
    start: 0,
    end: false,
    sendTest: function(){
      // aqui el post para enviar el form si no lo temina
      if(this.end){

        // console.log("se envia el formulario");
        //
        // alert("test finalizado");
        // // sweet alert de test finalizadio
        //
        // console.log("hace redirect");
        // // redireccion
        // window.location = dir;
      }
    },
    init: function(){
      setInterval(() => {
        this.end =  true;
        this.sendTest();
      }, this.time);
    },
  }
  cron.init();

}).call(this)
