<?php 

include '../../../../BD/Conexion.php';
include_once '../../../../BD/Consultas.php';
$Conexion = new Consultas();
include_once '../../../../main/funcionesApp.php';

$FuncionesApp = new funcionesApp();
session_start(); 
$iduser = $_GET['iduser'];
$idEmpresa = $_GET['idempresa'];

$id = $FuncionesApp->test_input(base64_decode($_GET['iduser']));

$sql="UPDATE `usuarios_cuentas` SET `Estado` = 'Activo'  WHERE `IDUsuario` = :IDUsuario";
$stmt =  Conexion::conectar()->prepare($sql);

$stmt->bindParam('IDUsuario', $id , PDO::PARAM_STR);


	if ($stmt->execute()){

		$_SESSION['alertas'] = "Mensaje";
		$_SESSION['ms'] = "Se ha activado el usuario";
		header('Location: ../../empresa?iduser='.$iduser.'&idempresa='.$idEmpresa.'');

	}else{
		
		$_SESSION['alertas'] = "Fallo";
		header('Location: ../../empresa?iduser='.$iduser.'&idempresa='.$idEmpresa.'');
	}

 ?>