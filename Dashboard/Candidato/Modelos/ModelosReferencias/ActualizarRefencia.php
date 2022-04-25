<?php

include_once '../../../../BD/Conexion.php';
include_once '../../../../BD/Consultas.php';
include_once '../../../../main/funcionesApp.php';

$FuncionesApp = new funcionesApp();
session_start(); 

if (isset($_POST['Guardar'])) {

	$id = base64_decode($_POST['IDReferencia']);
    $IDReferencia = $FuncionesApp->test_input($id);
	$Encargado = $FuncionesApp->test_input($_POST['nombre']);	
	$Empresa = $FuncionesApp->test_input($_POST['empresa']);	
	$Cargo = $FuncionesApp->test_input($_POST['cargo']);
	$Email = $FuncionesApp->test_input($_POST['email']);
	$Telefono = $FuncionesApp->test_input($_POST['telefono']);

	$sql = "UPDATE `usuario_referencia` SET `Encargado` = :Encargado, `Empresa` = :Empresa, `Cargo` = :Cargo, `Correo` = :Correo, `Telefono` = :Telefono WHERE IDReferencia = :IDReferencia";
	$stmt =  Conexion::conectar()->prepare($sql);

	$stmt->bindParam(':Encargado', $Encargado , PDO::PARAM_STR);
	$stmt->bindParam(':Empresa', $Empresa , PDO::PARAM_STR);
	$stmt->bindParam(':Cargo', $Cargo , PDO::PARAM_STR);
	$stmt->bindParam(':Correo', $Email , PDO::PARAM_STR);
	$stmt->bindParam(':Telefono', $Telefono , PDO::PARAM_STR);
	$stmt->bindParam(':IDReferencia', $IDReferencia , PDO::PARAM_STR);
	
	if ($stmt->execute()){
		$_SESSION['alertas'] = "Mensaje";
		$_SESSION['ms'] = "Se ha Actualizado una referencia";
		header('Location: ../../referencia');
	}else{
		
		$_SESSION['alertas'] = "Fallo";
		header('Location: ../../referencia');
	}



}else{

	$_SESSION['alertas'] = "PerdidaDatos";
	header('Location: ../../referencia');
}



?>