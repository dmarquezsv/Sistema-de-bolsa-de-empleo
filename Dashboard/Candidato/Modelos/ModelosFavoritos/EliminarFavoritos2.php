<?php 

include_once '../../../../BD/Conexion.php';
include_once '../../../../BD/Consultas.php';
include_once '../../../../main/funcionesApp.php';
$FuncionesApp = new funcionesApp();

$IDUser = $FuncionesApp->test_input($_POST['usuario']);
$IDOferta = $FuncionesApp->test_input($_POST['idtrabajo']);

$sql = "DELETE FROM `usuario_favoritos_postulaciones` WHERE IDUsuario = :IDUsuario AND IDpostulaciones = :IDpostulaciones";

$stmt =  Conexion::conectar()->prepare($sql);
$stmt->bindParam('IDUsuario', $IDUser , PDO::PARAM_STR);
$stmt->bindParam('IDpostulaciones', $IDOferta , PDO::PARAM_STR);

if ($stmt->execute()){

	echo '<button  id="agregar" class="bizwheel-btn theme-1 effect" > Agregar a favoritos </button>';
	
}else{
 	
 	echo '<button  id="eliminar" class="bizwheel-btn theme-1 effect">Eliminar favoritos</button>';

}


?>