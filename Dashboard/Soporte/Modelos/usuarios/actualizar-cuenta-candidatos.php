<?php 

include '../../../../BD/Conexion.php';
include_once '../../../../BD/Consultas.php';
$Conexion = new Consultas();
include_once '../../../../main/funcionesApp.php';

$FuncionesApp = new funcionesApp();

$Nombres = $FuncionesApp->test_input($_POST['Nombres']);
$Apellidos = $FuncionesApp->test_input($_POST['Apellidos']);
$Email = $FuncionesApp->test_input($_POST['email']);

$evaluarEstado = $FuncionesApp->test_input($_POST['evaluarEstado']);

$estadoUser ="";
if ($evaluarEstado == "") {
	$estadoUser =$FuncionesApp->test_input($_POST['estadoUser']);
}else{

	$estadoUser = $FuncionesApp->test_input($_POST['evaluarEstado']);
}

$id = $FuncionesApp->test_input($_POST['id']);

$sql="UPDATE `usuarios_cuentas` SET `Nombre` = :Nombre, `Apellidos` = :Apellidos, `Correo` = :Correo , Estado=:Estado WHERE `IDUsuario` = :IDUsuario";
$stmt =  Conexion::conectar()->prepare($sql);

$stmt->bindParam('Nombre', $Nombres , PDO::PARAM_STR);
$stmt->bindParam('Apellidos', $Apellidos , PDO::PARAM_STR);
$stmt->bindParam('Correo', $Email , PDO::PARAM_STR);
$stmt->bindParam('Estado', $estadoUser , PDO::PARAM_STR);
$stmt->bindParam('IDUsuario', $id , PDO::PARAM_STR);
$stmt->execute();



?>