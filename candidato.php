<?php

include_once 'BD/Conexion.php';
include_once 'BD/Consultas.php';
include_once 'main/funcionesApp.php'; 

$Conexion = new Consultas();
$FuncionesApp = new funcionesApp();

$fechaActual =date("Y-m-d");

$sql = "SELECT OT.IDpostulaciones ,EP.IDEmpresa , EP.lugar ,EP.Nombre AS 'NombreEMPRESA' , EP.logo , TE.Area ,EP.Confidencial , P.Nombre AS 'Pais' , PD.Nombre 'Departamento' , T.Nombre AS 'Categoria' , CD.nombre AS 'Desempeno' , `Plaza` , OT.Descripcion , `FechaPublicacion` , OT.Expira , OT.Estado FROM empresa_ofertas_trabajos OT INNER JOIN empresa_perfil EP ON OT.IDEmpresa = EP.IDEmpresa LEFT JOIN soporte_tipo_empresa TE ON EP.IDTipoEmpresa = TE.IDTipoEmpresa LEFT JOIN soporte_paises P ON OT.IDPais = P.IDPais LEFT JOIN soporte_paises_departamento PD ON OT.IDDepartamento = PD.IDDepartamento LEFT JOIN soporte_areas_trabajos T ON OT.IDCategoria = T.IDCategoria LEFT JOIN soporte_cargos_desempenado CD ON OT.IDDesempenado = CD.IDDesempenado LEFT JOIN soporte_tipo_experiencia Exp ON OT.IDAreaExperiencia = Exp.IDAreaExperiencia WHERE OT.`Estado` = 'Activo' AND OT.FechaPublicacion <= ? AND OT.Expira >= ? ORDER BY `OT`.`IDpostulaciones` DESC LIMIT 0,5 ";

$stmt =  Conexion::conectar()->prepare($sql);
$stmt->execute(array($fechaActual , $fechaActual));

$sql2 = "SELECT * FROM `soporte_paises` ORDER BY `soporte_paises`.`Nombre` ASC ";
$stmt2 = $Conexion->ejecutar_consulta_simple($sql2);





?>
<?php include_once 'templates/head.php'; ?>
<title>MUNDO EMPLEO | CENTRO AMERICA</title>
<?php include_once 'templates/style.php'; ?>
<?php include_once 'templates/header.php'; ?>
<?php include_once 'templates/leftmunu.php'; ?>

<style type="text/css">
	
	form.search-box .input-form input {
		height: 50px;
		width: 100%;
		color: #777777;
		font-size: 18px;
		font-weight: 400;
		padding: 9px 33px 9px 32px;
		
		border-radius: 0px;
		position: relative;
	}

	#select1{
		height: 50px;
	}

	#btn-oferta{
		background: #FCC201;
		padding: 10px;
		border-radius: 10px;
		color: white;
		font-weight: bold;
	}

	#btn-oferta:hover{
		background: #0B3486;
		font-weight: bold;
	}

	.hero-slider .hero-text h4{
		background: #0B3486;
	}

	#imgbanner{

		background: url('img/slider/escritorio/1.png');
		background-repeat: no-repeat;
		background-size: cover;
		

	}


</style>

