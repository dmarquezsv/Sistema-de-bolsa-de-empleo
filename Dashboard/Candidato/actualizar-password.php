<?php 

include_once '../../BD/Conexion.php';
include_once '../../BD/Consultas.php';
include_once '../../main/funcionesApp.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';

$FuncionesApp = new funcionesApp();
session_start();


 $PasswordFormato = $FuncionesApp->test_input($_POST['password']);
 $Password = password_hash($PasswordFormato, PASSWORD_DEFAULT);//Incriptamos la contraseña del usuario generado automaticamente
 $IDUsuario = $FuncionesApp->test_input($_POST['iduser2']);

 $sql = "UPDATE `usuarios_cuentas` SET `Password` = :Password , `Estado` = 'Seguridad' WHERE `IDUsuario` = :IDUsuario";
 $stmt =  Conexion::conectar()->prepare($sql);

 $stmt->bindParam(':Password', $Password , PDO::PARAM_STR);
 $stmt->bindParam(':IDUsuario', $IDUsuario , PDO::PARAM_STR);


 if ($stmt->execute()){

 	

 	try {
			   $mail = new PHPMailer(true); //Server settings
			    $mail->SMTPDebug = 0;                      // Enable verbose debug output
			    $mail->isSMTP();                                            // Send using SMTP
			    $mail->Host       = 'mail.mundoempleosca.com';                    // Set the SMTP server to send through
			    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
			    $mail->Username   = 'danielm@mundoempleosca.com';                     // SMTP username
			    $mail->Password   = 'pruebas001@';                               // SMTP password
			    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
			    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

			    //Recipients
			    $mail->setFrom('danielm@mundoempleosca.com', 'Equipo de Mundo Empleo CA');
			    $mail->addAddress($_SESSION['email']);     // Add a recipient
			    

			    // Content
			    $mail->isHTML(true);                                  // Set email format to HTML
			    $mail->Subject = 'Acaba de cambiar la contraseña | Mundo Empleo CA';
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
			    <p style="display: none;">Acaba de cambiar la contraseña.</p>
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
			    <h1 style="font-size: 24px; margin: 0; text-align: center;">Acaba de cambiar la contraseña</h1>
			    </td>
			    </tr>
			    <tr>
			    <td style="color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; padding: 20px 0 30px 0;">
			    <p style="margin: 0; text-align: justify;">Hola '.$_SESSION['nombre'].' te saluda el equipo de Mundo Empleo:  <br><br> Hemos recibido un pedido de un cambio de contraseña. Si no has iniciado este pedido, no debe confirmar este correo por lo tanto debera ir a recuperación de cuenta <a href="https://mundoempleosca.com/restablecer-password?id='.base64_encode($IDUsuario).'&email='.base64_encode($_SESSION['email']).'">haz clic aqui</a> <br><br> luego te enviaremos una contraseña generado y una vez dentro en la plataforma podras cambiarlo.</p>

			    <br>
			    
			    
			    <center>
			    <a href="https://mundoempleosca.com/main/ModelosUsuarioCuentas/validarCambioPassword.php?id='.base64_encode($IDUsuario).'&email='.base64_encode($_SESSION['email']).'" target="_blank" rel="noopener noreferrer" data-auth="NotApplicable" style="display:inline-block; min-width:250px; font-family:Tahoma,Arial,sans-serif; font-size:18px; font-weight:bold; color:#0B3486; line-height:50px; text-align:center; text-decoration:none; background-color:#FCC201; border-radius:50px; padding:16px 24px; line-height:1">Confirmar</a>
			    </center>

			    <br><br>

			    <p style="margin: 0; text-align: justify;">Este correo electrónico ha sido generado automaticamente, por favor no responda a este correo. <br><br> La información en este correo electrónico ha sido creada específicamente para ti y está vinculada a tu cuenta personal en  mundoempleoca.com</p>

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

			header('Location: index?seguridad=1');


		}else{

			$_SESSION['alertas'] = "Fallo";
			header('Location: ../../actualizar-cuenta');
		}

		?>