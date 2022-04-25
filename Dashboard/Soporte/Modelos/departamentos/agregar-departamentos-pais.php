<?php  

include '../../../../BD/Conexion.php';
include_once '../../../../BD/Consultas.php';
$Conexion = new Consultas();
include_once '../../../../main/funcionesApp.php';
$FuncionesApp = new funcionesApp();

$idPais = $FuncionesApp->test_input($_POST['idPais']);
$deparmento = $FuncionesApp->test_input($_POST['departamentos']);

$sql="INSERT INTO `soporte_paises_departamento` (`IDDepartamento`, `IDPais`, `Nombre`) VALUES (NULL, :IDPais, :Nombre) ";
$stmt =  Conexion::conectar()->prepare($sql);

$stmt->bindParam('IDPais', $idPais , PDO::PARAM_STR);
$stmt->bindParam('Nombre', $deparmento , PDO::PARAM_STR);


if ($stmt->execute()){
	echo "1";
}else{
	echo "0";
}


?>