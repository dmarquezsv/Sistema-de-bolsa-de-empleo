<?php  


class funcionesApp
{

	

	public function test_input($data)
	{
		$data = str_replace("<script>", "", $data);
		$data = str_replace("</script>", "", $data);
		$data = str_replace("<script type=>", "", $data);
		$data = str_replace("SELECT * FROM", "", $data);
		$data = str_replace("select * from", "", $data);
		$data = str_replace("DELETE FROM", "", $data);
		$data = str_replace("delete from", "", $data);
		$data = str_replace("INSERT INTO", "", $data);
		$data = str_replace("insert into", "", $data);
		$data = str_replace("DROP DATABASE", "", $data);
		$data = str_replace("drop database", "", $data);
		$data = str_replace("--", "", $data);
		$data = str_replace("^", "", $data);
		$data = str_replace("[", "", $data);
		$data = str_replace("]", "", $data);
		$data = str_replace("==", "", $data);
		$data = str_replace("=", "", $data);
		$data = str_replace("/", "", $data);
		$data = str_replace(">", "", $data);
		$data = str_replace("<", "", $data);		
		$data = str_replace("'", "", $data);
		$data = str_replace(";", "", $data);
		$data = str_replace("%", "", $data);
		$data = str_replace("(", "", $data);
		$data = str_replace(")", "", $data);
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		$data = addslashes($data);
		return $data;
	}

		public function test_input2($data)
	{
		$data = str_replace("<script>", "", $data);
		$data = str_replace("</script>", "", $data);
		$data = str_replace("<script type=>", "", $data);
		$data = str_replace("SELECT * FROM", "", $data);
		$data = str_replace("select * from", "", $data);
		$data = str_replace("DELETE FROM", "", $data);
		$data = str_replace("delete from", "", $data);
		$data = str_replace("INSERT INTO", "", $data);
		$data = str_replace("insert into", "", $data);
		$data = str_replace("DROP DATABASE", "", $data);
		$data = str_replace("drop database", "", $data);
		$data = str_replace("--", "", $data);
		$data = str_replace("^", "", $data);
		$data = str_replace("[", "", $data);
		$data = str_replace("]", "", $data);
		$data = str_replace("==", "", $data);
		$data = str_replace("=", "", $data);	
		$data = str_replace("'", "", $data);
		$data = str_replace("(", "", $data);
		$data = str_replace(")", "", $data);
		return $data;
	}


	public function generar_token_seguro($longitud)
	{
		if ($longitud < 4) {
			$longitud = 4;
		}

		return bin2hex(random_bytes(($longitud - ($longitud % 2)) / 2));
	}


	public function generar_contrasena_recuperacion(){

		$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz1234567890";
        $password = "";
  	    //Reconstruimos la contraseña segun la longitud que se quiera
        for($i=0;$i <= 10 ;$i++) {
     	//obtenemos un caracter aleatorio escogido de la cadena de caracteres
        $password .= substr($str,rand(0,62),1);
        }

	    $Clave= password_hash($password, PASSWORD_DEFAULT);//Incriptamos la contraseña del usuario generado automaticamente

	    return $Clave;
	}
	


}

?>