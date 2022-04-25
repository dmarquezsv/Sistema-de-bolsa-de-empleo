<?php

include_once '../../../../BD/Conexion.php';
include_once '../../../../BD/Consultas.php';
include_once '../../../../main/funcionesApp.php';

$FuncionesApp = new funcionesApp();
session_start(); 

if (isset($_POST['GuardarTecnica'])) {

	$IDusuario =  $FuncionesApp->test_input($_POST['Iduser3']);	
	$IDTecnica = $FuncionesApp->test_input($_POST['IDTecnica']);	
	$NivelTecnica = $FuncionesApp->test_input($_POST['NivelTecnica']);
	
	$sql = "INSERT INTO `usuarios_conocimentos` (`IDUsuario`, `IDTipo`, `Nivel`) VALUES (:IDUsuario,:IDTipo,:Nivel)";
	$stmt =  Conexion::conectar()->prepare($sql);
	$stmt->bindParam(':IDUsuario', $IDusuario , PDO::PARAM_STR);
	$stmt->bindParam(':IDTipo', $IDTecnica , PDO::PARAM_STR);
	$stmt->bindParam(':Nivel', $NivelTecnica , PDO::PARAM_STR);

	if ($stmt->execute()){

		$_SESSION['alertas'] = "Mensaje";
		$_SESSION['ms'] = "Se ha agregado la habilidad Técnica";
		header('Location: ../../habilidades');

	}else{
		
		$_SESSION['alertas'] = "Fallo";
		header('Location: ../../habilidades');
	}



}else{

	$_SESSION['alertas'] = "PerdidaDatos";
	header('Location: ../../habilidades');
}

?>