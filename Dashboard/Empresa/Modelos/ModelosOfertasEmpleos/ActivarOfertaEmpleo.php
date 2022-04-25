<?php 


include_once '../../../../BD/Conexion.php';
include_once '../../../../BD/Consultas.php';
include_once '../../../../main/funcionesApp.php';

$FuncionesApp = new funcionesApp();
session_start(); 

$id = base64_decode($_GET['id']);
$IDOferta = $FuncionesApp->test_input($id);

$sql= "UPDATE `empresa_ofertas_trabajos` SET `Estado` = 'Activo' WHERE `IDpostulaciones` = :IDpostulaciones ";
$stmt =  Conexion::conectar()->prepare($sql);
$stmt->bindParam('IDpostulaciones', $IDOferta , PDO::PARAM_STR);

if ($stmt->execute()){

	$_SESSION['alertas'] = "Mensaje";
	$_SESSION['ms'] = "Se ha activado la oferta de empleo";
	header('Location: ../../ofertas-empleos');

}else{

	$_SESSION['alertas'] = "Fallo";
	header('Location: ../../ofertas-empleos');
}

?>