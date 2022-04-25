<?php 

include_once '../../../../BD/Conexion.php';
include_once '../../../../BD/Consultas.php';
include_once '../../../../main/funcionesApp.php';

$FuncionesApp = new funcionesApp();
session_start(); 

if (isset($_POST['Guardar'])) {

	$Nombre = $FuncionesApp->test_input($_POST['nombre']);	
	$Apellidos = $FuncionesApp->test_input($_POST['apellidos']);	
	$IDcuentauser = $FuncionesApp->test_input($_POST['iduser']);

	$sql="UPDATE `usuarios_cuentas` SET `Nombre` = :Nombre, `Apellidos` = :Apellidos WHERE `IDUsuario` = :IDUsuario";
	$stmt = Conexion::conectar()->prepare($sql);
	$stmt->bindParam(':Nombre', $Nombre , PDO::PARAM_STR);
	$stmt->bindParam(':Apellidos', $Apellidos , PDO::PARAM_STR);
	$stmt->bindParam(':IDUsuario', $IDcuentauser , PDO::PARAM_STR);


	if ($stmt->execute()){
		$_SESSION['alertas'] = "Mensaje";
		$_SESSION['ms'] = "Se ha actualizado cuenta";

		 $_SESSION['nombre'] =$Nombre;
		 $_SESSION['apellido'] =$Apellidos;

		header('Location: ../../actualizar-cuenta');
	}else{
		
		$_SESSION['alertas'] = "Fallo";
		header('Location: ../../actualizar');
	}


}else{

	$_SESSION['alertas'] = "PerdidaDatos";
	header('Location: ../../perfil');

}

?>