<?php
include_once '../../BD/Conexion.php';
include_once '../../BD/Consultas.php';
include_once 'templates/head.php';
$Conexion = new Consultas();
include_once 'templates/validar-perfil.php';

if($VerificaUsuarioExperiencia == 0){
	header('location: experiencia?advertencia=1');   
}

$ResultIdiomas = $Conexion->ejecutar_consulta_conteo("usuarios_idiomas","IDUsuario",$IDUser);
$ResultHabilidades = $Conexion->ejecutar_consulta_conteo("usuarios_habilidades","IDUsuario",$IDUser);
$ResultTecnicas = $Conexion->ejecutar_consulta_conteo("usuarios_conocimentos","IDUsuario",$IDUser);


$sql ="SELECT IDIdioma,Idioma , Nivel FROM `usuarios_idiomas` WHERE IDUsuario = ?";
$stmt = $Conexion->ejecutar_consulta_simple_Where($sql , $IDUser);

$sql2 ="SELECT IDHabilidad , AH.Nombre 'Habilidad' , Nivel FROM usuarios_habilidades UH INNER JOIN soporte_areas_habilidades AH ON UH.IDHabilidades = AH.IDHabilidades WHERE IDUsuario = ?";
$stmt2 = $Conexion->ejecutar_consulta_simple_Where($sql2 , $IDUser);

$sql3 ="SELECT IDConocimientos , AE.Nombre 'Tecnica' , Nivel FROM usuarios_conocimentos UC INNER JOIN soporte_areas_experiencia AE ON UC.IDTipo = AE.IDTipo WHERE IDUsuario = ?";
$stmt3 = $Conexion->ejecutar_consulta_simple_Where($sql3 , $IDUser);

$sql5 = "SELECT * FROM `soporte_areas_experiencia`";
$stmt5 = $Conexion->ejecutar_consulta_simple($sql5);

$sql6 = "SELECT * FROM `soporte_areas_habilidades`";
$stmt6 = $Conexion->ejecutar_consulta_simple($sql6);


?>
<title>Candidato | habilidades</title>
<?php 
include_once 'templates/styles.php';
include_once 'templates/MenuRight.php';
include_once 'templates/MenuLeft.php';
include_once 'templates/header.php';
?>
<style type="text/css">
	#imgbanner{

		background: url('../assets/media/photos/Habilidades.jpg');
		background-repeat: no-repeat;
		background-size: cover;
		height: auto;
	}
</style>

