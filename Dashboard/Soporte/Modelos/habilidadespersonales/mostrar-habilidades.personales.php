<?php  

include '../../../../BD/Conexion.php';
include_once '../../../../BD/Consultas.php';
$Conexion = new Consultas();
include_once '../../../../main/funcionesApp.php';
$FuncionesApp = new funcionesApp();

$sql="SELECT * FROM `soporte_areas_habilidades`";
$stmt =  Conexion::conectar()->prepare($sql);
$stmt->execute();
$data=$stmt->fetchAll(PDO::FETCH_ASSOC);
print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX

?>