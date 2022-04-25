<?php
include_once '../../BD/Conexion.php';
include_once '../../BD/Consultas.php';
include_once '../../main/funcionesApp.php';
include_once 'templates/head.php';
$Conexion = new Consultas();
$FuncionesApp = new funcionesApp();

//Consulta para extraer los paies
$sql = "SELECT * FROM `soporte_paises` ORDER BY `soporte_paises`.`Nombre` ASC ";
$stmt = $Conexion->ejecutar_consulta_simple($sql);


//Conusltas  para extrear los tipos de experiencia
$sql2 = "SELECT * FROM `soporte_tipo_experiencia`";
$stmt2 = $Conexion->ejecutar_consulta_simple($sql2);



$sql4 = "SELECT * FROM `soporte_paises` ORDER BY `soporte_paises`.`Nombre` ASC ";
$stmt4 = $Conexion->ejecutar_consulta_simple($sql4);



$sql6 = "SELECT * FROM `soporte_paises` ORDER BY `soporte_paises`.`Nombre` ASC ";
$stmt6 = $Conexion->ejecutar_consulta_simple($sql6);

$sql7 = "SELECT * FROM `soporte_areas_trabajos` ORDER BY `soporte_areas_trabajos`.`Nombre` ASC";
$stmt7 = $Conexion->ejecutar_consulta_simple($sql7);




$sql9 = "SELECT * FROM `soporte_areas_trabajos` ORDER BY `soporte_areas_trabajos`.`Nombre` ASC";
$stmt9 = $Conexion->ejecutar_consulta_simple($sql9);

$sql11 = "SELECT * FROM `facultades`";
$stmt11 = $Conexion->ejecutar_consulta_simple($sql11);

$sql12 = "SELECT * FROM `facultades`";
$stmt12 = $Conexion->ejecutar_consulta_simple($sql12);

include_once 'templates/seguridadCpanel.php';
?>
<title>Empresa | Reclutador</title>
<style type="text/css">


 th
 {
  font-size: 10px;
  font-family: sans-serif;
  font-weight: normal;

}

td{
 font-size: 12px;
 font-family: sans-serif;
 font-weight: normal;
}


</style>
<?php 
include_once 'templates/styles.php';
include_once 'templates/MenuRight.php';
include_once 'templates/MenuLeft.php';
include_once 'templates/header.php';
?>



<main id="main-container">

  <div class="bg-image bg-image-bottom" style="background-image: url('../assets/media/photos/photo34@2x.jpg');">
    <div class="bg-primary-dark-op">
      <div class="content content-top text-center overflow-hidden">
        <div class="pt-40 pb-20">
          <center> <img src="../../assets/img/logo/logo2_footer.png" data-toggle="appear" data-class="animated bounceInDown"> </center>
          <h1 class="font-w700 text-white mb-10 invisible" data-toggle="appear" data-class="animated fadeInUp">Mundo Empleo</h1>
          <h2 class="h4 font-w400 text-white-op invisible" data-toggle="appear" data-class="animated fadeInUp">Búsqueda De Candidatos</h2>
        </div>
      </div>
    </div>
  </div>

  <div class="bg-body-light border-b">
    <div class="content py-5 text-center">
      <nav class="breadcrumb bg-body-light mb-0">
        <a class="breadcrumb-item" href="candidatos">candidatos</a>
        <span class="breadcrumb-item active">Búsqueda de perfiles</span>
      </nav>
    </div>
  </div>

  <div class="content py-5 text-cente">
    <a href="index" class="btn btn-primary">
     <i class="si si-action-undo fa-2x5"></i>
     regresar
   </a>
   <a class="btn btn-primary" href="javascript:void(0)" data-toggle="modal" data-target="#modal-terms2">
    <i class="si si-magnifier fa-2x5"> </i>Utilizar Filtros
  </a>
  <a href="candidatos-vistos" class="btn btn-primary">Perfiles vistos</a>
  <a href="#" class="btn btn-primary">Candidatos Recientes</a>
  <a href="#" class="btn btn-primary">Candidatos sin perfiles</a>
</div>

