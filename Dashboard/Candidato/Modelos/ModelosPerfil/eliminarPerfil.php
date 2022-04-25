<?php 

include_once '../../../../BD/Conexion.php';
include_once '../../../../BD/Consultas.php';
include_once '../../../../main/funcionesApp.php';
$FuncionesApp = new funcionesApp();
$Conexion = new Consultas();

$IDUser = $FuncionesApp->test_input($_POST['IduserEliminar']);	
$imgNombre = $FuncionesApp->test_input($_POST['imgperfilEliminar']);

if($imgNombre != "avatar15.jpg")
{
	$destino = "../../../../assets/img/user/".$imgNombre;
	unlink($destino);
}

$sql="SELECT * FROM `usuarios_documentos` WHERE `IDUsuario` = ?";

$resultdocumento = $Conexion->ejecutar_consulta_conteo("usuarios_documentos","IDUsuario",$IDUser);

if($resultdocumento >=1){

	$sql ="SELECT * FROM `usuarios_documentos`  WHERE `IDUsuario` = ?";
	$stmt = $Conexion->ejecutar_consulta_simple_Where($sql , $IDUser);

	while ($item=$stmt->fetch())
	{
		$destino2 = "../../../../documentos/documentos_usuarios/".$IDUser."/".$item['Documento'];
		unlink($destino2);
	}


}

$stmt2 =  Consultas::ejecutar_consulta_eliminar("usuarios_cuentas" , "IDUsuario" , $IDUser);

session_start();
session_destroy();





?>