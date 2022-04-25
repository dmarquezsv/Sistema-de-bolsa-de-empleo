<?php 

include '../../../../BD/Conexion.php';
include_once '../../../../BD/Consultas.php';
$Conexion = new Consultas();
include_once '../../../../main/funcionesApp.php';
$FuncionesApp = new funcionesApp();


$Nombre = $FuncionesApp->test_input($_POST['Pais']);

$sql="INSERT INTO `soporte_paises` (`IDPais`, `Nombre`) VALUES (NULL, :Nombre) ";
$stmt =  Conexion::conectar()->prepare($sql);

$stmt->bindParam('Nombre', $Nombre , PDO::PARAM_STR);


if ($stmt->execute()){
	echo "1";
}else{
	echo "0";
}

?>