<?php
include_once '../../BD/Conexion.php';
include_once '../../BD/Consultas.php';
include_once '../../main/funcionesApp.php';
include_once 'templates/head.php';
$Conexion = new Consultas();
$FuncionesApp = new funcionesApp();

$Precio = base64_decode($_POST['opc']);

$MesSolicitado = base64_decode($_POST['servico']);

 $Total = $Precio * $MesSolicitado;

?>
<title>Empresa | Perfil</title>
<?php 
include_once 'templates/styles.php';
include_once 'templates/MenuRight.php';
include_once 'templates/MenuLeft.php';
include_once 'templates/header.php';
?>

<style type="text/css">
  .bg-gd-dusk {
    background: #d262e3;
    background: linear-gradient(135deg,#0B3486,#39899bbf 100%) !important;
  }
</style>

<main id="main-container">

	<div class="bg-image bg-image-bottom" style="background-image: url('../assets/media/photos/photo34@2x.jpg');">
    <div class="bg-primary-dark-op">
      <div class="content content-top text-center overflow-hidden">
        <div class="pt-40 pb-20">
          <center> <img src="../../assets/img/logo/logo2_footer.png" data-toggle="appear" data-class="animated bounceInDown"> </center>
          <h1 class="font-w700 text-white mb-10 invisible" data-toggle="appear" data-class="animated fadeInUp">Mundo Empleo</h1>
          <h2 class="h4 font-w400 text-white-op invisible" data-toggle="appear" data-class="animated fadeInUp">Solicitar Servicio</h2>
        </div>
      </div>
    </div>
  </div>

  <!-- Page Content -->
  <div class="content">
    <!-- Invoice -->
    <h2 class="content-heading d-print-none">
      <a href="solicitar-servicio-empresa.php"  class="btn btn-sm btn-rounded btn-primary float-right" style="margin-left: 5px;">Regresar</a>
      <button class="btn btn-sm btn-rounded btn-primary float-right" id="SolicitarServicio">Solicitar Servicio <div id="status"></div> </button>
       <input type="hidden" name="precio" id="precio" value="<?php echo $Precio; ?>">
       <input type="hidden" name="mes" id="mes" value="<?php echo $MesSolicitado ?>">
       <input type="hidden" name="total" id="total" value="<?php echo $Total ?>">
       <input type="hidden" name="Iduser" id="Iduser" value="<?php echo $IDUser; ?>"> 
      Factura
    </h2>
    <div class="block">
      <div class="block-header block-header-default">
        <h3 class="block-title">#INV0015</h3>
        <div class="block-options">
          <!-- Print Page functionality is initialized in Helpers.print() -->
          <button type="button" class="btn-block-option" onclick="Codebase.helpers('print-page');">
            <i class="si si-printer"></i> Imprimir factura
          </button>
          <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>
          <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
            <i class="si si-refresh"></i>
          </button>
        </div>
      </div>
      <div class="block-content">
        <!-- Invoice Info -->
        <div class="row my-20">
          <!-- Company Info -->
          <div class="col-6">
            <p class="h3">Empresa</p>
            <address>
              Street Address<br>
              State, City<br>
              Region, Postal Code<br>
              info@mundoempleoca.com
            </address>
          </div>
          <!-- END Company Info -->

          <!-- Client Info -->
          <div class="col-6 text-right">
            <p class="h3">Cliente</p>
            <address>
              <b><?php echo $NombresUser." ".$ApellidosUser; ?></b><br>
              <b><?php echo $CorreoUser ?></b><br>
              <b>Cargo:<?php echo $CargoUser; ?></b><br>
              <b>Fecha Solicitada: <?php echo date("d-m-Y"); ?></b>

            </address>
          </div>
          <!-- END Client Info -->
        </div>
        <!-- END Invoice Info -->

        <!-- Table -->
        <div class="table-responsive push">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th class="text-center" style="width: 60px;"></th>
                <th><b>Servicio Solicitado</b></th>
                <th class="text-center" style="width: 90px;">Solicitado</th>
                <th class="text-right" style="width: 120px;">Precio</th>
                <th class="text-right" style="width: 120px;">Total</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="text-center">1</td>
                <td>
                  <p class="font-w600 mb-5">Acceso a la plataforma de Mundo Empleo.</p>
                  <div class="text-muted">Servicio Solicitado por <?php echo $MesSolicitado ?> mes.</div>
                </td>
                <td class="text-center">
                  <span class="badge badge-pill badge-primary"><?php echo $MesSolicitado ?> mes</span>
                </td>
                <td class="text-right">$<?php echo $Precio; ?></td>
                <td class="text-right">$<?php $operacion = $Precio * $MesSolicitado; echo$operacion; ?></td>
                
              </tr>
          
          
             
              <tr>
                <td colspan="4" class="font-w600 text-right">Tipo de IVA</td>
                <td class="text-right">13%</td>
              </tr>
             
              <tr class="table-warning">
                <td colspan="4" class="font-w700 text-uppercase text-right">Total</td>
                <td class="font-w700 text-right">$25.00</td>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- END Table -->

        <!-- Footer -->
        <p class="text-muted text-center">Muchas gracias por hacer negocios con nosotros. ¡Esperamos volver a trabajar contigo!</p>
        <!-- END Footer -->
      </div>
    </div>
    <!-- END Invoice -->
  </div>
  <!-- END Page Content -->



</main>



<?php include_once 'templates/footer.php';
include_once 'templates/script.php';
include_once '../../templates/alertas.php';
?>

<script type="text/javascript">




  
  $('#SolicitarServicio').on('click', function() {


    var precio =$('#precio').val();
    var mes =$('#mes').val();
    var total = $('#total').val();
    var iduser = $('#Iduser').val();

    $.ajax({
      url: 'Modelos/ModelosSolicitud/solicitar-servicio.php' ,
      type: 'POST' ,
      dataType: 'html',
      data: {usuario:"<?php echo $IDUser; ?>",precio:precio,mes:mes,total:total},

      beforeSend: function() {
        swal({title:'solicitando',text:'Procesando el envio,Por favor espere',type:'success'});
      }

    })
     .done(function(response){
      var result = response;
      
      if (result == 1){

        swal({title:'solicitado',text:'Se ha notificado al encargado de mundo empleo. En breve minutos te enviaremos la aprobación por medio de la plataforma o via E-mal.Por favor espere sera dirigido cpanel-visitante mientras tanto',type:'success'});

        setTimeout("location.href='cpanel-visitante.php'", 8000);
      }else{
        swal({title:'alerta',text:'Intente de nuevo para procesar el envio',type:'error'});
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




