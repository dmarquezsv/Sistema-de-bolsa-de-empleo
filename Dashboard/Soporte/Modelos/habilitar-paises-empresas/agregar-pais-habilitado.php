<?php 
	
include '../../../../BD/Conexion.php';
include_once '../../../../BD/Consultas.php';
$Conexion = new Consultas();
include_once '../../../../main/funcionesApp.php';
$FuncionesApp = new funcionesApp();

$paiselejido = $FuncionesApp->test_input($_POST['paiselejido']);
$id = $FuncionesApp->test_input($_POST['id']);


$sql="INSERT INTO `paises_habilitado_empresa` (IDPais , IDUsuario) VALUES (:IDPais , :IDUsuario)";
$stmt =  Conexion::conectar()->prepare($sql);

$stmt->bindParam('IDPais', $paiselejido , PDO::PARAM_STR);
$stmt->bindParam('IDUsuario', $id , PDO::PARAM_STR);
$stmt->execute();


 ?>