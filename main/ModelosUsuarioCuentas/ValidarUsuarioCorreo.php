<?php 
 
 include_once '../../BD/Conexion.php';
 include_once '../../BD/Consultas.php';
  
 $Conexion = new Consultas();

$salida = "";
$sql = "";
$result ="";

 if (isset($_POST['consulta'])) {
 	
 	$dato = $_POST['consulta'];

 	$result = $Conexion->ejecutar_consulta_conteo("usuarios_cuentas" , "Correo" , $dato);

 	if ($result == 1) {
 		$salida.="<div class='alert alert-warning alert-dismissible fade show' role='alert'> El correo ya esta en uso  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>  </div> 
 		<input type='hidden' value='".$result."' id='validez'>";
 		
 	}else
 	{
 		$salida.="";
 	}

 	echo $salida;


 }


 



 ?>