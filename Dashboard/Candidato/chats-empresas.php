<?php
include_once 'templates/head.php';
include_once '../../BD/Conexion.php';
include_once '../../BD/Consultas.php';
include_once '../../main/funcionesApp.php';
$Conexion = new Consultas();
$FuncionesApp = new funcionesApp();
include_once 'templates/validar-perfil.php';

include_once 'templates/validar-perfil.php';
$sql = "SELECT * FROM `guardar-chats-candidato` WHERE `IDUsuario` = ? ";
$stmt =  Conexion::conectar()->prepare($sql);
$stmt->execute(array($IDUser));

?>
<title>Candidato | Chats</title>
<?php 
include_once 'templates/styles.php';
include_once 'templates/MenuRight.php';
include_once 'templates/MenuLeft.php';
include_once 'templates/header.php';
?>
<style type="text/css">
  #imgbanner{

    background: url('../assets/media/photos/Chat.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    height: auto;
  }
</style>

<main id="main-container">

  <div class="bg-image bg-image-bottom" id="imgbanner" >
    <div>
      <div class="content content-top text-center overflow-hidden">
        <div class="pt-40 pb-20">
          <h3 class="font-size-h2 font-w300 mt-20"  data-toggle="appear" data-class="animated flipInY" id="titulos" style="color: white;">Chats empresas </h3>
        </div>
      </div>
    </div>
  </div>



  <div style="margin-right:2%; margin-left:2%;">

    <div class="content">

      <a href="./" class="btn btn-rounded btn-noborder btn-alt-primary mr-5 mb-5"> <i class="si si-action-undo fa-2x5"> </i> Retroceder</a>

      <!-- Projects -->
      <h2 class="content-heading">        
        <i class="si si-briefcase mr-5"></i> Chats empresas
      </h2>
      <p> <?php echo $PrimerNombre[0] ." ". $PrimerApellido[0]; ?>: En esta sección podrás ver los chats que te contacte las empresas de forma descendente.</p>
      <div class="row items-push">
        <?php 

        while ($item=$stmt->fetch())
        {
          echo '<div class="col-md-6 col-xl-3">
          <div class="block block-rounded ribbon ribbon-modern ribbon-primary text-center">
            <div class="ribbon-box">ID Solicitud '.$item['chats-empresas'].'</div>
            <div class="block-content block-content-full">
              <div class="item item-circle bg-danger text-danger-light mx-auto my-20">
                <i class="fa fa-globe"></i>
              </div>
            </div>
            <div class="block-content block-content-full block-content-sm bg-body-light">
              <div class="font-w600 mb-5">'.$item['Estado'].'</div>
              <div class="font-size-sm text-muted">'.$item['FechaHora'].'</div>
            </div>
            <div class="block-content block-content-full">
              <a class="btn btn-rounded btn-alt-secondary" href="chat?chats='.base64_encode($item['idSolicitud']).'&solicitud='.base64_encode($item['chats-empresas']).'&estado='.base64_encode($item['EstadoSolicitud']).'">
                <i class="fa fa-briefcase mr-5"></i>ver chat
              </a>
            </div>
          </div>
        </div>
';

        }


        ?>
    


      </div>
      <!-- END Projects -->
    </div>

  </div>
</main>



<?php include_once 'templates/footer.php';
include_once 'templates/script.php';
include_once '../../templates/alertas.php';
?>

