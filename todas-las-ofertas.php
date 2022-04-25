<?php 
include_once 'BD/Conexion.php';
include_once 'BD/Consultas.php';
include_once 'main/funcionesApp.php'; 

$Conexion = new Consultas();
$FuncionesApp = new funcionesApp();

$sql2 = "SELECT * FROM `soporte_paises` ORDER BY `soporte_paises`.`Nombre` ASC ";
$stmt2 = $Conexion->ejecutar_consulta_simple($sql2);

$sql3 = "SELECT * FROM `soporte_areas_trabajos` ORDER BY `soporte_areas_trabajos`.`Nombre` ASC ";
$stmt3 = $Conexion->ejecutar_consulta_simple($sql3);

$sql4 = "SELECT * FROM `soporte_tipo_experiencia`";
$stmt4 = $Conexion->ejecutar_consulta_simple($sql4);

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

	.btn-primary{
		background: #0B3486;
		border-color: white;
	}

	.btn-primary:hover{

		background: #FCC201;
		font-weight: bold;
	}

	#btn-oferta{

		background: #FCC201;
		padding: 7px;
		border-radius: 7px;
		color: white;
		font-weight: bold;
	}

	#btn-oferta:hover{
		background: #0B3486;
		font-weight: bold;
	}

	.pagination-plugin span, .pagination-plugin a, .pagination-plugin a:focus {
		background: #2e2751;
	}

	.pagination-plugin li.current a, .pagination-plugin li:hover a {
		background: #FCC201;
	}

	.hero-slider .hero-text h4{
		background: #0B3486;
	}

	#imgbanner{

		background: url('img/bannercadaservicio/Amarillo/portada-trabajo.jpg');
		background-repeat: no-repeat;
		background-size: cover;
		

	}

	th
	{
		font-size: 12px;
		font-family: sans-serif;
		font-weight: normal;

	}

	td{
		font-size: 12px;
		font-family: sans-serif;
		font-weight: normal;
	}


</style>