<div class="border-b">
  <div class="content py-5 text-center">
    <nav class="breadcrumb mb-0">
      <i class="fa fa-info-circle" style="font-size: 20px;"></i> 
      <p>Indicaciones:</p> <p> Para la búsqueda de oferta debe digitar una o varias frases que coincidan con las(s) oferta(s) que desea encontrar.</p>
    </nav>
  </div>
</div>

<div style="margin-right:2%; margin-left:2%;">

  <div class="block" >
    <div class="block-content block-content-full"><br>

      <div class="row">
        <div class="col-lg-12">
          <div class="table-responsive">        
            <table id="tablaUsuarios" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th class="text-center"></th>
                  <th>Nombre</th>
                  <th>edad</th>
                  <th></th>
                  <th>Pais / Departamento</th>
                  <th>Salario</th>
                  <th>Experiencia</th>
                  <th>Años Experiencias</th>
                  <th>última Experiencia</th>
                  <th>N° Experiencia</th>
                  <th>Último Estudio</th>
                  <th>N° Estudios</th>
                  <th>Opciones</th>
                </tr>
              </thead>
              <tbody>                           
              </tbody>        
            </table>               
          </div>
        </div>
      </div>  
      

      <!--
      <div id="resultcandidatos"></div>
    -->
  </div>
</div>

</div>

</main>


