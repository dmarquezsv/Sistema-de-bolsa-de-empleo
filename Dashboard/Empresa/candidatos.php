<?php
include_once '../../BD/Conexion.php';
include_once '../../BD/Consultas.php';
include_once '../../main/funcionesApp.php';
include_once 'templates/head.php';
$Conexion = new Consultas();
$FuncionesApp = new funcionesApp();

//Consulta para extraer los paies
$sql = "SELECT PHE.IDPais , SP.Nombre FROM paises_habilitado_empresa PHE INNER JOIN soporte_paises SP ON PHE.IDPais = SP.IDPais WHERE `IDUsuario` = ?";
$stmt =  Conexion::conectar()->prepare($sql);
$stmt->execute(array($IDUser));

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
<title>Búsqueda Candidatos | MUNDO EMPLEO CA</title>
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


#imgbanner{

  background: url('../assets/media/photos/busqueda-candidato.jpg');
  background-repeat: no-repeat;
  background-size: cover;
  height: auto;
}

</style>
<?php 
include_once 'templates/styles.php';
include_once 'templates/MenuRight.php';
include_once 'templates/MenuLeft.php';
include_once 'templates/header.php';
?>



<main id="main-container">

 <div class="bg-image bg-image-bottom" id="imgbanner" >
  <div>
    <div class="content content-top text-center overflow-hidden">
      <div class="pt-40 pb-20">
        <h3 class="font-size-h2 font-w300 mt-20"  data-toggle="appear" data-class="animated flipInY" id="titulos" style="color: white;">Búsqueda De Candidatos </h3>
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

<div class="content py-5 text-center">

  <br>
  <a href="./" class="btn  btn-rounded btn-noborder btn-alt-primary mr-5 mb-5"> <i class="si si-action-undo fa-2x5"> </i> Retroceder</a>

  <a href="javascript:void(0)" class="btn  btn-rounded btn-noborder btn-alt-primary mr-5 mb-5" data-toggle="modal" data-target="#modal-terms2"> <i class="si si-magnifier fa-2x5"> </i> Utilizar Filtros</a>

  <a href="candidatos-vistos" class="btn  btn-rounded btn-noborder btn-alt-primary mr-5 mb-5"> <i class="fa fa-user"> </i> Perfiles vistos</a>  

  <a href="javascript:void(0)" class="btn  btn-rounded btn-noborder btn-alt-primary mr-5 mb-5"  data-toggle="modal" data-target="#modal-terms3"> <i class="fa fa-exclamation-triangle fa-2x5"></i> </i> Instrucciones</a>

  <br><br>

  <div class="col-lg-12">

    <div class="alert alert-secondary text-left" role="alert" style="border-left: solid 5px; border-color: #FCC201; ">
     <i class="fa fa-info-circle fa-2x5"></i>  Indicaciones : Para realizar una busqueda debera digitar un cargo en el campo y la frase digitada apareceran los candidatos.<br>

   </div>


   <div  class="input-group buscadorEnvivo">
     <div class="input-group-prepend">
      <button type="button" class="btn btn-secondary" disabled>

        <i class="fa fa-search"></i>
      </button>
    </div>



    <input type="text" class="form-control" id="palabraClave" name="palabraClave" placeholder="BÚSQUEDA POR PALABRAS CLAVES">



  </div>
</div> 

<br>

</div>


