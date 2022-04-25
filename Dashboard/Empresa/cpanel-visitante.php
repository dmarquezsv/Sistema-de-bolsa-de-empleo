<?php
include_once '../../BD/Conexion.php';
include_once '../../BD/Consultas.php';
include_once '../../main/funcionesApp.php';
include_once 'templates/head.php';
$Conexion = new Consultas();
$FuncionesApp = new funcionesApp();

$resultPerfilEmpresa = $Conexion->ejecutar_consulta_conteo("empresa_perfil" , "IDUsuario" , $IDUser); //10

if ($resultPerfilEmpresa == 0) {

  header('Location: crear-perfil-empresa.php');

}else if($resultPerfilEmpresa == 1){

  $sql="SELECT `estado` , `Expira` , `fecha_registro` , Expira , logo FROM `empresa_perfil` WHERE `IDUsuario` = ? ";
  $stmt = $Conexion->ejecutar_consulta_simple_Where($sql ,$IDUser);
  while ($item=$stmt->fetch())
  {
    $estado = $item['estado'];
    $Expira = $item['Expira'];
    $FechaRegistro = $item['fecha_registro'];
    $FechaVencimiento = $item['Expira'];
    $logo = $item['logo'];
  }

}

if($estado == "Activo"){
  echo "<script>location.href='./';</script>";
}

?>
<title>Empresa | Reclutador</title>
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


    #imglogo{

    width: 100%; 
    height: 5em;
    
  }

  @media only screen and (max-width: 767px) {

    #imglogo{

      width: 100%; 
      height: 5em;


    }


  }



  @media only screen and (min-width: 600px) and (max-width: 799px){

   #imglogo{

    width: 100%; 
    height: 5em;

  }

}

</style>

<main id="main-container">

  <div class="bg-image bg-image-bottom" id="imgbanner">
    <div class="">
      <div class="content content-top text-center overflow-hidden">
        <div class="pt-40 pb-20">

          <h2 class="h4 font-w400  invisible" id="titulos"  style="color: white;" data-toggle="appear" data-class="animated fadeInUp">¡Bienvenido a tu panel <?php echo $PrimerNombre[0] ?> ! </h2>
        </div>
      </div>
    </div>
  </div>

  <div style="margin-right:2%; margin-left:2%;">


    <div class="row gutters-tiny invisible" data-toggle="appear" data-class="animated bounceInLeft" >

      <div class="col-6 col-md-4 col-xl-4">
        <a class="text-center" href="actualizar-perfil-empresa.php">
          <div class="block-content ribbon ribbon-bookmark ribbon-crystal  cuadros">
            <p class="mt-5">
              <i class="fa fa-building-o fa-3x text-white"></i>
            </p>
            <p class="font-w600 text-white">Pefil <br>Empresa</p>
          </div>
        </a>
      </div>


      <div class="col-6 col-md-4 col-xl-4">
        <a class="block text-center" href="servicio-solicitado">
          <div class="block-content ribbon ribbon-bookmark ribbon-crystal ribbon-left bg-gd-dusk">
            <p class="mt-5">
             <i class="fa fa-folder-open-o fa-3x text-white"></i>
           </p>

           <p class='font-w600 text-white' >Solicitar <br> Servicio</p>

         </div>
       </a>
     </div>

     

     <div class="col-6 col-md-4 col-xl-4">
      <a class="block text-center" href="javascript:void(0)" data-toggle='modal' data-target='#exampleModal'>
        <div class="block-content ribbon ribbon-bookmark ribbon-crystal ribbon-left bg-gd-dusk">
         <p class="mt-5">
          <i class="fa fa-info fa-3x text-white"></i>
        </p>
        <p class="font-w600 text-white">Pregunta <br> Frecuente</p>
      </div>
    </a>
  </div>



  <!-- END Row #1 -->

</div>


