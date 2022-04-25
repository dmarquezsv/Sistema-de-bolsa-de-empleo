<?php 

 include_once '../../../../BD/Conexion.php';
include_once '../../../../BD/Consultas.php';
include_once '../../../../main/funcionesApp.php';

$FuncionesApp = new funcionesApp();
session_start(); 

if (isset($_POST['Eliminar'])) {

	$id = base64_decode($_POST['IDEliminar']);

	$IDEliminar = $FuncionesApp->test_input($id);
	$documento =  $FuncionesApp->test_input($_POST['documento']);
	$IDusuario = $_POST['Iduser2'];
	
	$stmt =  Consultas::ejecutar_consulta_eliminar("usuarios_documentos" , "IDDocumento" , $IDEliminar);
     
	if ($stmt == true) {

		$_SESSION['alertas'] = "Mensaje";
		$_SESSION['ms'] = "Se ha Eliminado el documento";
		$destino = "../../../../documentos/documentos_usuarios/".$IDusuario."/".$documento;
		unlink($destino);
		header('Location: ../../documentos');

	}else{

		$_SESSION['alertas'] = "Fallo";
		
		header('Location: ../../documentos');
	}


}
else{

	$_SESSION['alertas'] = "PerdidaDatos";
	header('Location: ../../documentos');

}

?>