<!-- Terms Modal -->
<div class="modal fade" id="modal-terms3" tabindex="-1" role="dialog" aria-labelledby="modal-terms3" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-slidedown" role="document">
    <div class="modal-content">
      <div class="block block-themed block-transparent mb-0">
        <div class="block-header bg-primary-dark">
          <h3 class="block-title">Indicaciones</h3>
          <div class="block-options">
            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
              <i class="si si-close"></i>
            </button>
          </div>
        </div>
        <div class="block-content">
          <div class="block">
            <div class="block-content block-content-full text-left">

              <p class="text-center">
               <img src="../../assets/recusosMundoEmpleo/logo.png" class="img-fluid" style="height: 100px; width: 250px;"  data-toggle="appear" data-class="animated flipInY">
               <h3 class="font-size-h2 font-w300 mt-20 text-center" data-toggle="appear" data-class="animated flipInY"  id="titulos" style="color: #0B3486;">Preguntas frecuentes </h3>
             </p>

             <p>1 Puede utilizar los filtros al dar clic en cada columna.</p>
             <p>2 Realiza busqueda por medio de palabras claves en la tabla de candidatos.</p>
             <p>3 Cada vez que seleccione o presione a un candidato de la fila cambiará a un color y luego en el nombre del candidato cambiará a color verde que significa que es un candidato visto.</p>
             <p>4 Si desea ver el perfil del candidato presione el nombre del candidato o el botón donde lo dirige al perfil.</p>
             <p>5 Al revisar un perfil habrá un historial de los candidatos vistos. Solo apareceran durante 15 días.</p>
             <p>6 Puede utilizar los filtros personalizados.</p>
             <p>7 Cada vez que realice una busqueda, perfil visto o seguimiento se le genera un reporte general.</p>
             <p>8 Se le genera un reporte cada vez que descarga un curriculum vitae o envia a un correo electrónico.</p>




             <p class="text-center">
               <button type="button" class="btn btn-sm btn-hero btn-noborder mb-10 mx-5" data-dismiss="modal" style="background:#FCC201; color:#0B3486; font-weight: bold;">Cerrar</button>
             </p>

             <br>

           </div>
         </div>

       </form>
     </div>
   </div>
 </div>
</div>
</div>
<!-- END Terms Modal -->




<div class="block">

  <div class="block-content block-content-full"><br>
    <div class="row">
      <div class="col-lg-12">
        <div class="contenidos table-responsive">        
          <table id="tablaUsuarios" class="table table-striped table-bordered">
            <thead>
              <tr class="text-center">
                <th></th>
                <th>Nombre</th>
                <th>edad</th>
                <th>Género</th>
                <th>País / Departamento</th>
                <th>Años Experiencias</th>
                <th>última Experiencia</th>
                <th>último Estudio</th>
                <th>Disponiblidad</th>
                <th>Situación Actual</th>
                <th>última Conexión</th>
                <th>Opciones</th>
              </tr>
            </thead>
            <tfoot>
              <tr  class="text-center">
               <th></th>
               <th>Nombre</th>
               <th>edad</th>
               <th>Género</th>
               <th>País / Departamento</th>
               <th>Años Experiencias</th>
               <th>última Experiencia</th>
               <th>último Estudio</th>
               <th>Disponiblidad</th>
               <th>Situación Actual</th>
               <th>última Conexión</th>
               <th>Opciones</th>
             </tr>
           </tfoot>
           <tbody  class="text-center">                           
           </tbody>        
         </table>               
       </div>
     </div>
   </div>  
 </div>

</div>



</main>


