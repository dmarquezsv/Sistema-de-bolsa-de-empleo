<?php  

include_once '../../../../BD/Conexion.php';
include_once '../../../../BD/Consultas.php';
include_once '../../../../main/funcionesApp.php';

$FuncionesApp = new funcionesApp();
session_start(); 

if (isset($_POST['Guardar'])) {

	$id = base64_decode($_POST['IDEducacion']);
	$IDEducacion = $FuncionesApp->test_input($id);

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

	if (!isset($_POST['carrera1']) && !isset($_POST['Especialidad'])) {
		
		$Id_Carrera= $FuncionesApp->test_input($_POST['ActualizarIDCarrera']);
		$Especialidad= $FuncionesApp->test_input($_POST['ActualizarEspecialidad']);
	}

	$NivelEstudio = $FuncionesApp->test_input2($_POST['NivelEstudio']);
	$FechaInicio = $FuncionesApp->test_input($_POST['FechaInicio']);
	$FechaFinal =  $FuncionesApp->test_input($_POST['FechaFinal']);
	$IdPais =  $FuncionesApp->test_input($_POST['IDPais']);

	$sql = "UPDATE `usuario_educacion` SET  `CentroEduacativo` = :CentroEduacativo, `Especialidad` = :Especialidad, `Id_Carrera` = :Id_Carrera, `NivelEstudio` = :NivelEstudio, `FechaInicio` = :FechaInicio, `FechaFinal` = :FechaFinal, `IDPais` = :IDPais WHERE `IDEducacion` = :IDEducacion ";

	$stmt =  Conexion::conectar()->prepare($sql);
	$stmt->bindParam('IDEducacion', $IDEducacion , PDO::PARAM_STR);
	$stmt->bindParam('CentroEduacativo',$CentroEducativo  , PDO::PARAM_STR);
	$stmt->bindParam('Especialidad',$Especialidad  , PDO::PARAM_STR);
	$stmt->bindParam('Id_Carrera',$Id_Carrera, PDO::PARAM_STR);//Carrera ->
	$stmt->bindParam('NivelEstudio',$NivelEstudio , PDO::PARAM_STR);
	$stmt->bindParam('FechaInicio',$FechaInicio , PDO::PARAM_STR);
	$stmt->bindParam('FechaFinal',$FechaFinal , PDO::PARAM_STR);
	$stmt->bindParam('IDPais',$IdPais, PDO::PARAM_STR);


	if ($stmt->execute()){

		$_SESSION['alertas'] = "Mensaje";
		$_SESSION['ms'] = "Se ha actualizado estudio académico";
		header('Location: ../../educacion');

	}else{
		
		$_SESSION['alertas'] = "Fallo";
		header('Location: ../../educacion');
	}



}else{

	$_SESSION['alertas'] = "PerdidaDatos";
	header('Location: ../../educacion');
}


?>