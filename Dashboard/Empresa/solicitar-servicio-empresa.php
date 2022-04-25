<?php
include_once '../../BD/Conexion.php';
include_once '../../BD/Consultas.php';
include_once '../../main/funcionesApp.php';
include_once 'templates/head.php';
$Conexion = new Consultas();
$FuncionesApp = new funcionesApp();

$sql="SELECT Celular FROM `empresa_perfil` WHERE `IDUsuario` = ? ";
$stmt = $Conexion->ejecutar_consulta_simple_Where($sql ,$IDUser);

while ($item=$stmt->fetch())
{
  $celular = $item['Celular'];

}

?>
<title>Empresa | Solicitar Servicio</title>
<?php 
include_once 'templates/styles.php';
include_once 'templates/MenuRight.php';
include_once 'templates/MenuLeft.php';
include_once 'templates/header.php';
?>

<style type="text/css">

  #imgbanner{

    background: url('../assets/media/photos/Soporte_Tecnico.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    height:auto;
  }



</style>

<main id="main-container">

  <div class="bg-image bg-image-bottom" id="imgbanner">
    <div class="">
      <div class="content content-top text-center overflow-hidden">
        <div class="pt-40 pb-20">

          <h2 class="h4 font-w400  invisible" id="titulos"  style="color: white;" data-toggle="appear" data-class="animated fadeInUp">Solicitar el Servicio </h2>
        </div>
      </div>
    </div>
  </div>


  <div style="margin-right:2%; margin-left:2%;">

    <br>
    <!-- Pricing Tables -->
    <div class="container">

     <a href="servicio-solicitado" class="btn  btn-rounded btn-noborder btn-alt-primary mr-5 mb-5"> <i class="si si-action-undo fa-2x5"> </i> Retroceder</a>

     <br><br>
     <p style="font-family: sans-serif; color: black;"> <?php echo $PrimerNombre[0] ." ". $PrimerApellido[0]; ?>: El siguiente punto es solicitar el servicio de la plataforma. Para ello debera  enviar una solicitud. Luego uno de nuestro  equipo se pondra en encontacto para poder prcosesar el pago y luego de ver cancelado podra utilizar la plataforma</p>


     <div class="block">
      <div class="block-header block-header-default">
        <h3 class="block-title">Persona encargada:</h3>
      </div>
      <div class="block-content">


        <div class="form-group row">
          <div class="col-lg-12">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fa fa-user"></i>
                </span>
              </div>
              <input type="text" class="form-control" disabled id="personaEncargada" name="example-input1-group1" placeholder="Persona encargada" value="<?php echo $NombresUser . " " .$ApellidosUser ?>" >
            </div>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-lg-12">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fa fa-phone "></i>
                </span>
              </div>
              <input type="text" class="form-control" disabled id="tel" name="example-input1-group1" placeholder="Teléfono o celular" value="<?php echo $celular ?>"> 
            </div>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-lg-12">
            <div class="input-group">
              <input type="email" class="form-control"  disabled id="email" name="example-input2-group1" placeholder="Email" value="<?php echo $CorreoUser ?>"> 
              <div class="input-group-append">
                <span class="input-group-text">
                  <i class="fa fa-envelope-o"></i>
                </span>
              </div>
            </div>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-12" for="example-textarea-input">Escribe tu comentario es decir agrega cuanto tiempo quieres adquirir la plataforma</label>
          <div class="col-12">
            <textarea  id="js-ckeditor" class="form-control" id="comentario" name="example-textarea-input" rows="6" placeholder="comentario.."></textarea>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-12">
            <button id="SolicitarServicio" class="btn btn-alt-primary btn-block">Solicitar Servicio</button>
          </div>
        </div>

      </div>
    </div>


  </div>









</div>   

</main>



<?php include_once 'templates/footer.php';
include_once 'templates/script.php';
include_once '../../templates/alertas.php';
?>

<script type="text/javascript">





  $('#SolicitarServicio').on('click', function() {


    var personaEncargada =$('#personaEncargada').val();
    var telefono =$('#tel').val();
    var Email = $('#email').val();
    var comentario = CKEDITOR.instances['js-ckeditor'].getData();



      $.ajax({
        url: 'Modelos/ModelosSolicitud/solicitar-servicio.php' ,
        type: 'POST' ,
        dataType: 'html',
        data: {usuario:"<?php echo $IDUser; ?>",personaEncargada:personaEncargada,telefono:telefono,Email:Email,comentario:comentario},

        beforeSend: function() {

          swal({
            title: "Cargando...",
            text: "Por favor espera",
            imageUrl: "../../assets/img/icono/loader.gif",
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
        var result = response;

        $('#personaEncargada').val("");
        $('#tel').val("");
         $('#email').val("");
         CKEDITOR.instances['js-ckeditor'].setData('');

        if (result == 1){

          swal({
            title: "Se ha notificado",
            text: "<?php echo $PrimerNombre[0]?>: Te contactaremos lo más pronto posible. Gracias",
            type: "success",
            confirmButtonText: 'Confirmar',
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              setTimeout("location.href='servicio-solicitado?notificar=1'");
            } 

          });

        }else{

          swal({
            title: "Se ha notificado",
            text: "<?php echo $PrimerNombre[0]?>: Te contactaremos lo más pronto posible. Gracias",
            type: "success",
            confirmButtonText: 'Confirmar',
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              setTimeout("location.href='servicio-solicitado?notificar=1'");
            } 

          });

          
        } 


      })
      .fail(function(request, errorType, errorMessage){
      //timeout, error, abort, parseerror
      swal({title:'alerta',text:'Intente de nuevo para procesar el envio',type:'error'});
      console.log(errorType);
      alert(errorMessage);
    })
    

    

  });
</script>
