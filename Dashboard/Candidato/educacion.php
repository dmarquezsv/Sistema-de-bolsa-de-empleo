<?php
include_once '../../BD/Conexion.php';
include_once '../../BD/Consultas.php';
include_once '../../main/funcionesApp.php';
include_once 'templates/head.php';
$Conexion = new Consultas();
$FuncionesApp = new funcionesApp();
include_once 'templates/validar-perfil.php';


$sql2 = "SELECT * FROM `soporte_paises` ORDER BY `soporte_paises`.`Nombre` ASC ";
$stmt2 = $Conexion->ejecutar_consulta_simple($sql2);

$resultEducacion = $Conexion->ejecutar_consulta_conteo("usuario_educacion" , "IDUsuario" , $IDUser);

$sql3 ="SELECT `IDEducacion` , Especialidad , C.nombre AS 'Carreras'  FROM usuario_educacion E INNER JOIN carrera C ON E.Id_Carrera = C.Id_Carrera WHERE IDUsuario = ?";
$stmt3 = $Conexion->ejecutar_consulta_simple_Where($sql3 , $IDUser);

if (!$_GET['id']==null) {

 $id = base64_decode($_GET['id']);
 $IDEducacion = $FuncionesApp->test_input($id); 

 $sql4 ="SELECT CentroEduacativo , Especialidad ,C.Id_Carrera , C.nombre AS 'Carrera',f.IDFacultates ,f.Nombre AS 'Facultad' , NivelEstudio , FechaInicio ,FechaFinal , P.IDPais , P.Nombre AS 'Pais' FROM usuario_educacion UE INNER JOIN carrera C ON UE.Id_Carrera = C.Id_Carrera LEFT JOIN soporte_paises P ON UE.IDPais = P.IDPais left JOIN facultades f ON C.ID_Facultades = f.IDFacultates WHERE IDEducacion = ?";
 $stmt4 = $Conexion->ejecutar_consulta_simple_Where($sql4 , $IDEducacion);

 while ($item=$stmt4->fetch())
 {
  $CentroEducativo = $item['CentroEduacativo'];
  $Especialidad = $item['Especialidad'];
  $IDCarrera = $item['Id_Carrera'];
  $NombreCarrera = $item['Carrera'];
  $IdPais= $item['IDPais'];
  $NombrePais= $item['Pais'];
  $NivelEstudio = $item['NivelEstudio'];
  $FechaInicio = $item['FechaInicio'];
  $FechaFinal =$item['FechaFinal'];
  $IDFacultad = $item['IDFacultates'];
  $NombreFacultad =  $item['Facultad'];

}

}

$sql11 = "SELECT * FROM `facultades`";
$stmt11 = $Conexion->ejecutar_consulta_simple($sql11);


?>
<title>Candidato | Educación Académica</title>
<?php 
include_once 'templates/styles.php';
include_once 'templates/MenuRight.php';
include_once 'templates/MenuLeft.php';
include_once 'templates/header.php';
?>

