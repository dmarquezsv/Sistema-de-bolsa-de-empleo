<?php 

include_once '../../../../BD/Conexion.php';
include_once '../../../../BD/Consultas.php';
include_once '../../../../main/funcionesApp.php';

$FuncionesApp = new funcionesApp();

$ID =  $FuncionesApp->test_input($_POST['id']);
$stmt =  Consultas::ejecutar_consulta_eliminar("soporte_areas_trabajos " , "IDCategoria" , $ID);

?>