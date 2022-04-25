<?php 


include_once '../../../../BD/Conexion.php';
include_once '../../../../BD/Consultas.php';
include_once '../../../../main/funcionesApp.php';

$FuncionesApp = new funcionesApp();
session_start(); 

$idEmpresa = $FuncionesApp->test_input($_POST['empresa']);
$Receptor  = $FuncionesApp->test_input($_POST['Receptor']);
$Usuario =$FuncionesApp->test_input($_POST['Usuario']);

$sql = "SELECT COUNT(`IDchats`) AS'TotalChats' FROM chats c INNER JOIN usuarios_cuentas UC ON UC.IDUsuario = c.IDUsuario WHERE c.IDEmpresa = ? AND (c.IDUsuario = ? AND c.Receptor = ?) OR (c.IDUsuario = ? AND c.Receptor = ?) ORDER BY `c`.`fecha` ASC ";
$stmt =  Conexion::conectar()->prepare($sql);
$stmt->execute(array($idEmpresa,$Usuario , $Receptor ,$Receptor,$Usuario));
	
$conteoChats = "";	
 while ($item=$stmt->fetch())
  {
	$conteoChats=$item['TotalChats'];
  	
  }

  echo $conteoChats;



?>


