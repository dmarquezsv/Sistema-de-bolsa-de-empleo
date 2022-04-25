<?php 


include '../../../../BD/Conexion.php';
include_once '../../../../BD/Consultas.php';
$Conexion = new Consultas();
include_once '../../../../main/funcionesApp.php';
$FuncionesApp = new funcionesApp();

if($_POST['buscar'] == "GenerarReporte"){

	$IDempresa = $FuncionesApp->test_input($_POST['empresa']);
	$TipoReporte = $FuncionesApp->test_input($_POST['Tiporeporte']);
	$fechaInicial = $FuncionesApp->test_input($_POST['FechaInicial']);
	$FechaFinal = $FuncionesApp->test_input($_POST['FechaFinal']);

	$sql = "SELECT * FROM `reportes_generales` WHERE `IDEmpresa` = ?  AND Tipo = ? AND (`fecha` >= ? AND `fecha` <= ?) ORDER BY `reportes_generales`.`fecha` DESC ";
	$stmt =  Conexion::conectar()->prepare($sql);
	$stmt->execute(array($IDempresa , $TipoReporte , $fechaInicial , $FechaFinal));
	$data=$stmt->fetchAll(PDO::FETCH_ASSOC);
print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX

}else{

	$IDempresa = $FuncionesApp->test_input($_POST['empresa']);
	$sql = "SELECT * FROM `reportes_generales` WHERE `IDEmpresa` = ?  ORDER BY `reportes_generales`.`fecha` DESC";
	$stmt =  Conexion::conectar()->prepare($sql);
	$stmt->execute(array($IDempresa ));
	$data=$stmt->fetchAll(PDO::FETCH_ASSOC);
   print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX

}




?>