$(document).ready(function() {
  $('#DejarRocordatorio').on('click', function() {
    
  
    id = 0;
    

   $.ajax({
    url: 'Modelos/ModelosRecordatorio/ModeloRecordatorioPerfil.php' ,
    type: 'POST' ,
    dataType: 'html',
    data: {Mensaje: id  },

    beforeSend: function() {
        $('#status').text('Cargando..');
        //jQuery("#resultado").html("Déjame pensar un poco...");
      }

  })
    .done(function(response){
      $('#result').html(response);
    })
    .fail(function(request, errorType, errorMessage){
      //timeout, error, abort, parseerror
      console.log(errorType);
      alert(errorMessage);
    })
    .always(function(){
      $("#modal-onboarding").modal('hide');
      
    });   
  }); 
});