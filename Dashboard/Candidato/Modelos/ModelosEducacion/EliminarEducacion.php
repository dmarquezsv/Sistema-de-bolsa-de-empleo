<?php 

include_once '../../../../BD/Conexion.php';
include_once '../../../../BD/Consultas.php';
include_once '../../../../main/funcionesApp.php';

$FuncionesApp = new funcionesApp();
session_start(); 

if (isset($_POST['Eliminar'])) {

	$id = base64_decode($_POST['IDEducacion']);
	$IDEducacion = $FuncionesApp->test_input($id);

	$stmt =  Consultas::ejecutar_consulta_eliminar("usuario_educacion" , "IDEducacion" , $IDEducacion);
     
	if ($stmt == true) {

		$_SESSION['alertas'] = "Mensaje";
		$_SESSION['ms'] = "Se ha eliminado el estudio académico";
		
		header('Location: ../../educacion');

	}else{

		$_SESSION['alertas'] = "Fallo";
		
		header('Location: ../../educacion');
	}


}
else{

	$_SESSION['alertas'] = "PerdidaDatos";
	header('Location: ../../educacion');

}

?>