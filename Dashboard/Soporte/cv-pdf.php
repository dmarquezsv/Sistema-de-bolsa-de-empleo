<?php  
ob_start();
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

$sql2 ="SELECT P.IDPais ,P.Nombre AS'Pais' , PD.IDDepartamento , PD.Nombre AS 'Departamento' , `EducacionSecundaria` , `Descripcion` , `LicenciaConducir` , `Vehiculo` , `ManejoVehiculo` ,`CorreoAlternativo` , `Telefono` , `Celular` , `Discapacidad` , `TipoDiscapacidad` , `ExperienciaLaboral` , TE.IDAreaExperiencia , TE.Nombre AS 'Experiencia' , `Portafolio` , `Disponiblidad` , `SituacionActual` , `FechaNaciento` , `edad` ,`SalarioMinimo` , `SalarioMaximo` , `confidencial` , `identificacion` ,`numidentificacion` FROM usuario_perfil UP INNER JOIN soporte_paises P ON UP.IDPais = P.IDPais LEFT JOIN soporte_paises_departamento PD ON UP.IDDepartamento = PD.IDDepartamento LEFT JOIN soporte_tipo_experiencia TE ON UP.IDAreaExperiencia = TE.IDAreaExperiencia WHERE UP.IDUsuario = ? ";
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

    $SalarioMinimo = $item['SalarioMinimo']; //Ya
    $SalarioMaximo = $item['SalarioMaximo']; //Ya
    $confidencial = $item['confidencial'];
    $identificacion = $item['identificacion'];
    $numidentificacion = $item['numidentificacion'];

}

$sql3 = "SELECT Cargo , TA.IDCategoria , TA.Nombre AS 'Categoria' ,TE.IDTipoEmpresa ,TE.Area , CD.IDDesempenado , CD.nombre AS 'Desempeno' , Lugar , Descripcion ,RangoSalarial , FechaInicio , FechaFinal , PaginaEmpresa ,Estado FROM usuario_experiencia UE INNER JOIN soporte_areas_trabajos TA ON UE.IDCategoria = TA.IDCategoria LEFT JOIN soporte_cargos_desempenado CD ON UE.IDDesempenado = CD.IDDesempenado LEFT JOIN soporte_tipo_empresa TE ON UE.IDTipoEmpresa = TE.IDTipoEmpresa WHERE `IDUsuario` = ?";

$stmt3 = $Conexion->ejecutar_consulta_simple_Where($sql3 , $IDUser);

$sql4 = "SELECT CentroEduacativo , Especialidad ,C.Id_Carrera , C.nombre AS 'Carrera'  , NivelEstudio , FechaInicio ,FechaFinal , P.IDPais , P.Nombre AS 'Pais' FROM usuario_educacion UE INNER JOIN carrera C ON UE.Id_Carrera = C.Id_Carrera LEFT JOIN soporte_paises P ON UE.IDPais = P.IDPais WHERE `IDUsuario` = ? ";

$stmt4 = $Conexion->ejecutar_consulta_simple_Where($sql4 , $IDUser);

$sql5 = "SELECT Idioma , Nivel FROM `usuarios_idiomas` WHERE IDUsuario = ?";
$stmt5 = $Conexion->ejecutar_consulta_simple_Where($sql5 , $IDUser);

$sql6 ="SELECT  AH.Nombre 'Habilidad' , Nivel FROM usuarios_habilidades UH INNER JOIN soporte_areas_habilidades AH ON UH.IDHabilidades = AH.IDHabilidades WHERE IDUsuario = ?";
$stmt6 = $Conexion->ejecutar_consulta_simple_Where($sql6 , $IDUser);

$sql7 ="SELECT  AE.Nombre 'Tecnica' , Nivel FROM usuarios_conocimentos UC INNER JOIN soporte_areas_experiencia AE ON UC.IDTipo = AE.IDTipo WHERE IDUsuario = ?";

$stmt7 = $Conexion->ejecutar_consulta_simple_Where($sql7 , $IDUser);

$sql8 ="SELECT * FROM `usuario_referencia` WHERE `IDUsuario` = ?";
$stmt8 = $Conexion->ejecutar_consulta_simple_Where($sql8 , $IDUser);

