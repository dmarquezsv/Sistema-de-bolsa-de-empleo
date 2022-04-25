<?php  

include_once '../../../../BD/Conexion.php';
include_once '../../../../BD/Consultas.php';
include_once '../../../../main/funcionesApp.php';

$FuncionesApp = new funcionesApp();
session_start(); 

if (isset($_POST['EliminarHabilidad'])) {

	$id = base64_decode($_POST['IDhabilidad']);
	$IDEliminar = $FuncionesApp->test_input($id);

	$stmt =  Consultas::ejecutar_consulta_eliminar("usuarios_habilidades" , "IDHabilidad" , $IDEliminar);
     
	if ($stmt == true) {

		$_SESSION['alertas'] = "Mensaje";
		$_SESSION['ms'] = "Se ha eliminado la habilidad personal";
		
		header('Location: ../../habilidades-usuario');

	}else{

		$_SESSION['alertas'] = "Fallo";
		
		header('Location: ../../habilidades-usuario');
	}


}
else{

	$_SESSION['alertas'] = "PerdidaDatos";
	header('Location: ../../habilidades-usuario');
}

?>