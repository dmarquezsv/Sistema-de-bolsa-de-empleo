<?php 

include_once '../../BD/Conexion.php';
include_once '../../main/funcionesApp.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';

$sql="SELECT `IDUsuario` , `Nombre` , `Correo` FROM `usuarios_cuentas` WHERE  `Cargo` = 'Candidato'";
$stmt = Conexion::conectar()->prepare($sql);
$stmt->execute();
while ($item=$stmt->fetch()){

	$IDusuario= $item['IDUsuario'];
	$NombreUser = $item['Nombre'];
	$Correo = $item['Correo'];

	$sql2="SELECT COUNT(`IDAreas`)AS 'ExisteAlerta' FROM `usuario_areas` WHERE `IDUsuario` = ?";
	$stmt2 =  Conexion::conectar()->prepare($sql2);
	$stmt2->execute(array($IDusuario));
	$item2=$stmt2->fetch();	
	$existeAlerta = $item2['ExisteAlerta'];

	if($existeAlerta >=1){

		$sql3="SELECT `IDDesempenado` FROM `usuario_areas` WHERE `IDUsuario` = ?";
		$stmt3 =  Conexion::conectar()->prepare($sql3);
		$stmt3->execute(array($IDusuario));

		$sql3="SELECT `IDDesempenado` FROM `usuario_areas` WHERE `IDUsuario` = ?";
		$stmt3 =  Conexion::conectar()->prepare($sql3);
		$stmt3->execute(array($IDusuario));

		$ofertas = "";

		while($item3=$stmt3->fetch()){

			$fechaActual =date("Y-m-d");

			$sql4="SELECT `IDpostulaciones` , `Plaza` ,`Expira` , P.Nombre AS 'Pais' FROM empresa_ofertas_trabajos  E INNER JOIN  soporte_paises P ON E.IDPais = P.IDPais WHERE `IDDesempenado` = ? AND `Estado` = 'Activo' AND FechaPublicacion <= ? AND Expira >= ?";
			$stmt4 =  Conexion::conectar()->prepare($sql4);
			$stmt4->execute(array($item3['IDDesempenado'],$fechaActual,$fechaActual));
			while ($item4=$stmt4->fetch()){

				$date = date_create($item4['Expira']);  $expira = date_format($date,"d/m/Y");

				$ofertas .=	'<tr>
				<td ><a href="https://www.mundoempleosca.com/oferta_trabajo?id='.base64_encode($item4['IDpostulaciones']).'">'.$item4['Plaza'].'</a></td>
				<td>'.$expira.'</td>
				<td>'.$item4['Pais'].'</td>
				</tr>';


			}}




			try {		
				$mail = new PHPMailer(true);
			    //Server settings
			    $mail->SMTPDebug = 0;                      // Enable verbose debug output
			    $mail->isSMTP();                                            // Send using SMTP
			    $mail->Host       = 'mail.mundoempleosca.com';                    // Set the SMTP server to send through
			    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
			    $mail->Username   = 'danielm@mundoempleosca.com';                     // SMTP username
			    $mail->Password   = 'pruebas001@';                               // SMTP password
			    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
			    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above


			    //Recipients
			    $mail->setFrom('danielm@mundoempleosca.com','Notificiones de Mundo Empleos CA');
			    $mail->addAddress($Correo);     // Add a recipient


			    // Content
			    $mail->isHTML(true);                                  // Set email format to HTML
			    $mail->Subject = 'OFERTAS DE EMPLEOS MUNDO EMPLEOS CA';
			    $mail->Body    = '<table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
			    <tr>
			    <td style="padding: 20px 0 30px 0;">
			    <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse; border: 1px solid #cccccc;">
			    <tr>
			    <td align="center"  style="padding: 40px 0 30px 0;">
			    <img src="https://www.mundoempleosca.com/recursosMundoEmpleo/logo.JPG" alt="Logo del Mundo Empleo" width="250" height="80" style="display: block;" /> <hr style="margin-left: 25px;margin-right: 25px;">
			    <br>
			    <h1 style="font-size: 24px; margin: 0; text-align: center;">OFERTAS DE TRABAJOS</h1>
			    </td>
			    </tr>
			    <tr>
			    <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">

			    <p style="margin: 0; text-align: justify;">Hola '.$NombreUser.':<br>Te invitamos a que ingreses a nuestro sitio y revises las nuevas oportunidades laborales así mismo asegúrate de tener tu CV completo y actualizado. <br><br> Aquí te presentamos un listado de ofertas de empleo según las preferencias que haz configurado con nosotros. </p> <br>

			    <table class="table" width="100%">
			    <thead>
			    <tr style="text-align: left;">
			    <th>Nombre de la Plaza</th>
			    <th>Expira</th>
			    <th>Lugar</th>
			    </tr>
			    </thead>
			    <tbody>
			    '.$ofertas.'

			    </tbody>
			    </table>
			    </td>
			    </tr>
			    </table>
			    </td>
			    </tr>
			    </table>';
			    $mail->CharSet = 'UTF-8'; // Con esto ya funcionan los acentos
			    $mail->send();
			    echo "Enviar LOS CORREOS MASIVOS";
			} catch (Exception $e) {
				echo "Hubo un error para enivar correo: {$mail->ErrorInfo}";
			}




			
		}else{
			echo "No hay correos masivos";
		}

	}


	?>