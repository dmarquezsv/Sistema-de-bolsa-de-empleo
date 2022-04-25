<?php  

include_once '../../../../BD/Conexion.php';
include_once '../../../../BD/Consultas.php';
include_once '../../../../main/funcionesApp.php';

$FuncionesApp = new funcionesApp();




if (isset($_POST['Guardar'])) {
	session_start(); 
	$IDUser = $FuncionesApp->test_input($_POST['Iduser']);	
	$imgNombre = $FuncionesApp->test_input($_POST['imgperfil']);

	if($_FILES["imgusu"]["error"]>0){

		header('Location: ../../index');
		$_SESSION['alertas'] = "Advertenicia";
		$_SESSION['ms'] = "No has selecciona el archivo";
	}else{

		if($imgNombre != "avatar15.jpg")
		{
			$destino = "../../../../assets/img/user/".$imgNombre;
			unlink($destino);
		}

		 //Si entra aqui es porqueno tenemos ningun error
		$tipoimg = array("image/jpg","image/png","image/jpeg");
		 //verifica con la funcion in_array si el tipo de la imagen es igual a algun tipo de dato en la variable $tipoimg
		if(in_array($_FILES["imgusu"]["type"], $tipoimg)){

			 //hacemos referencia a la ruta donde guardaremos la imagen
			$rutaimg = '../../../../assets/img/user/';

            //guardamos la extencion de la imagen
			$extensionimg = explode("/",$_FILES["imgusu"]["type"]);

            //se genera un numero de 5 cifras para renombrar la imagen
            //esto es opcional porque esto lo utilice para mis imagenes
			$d="0".$IDUser;

            //en la variable $nombreimg concatenamos toda la ruta y el nombre de la imagen para
            //que no se escriba si hay otra imagen con el mismo nombre en esa ruta
			$nombreimg = $rutaimg . "img" .$d . "." . $extensionimg[1];

            //guardamos solo el nombre de la imagen con su extencion
			$img = "img" . $d . "." . $extensionimg[1];

            //verificamos si existe la carpeta /img y si no existe se crea
			if(!file_exists($rutaimg)){
				mkdir($rutaimg);
			}

			  //verificamos si existe una imagen con 
			if(!file_exists($nombreimg)){               
                //guardando el nombre de la imagen en la base de datos

                //copiano la imagen con la funcion @move_uploaded_file()
                //y como parametros le pasamos la imagen que subio el usuario
                //y como segundo parametro toda la ruta hasta con el nombre de la imagen para que la guarde
				

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
					header('Location: ../../perfil');
				}

				

			}else{
				
				$_SESSION['alertas'] = "Advertenicia";
				$_SESSION['ms'] = "Existe una imagen con el mismo nombre generado";
				header('Location: ../../index');
			}


		}else{

			$_SESSION['alertas'] = "Advertenicia";
			$_SESSION['ms'] = "No se pude cambiar la imagen ya que no esta con una extencion valida";
			header('Location: ../../index');
            //Si entra a este else es porque la imagen no esta con una extencion valida

		}

	}

}else{

	$_SESSION['alertas'] = "PerdidaDatos";
	header('Location: ../../index');
}




?>