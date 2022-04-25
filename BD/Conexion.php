<?php 
// Datos para conectar a la base de datos
const Servidor = "localhost";
const BaseDeDatos = "bdmundo";
const Usuario = "root";
const Pass = "";
const SGBD = "mysql:host=".Servidor.";dbname=".BaseDeDatos .";charset=UTF8";

class Conexion 
{
	public static function conectar(){
		try {
			
			$con = new PDO(SGBD,Usuario,Pass);
			
			} catch (PDOException $e) {
			    
			if($con == false){
			    
			    header('Location: ../503.php');
			    //die("El error de Conexión es :".$e->getMessage());
			}
		}
		return $con;
	}
	      //Fin de la funcion conectar
}//Final de la class conexion


		?>
