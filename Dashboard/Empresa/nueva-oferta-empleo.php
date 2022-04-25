<?php
include_once '../../BD/Conexion.php';
include_once '../../BD/Consultas.php';
include_once '../../main/funcionesApp.php';
include_once 'templates/head.php';
$Conexion = new Consultas();
$FuncionesApp = new funcionesApp();
include_once 'templates/seguridadCpanel.php';

//Consulta para extraer los paies
$sql = "SELECT PHE.IDPais , SP.Nombre FROM paises_habilitado_empresa PHE INNER JOIN soporte_paises SP ON PHE.IDPais = SP.IDPais WHERE `IDUsuario` = ?";
$stmt =  Conexion::conectar()->prepare($sql);
$stmt->execute(array($IDUser));


$sql2 = "SELECT * FROM `soporte_areas_trabajos` ORDER BY `soporte_areas_trabajos`.`Nombre` ASC";
$stmt2 = $Conexion->ejecutar_consulta_simple($sql2);

$sql3 = "SELECT * FROM `soporte_tipo_experiencia`";
$stmt3 = $Conexion->ejecutar_consulta_simple($sql3);

?>
<title>Oferta de empleo | Mundo Empleo CA </title>
<?php 
include_once 'templates/styles.php';
include_once 'templates/MenuRight.php';
include_once 'templates/MenuLeft.php';
include_once 'templates/header.php';
?>

