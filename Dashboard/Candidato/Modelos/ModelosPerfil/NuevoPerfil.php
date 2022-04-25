<?php

include_once '../../../../BD/Conexion.php';
include_once '../../../../BD/Consultas.php';
include_once '../../../../main/funcionesApp.php';

$FuncionesApp = new funcionesApp();
session_start(); 

if (isset($_POST['Guardar'])) {
	
	$IDusuario =  $FuncionesApp->test_input($_POST['Iduser']);	
	$IDPais = $FuncionesApp->test_input($_POST['OrigenPais']);
	$IDDepartamento = $FuncionesApp->test_input($_POST['IDDepartemento']);
	
	$Edad = $FuncionesApp->test_input($_POST['edad']);
	$Descripcion= $FuncionesApp->test_input2($_POST['DescriptionUser']);
	$Licencia =$FuncionesApp->test_input($_POST['Licencia']);
	$Vehiculo = $FuncionesApp->test_input($_POST['vehículo']);
	$OpcionManjeo = $FuncionesApp->test_input($_POST['Manejo']);
	$EmailAlternativo = $FuncionesApp->test_input($_POST['Email']);
	$Telefono = $FuncionesApp->test_input($_POST['telefono']);
	$Celuar = $FuncionesApp->test_input($_POST['Celular']);
	$Discapacidad = $FuncionesApp->test_input($_POST['Discapacidad']);

	//$TipoDescapacidad = $FuncionesApp->test_input($_POST['tipocapacidad']);
	$TipoDescapacidad = "";

	$Experiencia = $FuncionesApp->test_input($_POST['ExperienciaUser']);
	$AreaExperiencia = $FuncionesApp->test_input($_POST['AreaExperiencia']);
	$Portafolio = $FuncionesApp->test_input2($_POST['Portafolio']);
	$Disponibilidad = $FuncionesApp->test_input($_POST['Disponibilidad']);
	$SituacionActual = $FuncionesApp->test_input($_POST['SituacionActual']);

	$Educacion = $FuncionesApp->test_input($_POST['Educacion']);
	$genero = $FuncionesApp->test_input($_POST['genero']);

	$salarioMinimo = $FuncionesApp->test_input($_POST['salarioMinimo']);
	$SalarioMaximo = $FuncionesApp->test_input($_POST['salarioMaximo']);
	$confidencial =  $FuncionesApp->test_input($_POST['confidencial']);

	$identificacion = $FuncionesApp->test_input($_POST['identificacion']);
	$numeroidentificacion = $FuncionesApp->test_input($_POST['numidentificacion']);

	$direccionExacta = $FuncionesApp->test_input($_POST['direccionExacta']);

	$fechaActual = date('d-m-Y');
	
	


	$sql="INSERT INTO usuario_perfil (`IDUsuario` , `IDPais` , `IDDepartamento` , `EducacionSecundaria` , `Descripcion` , genero ,`LicenciaConducir` , `Vehiculo` , `ManejoVehiculo` , `CorreoAlternativo` , `Telefono` , `Celular` , `Discapacidad` , `TipoDiscapacidad` , `ExperienciaLaboral` , `IDAreaExperiencia` , `Portafolio` , `Disponiblidad` , `SituacionActual` , `edad` , `UltimaActualizacion`,SalarioMinimo , SalarioMaximo,confidencial,identificacion,numidentificacion,Direccion )  VALUES (:IDUsuario , :IDPais , :IDDepartamento , :EducacionSecundaria , :Descripcion ,:genero ,:LicenciaConducir , :Vehiculo , :ManejoVehiculo , :CorreoAlternativo , :Telefono , :Celular , :Discapacidad , :TipoDiscapacidad , :ExperienciaLaboral , :IDAreaExperiencia , :Portafolio , :Disponiblidad , :SituacionActual , :edad , :UltimaActualizacion,:SalarioMinimo,:SalarioMaximo,:confidencial,:identificacion,:numidentificacion,:Direccion)";
	$stmt =  Conexion::conectar()->prepare($sql);
	$stmt->bindParam(':IDUsuario', $IDusuario , PDO::PARAM_STR);
	$stmt->bindParam(':IDPais', $IDPais , PDO::PARAM_STR);
	$stmt->bindParam(':IDDepartamento', $IDDepartamento , PDO::PARAM_STR);
	$stmt->bindParam(':EducacionSecundaria', $Educacion , PDO::PARAM_STR);
	$stmt->bindParam(':Descripcion', $Descripcion , PDO::PARAM_STR);
	$stmt->bindParam(':genero', $genero , PDO::PARAM_STR);
	$stmt->bindParam(':LicenciaConducir', $Licencia , PDO::PARAM_STR);
	$stmt->bindParam(':Vehiculo', $Vehiculo , PDO::PARAM_STR);
	$stmt->bindParam(':ManejoVehiculo', $OpcionManjeo , PDO::PARAM_STR);
	$stmt->bindParam(':CorreoAlternativo', $EmailAlternativo , PDO::PARAM_STR);
	$stmt->bindParam(':Telefono', $Telefono , PDO::PARAM_STR);
	$stmt->bindParam(':Celular', $Celuar , PDO::PARAM_STR);
	$stmt->bindParam(':Discapacidad', $Discapacidad , PDO::PARAM_STR);
	$stmt->bindParam(':TipoDiscapacidad', $TipoDescapacidad , PDO::PARAM_STR);
	$stmt->bindParam(':ExperienciaLaboral', $Experiencia , PDO::PARAM_STR);
	$stmt->bindParam(':IDAreaExperiencia', $AreaExperiencia , PDO::PARAM_STR);
	$stmt->bindParam(':Portafolio', $Portafolio , PDO::PARAM_STR);
	$stmt->bindParam(':Disponiblidad', $Disponibilidad , PDO::PARAM_STR);
	$stmt->bindParam(':SituacionActual', $SituacionActual , PDO::PARAM_STR);
	$stmt->bindParam(':edad', $Edad , PDO::PARAM_STR);
	$stmt->bindParam(':UltimaActualizacion', $fechaActual , PDO::PARAM_STR);
	$stmt->bindParam(':SalarioMinimo', $salarioMinimo , PDO::PARAM_STR);
	$stmt->bindParam(':SalarioMaximo', $SalarioMaximo , PDO::PARAM_STR);
	$stmt->bindParam(':confidencial', $confidencial , PDO::PARAM_STR);
	$stmt->bindParam(':identificacion', $identificacion , PDO::PARAM_STR);
	$stmt->bindParam(':numidentificacion', $numeroidentificacion , PDO::PARAM_STR);
	
	$stmt->bindParam(':Direccion', $direccionExacta , PDO::PARAM_STR);

	if ($stmt->execute()){

		header('Location: ../../educacion?notificar=1');

	}else{
		
		$_SESSION['alertas'] = "Fallo";
		header('Location: ../../perfil');
	}



}
else{

	$_SESSION['alertas'] = "PerdidaDatos";
	header('Location: ../../perfil');

}

?>