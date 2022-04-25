<?php 

include '../../../../BD/Conexion.php';
include_once '../../../../BD/Consultas.php';
$Conexion = new Consultas();
include_once '../../../../main/funcionesApp.php';
$FuncionesApp = new funcionesApp();

$Nombre = $FuncionesApp->test_input($_POST['Nombres']);


$sql="INSERT INTO `soporte_areas_habilidades` (`Nombre`) VALUES (:Nombre)";
$stmt =  Conexion::conectar()->prepare($sql);

$stmt->bindParam('Nombre', $Nombre , PDO::PARAM_STR);
$stmt->execute();



?>