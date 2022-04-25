<?php

include_once '../../../../BD/Conexion.php';
include_once '../../../../BD/Consultas.php';
include_once '../../../../main/funcionesApp.php';

$FuncionesApp = new funcionesApp();
session_start(); 

if (isset($_POST['Guardar'])) {

	$IDUser = $FuncionesApp->test_input($_POST['Iduser']);
	$CentroEducativo = $FuncionesApp->test_input($_POST['CentoEducativo']);
	
	if (isset($_POST['carrera1'])) {
	  $Id_Carrera = $FuncionesApp->test_input($_POST['carrera1']);
	}
	else{

		$Id_Carrera = 92;
	}

	if (isset($_POST['Especialidad'])) {
		$Especialidad = $FuncionesApp->test_input($_POST['Especialidad']);
	}else{

		$Especialidad = "";
	}
	
	$NivelEstudio = $FuncionesApp->test_input($_POST['NivelEstudio']);
	$FechaInicio = $FuncionesApp->test_input($_POST['FechaInicio']);
	$FechaFinal =  $FuncionesApp->test_input($_POST['FechaFinal']);
	$IdPais =  $FuncionesApp->test_input($_POST['IDPais']);

	$sql = "INSERT INTO `usuario_educacion` (`IDUsuario`, `CentroEduacativo`, `Especialidad`, `Id_Carrera`, `NivelEstudio`, `FechaInicio`, `FechaFinal`, `IDPais`) 
	VALUES (:IDUsuario,:CentroEduacativo, :Especialidad,:Id_Carrera,:NivelEstudio,:FechaInicio,:FechaFinal, :IDPais)";
	$stmt =  Conexion::conectar()->prepare($sql);
	$stmt->bindParam('IDUsuario', $IDUser , PDO::PARAM_STR);
	$stmt->bindParam('CentroEduacativo',$CentroEducativo  , PDO::PARAM_STR);
	$stmt->bindParam('Especialidad',$Especialidad  , PDO::PARAM_STR);
	$stmt->bindParam('Id_Carrera',$Id_Carrera, PDO::PARAM_STR);
	$stmt->bindParam('NivelEstudio',$NivelEstudio , PDO::PARAM_STR);
	$stmt->bindParam('FechaInicio',$FechaInicio , PDO::PARAM_STR);
	$stmt->bindParam('FechaFinal',$FechaFinal , PDO::PARAM_STR);
	$stmt->bindParam('IDPais',$IdPais, PDO::PARAM_STR);

	if ($stmt->execute()){

		$_SESSION['alertas'] = "Mensaje";
		$_SESSION['ms'] = "Se ha agregado estudio académico";
		header('Location: ../../educacion-academico');

	}else{
		
		$_SESSION['alertas'] = "Fallo";
		header('Location: ../../educacion-academico');
	}

 

}else{

	$_SESSION['alertas'] = "PerdidaDatos";
	header('Location: ../../educacion-academico');

}


?>