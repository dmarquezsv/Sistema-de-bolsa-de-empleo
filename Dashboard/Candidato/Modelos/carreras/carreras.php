<?php 
include '../../../../BD/Conexion.php';

$salida = "";
$sql = "";
$result ="";

if ( $_POST['IDCarrera'] !="" && $_POST['NombreCarrera'] !="") {

	$dato = $_POST['consulta'];
	$id = $_POST['IDCarrera'];
	$nombre = $_POST['NombreCarrera'];

	$sql = "SELECT `Id_Carrera` , `nombre` FROM `carrera` WHERE `ID_Facultades` = ? ORDER BY `carrera`.`nombre` ASC  ";
	$stmt =  Conexion::conectar()->prepare($sql);
	
	if (!$stmt->execute(array($dato))) {
		die("El error de Conexión es ejecutar_consulta_simple");
	}
	
	$salida.="<div class='form-group row'> <label class='col-12'>Seleccione la carrera *</label> <div class='col-12'>";
	
	$salida.="<select name='carrera1'  id='carrera1' style='width: 100%;' class='form-control'>";
	$salida.="<option select value='".$id."'  >".$nombre."</option>";

	while($item2=$stmt->fetch()){
		$salida.="<option value=".$item2['Id_Carrera'].">".$item2['nombre']."</option>";
	}

	$salida.=" </select>";
	
	$salida.="</div></div>";

		echo $salida;

}else{

	$dato = $_POST['consulta'];

	$sql = "SELECT `Id_Carrera` , `nombre` FROM `carrera` WHERE `ID_Facultades` = ? ORDER BY `carrera`.`nombre` ASC  ";
	$stmt =  Conexion::conectar()->prepare($sql);
	
	if (!$stmt->execute(array($dato))) {
		die("El error de Conexión es ejecutar_consulta_simple");
	}
	
	$salida.="<div class='form-group row'> <label class='col-12'>Seleccione la carrera *</label> <div class='col-12'>";
	
	$salida.="<select name='carrera1'  id='carrera1' style='width: 100%;' class='form-control'>";
	$salida.="<option select value='' disable >Seleccione una opción</option>";

	while($item2=$stmt->fetch()){
		$salida.="<option value=".$item2['Id_Carrera'].">".$item2['nombre']."</option>";
	}

	$salida.=" </select>";
	
	$salida.="</div></div>";


	echo $salida;

	


	

}

?>