<div class="row gutters-tiny js-appear-enabled animated bounceInRight" data-toggle="appear" data-class="animated bounceInRight">

     <div class="col-md-6">
      <div class="block block-transparent bg-gd-dusk">
        <div class="block-content block-content-full">
          <div class="block block-transparent  d-flex align-items-center w-100" class="cuadros">
            <div class="block-content block-content-full">
              <br><br>
              
              <p class="text-center">
                <a class="img-link" href="javascript:void(0)" data-toggle="modal" data-target="#modal-terms">
                  <img class="img-avatar img-avatar-thumb" style="width: 135px; height: 135px;" src="../../assets/img/user/<?php echo $FotoUser ?>" alt="userfoto">
                </a>
              </p>


              <div class="block-content block-content-full block-content-sm text-center">
                <div class="font-w600 text-white mb-5"><b><?php echo $NombresUser . " " . $ApellidosUser ?></b></div>
                <div class="font-size-sm text-white"><b><?php echo $CorreoUser ?></b></div>
              </div>

              

              <div class="block-content text-center">
                <div class="row items-push">
                  <div class="col-lg-6 col-md-6 col-12">
                    <br>
                    <div class="mb-5">

                      <button  class="btn btn-hero btn-rounded btn-noborder btn-alt-primary mr-5 mb-5" disabled><i class="fa fa-user"></i> Cuenta Usuario </button>
                      

                    </div>

                  </div>
                  <div class="col-lg-6 col-md-6 col-12">
                    <br>
                    <button  class="btn btn-hero btn-rounded btn-noborder btn-alt-primary mr-5 mb-5" disabled><i class="fa fa-cloud-upload"></i>  Logo Empresa </button>
                    
                    <br>
                  </div>
                </div>
              </div>

              

            </div>
          </div>      
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="block block-transparent bg-gd-dusk">
        <div class="block-content block-content-full">

          <div class="block block-transparent  d-flex align-items-center w-100" class="cuadros">
            <div class="block-content block-content-full" style="margin-bottom: 13px;">

              <div class="py-15 px-20 clearfix border-black-op-b">
                <div class="float-right mt-15 d-none d-sm-block">
                  <i class="si si-book-open fa-2x text-white"></i>
                </div>
                <div class="font-size-sm font-w600 text-uppercase text-white">Logo empresa:  <?php if($logo == "pordefecto.jpg"){echo "No hay logo subido";} ?></div>
                <hr>

                <div class="col-md-12 col-xl-12" >
                 <!-- Property -->


              <div class="block-content p-0 overflow-hidden text-center">
                  <?php if($logo == "pordefecto.jpg"){echo "<p class='text-white'>No hay logo subido</p>";}else{ ?>

                  <a class="img-link" href="javascript:void(0)" class="text-center">
                    <img  src="../../main/img/LogosEmpresas/<?php echo $logo ?>" class="img-fluid" id="imglogo">
                  </a>
                  
                <?php } ?>

                  
                </div>

              </div>



            </div>


            <div class="py-15 px-20 clearfix border-black-op-b">
              <div class="float-right mt-15 d-none d-sm-block">
                <i class="si si-book-open fa-2x text-white"></i>
              </div>
              <div class="font-size-sm font-w600 text-uppercase text-white">Perfil Empresa</div>
              <hr>

              <div class="row">
                <div class="col-sm">
                  <h6 class="text-white">Empresa: <?php echo$Empresa; ?></h6> 
                </div>

                <div class="col-sm">
                  <h6 class="text-white">Estado: <?php echo $estado; ?></h6> 
                </div>

              </div>

            </div>


            <div class="py-15 px-20 clearfix border-black-op-b">
              <div class="float-right mt-15 d-none d-sm-block">
                <i class="si si-eye fa-2x text-white"></i>
              </div>
              <div class="font-size-sm font-w600 text-uppercase text-white">Estado de la empresa</div>
              <hr>

              <div class="row">

               <div class="col">
                <h6 class="text-white">Fecha Renovada: <?php echo$FechaRegistro; ?></h6> 
              </div>

              <div class="col">
                <h6 class="text-white">Fecha Vencimiento: <?php echo$FechaVencimiento; ?></h6> 

              </div>

            </div>
          </div>



        </div>
      </div>   

    </main>


    <!-- Terms Modal -->
    <div class="modal fade" id="modal-terms2" tabindex="-1" role="dialog" aria-labelledby="modal-terms2" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-slidedown" role="document">
        <div class="modal-content">
          <div class="block block-themed block-transparent mb-0">
            <div class="block-header bg-primary-dark">
              <h3 class="block-title">Cambiar logo de empresa</h3>
              <div class="block-options">
                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                  <i class="si si-close"></i>
                </button>
              </div>
            </div>
            <div class="block-content">
              <div class="block">
                <div class="block-content block-content-full text-center">

                 <img src="../../assets/recusosMundoEmpleo/logo.png" class="img-fluid" style="height: 100px; width: 250px;"  data-toggle="appear" data-class="animated flipInY">
                 <h3 class="font-size-h2 font-w300 mt-20" data-toggle="appear" data-class="animated flipInY"  id="titulos" style="color: #0B3486;">sube tu logo de empresa </h3>

                 <br>
                 <form method="POST" action="Modelos/ModelosImagenes/CambiarImagenEmpresa.php" enctype="multipart/form-data">
                  <input type="hidden" name="IDempresa" value="<?php echo$IDEmpresa; ?>">
                  <input type="hidden" name="imgempresa" value="<?php echo$logo; ?>">
                  <input type="file" name="imgusu" id="imgusu" class="form-control" accept="image/*" required />

                  <br>

                  <p class="text-center">

                    <button type='submit' class='btn btn-sm btn-hero btn-noborder mb-10 mx-5' name='Guardar' id="valida2r" style="background:#FCC201; color:#0B3486; font-weight: bold;">
                      <i class='fa fa-save mr-5'></i>Guardar
                    </button>

                     <button type="button" class="btn btn-sm btn-hero btn-noborder mb-10 mx-5" data-dismiss="modal" style="background:#FCC201; color:#0B3486; font-weight: bold;">Cerrar</button>

                  </p>

                  <br>
                  <center>
                    <div id="respuestaIMG"></div>
                  </center>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END Terms Modal -->