<!-- Hero Slider -->
<!--Comienzo del contenido web -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
	<ol class="carousel-indicators">
		<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
		
	</ol>
	
	<div class="carousel-inner">

		<div class="carousel-item active">
			<picture>
				<source srcset="img/slider/escritorio/1.png" media="(min-width: 1400px)">
					<source srcset="img/slider/laptos/1.png" media="(min-width: 769px)">
						<source srcset="img/slider/tabletas/1.jpg" media="(min-width: 577px)">
							<img srcset="img/slider/celulares/1.jpg" alt="responsive image" class="d-block img-fluid">
						</picture>
					</div>


							</div>
							

						</div>

						<!-- Latest Blog -->
						<section class="latest-blog">
							<div class="container">
								<div class="row">
									<div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
										<div class="section-title default text-center">
											<div class="section-top">
												<h1 id="titulos"><span>Publicaciones</span><b>??ltimos empleos</b></h1>
											</div>

										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-12">
										<div class="blog-latest blog-latest-slider">

											<?php 


											while ($item=$stmt->fetch())
											{	
												$date = date_create($item['FechaPublicacion']);  $fechapublicada = date_format($date,"d/m/Y");
												echo '
												<div class="single-slider">
												<!-- Single Blog -->
												<div class="single-news ">

												<div class="news-body">
												<div class="news-content">
												<h3 class="news-title">
												<a href="oferta_trabajo?id='.base64_encode($item['IDpostulaciones']).'">'.$item['Plaza'].'</a>
												</h3>
												<ul class="news-meta">
												<li class="date"><i class="fa fa-calendar"></i>'.$item['Desempeno'].'</li>
												<li class="view"><i class="fa fa-comments"></i>'.$item['Categoria'].'</li>
												</ul>

												<ul class="news-meta">
												<li class="date"><i class="fa fa-calendar"></i>'.$fechapublicada.'</li>
												<li class="view"><i class="fa fa-comments"></i>'.$item['Pais'].'</li>
												<li class="view"><i class="fa fa-comments"></i>'.$item['Area'].'</li>
												<br><br>
												<li class="view"><a href="oferta_trabajo?id='.base64_encode($item['IDpostulaciones']).'"" id="btn-oferta">Ver la oferta</a></li>
												</ul>
												</div>
												</div>
												</div>
												<!--/ End Single Blog -->
												</div>

												';

											}



											?>

										</div>

										<?php if ($stmt->rowCount()>0){ 

										}else{
											echo '<div class="alert alert-primary text-center" role="alert">
											No hay ofertas de trabajos publicadas
											</div>';
										}

										?>


										<br>
										<center>
											<a href="todas-las-ofertas" class="bizwheel-btn theme-1 effect">Ver todas las ofertas</a>
										</center>
									</div>
								</div>
							</div>
						</section>
						<!--/ End Latest Blog -->
						<br><br>

						<div class="container">
							<div class="row">
								<div class="col-12">
									<div class="section-title style2 text-center">
										<div class="section-top">
											<h1 id="titulos"><span>??Qu?? esperas!</span><b>??Marque la diferencia con su curr??culum en l??nea!</b></h1>
										</div>
										<div class="section-bottom">
											<div class="text-style-two">
												<p>Cualquier tipo de informaci??n que est?? relacionada con tus datos personales no ser?? compartida ni publicada en esta plataforma.</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>


						<section class="about-us section-space">
							<div class="container">
								<div class="row">
									<div class="col-lg-5 offset-lg-1 col-md-6 col-12">
										<!-- About Video -->
										<div class="modern-img-feature">
											<img src="img/crea_tu_cuenta_2.jpg" alt="crea tu cuenta mundo empleo" >

										</div>
										<!--/End About Video  -->
									</div>
									<div class="col-lg-5 col-md-6 col-12">
										<div class="about-content section-title default text-left">
											<div class="section-top">
												<h1 id="titulos"><span><h5 style="color: white;">Crea tu cuenta</h5></span><b>Registrate gratis.</b></h1>
											</div>
											<div class="section-bottom">
												<br>
												<li>Crea tu perfil profesional.</li><br>
												<li>??Busca oportunidades!</li><br>
												<li>Post??late a las mejores ofertas </li><br>
												<li>Facil y sencillo.</li><br>
												<li>Listo.</li>


												<div class="button">
													<a href="crear-cuenta-empresarial" class="bizwheel-btn theme-2">Crea Cuenta<i class="fa fa-angle-right"></i></a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</section>


						<?php include_once 'templates/footer.php'; ?>
						<?php include_once 'templates/script.php'; ?>

