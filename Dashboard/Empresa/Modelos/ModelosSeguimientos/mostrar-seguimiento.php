<?php 

include '../../../../BD/Conexion.php';
include_once '../../../../BD/Consultas.php';
$Conexion = new Consultas();
include_once '../../../../main/funcionesApp.php';
$FuncionesApp = new funcionesApp();

$USERID=base64_decode($_POST['usuario']);
$IDusuario = $FuncionesApp->test_input($USERID);
$IDempresa = $FuncionesApp->test_input($_POST['empresa']);


$sql="SELECT IDProceso , S.Nombre , `Comentario` ,`fecha_registro` FROM proceso_seleccion_candidato SC INNER JOIN tipo_seleccion_candidatos S  ON SC.IDSeleccion = S.IDSeleccion WHERE `IDUsuario` = ? AND `IDEmpresa` = ?";
$stmt =  Conexion::conectar()->prepare($sql);
$stmt->execute(array($IDusuario , $IDempresa));
$data=$stmt->fetchAll(PDO::FETCH_ASSOC);
print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX


?>