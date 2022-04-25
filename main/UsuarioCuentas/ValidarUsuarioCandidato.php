<?php 

		session_start(); 
		include_once '../../BD/Conexion.php';
		include_once '../../main/funcionesApp.php';
		
		$FuncionesApp = new funcionesApp();
		$correo = base64_decode($_GET['email']);
		$Token = $FuncionesApp->test_input($_GET['keys']); 
		$email = $FuncionesApp->test_input($correo); 
			
			
		$sql = "SELECT Estado FROM usuarios_cuentas WHERE Token = ? AND Correo = ?";
		$respuesta = Conexion::conectar()->prepare($sql);
		$respuesta->execute(array($Token ,$email ));

		while ($item=$respuesta->fetch()){
			$Estado =  $item['Estado'];
		}

		if (!$respuesta->execute()) {
			die("El error de Conexión al buscar al usuario cuenta");
		}else{

			if($Estado =="Token"){

				$sql ="UPDATE `usuarios_cuentas` SET `Estado` = 'Activo' WHERE Correo = ?";
				$respuesta2 = Conexion::conectar()->prepare($sql);
				$respuesta2->execute(array($email));

				if (!$respuesta2->execute()) {
					die("El error de Conexión ejecutar la acualizacion usuario cuentas");
				}else{

					$_SESSION['alertas'] = "Mensaje";
					$_SESSION['ms'] = "Su cuenta se activado con exito";
					header('Location: ../../login-candidato');	
				}
				
				

			}else{

				$_SESSION['alertas'] = "Mensaje";
				$_SESSION['ms'] = "La cuenta ya ha sido verificado";
				header('Location: ../../login-candidato');

			}


		}





 ?>