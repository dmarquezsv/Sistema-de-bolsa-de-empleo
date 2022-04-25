<?php 

include_once '../../../../BD/Conexion.php';
include_once '../../../../BD/Consultas.php';
include_once '../../../../main/funcionesApp.php';

$FuncionesApp = new funcionesApp();

$IDPais =  $FuncionesApp->test_input($_POST['codigo']);
$stmt =  Consultas::ejecutar_consulta_eliminar("soporte_paises " , "IDPais" , $IDPais);

if($stmt == true){
	echo "1";
}else{
	echo "0";
}

?>