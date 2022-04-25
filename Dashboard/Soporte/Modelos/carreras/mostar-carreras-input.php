<?php  

include '../../../../BD/Conexion.php';

$salida = "";
$sql = "";
$result ="";

if (isset($_POST['consulta'])) {

	$dato = $_POST['consulta'];

	$sql = "SELECT `Id_Carrera` , `nombre` FROM `carrera` WHERE `ID_Facultades` = ? ORDER BY `carrera`.`nombre` ASC  ";
	$stmt =  Conexion::conectar()->prepare($sql);
	
	if (!$stmt->execute(array($dato))) {
		die("El error de Conexión es ejecutar_consulta_simple");
	}
	

	$salida.="<label class='col-12' for='Carrera'>Seleccione la Carrera*</label>";
	$salida.="<select name='carrera1'  id='carrera1' style='width: 100%;' class='form-control'>";
	$salida.="<option select value='' disable >Seleccione una opción</option>";

	while($item2=$stmt->fetch()){
		$salida.="<option value=".$item2['Id_Carrera'].">".$item2['nombre']."</option>";
	}

	$salida.=" </select>";
	



	echo $salida;


}else{

	$salida.="<label class='col-12' for='Carrera'>Carrera</label>";
	$salida.="<select name='carrera1'  id='carrera1' style='width: 100%;' class='form-control' disabled>";
	$salida.="<option select value='' disable >Seleccione</option>";
	$salida.=" </select>";
	



	echo $salida;
}




?>