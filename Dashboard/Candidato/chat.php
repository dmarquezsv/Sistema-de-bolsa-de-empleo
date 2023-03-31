<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';


include_once '../../BD/Conexion.php';
include_once '../../BD/Consultas.php';
include_once '../../main/funcionesApp.php';
include_once 'templates/head.php';
$Conexion = new Consultas();
$FuncionesApp = new funcionesApp();
include_once 'templates/validar-perfil.php';

$usuarioEmpresa = base64_decode($_GET['chats']);
$IDNotificacion = base64_decode($_GET['solicitud']);
$Estado = base64_decode($_GET['estado']);

if (isset($_GET['reclutador'])) {

  $sql7 = "SELECT `Correo` FROM `usuarios_cuentas` WHERE IDUsuario = ?";
  $stmt7 = Conexion::conectar()->prepare($sql7);
  $stmt7->execute(array($usuarioEmpresa));
  $emailReclutador = "";
  while ($item = $stmt7->fetch()) {
    $emailReclutador = $item['Correo'];
  }

  $sql8 = "INSERT INTO `notificaciones` (`IDUsuario`, `Tipo`, `idSolicitud`,`Descripcion`) VALUES (:IDUsuario, 'Mensaje-Visto', :idSolicitud, 'Un candidato ha revisado el mensaje enviado.')";
  $stmt8 = Conexion::conectar()->prepare($sql8);
  $stmt8->bindParam('IDUsuario', $usuarioEmpresa, PDO::PARAM_STR);
  $stmt8->bindParam('idSolicitud', $IDUser, PDO::PARAM_STR);
  $stmt8->execute();


  $mail = new PHPMailer(true);

  try {
    $mail->SMTPDebug = 0; // Enable verbose debug output
    $mail->isSMTP(); // Send using SMTP
    $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
    $mail->SMTPAuth = true; // Enable SMTP authentication
    $mail->Username = 'kayal.autosinnovadores@gmail.com'; // SMTP username
    $mail->Password = 'khefzcriahqnbfxz'; // SMTP password
    $mail->SMTPSecure = 'tls'; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port = 587; // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('daniel.marquez@webmakersv.com', 'Equipo de Mundo Empleo CA');
    $mail->addAddress($emailReclutador); // Add a recipient


    // Content
    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = 'Un Candidato ha visto un mensaje | Mundo Empleo CA';
    $mail->Body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
          <html xmlns="http://www.w3.org/1999/xhtml" lang="en-GB">
          <head>
          <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
          <title>Demystifying Email Design</title>
          <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

          <style type="text/css">
          a[x-apple-data-detectors] {color: inherit !important;}
          </style>

          </head>
          <body style="margin: 0; padding: 0;">
          <p style="display: none;">Revisa la plataforma.</p>
          <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
          <tr>
          <td style="padding: 20px 0 30px 0;">

          <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse; border: 1px solid #cccccc;">
          <tr>
          <td align="center"  style="padding: 40px 0 30px 0;">
          <img src="https://mundoempleosca.com/recursosMundoEmpleo/logo.JPG" alt="Logo del Mundo Empleo" width="250" height="80" style="display: block;" /> <hr style="margin-left: 25px;margin-right: 25px;">
          </td>
          </tr>
          <tr>
          <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
          <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
          <tr>
          <td style="color: #153643; font-family: Arial, sans-serif;">
          <h1 style="font-size: 24px; margin: 0; text-align: center;">Mensaje Visto</h1>
          </td>
          </tr>
          <tr>
          <td style="color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; padding: 20px 0 30px 0;">
          <p style="margin: 0; text-align: justify;">Hola te saluda el equipo de Mundo Empleo:  <br><br>Hemos recibido un pedido de un candidato que ha visto el mensaje enviado. Inicia sesión y dirigite a las notificaciones para revisar la respuesta del candidato.</p>

          <br>
          <p style="margin: 0; text-align: justify;"><b>Nota:</b>Debes iniciar sesión para ver las notificaciones.</p>
          <br>
          
          <center>
          <a href="https://mundoempleosca.com/login-empresa" target="_blank" rel="noopener noreferrer" data-auth="NotApplicable" style="display:inline-block; min-width:250px; font-family:Tahoma,Arial,sans-serif; font-size:18px; font-weight:bold; color:#0B3486; line-height:50px; text-align:center; text-decoration:none; background-color:#FCC201; border-radius:50px; padding:16px 24px; line-height:1">iniciar sesión </a>
          </center>

          <br><br>

          <p style="margin: 0; text-align: justify;">Este correo electrónico ha sido generado automaticamente, por favor no responda a este correo. <br><br> La información en este correo electrónico ha sido creada específicamente para ti y está vinculada a tu cuenta personal en  mundoempleosca.com</p>

          </td>
          </tr>

          </table>
          </td>
          </tr>
          <tr>
          <td bgcolor="#0B3486" style="padding: 30px 30px;">
          <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
          <tr>
          <td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;">
          <p style="margin: 0;">&reg; Mundo Empleo<br/>
          <p>
          Copyright © Todos los derechos reservados
          </p>
          </td>
          <td align="right">
          <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
          <tr>
          <td>
          <a href="#">
          <img src="https://mundoempleosca.com/recursosMundoEmpleo/facebook.png" alt="Facebook." width="38" height="38" style="display: block;" border="0" />
          </a>
          </td>
          <td style="font-size: 0; line-height: 0;" width="20">&nbsp;</td>
          <td>
          <a href="#">
          <img src="https://mundoempleosca.com/recursosMundoEmpleo/twitter.png" alt="twitter." width="38" height="38" style="display: block;" border="0" />
          </a>
          </td>
          <td style="font-size: 0; line-height: 0;" width="20">&nbsp;</td>
          <td>
          <a href="#">
          <img src="https://mundoempleosca.com/recursosMundoEmpleo/linkeding.png" alt="linkeding." width="38" height="38" style="display: block;" border="0" />
          </a>
          </td>
          <td style="font-size: 0; line-height: 0;" width="20">&nbsp;</td>
          <td>
          <a href="#">
          <img src="https://mundoempleosca.com/recursosMundoEmpleo/instagram.png" alt="linkeding." width="38" height="38" style="display: block;" border="0" />
          </a>
          </td>

          <td style="font-size: 0; line-height: 0;" width="20">&nbsp;</td>
          <td>
          <a href="#">
          <img src="https://mundoempleosca.com/recursosMundoEmpleo/youtube.png" alt="linkeding." width="38" height="38" style="display: block;" border="0" />
          </a>
          </td>
          </tr>
          </table>
          </td>
          </tr>
          </table>
          </td>
          </tr>
          </table>

          </td>
          </tr>
          </table>
          </body>
          </html>
          ';
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail->CharSet = 'UTF-8'; // Con esto ya funcionan los acentos

    $mail->send();
  } catch (Exception $e) {
    echo "Hubo un error para enivar correo: {$mail->ErrorInfo}";
  }



}