<!-- Terms Modal -->
<div class="modal fade"  id="modal-terms2" tabindex="-1" role="dialog" aria-labelledby="modal-terms" aria-hidden="true">
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

              <h4>Datos Generales</h4>


              <hr>

              <div class="row">
               <div class="col-sm">
                 <label>vehículo propio</label>
                 <select class="form-control" id="Vehiculo" name="Vehiculo">
                  <option selected disabled value="">Seleccione</option>
                  <option value="Si">Si</option>
                  <option value="No">No</option>
                  <option value="Indiferente">Indiferente</option>
                </select>

                <label>Licencia</label>
                <select class="form-control" id="Licencia" name="Licencia">
                  <option selected disabled value="">Seleccione</option>
                  <option value="Si">Si</option>
                  <option value="No">No</option>
                  <option value="Indiferente">Indiferente</option>
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

               <label>Género</label>
               <select class="form-control" id="genero" name="genero">
                <option selected disabled value="">Seleccione</option>
                <option value="F">Femenino</option>
                <option value="M">Masculino</option>
                <option value="Indiferente">Indiferente</option>
              </select>

              <br>

              <label>Rango edades</label><br>
              <input type="number" name="edadmenor" id="edadmenor" min="18" max="100" placeholder="Rango Menor edad" class="form-control"><br>
              <input type="number" name="edadmayor" id="edadmayor" min="18" max="100" placeholder="Rango Mayor edad" class="form-control"><br>

              <label>rangos salariales </label><br>

              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    $
                  </span>
                </div>
                <input type="number" name="salariomenor" id="salariomenor" min="1"  placeholder="Menor" class="form-control">
                <div class="input-group-append">
                  <span class="input-group-text">.00</span>
                </div>
              </div>
              <br>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    $
                  </span>
                </div>
                <input type="number" name="salariomayor" id="salariomayor" min="1"  placeholder="Mayor" class="form-control">
                <div class="input-group-append">
                  <span class="input-group-text">.00</span>
                </div>
              </div>   

            </div>


            <div class="col-sm">
             <label>País de residencia</label>
             <div  id="pais">
              <!-- Select2 (.js-select2 class is initialized in Helpers.select2()) -->
              <!-- For more info and examples you can check out https://github.com/select2/select2 -->
              <select class="js-select2 form-control pais" id="example-select2" name="OrigenPais" style="width: 100%;" data-placeholder="Selecciona una opción" >
                <option selected value="" disabled>Selecciona una opción</option>
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
            <option value="Indiferente">Indiferente</option>
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
          <option value="Pasantía">Pasantía</option>
          <option value="Por horas">Por horas</option>
          <option value="Por proyecto">Por proyecto</option>
          <option value="Por comisión">Por comisión</option>
          <option value="Independiente">Independiente</option>
          <option value="No Disponible">No Disponible</option>
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

     <br>

     <p class="text-right">
      <button  class='btn btn-alt-primary btnbuscar' name='btnbuscar'  value="buscar">
        <i class='si si-magnifier mr-5'></i>Buscar
      </button> 
    </p>

  </div>
  <!--Fin de los datos Generales-->
</div>

<h4>Estudios</h4>

<hr>


<div class="row">

 <div class="col-sm">
   <label>Nivel Alcanzado</label>
   <select class='form-control' name="NivelEstudio" id="NivelEstudio1">
    <option selected value='0' disabled>Seleccione</option>
    <option value="Doctorado Completo">Doctorado Completo</option>
    <option value="Estudiante de Doctorado">Estudiante de Doctorado</option>
    <option value="Doctorado Incompleto">Doctorado Incompleto</option>
    <option value="Master/Magister/Maestría Completa">Master/Magister/Maestría Completa</option>
    <option value="Estudiante de Master/Magister/Maestría">Estudiante de Master/Magister/Maestría</option>
    <option value="Master/Magister/Maestría Incompleta">Master/Magister/Maestría Incompleta</option>
    <option value="Post-Grado Completo">Post-Grado Completo</option>
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
 <select class='form-control' name="Facultad1" id="Facultad1" disabled>
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
  <label>País de estudio</label><br>
  <select class="form-control"  id="paisEstudio1" name="paisEstudio1" disabled>
   <option selected value="" disabled>Selecciona una opción</option>
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
   <select class='form-control' name="NivelEstudio" id="NivelEstudio2" disabled>
    <option selected value='' disabled>Seleccione</option>
    <option value="Doctorado Completo">Doctorado Completo</option>
    <option value="Estudiante de Doctorado">Estudiante de Doctorado</option>
    <option value="Doctorado Incompleto">Doctorado Incompleto</option>
    <option value="Master/Magister/Maestría Completa">Master/Magister/Maestría Completa</option>
    <option value="Estudiante de Master/Magister/Maestría">Estudiante de Master/Magister/Maestría</option>
    <option value="Master/Magister/Maestría Incompleta">Master/Magister/Maestría Incompleta</option>
    <option value="Post-Grado Completo">Post-Grado Completo</option>
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
 <select class='form-control' name="Facultad2" id="Facultad2" disabled>
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
  <select class="form-control" id="paisEstudio2" name="paisEstudio2"  disabled>
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

  <div class="col-sm-4">

   <div class="form-check">
    <input class="form-check-input" type="checkbox" value="activarDosEstudios" id="activarDosEstudios" >
    <label class="form-check-label" for="defaultCheck2">
      Habilitar segundo estudios
    </label>
  </div> 

  <br>

  
  <input type="text" name="especialidad" id="especialidad" class="form-control" placeholder="una palabra clave" disabled>

  <div class="form-check">
    <input class="form-check-input" type="checkbox" value="activarEspeciliadad" id="activarEspeciliadad" >
    <label class="form-check-label" for="defaultCheck2">
      Habilitar por especialidad
    </label>
  </div>


