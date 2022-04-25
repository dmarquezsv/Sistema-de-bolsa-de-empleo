<?php 

include_once '../../../../BD/Conexion.php';
include_once '../../../../BD/Consultas.php';
include_once '../../../../main/funcionesApp.php';
$FuncionesApp = new funcionesApp();

$IDUser = $FuncionesApp->test_input($_POST['usuario']);
$IDOferta = $FuncionesApp->test_input($_POST['idtrabajo']);

$sql = "DELETE FROM `usuario_postulaciones` WHERE `IDpostulaciones` = :IDpostulaciones AND `IDUsuario` = :IDUsuario";

$stmt =  Conexion::conectar()->prepare($sql);
$stmt->bindParam('IDpostulaciones', $IDOferta , PDO::PARAM_STR);
$stmt->bindParam('IDUsuario', $IDUser , PDO::PARAM_STR);

if ($stmt->execute()){

	echo '<center><button  id="agregarOferta" class="bizwheel-btn theme-1 effect">Aplicar</button></center>';
	
}else{
 	
 	echo '<center><button  id="eliminarOferta" class="bizwheel-btn theme-1 effect">Dejar de aplicar</button></center>';

}


?>