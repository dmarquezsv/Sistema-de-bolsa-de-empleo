<?php 

include '../../../../BD/Conexion.php';

$salida = "";
$sql = "";
$result ="";

if (isset($_POST['consulta'])) {

	$dato = $_POST['consulta'];
    
    $sql = "SELECT * FROM `soporte_cargos_desempenado` WHERE `IDCategoria` = ? ORDER BY `soporte_cargos_desempenado`.`nombre` ASC ";
	$stmt =  Conexion::conectar()->prepare($sql);
	
	if (!$stmt->execute(array($dato))) {
		die("El error de Conexión es ejecutar_consulta_simple");
	}
	

        $salida.="<label class='col-12' for='cargo'>Seleccione el cargo desempeñado*</label>";
		$salida.="<select name='idCargo'  id='idCargo' style='width: 100%;' class='form-control'>";
		$salida.="<option select value='' disable >Seleccione una opción</option>";

		while($item2=$stmt->fetch()){
			$salida.="<option value=".$item2['IDDesempenado'].">".$item2['nombre']."</option>";
		}

		$salida.=" </select>";
	

		

	echo $salida;


}


?>