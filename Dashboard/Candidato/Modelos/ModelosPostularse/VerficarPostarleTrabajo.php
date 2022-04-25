<?php 

include_once '../../../../BD/Conexion.php';
include_once '../../../../BD/Consultas.php';
include_once '../../../../main/funcionesApp.php';
$FuncionesApp = new funcionesApp();

$IDUser = $FuncionesApp->test_input($_POST['usuario']);
$IDOfertaTrabajo = $FuncionesApp->test_input($_POST['idtrabajo']);

$sql3 = "SELECT COUNT(`IDUsuario`)AS 'Resultado' FROM usuario_postulaciones WHERE `IDUsuario` = ? AND `IDpostulaciones` = ?";
$salida = "";
$stmt3 =  Conexion::conectar()->prepare($sql3);
$stmt3->execute(array($IDOfertaTrabajo , $IDUser));
$resultPostulacion = "";
while ($item=$stmt3->fetch())
{
	$resultPostulacion = $item['Resultado'];
}

if ($resultPostulacion == 0) {
	echo '<center><button  id="agregarOferta" class="bizwheel-btn theme-1 effect">Aplicar</button></center>';
}else if($resultPostulacion == 1){
	echo '<center><button  id="eliminarOferta" class="bizwheel-btn theme-1 effect">Dejar de aplicar</button></center>';
}



?>