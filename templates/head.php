<?php 

session_start();
include_once 'BD/Conexion.php';
include_once 'BD/Consultas.php';
include_once 'main/funcionesApp.php';
$Conexion = new Consultas();
$FuncionesApp = new funcionesApp();
if(isset($_SESSION['iduser'])){
	
	$IDUser  = $_SESSION['iduser'];    

	$sqlLogin="SELECT `Cargo` FROM `usuarios_cuentas` WHERE `IDUsuario` = ? ";
	$stmtLogin =  Conexion::conectar()->prepare($sqlLogin);
	$stmtLogin->execute(array($IDUser));
	$cargoCuentaLanding="";
	while ($item=$stmtLogin->fetch())
	{
		$cargoCuentaLanding = $item['Cargo'];
	}


}else{

	$IDUser = "";
}


if(isset($_SESSION['nombre'])){
	$NombresUser  = $_SESSION['nombre'];     
}else{

	$NombresUser = "";
}

if(isset($_SESSION['apellido'])){
	$ApellidosUser  = $_SESSION['apellido'];     
}else{

	$ApellidosUser = "";
}


if(isset($_SESSION['email'])){
	$CorreoUser  = $_SESSION['email'];     
}else{

	$CorreoUser = "";
}

if(isset($_SESSION['iduser'])){
	$PrimerNombre = explode(" ", $NombresUser);
	$PrimerApellido = explode(" ", $ApellidosUser);
}

?>

<!DOCTYPE html>
<html lang="zxx">
<head>
	<!-- Meta Tag -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name='copyright' content='pavilan'>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">