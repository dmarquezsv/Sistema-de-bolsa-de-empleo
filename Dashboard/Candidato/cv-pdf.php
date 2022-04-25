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

error_reporting(0);
if (!isset($_SESSION['iduser'])) {
	header("Location: ../../login.php");
	die();
}elseif($CargoUser != 'Candidato'){
	header("Location: ../../login.php");
	die();
}

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
	<link rel="stylesheet" type="text/css" href="../assets/_scss/bootstrap.min.css">


	<style type="text/css">
		.resume-header {
			width: 820px; 
			margin-top: -46px;
			margin-left: -46px;
			background: #0B3486;
			color: rgba(255, 255, 255, 0.9);
			height: 150px;
		}

		footer{
			width: 820px; 
			
			margin-left: -46px;
			background: #0B3486;
			color: rgba(255, 255, 255, 0.9);
			height: 150px;
		}

		.resume-header .picture {
			width: 170px;
			height: 172px;
			margin-top: -22px;
			position: absolute;

		}

		.Contedor-header{
			margin-left:200px;
		}

		.Contedor-header2{
			border-left: 1px solid;
			border-color: white;
			margin-top: -400px;
			margin-left:560px;
		}

		.cabecera-p{
			margin-left: 10px;
			font-size: 12px;
		}

		.descripcion{
			text-align: justify;
			font-size: 12px;
		}

		.acerca{
			margin-top: -11px;
			font-size: 10px;
		}

		.acerca2{

			margin-top: -11px;
			font-size: 10px;
		}

	</style>

