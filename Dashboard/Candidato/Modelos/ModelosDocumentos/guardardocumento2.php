<?php  
include_once '../../../../BD/Conexion.php';
include_once '../../../../BD/Consultas.php';
include_once '../../../../main/funcionesApp.php';
$Conexion = new Consultas();
$FuncionesApp = new funcionesApp();
session_start(); 

if(isset($_POST["Guardar"])){



	$NombreArchivo = $FuncionesApp->test_input($_POST['nombre']);
	$NombreArchivo .=".pdf";
	$IDusuario = $FuncionesApp->test_input($_POST['Iduser']);
	$tipoarchivo = $_FILES["archivo"]["type"];
	$tamañoarchivo = $_FILES["archivo"]["size"];
	$rutaarchivo = $_FILES["archivo"]["tmp_name"];
	$destino = "../../../../documentos/documentos_usuarios/".$IDusuario."/";

	$sql2="SELECT COUNT(`IDDocumento`) AS 'ResultDocumento' FROM `usuarios_documentos` WHERE `Documento` = ? AND IDUsuario = ?";
	$stmt2 =  Conexion::conectar()->prepare($sql2);
	$stmt2->execute(array($NombreArchivo,$IDusuario));
	
	while ($item=$stmt2->fetch()){
		$ResultDocumento = $item['ResultDocumento'];
	}

	if ($ResultDocumento == 1) {

		$_SESSION['alertas'] = "Advertenicia";
		$_SESSION['ms'] = "Existe un archivo con ese mismo nombre " .$NombreArchivo." intente con otro";
		header('Location: ../../documentos');
	}else{

		if(!file_exists($destino)){
			mkdir($destino);
		}

		$destino .= $NombreArchivo;

		$sql ="INSERT INTO `usuarios_documentos` (`IDUsuario`,  `Documento`) VALUES (:IDUsuario ,:Documento)";
		$stmt =  Conexion::conectar()->prepare($sql);
		$stmt->bindParam(':IDUsuario', $IDusuario , PDO::PARAM_STR);
		$stmt->bindParam(':Documento', $NombreArchivo , PDO::PARAM_STR);
		if ($stmt->execute()){

			if(copy($rutaarchivo, $destino)){
		

					$_SESSION['alertas'] = "Mensaje";
					$_SESSION['ms'] = "Se ha agregado el documento";

					header('Location: ../../documentos-usuario');	
				
				
			}else{
				$_SESSION['alertas'] = "Fallo";
				header('Location: ../../documentos-usuario');
			}
		}else
		{
			$_SESSION['alertas'] = "Fallo";
			header('Location: ../../documentos-usuario');	
		}
	}
	
}


?>