<!-- Terms Modal -->
<div class="modal fade" id="modal-terms2" tabindex="-1" role="dialog" aria-labelledby="modal-terms" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-slidedown" role="document" style=" max-width: 1300px;">
    <div class="modal-content">
      <div class="block block-themed block-transparent mb-0">
        <div class="block-header bg-primary-dark">
          <h3 class="block-title">Filtros</h3>
          <div class="block-options">
            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
              <i class="si si-close"></i>
            </button>
          </div>
        </div>
        <div class="block-content">
          <div class="block">
            <div class="block-content block-content-full">

              <h4>Datos Generales</h4><hr>

              <div class="row">

               <div class="col-sm">

                 <label>vehículo propio</label>
                 <select class="form-control" id="Vehiculo" name="Vehiculo">
                  <option selected disabled value="">Seleccione</option>
                  <option value="Si">Si</option>
                  <option value="No">No</option>
                </select>

                <label>Licencia</label>
                <select class="form-control" id="Licencia" name="Licencia">
                  <option selected disabled value="">Seleccione</option>
                  <option value="Si">Si</option>
                  <option value="No">No</option>
                </select>

                <label>vehículo especifico</label>
                <select class='form-control' name="TipoVehiculo" id="TipoVehiculo" >
                 <option selected value="" disabled>Seleccione</option>
                 <option value="automóviles">automóviles</option>
                 <option value="motocicletas">motocicletas</option>
                 <option value="automóviles y Motocicleta">automóviles y Motocicleta</option>
                 <option value="vehículos para transporte de personas">vehículos para transporte de personas</option>
                 <option value="camiones de carga">camiones de carga</option>
                 <option value="vehículos agrícolas">vehículos agrícolas</option>
                 <option value="vehículos industriales">vehículos industriales</option>
                 <option value="Indiferente">Indiferente</option>
               </select>

             </div>


             <div class="col-sm">

               <label>Genero</label>
               <select class="form-control" id="genero" name="genero">
                <option selected disabled value="">Seleccione</option>
                <option value="F">Femenino</option>
                <option value="M">Masculino</option>
                <option value="Indiferente">Indiferente</option>
              </select>

              <label>Rango edad</label><br>
              <input type="number" name="edadmenor" id="edadmenor" min="18" max="100" placeholder="Menor" class="form-control">
              <input type="number" name="edadmayor" id="edadmayor" min="18" max="100" placeholder="Mayor" class="form-control">

              <label>Salario</label><br>
              <input type="number" name="salariomenor" id="salariomenor" min="1"  placeholder="Menor" class="form-control">
              <input type="number" name="salariomayor" id="salariomayor" min="1"  placeholder="Mayor" class="form-control">

            </div>


            <div class="col-sm">
             <label>Pais de residencia</label>
             <div  id="pais">
              <!-- Select2 (.js-select2 class is initialized in Helpers.select2()) -->
              <!-- For more info and examples you can check out https://github.com/select2/select2 -->
              <select class="js-select2 form-control pais" id="example-select2" name="OrigenPais" style="width: 100%;" data-placeholder="Selecciona una opción" >
                <option></option>
                <?php 
                while ($item=$stmt->fetch())
                {
                 echo "<option value=".$item['IDPais'].">".$item['Nombre']."</option>";
               }

               ?>
             </select>
           </div>
           <div id="resultDepartamento"></div>


           <label>Discapacidad</label>
           <select class="form-control" id="Discapacidad" name="Discapacidad">
            <option selected disabled value="">Seleccione</option>
            <option value="Si">Si</option>
            <option value="No">No</option>
          </select>

          <label>Foto</label>
          <select class='form-control' id="Foto" name="Foto">
            <option selected value="" disabled>Seleccione</option>
            <option value="No">No</option>
            <option value="Si">Si</option>
            <option value="Indiferente">Indiferente</option>
          </select>

          <label>Situación Actual</label>
          <select class='form-control' id="SituacionActual" name="SituacionActual">
            <option selected value="" disabled>Seleccione</option>
            <option value="Estudiando">Estudiando </option>
            <option value="Trabajando">Trabajando </option>
            <option value="Estudiando y trabajando">Estudiando y trabajando </option>
            <option value="Pasantía/Práctica">Pasantía/Práctica </option>
            <option value="Voluntariado">Voluntariado </option>
            <option value="Ninguna">Ninguna </option>
            <option value="Indiferente">Indiferente</option>
          </select>

        </div>


        <div class="col-sm">

         <label>Tipo de contratación</label><br>
         <select class='form-control' id="Disponibilidad" name="Disponibilidad" >
          <option selected value="" disabled>Seleccione</option>
          <option value="Disponibilidad completa">Disponibilidad completa</option>
          <option value="Medio tiempo">Medio tiempo</option>
          <option value="Temporal">Temporal</option>
          <option value="Freelance">Freelance</option>
          <option value="Freelance">Freelance</option>
          <option value="Pasantía">Pasantía</option>
          <option value="Por horas">Por horas</option>
          <option value="Por proyecto">Por proyecto</option>
          <option value="Por comisión">Por comisión</option>
          <option value="Independiente">Independiente</option>
          <option value="Indiferente">Indiferente</option>
        </select>

        <label>Experienca Professional</label>
        <select class='form-control' name="ExperiencaProfessional" id="ExperiencaProfessional" >
         <option selected value="" disabled>Seleccione</option>
         <option value="Si">Si</option>
         <option value="No">No</option>
         <option value="Indiferente">Indiferente</option>
       </select>

       <label>Años de experiencia</label>
       <select class="form-control" id="AreaExperiencia" name="AreaExperiencia" style="width: 100%;" data-placeholder="Selecciona una opción" >
        <option selected disabled value="">Seleccione</option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
        <?php 
        while ($item=$stmt2->fetch())
        {
         echo "<option value=".$item['IDAreaExperiencia'].">".$item['Nombre']."</option>";
       }

       ?>
     </select>

     <label>Educación Secundaria</label>
     <select class='form-control' name="EducacionSecundaria" id="EducacionSecundaria" >
       <option selected value="" disabled>Seleccione</option>
       <option value="Completa">Completa</option>
       <option value="Incompleta">Incompleta</option>
       <option value="Indiferente">Indiferente</option>
     </select>
   </div>
   <!--Fin de los datos Generales-->
 </div>

 <h4>Estudios</h4><hr>

 <div class="row">

   <div class="col-sm">
     <label>Nivel Alcanzado</label>
     <select class='form-control' name="NivelEstudio" id="NivelEstudio">
      <option selected value='' disabled>Seleccione</option>
      <option value="Doctorado Completo">Doctorado Completo</option>
      <option value="Estudiante de Doctorado">Estudiante de Doctorado</option>
      <option value="vehículos para transporte de personas">Doctorado Incompleto</option>
      <option value="camiones de carga">Master/Magister/Maestría Completa</option>
      <option value="vehículos agrícolas">Estudiante de Master/Magister/Maestría</option>
      <option value="vehículos industriales">Master/Magister/Maestría Incompleta</option>
      <option value="No tengo">Post-Grado Completo</option>
      <option value="Estudiante de Post-Grado">Estudiante de Post-Grado</option>
      <option value="Post-Grado Incompleto">Post-Grado Incompleto</option>
      <option value="Estudiante de Post-Grado">Estudiante de Post-Grado</option>
      <option value="Universidad Completa/Graduado">Universidad Completa/Graduado</option>
      <option value="Egresado de Universidad">Egresado de Universidad</option>
      <option value="Universidad Incompleta">Universidad Incompleta</option>
      <option value="Pausas de Estudios">Pausas de Estudios</option>
      <option value="Técnico Completo">Técnico Completo</option>
      <option value="Estudiante de Técnico">Estudiante de Técnico</option>
      <option value="Técnico Incompleto">Técnico Incompleto</option>
      <option value="Bachillerato Completo">Bachillerato Completo</option>
      <option value="Bachillerato Incompleto">Bachillerato Incompleto</option>
      <option value="Certificación">Certificación</option>
      <option value="Diplomado">Diplomado</option>
      <option value="Becado">Becado</option>
      <option value="Estudios Inferiores Completo">Estudios Inferiores Completo</option>
      <option value="Estudios Inferiores Incompleto">Estudios Inferiores Incompleto</option>
      <option value="Primaria">Primaria</option>
    </select>

  </div>

  <div id="PrimerFaculta" class="col-sm">
   <label>Facultad</label>
   <select class='form-control' name="Facultad1" id="Facultad1">
    <option selected value='' disabled>Seleccione</option>
    
    <?php 
    while ($item=$stmt11->fetch())
    {
     echo "<option value=".$item['IDFacultates'].">".$item['Nombre']."</option>";
   }

   ?>
   <option value='Indiferente'>Indiferente</option>
 </select>