</head>
<body>

	<header class="resume-header pt-4 pt-md-0">
		<img class="mr-3 img-fluid picture mx-auto" src="../../assets/img/user/<?php echo $Foto ?>" alt="">

		<div class="Contedor-header">
			<h1><?php if ($confidencial == "Privado"){  ?>N/D<?php }else{echo $Nombres . "<br> " . $Apellidos;} ?></h1>	
			<p class="cabecera-p">Correo electrónico: <a href="mailto:<?php echo$Email ?>" style="color: white;" ><?php echo $Email ?></a> <br> Número movil: <?php echo $Celular ?><p>

			</div>

			<div class="Contedor-header2">
				<p class="cabecera-p" >Disponiblidad de tiempo: <br> <b><?php echo$Disponibilidad ?></b></p>
				<p class="cabecera-p"  style="margin-top: -10px;">Nacionalidad y Zona de residencia <br> <b><?php echo $Pais; ?> / <?php echo $Departamento;?></b></p>
				<p class="cabecera-p" style="margin-top: -10px;">Edad <br> <b><?php echo$edad ?> años</b></p>
				<img src="../../assets/logo/logoMundoEmpleo.png" style="width: 120px; height:50px; margin-top: -25px; margin-left: 115px;">
			</div>

		</header>



		<div   style="margin-left:540px; padding-left: 10px;  position: absolute; font-size: 12px; border-left: 1px solid; border-color:#0B3486; padding-top: 5px;">
			<h6 style="text-align: center;"><b>ACERCA DE MI</b></h6>
			<hr style="margin-top: 1px; border-color: #0B3486;">
			<p>Experiencia Laboral: <b><?php echo $ExperienciaLaboral ?></b></p>
			<p  class="acerca">Situación actual: <b><?php echo $SituacionActual ?></b></p>
			<p  class="acerca">Vehículo propio: <b><?php echo $Vehiculo ?></b></p>
			<p  class="acerca">Licencia Conducir: <b><?php echo $LicenciaConducir ?></b></p>
			<p  class="acerca">Experiencia en Vehiculo: <b><?php echo $Manejas ?></b></p>
			<p  class="acerca">Discapacidad: <b><?php echo $Discapacitado ?></b></p>
			<p  class="acerca">Teléfono: <b><?php echo $Telefono ?></b></p>
			<p  class="acerca">Años de experiencia laboral: <br><b><?php echo $NombreExperiencia ?></b><br></p>
			<p  class="acerca">Aspiraciones salariales: <br><b>Minimo $<?php echo$SalarioMinimo;?> - Maximo $<?php echo$SalarioMaximo;?></b></p>
			<p  class="acerca">E-mail alternativo <br><a href="mailto:<?php echo$CorreoAlternativo ?>" ><?php echo $CorreoAlternativo ?></a></p>
			<p  class="acerca">Portafolio <br><?php if ($Portafolio ==null) {echo "No disponible";}else{?><a href="<?php echo$Portafolio;?>" target="_blank">Ir a la web</a><?php } ?></p>
			<p  class="acerca">Tipo de Identificación: <b><?php echo$identificacion ?></b><br>Digitos:<b><?php echo $numidentificacion;?></b></p>

			<h6 style="text-align: center;"><b>EDECUCACIÓN SECUNDARIA</b></h6>
			<hr style="margin-top: 1px; border-color: #0B3486;">
			<p class="acerca"><b><?php echo$Educacion ?></b></p>

			<h6 style="text-align: center;"><b>REFERENCIAS</b></h6>
			<hr style="margin-top: 1px; border-color: #0B3486;">
			<?php 

			while ($item=$stmt8->fetch())
			{					
				echo '
				<p  class="acerca2"><b>'.$item['Encargado'].'<br>'.$item['Cargo'].'</b><br>Empresa:'.$item['Empresa'].'<br>E-mail:<br>'.$item['Correo'].'<br>Movil: '.$item['Telefono'].'</p><hr style="margin-top: 1px; border-color: #0B3486;">
				';
			}

			?>

		</div>



		<div class="descripcion" style="margin-right:220px;">
			<br>
			<h6><b>DESCRIPCIÓN BREVE</b></h6>
			<hr style="margin-top: 1px; border-color: #0B3486;" >
			<?php echo $Descripcion; ?>

			<div style="text-align: justify;">
				<h6><b>EXPERIENCIA LABORAL</b></h6>
				<hr style="margin-top: 1px; border-color: #0B3486;" >	
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

					echo '<p style="margin-top: -10px;">Cargo ejercido o Puesto de trabajo:</p><h4 class="h5 font-w700 text-uppercase" style="margin-top: -10px;"><b>'. $item['Cargo'].'</b></h4>
					<p style="margin-top: -10px;">'.$item['FechaInicio'].' / '.$item['FechaFinal'].' | Cargo desempeñado: '.$item['Desempeno'].' | Área de la empresa: '.$item['Area'].'</p>				 <p style="margin-top: -15px;">Rango Salarial:'.$item['RangoSalarial'].' | Empresa: '.$MostrarLugar.' | Estado: '.$item['Estado'].'</p>				
					'.$item['Descripcion'].'
					';

					echo '<hr style="margin-top: 1px; border-color: #0B3486;">';

				}

				?>

				<h6><b>EDUCACIÓN ACÁDEMICA</b></h6>
				<hr style="margin-top: 1px; border-color: #0B3486;" >	
				<?php  

				while ($item=$stmt4->fetch())
				{
					$Estudios;
					if($item['Especialidad'] ==""){
						$Estudios = $item['Carrera'];
					}else{
						$Estudios = $item['Especialidad'];
					}

					echo '<p style="color: black; font-size: 10.5px; margin-top: -10px;">Centro Educativo / Universidad: 
					<b>'.$item['CentroEduacativo'].'/'.$Estudios.'</b>
					<br>
					Fecha estudios: <b>'.$item['FechaInicio'].' - '.$item['FechaFinal'].'</b>
					<br>
					Nivel de estudio: <b>'.$item['NivelEstudio'].'</b>
					<br>
					País:<b>'.$item['Pais'].'</b>
					</p>';

				}

				?>

				<h6><b>IDIOMAS</b></h6>
				<hr style="margin-top: 1px; border-color: #0B3486;" >	
				<ul style="font-size: 12px;">
					<?php 
					while ($item=$stmt5->fetch())
					{
						echo '<li>'.$item['Idioma'].' -'.$item['Nivel'].'</li>';
					} ?>
				</ul>

				<h6><b>HABILIDADES PERSONALES</b></h6>
				<hr style="margin-top: 1px; border-color: #0B3486;" >	
				<ul style="font-size: 12px;">
					<?php 
					while ($item=$stmt6->fetch())
					{
						echo '<li>'.$item['Habilidad'].' -'.$item['Nivel'].'</li>';
					} ?>
				</ul>

				<h6><b>HABILIDADES TÉCNICAS</b></h6>
				<hr style="margin-top: 1px; border-color: #0B3486;" >	
				<ul style="font-size: 12px;">
					<?php 
					while ($item=$stmt7->fetch())
					{
						echo '<li>'.$item['Tecnica'].' -'.$item['Nivel'].'</li>';
					} ?>
				</ul>
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
	$filename =$Nombres." ".$Apellidos.".pdf";
//file_put_contents($filename, $pdf);
	$dompdf->stream($filename);
	
	?>



