<?php 

include_once '../../../../BD/Conexion.php';
include_once '../../../../BD/Consultas.php';
include_once '../../../../main/funcionesApp.php';
$FuncionesApp = new funcionesApp();

session_start(); 
$IDUser = $FuncionesApp->test_input($_POST['IduserPerfil']);	
$imgNombre = $FuncionesApp->test_input($_POST['imgperfilObtenido']);


	$destino = "../../../../assets/img/user/".$imgNombre;
	unlink($destino);


$img="avatar15.jpg";

//Actualizamos en la base de datos la foto
$sql = "UPDATE `usuarios_cuentas` SET `Foto` = :Foto WHERE `IDUsuario` = :IDUsuario";
$stmt =  Conexion::conectar()->prepare($sql);
$stmt->bindParam(':Foto', $img , PDO::PARAM_STR);
$stmt->bindParam(':IDUsuario', $IDUser , PDO::PARAM_STR);

if ($stmt->execute()){

	$resultadoimg = @move_uploaded_file($_FILES["imgusu"]["tmp_name"], $nombreimg);
	$_SESSION['alertas'] = "Mensaje";
	$_SESSION['ms'] = "Se ha actualizado la imagen: Algunas veces no se refleja al instante vuelva iniciar sesión o borre el cache del navegador";
	$_SESSION['foto'] = null;
	$_SESSION['foto'] = "";
	$_SESSION['foto'] = $img;
	header('Location: ../../index');

}else{

	$_SESSION['alertas'] = "Fallo";
	header('Location: ../../index');
}

?>