<?php 

include_once '../../../../BD/Conexion.php';
include_once '../../../../BD/Consultas.php';
include_once '../../../../main/funcionesApp.php';

$FuncionesApp = new funcionesApp();
session_start(); 


if (isset($_POST['cuantas'])) {

	$idusuari = $_POST['user'];
	$sql = "SELECT COUNT(`IDNotificacion`) 'TotalNotificaiones' FROM `notificaciones` WHERE `IDUsuario` = ? AND `EstadoSolicitud` = 'Enviado' ";
	$stmt =  Conexion::conectar()->prepare($sql);
	$stmt->execute(array($idusuari));

	while ($item=$stmt->fetch()){

		$TotalNotificaiones = $item['TotalNotificaiones'];
	}

	echo $TotalNotificaiones;

}

if (isset($_POST['datos'])) {

	$idusuario2 = $_POST['user2'];
	$sql2 = "SELECT  IDNotificacion, EstadoSolicitud ,`Tipo` , `idSolicitud` , `FechaHora` , `Descripcion` FROM `notificaciones` WHERE `IDUsuario` = ? AND `EstadoSolicitud` = 'Enviado' ORDER BY `notificaciones`.`FechaHora` DESC ";
	$stmt2 =  Conexion::conectar()->prepare($sql2);
	$stmt2->execute(array($idusuario2));

	while ($item2=$stmt2->fetch()){

		if($item2['Tipo'] == "Solicitud-Pago"){
			
			echo '<li><a class="text-body-color-dark media mb-15" href="inbox?solicitud='.base64_encode($item2['IDNotificacion']).'&estado='.base64_encode($item2['EstadoSolicitud']).'">
			<div class="ml-5 mr-15"><i class="fa fa-user text-success"></i></div>
			<div  class="media-body pr-10">
			<p class="mb-15"><b>Tipo de mensaje: <br>'.$item2['Tipo'].'</b></p>
			<p class="mb-0">'.$item2['Descripcion'].'</p>
			<div class="text-muted font-size-sm font-italic">'.$item2['FechaHora'].'</div>
			</div></a></li>
			<hr>';

		}else if($item2['Tipo'] == "Perfil-Actualizado"){

			echo '<li><a class="text-body-color-dark media mb-15" href="inbox?solicitud='.base64_encode($item2['IDNotificacion']).'&estado='.base64_encode($item2['EstadoSolicitud']).'">
			<div class="ml-5 mr-15"><i class="fa fa-user text-success"></i></div>
			<div  class="media-body pr-10">
			<p class="mb-15"><b>Tipo de mensaje: <br>'.$item2['Tipo'].'</b></p>
			<p class="mb-0">'.$item2['Descripcion'].'</p>
			<div class="text-muted font-size-sm font-italic">'.$item2['FechaHora'].'</div>
			</div></a></li>
			<hr>';

		}
		else if($item2['Tipo'] == "Mensaje-Visto"){

			echo '<li><a class="text-body-color-dark media mb-15" href="inbox?solicitud='.base64_encode($item2['IDNotificacion']).'&estado='.base64_encode($item2['EstadoSolicitud']).'">
			<div class="ml-5 mr-15"><i class="fa fa-user text-success"></i></div>
			<div  class="media-body pr-10">
			<p class="mb-15"><b>Tipo de mensaje: <br>'.$item2['Tipo'].'</b></p>
			<p class="mb-0">'.$item2['Descripcion'].'</p>
			<div class="text-muted font-size-sm font-italic">'.$item2['FechaHora'].'</div>
			</div></a></li>
			<hr>';

		}
		
		
	}

}


?>