<main id="main-container">

	<div class="bg-image bg-image-bottom" id="imgbanner" >
		<div>
			<div class="content content-top text-center overflow-hidden">
				<div class="pt-40 pb-20">
					<h3 class="font-size-h2 font-w300 mt-20"  data-toggle="appear" data-class="animated flipInY" id="titulos" style="color: white;">Habilidades </h3>
				</div>
			</div>
		</div>
	</div>

	<div class="bg-body-white border-b">
		<div class="content py-5 text-center">
			<nav class="breadcrumb bg-body-white mb-0 barraMenu">
				<a class="breadcrumb-item" href="javascript:void(0)"><b>Perfil</b></a>
				<span class="breadcrumb-item active"><b>Área habilidades</b></span>
			</nav>
		</div>
	</div>

	<br>
	<div class="content py-5 text-center">
		<br>
		<a href="./" class="btn btn-rounded btn-noborder btn-alt-primary mr-5 mb-5"> <i class="si si-action-undo fa-2x5"> </i> Ir al panel</a>
		<a href="experiencia-laboral" class="btn btn-rounded btn-noborder btn-alt-primary mr-5 mb-5"> <i class="si si-action-undo fa-2x5"> </i> Retroceder</a>
		<a href="referencia-trabajo" class="btn btn-rounded btn-noborder btn-alt-primary mr-5 mb-5"> <i class="si si-action-redo fa-2x5"> </i> Siguiente</a>
	</div>
	<br>

	<div style="margin-right:2%; margin-left:2%;">


		<div class="row gutters-tiny">
			<!-- Basic Info -->
			<div class="col-md-7">

				<div class="block block-rounded block-themed">
					<div class="block-header bg-gd-primary">
						<h3 class="block-title">Área habilidades</h3>
						<div class="block-options">

							

						</div>
					</div>
					<div class="block-content block-content-full">
						<div class="alert alert-primary text-justify indicaciones" role="alert">
							<i class="fa fa-info-circle fa-2x5 text-dark"></i>  Indicaciones: <?php echo $PrimerNombre[0] ." ". $PrimerApellido[0]; ?>: En esta sección deberás añadir tus habilidadess tales como <b style="color:#0B3486;">idiomas , habilidades personales , habilidades técnicas la cuál puedes añadir hasta 5 habilidades de cada uno</b>. 
						</div>
					</div>
				</div>


				<div class="block block-rounded block-themed">
					<div class="block-header bg-gd-primary">
						<h3 class="block-title">Idiomas</h3>
						<div class="block-options">
							<form action="Modelos/ModelosIdiomas/NuevoIdioma2.php" method="POST">
								<input type="hidden" name="Iduser" value="<?php echo $IDUser; ?>">
							</div>
						</div>
						<div class="block-content block-content-full">
							<?php if ($ResultIdiomas == 5) {
								echo '<div class="alert alert-warning" role="alert">
								Se agreado 5 idiomas por lo tanto ya no podrás agregar otro, Si desea agregar deberás eliminar.
								</div>';
							} ?>
							<div class="form-group row">
								<label class="col-12" for="example-select2">Seleccione el idioma*</label>
								<div class="col-12" id="pais">
									<!-- Select2 (.js-select2 class is initialized in Helpers.select2()) -->
									<!-- For more info and examples you can check out https://github.com/select2/select2 -->
									<select class="js-select2 form-control" id="example-select2" name="Idioma" style="width: 100%;" data-placeholder="Selecciona una opción" required>
										<option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
										<option value="Español">Español</option>
										<option value="Inglés">Inglés</option>
										<option value="Chino">Chino</option>
										<option value="Árabe">Árabe </option>
										<option value="Portugués">Portugués</option>
										<option value="Indonesio/Malayo">Indonesio/Malayo</option>
										<option value="Francés">Francés</option>
										<option value="Japonés">Japonés</option>
										<option value="Ruso ">Ruso</option>
										<option value="Alemán">Alemán</option>
										<option value="Chino mandarín">Chino mandarín</option>
										<option value="Hindi">Hindi</option>
										<option value="Bengalí">Bengalí</option>
										<option value="Panyabí">Panyabí</option>
										<option value="latín"> latín</option>
										<option value="Otro">Otro</option>
									</select>
								</div>
							</div>


							<div class="form-group row">
								<label class="col-12" for="example-select2">Seleccione el nivel*</label>
								<div class="col-12" id="pais">
									<!-- Select2 (.js-select2 class is initialized in Helpers.select2()) -->
									<!-- For more info and examples you can check out https://github.com/select2/select2 -->
									<select class="js-select2 form-control" id="example-select3" name="NivelEstudio" style="width: 100%;" data-placeholder="Selecciona una opción" required>
										<option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
										<option value="Nativo">Nativo</option>
										<option value="Básico">Básico</option>
										<option value="Intermedio">Intermedio</option>
										<option value="Avanzado">Avanzado</option>
									</select>
								</div>
							</div>

							<?php if ($ResultIdiomas == 5) {
									echo "<button type='button' class='btn  btn-block btn-alt-primary' name='' disabled>
									<i class='fa fa-close mr-5'></i>
									</button>";

								}
								else{
									echo "<button type='submit' class='btn  btn-block btn-alt-primary' name='Guardar'>
									<i class='fa fa-save mr-5'></i>Guardar
									</button>";
								} 
								?>

						</form>
					</div>
				</div>

				<div class="block block-rounded block-themed">
					<div class="block-header bg-gd-primary">
						<h3 class="block-title">Habilidades Personales</h3>
						<div class="block-options">
							<form action="Modelos/ModelosHabilidades/NuevaHabilidad2.php" method="POST">
								<input type="hidden" name="Iduser2" value="<?php echo $IDUser; ?>">
							</div>
						</div>
						<div class="block-content block-content-full">
							<?php if ($ResultHabilidades == 5) {
								echo '<div class="alert alert-warning" role="alert">
								Se agreado 5 habilidades personales por lo tanto ya no podrás agregar otro, Si desea agregar deberás eliminar.
								</div>';
							} ?>

							<div class="form-group row">
								<label class="col-12" for="example-select2">Seleccione las habilidades*</label>
								<div class="col-12" id="pais">
									<!-- Select2 (.js-select2 class is initialized in Helpers.select2()) -->
									<!-- For more info and examples you can check out https://github.com/select2/select2 -->
									<select class="js-select2 form-control" id="example-select7" name="IDhabilidad" style="width: 100%;" data-placeholder="Selecciona una opción" required>
										<option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
										<?php 
										while ($item=$stmt6->fetch())
										{
											echo "<option value=".$item['IDHabilidades'].">".$item['Nombre']."</option>";
										}

										?>
									</select>
								</div>
							</div>


							<div class="form-group row">
								<label class="col-12" for="example-select2">Seleccione el nivel*</label>
								<div class="col-12" id="pais">
									<!-- Select2 (.js-select2 class is initialized in Helpers.select2()) -->
									<!-- For more info and examples you can check out https://github.com/select2/select2 -->
									<select class="js-select2 form-control" id="example-select8" name="NivelHabilidad" style="width: 100%;" data-placeholder="Selecciona una opción" required>
										<option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
										<option value="Básico">Básico</option>
										<option value="Intermedio">Intermedio</option>
										<option value="Avanzado">Avanzado</option>
									</select>
								</div>
							</div>

							<?php if ($ResultHabilidades == 5) {
									echo "<button type='button' class='btn  btn-block btn-alt-primary' name='' disabled>
									<i class='fa fa-close mr-5'></i>
									</button>";

								}
								else{
									echo "	<button type='submit' class='btn  btn-block btn-alt-primary' name='GuardarHabilida'>
									<i class='fa fa-save mr-5'></i>Guardar
									</button>";
								} 
								?>
						</form>	
					</div>
				</div>




				<div class="block block-rounded block-themed">
					<div class="block-header bg-gd-primary">
						<h3 class="block-title">Habilidades Técnicas</h3>
						<div class="block-options">
							<form action="Modelos/ModelosTecnicos/NuevaTecnica2.php" method="POST"> 
								<input type="hidden" name="Iduser3" value="<?php echo $IDUser; ?>">
							</div>
						</div>
						<div class="block-content block-content-full">
							<?php if ($ResultTecnicas == 5) {
								echo '<div class="alert alert-warning" role="alert">
								Se agreado 5 habilidades técnicas por lo tanto ya no podrás agregar otro, Si desea agregar deberás eliminar.
								</div>';
							} ?>

							<div class="form-group row">
								<label class="col-12" for="example-select2">Seleccione la área*</label>
								<div class="col-12" id="pais">
									<!-- Select2 (.js-select2 class is initialized in Helpers.select2()) -->
									<!-- For more info and examples you can check out https://github.com/select2/select2 -->
									<select class="js-select2 form-control" id="example-select4" name="IDTecnica" style="width: 100%;" data-placeholder="Selecciona una opción" required>
										<option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
										<?php 
										while ($item=$stmt5->fetch())
										{
											echo "<option value=".$item['IDTipo'].">".$item['Nombre']."</option>";
										}

										?>
									</select>
								</div>
							</div>


							<div class="form-group row">
								<label class="col-12" for="example-select2">Seleccione el nivel*</label>
								<div class="col-12" id="pais">
									<!-- Select2 (.js-select2 class is initialized in Helpers.select2()) -->
									<!-- For more info and examples you can check out https://github.com/select2/select2 -->
									<select class="js-select2 form-control" id="example-select5" name="NivelTecnica" style="width: 100%;" data-placeholder="Selecciona una opción" required>
										<option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
										<option value="Básico">Básico</option>
										<option value="Intermedio">Intermedio</option>
										<option value="Avanzado">Avanzado</option>
									</select>
								</div>
							</div>

								<?php if ($ResultTecnicas == 5) {
									echo "<button type='button' class='btn  btn-block btn-alt-primary' name='' disabled>
									<i class='fa fa-close mr-5'></i>
									</button>";

								}
								else{
									echo "	<button type='submit' class='btn  btn-block btn-alt-primary' name='GuardarTecnica'>
									<i class='fa fa-save mr-5'></i>Guardar
									</button>";
								} 
								?>

						</form>
					</div>
				</div>






			</div>
			<!-- END Basic Info -->


			<!-- More Options -->
			<div class="col-md-5">
				<!-- Area de Idiomas -->
				<div class="block block-rounded block-themed">
					<div class="block-header bg-gd-primary">
						<h3 class="block-title">Listas de Idiomas de <?php echo $PrimerNombre[0]; ?> </h3>

					</div>
					<div class="block-content block-content-full">

						<?php 

						if ($ResultIdiomas >=1) {?>

							<table class="table table-borderless table-vcenter">
								<thead>
									<tr>
										<th class="text-center" style="width: 50px;">#</th>
										<th>Especialidad</th>
										<th>Nivel</th>
										<th class="text-center" style="width: 100px;">Acciones</th>
									</tr>
								</thead>
								<tbody>

									<?php 
									$n=1;
									while ($item=$stmt->fetch())
									{
										echo "<tr class='table-active'>
										<th class='text-center' scope='row'>".$n."</th>
										<td>".$item['Idioma']."</td>
										<td>".$item['Nivel']."</td>
										<td class='text-center'>
										<div class='btn-group'>
										<button type='button'  class='btn btn-sm btn-alt-primary js-tooltip-enabled' data-toggle='modal' data-target='#exampleModal'  id='val".$n."' value=".base64_encode($item['IDIdioma']).">
										<i class='fa fa-times'></i> Eliminar
										</button>

										</div>
										</td>
										</tr>";
										$n++;
									}

									?>

								</tbody>
							</table>


							<?php 
						}else{
							echo $PrimerNombre[0] . "  aún no has agregado Idiomas.";
						}
						?>


					</div>
				</div>
				<!-- Fin de Area de Idiomas -->

				<!-- Habilidades Personales-->
				<div class="block block-rounded block-themed">
					<div class="block-header bg-gd-primary">
						<h3 class="block-title">Listas de Habilidades Personales de <?php echo $PrimerNombre[0]; ?> </h3>

					</div>
					<div class="block-content block-content-full">

						<?php 

						if ($ResultHabilidades >=1) {?>

							<table class="table table-borderless table-vcenter">
								<thead>
									<tr>
										<th class="text-center" style="width: 50px;">#</th>
										<th>Especialidad</th>
										<th>Nivel</th>
										<th class="text-center" style="width: 100px;">Acciones</th>
									</tr>
								</thead>
								<tbody>

									<?php 
									$n=1;
									while ($item=$stmt2->fetch())
									{
										echo "<tr class='table-active'>
										<th class='text-center' scope='row'>".$n."</th>
										<td>".$item['Habilidad']."</td>
										<td>".$item['Nivel']."</td>
										<td class='text-center'>
										<div class='btn-group'>
										<button type='button'  class='btn btn-sm btn-alt-primary js-tooltip-enabled' data-toggle='modal' data-target='#exampleModal2'  id='valor".$n."' value=".base64_encode($item['IDHabilidad']).">
										<i class='fa fa-times'></i> Eliminar
										</button>                  
										</div>
										</td>
										</tr>";
										$n++;
									}

									?>

								</tbody>
							</table>


							<?php 
						}else{
							echo $PrimerNombre[0] . " Aún no has agregado habilidades Personales.";
						}
						?>

					</div>
				</div>
				<!-- Fin Habilidades Personales-->

				<!-- Area Habilidades Professionales-->
				<div class="block block-rounded block-themed">
					<div class="block-header bg-gd-primary">
						<h3 class="block-title">Listas de Habilidades técnicas  de <?php echo $PrimerNombre[0]; ?> </h3>

					</div>
					<div class="block-content block-content-full">

						<?php 

						if ($ResultTecnicas >=1) {?>

							<table class="table table-borderless table-vcenter">
								<thead>
									<tr>
										<th class="text-center" style="width: 50px;">#</th>
										<th>Especialidad</th>
										<th>Nivel</th>
										<th class="text-center" style="width: 100px;">Acciones</th>
									</tr>
								</thead>
								<tbody>

									<?php 
									$n=1;
									while ($item=$stmt3->fetch())
									{
										echo "<tr class='table-active'>
										<th class='text-center' scope='row'>".$n."</th>
										<td>".$item['Tecnica']."</td>
										<td>".$item['Nivel']."</td>
										<td class='text-center'>
										<div class='btn-group'>
										<button type='button'  class='btn btn-sm btn-alt-primary js-tooltip-enabled' data-toggle='modal' data-target='#exampleModal3'  id='valores".$n."' value=".base64_encode($item['IDConocimientos']).">
										<i class='fa fa-times'></i> Eliminar
										</button>                           
										</div>
										</td>
										</tr>";
										$n++;
									}

									?>

								</tbody>
							</table>


							<?php 
						}else{
							echo $PrimerNombre[0] . " Aún no has agregado habilidades técnicas.";
						}
						?>


					</div>
				</div>
				<!-- Fin de Area Habilidades Professionales-->



			</div>




			<!-- Modal Idioma-->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Eliminar el idioma</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<p>Seguro que desea eliminar</p>
							<form action="Modelos/ModelosIdiomas/EliminarIdioma2.php" method="POST">
								<input type="text" name="" id="Nombre" class="form-control"  disabled="true">
								<input type="hidden" name="IDEliminar"  id="IDEliminar">
							</div>	
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
								<input type="submit" name="EliminarIdioma" value="Eliminar" class="btn btn-danger">

							</div>
						</form>
					</div>
				</div>
			</div>

			<!--Modal Habilidades Personales-->
			<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Eliminar Habilidad Personal</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<p>Seguro que desea eliminar</p>
							<form action="Modelos/ModelosHabilidades/EliminarHabilidad2.php" method="POST">
								<input type="text" name="" id="Habilidad" class="form-control"  disabled="true">
								<input type="hidden" name="IDhabilidad"  id="IDhabilidad">
							</div>	
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
								<input type="submit" name="EliminarHabilidad" value="Eliminar" class="btn btn-danger">

							</div>
						</form>
					</div>
				</div>
			</div>

			<!--Modal Habilidades Tecnica-->
			<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Eliminar Habilidad Técnica</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<p>Seguro que desea eliminar</p>
							<form action="Modelos/ModelosTecnicos/EliminarTecnica2.php" method="POST">
								<input type="text" name="" id="Tecnica" class="form-control"  disabled="true">
								<input type="hidden" name="IDTecnica"  id="IDTecnica">
							</div>	
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
								<input type="submit" name="EliminarTecnica" value="Eliminar" class="btn btn-danger">

							</div>
						</form>
					</div>
				</div>
			</div>



		</main>

		<br>
		<div class="content py-5 text-center">
			<br>
			<a href="./" class="btn btn-rounded btn-noborder btn-alt-primary mr-5 mb-5"> <i class="si si-action-undo fa-2x5"> </i> Ir al panel</a>
			<a href="experiencia-laboral" class="btn btn-rounded btn-noborder btn-alt-primary mr-5 mb-5"> <i class="si si-action-undo fa-2x5"> </i> Retroceder</a>
			<a href="referencia-trabajo" class="btn btn-rounded btn-noborder btn-alt-primary mr-5 mb-5"> <i class="si si-action-redo fa-2x5"> </i> Siguiente</a>
		</div>
		<br>

		<?php if (isset($_GET['notificar'])) {?>
			<!-- Onboarding Modal functionality is initialized in js/pages/be_pages_dashboard.min.js which was auto compiled from _es6/pages/be_pages_dashboard.js -->
			<div class="modal fade" id="modal-onboarding" tabindex="-1" role="dialog" aria-labelledby="modal-onboarding" aria-hidden="true">
				<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-popout" role="document">
					<div class="modal-content rounded">
						<div class="block block-rounded block-transparent mb-0 bg-pattern" style="background-image: url('assets/media/various/bg-pattern-inverse.png');">
							<div class="block-header justify-content-end">
								<div class="block-options">
									<a class="font-w600 text-danger" href="#" data-dismiss="modal" aria-label="Close">
										Salir
									</a>
								</div>
							</div>
							<div class="block-content block-content-full">

								<div class="pb-50">
									<div class="row justify-content-center text-center">
										<div class="col-md-10 col-lg-8">
											<img src="../../assets/recusosMundoEmpleo/logo.png" class="img-fluid" style="height: 100px; width: 250px;" data-toggle="appear" data-class="animated flipInY">
											<h3 class="font-size-h2 font-w300 mt-20" data-toggle="appear" data-class="animated flipInY" id="titulos" style="color: #0B3486;">Habilidades </h3>
											<p class="text-muted" style="text-align: justify;" data-toggle="appear" data-class="animated fadeInUp">
												<?php echo $PrimerNombre[0] ." ". $PrimerApellido[0]; ?>: Deberas agregar tus habilidades ya sea en idiomas , habilidades personales por lo tanto son obligatorio para continuar el proceso y habilidades técnicas es opcional. 
												<br><br>
												Solo se puede añadir 5 de cada de uno por lo tanto ya no podras agregar otro, Si desea agregar debera eliminar.
												<br><br>
												<b style="color: #0B3486;">Nota: Una vez agreado sus habilidades debera dar clic en boton siguiente para añadir sus referencias.</b>
											</p>



										</div>
									</div>
								</div>



							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- END Onboarding Modal -->
		<?php }  ?>



		<?php if (isset($_GET['advertencia'])) {?>
			<!-- Onboarding Modal functionality is initialized in js/pages/be_pages_dashboard.min.js which was auto compiled from _es6/pages/be_pages_dashboard.js -->
			<div class="modal fade" id="modal-onboarding" tabindex="-1" role="dialog" aria-labelledby="modal-onboarding" aria-hidden="true">
				<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-popout" role="document">
					<div class="modal-content rounded">
						<div class="block block-rounded block-transparent mb-0 bg-pattern" style="background-image: url('assets/media/various/bg-pattern-inverse.png');">
							<div class="block-header justify-content-end">
								<div class="block-options">
									<a class="font-w600 text-danger" href="#" data-dismiss="modal" aria-label="Close">
										Salir
									</a>
								</div>
							</div>
							<div class="block-content block-content-full">

								<div class="pb-50">
									<div class="row justify-content-center text-center">
										<div class="col-md-10 col-lg-8">
											<img src="../../assets/img/icono/icono-advertencia.png" class="img-fluid" s  data-toggle="appear" data-class="animated flipInY" class="img-fluid" style="width: 100px; height: 100px;">
											<h3 class="font-size-h2 font-w300 mt-20"  data-toggle="appear" data-class="animated flipInY" id="titulos" style="color: #0B3486;">no hay Habilidades </h3>
											<p class="text-muted" style="text-align: justify;" data-toggle="appear" data-class="animated fadeInUp">
												<?php echo $PrimerNombre[0] ." ". $PrimerApellido[0]; ?>: Deberas agregar por lo <b>menos un  idiomas y una habilida personal</b> ya que es requesito completar el formulario para para poder continuar con el proceso. 
												<br><br>
												<b style="color: #0B3486;">Nota: Una vez agreado sus habilidades debera dar clic en boton siguiente para añadir sus referencias.</b>
											</p>



										</div>
									</div>
								</div>



							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- END Onboarding Modal -->
		<?php }  ?>



		<?php include_once 'templates/footer.php';
		include_once 'templates/script.php';
		include_once '../../templates/alertas.php';
		?>

		<script type="text/javascript">

			window.onload=function(){
				$("table tbody tr").click(function(){
        // Tomar la captura la información  de la tabla 
        var nombre= $(this).find("td:eq(0)").text(); 
        document.getElementById('Nombre').value=nombre;  

        var habilidades = $(this).find("td:eq(0)").text(); 
        document.getElementById('Habilidad').value=habilidades; 

        var Tecnica = $(this).find("td:eq(0)").text(); 
        document.getElementById('Tecnica').value=Tecnica; 

    });    
			}

			$(".btn-group button").click(function(){

				var IDEliminar =$('#IDEliminar').val($(this).val());
				var IDHabilidad =$('#IDhabilidad').val($(this).val());
				var IDHabilidad =$('#IDTecnica').val($(this).val());

			})


		</script>
