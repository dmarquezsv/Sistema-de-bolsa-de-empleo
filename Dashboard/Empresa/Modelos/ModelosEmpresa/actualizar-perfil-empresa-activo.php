<?php 

include_once '../../../../BD/Conexion.php';
include_once '../../../../BD/Consultas.php';
include_once '../../../../main/funcionesApp.php';

$FuncionesApp = new funcionesApp();
session_start();

if (isset($_POST['Guardar'])) {

	$IDusuario =  $FuncionesApp->test_input($_POST['Iduser']);
	$AreaEmpresa = $FuncionesApp->test_input($_POST['areaempresa']);
	$Pais = $FuncionesApp->test_input($_POST['OrigenPais']);
    $IDDepartamento =$FuncionesApp->test_input($_POST['IDDepartemento']);
	if ($IDDepartamento == "") {
		$IDDepartamento =$FuncionesApp->test_input($_POST['DepartamentoActivo']);
	}
	$nombreEmpresa = $FuncionesApp->test_input($_POST['nombreempresa']);
	$ubicacionEmpresa = $FuncionesApp->test_input($_POST['ubicacionEmpresa']);
	$mapa = $_POST['mapaempresa'];
	$descripcionEmpresa =  $FuncionesApp->test_input2($_POST['DescriptionEmpresa']);
	$email =  $FuncionesApp->test_input($_POST['emailEmpresa']);
	$codigoPostal = $FuncionesApp->test_input2($_POST['codigopostal']);
	$telefono  = $FuncionesApp->test_input2($_POST['telefono']);
	$celular = $FuncionesApp->test_input2($_POST['celular']);
	$facebook = $FuncionesApp->test_input2($_POST['Facebook']);
	$instagram = $FuncionesApp->test_input2($_POST['Instagram']);
	$whatsapp = $FuncionesApp->test_input2($_POST['whatsapp']);
	$yotube = $FuncionesApp->test_input2($_POST['youtube']);
	$paginaweb = $FuncionesApp->test_input2($_POST['paginaweb']);
	$confidencial = $FuncionesApp->test_input2($_POST['confidencial']);
	$RazonSocial = $FuncionesApp->test_input2($_POST['razonsocial']);
	
	$sql="UPDATE `empresa_perfil` SET `IDTipoEmpresa` = :IDTipoEmpresa , `IDPais` = :IDPais , `IDDepartamento` = :IDDepartamento , `Nombre` = :Nombre, `lugar` = :lugar, `Mapa` = :Mapa, `Descripcion` = :Descripcion, `Email` = :Email , `CodigoPostal` = :CodigoPostal, `Telefono` = :Telefono, `Celular` = :Celular, `facebook` = :facebook, `instagram` = :instagram, `whatsapp` = :whatsapp, `youtube` = :youtube, `paginaweb` = :paginaweb, `Confidencial` = :Confidencial , razonSocial = :razonSocial  WHERE IDUsuario = :IDUsuario  ";

	$stmt =  Conexion::conectar()->prepare($sql);
	$stmt->bindParam('IDTipoEmpresa', $AreaEmpresa , PDO::PARAM_STR);
	$stmt->bindParam('IDPais', $Pais , PDO::PARAM_STR);
	$stmt->bindParam('IDDepartamento', $IDDepartamento , PDO::PARAM_STR);
	$stmt->bindParam('Nombre', $nombreEmpresa , PDO::PARAM_STR);
	$stmt->bindParam('lugar', $ubicacionEmpresa , PDO::PARAM_STR);
	$stmt->bindParam('Mapa', $mapa , PDO::PARAM_STR);
	$stmt->bindParam('Descripcion', $descripcionEmpresa , PDO::PARAM_STR);
	$stmt->bindParam('Email', $email , PDO::PARAM_STR);
	$stmt->bindParam('CodigoPostal', $codigoPostal , PDO::PARAM_STR);
	$stmt->bindParam('Telefono', $telefono , PDO::PARAM_STR);
	$stmt->bindParam('Celular', $celular , PDO::PARAM_STR);
	$stmt->bindParam('facebook', $facebook , PDO::PARAM_STR);
	$stmt->bindParam('instagram', $instagram , PDO::PARAM_STR);
	$stmt->bindParam('whatsapp', $whatsapp , PDO::PARAM_STR);
	$stmt->bindParam('youtube', $yotube , PDO::PARAM_STR);
	$stmt->bindParam('paginaweb', $paginaweb , PDO::PARAM_STR);
	$stmt->bindParam('Confidencial', $confidencial , PDO::PARAM_STR);
	$stmt->bindParam('razonSocial', $RazonSocial , PDO::PARAM_STR);
	$stmt->bindParam('IDUsuario', $IDusuario , PDO::PARAM_STR);

	if ($stmt->execute()){

		$_SESSION['alertas'] = "Mensaje";
		$_SESSION['ms'] = "Se ha actualizado perfil de empresa";
		header('Location: ../../actualizar-empresa.php');
	}else{
		$_SESSION['alertas'] = "Fallo";
		header('Location: ../../actualizar-empresa.php');
	}

}
else{

	$_SESSION['alertas'] = "PerdidaDatos";
	header('Location: ../../actualizar-empresa.php');

}


?>