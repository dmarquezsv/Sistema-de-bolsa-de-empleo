<?php 


include_once '../../../../BD/Conexion.php';
include_once '../../../../BD/Consultas.php';
include_once '../../../../main/funcionesApp.php';

$FuncionesApp = new funcionesApp();
session_start(); 

if (isset($_POST['Eliminar'])) {

	$id = base64_decode($_POST['IDEliminar']);
	$IDEliminar = $FuncionesApp->test_input($id);

	$stmt =  Consultas::ejecutar_consulta_eliminar("usuario_referencia" , "IDReferencia" , $IDEliminar);
     
	if ($stmt == true) {

		$_SESSION['alertas'] = "Mensaje";
		$_SESSION['ms'] = "Se ha Eliminado la refencia";
		
		header('Location: ../../referencia');

	}else{

		$_SESSION['alertas'] = "Fallo";
		
		header('Location: ../../referencia');
	}


}
else{

	$_SESSION['alertas'] = "PerdidaDatos";
	header('Location: ../../experiencia');

}

?>