</div>





<div class="col-sm">
  <br><br><br>
  <p class="text-right">
    <button  class='btn btn-alt-primary btnbuscar' name='btnbuscar'  value="buscar">
      <i class='si si-magnifier mr-5'></i>Buscar
    </button> 
  </p>
</div>



</div>

<br>
<h4>Experiencia</h4><hr>

<div class="row">

  <div class="col-sm-6">

    <div id="areaempresa">
      <label>Áreas laborales</label>
      <select class="form-control" id="example-select4" name="areaempresa">
        <option selected value='' disabled>Seleccione</option>

        <?php 
        while ($item=$stmt7->fetch())
        {
         echo "<option value=".$item['IDCategoria'].">".$item['Nombre']."</option>";
       }

       ?>
     </select>
   </div>

 </div>

 <div class="col-sm-6">
  <div id="resultCargos"></div>
</div>



</div>



<div class="row">

 <div class="col-sm-6">

  <div id="areaempresa2">
    <label>Áreas laborales</label>
    <select class="form-control" id="example-select4AreaEmpresa" name="areaempresa"  disabled>
      <option selected value='' disabled>Seleccione</option>

      <?php 
      while ($item=$stmt9->fetch())
      {
       echo "<option value=".$item['IDCategoria'].">".$item['Nombre']."</option>";
     }

     ?>
   </select>
 </div>

</div>

<div class="col-sm-6">
  <div id="resultCargos2"></div>
</div>

</div>

<br>
<div class="row">

 <div class="col-sm-4">

  <div class="form-check">
    <input class="form-check-input" type="checkbox" value="HabilitarExpiriencia2" id="HabilitarExpiriencia" >
    <label class="form-check-label" for="defaultCheck2">
      Habilitar segunda experiencia
    </label>
  </div>

  <br>
  
  <input type="text" name="cargoEjercido" id="cargoEjercido" class="form-control" placeholder="Una Palabra clave" disabled>

  <div class="form-check">
    <input class="form-check-input" type="checkbox" id="habilitarCargo" >
    <label class="form-check-label" for="defaultCheck2">
      Habilitar Cargo ejercido o Puesto de trabajo
    </label>
  </div>

</div>



<div class="col-sm">
  <br><br><br>
  <p class="text-right">
    <button  class='btn btn-alt-primary btnbuscar' name='btnbuscar'  value="buscar">
      <i class='si si-magnifier mr-5'></i>Buscar
    </button> 
  </p>
</div>


</div>


<br>
<h4>Idiomas</h4><hr>

<div class="row">
 <div class="col-sm">
  <label>Idioma</label>
  <select class="form-control" id="idioma1">
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
  <select class="form-control" id="NivelIdioma1">
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
  <select class="form-control" id="Idioma2" disabled>
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
  <select class="form-control" id="NivelIdioma2" disabled>
    <option value="" disabled="" selected>Seleccione</option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
    <option value="Nativo">Nativo</option>
    <option value="Básico">Básico</option>
    <option value="Intermedio">Intermedio</option>
    <option value="Avanzado">Avanzado</option>
  </select>