</div>

<div class="col-sm"> 


  <div id="resultCarrera1"></div>
  
</div>

<div class="col-sm"> 
  <label>País de estudio</label>
  <select class="form-control" id="paisEstudio" name="paisEstudio"  >
   <option selected value='' disabled>Seleccione</option>
   <?php 
   while ($item=$stmt4->fetch())
   {
     echo "<option value=".$item['IDPais'].">".$item['Nombre']."</option>";
   }

   ?>
 </select>
</div>

</div>


<div class="row">

 <div class="col-sm">
   <label>Nivel Alcanzado</label>
   <select class='form-control' name="NivelEstudio" id="NivelEstudio">
    <option selected value='' disabled>Seleccione</option>
    <option value="Doctorado Completo">Doctorado Completo</option>
    <option value="Estudiante de Doctorado">Estudiante de Doctorado</option>
    <option value="vehículos para transporte de personas">Doctorado Incompleto</option>
    <option value="camiones de carga">Master/Magister/Maestría Completa</option>
    <option value="vehículos agrícolas">Estudiante de Master/Magister/Maestría</option>
    <option value="vehículos industriales">Master/Magister/Maestría Incompleta</option>
    <option value="No tengo">Post-Grado Completo</option>
    <option value="Estudiante de Post-Grado">Estudiante de Post-Grado</option>
    <option value="Post-Grado Incompleto">Post-Grado Incompleto</option>
    <option value="Estudiante de Post-Grado">Estudiante de Post-Grado</option>
    <option value="Universidad Completa/Graduado">Universidad Completa/Graduado</option>
    <option value="Egresado de Universidad">Egresado de Universidad</option>
    <option value="Universidad Incompleta">Universidad Incompleta</option>
    <option value="Pausas de Estudios">Pausas de Estudios</option>
    <option value="Técnico Completo">Técnico Completo</option>
    <option value="Estudiante de Técnico">Estudiante de Técnico</option>
    <option value="Técnico Incompleto">Técnico Incompleto</option>
    <option value="Bachillerato Completo">Bachillerato Completo</option>
    <option value="Bachillerato Incompleto">Bachillerato Incompleto</option>
    <option value="Certificación">Certificación</option>
    <option value="Diplomado">Diplomado</option>
    <option value="Becado">Becado</option>
    <option value="Estudios Inferiores Completo">Estudios Inferiores Completo</option>
    <option value="Estudios Inferiores Incompleto">Estudios Inferiores Incompleto</option>
    <option value="Primaria">Primaria</option>
  </select>

