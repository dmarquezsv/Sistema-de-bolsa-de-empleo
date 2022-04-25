<?php 

include_once '../../../../BD/Conexion.php';
include_once '../../../../BD/Consultas.php';
include_once '../../../../main/funcionesApp.php';

$FuncionesApp = new funcionesApp();

$ID =  $FuncionesApp->test_input($_POST['codigo']);
$stmt =  Consultas::ejecutar_consulta_eliminar("soporte_paises_departamento " , "IDDepartamento" , $ID);

if($stmt == true){
	echo "1";
}else{
	echo "0";
}

?>