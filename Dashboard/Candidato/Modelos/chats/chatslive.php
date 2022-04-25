<?php  

include_once '../../../../BD/Conexion.php';
include_once '../../../../BD/Consultas.php';
include_once '../../../../main/funcionesApp.php';

$FuncionesApp = new funcionesApp();
session_start(); 

$idEmpresa = $FuncionesApp->test_input($_POST['empresa']);
$Receptor  = $FuncionesApp->test_input($_POST['Receptor']);
$Usuario =$FuncionesApp->test_input($_POST['Usuario']);

$sql = "SELECT UC.Cargo , `mensaje` , `fecha` FROM chats c INNER JOIN usuarios_cuentas UC ON UC.IDUsuario = c.IDUsuario WHERE c.IDEmpresa = ? AND (c.IDUsuario = ? AND c.Receptor = ?) OR (c.IDUsuario = ? AND c.Receptor = ?) ORDER BY `c`.`fecha`  ASC";
$stmt =  Conexion::conectar()->prepare($sql);
$stmt->execute(array($idEmpresa,$Usuario , $Receptor ,$Receptor,$Usuario));

 while ($item=$stmt->fetch())
  {

  	if ($item['Cargo'] =="Empresa") {
  	
  		echo '<div class="font-size-sm font-italic text-muted text-center mt-20 mb-10">'.$item['fecha'].'</div>
  			<div class="rounded font-w600 p-10 mb-10  mr-50 bg-body-light">'.$item['mensaje'].'</div>

  		';

  	}else{

  		echo '<div class="font-size-sm font-italic text-muted text-center mt-20 mb-10">'.$item['fecha'].'</div>
        <div class="rounded font-w600 p-10 mb-10  ml-50 bg-primary-lighter text-primary-darker">'.$item['mensaje'].'</div>';
  	}
  			
  	
  }



?>