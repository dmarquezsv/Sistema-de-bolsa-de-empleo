<?php  

include_once '../../../../BD/Conexion.php';
include_once '../../../../BD/Consultas.php';
include_once '../../../../main/funcionesApp.php';

$FuncionesApp = new funcionesApp();



	$IDusuario = $FuncionesApp->test_input($_POST['usuario']);
	$IDempresa = $FuncionesApp->test_input($_POST['empresa']);
	$Receptor = $FuncionesApp->test_input($_POST['Receptor']);
	$Mensaje =$_POST['message']; 

	$sql = "INSERT INTO `chats`(`IDUsuario`,`IDEmpresa`, Receptor ,`mensaje`) VALUES (:IDUsuario,:IDEmpresa,:recluatador,:mensaje )";
	$stmt =  Conexion::conectar()->prepare($sql);
	$stmt->bindParam(':IDUsuario', $IDusuario , PDO::PARAM_STR);
	$stmt->bindParam(':IDEmpresa', $IDempresa , PDO::PARAM_STR);
	$stmt->bindParam(':recluatador', $Receptor , PDO::PARAM_STR);
	$stmt->bindParam(':mensaje', $Mensaje , PDO::PARAM_STR);
	$stmt->execute();


	





?>