</div>
</div>

<br>

<div class="row">



  <div class="col-sm">

    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="HabilitarDosIdiomas" id="habilitarIdioma" style="margin-left: 5px;">
      <label class="form-check-label" for="defaultCheck2" style="margin-left: 20px;">
        Habilitar segunda idioma
      </label>
    </div>

  </div>

</div>




</div>
</div>
</div>

<div class="modal-footer">

  <button  class='btn btn-alt-primary btnbuscar' name='btnbuscar'  value="buscar">
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


<script>

  $(document).ready(function() {

    $("#example-select2").select2({
      dropdownParent: $("#modal-terms2")
    });


    
  });


  $(document).ready(function() {
  //keydown, keyup
  $('.buscadorEnvivo').on('keyup', 'input', function() {


   var table = $('#tablaUsuarios').DataTable();
   table.destroy();
   var palabrasClaves =$('#palabraClave').val();

   $(mostrarCandidatos("palabrasClaves",palabrasClaves));


 });
});

</script>

<script type="text/javascript">



  /*
  $(document).ready(function() {

    $(".boton").click(function() {

      var valores = "";

        // Obtenemos todos los valores contenidos en los <td> de la fila
        // seleccionada
        $(this).parents("tr").find("td:eq(1)").each(function() {
          valores += $(this).html() + "\n";

          $('td:eq(1)').css('color', '#18ba5a' );

        });
        
        alert(valores);
      });
  });
  */

  
  $(".contenidos").on("click",".boton",function(){


    var valores = "";

        // Obtenemos todos los valores contenidos en los <td> de la fila
        // seleccionada
        $(this).parents("tr").find("td").each(function() {
          valores += $(this).html() + "\n";

          $(this).css('background-color', '#e5eae7');

        });
        
        
      });
  


  $(".contenidos").on("click",".clicName",function(){


    var valores = "";

        // Obtenemos todos los valores contenidos en los <td> de la fila
        // seleccionada
        $(this).parents("tr").find("td").each(function() {
          valores += $(this).html() + "\n";

          $(this).css('background-color', '#e5eae7');

        });
        
        
      });



  //habilitar los select del Idioma n° 2
  $(document).ready(function() {

    $('#habilitarIdioma').click(function () {
    //check if checkbox is checked
    if ($(this).is(':checked')) {

        $('#Idioma2').removeAttr('disabled'); //enable input
        $('#NivelIdioma2').removeAttr('disabled'); //enable input


      } else {




          $('#Idioma2').attr('disabled', true); //disable input
          $('#Idioma2').prop('selectedIndex',0);
          $('#NivelIdioma2').attr('disabled', true); //disable input
          $('#NivelIdioma2').prop('selectedIndex',0);
        }
      });

  });


  

  //Fin habilitar los select del Idioma n° 2
  //
  //
  //Habilitar la segunda experiecia laboral
  $(document).ready(function() {

    $('#HabilitarExpiriencia').click(function () {
    //check if checkbox is checked
    if ($(this).is(':checked')) {

        $('#example-select4AreaEmpresa').removeAttr('disabled'); //enable input
        

      } else {


           $('#example-select4AreaEmpresa').attr('disabled', true); //disable input
           $('#example-select4AreaEmpresa').prop('selectedIndex',0);

           $('#idCargo2').attr('disabled', true); //disable input
           $('#idCargo2').prop('selectedIndex',0);

           $(buscargar_cargos2());

       }
     });

  });

//Fin de habilitar la segunda experienica laboral


//Habilitar cargo ejercido o puesto de trabajo

