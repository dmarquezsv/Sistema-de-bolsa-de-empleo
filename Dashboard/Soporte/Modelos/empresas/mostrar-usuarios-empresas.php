<?php 


include '../../../../BD/Conexion.php';
include_once '../../../../BD/Consultas.php';
$Conexion = new Consultas();
include_once '../../../../main/funcionesApp.php';
$FuncionesApp = new funcionesApp();

$sql="SELECT E.IDEmpresa, C.IDUsuario , C.Nombre , Apellidos , Correo, C.Estado ,E.Celular ,E.Nombre AS 'Empresa' ,TE.Area AS 'TipoEmpresa' , E.lugar , FechaRegistro ,UltimaConexion ,E.estado FROM usuarios_cuentas C LEFT JOIN empresa_perfil E ON C.IDUsuario = E.IDUsuario LEFT JOIN soporte_tipo_empresa TE ON E.IDTipoEmpresa = TE.IDTipoEmpresa WHERE Cargo ='Empresa'";
$stmt =  Conexion::conectar()->prepare($sql);
$stmt->execute();
$clientes = array(); //creamos un array
while ($item=$stmt->fetch())
{
	$ID = $item['IDUsuario'];
	$nombre =  $item['Nombre'];
	$apellidos = $item['Apellidos'];
	$NombresCompleto =$nombre;
	$ApellidosCompleto = $apellidos;
	$email = $item['Correo'];
	$estadoCuenta = $item['Estado'];

	if ($item['Celular']== "") {
		$celular = "<center>---</center>";
	}else{
		$celular =  $item['Celular'];	
	}
	
	if ($item['Empresa']== "") {
		$Empresa = "<center>---</center>";
	}else{
		$Empresa =  $item['Empresa'];	
	}


	if ($item['TipoEmpresa']== "") {
		$TipoEmpresa = "<center>---</center>";
	}else{
		$TipoEmpresa = $item['TipoEmpresa'];
	}
	
	if ($item['lugar']== "") {
		$Lugar = "<center>---</center>";
	}else{
		$Lugar = $item['lugar'];
	}
	
	$fecharegistro = $item['FechaRegistro'];
	$UltimaConexion = $item['UltimaConexion'];

	if ($item['estado']== "") {
		$estadoempresa = "<center>---</center>";
	}else{
		$estadoempresa = $item['estado'];
	}
	

	


	if($item['Empresa'] == ""){

		$perfilEmpresa = '<center><a href="crear-perfil-empresa?id='.base64_encode($item['IDUsuario']).'&email='.$email.'" class="btn btn-alt-primary text-center" data-toggle="tooltip" title="Crear perfil empresa" data-original-title="Crear perfil empresa"> <i class="fa fa-pencil-square-o"></i></a><center>';
	}else{

		$perfilEmpresa = '<center><a href="empresa?iduser='.base64_encode($item['IDUsuario']).'&idempresa='.base64_encode($item['IDEmpresa']).'" class="btn btn-alt-primary text-center" data-toggle="tooltip" title="Ver Perfil completo" data-original-title="Ver Perfil completo"> <i class="fa fa-building-o"></i></a><center>';
	}

	

	$clientes[] = array("ID"=>$ID,'nombres'=> $NombresCompleto, 'apellidos'=>$ApellidosCompleto,'email'=> $email,'celular'=> $celular ,'estadoCuenta'=>$estadoCuenta ,'empresa'=> $Empresa ,'tipoEmpresa'=> $TipoEmpresa,'lugar'=> $Lugar ,'fecharegistro'=> $fecharegistro,'UltimaConexion'=> $UltimaConexion,'estadoempresa'=> $estadoempresa,'perfilEmpresa'=> $perfilEmpresa);

}

//Creamos el JSON
print json_encode($clientes, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX

?>