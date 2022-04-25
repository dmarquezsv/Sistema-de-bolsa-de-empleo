<?php  
	

include_once '../../../../BD/Conexion.php';
include_once '../../../../BD/Consultas.php';
include_once '../../../../main/funcionesApp.php';

$FuncionesApp = new funcionesApp();
session_start(); 

if (isset($_POST['EliminarIdioma'])) {

	$id = base64_decode($_POST['IDEliminar']);
	$IDEliminar = $FuncionesApp->test_input($id);

	$stmt =  Consultas::ejecutar_consulta_eliminar("usuarios_idiomas" , "IDIdioma" , $IDEliminar);
     
	if ($stmt == true) {

		$_SESSION['alertas'] = "Mensaje";
		$_SESSION['ms'] = "Se ha eliminado el idioma Laboral";
		header('Location: ../../habilidades');

	}else{

		$_SESSION['alertas'] = "Fallo";
		
		header('Location: ../../habilidades');
	}


}
else{

	$_SESSION['alertas'] = "PerdidaDatos";
	header('Location: ../../habilidades');

}


?>