<!-- Hero Slider -->
<section class="hero-slider style1">

	<!-- Single Slider -->
	<div  id="imgbanner">
		<div class="container">
			<div class="row">
				<div class="col-lg-7 col-md-8 col-12">
					<div class="welcome-text"> 
						<div class="hero-text"> 
							<h4 style="color: white;">Encuentra tu trabajo ideal con Mundo Empleo</h4>
							<h1 id="titulos">Encontrá tu próximo empleo.</h1>



							
							<div class="input-form">
								<div class="p-text">
									<p style="color: #0B3486;">Palabra clave de busqueda</p>
								</div>

								<input type="text" placeholder="Ej:ventas,diseño,Informática" id="busquedapalabra" class="form-control" style="padding: 10px;">
							</div>
							<div class="select-form">
								<div class="select-itms">
									<select name="select" id="selectPais" class="form-control">
										<option selected disabled value="">Seleccione el pais</option>
										<?php while ($item=$stmt2->fetch())
										{
											echo "<option value=".$item['IDPais'].">".$item['Nombre']."</option>";
										} 
										?>

									</select>
								</div>
							</div>
							<div class="button">
								<button class="bizwheel-btn theme-1 effect" style="background:#0B3486; height: 60px; width: 150px;" id="btnbuscar" >Buscar</button>

								<?php if(!isset($_SESSION['iduser'])){ ?>
									<a href="login-candidato" class="bizwheel-btn theme-2 effect" style="background:#0B3486;">Iniciar Sesión</a>
								<?php } ?>
								


							</div>


						</div>

					</div>
				</div>
			</div>
			<br><br>	<br><br>
		</div>

		

	</section>
	<!--/ End Hero Slider -->

	<br>
	<!-- Latest Blog -->
	<section class="latest-blog ">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
					<div class="section-title default text-center">
						<div class="section-top">
							<h1 id="titulos"><span>Publicaciones</span><b>Encontrá tu próximo empleo</b></h1>
						</div>

					</div>
				</div>
			</div>

			<div class="row">

				<div class="col-lg-4 col-md-4 col-12">
					<select class="form-control" id="selec-categoria" name="selec-categoria" style="width: 100%;" data-placeholder="Selecciona una área" >
						<option disabled selected value="">Seleccione una área</option>
						<option   value="Indiferente">Indiferente</option>
						<?php while ($item=$stmt3->fetch())
						{
							echo "<option value=".$item['IDCategoria'].">".$item['Nombre']."</option>";
						} 
						?>
						
					</select>
				</div>

				<div class="col-lg-4 col-md-4 col-12">


					<div id="resultCargos"></div>


				</div>

				<div class="col-lg-4 col-md-4 col-12">
					
					<select class="form-control" id="selec-experiencia" name="selec-experiencia" style="width: 100%;" data-placeholder="Selecciona una área" >
						<option disabled selected value="">Seleccione años de experiencias</option>
						<option   value="Indiferente">Indiferente</option>
						<?php while ($item=$stmt4->fetch())
						{
							echo "<option value=".$item['IDAreaExperiencia'].">".$item['Nombre']."</option>";
						} 
						?>
						
					</select>					

				</div>

			</div>

			<br><br>

			<div class="row">

				<div class="col-xl-12 col-lg-12 col-md-12">

					<div class="contenidos table-responsive">        
						<table id="tablaOfertas" class="table table-striped table-bordered table-hover">
							<thead>
								<tr class="text-center">

									<th>Empresa</th>
									<th>Plaza</th>
									<th>Categoria</th>
									<th>Cargo</th>
									<th>Contratación</th>
									<th>Pais</th>
									<th>Expira</th>
									<th>Opción</th>
								</tr>
							</thead>
							<tfoot>
								<tr  class="text-center">

									<th>Empresa</th>
									<th>Plaza</th>
									<th>Categoria</th>
									<th>Cargo</th>
									<th>Contratación</th>
									<th>Pais</th>
									<th>Expira</th>
									<th >Opción</th>

								</tr>
							</tfoot>
							<tbody  class="text-center">                           
							</tbody>        
						</table>               
					</div>


				</div>
			</div>

		</section>
		<!--/ End Latest Blog -->

		<br><br><br>

		<?php include_once 'templates/footer.php'; ?>
		<?php include_once 'templates/script.php'; ?>

		<script type="text/javascript">


			var evaluarcategoria="";
			var evaluarExperiencia="";
			var evaluarPais ="";
			var palabraClave = "";
			var evaluarcargo = "";

			$(mostrarOfertas(""));

			function mostrarOfertas(buscar, palabraClave, pais , evaluarcategoria , evaluarExperiencia , evaluarcargo){



				tablaUsuarios = $('#tablaOfertas').DataTable({ 
					"language": {
						"decimal": "",
						"emptyTable": "No hay información",
						"info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
						"infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
						"infoFiltered": "(Filtrado de _MAX_ total entradas)",
						"infoPostFix": "",
						"thousands": ",",
						"lengthMenu": "Mostrar _MENU_ Entradas",
						"loadingRecords": "Cargando...",
						"processing": "Procesando...",
						"search": "Buscar:",
						"zeroRecords": "Sin resultados encontrados",
						"paginate": {
							"first": "Primero",
							"last": "Ultimo",
							"next": "Siguiente",
							"previous": "Anterior"
						}}, 
						"ajax":{            
							"url": "main/publicaciones/ofertas-de-trabajos.php", 
						        "method": 'POST', //usamos el metodo POST
						        "data":{buscar:buscar,palabraClave:palabraClave,pais:pais,evaluarcategoria:evaluarcategoria,evaluarExperiencia:evaluarExperiencia,evaluarcargo:evaluarcargo
						        }, 
						        "dataSrc":""
						    },
						    "columns":[
						    {"data": "empresa"},
						    {"data": "plaza"},
						    {"data": "categoria"},
						    {"data": "cargo"},
						    {"data": "TipoContratacion"},
						    {"data": "pais"},
						    {"data": "expira"},
						    {"data": "enlace"},


						    ]

						});


			}




			$("#btnbuscar").click(function(){

				var table = $('#tablaOfertas').DataTable();
				table.destroy();

				  //Logica para datos genereles
				  var pais = $('#selectPais option:selected');
				  evaluarPais = pais.val();

				  palabraClave=$('#busquedapalabra').val();

				  $(mostrarOfertas("buscar",palabraClave , evaluarPais,evaluarcategoria,evaluarExperiencia,evaluarcargo));

				  var dest = $(".latest-blog").offset().top;
				  $("html, body").animate({scrollTop: dest});


				});


			$('#resultCargos').on('click', '#cargo', function(event) {



				var cargo = $('#cargo option:selected');
				evaluarcargo = cargo.val();


				if (evaluarcargo != "") {
					var table = $('#tablaOfertas').DataTable();
					table.destroy();
					$(mostrarOfertas("buscar",palabraClave , evaluarPais,evaluarcategoria,evaluarExperiencia,evaluarcargo));				
				}


			});







			$(document).on('change', '#selec-categoria', function(event) {
				var categoria = $('#selec-categoria option:selected');
				evaluarcategoria = categoria.val();

				if (evaluarcategoria != "") {

					var table = $('#tablaOfertas').DataTable();
					table.destroy();
					buscar_datos(evaluarcategoria);
					$(mostrarOfertas("buscar",palabraClave ,evaluarPais, evaluarcategoria,evaluarExperiencia,evaluarcargo));
				}


			});



			$(document).ready(function() {
				$(document).on('change', '#selec-experiencia', function() {

					var experiencia = $('#selec-experiencia option:selected');
					evaluarExperiencia = experiencia.val();


					if (evaluarExperiencia != "") {

						var table = $('#tablaOfertas').DataTable();
						table.destroy();

						$(mostrarOfertas("buscar",palabraClave ,evaluarPais, evaluarcategoria,evaluarExperiencia,evaluarcargo));
					}


				})
			});





			$(buscar_datos(""));

			function buscar_datos(consulta){
				$.ajax({
					url: 'main/publicaciones/cargos.php' ,
					type: 'POST' ,
					dataType: 'html',
					data: {consulta: consulta},
				})
				.done(function(respuesta){
					$("#resultCargos").html(respuesta);
				})
				.fail(function(){
					console.log("error");
				});
			}




		</script>