$(document).ready(function() {

  $('#habilitarCargo').click(function () {
    //check if checkbox is checked
    if ($(this).is(':checked')) {

        $('#cargoEjercido').removeAttr('disabled'); //enable input

         $('#example-select4').attr('disabled', true); //disable input
         $('#example-select4').prop('selectedIndex',0);

         $('#idCargo').attr('disabled', true); //disable input
         $('#idCargo').prop('selectedIndex',0);


         $('#example-select4AreaEmpresa').attr('disabled', true); //disable input
         $('#example-select4AreaEmpresa').prop('selectedIndex',0);

         $('#idCargo2').attr('disabled', true); //disable input
         $('#idCargo2').prop('selectedIndex',0);

          $('#HabilitarExpiriencia').attr('disabled', true); //disable input
          $('#HabilitarExpiriencia').prop('checked', false);

          $(buscargar_cargos1());
          $(buscargar_cargos2());

          $('#HabilitarExpiriencia').removeAttr('disabled'); //enable input




        } else {

          //SELECT AREA LABORAL 1
          $('#example-select4').removeAttr('disabled'); //enable input
          $('#HabilitarExpiriencia').removeAttr('disabled'); //enable input
          $('#cargoEjercido').attr('disabled', true); //disable input
          $('#cargoEjercido').val("");


          
        }
      });

});

 //Fin habilitar cargo ejercido o puesto de trabajo
 

//Logica para los estudios 1
$(document).ready(function() {

  $('#NivelEstudio1').change(function () {
  $('#Facultad1').removeAttr('disabled'); //enable input
   $('#paisEstudio1').removeAttr('disabled'); //enable input
 });


});

//Logicia para habilitar dos estudios 2
$(document).ready(function() {

  $('#NivelEstudio2').change(function () {
  $('#Facultad2').removeAttr('disabled'); //enable input
   $('#paisEstudio2').removeAttr('disabled'); //enable input
 });


});

//Habilitar los estudios dos

$(document).ready(function() {

  $('#activarDosEstudios').click(function () {
    //check if checkbox is checked
    if ($(this).is(':checked')) {

        $('#NivelEstudio2').removeAttr('disabled'); //enable input
        

      } else {


         $('#NivelEstudio2').attr('disabled', true); //disable input
         $('#NivelEstudio2').prop('selectedIndex',0);
         $('#Facultad2').attr('disabled', true); //disable input
         $('#Facultad2').prop('selectedIndex',0);
         $('#paisEstudio2').attr('disabled', true); //disable input
         $('#paisEstudio2').prop('selectedIndex',0);
         $(buscar_carreras2());


       }
     });

});

//Fin de habilitar los dos estudios

//Habilitar por especialida

$(document).ready(function() {

  $('#activarEspeciliadad').click(function () {
    //check if checkbox is checked
    if ($(this).is(':checked')) {

        $('#especialidad').removeAttr('disabled'); //enable input
        
        $('#NivelEstudio1').attr('disabled', true); //disable input
        $('#NivelEstudio1').prop('selectedIndex',0);

         $('#NivelEstudio2').attr('disabled', true); //disable input
         $('#NivelEstudio2').prop('selectedIndex',0);

          $('#Facultad1').attr('disabled', true); //disable input
          $('#Facultad1').prop('selectedIndex',0);

          $('#Facultad2').attr('disabled', true); //disable input
          $('#Facultad2').prop('selectedIndex',0);

          //$('#carrera1').attr('disabled', true); //disable input
          //$('#carrera1').prop('selectedIndex',0);
          $(buscar_carreras1());
          $(buscar_carreras2());

          $('#paisEstudio1').attr('disabled', true); //disable input
          $('#paisEstudio1').prop('selectedIndex',0);
          
          $('#paisEstudio2').attr('disabled', true); //disable input
          $('#paisEstudio2').prop('selectedIndex',0);

          $('#activarDosEstudios').attr('disabled', true); //disable input
          $('#activarDosEstudios').prop('checked', false);

          

        } else {
          $('#especialidad').val("");
          $('#especialidad').attr('disabled', true); //disable input
          $('#NivelEstudio1').removeAttr('disabled'); //enable input
           $('#activarDosEstudios').removeAttr('disabled'); //enable input

         }
       });

});




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


