<?php 


	
	class Consultas 
	{


		static public function ejecutar_consulta_conteo($tabla , $campo , $condicion)
		{

			try {

				$sql = "SELECT COUNT($campo) AS 'Total' FROM  $tabla WHERE $campo = ? ";
				$respuesta = Conexion::conectar()->prepare($sql);
				
				if (!$respuesta->execute(array($condicion))) {
					die("El error de Conexión es ejecutar_consulta_conteo");
				}

				while ($item=$respuesta->fetch()){
					$Total =  $item['Total'];
				}

			} catch (PDOException $e) {
				die("El error de Conexión es :".$e->getMessage());
			}

			return $Total;
		}
	  //Fin de la funcion consulta
		


	  static public function ejecutar_consulta_simple($sql)
		{

			try {

				
				$respuesta = Conexion::conectar()->prepare($sql);
				if (!$respuesta->execute()) {
					die("El error de Conexión es ejecutar_consulta_simple");
				}

			} catch (PDOException $e) {
				die("El error de Conexión es :".$e->getMessage());
			}

			return $respuesta;
		}
	  //Fin de la funcion consulta



	  static public function ejecutar_consulta_simple_Where($consulta, $condicion)
		{

			try {

				$respuesta = Conexion::conectar()->prepare($consulta);
				
				if(!$respuesta-> execute(array($condicion))){
					
					die("El error de Conexión es ejecutar_consulta_simple_Where");
				}
				return $respuesta;
			}
			catch  (PDOException $e) {
				
				die("El error de consulta es :".$e->getMessage());
			}
		}
    //Fin de la funcion consulta
    

//Funcion para eliminar complejo los datos 
static  public function ejecutar_consulta_eliminar_Complejo($tabla,$campo1 ,$Condicion1 , $Campo2 , $Condicion2)
		{

			try {

				$sql = "DELETE FROM $tabla WHERE $campo1 = ? AND  $Campo2 = ?";
				$respuesta = Conexion::conectar()->prepare($sql);
				if(!$respuesta-> execute(array($Condicion1 ,$Condicion2))){
					
					die("El error de Conexión es ejecutar_consulta_conteo");
				}

			} catch (PDOException $e) {
				die("El error de Conexión es :".$e->getMessage());
			}

			return $respuesta;
		}
	  //Fin de la funcion consulta


	  static public function ejecutar_consulta_eliminar($tabla,$campo1 ,$Condicion1)
		{

			try {

				$sql = "DELETE FROM $tabla WHERE $campo1 = ?";
				$respuesta = Conexion::conectar()->prepare($sql);
				if(!$respuesta-> execute(array($Condicion1))){
					
					die("El error de Conexión es ejecutar_consulta_conteo");
				}

			} catch (PDOException $e) {
				die("El error de Conexión es :".$e->getMessage());
			}

			return $respuesta;
		}
	  //Fin de la funcion consulta






		


	}

 ?>