
// Funcion para validar el correo
$(document).ready(function() {
    //keydown, keyup
    $('#validar').on('click', function() {

        //Expresión regular para validar los campos 
        var reg = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/; // Expresion Regular Nombre
        var regContra = /^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/; // Expresion Regular Nombre

        var regcampos = /^[A-Za-z _ñÑáéíóúÁÉÍÓÚ]*[A-Za-zñÑáéíóúÁÉÍÓÚ][A-Za-z _ñÑáéíóúÁÉÍÓÚ]*$/;

        var Email =$("#signup-email").val();
        var nombre =$("#Nombre").val();
        var apellidos = $("#Apellidos").val();
        var pass1 =$("#password").val();
        var pass2 =$("#signup-password-confirm").val();
        var  cargado ='<div class="preloader d-flex align-items-center justify-content-center"><div class="preloader-inner position-relative">';
        var cargado2 ='<div class="preloader-circle"></div> <div class="preloader-img pere-text"><img src="assets/img/logo/logo.png" alt=""> </div> </div> </div>';
        var Loader = cargado +  cargado2;

        if(nombre==""){
          swal({title:'Error',text:'Por favor, ingrese  sus nombres',type:'warning'});
          return false;
        }else if(apellidos ==""){
          swal({title:'Error',text:'Por favor, ingrese  sus apellidos',type:'warning'});
          return false;
        }else if(!reg.test(Email)){
          swal({title:'Error',text:'Por favor, ingrese un correo valido',type:'warning'});
          return false;
        }else if(pass1==""){
          swal({title:'Error',text:'Por favor, ingrese su contraseña',type:'warning'});
          return false;
        }else if(pass2==""){
          swal({title:'Error',text:'Por favor, ingrese  comparacion de la contraseña',type:'warning'});
          return false;
        }else if(!regContra.test(pass1)){

          swal({title:'Error',text:'Lo siento intente con otra contraseña',type:'warning'});
          return false;
        }else if(!regContra.test(pass2)){
          swal({title:'Error',text:'Lo siento intente con otra contraseña',type:'warning'});
          return false;
        }
        else{

          if (!regcampos.test(nombre)){
           swal({title:'Error',text:'No se permite carácteres especiales',type:'warning'});
           return false;
         }
         else if(!regcampos.test(apellidos)){
           swal({title:'Error',text:'No se permite carácteres especiales',type:'warning'});
           return false;
         }
         else{

          $('#Enviar').html(Loader); 
          return true;
        }


      }




    });
  });


// Funcion para habilitar el boton para los terminos y condiciones
$(document).ready(function() {

  $('#signup-terms').click(function () {
    //check if checkbox is checked
    if ($(this).is(':checked')) {
        $('#validar').removeAttr('disabled'); //enable input
        
      } else {
          $('#validar').attr('disabled', true); //disable input
        }
      });

});


   //VARIABLES GLOBALES
   //
   var Verificar = 0;

  // Funcion para validar contraseña
  $(document).ready(function() {
    //keydown, keyup
    $('#Confirmar').on('keyup', 'input', function() {

        //Expresión regular para validar los campos 
        
        var passwordConfir =$("#signup-password-confirm").val();
        var Password =$("#password").val();

        if (Password == passwordConfir) 
        {
         $('#result').html('');
         Verificar = 0;
       }else
       {
         $('#result').html('<div class="alert alert-warning alert-dismissible fade show" role="alert"> Contraseña no coinciden  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button>  </div>');
         Verificar = 1;
         return false;
       }

       
     });
  });

 // Funcion para validar contraseña pero usando una alerta
 $(document).ready(function() {
  $('#validar').on('click', function() {

    var ExisteCorreo = $('#validez').val();

    if (1 == Verificar){
      swal({title:'Aviso',text:'La contraseña son incorrecta',type:'warning' , timer: 2000 });
      return false;
    }
    
  });

});



//Validar correo
//Si existe un correo no deara el pasao para la inserciono
//con la base de datos

$(document).ready(function() {
  $('#validar').on('click', function() {

    var ExisteCorreo = $('#validez').val();

    if (1 != ExisteCorreo){

    }else{

      swal({title:'Aviso',text:'El correo ya se encuentra en uso',type:'warning' , timer: 2000 });

      return false;
    }

  });

});

//Funcion para enviar los datos extraido por input del correo

$(document).on('keyup','#signup-email', function(){
  var valor = $(this).val();
  if (valor != "") {
   buscar_datos(valor);
 }
});

//Por lo tanto hace la busqueda con ajax

$(buscar_datos());

function buscar_datos(consulta){
  $.ajax({
    url: 'main/ModelosUsuarioCuentas/ValidarUsuarioCorreo.php' ,
    type: 'POST' ,
    dataType: 'html',
    data: {consulta: consulta},
  })
  .done(function(respuesta){
    $("#respuesta").html(respuesta);
  })
  .fail(function(){
    console.log("error");
  });
}

