<?php 

include_once '../../BD/Conexion.php';
include_once '../../BD/Consultas.php';
include_once '../../main/funcionesApp.php';
include_once 'EnviarCorreos.php';
$FuncionesApp = new funcionesApp();

try {

	$CorroFormato = $FuncionesApp->test_input($_POST['correo']);
      $email = strtolower($CorroFormato); //El correo lo pasamos de forma en minuscula
      $Cargo =  $FuncionesApp->test_input($_POST['Cargo']);
      $Nombre = $FuncionesApp->test_input($_POST['Nombre']);        
      $Apellidos =$FuncionesApp->test_input($_POST['Apellidos']);
      $PasswordFormato = $FuncionesApp->test_input($_POST['password']);
      $Password = password_hash($PasswordFormato, PASSWORD_DEFAULT);//Incriptamos la contraseña del usuario generado automaticamente
      $Token = $FuncionesApp->generar_token_seguro(20);
      $resultEmail = Consultas::ejecutar_consulta_conteo("usuarios_cuentas" , "Correo" , $email);

      if($resultEmail==1){
      	echo "1";
      }else{
      	
      	$sql = "INSERT INTO `usuarios_cuentas` (`Nombre`, `Apellidos`, `Correo`, `Password`, `Token`,  `Cargo`)
      	VALUES(:Nombre,:Apellidos ,:Correo ,:Password ,:Token ,:Cargo)";

      	$stmt =  Conexion::conectar()->prepare($sql);
      	$stmt->bindParam(':Nombre', $Nombre , PDO::PARAM_STR);
      	$stmt->bindParam(':Apellidos', $Apellidos , PDO::PARAM_STR);
      	$stmt->bindParam(':Correo', $email , PDO::PARAM_STR);
      	$stmt->bindParam(':Password', $Password , PDO::PARAM_STR);
      	$stmt->bindParam(':Token', $Token , PDO::PARAM_STR);
      	$stmt->bindParam(':Cargo', $Cargo , PDO::PARAM_STR);

      	if ($stmt->execute()){
      		echo "2";
      		EnviarCorreos::EnviarVerfificacion($Nombre, $email , $Token);

      	}else
      	{
      		echo "3";
      	}
      }

      }catch  (PDOException $e) {

      	die("El error de consulta es :".$e->getMessage());
      }


      ?>