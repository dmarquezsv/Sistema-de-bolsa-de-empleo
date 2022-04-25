<?php  


header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment; filename=mi_archivo.doc");
header("Pragma: no-cache");
header("Expires: 0");    


include_once '../../BD/Conexion.php';
include_once '../../BD/Consultas.php';
$Conexion = new Consultas();

session_start();
$IDUser  = $_SESSION['iduser'];
$NombresUser = $_SESSION['nombre'];
$ApellidosUser= $_SESSION['apellido'];
$CorreoUser = $_SESSION['email'];
$CargoUser = $_SESSION['cargo'];
$FotoUser = $_SESSION['foto'];

$PrimerNombre = explode(" ", $NombresUser);
$PrimerApellido = explode(" ", $ApellidosUser);

$id = base64_decode($_GET['id']);
$IDUser = $id;


$sql ="SELECT `Nombre` , `Apellidos` , `Correo` , `Foto` , UltimaConexion FROM `usuarios_cuentas` WHERE `IDUsuario` = ? ";
$stmt = $Conexion->ejecutar_consulta_simple_Where($sql , $IDUser);

while ($item=$stmt->fetch())
{
	$Nombres = $item['Nombre'];
	$Apellidos = $item['Apellidos'];
	$Email = $item['Correo'];
	$Foto =  $item['Foto'];  
	$UltimaConexion = $item['UltimaConexion'];

}

$sql2 ="SELECT P.IDPais ,P.Nombre AS'Pais' , PD.IDDepartamento , PD.Nombre AS 'Departamento' , `EducacionSecundaria` , `Descripcion` , `LicenciaConducir` , `Vehiculo` , `ManejoVehiculo` ,`CorreoAlternativo` , `Telefono` , `Celular` , `Discapacidad` , `TipoDiscapacidad` , `ExperienciaLaboral` , TE.IDAreaExperiencia , TE.Nombre AS 'Experiencia' , `Portafolio` , `Disponiblidad` , `SituacionActual` , `FechaNaciento` , `edad`  FROM usuario_perfil UP INNER JOIN soporte_paises P ON UP.IDPais = P.IDPais LEFT JOIN soporte_paises_departamento PD ON UP.IDDepartamento = PD.IDDepartamento LEFT JOIN soporte_tipo_experiencia TE ON UP.IDAreaExperiencia = TE.IDAreaExperiencia WHERE UP.IDUsuario = ? ";
$stmt2 = $Conexion->ejecutar_consulta_simple_Where($sql2 , $IDUser);
while ($item=$stmt2->fetch())
{

    $Pais = $item['Pais'];//yA
    $Departamento = $item['Departamento'];//YA
    $Educacion = $item['EducacionSecundaria']; // Ya
    $Descripcion = $item['Descripcion'];//yA
    $LicenciaConducir = $item['LicenciaConducir']; //Ya
    $Vehiculo = $item['Vehiculo']; //Ya
    $Manejas = $item['ManejoVehiculo']; // Ya
    $CorreoAlternativo = $item['CorreoAlternativo'];
    $Telefono = $item['Telefono']; // Ya
    $Celular = $item['Celular']; // Ya
    $Discapacitado =$item['Discapacidad']; // Ya
    $ExperienciaLaboral = $item['ExperienciaLaboral']; // Ya
    $NombreExperiencia = $item['Experiencia']; // Ya
    $Portafolio = $item['Portafolio']; //YA
    $Disponibilidad = $item['Disponiblidad']; // Ya
    $SituacionActual = $item['SituacionActual'];
    $FechaNaciento = $item['FechaNaciento']; // Ya
    $edad = $item['edad']; // Ya

}

$sql3 = "SELECT Cargo , TA.IDCategoria , TA.Nombre AS 'Categoria' ,TE.IDTipoEmpresa ,TE.Area , CD.IDDesempenado , CD.nombre AS 'Desempeno' , Lugar , Descripcion ,RangoSalarial , FechaInicio , FechaFinal , PaginaEmpresa ,Estado FROM usuario_experiencia UE INNER JOIN soporte_areas_trabajos TA ON UE.IDCategoria = TA.IDCategoria LEFT JOIN soporte_cargos_desempenado CD ON UE.IDDesempenado = CD.IDDesempenado LEFT JOIN soporte_tipo_empresa TE ON UE.IDTipoEmpresa = TE.IDTipoEmpresa WHERE `IDUsuario` = ?";

$stmt3 = $Conexion->ejecutar_consulta_simple_Where($sql3 , $IDUser);

