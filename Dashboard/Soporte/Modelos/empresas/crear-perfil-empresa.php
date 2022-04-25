<?php  

include_once '../../../../BD/Conexion.php';
include_once '../../../../BD/Consultas.php';
include_once '../../../../main/funcionesApp.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../phpmailer/Exception.php';
require '../../phpmailer/PHPMailer.php';
require '../../phpmailer/SMTP.php';

$FuncionesApp = new funcionesApp();

if (isset($_POST['usuario'])) {
	

     $IDUser = $FuncionesApp->test_input(base64_decode($_POST['usuario']));
     $AreaEmpresa = $FuncionesApp->test_input($_POST['areaEmpresa']);
     $Pais = $FuncionesApp->test_input($_POST['Pais']);
     $departamento = $FuncionesApp->test_input($_POST['Departamento']);
     $nombreEmpresa = $FuncionesApp->test_input($_POST['NombreEmpresa']);
     $ubicacionEmpresa = $FuncionesApp->test_input($_POST['ubicacionEmpresa']);
     
     $descripcionEmpresa =  $FuncionesApp->test_input2($_POST['descripcion']);
     $email =  $FuncionesApp->test_input($_POST['Email']);
     $emailUser = $_POST['email'];
     
     $telefono  = $FuncionesApp->test_input2($_POST['telefono']);
     $celular = $FuncionesApp->test_input2($_POST['celular']);
     $facebook = $FuncionesApp->test_input2($_POST['facebook']);
     $instagram = $FuncionesApp->test_input2($_POST['instagram']);
     $whatsapp = $FuncionesApp->test_input2($_POST['whatsapp']);
     $yotube = $FuncionesApp->test_input2($_POST['youtube']);
     $paginaweb = $FuncionesApp->test_input2($_POST['paginaweb']);
     $confidencial = $FuncionesApp->test_input2($_POST['confidencial']);
     $razonSocial = $FuncionesApp->test_input2($_POST['razonsocial']);

     $nombre = $FuncionesApp->test_input($_POST['nombre']);
     $apellido = $FuncionesApp->test_input($_POST['apellido']);

     $fechaActual =date("d-m-Y");
     
     $sql = "INSERT INTO `empresa_perfil` (`IDUsuario`, `IDTipoEmpresa`, `IDPais`, `IDDepartamento`, `Nombre`, `lugar`, `Descripcion`, `Email`, `Telefono`, `Celular`, `facebook`, `instagram`, `whatsapp`, `youtube`,  `paginaweb`, `Confidencial`,fecha_registro,Expira,razonSocial) VALUES(:IDUsuario,:IDTipoEmpresa,:IDPais,:IDDepartamento,:Nombre,:lugar,:Descripcion,:Email,:Telefono,:Celular,:facebook,:instagram,:whatsapp,:youtube,:paginaweb,:Confidencial,:fecha_registro,DATE_ADD(NOW(),INTERVAL 10 DAY),:razonSocial)";

     $stmt =  Conexion::conectar()->prepare($sql);
     $stmt->bindParam('IDUsuario', $IDUser , PDO::PARAM_STR);
     $stmt->bindParam('IDTipoEmpresa', $AreaEmpresa , PDO::PARAM_STR);
     $stmt->bindParam('IDPais', $Pais , PDO::PARAM_STR);
     $stmt->bindParam('IDDepartamento', $departamento , PDO::PARAM_STR);
     $stmt->bindParam('Nombre', $nombreEmpresa , PDO::PARAM_STR);
     $stmt->bindParam('lugar', $ubicacionEmpresa , PDO::PARAM_STR);
     $stmt->bindParam('Descripcion', $descripcionEmpresa , PDO::PARAM_STR);
     $stmt->bindParam('Email', $email , PDO::PARAM_STR);
     $stmt->bindParam('Telefono', $telefono , PDO::PARAM_STR);
     $stmt->bindParam('Celular', $celular , PDO::PARAM_STR);
     $stmt->bindParam('facebook', $facebook , PDO::PARAM_STR);
     $stmt->bindParam('instagram', $instagram , PDO::PARAM_STR);
     $stmt->bindParam('whatsapp', $whatsapp , PDO::PARAM_STR);
     $stmt->bindParam('youtube', $yotube , PDO::PARAM_STR);
     $stmt->bindParam('paginaweb', $paginaweb , PDO::PARAM_STR);
     $stmt->bindParam('fecha_registro', $fechaActual , PDO::PARAM_STR);
     $stmt->bindParam('Confidencial', $confidencial , PDO::PARAM_STR);
     $stmt->bindParam('razonSocial', $razonSocial , PDO::PARAM_STR);

     if ($stmt->execute()){

          $sql2="INSERT INTO `paises_habilitado_empresa` (`IDPaisesHabilitado`, `IDPais`, `IDUsuario`) VALUES (NULL, :IDPais , :IDUsuario ) ";
          $stmt2 =  Conexion::conectar()->prepare($sql2);
          $stmt2->bindParam('IDUsuario', $IDUser , PDO::PARAM_STR);
          $stmt2->bindParam('IDPais', $Pais , PDO::PARAM_STR);
          $stmt2->execute();  

          $mail = new PHPMailer(true);

          try {
          //Server settings
           $mail->SMTPDebug = 0;                      // Enable verbose debug output
                   $mail->isSMTP();                                            // Send using SMTP
                   $mail->Host       = 'mail.mundoempleosca.com ';                    // Set the SMTP server to send through
                   $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                   $mail->Username   = 'danielm@mundoempleosca.com';                     // SMTP username
                   $mail->Password   = 'pruebas001@';                               // SMTP password
                   $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                   $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above


                   //Recipients
                   $mail->setFrom('danielm@mundoempleosca.com', 'soporte de mundo empleo');
                $mail->addAddress($emailUser);     // Add a recipient
                


          // Content
          $mail->isHTML(true);                                  // Set email format to HTML
          $mail->Subject = 'Se ha registrado la empresa | '.$nombreEmpresa.'';
          $mail->Body    = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
          <p style="display: none;">verifica el perfil.</p>
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
          <h1 style="font-size: 24px; margin: 0; text-align: center;">Notificación</h1>
          </td>
          </tr>
          <tr>
          <td style="color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; padding: 20px 0 30px 0;">
          <p style="margin: 0; text-align: justify;">Hola te saluda '.$nombre.' '.$apellido.' del equipo de Mundo Empleo:  <br><br>Hemos creado el perfil de empresa: '.$nombreEmpresa.' en la plataforma verifica el  perfil. <br></p>

          <br>
          <p style="margin: 0; text-align: justify;"><b>Nota:</b>Debes iniciar sesión para visualizar el perfil.</p>
          <br>
          
          <center>
          <a href="https://mundoempleosca.com/login-empresa" target="_blank" rel="noopener noreferrer" data-auth="NotApplicable" style="display:inline-block; min-width:250px; font-family:Tahoma,Arial,sans-serif; font-size:18px; font-weight:bold; color:#0B3486; line-height:50px; text-align:center; text-decoration:none; background-color:#FCC201; border-radius:50px; padding:16px 24px; line-height:1">iniciar sesión </a>
          </center>

          <br>

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




  echo "1";
}else{
   echo "0";
}



}

?>