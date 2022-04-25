<?php  
include_once '../../../../BD/Conexion.php';
include_once '../../../../BD/Consultas.php';
include_once '../../../../main/funcionesApp.php';

$FuncionesApp = new funcionesApp();

$iduser = base64_decode($_POST['iduserhistorial']);
$idcanditao  = $_POST['iduserhistorial'];
$idEmpresa = $_POST['idempresaHistorial'];

$sql="DELETE FROM `proceso_seleccion_candidato` WHERE `IDUsuario` = ? AND `IDEmpresa` = ? ";
$sql2="DELETE FROM `guardar_seguimiento_candidato` WHERE `IDUsuario` = ? AND `IDEmpresa` = ?";

$stmt =  Conexion::conectar()->prepare($sql);
$stmt2 =  Conexion::conectar()->prepare($sql2);

$stmt->execute(array($iduser,$idEmpresa));
$stmt2->execute(array($iduser,$idEmpresa));
	
header('Location: ../../seguimientos?success=1');


?>