<?php 

include_once '../../../../BD/Conexion.php';
include_once '../../../../BD/Consultas.php';
include_once '../../../../main/funcionesApp.php';

$FuncionesApp = new funcionesApp();
session_start(); 

if (isset($_POST['GuardarHabilida'])) {

	$IDusuario =  $FuncionesApp->test_input($_POST['Iduser2']);	
	$idHabilidad = $FuncionesApp->test_input($_POST['IDhabilidad']);	
	$NivelHabilidad = $FuncionesApp->test_input($_POST['NivelHabilidad']);	

	$sql = "INSERT INTO `usuarios_habilidades` (`IDHabilidades`, `IDUsuario`, `Nivel`) VALUES (:IDHabilidades,:IDUsuario,:Nivel)";
	$stmt =  Conexion::conectar()->prepare($sql);
	$stmt->bindParam(':IDHabilidades', $idHabilidad , PDO::PARAM_STR);
	$stmt->bindParam(':IDUsuario', $IDusuario , PDO::PARAM_STR);
	$stmt->bindParam(':Nivel', $NivelHabilidad , PDO::PARAM_STR);


	if ($stmt->execute()){

		$_SESSION['alertas'] = "Mensaje";
		$_SESSION['ms'] = "Se ha agregado una habilidad personal";
		header('Location: ../../habilidades');

	}else{
		
		$_SESSION['alertas'] = "Fallo";
		header('Location: ../../habilidades');
	}



}
else{
	$_SESSION['alertas'] = "PerdidaDatos";
	header('Location: ../../habilidades');
}

?>