<?php 

include_once '../../../../BD/Conexion.php';
include_once '../../../../BD/Consultas.php';
include_once '../../../../main/funcionesApp.php';
$FuncionesApp = new funcionesApp();

if (isset($_POST['Confirmar'])) {
	
	$IDUserCandidatos = $FuncionesApp->test_input($_POST['idCandidatos']);
	$IDempresa = $FuncionesApp->test_input($_POST['IDEmpresa']);
	$nombreCandidato = $FuncionesApp->test_input($_POST['nombreUsuario']);
	$fechaActual =date("Y-m-d");

	$sql="INSERT INTO `guardar_seguimiento_candidato` (`IDUsuario`, `IDEmpresa` , fecha) VALUES (:IDUsuario,:IDEmpresa , :fecha)";

	$stmt =  Conexion::conectar()->prepare($sql);
	$stmt->bindParam('IDUsuario', $IDUserCandidatos , PDO::PARAM_STR);
	$stmt->bindParam('IDEmpresa', $IDempresa , PDO::PARAM_STR);
	$stmt->bindParam('fecha', $fechaActual , PDO::PARAM_STR);
	
	if ($stmt->execute()){

			//vERIFICA SI EXISTE UN REPORTE CON LA FECHA ACTUAL SI ES CERO CREA EL  REPORTE  SI ES 1 INCREMENTA CONTADOR DE VISITAS
			$sql18="SELECT COUNT(`IDReporte`) AS 'FechaDelDia' FROM `reportes_generales` WHERE `fecha` = ? AND `IDEmpresa` = ? AND `Tipo` = 'Seguimientos realizados'";
			$stmt18 =  Conexion::conectar()->prepare($sql18);
			$fechadelDia =date("Y-m-d");

			$stmt18->execute(array($fechadelDia, $IDempresa));
			while ($item=$stmt18->fetch()){

				$ResultReporteDelDia = $item['FechaDelDia'];
			}


	//Este bloque sirve para realizar los reportes para las empresas por lo tanto
	//realiza el conteo de visitas de los perfiles visto por fechas 
		if($ResultReporteDelDia == 0){

			$sql19="INSERT INTO `reportes_generales` (`IDEmpresa`, `Tipo`, `contador`, `fecha`) VALUES (:IDEmpresa, 'Seguimientos realizados', '1', :fecha)";
			$stmt19 =  Conexion::conectar()->prepare($sql19);
			$stmt19->bindParam('IDEmpresa',$IDempresa  , PDO::PARAM_STR);
			$stmt19->bindParam('fecha',$fechadelDia  , PDO::PARAM_STR);
			if (!$stmt19->execute()){

				echo "No se ha podido guardar el conteo de reportes";
			}

		}else{

  //Realizamos una consulta para buscar  el conteo  con su respectivo fecha y empresa. La opcion sera perfiles vistos por dia
			$sql20="SELECT `contador` FROM reportes_generales WHERE `fecha` = ?  AND `IDEmpresa` = ? AND `Tipo` = 'Seguimientos realizados'";
			$stmt20 =  Conexion::conectar()->prepare($sql20);
			$stmt20->execute(array($fechadelDia, $IDempresa));
			while ($item=$stmt20->fetch()){

    $contador = $item['contador']; // resultado del contado de visitas
	}

 $incremento = $contador + 1; // el aumento en 1 por cada visitas

	//Actualizamos la visita del contador
	 $sql19="UPDATE `reportes_generales` SET `contador`= :contador WHERE `fecha` = :fecha  AND `IDEmpresa` = :IDEmpresa AND `Tipo` = 'Seguimientos realizados'";
	 $stmt19 =  Conexion::conectar()->prepare($sql19);
	 $stmt19->bindParam('contador',$incremento  , PDO::PARAM_STR);
	 $stmt19->bindParam('fecha',$fechadelDia  , PDO::PARAM_STR);
	 $stmt19->bindParam('IDEmpresa',$IDempresa  , PDO::PARAM_STR);
	 if (!$stmt19->execute()){

	 	echo "No se ha podido guardar el conteo de reportes";
	 }


	}
	//fIN DEL BLOQUE DEL REPORTE


header('Location: ../../seguimiento-candidato?success=1&user='.$nombreCandidato.'&id='.base64_encode($IDUserCandidatos.''));


}else{

	header('Location: ../../cv?id='.base64_encode($IDUserCandidatos).'&success=0');

}

}


?>