<?php  

include_once '../../../../BD/Conexion.php';
include_once '../../../../BD/Consultas.php';
include_once '../../../../main/funcionesApp.php';
$FuncionesApp = new funcionesApp();

$IDUser = $FuncionesApp->test_input($_POST['usuario']);
$IDOferta = $FuncionesApp->test_input($_POST['idtrabajo']);
$fechaActual =date("Y-m-d");

$sql = "INSERT INTO `usuario_favoritos_postulaciones` (`IDUsuario`, `IDpostulaciones`, `fecha`) VALUES (:IDUsuario,:IDpostulaciones,:fecha)";

$stmt =  Conexion::conectar()->prepare($sql);
$stmt->bindParam('IDUsuario', $IDUser , PDO::PARAM_STR);
$stmt->bindParam('IDpostulaciones', $IDOferta , PDO::PARAM_STR);
$stmt->bindParam('fecha', $fechaActual , PDO::PARAM_STR);
if ($stmt->execute()){

	echo '<button  id="eliminar" class="bizwheel-btn theme-1 effect">Eliminar favoritos</button>';
}else{
 
echo '<button  id="agregar" class="bizwheel-btn theme-1 effect"> Agregar a favoritos </button>';
}


?>