<style type="text/css">
  #imgbanner{

    background: url('../assets/media/photos/Eduacacion_academica.jpg');
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
          <h3 class="font-size-h2 font-w300 mt-20"  data-toggle="appear" data-class="animated flipInY" id="titulos" style="color: white;">EDUCACIÓN ACADÉMICA </h3>
        </div>
      </div>
    </div>
  </div>

  <div class="bg-body-white border-b">
    <div class="content py-5 text-center">
      <nav class="breadcrumb bg-body-white mb-0 barraMenu">
        <a class="breadcrumb-item" href="javascript:void(0)"><b>Perfil</b></a>
        <span class="breadcrumb-item active"><b>Área de educación</b></span>
      </nav>
    </div>
  </div>

  <br>
  <div class="content py-5 text-center"> 
    <a href="perfil?notificar=1" class="btn btn-rounded btn-noborder btn-alt-primary mr-5 mb-5"> <i class="si si-action-undo fa-2x5"> </i> Retroceder</a>
    <a href="experiencia?notificar=1" class="btn btn-rounded btn-noborder btn-alt-primary mr-5 mb-5"> <i class="si si-action-redo fa-2x5"> </i> Siguiente</a>
  </div>
  <br>

  <div style="margin-right:2%; margin-left:2%;">



    <div class="row gutters-tiny">
      <!-- Basic Info -->
      <div class="col-md-7">
        <?php 
        if (!$_GET['id']==null) {
          echo "<form action='Modelos/ModelosEducacion/ActualizarEducacion.php' method='POST' >";
          echo "<input type='hidden' name='IDEducacion' value='".$_GET['id']."'>";
        }else{
          echo "<form action='Modelos/ModelosEducacion/NuevaEducacion.php' method='POST' >";
        }
        ?>
        <input type="hidden" name="Iduser" value="<?php echo $IDUser; ?>">

        <div class="block block-rounded block-themed">
          <div class="block-header bg-gd-primary">

            <div class="block-options">

              <?php  if (!$_GET['id']==null) {  echo "<a href='educacion' class='btn btn-sm btn-alt-primary' style='margin-left: 5px; margin-right: 5px;'>Añadir nuevo</a>";
            }?>

            <?php 
            if ($resultEducacion == 5) {

             if (!$_GET['id']==null) {

               echo "<button type='submit' class='btn btn-sm btn-alt-primary' name='Guardar'>
               <i class='fa fa-save mr-5'></i>Actualizar
               </button>";

             }


           }else{
            if (!$_GET['id']==null) {
              echo "<button type='submit' class='btn btn-sm btn-alt-primary' name='Guardar'>
              <i class='fa fa-save mr-5'></i>Actualizar
              </button>";

            }else{
              echo "<button type='submit' class='btn btn-sm btn-alt-primary' name='Guardar'>
              <i class='fa fa-save mr-5'></i>Guardar
              </button>";
            } 
          }
          ?>



        </div>
      </div>
      <div class="block-content block-content-full" >


        <div class="alert alert-primary text-justify indicaciones" role="alert">
         <i class="fa fa-info-circle fa-2x5 text-dark"></i>  Indicaciones : <?php echo $PrimerNombre[0] ." ". $PrimerApellido[0]; ?>: En esta sección deberás añadir tus estudios academicos para que los recluatadores sepan de tus estudios. <b style="color:#0B3486;">Puedes añadir hasta 5 estudios</b>
       </div>


       <?php if ($resultEducacion == 5) {
        echo '<div class="alert alert-warning" role="alert">
        Se han agregado 5 estudios por lo tanto ya no podrás añadir otro, Si desea agregar deberá eliminar o actualizar.
        </div>';
      }

      ?>




      <div class="form-group row">
        <label class="col-12" for="ecom-product-meta-title">Centro Educativo / Universidad *</label>
        <div class="col-12"> 
          <input type="text" class="form-control" id="CentoEducativo" name="CentoEducativo"  value="<?php echo $CentroEducativo; ?>"  minlength="5" maxlength="100" title="Letras y números. Tamaño mínimo: 5. Tamaño máximo: 100" required   placeholder="Digite el centro educativo o universidad" >
        </div>
      </div>

      <input type="hidden" name="ActualizarIDCarrera" value="<?php echo$IDCarrera ?>">
      <input type="hidden" name="ActualizarEspecialidad" value="<?php echo$Especialidad ?>">




      <div class="form-group row">

        <div class="col-12" id="testForm">

          <?php if (!$_GET['id']==null && $Especialidad =="") {?>

            <div id="resultActualizar"></div>

          <?php }else if (!$_GET['id']==null && $IDCarrera == 92){ ?>

            <div class="form-group row"><label class="col-12" for="ecom-product-meta-title">Especialidad / Curso *</label><div class="col-12"><input type="text" class="form-control" id="Especialidad" name="Especialidad"  value="<?php echo $Especialidad; ?>"  minlength="10" maxlength="100" title="Letras y números. Tamaño mínimo: 5. Tamaño máximo: 100" required placeholder="Máximo 100 palabras"></div></div>

          <?php }else{ ?>

            <label class="col-12">Seleccione Universidad para elejir una carrera y especialidad para agregar tu bachillerato o diplomado*</label>

            <label class="css-control css-control-primary css-radio">
              <input type="radio" class="css-control-input" value="Si" id="especialidades" name="especialidad"  required >
              <span class="css-control-indicator"></span> Universidad
            </label>

            <label class="css-control css-control-secondary css-radio">
              <input type="radio" class="css-control-input" Value="No" id="especialidad" name="especialidad" required>
              <span class="css-control-indicator"></span> Especialidad
            </label>

          <?php } ?>



        </div>
      </div>


      <div id="resultEstudio"></div>

      <div id="resultCarrera1"></div>




      <div class="form-group row">
        <label class="col-12" for="example-select3">Seleccione su país de origen*</label>
        <div class="col-12" id="pais">
          <!-- Select2 (.js-select2 class is initialized in Helpers.select2()) -->
          <!-- For more info and examples you can check out https://github.com/select2/select2 -->
          <select class="js-select2 form-control" id="example-select3" name="IDPais" style="width: 100%;" data-placeholder="Selecciona una opción" required>
           <option value="<?php echo $IdPais; ?>"><?php echo $NombrePais; ?></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
           <?php 
           while ($item=$stmt2->fetch())
           {
             if($IdPais == $item['IDPais']){

             }else{
              echo "<option value=".$item['IDPais'].">".$item['Nombre']."</option>";   
            }

          }

          ?>
        </select>
      </div>
    </div>



    <div class="form-group row">
      <label class="col-12">Nivel de estudio*</label>
      <div class="col-12">
       <select class='form-control' name="NivelEstudio" id="NivelEstudio" required>
        <option selected value='' disabled>Seleccione una opción</option>
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
        <option value="Estudiante de Universidad">Estudiante de Universidad</option>
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
  </div>






  <div class="form-group row">
    <label class="col-12">Período de inicio*</label>
    <div class="col-12">

      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text">
            <i class="fa fa-calendar"></i>
          </span>
        </div>
        <input type="number" class="form-control"  name="FechaInicio"   placeholder="año" value="<?php echo $FechaInicio ?>" required>
      </div>


    </div>
  </div>

  <div class="form-group row">
    <label class="col-12">Período de Finalización*</label>
    <div class="col-12">

     <div id="periodoFinal" ></div>
     <div id="resultinput" ></div>  

   </div>
 </div>


 <?php if ($FechaFinal == "Actualmente"){ ?>

  <div class="form-check">
    <input class="form-check-input" type="checkbox" value="Actualmente" id="Actualmente" checked>
    <label class="form-check-label" for="defaultCheck1">
      Actualmente
    </label>
  </div>

<?php }else{ ?>

  <div class="form-check">
    <input class="form-check-input" type="checkbox" value="Actualmente" id="Actualmente">
    <label class="form-check-label" for="defaultCheck1">
      Actualmente
    </label>
  </div>



<?php } ?>

