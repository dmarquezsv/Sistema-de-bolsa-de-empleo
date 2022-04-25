<?php  

include_once '../../../../BD/Conexion.php';
include_once '../../../../BD/Consultas.php';
include_once '../../../../main/funcionesApp.php';

$FuncionesApp = new funcionesApp();
session_start(); 

if (isset($_POST['Guardar'])) {

  $IDUser =  $FuncionesApp->test_input($_POST['Iduser']);	
  $NombrePuesto = $FuncionesApp->test_input($_POST['Puesto']);	

  $AreaExperiencia = $FuncionesApp->test_input($_POST['AreaCategoria']);// Bien
  $SectorEmpresa =   $FuncionesApp->test_input($_POST['SectorEmpresa']);//Bien
  $CargoEjercido = $FuncionesApp->test_input($_POST['cargo']);


  $LugarTrabajo = $FuncionesApp->test_input($_POST['Empresa']);
  $Salario =  $FuncionesApp->test_input($_POST['Sueldo']);
  $PeridoInicio = $FuncionesApp->test_input($_POST['FechaInicio']);
  $PeridoFinal =  $FuncionesApp->test_input($_POST['FechaFinal']);
  $WebEmpresa =  $FuncionesApp->test_input2($_POST['webempresa']);
  $Estado =  $FuncionesApp->test_input($_POST['estado']);
  $Descripcion = $FuncionesApp->test_input2($_POST['Descrip']);

  $sql = "INSERT INTO `usuario_experiencia` (`IDUsuario`, `Cargo`, `IDCategoria`, `IDTipoEmpresa`, `IDDesempenado`, `Lugar`, `Descripcion`, `RangoSalarial`, `FechaInicio`, `FechaFinal`, `PaginaEmpresa`, `Estado`) VALUES (:IDUsuario,:Cargo,:IDCategoria,:IDTipoEmpresa,:IDDesempenado,:Lugar,:Descripcion,:RangoSalarial,:FechaInicio,:FechaFinal, :PaginaEmpresa,:Estado)";

  $stmt =  Conexion::conectar()->prepare($sql);
  $stmt->bindParam(':IDUsuario', $IDUser , PDO::PARAM_STR);
  $stmt->bindParam('Cargo',$NombrePuesto , PDO::PARAM_STR);
  $stmt->bindParam('IDCategoria', $AreaExperiencia , PDO::PARAM_STR);
  $stmt->bindParam('IDTipoEmpresa',$SectorEmpresa, PDO::PARAM_STR);
  $stmt->bindParam('IDDesempenado',$CargoEjercido  , PDO::PARAM_STR);
  $stmt->bindParam('Lugar', $LugarTrabajo , PDO::PARAM_STR);
  $stmt->bindParam('Descripcion', $Descripcion , PDO::PARAM_STR);
  $stmt->bindParam('RangoSalarial',$Salario , PDO::PARAM_STR);
  $stmt->bindParam('FechaInicio',$PeridoInicio, PDO::PARAM_STR);
  $stmt->bindParam('FechaFinal',$PeridoFinal, PDO::PARAM_STR);
  $stmt->bindParam('PaginaEmpresa',$WebEmpresa, PDO::PARAM_STR);
  $stmt->bindParam('Estado',$Estado, PDO::PARAM_STR);

  	if ($stmt->execute()){

		$_SESSION['alertas'] = "Mensaje";
		$_SESSION['ms'] = "Se ha agregado la experiencia laboral";
		header('Location: ../../experiencia');

	}else{
		
		$_SESSION['alertas'] = "Fallo";
		header('Location: ../../experiencia');
	}


}else{

	$_SESSION['alertas'] = "PerdidaDatos";
	header('Location: ../../experiencia');
}

?>