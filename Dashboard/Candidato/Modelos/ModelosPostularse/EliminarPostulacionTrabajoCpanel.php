<?php 

include_once '../../../../BD/Conexion.php';
include_once '../../../../BD/Consultas.php';
include_once '../../../../main/funcionesApp.php';
$FuncionesApp = new funcionesApp();
session_start(); 

$id = base64_decode($_POST['IDEliminar']);
$IDOferta = $FuncionesApp->test_input($id);

$sql = "DELETE FROM `usuario_postulaciones` WHERE `IDpostulaciones` = :IDpostulaciones";

$stmt =  Conexion::conectar()->prepare($sql);
$stmt->bindParam('IDpostulaciones', $IDOferta , PDO::PARAM_STR);

if ($stmt->execute()){

	$_SESSION['alertas'] = "Mensaje";
	$_SESSION['ms'] = "Se ha Eliminado la postulación de trabajo";
	header('Location: ../../postulaciones');

}else{

	$_SESSION['alertas'] = "Fallo";
	header('Location: ../../postulaciones');

}


?>