<br>

   
            <?php 
            if ($resultEducacion == 5) {

             if (!$_GET['id']==null) {

               echo "<button type='submit' class='btn btn-block btn-alt-primary' name='Guardar'>
               <i class='fa fa-save mr-5'></i> Actualizar
               </button>";

             }


           }else{
            if (!$_GET['id']==null) {
              echo "<button type='submit' class='btn btn-block btn-alt-primary' name='Guardar'>
              <i class='fa fa-save mr-5'></i> Actualizar
              </button>";

            }else{
              echo "<button type='submit' class='btn btn-block btn-alt-primary' name='Guardar'>
              <i class='fa fa-save mr-5'></i> Guardar
              </button>";
            } 
          }
          ?>

           <?php  if (!$_GET['id']==null) {  echo "<a href='educacion' class='btn btn-block btn-alt-primary' style='margin-left: 5px; margin-right: 5px;'>Añadir nuevo</a>";
            }?>




</div>
</div>
</form>
</div>
<!-- END Basic Info -->


<!-- More Options -->
<div class="col-md-5">
  <!-- Status -->
  <form action="be_pages_ecom_product_edit.html" method="post" onsubmit="return false;">
    <div class="block block-rounded block-themed">
      <div class="block-header bg-gd-primary">
        <h3 class="block-title">Listas estudios de <?php echo $PrimerNombre[0]; ?> </h3>

      </div>

      <div class="block-content block-content-full">
       <div class="table-responsive">
        <?php 

        if ($resultEducacion >=1) {?>

         <table class="table table-borderless table-vcenter">
          <thead>
            <tr>
              <th class="text-center" style="width: 50px;">#</th>
              <th>Especialidad</th>
              <th class="text-center" style="width: 100px;">Acciones</th>
            </tr>
          </thead>
          <tbody>

            <?php 
            $n=1;
            while ($item=$stmt3->fetch())
            {

              $Estudios;
              if($item['Especialidad'] ==""){
                $Estudios = $item['Carreras'];
              }else{
                $Estudios = $item['Especialidad'];
              }

              echo "<tr class='table-active'>
              <td class='text-center' scope='row'>".$n."</td>
              <td>".$Estudios."</td>
              <td class='text-center'>
              <div class='btn-group'>
              <a href='?id=".base64_encode($item['IDEducacion'])."' class='btn btn-sm btn-alt-primary' data-toggle='tooltip' title='editar' data-original-title='editar'>
              <i class='fa fa-pencil'></i> Editar
              </a>

              <button id='val".$n."' value=".base64_encode($item['IDEducacion'])." data-toggle='modal' data-target='#exampleModal' class='btn btn-sm btn-alt-primary' title='' data-original-title='eliminar'> <i class='fa fa-times'></i> Eliminar </button>

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
        echo $PrimerNombre[0] . " aún no has agregado estudios superiores.";
      }
      ?>

    </div>
  </div>
</div>
</form>
<!-- END Status -->





</div>


  <div class="content py-5 text-center"> 
    <br><br><br>
    <a href="perfil?notificar=1" class="btn btn-rounded btn-noborder btn-alt-primary mr-5 mb-5"> <i class="si si-action-undo fa-2x5"> </i> Retroceder</a>
    <a href="experiencia?notificar=1" class="btn btn-rounded btn-noborder btn-alt-primary mr-5 mb-5"> <i class="si si-action-redo fa-2x5"> </i> Siguiente</a>
  </div>
  <br>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Educación Académica</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="Modelos/ModelosEducacion/EliminarEducacion.php" method="POST">
          <p>Seguro que desea eliminar</p>
          <input type="text" name="" id="carrera" class="form-control"  disabled="true" >
          <input type="hidden" name="IDEducacion"  id="IDEducacion">


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

          <input type="submit" name="Eliminar" value="Eliminar" class="btn btn-danger">
        </div>
      </form>
    </div>
  </div>
</div>
</div>

</main>





<?php 
include_once 'templates/footer.php';
include_once 'templates/script.php';
include_once '../../templates/alertas.php';

?>

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
                <img src="../../assets/recusosMundoEmpleo/logo.png" class="img-fluid" style="height: 100px; width: 250px;"  data-toggle="appear" data-class="animated flipInY">
                <h3 class="font-size-h2 font-w300 mt-20"  data-toggle="appear" data-class="animated flipInY" id="titulos" style="color: #0B3486;">Estudios académicos </h3>
                <p class="text-muted" style="text-align: justify;" data-toggle="appear" data-class="animated fadeInUp">
                 <?php echo $PrimerNombre[0] ." ". $PrimerApellido[0]; ?>: Deberás agregar los estudios académicos , cursos , estudios universitarios o algún tipo de especialidad. 
                 <br><br>
                 Solo se puede añadir 5 estudios por lo tanto ya no podrás agregar otro, Si desea agregar deberá eliminar o actualizar.
                 <br><br>
                 <b style="color: #0B3486;">Nota: Una vez agreado sus estudios deberá dar clic en el botón siguiente para añadir sus experiencias laborales.</b>
               </p>

               <a class="btn  btn-alt-primary " href="#" data-dismiss="modal" aria-label="Close">OK</a>

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
                <img src="../../assets/img/icono/icono-advertencia.png" class="img-fluid"   data-toggle="appear" data-class="animated flipInY" class="img-fluid" style="width: 100px; height: 100px;">
                <h3 class="font-size-h2 font-w300 mt-20"  data-toggle="appear" data-class="animated flipInY" id="titulos" style="color: #0B3486;">no hay Estudios académicos </h3>
                <p class="text-muted" style="text-align: justify;" data-toggle="appear" data-class="animated fadeInUp">
                 <?php echo $PrimerNombre[0] ." ". $PrimerApellido[0]; ?>: Deberás agregar por lo <b>menos un estudio académico</b> ya que es requesito completar el formulario para poder continuar con el proceso. 
                 <br><br>
                 <b style="color: #0B3486;">Nota: Una vez agregado sus estudios deberá dar clic en el botón siguiente para añadir sus experiencias laborales.</b>
               </p>

               <a class="btn  btn-alt-primary " href="#" data-dismiss="modal" aria-label="Close">OK</a>

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




<script type="text/javascript">


  <?php if (!$_GET['id']==null) { ?>

    $(document).ready(function(){

      $("#NivelEstudio option[value='<?php echo $NivelEstudio ?>'").attr("selected",true);


    });

  <?php } ?>
  



  $(document).ready(function() {
    $('#especialidad').on('click', function() {

     $('input[name=Especialidad]:checked', '#testForm').val();

     $("#resultEstudio").html('<div class="form-group row"><label class="col-12" for="ecom-product-meta-title">Especialidad / Curso *</label><div class="col-12"><input type="text" class="form-control" id="Especialidad" name="Especialidad"  value="<?php echo $Especialidad; ?>" required   maxlength="100" title="Letras y números. Tamaño mínimo: 5. Tamaño máximo: 100" required placeholder="solo admite 100 palabras"></div></div>');
     $("#resultCarrera1").html("");

   });
  });



  $(document).ready(function() {

    <?php if($FechaFinal == "Actualmente"){ ?>

      $("#resultinput").html('<input type="text" name="mostrar"  id="mostrar" class="form-control" value="Actualmente" disabled >');

      $("#periodoFinal").html('<input type="hidden" name="FechaFinal"  id="FechaFinal"class="form-control" value="Actualmente" required >');

    <?php }else{ ?>
      $("#periodoFinal").html('<input type="number" name="FechaFinal" min="1"  placeholder="año"  id="FechaFinal"class="form-control" value="<?php echo $FechaFinal; ?>" required>');
    <?php } ?>

    $('#Actualmente').click(function () {
    //check if checkbox is checked
    if ($(this).is(':checked')) {

     $("#resultinput").html('<input type="text" name="mostrar"  id="mostrar" class="form-control" value="Actualmente" disabled >');

     $("#periodoFinal").html('<input type="hidden" name="FechaFinal"  id="FechaFinal"class="form-control" value="Actualmente" required >');


   } else {

    $("#resultinput").html("");

    $("#periodoFinal").html('<input type="number" name="FechaFinal"  placeholder="año"  min="1" id="FechaFinal" class="form-control" value="<?php echo $FechaFinal; ?>" required>');
  }
});

  });



  $(document).ready(function() {


   <?php if (!$_GET['id']==null && $Especialidad =="") {?>
     $("#resultActualizar").html('<div  class="form-group row"><label class="col-12" for="ecom-product-meta-title">Selecciona la facultad*</label><div class="col-12"><select class="form-control" name="Facultad1" id="Facultad1" ><option selected  value="<?php echo $IDFacultad; ?>" disabled><?php echo $NombreFacultad; ?></option><?php while ($item=$stmt11->fetch()){echo "<option value=".$item['IDFacultates'].">".$item['Nombre']."</option>";}?></select></div></div>');
   <?php } ?>


   $('#especialidades').on('click', function() {

     $('input[name=Especialidad]:checked', '#testForm').val();

     $("#resultEstudio").html('<div  class="form-group row"><label class="col-12" for="ecom-product-meta-title">Selecciona la facultad*</label><div class="col-12"><select class="form-control" name="Facultad1" id="Facultad1" ><option selected value="" disabled>Seleccione</option><?php while ($item=$stmt11->fetch()){echo "<option value=".$item['IDFacultates'].">".$item['Nombre']."</option>";}?></select></div></div>');

   });


 });


//Funcione para buscar las carreras para primera busqueda de carreras
$(document).ready(function() {


  $('#resultEstudio').on('change', '#Facultad1', function() {
    var seleccionFacultad1 = $('#Facultad1 option:selected');
    var evaluarFacultad1 = seleccionFacultad1.val();
    
    if (evaluarFacultad1 != "") {

     buscar_carreras1(evaluarFacultad1,"","");
   }

 })



  <?php if (!$_GET['id']==null && $Especialidad =="") {?>
    buscar_carreras1(<?php echo $IDFacultad; ?>,<?php echo $IDCarrera; ?>,'<?php echo $NombreCarrera; ?>');


    $('#resultActualizar').on('change', '#Facultad1', function() {
      var seleccionFacultad1 = $('#Facultad1 option:selected');
      var evaluarFacultad1 = seleccionFacultad1.val();

      if (evaluarFacultad1 != "") {

       buscar_carreras1(evaluarFacultad1,"","");
     }


   });

  <?php } ?>




});



function buscar_carreras1(consulta , IDCarrera , NombreCarrera){

  $.ajax({
    url: 'Modelos/carreras/carreras.php' ,
    type: 'POST' ,
    dataType: 'html',
    data: {consulta: consulta,IDCarrera:IDCarrera,NombreCarrera:NombreCarrera},
  })
  .done(function(respuesta){
    $("#resultCarrera1").html(respuesta);
  })
  .fail(function(){
    console.log("error");
  });

}
//Funcione para buscar las carreras




window.onload=function(){
  $("table tbody tr").click(function(){
        // Tomar la captura la información  de la tabla 
        var nombre= $(this).find("td:eq(1)").text(); 
        document.getElementById('carrera').value=nombre;

        var nombre= $(this).find("td:eq(1)").text(); 
        document.getElementById('carrera').value=nombre;
        



        
      });    
}

$(".btn-group button").click(function(){

 var idDepartamento =$('#IDEducacion').val($(this).val());

})


</script>