</div>

<div id="PrimerFaculta2" class="col-sm">
 <label>Facultad</label>
 <select class='form-control' name="Facultad2" id="Facultad2">
  <option selected value='' disabled>Seleccione</option>

  <?php 
  while ($item=$stmt12->fetch())
  {
   echo "<option value=".$item['IDFacultates'].">".$item['Nombre']."</option>";
 }

 ?>
 <option value='Indiferente'>Indiferente</option>
</select>

</div>

<div  class="col-sm"> 
  <div id="resultcarrera2"></div>
</div>


<div class="col-sm"> 
  <label>País de estudio</label>
  <select class="form-control" id="paisEstudio2" name="paisEstudio"  >
   <option selected value='' disabled>Seleccione</option>
   <?php 
   while ($item=$stmt6->fetch())
   {
     echo "<option value=".$item['IDPais'].">".$item['Nombre']."</option>";
   }

   ?>
 </select>
</div>

</div>

<br>

<div class="row">

 <div class="col-sm">
  <table>
    <tr>
      <td>Buscar por especialidad </td>
      <td><input type="text" name="especialidad" id="especialidad" class="form-control" placeholder="palabra clave"></td>
    </tr>
  </table>
  
</div>

<div class="col-sm">

  <br>
  <div class="form-check">
    <input class="form-check-input" type="checkbox" value="activarDosEstudios" id="activarDosEstudios" >
    <label class="form-check-label" for="defaultCheck2">
      Habilitar dos estudios obligatorios
    </label>
  </div>

</div>

</div>

<br>
<h4>Experiencia</h4><hr>

<div class="row">

 <div class="col-sm">

  <div id="areaempresa">
    <label>Áreas laborales</label>
    <select class="js-select2 form-control" id="example-select4" name="areaempresa" style="width: 100%;" data-placeholder="Selecciona una opción">
      <option></option>

      <?php 
      while ($item=$stmt7->fetch())
      {
       echo "<option value=".$item['IDCategoria'].">".$item['Nombre']."</option>";
     }

     ?>
   </select>
 </div>

</div>

<div class="col-sm">
  <div id="resultCargos"></div>
</div>



</div>



<div class="row">

 <div class="col-sm">

  <div id="areaempresa2">
    <label>Áreas laborales</label>
    <select class="js-select2 form-control" id="example-select4AreaEmpresa" name="areaempresa" style="width: 100%;" data-placeholder="Selecciona una opción">
      <option></option>

      <?php 
      while ($item=$stmt9->fetch())
      {
       echo "<option value=".$item['IDCategoria'].">".$item['Nombre']."</option>";
     }

     ?>
   </select>
 </div>

</div>

<div class="col-sm">
  <div id="resultCargos2"></div>
</div>

</div>

<br>
<div class="row">

 <div class="col-sm">
  <table>
    <tr>
      <td>Cargo ejercido o Puesto de trabajo</td>
      <td><input type="text" name="especialidad" id="especialidad" class="form-control" placeholder="palabra clave"></td>
    </tr>
  </table>
  
</div>

<div class="col-sm">


  <div class="form-check">
    <input class="form-check-input" type="checkbox" value="HabilitarDosExperiencia" id="HabilitarDosExperiencia" >
    <label class="form-check-label" for="defaultCheck2">
      Habilitar dos experiencia obligatorios
    </label>
  </div>

</div>

</div>


<br>
<h4>Idiomas</h4><hr>

<div class="row">
 <div class="col-sm">
  <label>Idioma</label>
  <select class="form-control">
    <option value="" disabled="" selected>Seleccione</option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
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
<div class="col-sm">
  <label>Nivel</label>
  <select class="form-control">
    <option value="" disabled="" selected>Seleccione</option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
    <option value="Nativo">Nativo</option>
    <option value="Básico">Básico</option>
    <option value="Intermedio">Intermedio</option>
    <option value="Avanzado">Avanzado</option>
  </select>
