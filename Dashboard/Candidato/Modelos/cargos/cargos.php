<?php 

include '../../../../BD/Conexion.php';

$salida = "";
$sql = "";
$result ="";



if (!$_POST['consulta'] ==""  && !$_POST['IDCargo'] == "" && !$_POST['NombreCargo'] =="") {
	
	$dato = $_POST['consulta'];
	$idCargo = $_POST['IDCargo'];
	$NombreCargo = $_POST['NombreCargo'];

	$sql = "SELECT * FROM `soporte_cargos_desempenado` WHERE `IDCategoria` = ? ORDER BY `soporte_cargos_desempenado`.`nombre` ASC ";
	$stmt =  Conexion::conectar()->prepare($sql);
	
	if (!$stmt->execute(array($dato))) {
		die("El error de Conexión es ejecutar_consulta_simple");
	}
	

	
	$salida.="<select name='cargo'  id='cargo' style='width: 100%;' class='form-control'>";
	$salida.="<option select value='".$idCargo."'  >".$NombreCargo."</option>";

	while($item2=$stmt->fetch()){
		$salida.="<option value=".$item2['IDDesempenado'].">".$item2['nombre']."</option>";
	}

	$salida.=" </select>";
	
	echo $salida;
	

}else if($_POST['consulta'] !="")
{
	$dato = $_POST['consulta'];

	$sql = "SELECT * FROM `soporte_cargos_desempenado` WHERE `IDCategoria` = ? ORDER BY `soporte_cargos_desempenado`.`nombre` ASC ";
	$stmt =  Conexion::conectar()->prepare($sql);
	
	if (!$stmt->execute(array($dato))) {
		die("El error de Conexión es ejecutar_consulta_simple");
	}
	
	$salida.="<select name='cargo'  id='cargo' style='width: 100%;' class='form-control'>";
	$salida.="<option select value='' disable >Seleccione una opción</option>";

	while($item2=$stmt->fetch()){
		$salida.="<option value=".$item2['IDDesempenado'].">".$item2['nombre']."</option>";
	}

	$salida.=" </select>";
	



	echo $salida;

}else{

	$salida='<input type="text" class="form-control" name="mostrarCargo" id="mostrarCargo" value="Seleccione una área" disabled>';
	echo $salida;
}



?>