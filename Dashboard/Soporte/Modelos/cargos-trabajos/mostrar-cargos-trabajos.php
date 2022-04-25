<?php 


include '../../../../BD/Conexion.php';
include_once '../../../../BD/Consultas.php';
$Conexion = new Consultas();
include_once '../../../../main/funcionesApp.php';
$FuncionesApp = new funcionesApp();

$sql="SELECT IDDesempenado , A.Nombre AS 'Categoria' , CD.nombre FROM  soporte_cargos_desempenado CD INNER JOIN soporte_areas_trabajos A ON CD.IDCategoria = A.IDCategoria";
$stmt =  Conexion::conectar()->prepare($sql);
$stmt->execute();
$data=$stmt->fetchAll(PDO::FETCH_ASSOC);
print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX

?>