function mostrarCandidatos(buscar,IDPAIS, IDDepartamento,educacionSecundaria,genero,licenciaConducir,vehiculo, tipoVehiculo , discapacidad , ExperienciaLaboral , yearsExpiriencia , disponibilidad, SituacionActual,foto,edadmenor,edadmayor,salarioMenor,salarioMayor,idioma1,NivelIdioma1,idioma2,NivelIdioma2,laboral1,laboral2,cargoejercido,NivelEstudio1,carrera1,PaisDelEstudio,NivelEstudio2,carrera2,PaisDelEstudio2,estudioespecialidad,evaluarAreaLaboral1,evaluarAreaLaboral2){


  tablaUsuarios = $('#tablaUsuarios').DataTable({ 
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
        "url": "Modelos/candidatos/candidatos.php", 
        "method": 'POST', //usamos el metodo POST
        "data":{buscar:buscar,IDPAIS:IDPAIS,IDDepartamento:IDDepartamento,educacionSecundaria:educacionSecundaria,genero:genero,licenciaConducir:licenciaConducir,
          vehiculo:vehiculo,tipoVehiculo:tipoVehiculo,discapacidad:discapacidad,ExperienciaLaboral:ExperienciaLaboral,yearsExpiriencia:yearsExpiriencia,disponibilidad:disponibilidad,SituacionActual:SituacionActual,foto:foto,edadmenor:edadmenor,edadmayor:edadmayor,salarioMenor:salarioMenor,salarioMayor:salarioMayor,idioma1:idioma1,NivelIdioma1:NivelIdioma1,idioma2:idioma2,NivelIdioma2:NivelIdioma2,laboral1:laboral1,laboral2:laboral2,cargoejercido:cargoejercido,NivelEstudio1:NivelEstudio1,carrera1:carrera1,PaisDelEstudio:PaisDelEstudio,NivelEstudio2:NivelEstudio2,carrera2:carrera2,PaisDelEstudio2:PaisDelEstudio2,estudioespecialidad:estudioespecialidad,evaluarAreaLaboral1:evaluarAreaLaboral1,evaluarAreaLaboral2:evaluarAreaLaboral2
        }, //enviamos opcion 4 para que haga un SELECT
        "dataSrc":""
      },
      "columns":[
      {"data": "Foto"},
      {"data": "nombre"},
      {"data": "edad"},
      {"data": "genero"},
      {"data": "Pais"},
      {"data": "anosExperiencia"},
      {"data": "cargo"},
      {"data": "NivelEstudio"},
      {"data": "Disponiblidad"},
      {"data": "SituacionActual"},
      {"data": "ConexionCandidato"},
      {"data": "cv"},

      ]
    });



}








