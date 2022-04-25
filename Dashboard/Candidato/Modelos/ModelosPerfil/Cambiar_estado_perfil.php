<?php 


include_once '../../../../BD/Conexion.php';
include_once '../../../../BD/Consultas.php';
include_once '../../../../main/funcionesApp.php';
$FuncionesApp = new funcionesApp();

$IDusuario =  $FuncionesApp->test_input($_GET['id']);	

$sql="UPDATE `usuario_perfil` SET `Estado`='Activo'  WHERE `IDUsuario` = :IDUsuario";
$stmt =  Conexion::conectar()->prepare($sql);

$stmt->bindParam(':IDUsuario', $IDusuario , PDO::PARAM_STR);

if ($stmt->execute()){

	header('Location: ../../index?notificar=1');

}else{

	$_SESSION['alertas'] = "Fallo";
	header('Location: ../../documentos');
}


?>