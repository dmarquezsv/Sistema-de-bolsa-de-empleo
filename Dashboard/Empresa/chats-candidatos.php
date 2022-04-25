<?php
include_once 'templates/head.php';
include_once '../../BD/Conexion.php';
include_once '../../BD/Consultas.php';
include_once '../../main/funcionesApp.php';
$Conexion = new Consultas();
$FuncionesApp = new funcionesApp();
include_once 'templates/seguridadCpanel.php';

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

  <div class="bg-image bg-image-bottom" id="imgbanner">
    <div class="">
      <div class="content content-top text-center overflow-hidden">
        <div class="pt-40 pb-20">

          <h2 class="h4 font-w400  invisible" id="titulos"  style="color: white;" data-toggle="appear" data-class="animated fadeInUp">Chats Candidatos</h2>
        </div>
      </div>
    </div>
  </div>



  <div style="margin-right:2%; margin-left:2%;">

    <div class="content">
      <!-- Projects -->
      <h2 class="content-heading">        
        <i class="si si-briefcase mr-5"></i> Chats empresas
      </h2>
      <p> <?php echo $PrimerNombre[0] ." ". $PrimerApellido[0]; ?>: En esta sección podras  ver los chats con los candidatos contactado.</p>
      <div class="row items-push">
        <?php 


        while ($item=$stmt->fetch())
        {

          $sql2 ="SELECT DISTINCT
          UP.IDUsuario,
          C.Foto,
          C.Nombre,
          C.Apellidos,
          C.Correo,
          UP.confidencial
          FROM
          usuario_perfil UP

          LEFT JOIN usuarios_cuentas C ON
          UP.IDUsuario = C.IDUsuario
          WHERE C.IDUsuario = ?";
          $stmt12 =  Conexion::conectar()->prepare($sql2);
          $stmt12->execute(array($item['idSolicitud']));
          $item2=$stmt12->fetch();

          $confidencial = $item2['confidencial'];

          $nombre="";

          if ($confidencial == "Privado"){
            $nombre ='<p style="color: #3eb318">N/D</p>';  
          }else{
            $nombre ='<p style="color: #3eb318">'.$item2['Nombre'].' '.$item2['Apellidos'] .'</p>';  
          }


          $Foto = '<img class="img-avatar img-avatar-thumb" style="width: 80px; height: 80px;" src="../../assets/img/user/'.$item2['Foto'].'" alt="userfoto">';


          echo '<div class="col-md-6 col-xl-3">
          <div class="block block-rounded ribbon ribbon-modern ribbon-primary text-center">
          <div class="ribbon-box">ID Solicitud '.$item['chats-empresas'].'</div>
          <div class="block-content block-content-full">
          <div class="item  text-danger-light mx-auto my-20">
          '.$Foto.'
          </div>
          </div>
          <div class="block-content block-content-full block-content-sm bg-body-light">
          <div class="font-w600 mb-5">'.$nombre.'</div>
          <div class="font-size-sm text-muted">'.$item['FechaHora'].'</div>
          </div> 
          <div class="block-content block-content-full">
          <a class="btn btn-rounded btn-alt-secondary" id="chatsclic" href="chat?chats='.base64_encode($IDUser).'&estado='.base64_encode('Notificar').'&usuario='.base64_encode($item['idSolicitud']).'&email='.$item2['Correo'].'">
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


<script type="text/javascript">
  

 $('#chatsclic').on('click', function() {

  
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

 });



</script>