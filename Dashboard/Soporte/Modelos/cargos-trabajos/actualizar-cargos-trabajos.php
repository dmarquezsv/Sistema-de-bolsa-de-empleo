<?php 

include '../../../../BD/Conexion.php';
include_once '../../../../BD/Consultas.php';
$Conexion = new Consultas();
include_once '../../../../main/funcionesApp.php';
$FuncionesApp = new funcionesApp();

$Nombre = $FuncionesApp->test_input($_POST['Nombres']);
$id = $FuncionesApp->test_input($_POST['id']);

$sql="UPDATE `soporte_cargos_desempenado` SET `nombre` = :nombre  WHERE `IDDesempenado` = :IDDesempenado";
$stmt =  Conexion::conectar()->prepare($sql);

$stmt->bindParam('nombre', $Nombre , PDO::PARAM_STR);
$stmt->bindParam('IDDesempenado', $id , PDO::PARAM_STR);

$stmt->execute();


?>