<style type="text/css">

  #imgbanner{

    background: url('../assets/media/photos/ofertas_trabajos.jpg');
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
          <h3 class="font-size-h2 font-w300 mt-20"  data-toggle="appear" data-class="animated flipInY" id="titulos" style="color: white;">Crear una oferta de empleo</h3>
        </div>
      </div>
    </div>
  </div>


  <div style="margin-right:2%; margin-left:2%;" data-toggle="appear" data-class="animated bounceInLeft">
    <div class="row gutters-tiny">
      <!-- Basic Info -->
      <div class="col-md-7">
        <form action="Modelos/ModelosOfertasEmpleos/CrearOfertaEmpleo.php" method="POST">
          <input type="hidden" name="Iduser" id="Iduser" value="<?php echo$IDEmpresa; ?>"> 
          <div class="block block-rounded block-themed">
            <div class="block-header bg-gd-primary">
             
              <div id="status"></div>
              <div class="block-options">
                <a href="ofertas-empleos" class="btn btn-sm btn-alt-primary">Retroceder</a>
                <button class="btn btn-alt-primary"   id="Guardar" name="Guardar">
                  <i class="fa fa-save mr-5"></i>Guardar
                </button>

              </div>
            </div>
            <div class="block-content block-content-full">


              <p>IMPORTANTE: Los campos con asterisco (*) son obligatorios y deben ser completados para continuar con el proceso de registro.</p>

              <div class="form-group row">
                <label class="col-12" for="example-select2">Países en donde se publicará la oferta*</label>
                <div class="col-12" id="pais">
                  <!-- Select2 (.js-select2 class is initialized in Helpers.select2()) -->
                  <!-- For more info and examples you can check out https://github.com/select2/select2 -->
                  <select class="js-select2 form-control" id="example-select2" name="OrigenPais" style="width: 100%;" data-placeholder="Selecciona una opción" required>
                    <option value="<?php echo$IDPais; ?>"><?php echo$Pais; ?></option>

                    <?php 
                    while ($item=$stmt->fetch())
                    {
                     echo "<option value=".$item['IDPais'].">".$item['Nombre']."</option>";
                   }

                   ?>
                 </select>

               </div>
             </div>

             <div class="form-group row">
              <div class="col-12">
                <div id="resultDepartamento"></div>
              </div>
            </div>


            <div class="form-group row">
              <label class="col-12" for="example-select4">Seleccione la área de trabajo *</label>
              <div class="col-12" id="areaempresa">
                <!-- Select2 (.js-select2 class is initialized in Helpers.select2()) -->
                <!-- For more info and examples you can check out https://github.com/select2/select2 -->
                <select class="js-select2 form-control" id="example-select4" name="areaempresa" style="width: 100%;" data-placeholder="Selecciona una opción" required>
                  <option></option>

                  <?php 
                  while ($item=$stmt2->fetch())
                  {
                   echo "<option value=".$item['IDCategoria'].">".$item['Nombre']."</option>";
                 }

                 ?>
               </select>
             </div>
           </div>

           <div class="form-group row">
            <div class="col-12">
              <div id="resultCargos"></div>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-12">Nombre exacto del cargo*</label>
            <div class="col-12">
             <input type="text" class="form-control" name="nombrePlaza"  id="nombrePlaza" required maxlength="100"   placeholder="nombre exacto del cargo solo admite 100 caracteres">
           </div>
         </div>


         <div class="form-group row">
          <label class="col-12">Descripción de la plaza*</label>
          <div class="col-12">
           <textarea class="form-control" id="js-ckeditor" name="descripcion" placeholder="Main Description" rows="8" required></textarea>
         </div>
       </div>

     </div>
   </div>
 </div>
 <!-- END Basic Info -->

 <!-- More Options -->
 <div class="col-md-5">
  <!-- Status -->
  <div class="block block-rounded block-themed">
    <div class="block-header bg-gd-primary">
      <h3 class="block-title">Información adicional</h3>
    </div>
    <div class="block-content block-content-full">

      <div class="form-group row">
        <label class="col-12">Número de vacantes*</label>
        <div class="col-12">
          <input type="number" class="form-control" name="vacantes"  id="vacantes" required placeholder="Por favor,ingrese el n° de vacantes" min="1">
        </div>
      </div>


      <div class="form-group row">
        <label class="col-12">Tipo de contratación *</label>
        <div class="col-12">
         <select class='form-control' id="Disponibilidad" name="Disponibilidad" required>
          <option selected value="" disabled>Seleccione una opción</option>
          <option value="Disponibilidad completa">Disponibilidad completa</option>
          <option value="Medio tiempo">Medio tiempo</option>
          <option value="Temporal">Temporal</option>
          <option value="Freelance">Freelance</option>
          <option value="Pasantía">Pasantía</option>
          <option value="Por horas">Por horas</option>
          <option value="Por proyecto">Por proyecto</option>
          <option value="Por comisión">Por comisión</option>
          <option value="Independiente">Independiente</option>
          <option value="Remoto">Remoto</option>
          <option value="No Disponible">No Disponible</option>
        </select>
      </div>
    </div>


    <div class="form-group row">
      <label class="col-12">Género *</label>
      <div class="col-12">
       <label class="css-control css-control-primary css-radio">
        <input type="radio" class="css-control-input" Value="F" id="genero" name="genero" required>
        <span class="css-control-indicator"></span> Femenino
      </label>
      <label class="css-control css-control-secondary css-radio">
        <input type="radio" class="css-control-input "Value="M" id="genero" name="genero" required>
        <span class="css-control-indicator"></span> Masculino
      </label>
      <label class="css-control css-control-secondary css-radio">
        <input type="radio" class="css-control-input "Value="Indiferente" id="genero" name="genero" required>
        <span class="css-control-indicator"></span> Indiferente
      </label>
    </div>
  </div>

  <div class="form-group row">
    <label class="col-12">Rango de edades*</label>
    <div class="col-12">
     <label class="css-control css-control-primary css-radio">
      <input type="number" class="form-control" name="edadMenor"  id="edadMenor" required placeholder="Edad Menor" min="18">
      <span class="css-control-indicator"></span> Edad Menor
    </label>
    <label class="css-control css-control-secondary css-radio">
      <input type="number" class="form-control" name="edadMayor"  id="edadMayor" required placeholder="Edad Mayor" min="18">
      <span class="css-control-indicator"></span> Edad Mayor
    </label>

  </div>
</div>

<div class="form-group row">
  <label class="col-12">Rango Salarial*</label>
  <div class="col-12">
   <label class="css-control css-control-primary css-radio">
    <input type="number" class="form-control" name="salarioMinimo"  id="salarioMinimo"  placeholder="Salario Mínimo" min="0">
    <span class="css-control-indicator"></span> Salario Mínimo
  </label>
  <label class="css-control css-control-secondary css-radio">
    <input type="number" class="form-control" name="salarioMaximo"  id="salarioMaximo"  placeholder="Salario Mayor" min="0">
    <span class="css-control-indicator"></span> Salario Mayor
  </label>

</div>
</div>

<div class="form-group row">
  <label class="col-4">El candidato debe tener vehículo*</label>
  <div class="col-8">
   <label class="css-control css-control-primary css-radio">
    <input type="radio" class="css-control-input" Value="Requerido" id="Vehiculo" name="Vehiculo" required>
    <span class="css-control-indicator"></span> Requerido
  </label>
  <label class="css-control css-control-secondary css-radio">
    <input type="radio" class="css-control-input "Value="No Requerido" id="Vehiculo" name="Vehiculo" required>
    <span class="css-control-indicator"></span> No Requerido
  </label>

</div>
</div>





