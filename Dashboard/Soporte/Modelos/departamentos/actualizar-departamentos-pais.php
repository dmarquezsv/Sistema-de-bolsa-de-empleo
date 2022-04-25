<?php  
include '../../../../BD/Conexion.php';
include_once '../../../../BD/Consultas.php';
$Conexion = new Consultas();
include_once '../../../../main/funcionesApp.php';
$FuncionesApp = new funcionesApp();

$iddeparmento= $FuncionesApp->test_input($_POST['codigo']);
$deparmento = $FuncionesApp->test_input($_POST['departamento']);

$sql="UPDATE `soporte_paises_departamento` SET `Nombre` = :Nombre  WHERE `IDDepartamento` = :IDDepartamento";
$stmt =  Conexion::conectar()->prepare($sql);

$stmt->bindParam('Nombre', $deparmento , PDO::PARAM_STR);
$stmt->bindParam('IDDepartamento', $iddeparmento , PDO::PARAM_STR);

if ($stmt->execute()){
	echo "1";
}else{
	echo "0";
}



?>