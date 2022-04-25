<?php
include_once '../../BD/Conexion.php';
include_once '../../BD/Consultas.php';
include_once '../../main/funcionesApp.php';
include_once 'templates/head.php';
$Conexion = new Consultas();
$FuncionesApp = new funcionesApp();

$fechaActual =date("Y-m-d");
$sql="SELECT `IDCandidatos` FROM `guardar_candidatos_empresas` WHERE TIMESTAMPDIFF(DAY ,`fecha_registro` , ?) >=15";
$stmt =  Conexion::conectar()->prepare($sql);
$stmt->execute(array($fechaActual));
while ($item=$stmt->fetch()){

  Consultas::ejecutar_consulta_eliminar("guardar_candidatos_empresas" , "IDCandidatos" , $item['IDCandidatos']);
}

$fechaActual = date('d-m-Y');
if ($UltimaConexion == "") {

    $sql4 ="UPDATE `usuarios_cuentas` SET `UltimaConexion` = :UltimaConexion WHERE `IDUsuario` = :IDUsuario";
    $stmt =  Conexion::conectar()->prepare($sql4);
    $stmt->bindParam(':IDUsuario', $IDUser , PDO::PARAM_STR);
    $stmt->bindParam(':UltimaConexion', $fechaActual , PDO::PARAM_STR);
    $stmt->execute();
}else if($UltimaConexion != $fechaActual ){

   $sql4 ="UPDATE `usuarios_cuentas` SET `UltimaConexion` = :UltimaConexion WHERE `IDUsuario` = :IDUsuario";
   $stmt =  Conexion::conectar()->prepare($sql4);
   $stmt->bindParam(':IDUsuario', $IDUser , PDO::PARAM_STR);
   $stmt->bindParam(':UltimaConexion', $fechaActual , PDO::PARAM_STR);
   $stmt->execute();
}

include_once 'templates/seguridadCpanel.php';

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

    background: url('../assets/media/photos/inicio_sesion_empresa.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    height:200px;
  }


  #imglogo{

    width: 100%; 
    height: 5em;
    
  }

  @media only screen and (max-width: 767px) {

    #imglogo{

      width: 50%; 
      height: 5em;


    }


  }



  @media only screen and (min-width: 600px) and (max-width: 799px){

   #imglogo{

    width: 50%; 
    height: 5em;

  }

}


</style>

<main id="main-container">

  <div class="bg-image bg-image-bottom" id="imgbanner">
    <div class="">
      <div class="content content-top text-center overflow-hidden">
        <div class="pt-40 pb-20">

          <h2 class="invisible"   style="color: white;" data-toggle="appear" data-class="animated fadeInUp">¡ Tu panel empresarial <br> <?php echo $Empresa;?> ! </h2>
        </div>
      </div>
    </div>
  </div>

  <div style="margin-right:2%; margin-left:2%;">


    <div class="row gutters-tiny invisible" data-toggle="appear" data-class="animated bounceInLeft" >

      <div class="col-6 col-md-4 col-xl-2">
        <a class=" text-center" href="actualizar-empresa">
          <div class="block-content ribbon ribbon-bookmark ribbon-crystal  cuadros">
            <p class="mt-5">
              <img src="../assets/iconos/candidato/Area_de_Empresa.png">
            </p>
            <p class="font-w600 text-white">Perfil <br> Empresa</p>
          </div>
        </a>
      </div>

      <div class="col-6 col-md-4 col-xl-2">
        <a class=" text-center" href="candidatos">
          <div class="block-content ribbon ribbon-bookmark ribbon-crystal  cuadros">
            <p class="mt-5">
              <img src="../assets/iconos/empresa/Busqueda_de_Candidatos.png">
            </p>
            <p class="font-w600 text-white">Buscar <br> Candidatos</p>
          </div>
        </a>
      </div>


      <div class="col-6 col-md-4 col-xl-2">
        <a class=" text-center" href="ofertas-empleos">
          <div class="block-content ribbon ribbon-bookmark ribbon-crystal  cuadros">
            <p class="mt-5">
              <img src="../assets/iconos/empresa/oferta-empleo.png">
            </p>
            <p class="font-w600 text-white">Publicar <br> Oferta de empleos</p>
          </div>
        </a>
      </div>


      <div class="col-6 col-md-4 col-xl-2">
        <a class=" text-center" href="seguimientos">
          <div class="block-content ribbon ribbon-bookmark ribbon-crystal  cuadros">
            <p class="mt-5">
              <img src="../assets/iconos/empresa/seguimiento.png">
            </p>
            <p class="font-w600 text-white">seguimientos <br>Candidatos</p>
          </div>
        </a>
      </div>


      <div class="col-6 col-md-4 col-xl-2">
        <a class=" text-center" href="chats-candidatos">
          <div class="block-content ribbon ribbon-bookmark ribbon-crystal  cuadros">
            <p class="mt-5">
              <img src="../assets/iconos/empresa/Chat_Empresa.png">
            </p>
            <p class="font-w600 text-white">Chats <br> Candidatos</p>
          </div>
        </a>
      </div>


      <div class="col-6 col-md-4 col-xl-2">
        <a class=" text-center" href="reportes">
          <div class="block-content ribbon ribbon-bookmark ribbon-crystal  cuadros">
            <p class="mt-5">
              <img src="../assets/iconos/empresa/Reportes.png">
            </p>
            <p class="font-w600 text-white">Reportes <br><br></p>
          </div>
        </a>
      </div>


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

                      <a href="actualizar-cuenta" class="btn btn-hero btn-rounded btn-noborder btn-alt-primary mr-5 mb-5"><i class="fa fa-user"></i> Cuenta Usuario</a>



                    </div>

                  </div>
                  <div class="col-lg-6 col-md-6 col-12">
                    <br>
                    <a href="javascript:void(0)" class="btn btn-hero btn-rounded btn-noborder btn-alt-primary mr-5 mb-5" data-toggle="modal" data-target="#modal-terms2"><i class="fa fa-cloud-upload"></i> Logo Empresa</a>
                    <br>
                  </div>
                </div>
              </div>

              <br>

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
                 <p>Nota:El logo debe contener las dimensiones de 100 x 100</p>
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


  <?php include_once 'templates/footer.php';
  include_once 'templates/script.php';
  include_once '../../templates/alertas.php';
  include_once 'templates/Instrucciones.php'
  ?>

   <?php  if(isset($_GET['seguridad'])){ echo "<script>swal({title:'Advertenicia',text:' Verifica tu correo electrónico para confirmar el cambio de contraseña. Para poder volver iniciar sesión de nuevo',type:'warning'  });</script>"; } ?>