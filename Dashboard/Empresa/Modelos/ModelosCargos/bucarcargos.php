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
		
		$existeCargo = $_POST['existeCargo'];
		$existeNombreCargo = $_POST['existeNombreCargo'];

        $salida.="<label class='col-12' for='cargo'>Seleccione el cargo desempeñado*</label>";
		$salida.="<select name='idCargo'  id='idCargo' style='width: 100%;' class='form-control'>";
		
		if($existeCargo !="" &&  $existeNombreCargo !=""){ 

			$salida.="<option value=".$existeCargo.">".$existeNombreCargo."</option>";
		}else{
			$salida.="<option select value='' disable >Seleccione una opción</option>";	
		}


		while($item2=$stmt->fetch()){

			if($item2['IDDesempenado'] == $existeCargo){

			}else{
				$salida.="<option value=".$item2['IDDesempenado'].">".$item2['nombre']."</option>";
			}

			
		}

		$salida.=" </select>";
	

		

	echo $salida;


}else{

	$salida='<input type="text" value="Seleccione la área de trabajo" disabled class="form-control">';
	echo $salida;
}


?>