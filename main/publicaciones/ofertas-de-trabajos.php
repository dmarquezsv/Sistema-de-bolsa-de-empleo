<?php 

include_once '../../BD/Conexion.php';
include_once '../../BD/Consultas.php';
include_once '../../main/funcionesApp.php';

$Conexion = new Consultas();
$FuncionesApp = new funcionesApp();

if($_POST['buscar'] == "buscar"){


	$concatenarConsulta="";

	if ($_POST['pais']!=null ) {

		$concatenarConsulta.=" AND P.IDPais =".$_POST['pais'];
	}

	if($_POST['palabraClave']!=null){

		$buscarCargo = $_POST['palabraClave'];
		$concatenarConsulta.=" AND Plaza LIKE '%$buscarCargo%'";  

	}


	if ($_POST['evaluarcategoria']!=null ) {

		if ($_POST['evaluarcategoria'] == "Indiferente") {

			$concatenarConsulta.="";

		}else{
			$concatenarConsulta.=" AND T.IDCategoria =".$_POST['evaluarcategoria'];	
		}

		
	}



	if ($_POST['evaluarExperiencia']!=null ) {

		if ($_POST['evaluarExperiencia'] == "Indiferente") {

			$concatenarConsulta.="";

		}else{

			$concatenarConsulta.=" AND OT.IDAreaExperiencia =".$_POST['evaluarExperiencia'];
		}
	}


	if ($_POST['evaluarcargo']!=null ) {

		if ($_POST['evaluarcargo'] == "Indiferente") {

			$concatenarConsulta.="";

		}else{

			$concatenarConsulta.=" AND OT.IDDesempenado =".$_POST['evaluarcargo'];
		}
	}
	
	$fechaActual =date("Y-m-d");

	$sql = "SELECT OT.IDpostulaciones, TipoContratacion ,EP.IDEmpresa ,EP.Nombre AS 'NombreEMPRESA'  , TE.Area ,EP.Confidencial , P.Nombre AS 'Pais' , PD.Nombre 'Departamento' , T.Nombre AS 'Categoria' , CD.nombre AS 'Desempeno' , `Plaza` , OT.Descripcion , `FechaPublicacion` , OT.Expira , OT.Estado FROM empresa_ofertas_trabajos OT INNER JOIN empresa_perfil EP ON OT.IDEmpresa = EP.IDEmpresa LEFT JOIN soporte_tipo_empresa TE ON EP.IDTipoEmpresa = TE.IDTipoEmpresa LEFT JOIN soporte_paises P ON OT.IDPais = P.IDPais LEFT JOIN soporte_paises_departamento PD ON OT.IDDepartamento = PD.IDDepartamento LEFT JOIN soporte_areas_trabajos T ON OT.IDCategoria = T.IDCategoria LEFT JOIN soporte_cargos_desempenado CD ON OT.IDDesempenado = CD.IDDesempenado LEFT JOIN soporte_tipo_experiencia Exp ON OT.IDAreaExperiencia = Exp.IDAreaExperiencia WHERE OT.`Estado` = 'Activo' AND OT.FechaPublicacion <= ? AND OT.Expira >= ? ".$concatenarConsulta." ORDER BY `OT`.`IDpostulaciones` DESC ";

	$stmt =  Conexion::conectar()->prepare($sql);
	if (!$stmt->execute(array($fechaActual , $fechaActual))) {
		die("El error de Conexión es ejecutar_consulta_simple");
	}

	$ofertas = array(); //creamos un array

	while ($item=$stmt->fetch())
	{	
		$confidencial = $item['Confidencial'];

		$empresa="";
		
		if ($confidencial == "Si"){
			$empresa = "Confidencial";
		}else{
			$empresa = $item['NombreEMPRESA'];
		}
		

		$IDpostulaciones = $item['IDpostulaciones'];
		$plaza = $item['Plaza'];
		$pais = $item['Pais'] ." - ". $item['Departamento'];
		$expira = $item['Expira'];
		$categoria = $item['Categoria'];
		$cargo = $item['Desempeno'];
		$TipoContratacion = $item['TipoContratacion'];

		$enlace = '<a href="oferta_trabajo?id='.base64_encode($IDpostulaciones).'"  class="btn btn-primary text-center boton" data-toggle="tooltip" title="Ver Perfil del candidato" data-original-title="Ver Perfil del candidato"  target="_blank">Ver Oferta</a>';

		$ofertas[] = array('empresa'=> $empresa,'plaza'=> $plaza , 'pais' => $pais , 'expira'=> $expira , 'categoria'=>$categoria, 'cargo'=>$cargo ,"TipoContratacion" => $TipoContratacion ,'enlace'=> $enlace);
	}

	print json_encode($ofertas, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX


	



}
else{


	$fechaActual =date("Y-m-d");

	$sql = "SELECT OT.IDpostulaciones , `TipoContratacion` , EP.IDEmpresa ,EP.Nombre AS 'NombreEMPRESA'  , TE.Area ,EP.Confidencial , P.Nombre AS 'Pais' , PD.Nombre 'Departamento' , T.Nombre AS 'Categoria' , CD.nombre AS 'Desempeno' , `Plaza` , OT.Descripcion , `FechaPublicacion` , OT.Expira , OT.Estado FROM empresa_ofertas_trabajos OT INNER JOIN empresa_perfil EP ON OT.IDEmpresa = EP.IDEmpresa LEFT JOIN soporte_tipo_empresa TE ON EP.IDTipoEmpresa = TE.IDTipoEmpresa LEFT JOIN soporte_paises P ON OT.IDPais = P.IDPais LEFT JOIN soporte_paises_departamento PD ON OT.IDDepartamento = PD.IDDepartamento LEFT JOIN soporte_areas_trabajos T ON OT.IDCategoria = T.IDCategoria LEFT JOIN soporte_cargos_desempenado CD ON OT.IDDesempenado = CD.IDDesempenado LEFT JOIN soporte_tipo_experiencia Exp ON OT.IDAreaExperiencia = Exp.IDAreaExperiencia WHERE OT.`Estado` = 'Activo' AND OT.FechaPublicacion <= ? AND OT.Expira >= ? ORDER BY `OT`.`IDpostulaciones` DESC ";

	$stmt =  Conexion::conectar()->prepare($sql);
	if (!$stmt->execute(array($fechaActual , $fechaActual))) {
		die("El error de Conexión es ejecutar_consulta_simple");
	}

	$ofertas = array(); //creamos un array

	while ($item=$stmt->fetch())
	{	
		$confidencial = $item['Confidencial'];

		$empresa="";
		
		if ($confidencial == "Si"){
			$empresa = "Confidencial";
		}else{
			$empresa = $item['NombreEMPRESA'];
		}
		

		$IDpostulaciones = $item['IDpostulaciones'];
		$plaza = $item['Plaza'];
		$pais = $item['Pais'] ." - ". $item['Departamento'];
		$expira = $item['Expira'];
		$categoria = $item['Categoria'];
		$cargo = $item['Desempeno'];
		$TipoContratacion = $item['TipoContratacion'];

		$enlace = '<a href="oferta_trabajo?id='.base64_encode($IDpostulaciones).'"  class="btn btn-primary text-center boton" data-toggle="tooltip" title="Ver la oferta de trabajo" data-original-title="Ver la oferta de trabajo"  target="_blank">Ver Oferta</a>';

		$ofertas[] = array('empresa'=> $empresa,'plaza'=> $plaza , 'pais' => $pais , 'expira'=> $expira , 'categoria'=>$categoria, 'cargo'=>$cargo ,"TipoContratacion" => $TipoContratacion ,'enlace'=> $enlace);
	}

	print json_encode($ofertas, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX



}




?>