</div>
</main>


<?php if (isset($_GET['success'])) {?>
  <!-- Onboarding Modal functionality is initialized in js/pages/be_pages_dashboard.min.js which was auto compiled from _es6/pages/be_pages_dashboard.js -->
  <div class="modal fade" id="modal-onboarding" tabindex="-1" role="dialog" aria-labelledby="modal-onboarding" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-popout" role="document">
      <div class="modal-content rounded">
        <div class="block block-rounded block-transparent mb-0 bg-pattern" style="background-image: url('assets/media/various/bg-pattern-inverse.png');">
          <div class="block-header justify-content-end">
            <div class="block-options">
              <a class="font-w600 text-danger" href="#" data-dismiss="modal" aria-label="Close">
               Salir
             </a>
           </div>
         </div>
         <div class="block-content block-content-full">

           <div class="pb-50">
            <div class="row justify-content-center text-center">
              <div class="col-md-10 col-lg-8">
                <img src="../../assets/img/icono/icono-advertencia.png" class="img-fluid"   data-toggle="appear" data-class="animated flipInY" class="img-fluid" style="width: 100px; height: 100px;">
                <h3 class="font-size-h2 font-w300 mt-20"  data-toggle="appear" data-class="animated flipInY" id="titulos" style="color: #0B3486;">Periodo Finalizado </h3>

                <p class="text-muted" style="text-align: justify;" data-toggle="appear" data-class="animated fadeInUp">
                 <?php echo $PrimerNombre[0] ." ". $PrimerApellido[0]; ?>: hemos desactivado tu usuario debido que ha terminado periodo. Recuerda Al finalizar fecha <?php $date = date_create($FechaVencimiento);  echo date_format($date,"d/m/Y"); ?>. Ya no podra utilizar la plataforma por que deberas solicitar el servicio de nuevo con Mundo Empleo.
               </p>





             </div>
           </div>
         </div>



       </div>
     </div>
   </div>
 </div>
</div>
<!-- END Onboarding Modal -->
<?php }  ?>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pregunta Frecuentes</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
         


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

          
        </div>
      
    </div>
  </div>
</div>
</div>

<?php include_once 'templates/footer.php';
include_once 'templates/script.php';
include_once '../../templates/alertas.php';
?>

