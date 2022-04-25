<?php 

include '../../../../BD/Conexion.php';
include_once '../../../../BD/Consultas.php';
$Conexion = new Consultas();
include_once '../../../../main/funcionesApp.php';
$FuncionesApp = new funcionesApp();

$IDPais =  $FuncionesApp->test_input($_POST['codigo']);
$Nombre = $FuncionesApp->test_input($_POST['Pais']);

$sql="UPDATE `soporte_paises` SET `Nombre` = :Nombre  WHERE `IDPais` = :IDPais";
$stmt =  Conexion::conectar()->prepare($sql);

$stmt->bindParam('Nombre', $Nombre , PDO::PARAM_STR);
$stmt->bindParam('IDPais', $IDPais , PDO::PARAM_STR);

if ($stmt->execute()){
	echo "1";
}else{
	echo "0";
}

?>