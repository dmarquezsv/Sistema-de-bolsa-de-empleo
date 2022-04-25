<?php 
        session_start();
		include_once '../../BD/Conexion.php';
		include_once '../../BD/Consultas.php';
		include_once '../../main/funcionesApp.php';

		$Conexion = new Consultas();
		$FuncionesApp = new funcionesApp();

		if (isset($_POST['validar'])) {

		$email=  $FuncionesApp->test_input($_POST['login-username']); 
		$password= $FuncionesApp->test_input($_POST['login-password']); 
		$emailFormato = strtolower($email);

	    	$sql="SELECT `IDUsuario` , `Nombre` , `Apellidos` , `Correo` ,`Password` ,`Foto` , Cargo , `Estado` FROM usuarios_cuentas WHERE `Correo` = ?";
		$stmt = $Conexion->ejecutar_consulta_simple_Where($sql ,$emailFormato );
		
		$Correo ="";
		while ($item=$stmt->fetch())
		{	
			$Iduser = $item['IDUsuario'];
			$Nombre = $item['Nombre'];
			$Apellidos = $item['Apellidos'];
			$Correo = $item['Correo'];
			$ObtnerContra = $item['Password'];
			$Foto = $item['Foto'];
			$Estado=  $item['Estado'];
			$Cargo=  $item['Cargo'];

		}

		if($emailFormato == $Correo && password_verify($password, $ObtnerContra))
		{
			if ($Estado =="Token") {
				$_SESSION['alertas'] = "Advertenicia";
			    $_SESSION['ms'] = "No has verificado el correo electrónico";
			    header("Location: ../../login-candidato");
			}else if($Estado =="Denegado"){
				$_SESSION['alertas'] = "Advertenicia";
			    $_SESSION['ms'] = "Usuario denegado verfica con Soporte técnico";
			    header("Location: ../../login-candidato");
			}else if($Estado =="Seguridad"){

				$_SESSION['alertas'] = "Advertenicia";
			    $_SESSION['ms'] = "Usuario denegado verifica tu correo electrónico para confirmar el cambio de contraseña";
			    header("Location: ../../login-candidato?seguridad=1");
			}
			else{

				
				$_SESSION['iduser'] = $Iduser;
				$_SESSION['nombre'] = $Nombre;
				$_SESSION['apellido'] = $Apellidos;
				$_SESSION['email'] = $Correo;
				$_SESSION['cargo'] = $Cargo;
				$_SESSION['foto'] = $Foto;

				switch ($Cargo) {				
				case 'Soporte':
				header("Location: ../../Dashboard/Soporte/");
				break;
				
				default:
				$_SESSION['email'] = $email;
				$_SESSION['alertas'] = "Advertenicia";
				$_SESSION['ms'] = "Tu cuenta no es de administración";
				header("Location: ../../login-admin");	
				break;

				}


			}


		}else{

			$_SESSION['email'] = $email;
			$_SESSION['alertas'] = "Advertenicia";
			$_SESSION['ms'] = "El correo electrónico o contraseña incorrecto";
			header("Location: ../../login-admin?error=0");
		}

		

	}

 ?>