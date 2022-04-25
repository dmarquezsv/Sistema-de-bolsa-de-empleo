<?php  
include_once '../../../../BD/Conexion.php';
include_once '../../../../BD/Consultas.php';
include_once '../../../../main/funcionesApp.php';
$FuncionesApp = new funcionesApp();

$sql = "SELECT IDpostulaciones, EP.Nombre 'Empresa',EP.logo , EP.Confidencial ,Plaza, OT.Expira FROM empresa_ofertas_trabajos OT INNER JOIN empresa_perfil EP ON OT.IDEmpresa = EP.IDEmpresa WHERE OT.FechaPublicacion <= ? AND OT.Expira >= ? ORDER BY `OT`.`IDpostulaciones` DESC ";
$fechaActual =date("Y-m-d");

$salida = "";

$stmt =  Conexion::conectar()->prepare($sql);

if ($stmt->execute(array($fechaActual,$fechaActual))){

	if ($stmt->rowCount()>0){
		$N = 1;

		$salida.=' <table class="table table-striped table-bordered js-dataTable-full-pagination">
		<thead>
		<tr>
		<th class="text-center">#</th>
		<th>Logo</th>
		<th>Empresa</th>
		<th>Plaza</th>
		<th>Expira</th>
		<th>Opción</th>
		</tr>
		</thead>
		<tbody>';


		while ($item=$stmt->fetch())
		{
			if ($item['Confidencial'] == "Si") {
				$PefilFoto = '<center><img src="../../main/img/LogosEmpresas/confidential.png" " style="width: 75%; height: 100px;"></center>';
			}else{
				$PefilFoto = '<center><img src="../../main/img/LogosEmpresas/'.$item['logo'].'" style="width: 75%; height: 100px;"></center>';
			}

			if ($item['Confidencial'] == "Si") {
				$NombreEmpresa = 'Confidencial';
			}else{
				$NombreEmpresa = $item['Empresa'];
			}

			$salida.=' <tr>
			<td>'.$N.'</td>
			<td>'.$PefilFoto.'</td>
			<td>'.$NombreEmpresa.'</td>
			<td>'.$item['Plaza'].'</td>
			<td>'.$item['Expira'].'</td>
			<td>
			<a href="../../oferta_trabajo?id='.base64_encode($item['IDpostulaciones']).'" class="btn btn-lg btn-block btn-secondary" data-toggle="tooltip" title="Ver perfil de empresa" target="_blank"> <i class="fa fa-briefcase"></i> Ver oferta</a>
			</td>
			</tr>';
			$N++;

		}

		$salida.="</tbody></table>";

	}else{

		$salida = "No hay datos :(";
	}

}else{
	echo "Problema para ejectar la consulta";
}

echo $salida;


?>