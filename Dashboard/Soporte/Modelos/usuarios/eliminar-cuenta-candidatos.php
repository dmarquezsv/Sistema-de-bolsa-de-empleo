<?php 

include '../../../../BD/Conexion.php';
include_once '../../../../BD/Consultas.php';
$Conexion = new Consultas();
include_once '../../../../main/funcionesApp.php';
$FuncionesApp = new funcionesApp();

$id = $FuncionesApp->test_input($_POST['id']);

$sql="SELECT * FROM `usuarios_documentos` WHERE `IDUsuario` = ?";
$stmt =  Conexion::conectar()->prepare($sql);
$stmt->execute(array($id));

while ($item=$stmt->fetch())
{
	$documento = $item['Documento'];
	$destino = "../../../../documentos/documentos_usuarios/".$id."/".$documento;
	unlink($destino);
}


$stmt =  Consultas::ejecutar_consulta_eliminar("usuarios_cuentas" , "IDUsuario" , $id);

?>