<div class="form-group row">
  <label class="col-12">El candidato debe tener conocimiento en vehículo en*</label>
  <div class="col-12">
   <select class='form-control' name="Manejo" required>
     <option selected value="" disabled>Seleccione una opción</option>
     <option value="automóviles">automóviles</option>
     <option value="motocicletas">motocicletas</option>
     <option value="automóviles y Motocicleta">automóviles y Motocicleta</option>
     <option value="vehículos para transporte de personas">vehículos para transporte de personas</option>
     <option value="camiones de carga">camiones de carga</option>
     <option value="vehículos agrícolas">vehículos agrícolas</option>
     <option value="vehículos industriales">vehículos industriales</option>
     <option value="Ninguno">Ninguno</option>
   </select>
 </div>
</div>

<div class="form-group row">
  <label class="col-12">El candidato debe  tener experiencia Professional*</label>
  <div class="col-12">
    <label class="css-control css-control-primary css-radio">
      <input type="radio" class="css-control-input" value="Si" id="ExperienciaUser" name="ExperienciaUser" required>
      <span class="css-control-indicator"></span> Si
    </label>
    <label class="css-control css-control-secondary css-radio">
      <input type="radio" class="css-control-input" Value="No" id="ExperienciaUser" name="ExperienciaUser" required>
      <span class="css-control-indicator"></span> No
    </label>
  </div>
</div>



<div class="form-group row">
  <label class="col-12">Experiencia laboral*</label>
  <div class="col-12">
   <select class='form-control' id="experiencia" name="experiencia" required>
    <option selected value="" disabled>Seleccione una opción</option>
    <?php 
    while ($item=$stmt3->fetch())
    {
     echo "<option value=".$item['IDAreaExperiencia'].">".$item['Nombre']."</option>";
   }
   ?>
 </select>
</div>
</div>


<div class="form-group row">
  <label class="col-12">Fecha Finalización*</label>
  <div class="col-12">
    <input type="date" class="form-control" name="expira"  id="expira" required placeholder="Por favor,ingrese la fecha de vencimiento" required>
  </div>
</div>


<div class="form-group row">
  <label class="col-12">Estado*</label>
  <div class="col-12">
   <select class='form-control' name="estado"  id="estado" required>
     <option selected value="" disabled>Seleccione una opción</option>
     <option value="Activo">Activo</option>
     <option value="Inactiva">Inactiva</option>
     <option value="Finalizado">Finalizado</option>
   </select>
 </div>
</div>

<button class="btn btn-block btn-alt-primary "   id="Guardar" name="Guardar">
  <i class="fa fa-save mr-5"></i>Guardar
</button>

</div>
</div>
</div>
</div>
</div>

</main>

</form>


<?php include_once 'templates/footer.php';
include_once 'templates/script.php';
include_once '../../templates/alertas.php';
?>

<script type="text/javascript">

  $(document).ready(function() {
    var idDepartamento =$('#departamentophp').val();
    var id = parseInt(idDepartamento);

    if (!id == "") {
     buscar_datos(id);
   }

 });


  $(document).ready(function() {
    $('#pais').on('change', '#example-select2', function() {
      var selected = $('#example-select2 option:selected');
      var value = selected.val();
        //var price = selected.data('price');
        if (value != "") {

         buscar_datos(value);
       }

     })
  });


  $(buscar_datos());

  function buscar_datos(consulta){
    $.ajax({
      url: 'Modelos/ModelosPaises/ModelosBuscarDepartamentos.php' ,
      type: 'POST' ,
      dataType: 'html',
      data: {consulta: consulta ,existeDepartamento : "" , nombreDepartamento: ""},
    })
    .done(function(respuesta){
      $("#resultDepartamento").html(respuesta);
    })
    .fail(function(){
      console.log("error");
    });
  }




  $(document).ready(function() {
    $('#areaempresa').on('change', '#example-select4', function() {
      var selected2 = $('#example-select4 option:selected');
      var value2 = selected2.val();
        //var price = selected.data('price');
        if (value2 != "") {

         buscargar_cargos(value2);
       }

     })
  });

  
  $(buscargar_cargos());

  function buscargar_cargos(consulta){
    $.ajax({
      url: 'Modelos/ModelosCargos/bucarcargos.php' ,
      type: 'POST' ,
      dataType: 'html',
      data: {consulta: consulta , existeCargo:"",existeNombreCargo: "" },
    })
    .done(function(respuesta){
      $("#resultCargos").html(respuesta);
    })
    .fail(function(){
      console.log("error");
    });
  }


</script>