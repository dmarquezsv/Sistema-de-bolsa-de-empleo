<?php 

include_once '../../../../BD/Conexion.php';
include_once '../../../../BD/Consultas.php';
include_once '../../../../main/funcionesApp.php';

$FuncionesApp = new funcionesApp();
session_start(); 


if (isset($_POST['Guardar'])) {

	$IDempresa = $FuncionesApp->test_input($_POST['Iduser']);
	$IDPais = $FuncionesApp->test_input($_POST['OrigenPais']);
	$IDDepartamento = $FuncionesApp->test_input($_POST['IDDepartemento']);
	$IDCategoria = $FuncionesApp->test_input($_POST['areaempresa']);
	$IDDesempenado = $FuncionesApp->test_input($_POST['idCargo']);
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
	$fechaActual =date("Y-m-d");
	$Estado = $FuncionesApp->test_input($_POST['estado']);


	$sql = "INSERT INTO `empresa_ofertas_trabajos` (`IDEmpresa`, `IDPais`, `IDDepartamento`, `IDCategoria`, `IDDesempenado`, `Plaza`, `Descripcion`, `Vacante`, `TipoContratacion`, `Genero`, `EdadMenor`, `EdadMayor`, `SalarioMinimo`, `SalarioMaximo`, `Vihiculo`, `TipoVehiculo`, `Experiencia`, `IDAreaExperiencia`, `Expira`, `FechaPublicacion`, `Estado`) VALUES (:IDEmpresa,:IDPais,:IDDepartamento,:IDCategoria,:IDDesempenado,:Plaza,:Descripcion,:Vacante,:TipoContratacion,:Genero,:EdadMenor,:EdadMayor,:SalarioMinimo,:SalarioMaximo,:Vihiculo,:TipoVehiculo,:Experiencia,:NivelExperiencia,:Expira,:FechaPublicacion,:Estado)";

	$stmt =  Conexion::conectar()->prepare($sql);
	$stmt->bindParam('IDEmpresa', $IDempresa , PDO::PARAM_STR);
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
	$stmt->bindParam('NivelExperiencia', $NivelExperiencia , PDO::PARAM_STR);
	$stmt->bindParam('Expira', $Expira , PDO::PARAM_STR);
	$stmt->bindParam('FechaPublicacion', $fechaActual , PDO::PARAM_STR);
	$stmt->bindParam('Estado', $Estado , PDO::PARAM_STR);


	if ($stmt->execute()){

		


		//vERIFICA SI EXISTE UN REPORTE CON LA FECHA ACTUAL SI ES CERO CREA EL  REPORTE  SI ES 1 INCREMENTA CONTADOR DE VISITAS
		$sql18="SELECT COUNT(`IDReporte`) AS 'FechaDelDia' FROM `reportes_generales` WHERE `fecha` = ? AND `IDEmpresa` = ? AND `Tipo` = 'Ofertas publicadas'";
		$stmt18 =  Conexion::conectar()->prepare($sql18);
		$fechadelDia =date("Y-m-d");

		$stmt18->execute(array($fechadelDia, $IDempresa));
		while ($item=$stmt18->fetch()){

			$ResultReporteDelDia = $item['FechaDelDia'];
		}


//Este bloque sirve para realizar los reportes para las empresas por lo tanto
//realiza el conteo de visitas de los perfiles visto por fechas 
		if($ResultReporteDelDia == 0){

			$sql19="INSERT INTO `reportes_generales` (`IDEmpresa`, `Tipo`, `contador`, `fecha`) VALUES (:IDEmpresa, 'Ofertas publicadas', '1', :fecha)";
			$stmt19 =  Conexion::conectar()->prepare($sql19);
			$stmt19->bindParam('IDEmpresa',$IDempresa  , PDO::PARAM_STR);
			$stmt19->bindParam('fecha',$fechadelDia  , PDO::PARAM_STR);
			if (!$stmt19->execute()){

				echo "No se ha podido guardar el conteo de reportes";
			}

		}else{

  //Realizamos una consulta para buscar  el conteo  con su respectivo fecha y empresa. La opcion sera perfiles vistos por dia
			$sql20="SELECT `contador` FROM reportes_generales WHERE `fecha` = ?  AND `IDEmpresa` = ? AND `Tipo` = 'Ofertas publicadas'";
			$stmt20 =  Conexion::conectar()->prepare($sql20);
			$stmt20->execute(array($fechadelDia, $IDempresa));
			while ($item=$stmt20->fetch()){

    			$contador = $item['contador']; // resultado del contado de visitas
    		}

	 $incremento = $contador + 1; // el aumento en 1 por cada visitas

	//Actualizamos la visita del contador
	 $sql19="UPDATE `reportes_generales` SET `contador`= :contador WHERE `fecha` = :fecha  AND `IDEmpresa` = :IDEmpresa AND `Tipo` = 'Ofertas publicadas'";
	 $stmt19 =  Conexion::conectar()->prepare($sql19);
	 $stmt19->bindParam('contador',$incremento  , PDO::PARAM_STR);
	 $stmt19->bindParam('fecha',$fechadelDia  , PDO::PARAM_STR);
	 $stmt19->bindParam('IDEmpresa',$IDempresa  , PDO::PARAM_STR);
	 if (!$stmt19->execute()){

	 	echo "No se ha podido guardar el conteo de reportes";
	 }


	}
	//fIN DEL BLOQUE DEL REPORTE


	$_SESSION['alertas'] = "Mensaje";
	$_SESSION['ms'] = "Se ha agregado la oferta de empleo";
	header('Location: ../../ofertas-empleos');


}else{

	$_SESSION['alertas'] = "Fallo";
	header('Location: ../../nueva-oferta-empleo');
}




}else{

	$_SESSION['alertas'] = "PerdidaDatos";
	header('Location: ../../nueva-oferta-empleo');
}



?>