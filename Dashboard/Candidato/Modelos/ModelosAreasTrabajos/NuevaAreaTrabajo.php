<?php  


include_once '../../../../BD/Conexion.php';
include_once '../../../../BD/Consultas.php';
include_once '../../../../main/funcionesApp.php';

$FuncionesApp = new funcionesApp();

if (isset($_POST['Guardar'])) {

	$IDusuario = $FuncionesApp->test_input($_POST['Iduser']);
	$IDArea =$FuncionesApp->test_input($_POST['areas']);
	$cargo = $FuncionesApp->test_input($_POST['alertaCargo']);

	$sql = "INSERT INTO `usuario_areas` (`IDUsuario`, `IDCategoria` , IDDesempenado) VALUES (:IDUsuario,:IDCategoria,:IDDesempenado) ";
	$stmt =  Conexion::conectar()->prepare($sql);
	$stmt->bindParam(':IDUsuario', $IDusuario , PDO::PARAM_STR);
	$stmt->bindParam(':IDCategoria', $IDArea , PDO::PARAM_STR);
	$stmt->bindParam(':IDDesempenado', $cargo , PDO::PARAM_STR);

	if ($stmt->execute()){

		$_SESSION['alertas'] = "Mensaje";
		$_SESSION['ms'] = "Se ha agregado una notificación";
		header('Location: ../../alertas');

	}else{
		
		$_SESSION['alertas'] = "Fallo";
		header('Location: ../../alertas');
	}


}else{

	$_SESSION['alertas'] = "PerdidaDatos";
	header('Location: ../../alertas');
}


?>