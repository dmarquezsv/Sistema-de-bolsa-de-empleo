<?php 


include '../../../../BD/Conexion.php';
include_once '../../../../BD/Consultas.php';
$Conexion = new Consultas();
include_once '../../../../main/funcionesApp.php';
$FuncionesApp = new funcionesApp();

$Nombre = $FuncionesApp->test_input($_POST['Nombres']);
$id = $FuncionesApp->test_input($_POST['id']);

$sql="UPDATE `soporte_areas_experiencia` SET `Nombre` = :Nombre  WHERE `IDTipo` = :IDTipo";
$stmt =  Conexion::conectar()->prepare($sql);

$stmt->bindParam('Nombre', $Nombre , PDO::PARAM_STR);
$stmt->bindParam('IDTipo', $id , PDO::PARAM_STR);

$stmt->execute();


?>