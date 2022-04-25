<?php 

include_once '../../../../BD/Conexion.php';
include_once '../../../../BD/Consultas.php';
include_once '../../../../main/funcionesApp.php';
$FuncionesApp = new funcionesApp();
session_start(); 

if (isset($_POST['Guardar'])) {

	$IDusuario =  $FuncionesApp->test_input($_POST['Iduser']);	
	$Idioma =  $FuncionesApp->test_input($_POST['Idioma']);	
	$Nivel = $FuncionesApp->test_input($_POST['NivelEstudio']);

	$sql = "INSERT INTO `usuarios_idiomas` (`IDUsuario`, `Idioma`, `Nivel`) VALUES (:IDUsuario,:Idioma,:Nivel)";

	$stmt =  Conexion::conectar()->prepare($sql);
	$stmt->bindParam(':IDUsuario', $IDusuario , PDO::PARAM_STR);
	$stmt->bindParam(':Idioma', $Idioma , PDO::PARAM_STR);
	$stmt->bindParam(':Nivel', $Nivel , PDO::PARAM_STR);


	if ($stmt->execute()){
		$_SESSION['alertas'] = "Mensaje";
		$_SESSION['ms'] = "Se ha agregado el idioma";
		header('Location: ../../habilidades-usuario');

	}else{
		$_SESSION['alertas'] = "Fallo";
		header('Location: ../../habilidades-usuario');
	}

}
else{

	$_SESSION['alertas'] = "PerdidaDatos";
	header('Location: ../../habilidades-usuario');

}


?>