if ($Estado == "Enviado") {

  $sql4 = "DELETE FROM `notificaciones` WHERE IDNotificacion = :IDNotificacion";
  $stmt4 = Conexion::conectar()->prepare($sql4);
  $stmt4->bindParam(':IDNotificacion', $IDNotificacion, PDO::PARAM_STR);
  $stmt4->execute();

  $sql6 = "SELECT COUNT(`chats-empresas`) 'existeChats' FROM `guardar-chats-candidato` WHERE `IDUsuario` = ? AND `idSolicitud` = ?";
  $stmt6 = Conexion::conectar()->prepare($sql6);
  $stmt6->execute(array($IDUser, $usuarioEmpresa));


  while ($item = $stmt6->fetch()) {
    $existeChats = $item['existeChats'];
  }

  if ($existeChats == 0) {

    $sql5 = "INSERT INTO `guardar-chats-candidato` (`IDUsuario`, `idSolicitud`) VALUES (:IDUsuario , :idSolicitud)";
    $stmt5 = Conexion::conectar()->prepare($sql5);
    $stmt5->bindParam('IDUsuario', $IDUser, PDO::PARAM_STR);
    $stmt5->bindParam('idSolicitud', $usuarioEmpresa, PDO::PARAM_STR);
    $stmt5->execute();
  }



}