?>
<!doctype html>
<html lang="en" class="no-focus">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<!-- CSS only -->
	<link rel="stylesheet" type="text/css" href="../assets/_scss/bootstrap.min.css">

	
	<style type="text/css">
		#imguser{
			width: 125px;
			height: 125px;
			background-color: #f3f4f7;
			padding-top: 15px;
			padding-bottom: 0px;
			padding-left: 15px;
			padding-right: 0px;
			border-radius: 400%;
			margin-right: -900px;
		}
		#imgfoto{
			border: solid 5px white;
			width: 100px;
			height: 100px;
			border-radius: 350%;
			position: absolute;
			margin-right: -900px;
		}
	</style>
</head>
<body>

	<div class="container-fluid">

		<div class="row">
			<div class="col-sm">
				<img src="../../assets/recusosMundoEmpleo/logo.png" style="width: 150px; height:60px;">
				<h6 style="font-size: 10px;">ACERCA DE MI</h6>
				<hr style="margin-right:525px; margin-top: -5px;">
				<P style="color: black; font-size: 8px;">
					Nacionalidad <br><b><?php echo $Pais; ?></b><br>
					Zona de residencia <br><b><?php echo $Departamento;?></b><br>
					Identificación: <?php echo$identificacion ?><br><b><?php echo $numidentificacion;?></b><br>
					Fecha de nacimiento <br><b><?php echo $FechaNaciento;?></b><br>
					Edad <br><b><?php echo $edad ?> años</b><br>
					Experiencia Laboral <br><b><?php echo $ExperienciaLaboral ?></b><br>
					Tipo de Experiencia <br><b><?php echo $NombreExperiencia ?></b><br>
					Teléfono <br><b><?php echo $Telefono ?></b><br>
					Celular <br><b><?php echo $Celular ?></b><br>
					E-mail <br> <a href="mailto:<?php echo$Email ?>" ><?php echo $Email ?></a> <br>
					E-mail alternativo <br><a href="mailto:<?php echo$CorreoAlternativo ?>" ><?php echo $CorreoAlternativo ?></a><br>
					Vehículo <br><b><?php echo $Vehiculo ?></b><br>
					Licencia <br><b><?php echo $LicenciaConducir ?></b><br>
					Experiencia en Vehiculo <br><b><?php echo $Manejas ?></b><br>
					Discapacidad <br><b><?php echo $Discapacitado ?></b><br>
					Situación actual <br><b><?php echo $SituacionActual ?></b><br>
					Salario <br><b>Minimo $<?php echo$SalarioMinimo;?> - Maximo $<?php echo$SalarioMaximo;?></b><br>
					Portafolio <br><?php if ($Portafolio ==null) {
						echo "No disponible";
					}else{
						?>
						<a href="<?php echo$Portafolio;?>" target="_blank">Ir a la web</a>
					<?php } ?>

				</P>

				<h6 style="font-size: 12px;">Educación secundaria: </h6>
				<hr style="margin-right:525px; margin-top: -5px;">
				<p style="color: black; font-size: 10px;  margin-top: -5px;"><b><?php echo$Educacion ?></b></p>
				<h6>Referencia: </h6>
				<?php 

				while ($item=$stmt8->fetch())
				{					
					echo '<p style="color: black; font-size: 8px;">
					'.$item['Encargado'].' / '.$item['Cargo'].'
					<br>
					Empresa: <b>'.$item['Empresa'].'
					<br>
					E-mail <b>'.$item['Correo'].'</b>
					<br>
					Celular:<b>'.$item['Telefono'].'</b>
					</p>';
				}

				?>

			</div>
			<div class="col-sm">
				
				<img src="../../assets/img/user/<?php echo $Foto ?>" id="imgfoto" style="margin-left: 250px;" >
				
				<br><br><br><br>
				<h2 style="color: black; margin-top: -100px; margin-left: 375px; text-align: left; position: absolute;">
					<?php if ($confidencial == "Privado"){  ?>
						N/D
					<?php }else{ ?>
						<?php echo $Nombres . "<br> " . $Apellidos;}?></h2>
						<p style="color: #3f9ce8; margin-top: -25px; font-size: 14px;  margin-left: 375px; position: absolute;"><?php echo$Disponibilidad ?></p><br><br>
						<div style="margin-left: 25%;">
							<h5>EXPERIENCIA LABORAL</h5>
							<hr>	
							<div class="mb-50" style="font-family: 'Arial'; color: black; font-size: 12px;">


								<?php  

								while ($item=$stmt3->fetch())
								{
									$MostrarLugar ="";
									$SitioWeb = "";
									if($confidencial == "Privado"){$MostrarLugar = "-";}else{ $MostrarLugar = $item['Lugar']; }
									if ($item['PaginaEmpresa'] =="") {
										$SitioWeb ="No hay sitio web";
									}else{
										$SitioWeb ="Página web";
									}

									echo '<h3 class="h4 font-w700 text-uppercase">'. $item['Cargo'].'</h3>
									<div class="text-muted mb-10">
									<span class="mr-15">
									<i class="fa fa-fw fa-calendar mr-5"></i>'.$item['FechaInicio'].' - '.$item['FechaFinal'].'
									</span>
									<a class="text-muted mr-15" href="javascript:void(0)">
									<i class="fa fa-fw fa-user mr-5"></i>Cargo desempeñado: '.$item['Desempeno'].'
									</a>
									<a class="text-muted" href="javascript:void(0)">
									<i class="fa fa-fw fa-tag mr-5"></i>Área de la empresa: '.$item['Area'].'
									</a>
									</div>

									<div class="text-muted mb-10">

									<a class="text-muted mr-15" href="javascript:void(0)">
									<i class="fa fa-fw fa-user mr-5"></i>Rango Salarial: '.$item['RangoSalarial'].'
									</a>

									<span class="mr-15">
									<i class="fa fa-fw fa-calendar mr-5"></i>Empresa: '.$MostrarLugar.'
									</span>
									<span class="mr-15">
									<i class="fa fa-fw fa-calendar mr-5"></i>'.$item['Estado'].'
									</span>
									<br><br>
									</div>
									'.$item['Descripcion'].'
									<br>
									';
								}

								?>
							</div>

							<h6>Educación académica</h6>
							<hr>
							<?php 

							while ($item=$stmt4->fetch())
							{
								$Estudios;
								if($item['Especialidad'] ==""){
									$Estudios = $item['Carrera'];
								}else{
									$Estudios = $item['Especialidad'];
								}

								echo '<p style="color: black; font-size: 12px;">
								'.$item['CentroEduacativo'].'/'.$Estudios.'
								<br>
								Fecha estudios: <b>'.$item['FechaInicio'].' - '.$item['FechaFinal'].'
								<br>
								Nivel de estudio <b><br>'.$item['NivelEstudio'].'</b>
								<br>
								Pais:<b>'.$item['Pais'].'</b>

								</p>';
							}

							?>

							<h6>Idiomas</h6>
							<hr style="margin-top: -5px;">
							<ul style="font-size: 12px;">
								<?php 
								while ($item=$stmt5->fetch())
								{
									echo '<li>'.$item['Idioma'].' -'.$item['Nivel'].'</li>';
								} ?>
							</ul>

							<h6>Habilidades Personales</h6>
							<hr style="margin-top: -5px;">
							<ul style="font-size: 12px;">
								<?php 
								while ($item=$stmt6->fetch())
								{
									echo '<li>'.$item['Habilidad'].' -'.$item['Nivel'].'</li>';
								} ?>
							</ul>

							<h6>Habilidades Técnica</h6>
							<hr style="margin-top: -5px;">
							<ul style="font-size: 12px;">
								<?php 
								while ($item=$stmt7->fetch())
								{
									echo '<li>'.$item['Tecnica'].' -'.$item['Nivel'].'</li>';
								} ?>
							</ul>


						</div>





					</div>

				</div>



			</body>
			</html>


			<?php

			require_once '../../assets/plugin/dompdf/autoload.inc.php';
			use Dompdf\Dompdf;
			$dompdf = new DOMPDF();
			$dompdf->load_html(ob_get_clean());
			$dompdf->render();
			$pdf = $dompdf->output();
			if ($confidencial == "Privado"){
				$filename ="curriculum_vitae.pdf";
			}else{
				$filename =$Nombres." ".$Apellidos.".pdf";
			}
			$dompdf->stream($filename);

			?>
