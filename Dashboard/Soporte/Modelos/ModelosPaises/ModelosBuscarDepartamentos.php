<?php 

include '../../../../BD/Conexion.php';

$salida = "";
$sql = "";
$result ="";

if (isset($_POST['consulta'])) {

	$dato = $_POST['consulta'];
    
    $sql = "SELECT IDDepartamento ,PD.Nombre FROM soporte_paises_departamento PD INNER JOIN soporte_paises P ON PD.IDPais = P.IDPais WHERE P.IDPais  = ?";
	$stmt =  Conexion::conectar()->prepare($sql);
	
	if (!$stmt->execute(array($dato))) {
		die("El error de Conexión es ejecutar_consulta_simple");
	}
	
		if ($stmt->rowCount()>0){

		$existeDepartamento = $_POST['existeDepartamento'];
		$existeNombreDepartamento = $_POST['nombreDepartamento'];

        $salida.="<label class='col-12' for='Dapartamento'>Seleccione su departamento de origen*</label>";
		$salida.="<select name='IDDepartemento'  id='IDDepartemento'  class='form-control'>";

		if($existeDepartamento !="" &&  $existeNombreDepartamento !=""){ 

			$salida.="<option value=".$existeDepartamento.">".$existeNombreDepartamento."</option>";
		}else{
			$salida.="<option select value='' disable >Seleccione una opción</option>";	
		}

		

		while($item2=$stmt->fetch()){
			if($item2['IDDepartamento'] == $existeDepartamento){

			}else{
				$salida.="<option value=".$item2['IDDepartamento'].">".$item2['Nombre']."</option>";	
			}
			
		}

		$salida.=" </select>";
	}
	else{
		
		$salida.= '<input type="hidden" name="IDDepartemento" id="IDDepartemento"  class="form-control"  value="87">';
	}
	

		

	echo $salida;


}else{

	$salida='<input type="text" class="form-control" name="IDDepartemento" id="IDDepartemento" value="Seleccione un departamento" disabled>';
	echo $salida;
}


?>

