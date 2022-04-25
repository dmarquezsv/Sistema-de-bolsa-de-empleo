	<!-- Jquery JS -->
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.0.js"></script>
  <!-- Popper JS -->
  <script src="js/popper.min.js"></script>
  <!-- Bootstrap JS -->
  <script src="js/bootstrap.min.js"></script>
  <!-- Modernizr JS -->
  <script src="js/modernizr.min.js"></script>
  <!-- ScrollUp JS -->
  <script src="js/scrollup.js"></script>
  <!-- FacnyBox JS -->
  <script src="js/jquery-fancybox.min.js"></script>
  <!-- Cube Portfolio JS -->
  <script src="js/cubeportfolio.min.js"></script>
  <!-- Slick Nav JS -->
  <script src="js/slicknav.min.js"></script>
  <!-- Slick Nav JS -->
  <script src="js/slicknav.min.js"></script>
  <!-- Slick Slider JS -->
  <script src="js/owl-carousel.min.js"></script>
  <!-- Easing JS -->
  <script src="js/easing.js"></script>
  <!-- Magnipic Popup JS -->
  <script src="js/magnific-popup.min.js"></script>
  <!-- Active JS -->
  <script src="js/active.js"></script>

  <!-- Page JS Plugins  -->
  <script type="text/javascript" src="assets/plugin/sweetalert/sweetalert2.js"></script>

  <script src="assets/plugin/datatables/datatables.min.js"></script>

  <script type="text/javascript">


   $(document).ready(function() {
    $('#enviarmenseja').on('click', function() {

     var Nombre = $('#nombres').val();
     var Apellidos = $('#apellidos').val();
     var correo = $('#email').val();
     var telefono = $('#telefono').val();
     var pais = $('#pais option:selected');
     var paisEvaluar = pais.val();
     var cargo = $('#cargo option:selected');
     var cargoEvaluar = cargo.val();
     var comentario = $('#comentario').val();
     

     

     if (Nombre == "" || Apellidos == "" || correo == "" || telefono == "" || paisEvaluar =="" || cargoEvaluar =="" || comentario ==""){
       swal({title:'Error',text:'Complete todos los campos',type:'warning'});
       return false;
     }else{

      
       $.ajax({
        url: 'main/UsuarioCuentas/comentariomailer.php' ,
        type: 'POST' ,
        dataType: 'html',
        data: {Nombre:Nombre,Apellidos:Apellidos,correo:correo,telefono:telefono,paisEvaluar:paisEvaluar,cargoEvaluar:cargoEvaluar,comentario:comentario},

        beforeSend: function() {

          swal({
            title: "Cargando...",
            text: "Por favor espera",
            imageUrl: "assets/img/icono/loader.gif",
            button: false,
            closeOnClickOutside: false,
            closeOnEsc: false,
            imageWidth: 100,
            imageHeight: 100,
            showCancelButton: false,
            showConfirmButton: false
          });

        }

      })
       .done(function(response){
        $('#status').html(response);
      })
       .fail(function(request, errorType, errorMessage){
      //timeout, error, abort, parseerror
      console.log(errorType);
      alert(errorMessage);
    })
       .always(function(){
        swal({title:'Se ha enviado el mensaje',text:'Muchas Gracias por contactarte. Muy pronto nos estaremos comunicando.',type:'success'});
        
        $('#nombres').val("");
        $('#apellidos').val("");
        $('#email').val("");
        $('#telefono').val("");
        $("#pais").val($("#pais option:first").val());
        $("#cargo").val($("#cargo option:first").val());
        $('#comentario').val("");

      }) 

   }



 }); 
  });



</script>



</body>
</html>