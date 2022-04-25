<?php  

include_once '../../../../BD/Conexion.php';
include_once '../../../../BD/Consultas.php';
include_once '../../../../main/funcionesApp.php';
$FuncionesApp = new funcionesApp();
$USERID=base64_decode($_POST['usuario']);
$IDusuario = $FuncionesApp->test_input($USERID);
$IDempresa = $FuncionesApp->test_input($_POST['empresa']);
$IDSeleccion = $FuncionesApp->test_input($_POST['seguimiento']);
$Comentario= $_POST['comentario'];
$fechaActual =date("Y-m-d");

$sql="INSERT INTO `proceso_seleccion_candidato` (`IDUsuario`, `IDEmpresa`, `IDSeleccion`, `Comentario`, `fecha_registro`) VALUES (:IDUsuario,:IDEmpresa,:IDSeleccion,:Comentario,:fecha_registro) ";

$stmt =  Conexion::conectar()->prepare($sql);
$stmt->bindParam('IDUsuario', $IDusuario , PDO::PARAM_STR);
$stmt->bindParam('IDEmpresa', $IDempresa , PDO::PARAM_STR);
$stmt->bindParam('IDSeleccion', $IDSeleccion , PDO::PARAM_STR);
$stmt->bindParam('Comentario', $Comentario , PDO::PARAM_STR);
$stmt->bindParam('fecha_registro', $fechaActual , PDO::PARAM_STR);

if ($stmt->execute()){

	//vERIFICA SI EXISTE UN REPORTE CON LA FECHA ACTUAL SI ES CERO CREA EL  REPORTE  SI ES 1 INCREMENTA CONTADOR DE VISITAS
	$sql18="SELECT COUNT(`Reporte_Seguimiento`) AS 'FechaDelDia' FROM reporte_seguimiento WHERE `fecha` = ? AND `IDEmpresa` = ? AND `IDSeleccion` = ?";
	$stmt18 =  Conexion::conectar()->prepare($sql18);
	$fechadelDia =date("Y-m-d");

	$stmt18->execute(array($fechadelDia, $IDempresa , $IDSeleccion));
	while ($item=$stmt18->fetch()){

		$ResultReporteDelDia = $item['FechaDelDia'];
	}
    
    //Este bloque sirve para realizar los reportes para las empresas por lo tanto
//realiza el conteo de visitas de los perfiles visto por fechas 
	if($ResultReporteDelDia == 0){

		$sql19="INSERT INTO `reporte_seguimiento` (`IDSeleccion`, `IDEmpresa`, `contador`, `fecha`) VALUES (:IDSeleccion, :IDEmpresa, '1',:fecha)";
		$stmt19 =  Conexion::conectar()->prepare($sql19);
		$stmt19->bindParam('IDSeleccion',$IDSeleccion  , PDO::PARAM_STR);
		$stmt19->bindParam('IDEmpresa',$IDempresa  , PDO::PARAM_STR);
		$stmt19->bindParam('fecha',$fechadelDia  , PDO::PARAM_STR);
		if (!$stmt19->execute()){

			echo "No se ha podido guardar el conteo de reportes";
		}

	}
	else{

		 //Realizamos una consulta para buscar  el conteo  con su respectivo fecha y empresa. La opcion sera perfiles vistos por dia
		$sql20="SELECT `contador` FROM reporte_seguimiento WHERE `fecha` = ?  AND `IDEmpresa` = ? AND `IDSeleccion` = ?";
		$stmt20 =  Conexion::conectar()->prepare($sql20);
		$stmt20->execute(array($fechadelDia, $IDempresa,$IDSeleccion));
		while ($item=$stmt20->fetch()){

    		$contador = $item['contador']; // resultado del contado de visitas
    	}

 		$incremento = $contador + 1; // el aumento en 1 por cada visitas

 		$sql19="UPDATE `reporte_seguimiento` SET `contador`= :contador WHERE `fecha` = :fecha  AND `IDEmpresa` = :IDEmpresa AND `IDSeleccion` = :IDSeleccion";
 		$stmt19 =  Conexion::conectar()->prepare($sql19);
 		$stmt19->bindParam('contador',$incremento  , PDO::PARAM_STR);
 		$stmt19->bindParam('fecha',$fechadelDia  , PDO::PARAM_STR);
 		$stmt19->bindParam('IDEmpresa',$IDempresa  , PDO::PARAM_STR);
 		$stmt19->bindParam('IDSeleccion',$IDSeleccion  , PDO::PARAM_STR);
 		if (!$stmt19->execute()){

 			echo "No se ha podido guardar el conteo de reportes";
 		}



 	}
	


 	echo "1";

 }else{

 	echo "0";

 }




 ?>