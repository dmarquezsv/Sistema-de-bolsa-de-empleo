<?php  

include '../../../../BD/Conexion.php';
include_once '../../../../BD/Consultas.php';
$Conexion = new Consultas();
include_once '../../../../main/funcionesApp.php';
$FuncionesApp = new funcionesApp();

$usuario = $_POST['id'];

$sql="SELECT IDPaisesHabilitado , P.Nombre FROM paises_habilitado_empresa PE INNER JOIN soporte_paises P ON PE.IDPais = P.IDPais WHERE `IDUsuario` = ?";
$stmt =  Conexion::conectar()->prepare($sql);
$stmt->execute(array($usuario));
$data=$stmt->fetchAll(PDO::FETCH_ASSOC);
print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX

?>