$(".btnbuscar").click(function(){



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

//Logica de los idiomas
var idioma = $('#idioma1 option:selected');
var evaluarIdioma =  idioma.val();

var nivelIdioma = $('#NivelIdioma1 option:selected');
var evaluarNivelIdioma =  nivelIdioma.val();


//Logica de los idiomas 2
var idioma2 = $('#Idioma2 option:selected');
var evaluarIdioma2 =  idioma2.val();

var nivelIdioma2 = $('#NivelIdioma2 option:selected');
var evaluarNivelIdioma2 =  nivelIdioma2.val();

//Fin de logica de los idiomas

//Logica area laborales
var cargo = $('#idCargo option:selected');
var evaluarcargo =  cargo.val();

var cargo2 = $('#idCargo2 option:selected');
var evaluarcargo2 =  cargo2.val();

//Buscar la  area por escrito
var cargoejercido =$('#cargoEjercido').val();

//Logica para los estudios
var nivelEstudio1 = $('#NivelEstudio1 option:selected');
var evaluarnivelEstudio1 =  nivelEstudio1.val();

var carreraObtenido= $('#carrera1 option:selected');
var evaluarcarreraObtenido =  carreraObtenido.val();

var piasSeleccionaEstudio= $('#paisEstudio1 option:selected');
var evaluarpiasSeleccionaEstudio =  piasSeleccionaEstudio.val();

//Logica para los estudios2
var nivelEstudio2 = $('#NivelEstudio2 option:selected');
var evaluarnivelEstudio2 =  nivelEstudio2.val();

var carreraObtenido2= $('#carrera2 option:selected');
var evaluarcarreraObtenido2 =  carreraObtenido2.val();

var piasSeleccionaEstudio2= $('#paisEstudio2 option:selected');
var evaluarpiasSeleccionaEstudio2 =  piasSeleccionaEstudio2.val();

//Buscar la  area por escrito
var estudioespecialidad=$('#especialidad').val();



if(evaluaredadmenor > evaluaredadmayor){
  swal({title:'alerta',text:'El rango de la edad  mayor debe ser mayor al rango de la edad menor',type:'error'});
}

if(evaluaredadmayor < evaluaredadmenor){
  swal({title:'alerta',text:'El rango de la edad  menor debe ser mayor al rango de la edad mayor',type:'error'});
}



if(evaluarsalariomenor > evaluarsalariomayor){
  swal({title:'alerta',text:'El rango del salario  mayor debe ser mayor al rango del salario menor',type:'error'});
}

if(evaluarsalariomayor < evaluarsalariomenor){
  swal({title:'alerta',text:'El rango del salario  menor debe ser mayor al rango del salario mayor',type:'error'});
}



//Validaciones para los estudios
if(evaluarnivelEstudio1 != 0){

 var existeFacultad1 = $('#Facultad1 option:selected');
 var haseleccionadoFacultad = existeFacultad1.val();

 if(haseleccionadoFacultad ==""){
  swal({title:'alerta',text:'Debe seleccionar una facultad',type:'error'});
}else{

  var existeCarrera1= $('#carrera1 option:selected');
  var haseleccionadoCarrera1 =  existeCarrera1.val();

  if(haseleccionadoCarrera1 ==""){
    swal({title:'alerta',text:'Debe seleccionar una carrera',type:'error'});
  }

}

}


if(evaluarnivelEstudio2 != ""){

 var existeFacultad2 = $('#Facultad2 option:selected');
 var haseleccionadoFacultad2 = existeFacultad2.val();

 if(haseleccionadoFacultad2 ==""){
  swal({title:'alerta',text:'Debe seleccionar una facultad en el segundo estudio',type:'error'});
}else{

  var existeCarrera2= $('#carrera2 option:selected');
  var haseleccionadoCarrera2 =  existeCarrera2.val();

  if(haseleccionadoCarrera2 ==""){
    swal({title:'alerta',text:'Debe seleccionar una carrera en el segundo estudio',type:'error'});
  }

}

}

//Fin de las evaluaciones de los estudios

//EvaluarAreasTrabajos
var areaLaboral1 = $('#example-select4 option:selected');
var evaluarAreaLaboral1 = areaLaboral1.val();

var areaLaboral2 = $('#example-select4AreaEmpresa option:selected');
var evaluarAreaLaboral2 = areaLaboral2.val();




$(mostrarCandidatos("buscar",evaluarPais , evaluarDepartamento , evaluareducacionSecundaria,evaluarGenero,evaluarLicencia,evaluarVehiculo,evaluarTipoVehiculo,evaluardiscapacidad,evaluarExperiencaProfessional , evaluarareaExperiencia,evaluardisponibilidad,evaluarsituacionActual,evaluarfoto,evaluaredadmenor,evaluaredadmayor,evaluarsalariomenor,evaluarsalariomayor,evaluarIdioma,evaluarNivelIdioma,evaluarIdioma2,evaluarNivelIdioma2,evaluarcargo,evaluarcargo2,cargoejercido,evaluarnivelEstudio1,evaluarcarreraObtenido,evaluarpiasSeleccionaEstudio,evaluarnivelEstudio2,evaluarcarreraObtenido2,evaluarpiasSeleccionaEstudio2,estudioespecialidad,evaluarAreaLaboral1,evaluarAreaLaboral2));





});




</script>


