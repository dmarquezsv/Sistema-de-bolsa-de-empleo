<?php 


include_once '../../../../BD/Conexion.php';
include_once '../../../../BD/Consultas.php';
include_once '../../../../main/funcionesApp.php';

$FuncionesApp = new funcionesApp();
session_start(); 


if (isset($_POST['Guardar'])) {

	$IDOferta = $FuncionesApp->test_input($_POST['Iduser']);
	$IDPais = $FuncionesApp->test_input($_POST['OrigenPais']);

	$IDDepartamento = $FuncionesApp->test_input($_POST['IDDepartemento']);
	if ($IDDepartamento == "") {
		$IDDepartamento =$FuncionesApp->test_input($_POST['DepartamentoActivo']);
	}
	

	$IDCategoria = $FuncionesApp->test_input($_POST['areaempresa']);

	$IDDesempenado = $FuncionesApp->test_input($_POST['idCargo']);
	if ($IDDesempenado == "") {
		$IDDesempenado =$FuncionesApp->test_input($_POST['cargoActivo']);
	}

	$Plaza =$FuncionesApp->test_input($_POST['nombrePlaza']);
	$Descripcion = $FuncionesApp->test_input2($_POST['descripcion']);
	$Vacante = $FuncionesApp->test_input($_POST['vacantes']);
	$TipoContratacion = $FuncionesApp->test_input($_POST['Disponibilidad']);
	$Genero = $FuncionesApp->test_input($_POST['genero']);
	$EdadMenor = $FuncionesApp->test_input($_POST['edadMenor']);
	$EdadMayor = $FuncionesApp->test_input($_POST['edadMayor']);
	$SalarioMinimo = $FuncionesApp->test_input($_POST['salarioMinimo']);
	$SalarioMayor = $FuncionesApp->test_input($_POST['salarioMaximo']);
	$Vehiculo = $FuncionesApp->test_input($_POST['Vehiculo']);
	$TipoVehiculo = $FuncionesApp->test_input($_POST['Manejo']);
	$Experiencia = $FuncionesApp->test_input($_POST['ExperienciaUser']);
	$NivelExperiencia = $FuncionesApp->test_input($_POST['experiencia']);
	$Expira = $FuncionesApp->test_input($_POST['expira']);
	$Estado = $FuncionesApp->test_input($_POST['estado']);

	$sql="UPDATE `empresa_ofertas_trabajos` SET   `IDPais` = :IDPais , `IDDepartamento` =  :IDDepartamento, `IDCategoria` = :IDCategoria, `IDDesempenado` = :IDDesempenado, `Plaza` =  :Plaza, `Descripcion` = :Descripcion, `Vacante` = :Vacante, `TipoContratacion` =  :TipoContratacion, `Genero` = :Genero, `EdadMenor` = :EdadMenor, `EdadMayor` = :EdadMayor, `SalarioMinimo` =  :SalarioMinimo, `SalarioMaximo` = :SalarioMaximo, `Vihiculo` = :Vihiculo, `TipoVehiculo` = :TipoVehiculo, `Experiencia` = :Experiencia, `IDAreaExperiencia` = :IDAreaExperiencia, `Expira` = :Expira, `Estado` = :Estado WHERE IDpostulaciones = :IDpostulaciones";

	$stmt =  Conexion::conectar()->prepare($sql);
	$stmt->bindParam('IDPais', $IDPais , PDO::PARAM_STR);
	$stmt->bindParam('IDDepartamento', $IDDepartamento , PDO::PARAM_STR);
	$stmt->bindParam('IDCategoria', $IDCategoria , PDO::PARAM_STR);
	$stmt->bindParam('IDDesempenado', $IDDesempenado , PDO::PARAM_STR);
	$stmt->bindParam('Plaza', $Plaza , PDO::PARAM_STR);
	$stmt->bindParam('Descripcion', $Descripcion , PDO::PARAM_STR);
	$stmt->bindParam('Vacante', $Vacante , PDO::PARAM_STR);
	$stmt->bindParam('TipoContratacion', $TipoContratacion , PDO::PARAM_STR);
	$stmt->bindParam('Genero', $Genero , PDO::PARAM_STR);
	$stmt->bindParam('EdadMenor', $EdadMenor , PDO::PARAM_STR);
	$stmt->bindParam('EdadMayor', $EdadMayor , PDO::PARAM_STR);
	$stmt->bindParam('SalarioMinimo', $SalarioMinimo , PDO::PARAM_STR);
	$stmt->bindParam('SalarioMaximo', $SalarioMayor , PDO::PARAM_STR);
	$stmt->bindParam('Vihiculo', $Vehiculo , PDO::PARAM_STR);
	$stmt->bindParam('TipoVehiculo', $TipoVehiculo , PDO::PARAM_STR);
	$stmt->bindParam('Experiencia', $Experiencia , PDO::PARAM_STR);
	$stmt->bindParam('IDAreaExperiencia', $NivelExperiencia , PDO::PARAM_STR);
	$stmt->bindParam('Expira', $Expira , PDO::PARAM_STR);
	$stmt->bindParam('Estado', $Estado , PDO::PARAM_STR);
	$stmt->bindParam('IDpostulaciones', $IDOferta , PDO::PARAM_STR);

	$id= base64_encode($IDOferta);

	if ($stmt->execute()){

		$_SESSION['alertas'] = "Mensaje";
		$_SESSION['ms'] = "Se ha actualizado oferta de empleo";
		header('Location: ../../actualizar-oferta-empleo.php?id='.$id);

	}else{
		
		$_SESSION['alertas'] = "Fallo";
		header('Location: ../../actualizar-oferta-empleo.php?id='.$id);
	}


}
else{

	$_SESSION['alertas'] = "PerdidaDatos";
	header('Location: ../../actualizar-oferta-empleo.php?id='.$id);
}



?>