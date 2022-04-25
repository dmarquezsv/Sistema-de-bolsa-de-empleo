<?php 

include_once '../../../../BD/Conexion.php';
include_once '../../../../BD/Consultas.php';
include_once '../../../../main/funcionesApp.php';
$FuncionesApp = new funcionesApp();

$IDUser = $FuncionesApp->test_input($_POST['usuario']);
$IDOfertaTrabajo = $FuncionesApp->test_input($_POST['idtrabajo']);

$sql3 = "SELECT COUNT(IDFavoritos)AS 'Resultado' FROM usuario_favoritos_postulaciones WHERE IDpostulaciones = ? AND IDUsuario = ?";
$salida = "";
$stmt3 =  Conexion::conectar()->prepare($sql3);
$stmt3->execute(array($IDOfertaTrabajo , $IDUser));
$resultPostulacion = "";
while ($item=$stmt3->fetch())
{
	$resultPostulacion = $item['Resultado'];
}

if ($resultPostulacion == 0) {
	echo '<button  id="agregar" class="bizwheel-btn theme-1 effect"> Agregar a favoritos </button>';
}else if($resultPostulacion == 1){
	echo '<button  id="eliminar" class="bizwheel-btn theme-1 effect">Eliminar de favoritos</button>';
}

?>