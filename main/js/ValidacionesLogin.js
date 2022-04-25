     $(document).ready(function() {
    //keydown, keyup
    $('#validar').on('click', function() {

        //Expresión regular para validar los campos 
        var reg = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/; // Expresion Regular Nombre
        var Email =$("#login-username").val();
        var password = $("#login-password").val();

        if (Email == "" || password == "") 
        {
           swal({title:'Error',text:'Por favor ,identifíquese',type:'warning'});
           return false;

       }else if (!reg.test(Email)) 
       {
        swal({title:'Error',text:'Por favor, ingrese un correo valido',type:'warning'});
        return false;

    }else{

        if($("#login-username"). length > 0 &&  $("#login-password"). length > 0 ){
           var respuesta = " <div class='block-options-item'><i class='fa fa-spinner fa-spin text-black-op'></i></div>"
           $("#respuesta").html(respuesta);
       }else{
         var respuesta = " <div class='block-options-item'><i class='fa fa-spinner fa-spin text-black-op'></i></div>"
           $("#respuesta").html(respuesta);
       }

   }

});
});
