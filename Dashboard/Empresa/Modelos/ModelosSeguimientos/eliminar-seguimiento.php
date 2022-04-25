<?php 

include_once '../../../../BD/Conexion.php';
include_once '../../../../BD/Consultas.php';
include_once '../../../../main/funcionesApp.php';

$FuncionesApp = new funcionesApp();
$id =$_POST['user_id'];
$stmt =  Consultas::ejecutar_consulta_eliminar("proceso_seleccion_candidato " , "IDProceso" , $id);
 
?>