</div>
</div>


<div class="row">
 <div class="col-sm">
  <label>Idioma</label>
  <select class="form-control">
    <option value="" disabled="" selected>Seleccione</option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
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
<div class="col-sm">
  <label>Nivel</label>
  <select class="form-control" >
    <option value="" disabled="" selected>Seleccione</option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
    <option value="Nativo">Nativo</option>
    <option value="Básico">Básico</option>
    <option value="Intermedio">Intermedio</option>
    <option value="Avanzado">Avanzado</option>
  </select>
</div>
</div>

<br>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="HabilitarDosIdiomas" id="HabilitarDosIdiomas" >
  <label class="form-check-label" for="defaultCheck2">
    Habilitar dos idiomas obligatorios
  </label>
</div>

</div>
</div>
</div>

<div class="modal-footer">

  <button  class='btn btn-alt-primary' name='btnbuscar' id="btnbuscar" value="buscar">
    <i class='si si-magnifier mr-5'></i>Buscar
  </button>
  <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Cerrar</button>
</div>

</div>
</div>
</div>
</div>
</div>
<!-- END Terms Modal -->




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
      url: 'Modelos/ModelosPaises/BuscarDepartamentosRecluator.php' ,
      type: 'POST' ,
      dataType: 'html',
      data: {consulta: consulta},
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

  
  $(document).ready(function() {
    $('#areaempresa2').on('change', '#example-select4AreaEmpresa', function() {
      var selected3 = $('#example-select4AreaEmpresa option:selected');
      var value3 = selected3.val();
        //var price = selected.data('price');

        if (value3 != "") {

         buscargar_cargos2(value3);
       }

     })
  });


  $(buscargar_cargos());

  function buscargar_cargos(consulta){
    $.ajax({
      url: 'Modelos/ModelosCargos/buscarcargos3.php' ,
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


  $(buscargar_cargos2());

  function buscargar_cargos2(consulta){

    $.ajax({
      url: 'Modelos/ModelosCargos/buscarcargos2.php' ,
      type: 'POST' ,
      dataType: 'html',
      data: {consulta: consulta},
    })
    .done(function(respuesta){
      $("#resultCargos2").html(respuesta);
    })
    .fail(function(){
      console.log("error");
    });

  }



//Funcione para buscar las carreras para primera busqueda de carreras
$(document).ready(function() {
  $('#PrimerFaculta').on('change', '#Facultad1', function() {
    var seleccionFacultad1 = $('#Facultad1 option:selected');
    var evaluarFacultad1 = seleccionFacultad1.val();

    if (evaluarFacultad1 != "") {

     buscar_carreras1(evaluarFacultad1);
   }

 })
});


$(buscar_carreras1());
function buscar_carreras1(consulta){

  $.ajax({
    url: 'Modelos/carreras/mostar-carreras.php' ,
    type: 'POST' ,
    dataType: 'html',
    data: {consulta: consulta},
  })
  .done(function(respuesta){
    $("#resultCarrera1").html(respuesta);
  })
  .fail(function(){
    console.log("error");
  });

}
//Funcione para buscar las carreras


//Funcione para buscar las carreras para primera busqueda de carreras2
$(document).ready(function() {
  $('#PrimerFaculta2').on('change', '#Facultad2', function() {
    var seleccionFacultad2 = $('#Facultad2 option:selected');
    var evaluarFacultad2 = seleccionFacultad2.val();

    if (evaluarFacultad2 != "") {

     buscar_carreras2(evaluarFacultad2);
   }

 })
});



$(buscar_carreras2());
function buscar_carreras2(consulta){

  $.ajax({
    url: 'Modelos/carreras/mostrar-carreras2.php' ,
    type: 'POST' ,
    dataType: 'html',
    data: {consulta: consulta},
  })
  .done(function(respuesta){
    $("#resultcarrera2").html(respuesta);
  })
  .fail(function(){
    console.log("error");
  });

}



//Funcione para buscar las carreras





$(mostrarCandidatos(""));


function mostrarCandidatos(buscar,IDPAIS, IDDepartamento,educacionSecundaria,genero,licenciaConducir,vehiculo, tipoVehiculo , discapacidad , ExperienciaLaboral , yearsExpiriencia , disponibilidad, SituacionActual,foto,edadmenor,edadmayor,salarioMenor,salarioMayor){

  alert(foto);

  tablaUsuarios = $('#tablaUsuarios').DataTable({  
    "ajax":{            
      "url": "Modelos/candidatos/candidatos.php", 
        "method": 'POST', //usamos el metodo POST
        "data":{buscar:buscar,IDPAIS:IDPAIS,IDDepartamento:IDDepartamento,educacionSecundaria:educacionSecundaria,genero:genero,licenciaConducir:licenciaConducir,
          vehiculo:vehiculo,tipoVehiculo:tipoVehiculo,discapacidad:discapacidad,ExperienciaLaboral:ExperienciaLaboral,yearsExpiriencia:yearsExpiriencia,disponibilidad:disponibilidad,SituacionActual:SituacionActual,foto:foto,edadmenor:edadmenor,edadmayor:edadmayor,salarioMenor:salarioMenor,salarioMayor:salarioMayor
        }, //enviamos opcion 4 para que haga un SELECT
        "dataSrc":""
      },
      "columns":[
      {"data": "Foto"},
      {"data": "nombre"},
      {"data": "edad"},
      {"data": "genero"},
      {"data": "Pais"},
      {"data": "salario"},
      {"data": "ExperienciaLaboral"},
      {"data": "anosExperiencia"},
      {"data": "cargo"},
      {"data": "TotalExperiencia"},
      {"data": "NivelEstudio"},
      {"data": "TotalEstudios"},
      {"data": "cv"},

      ]
    });

}




$("#btnbuscar").click(function(){

  var table = $('#tablaUsuarios').DataTable();
  table.destroy();

  //Logica para datos genereles
  var pais = $('.pais option:selected');
  var evaluarPais = pais.val();

  var departamento = $('#IDDepartemento option:selected');
  var evaluarDepartamento = departamento.val();

  var educacionSecundaria = $('#EducacionSecundaria option:selected');
  var evaluareducacionSecundaria = educacionSecundaria.val();

  var genero = $('#genero option:selected');
  var evaluarGenero =  genero.val();

  var licencia = $('#Licencia option:selected');
  var evaluarLicencia =  licencia.val();

  var vehiculo = $('#Vehiculo option:selected');
  var evaluarVehiculo =  vehiculo.val();

  var tipoVehiculo = $('#TipoVehiculo option:selected');
  var evaluarTipoVehiculo =  tipoVehiculo.val();

  var discapacidad = $('#Discapacidad option:selected');
  var evaluardiscapacidad =  discapacidad.val();

  var experiencaProfessional = $('#ExperiencaProfessional option:selected');
  var evaluarExperiencaProfessional =  experiencaProfessional.val();

  var areaExperiencia = $('#AreaExperiencia option:selected');
  var evaluarareaExperiencia =  areaExperiencia.val();

  var disponibilidad = $('#Disponibilidad option:selected');
  var evaluardisponibilidad =  disponibilidad.val();

  var situacionActual = $('#SituacionActual option:selected');
  var evaluarsituacionActual =  situacionActual.val();


  var foto = $('#Foto option:selected');
  var evaluarfoto =  foto.val();

  var evaluaredadmenor =$('#edadmenor').val();
  var evaluaredadmayor =$('#edadmayor').val();

  var evaluarsalariomenor =$('#salariomenor').val();
  var evaluarsalariomayor =$('#salariomayor').val();

//fin Logica general de los datos generales


  alert(evaluarfoto);


  $(mostrarCandidatos("buscar",evaluarPais , evaluarDepartamento , evaluareducacionSecundaria,evaluarGenero,evaluarLicencia,evaluarVehiculo,evaluarTipoVehiculo,evaluardiscapacidad,evaluarExperiencaProfessional , evaluarareaExperiencia,evaluardisponibilidad,evaluarsituacionActual,evaluarfoto,evaluaredadmenor,evaluaredadmayor,evaluarsalariomenor,evaluarsalariomayor));




});

</script>


