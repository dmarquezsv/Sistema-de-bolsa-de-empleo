<body id="bg">

	<a href="https://api.whatsapp.com/send?phone=503########&amp;text=Hola Mundo Empleo necesito más información a cerca de sus servicios." class="float" target="_blank">
		<i class="fa fa-whatsapp my-float"></i>
	</a>

	<a href="https://www.instagram.com/" class="float2" target="_blank">
		<i class="fa fa-instagram my-float2"></i>
	</a>

	<!-- Boxed Layout -->
	<div id="page" class="site boxed-layout"> 
		
		<!-- Preloader -->
		<div class="preeloader">
			<div class="preloader-spinner"></div>
		</div>
		<!--/ End Preloader -->

		<!-- Header -->
		<header class="header">
			<!-- Topbar -->
			<div class="topbar">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 col-12">
							<!-- Top Contact -->
							<div class="top-contact">
								<div class="single-contact"><i class="fa fa-phone" id="iconosAmarrillo"></i><b>Tel: +(503) 2222 - 22222</b></div> 
								<div class="single-contact"><i class="fa fa-envelope-open" id="iconosAmarrillo" ></i><b>Email: info@yoursite.com</b></div>	
								<div class="single-contact"><i class="fa fa-clock-o"  id="iconosAmarrillo"></i><b>Apertura: 08AM - 09PM</b></div> 
							</div>
							<!-- End Top Contact -->
						</div>	
						<div class="col-lg-4 col-12">
							<div class="topbar-right">

								<div class="button">
									<?php if(isset($_SESSION['iduser'])){ 
										
										if($cargoCuentaLanding == "Candidato"){
											echo '<a href="Dashboard/Candidato/" class="bizwheel-btn">'.$PrimerNombre[0].' '.$PrimerApellido[0].'</a>';	
										}else if($cargoCuentaLanding == "Empresa"){
											echo '<a href="Dashboard/Empresa/" class="bizwheel-btn">'.$PrimerNombre[0].' '.$PrimerApellido[0].'</a>';	
										}else if($cargoCuentaLanding =="Soporte"){
											echo '<a href="Dashboard/Soporte/" class="bizwheel-btn">'.$PrimerNombre[0].' '.$PrimerApellido[0].'</a>';	
										}
										
									} 
									else{
										echo '<a href="login-candidato" class="bizwheel-btn">Inicio Candidatos</a>';
										echo '<a href="login-empresa" class="bizwheel-btn">Acceso Empresas</a>';	
									}
									?>
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Menu -->
			<div class="middle-header">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<div class="middle-inner">
								<div class="row">
									<div class="col-lg-2 col-md-3 col-12">
										<!-- Logo -->
										<div class="logo">
											<!-- Image Logo -->
											<div class="img-logo">
												<a href="./">
													<img src="assets/recusosMundoEmpleo/logomundoempleo.png" alt="bolsa de empleo" style="height: 55px; ">
												</a>
											</div>
										</div>								
										<div class="mobile-nav"></div>
									</div>
									<div class="col-lg-10 col-md-9 col-12">
										<div class="menu-area">
											<!-- Main Menu -->
											<nav class="navbar navbar-expand-lg">
												<div class="navbar-collapse">	
													<div class="nav-inner">	
														<div class="menu-home-menu-container">
															<!-- Naviagiton -->
															<ul id="nav" class="nav main-menu menu navbar-nav">

																<li><a href="./">Institucional</a></li>

																<li class="icon-active"><a href="empresa">Empresa</a>
																	<ul class="sub-menu">
																		<li><a href="login-empresa">Panel Empresa</a></li>
																		<li><a href="crear-cuenta-empresarial">Crear Cuenta</a></li>
																		<li><a href="servicios-empresariales">Servicios Empresarialess</a></li>
																		<li><a href="divisiones-especializadas">Divisiones Especializadas</a></li>
																		<li><a href="preguntas-frecuentes-empresa">Preguntas frecuentes </a></li>
																	</ul>
																</li>

																<li class="icon-active"><a href="candidato">Candidatos</a>
																	<ul class="sub-menu">
																		<li><a href="login-candidato">Panel Candidato</a></li>
																		<li><a href="crear-cuenta-candidato">Crear Cuenta</a></li>
																		<li class="top-search"><a href="todas-las-ofertas">Buscar Empleos</a></li>
																		<li><a href="preguntas-frecuentes-candidato">Preguntas frecuentes </a></li>
																	</ul>
																</li>
															
																<li><a href="contacto">Contacto</a></li>

															</ul>
															<!--/ End Naviagiton -->
														</div>
													</div>
												</div>
											</nav>
											<!--/ End Main Menu -->	
											<!-- Right Bar -->
											<div class="right-bar">
												
											</div>	
											<!--/ End Right Bar -->
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

