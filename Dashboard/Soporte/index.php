<?php
include_once '../../BD/Conexion.php';
include_once '../../BD/Consultas.php';
include_once '../../main/funcionesApp.php';
include_once 'templates/head.php';
$Conexion = new Consultas();
$FuncionesApp = new funcionesApp();


?>
<title>Soporte técnico | Mundo Empleos CA</title>
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

          <h2 class="h4 font-w400  invisible" id="titulos"  style="color: white;" data-toggle="appear" data-class="animated fadeInUp">¡Panel Administrativo ! </h2>
        </div>
      </div>
    </div>
  </div>

  <div style="margin-right:2%; margin-left:2%;">


    <div class="row gutters-tiny invisible" data-toggle="appear" data-class="animated bounceInLeft" >

      <div class="col-6 col-md-4 col-xl-3">
        <a class="text-center" href="empresas"  >
          <div class="block-content ribbon ribbon-bookmark ribbon-crystal  cuadros">
            <p class="mt-5">
              <i class="fa fa-building-o fa-3x text-white-op"></i>
            </p>
            <p class="font-w600 text-white" style="margin-bottom: 24px;"><br> Empresas <br></p>
          </div>
        </a>
      </div>

      <div class="col-6 col-md-4 col-xl-3">
        <a class=" text-center" href="usuarios">
          <div class="block-content ribbon ribbon-bookmark ribbon-crystal  cuadros">
            <p class="mt-5">
              <i class="fa fa-users fa-3x text-white-op"></i>
            </p>
            <p class='font-w600 text-white' style="margin-bottom: 24px;">Cuentas<br>Candidatos</p>
          </div>
        </a>
      </div>




      <div class="col-6 col-md-4 col-xl-3">
        <a class="text-center" href="paises-departamentos"  >
          <div class="block-content ribbon ribbon-bookmark ribbon-crystal  cuadros">
            <p class="mt-5">
              <i class="fa fa-book fa-3x text-white-op"></i>
            </p>
            <p class="font-w600 text-white" style="margin-bottom: 24px;">Paises y <br>  Departamentos</p>
          </div>
        </a>
      </div>


      <div class="col-6 col-md-4 col-xl-3">
        <a class="text-center" href="areas-trabajos">
          <div class="block-content ribbon ribbon-bookmark ribbon-crystal  cuadros">
            <p class="mt-5">
              <i class="si si-briefcase fa-3x text-white-op"></i>
            </p>
            <p class="font-w600 text-white">Área de  <br> trabajos</p>
          </div>
        </a>
      </div>






    </div>



    <div class="row gutters-tiny invisible" data-toggle="appear" data-class="animated bounceInLeft" >


      <!-- Row #1 -->
      <div class="col-6 col-md-4 col-xl-3">
        <a class="text-center" href="facultades">
          <div class="block-content ribbon ribbon-bookmark ribbon-crystal  cuadros">
            <p class="mt-5">
             <i class="fa fa-graduation-cap fa-3x text-white-op"></i>
           </p>

           <p class='font-w600 text-white' style="margin-bottom: 24px;">Facultades y<br>Carreras</p>

         </div>
       </a>
     </div>


     <div class="col-6 col-md-4 col-xl-3">
      <a class="text-center" href="habilidades">
        <div class="block-content ribbon ribbon-bookmark ribbon-crystal  cuadros">
         <p class="mt-5">
          <i class="fa fa-cogs fa-3x text-white-op" ></i>
        </p>
        <p class="font-w600 text-white" style="margin-bottom: 24px;">Soporte <br>Habilidades</p>
      </div>
    </a>
  </div>

  <div class="col-6 col-md-4 col-xl-3">
    <a class="text-center" href="reportes">
      <div class="block-content ribbon ribbon-bookmark ribbon-crystal  cuadros">
        <p class="mt-5">
          <i class="si si-note fa-3x text-white-op"></i>
        </p>
        <p class="font-w600 text-white">Reportes <br><br> </p>
      </div>
    </a>
  </div>




  <div class="col-6 col-md-4 col-xl-3">
    <a class="text-center" href="seguimientos">
      <div class="block-content ribbon ribbon-bookmark ribbon-crystal  cuadros">
        <p class="mt-5">
          <i class="si si-note fa-3x text-white-op"></i>
        </p>
        <p class="font-w600 text-white">Seguimientos <br><br> </p>
      </div>
    </a>
  </div>

  <!-- END Row #1 -->

</div>




<div class="row gutters-tiny js-appear-enabled animated bounceInRight" data-toggle="appear" data-class="animated bounceInRight">

 <div class="col-md-12">
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
              <div class="col-lg-12 col-md-12 col-12">
                <br>
                <div class="mb-5">

                  <a href="actualizar-cuenta" class="btn btn-hero btn-rounded btn-noborder btn-alt-primary mr-5 mb-5"><i class="fa fa-user"></i> Cuenta Usuario</a>



                </div>

              </div>
             
            </div>
          </div>

          <br>

        </div>
      </div>      
    </div>
  </div>
</div>


</main>




<?php include_once 'templates/footer.php';
include_once 'templates/script.php';
include_once '../../templates/alertas.php';
include_once 'templates/Instrucciones.php'
?>

<?php  if(isset($_GET['seguridad'])){ echo "<script>swal({title:'Advertenicia',text:' Verifica tu correo electrónico para confirmar el cambio de contraseña. Para poder volver iniciar sesión de nuevo',type:'warning'  });</script>"; } ?>