<?php 

include '../../../../BD/Conexion.php';
include_once '../../../../BD/Consultas.php';
$Conexion = new Consultas();
include_once '../../../../main/funcionesApp.php';
$FuncionesApp = new funcionesApp();

$Nombre = $FuncionesApp->test_input($_POST['Nombres']);
$id = $FuncionesApp->test_input($_POST['id']);

$sql="UPDATE `carrera` SET `nombre` = :nombre  WHERE `Id_Carrera` = :Id_Carrera";
$stmt =  Conexion::conectar()->prepare($sql);

$stmt->bindParam('nombre', $Nombre , PDO::PARAM_STR);
$stmt->bindParam('Id_Carrera', $id , PDO::PARAM_STR);

$stmt->execute();




?>