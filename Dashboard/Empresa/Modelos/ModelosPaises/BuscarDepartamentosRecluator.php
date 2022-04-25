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
	

        $salida.="<label class='col-12' for='Dapartamento'>Departamento</label>";
		$salida.="<select name='IDDepartemento'  id='IDDepartemento' style='width: 100%;' class='form-control'>";
		$salida.="<option select value='' disable >Seleccione</option>";
		$salida.="<option select value='Indiferente' >Indiferente</option>";
		while($item2=$stmt->fetch()){
			$salida.="<option value=".$item2['IDDepartamento'].">".$item2['Nombre']."</option>";
		}

		$salida.=" </select>";
	

		

	echo $salida;


}else{

        $salida.="<label class='col-12' for='Dapartamento'>Departamento</label>";
		$salida.="<select name='IDDepartemento'  id='IDDepartemento' style='width: 100%;' class='form-control' disabled>";
		$salida.="<option select value='' disable >Seleccione</option>";
		$salida.=" </select>";
	

		

	echo $salida;
}


?>