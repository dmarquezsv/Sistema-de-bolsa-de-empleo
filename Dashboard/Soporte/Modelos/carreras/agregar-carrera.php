<?php  


include '../../../../BD/Conexion.php';
include_once '../../../../BD/Consultas.php';
$Conexion = new Consultas();
include_once '../../../../main/funcionesApp.php';
$FuncionesApp = new funcionesApp();

$idFacultad = $FuncionesApp->test_input($_POST['idFacultadseleccionado']);
$Nombre = $FuncionesApp->test_input($_POST['Nombres']);


$sql="INSERT INTO `carrera` (`nombre` , ID_Facultades ) VALUES (:nombre,:ID_Facultades)";
$stmt =  Conexion::conectar()->prepare($sql);

$stmt->bindParam('nombre', $Nombre , PDO::PARAM_STR);
$stmt->bindParam('ID_Facultades', $idFacultad , PDO::PARAM_STR);
$stmt->execute();


?>