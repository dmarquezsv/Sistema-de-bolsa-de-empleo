<?php 

include_once '../../../../BD/Conexion.php';
include_once '../../../../BD/Consultas.php';
include_once '../../../../main/funcionesApp.php';

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


 	use PHPMailer\PHPMailer\PHPMailer;
 	use PHPMailer\PHPMailer\Exception;

 	require 'phpmailer/Exception.php';
 	require 'phpmailer/PHPMailer.php';
 	require 'phpmailer/SMTP.php';

 	$mail = new PHPMailer(true);

	session_start();
	session_destroy();
	header('Location: ../../../login?seguridad=1');


}else{

			$_SESSION['alertas'] = "Fallo";
			header('Location: ../../referencia');
		}

		?>