$sql = "SELECT `IDEmpresa`  , Nombre FROM `empresa_perfil` WHERE `IDUsuario` = ?";
$stmt = $Conexion->ejecutar_consulta_simple_Where($sql, $usuarioEmpresa);
while ($item = $stmt->fetch()) {
  $resultEmpresa = $item['IDEmpresa'];
  $nombreEmpresa = $item['Nombre'];
}

?>
<title>Candidato | chat</title>
<?php
include_once 'templates/styles.php';
include_once 'templates/MenuRight.php';
include_once 'templates/MenuLeft.php';
include_once 'templates/header.php';
?>

<style type="text/css">
  #imgbanner {

    background: url('../assets/media/photos/Chat.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    height: auto;
  }
</style>
<main id="main-container">

  <?php if (isset($_GET['solicitud'])) { ?>
    <!-- Onboarding Modal functionality is initialized in js/pages/be_pages_dashboard.min.js which was auto compiled from _es6/pages/be_pages_dashboard.js -->
    <div class="modal fade" id="modal-onboarding" tabindex="-1" role="dialog" aria-labelledby="modal-onboarding"
      aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-popout" role="document">
        <div class="modal-content rounded">
          <div class="block block-rounded block-transparent mb-0 bg-pattern"
            style="background-image: url('assets/media/various/bg-pattern-inverse.png');">
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
                    <img src="../../assets/recusosMundoEmpleo/logo.png" class="img-fluid"
                      style="height: 100px; width: 250px;" data-toggle="appear" data-class="animated flipInY">
                    <h3 class="font-size-h2 font-w300 mt-20" data-toggle="appear" data-class="animated flipInY"
                      id="titulos" style="color: #0B3486;">Bienvenido al chat <br>mundo empleo! </h3>
                    <p class="text-muted" style="text-align: justify;" data-toggle="appear"
                      data-class="animated fadeInUp">
                      <?php echo $PrimerNombre[0] . " " . $PrimerApellido[0]; ?>: Cualquier tipo de información que esté
                      relacionada con tus datos personales no será compartida ni publicada en esta plataforma. Recuerda
                      respestar a los reclutadores.
                      <br><br>
                      <b style="color: #0B3486; text-align: center;">Nota: Una vez fuera del chat ya no podra enviar
                        mensaje solo ver los mensaje hasta que reclutador te contacte de nuevo podras hacerlo.</b>
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
  <?php } ?>


  <div class="js-chat-head block-content block-content-full block-sticky-options  text-center" id="imgbanner">

    <br>
    <img class="img-avatar img-avatar-thumb" src="../../assets/img/user/<?php echo $FotoUser; ?>" class="img-fluid">
    <div class="font-w600 mt-15 mb-5 text-white">
      <span class="text-white">Empresa <br> <b>
          <?php echo $nombreEmpresa ?>
        </b></span>

    </div>
  </div>
  <!-- END Chat Header -->




  <div class="block block-rounded block-themed">
    <div class="row">
      <div class="col-12 col-md-12 col-xl-7">
        <!-- Messages (demonstration messages are added with JS code at the bottom of this page) -->
        <div class="js-chat-talk block-content block-content-full text-wrap-break-word overflow-y-auto" data-chat-id="4"
          style="height: 450px;">
          <div id="chats"></div>
        </div>
      </div>

      <div class="col-12 col-md-12 col-xl-5">



        <div class="js-chat-form block-content block-content-full block-content-sm bg-body-light">
          <?php if ($Estado == "Recibido") { ?>
            <br>
            <button type="submit" class="btn btn-alt-primary btn-lg btn-block btn-rounded" disabled>
              <i class="fa fa-save mr-5"></i> Enviar mensaje
            </button>
            <br>
          <?php } else { ?>
            <br>
            <button type="submit" class="btn btn-alt-primary btn-lg btn-block btn-rounded" id="Enviar">
              <i class="fa fa-save mr-5"></i> Enviar mensaje
            </button>
            <br>
          <?php } ?>
          <textarea class="form-control" id="js-ckeditor" class="mensaje" placeholder="Main Description" rows="12"
            required></textarea>
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


  //Buscamos el chat del usuario y lo mostramos automaticamente al entrar al chats
  $(document).ready(function () {
    $.ajax({
      url: 'Modelos/chats/chatslive.php',
      type: 'POST',
      dataType: 'html',
      data: { Receptor: "<?php echo $usuarioEmpresa; ?>", Usuario: "<?php echo $IDUser ?>", empresa: "<?php echo $resultEmpresa; ?>" },
      beforeSend: function () {
        $('#chats').html('<p class="text-center"><img src="../../assets/img/icono/loader.gif" width="100px" height="100" class="img-fluid" ></p>');

      }
    })
      .done(function (respuesta) {
        $("#chats").html(respuesta);
        $("div, #chats").animate({ scrollTop: $(document).height() }); // Scrollea hasta abajo de la página
      })
      .fail(function () {
        console.log("error");
      });


  });

  //Funcion para buscar los nuevos mensajes
  function cargar_Chats() {

    $.ajax({
      url: 'Modelos/chats/chatslive.php',
      type: 'POST',
      dataType: 'html',
      data: { Receptor: "<?php echo $usuarioEmpresa; ?>", Usuario: "<?php echo $IDUser ?>", empresa: "<?php echo $resultEmpresa; ?>" },
    })
      .done(function (respuesta) {
        $("#chats").html(respuesta);
      })
      .fail(function () {
        console.log("error");
      });


  }





  var ConteoChatsGeneral;// Variable Global para comparar si hay mensaje nuevos
  $(buscar_Chats()); // Ejecutamos la funcion para guardar cantidad de mensajes en la var ConteoChatsGeneral
  function buscar_Chats() {

    $.ajax({
      url: 'Modelos/chats/chatslive-scroll.php',
      type: 'POST',
      dataType: 'html',
      data: { Receptor: "<?php echo $usuarioEmpresa; ?>", Usuario: "<?php echo $IDUser ?>", empresa: "<?php echo $resultEmpresa; ?>" },
    })
      .done(function (respuesta) {

        ConteoChatsGeneral = respuesta;

      })
      .fail(function () {
        console.log("error");
      });

  }


  //Busca los mensaje en vivo
  setInterval(function () {

    $.ajax({
      url: 'Modelos/chats/chatslive-scroll.php',
      type: 'POST',
      dataType: 'html',
      data: { Receptor: "<?php echo $usuarioEmpresa; ?>", Usuario: "<?php echo $IDUser ?>", empresa: "<?php echo $resultEmpresa; ?>" },
    })
      .done(function (respuesta) {

        var conteochats = respuesta;

        if (conteochats != ConteoChatsGeneral) {
          $(buscar_Chats());
          $(cargar_Chats());
          $("div, #chats").animate({ scrollTop: $(document).height() }); // Scrollea hasta abajo de la página
        }

      })
      .fail(function () {
        console.log("error");
      });



  }, 1000);




  /*
  $('textarea').keypress(function(e){ 
      if (e.keyCode == 13 && !e.shiftKey) 
      {   
       e.preventDefault(); 
       //now call the code to submit your form 
       alert("just enter was pressed"); 
       return; 
      } 
  
      if (e.keyCode == 13 && e.shiftKey) 
      {  
       //this is the shift+enter right now it does go to a new line 
       alert("shift+enter was pressed");   
      }  
  }); 
  */

  $('#Enviar').on('click', function () {

    var mensaje = CKEDITOR.instances['js-ckeditor'].getData();



    if (mensaje == "") {
      swal({ title: 'advertencia', text: 'Por favor, ingrese un comentario', type: 'warning', timer: 2000 });
    } else {

      $.ajax({
        url: 'Modelos/chats/EnviarChats.php',
        type: 'POST',
        dataType: 'html',
        data: { empresa: "<?php echo $resultEmpresa ?>", usuario: "<?php echo $IDUser; ?>", message: mensaje, Receptor: "<?php echo $usuarioEmpresa; ?>" },



      })
        .done(function (response) {
          $("div, #chats").animate({ scrollTop: $(document).height() }); // Scrollea hasta abajo de la página

        })
        .fail(function (request, errorType, errorMessage) {
          //timeout, error, abort, parseerror
          console.log(errorType);
          alert(errorMessage);
        })
        .always(function () {


          CKEDITOR.instances['js-ckeditor'].setData('');

        })

    }



  });



</script>