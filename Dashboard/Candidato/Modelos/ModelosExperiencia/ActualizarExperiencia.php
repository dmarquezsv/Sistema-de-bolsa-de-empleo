<?php  

include_once '../../../../BD/Conexion.php';
include_once '../../../../BD/Consultas.php';
include_once '../../../../main/funcionesApp.php';

$FuncionesApp = new funcionesApp();
session_start(); 
if (isset($_POST['Guardar'])) {

  $id = base64_decode($_POST['IDExperiencia']);
  $IDExperiencia = $FuncionesApp->test_input($id); 
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

  $sql = "UPDATE `usuario_experiencia` SET `Cargo` = :Cargo, `IDCategoria` = :IDCategoria, `IDTipoEmpresa` =  :IDTipoEmpresa, `IDDesempenado` = :IDDesempenado, `Lugar` = :Lugar, `Descripcion` = :Descripcion, `RangoSalarial` = :RangoSalarial, `FechaInicio` = :FechaInicio, `FechaFinal` = :FechaFinal, `PaginaEmpresa` = :PaginaEmpresa, `Estado` = :Estado WHERE `IDExperiencia` = :IDExperiencia ";
  $stmt =  Conexion::conectar()->prepare($sql);

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
  $stmt->bindParam('IDExperiencia',$IDExperiencia, PDO::PARAM_STR);

  if ($stmt->execute()){

		$_SESSION['alertas'] = "Mensaje";
		$_SESSION['ms'] = "Se ha actualizado la experiencia laboral";
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