<?php 

include_once '../../../../BD/Conexion.php';
include_once '../../../../BD/Consultas.php';
include_once '../../../../main/funcionesApp.php';

$FuncionesApp = new funcionesApp();
session_start(); 

if (isset($_POST['Eliminar'])) {

	$id = base64_decode($_POST['IDEliminar']);
	$IDOfertaEmpleo = $FuncionesApp->test_input($id);

	$stmt =  Consultas::ejecutar_consulta_eliminar("empresa_ofertas_trabajos" , "IDpostulaciones" , $IDOfertaEmpleo);
     
	if ($stmt == true) {

		$_SESSION['alertas'] = "Mensaje";
		$_SESSION['ms'] = "Se ha eliminado la ofeta de empleo";
		
		header('Location: ../../ofertas-empleos');

	}else{

		$_SESSION['alertas'] = "Fallo";
		
		header('Location: ../../ofertas-empleos');
	}


}
else{

	$_SESSION['alertas'] = "PerdidaDatos";
	header('Location: ../../ofertas-empleos');

}

?>