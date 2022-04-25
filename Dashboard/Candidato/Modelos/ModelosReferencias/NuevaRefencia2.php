<?php

include_once '../../../../BD/Conexion.php';
include_once '../../../../BD/Consultas.php';
include_once '../../../../main/funcionesApp.php';

$FuncionesApp = new funcionesApp();
session_start(); 

if (isset($_POST['Guardar'])) {

	$IDusuario = $FuncionesApp->test_input($_POST['Iduser']);	
	$Encargado = $FuncionesApp->test_input($_POST['nombre']);	
	$Empresa = $FuncionesApp->test_input($_POST['empresa']);	
	$Cargo = $FuncionesApp->test_input($_POST['cargo']);
	$Email = $FuncionesApp->test_input($_POST['email']);
	$Telefono = $FuncionesApp->test_input($_POST['telefono']);

	$sql = "INSERT INTO `usuario_referencia` (`IDUsuario`, `Encargado`, `Empresa`, `Cargo`, `Correo`, `Telefono`) VALUES (:IDUsuario,:Encargado,:Empresa,:Cargo,:Correo,:Telefono)";
	$stmt =  Conexion::conectar()->prepare($sql);
	$stmt->bindParam(':IDUsuario', $IDusuario , PDO::PARAM_STR);
	$stmt->bindParam(':Encargado', $Encargado , PDO::PARAM_STR);
	$stmt->bindParam(':Empresa', $Empresa , PDO::PARAM_STR);
	$stmt->bindParam(':Cargo', $Cargo , PDO::PARAM_STR);
	$stmt->bindParam(':Correo', $Email , PDO::PARAM_STR);
	$stmt->bindParam(':Telefono', $Telefono , PDO::PARAM_STR);

	if ($stmt->execute()){
		$_SESSION['alertas'] = "Mensaje";
		$_SESSION['ms'] = "Se ha agregado una referencia de trabajo";
		header('Location: ../../referencia-trabajo');
	}else{
		
		$_SESSION['alertas'] = "Fallo";
		header('Location: ../../referencia-trabajo');
	}



}else{

	$_SESSION['alertas'] = "PerdidaDatos";
	header('Location: ../../referencia-trabajo');
}

?>