$sql4 = "SELECT CentroEduacativo , Especialidad ,T.IDCategoria , T.Nombre AS 'Area' , NivelEstudio , FechaInicio ,FechaFinal , P.IDPais , P.Nombre AS 'Pais' FROM usuario_educacion UE INNER JOIN soporte_areas_trabajos T ON UE.IDCategoria = T.IDCategoria LEFT JOIN soporte_paises P ON UE.IDPais = P.IDPais WHERE `IDUsuario` = ? ";
$stmt4 = $Conexion->ejecutar_consulta_simple_Where($sql4 , $IDUser);

$sql5 = "SELECT Idioma , Nivel FROM `usuarios_idiomas` WHERE IDUsuario = ?";
$stmt5 = $Conexion->ejecutar_consulta_simple_Where($sql5 , $IDUser);

$sql6 ="SELECT  AH.Nombre 'Habilidad' , Nivel FROM usuarios_habilidades UH INNER JOIN soporte_areas_habilidades AH ON UH.IDHabilidades = AH.IDHabilidades WHERE IDUsuario = ?";
$stmt6 = $Conexion->ejecutar_consulta_simple_Where($sql6 , $IDUser);

$sql7 ="SELECT  AE.Nombre 'Tecnica' , Nivel FROM usuarios_conocimentos UC INNER JOIN soporte_areas_experiencia AE ON UC.IDTipo = AE.IDTipo WHERE IDUsuario = ?";

$stmt7 = $Conexion->ejecutar_consulta_simple_Where($sql7 , $IDUser);

?>
<!doctype html>
<html lang="en" class="no-focus">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	

	<body class="container">

		<table>
			<thead>
				<tr>
					<th></th>
					<th></th>

				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						<h6>ACERCA DE MI</h6>
						<hr style="margin-right:500px; margin-top: -5px;">
						<P style="color: black; font-size: 8px;">
							Nacionalidad <br><?php echo $Pais; ?> <br><br>
							Zona de residencia <br> <?php echo $Departamento;?><br><br>
							Fecha de nacimiento <br><?php echo $FechaNaciento;?><br><br>
							Edad <br><?php echo $edad ?> años <br><br>
							Experiencia Laboral <br> <?php echo $ExperienciaLaboral ?> <br><br>
							Tipo de Experiencia <br><?php echo $NombreExperiencia ?> <br><br>
							Teléfono <br> <?php echo $Telefono ?> <br><br>
							Celular <br> <?php echo $Celular ?> <br><br>
							E-mail <br> <a href="mailto:<?php echo$Email ?>" ><?php echo $Email ?></a>  <br><br>
							E-mail alternativo <br><a href="mailto:<?php echo$CorreoAlternativo ?>" ><?php echo $CorreoAlternativo ?> </a>  <br><br>
							Vehículo <br> <?php echo $Vehiculo ?> <br><br>
							Licencia <br> <?php echo $LicenciaConducir ?> <br><br>
							Experiencia en Vehiculo <br> <?php echo $Manejas ?> <br><br>
							Discapacidad <br><?php echo $Discapacitado ?> <br><br>
							Situación actual <br> <?php echo $SituacionActual ?> <br><br>
							Portafolio <br><?php if ($Portafolio ==null) {
								echo "No disponible";
							}else{
								?>
								<a href="<?php echo$Portafolio;?>" target="_blank">Ir a la web</a>
							<?php } ?>
						</P>

						<h6>Educación</h6>
						<hr style="margin-right:500px; margin-top: 10px;">
						<?php 

						while ($item=$stmt4->fetch())
						{
							echo '<p style="color: black; font-size: 8px;">
							'.$item['CentroEduacativo'].'/ <br> '.$item['Especialidad'].'
							<br>
							Fecha estudios: <b>'.$item['FechaInicio'].' - '.$item['FechaFinal'].'
							<br>
							Nivel de estudio <b><br>'.$item['NivelEstudio'].'</b>
							<br>
							Pais:<b>'.$item['Pais'].'</b>

							</p>';
						}

						?>
						<h6>Educación secundaria: </h6>
						<hr style="margin-right:500px;">
						<p style="color: black; font-size: 12px;  margin-top: 10px;"><b><?php echo$Educacion ?></b></p>
					</td>
					<td>
						<div style="margin-top:-425px;">
							<img src="http://localhost/MundoEmpleoCA-Sistema/assets/img/user/<?php echo $Foto ?>" style="height: 100px; height:100px;" >
						</div>
						<h2 style="color: black; margin-top: -100px; margin-left: 125px; text-align: left; position: absolute;"><?php echo $Nombres . "<br> " . $Apellidos;?></h2>
						<br><br><br>
						<p style="color: #3f9ce8;  font-size: 14px;  margin-left: 125px;  position: absolute; margin-top: -100px;"><?php echo$Disponibilidad ?></p>
						<h5>EXPERIENCIA LABORAL</h5>
						<hr>
						
					</td>
				</tr>
			</tbody>
		</table>

	</body>
	</html>




