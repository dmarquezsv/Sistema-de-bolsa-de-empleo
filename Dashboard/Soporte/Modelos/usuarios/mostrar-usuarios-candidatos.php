<?php 

include '../../../../BD/Conexion.php';
include_once '../../../../BD/Consultas.php';
$Conexion = new Consultas();
include_once '../../../../main/funcionesApp.php';
$FuncionesApp = new funcionesApp();

$sql="SELECT C.IDUsuario ,  C.Nombre , C.Apellidos , C.Correo  , C.FechaRegistro ,C.UltimaConexion , C.Estado FROM usuarios_cuentas C  WHERE `Cargo` ='Candidato'";

$stmt =  Conexion::conectar()->prepare($sql);
$stmt->execute();

$clientes = array(); //creamos un array
while ($item=$stmt->fetch())
{
	
	
	$ID = $item['IDUsuario'];
	$nombre =  $item['Nombre'];
	$apellidos = $item['Apellidos'];
	$FechaRegistro = $item['FechaRegistro'];
	$UltimaConexion = $item['UltimaConexion'];
	$email = $item['Correo'];
	$estado = $item['Estado'];


	$clientes[] = array('ID'=> $ID,'nombre'=> $nombre, 'apellidos'=> $apellidos ,'FechaRegistro'=> $FechaRegistro ,'UltimaConexion'=> $UltimaConexion ,'email'=> $email,'estado'=> $estado );

}

//Creamos el JSON
print json_encode($clientes, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX


?>