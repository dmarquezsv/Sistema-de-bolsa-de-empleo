<?php 

include '../../../../BD/Conexion.php';
include_once '../../../../BD/Consultas.php';
$Conexion = new Consultas();
include_once '../../../../main/funcionesApp.php';
$FuncionesApp = new funcionesApp();

$idCategoria = $FuncionesApp->test_input($_POST['idFacultadseleccionado']);
$Nombre = $FuncionesApp->test_input($_POST['Nombres']);



$sql="INSERT INTO `soporte_cargos_desempenado` (`IDCategoria` , nombre) VALUES (:IDCategoria , :nombre)";
$stmt =  Conexion::conectar()->prepare($sql);

$stmt->bindParam('IDCategoria', $idCategoria , PDO::PARAM_STR);
$stmt->bindParam('nombre', $Nombre , PDO::PARAM_STR);
$stmt->execute();


?>