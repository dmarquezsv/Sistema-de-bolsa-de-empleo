<?php
include_once '../../BD/Conexion.php';
include_once '../../BD/Consultas.php';
include_once '../../main/funcionesApp.php';
include_once 'templates/head.php';
$Conexion = new Consultas();
$FuncionesApp = new funcionesApp();
include_once 'templates/validar-perfil.php';

if($VerificaUsuarioEducacion == 0){
  echo "<script>location.href='educacion?advertencia=1';</script>";
}

$sql = "SELECT * FROM `soporte_areas_trabajos` ORDER BY `Nombre` ASC ";
$stmt = $Conexion->ejecutar_consulta_simple($sql);

$resultExperiencia = $Conexion->ejecutar_consulta_conteo("usuario_experiencia","IDUsuario",$IDUser);

$sql2 = "SELECT * FROM `soporte_tipo_empresa` ORDER BY `Area` ASC ";
$stmt2 = $Conexion->ejecutar_consulta_simple($sql2);

$sql3 ="SELECT IDExperiencia , Cargo , `FechaFinal` FROM `usuario_experiencia` WHERE IDUsuario = ? ORDER BY `usuario_experiencia`.`FechaFinal` DESC ";
$stmt3 = $Conexion->ejecutar_consulta_simple_Where($sql3 , $IDUser);

$sql4 = "SELECT * FROM `soporte_cargos_desempenado` ORDER BY `soporte_cargos_desempenado`.`nombre` ASC";
$stmt4 = $Conexion->ejecutar_consulta_simple($sql4);

if (!$_GET['id']==null) {

 $id = base64_decode($_GET['id']);
 $IDExperiencia = $FuncionesApp->test_input($id); 

 $sql5 ="SELECT Cargo , TA.IDCategoria , TA.Nombre AS 'Categoria' ,TE.IDTipoEmpresa ,TE.Area , CD.IDDesempenado , CD.nombre AS 'Desempeno' , Lugar , Descripcion ,RangoSalarial , FechaInicio , FechaFinal , PaginaEmpresa ,Estado FROM usuario_experiencia UE INNER JOIN soporte_areas_trabajos TA ON UE.IDCategoria = TA.IDCategoria LEFT JOIN soporte_cargos_desempenado CD ON UE.IDDesempenado = CD.IDDesempenado LEFT JOIN soporte_tipo_empresa TE ON UE.IDTipoEmpresa = TE.IDTipoEmpresa WHERE IDExperiencia = ? ";

 $stmt5 = $Conexion->ejecutar_consulta_simple_Where($sql5 , $IDExperiencia);

 while ($item=$stmt5->fetch())
 {
  $Cargo = $item['Cargo'];
  $IDCategoria =  $item['IDCategoria'];
  $NombreCategoria =  $item['Categoria'];
  $IDTipoEmpresa = $item['IDTipoEmpresa'];
  $NombreArea= $item['Area'];
  $IDcargo  = $item['IDDesempenado'];
  $NombreCargo = $item['Desempeno'];
  $Empresa = $item['Lugar'];
  $Descripcion = $item['Descripcion'];
  $rangoSalarial = $item['RangoSalarial'];
  $FechaInico = $item['FechaInicio'];
  $FechaFinal = $item['FechaFinal'];
  $webempresa =  $item['PaginaEmpresa'];
  $Estado = $item['Estado'];
}


}



?>
<title>Candidato | expereincias laborales</title>
<?php 
include_once 'templates/styles.php';
include_once 'templates/MenuRight.php';
include_once 'templates/MenuLeft.php';
include_once 'templates/header.php';
?>

<style type="text/css">
  #imgbanner{

    background: url('../assets/media/photos/Experiencia_Laboral.jpg');
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
          <h3 class="font-size-h2 font-w300 mt-20"  data-toggle="appear" data-class="animated flipInY" id="titulos" style="color: white;">Experiencia Laboral </h3>
        </div>
      </div>
    </div>
  </div>

  <div class="bg-body-white border-b">
    <div class="content py-5 text-center">
      <nav class="breadcrumb bg-body-white mb-0 barraMenu">
        <a class="breadcrumb-item" href="javascript:void(0)"><b>Perfil</b></a>
        <span class="breadcrumb-item active"><b>Área experiencia Profesional</b></span>
      </nav>
    </div>
  </div>

  <br>
  <div class="content py-5 text-center">
    <br>
    <a href="educacion?notificar=1" class="btn btn-rounded btn-noborder btn-alt-primary mr-5 mb-5"> <i class="si si-action-undo fa-2x5"> </i> Retroceder</a>
    <a href="habilidades?notificar=1" class="btn btn-rounded btn-noborder btn-alt-primary mr-5 mb-5"> <i class="si si-action-redo fa-2x5"> </i> Siguiente</a>
  </div>

  <br>

  <div style="margin-right:2%; margin-left:2%;">




    <div class="row gutters-tiny">
      <!-- Basic Info -->
      <div class="col-md-7">
        <?php 
        if (!$_GET['id']==null) {
          echo "<form action='Modelos/ModelosExperiencia/ActualizarExperiencia.php' method='POST'>";
          echo "<input type='hidden' name='IDExperiencia' value='".$_GET['id']."'>";
        }else{
          echo "<form action='Modelos/ModelosExperiencia/NueveExperiencia.php' method='POST' >";
        }
        ?>
        <input type="hidden" name="Iduser" value="<?php echo $IDUser; ?>">
        <div class="block block-rounded block-themed">
          <div class="block-header bg-gd-primary">

            <div class="block-options">

              <?php  if (!$_GET['id']==null) {

                echo "<a href='experiencia' class='btn btn-sm btn-alt-primary' style='margin-left: 5px; margin-right: 5px;'>Añadir Nuevo</a>";
              } ?>

              <?php 

              if ($resultExperiencia == 5) { 

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
        <div class="block-content block-content-full">

         <div class="alert alert-primary text-justify indicaciones" role="alert">
           <i class="fa fa-info-circle fa-2x5 text-dark"></i>  Indicaciones: <?php echo $PrimerNombre[0] ." ". $PrimerApellido[0]; ?>:En esta sección deberás agregar tus experiencias laborales como prácticas profesionales , horas sociales o algún puesto de trabajo para que así los recluatadores sepan las experiencias. <b style="color:#0B3486;">Puedes añadir hasta 5 estudios</b>. 
         </div>


         <?php   if ($resultExperiencia == 5) { 

           echo '<div class="alert alert-warning" role="alert">
           Se agreado 5 experiencias laborales por lo tanto ya no podrás agregar otro, Si desea agregar deberá eliminar o actualizar. 
           </div>';

         } 
         ?>

         <div class="form-group row">
          <label class="col-12" for="ecom-product-meta-title">Cargo ejercido o Puesto de trabajo *</label>
          <div class="col-12">
            <input type="text" class="form-control" id="Puesto" name="Puesto"  value="<?php echo$Cargo ?>"  placeholder="digite el cargo del trabajo" Required> 
          </div>
        </div>

        <div id="area" class="form-group row">
          <label class="col-12" for="example-select2">Seleccione la área*</label>
          <div class="col-12" id="pais">
            <!-- Select2 (.js-select2 class is initialized in Helpers.select2()) -->
            <!-- For more info and examples you can check out https://github.com/select2/select2 -->
            <select class="js-select2 form-control" id="AreaCategoria" name="AreaCategoria" style="width: 100%;" data-placeholder="Selecciona una opción" Required>
              <option value="<?php echo $IDCategoria; ?>"><?php echo $NombreCategoria; ?></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
              <?php 
              while ($item=$stmt->fetch())
              {
                if($IDCategoria == $item['IDCategoria']){

                }else{
                  echo "<option value=".$item['IDCategoria'].">".$item['Nombre']."</option>";   
                }

              }

              ?>
            </select>
          </div>
        </div>



        <div class="form-group row">
          <label class="col-12" for="example-select2" >Cargo Desempeñado*</label>
          <div class="col-12">

            <div id="resultCargos">
            </div>


          </div>
        </div>


        <div class="form-group row">
          <label class="col-12" for="example-select2">Sector de empresa*</label>
          <div class="col-12" id="pais">
            <!-- Select2 (.js-select2 class is initialized in Helpers.select2()) -->
            <!-- For more info and examples you can check out https://github.com/select2/select2 -->
            <select class="js-select2 form-control" id="example-select3" name="SectorEmpresa" style="width: 100%;" data-placeholder="Selecciona una opción" Required>
              <option value="<?php echo $IDTipoEmpresa; ?>"><?php echo $NombreArea; ?></option>
              <?php 
              while ($item=$stmt2->fetch())
              { 
                if($IDTipoEmpresa == $item['IDTipoEmpresa']){

                }else{
                  echo "<option value=".$item['IDTipoEmpresa'].">".$item['Area']."</option>";   
                }

              }

              ?>
            </select>
          </div>
        </div>



        <div class="form-group row">
          <label class="col-12" for="ecom-product-meta-title" Required>Nombre de la Empresa *</label>
          <div class="col-12">
            <input type="text" class="form-control" id="Empresa" name="Empresa"  value="<?php echo$Empresa ?>" placeholder="digite el nombre de la empresa">
          </div>
        </div>


        <div class="form-group row">
          <label class="col-12">Página de la empresa / Opcional</label>
          <div class="col-12">
            <input type="text" name="webempresa" class="form-control" value="<?php echo $webempresa ?>" placeholder="https://www.tuempresa.com">
          </div>
        </div>





        <div class="form-group row">
          <label class="col-12">Rango Salarial / opcional</label>
          <div class="col-12">

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  $
                </span>
              </div>

              <select class='form-control' name="Sueldo"  id="sueldo" >
               <option selected value='' disabled>Seleccione una opción</option>"; 
               <option value="Sueldo Viáticos">Sueldo Viáticos</option>
               <option value="menos de $200">menos de $200</option>
               <option value="$301-$600">$301-$600</option>
               <option value="$601-$900">$601-$900</option>
               <option value="$901-$1200">$901-$1200</option>
               <option value="$1201-$1500">$1201-$1500</option>
               <option value="$1501-$1800">$1501-$1800</option>
               <option value="$1801-$2100">$1801-$2100</option>
               <option value="$2101-$2400">$2101-$2400</option>
               <option value="$2401-$2700">$2401-$2700</option>
               <option value="$3001-$3300">$3001-$3300</option>
               <option value="más de $6000">más de $3300</option>
             </select>

             <div class="input-group-append">
              <span class="input-group-text">.00</span>
            </div>
          </div>



        </div>
      </div>







      <div class="form-group row">
        <label class="col-12" >Período de inicio*</label>
        <div class="col-12">

         <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">
              <i class="fa fa-calendar"></i>
            </span>
          </div>
          <input type="number" name="FechaInicio" class="form-control"  min="1000" value="<?php echo$FechaInico ?>" Required placeholder="Año" >
        </div>


      </div>
    </div>

    <div class="form-group row">
      <label class="col-12">Período de Finalización*</label>
      <div class="col-12">

       <div id="periodoFinal"></div>
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






  <div class="form-group row">
    <label class="col-12">Estado*</label>
    <div class="col-12">
     <select class='form-control' name="estado" id="estado" Required>
      <option selected value='' disabled>Seleccione una opción</option>
      <option value="Activo">Activo</option>
      <option value="Pausa">Pausa</option>
      <option value="Finalizado">Finalizado</option>
    </select>
  </div>
</div>



<div class="form-group row">
  <label class="col-12">Descripción breve de lo que realizó*</label>
  <div class="col-12">
    <!-- CKEditor (js-ckeditor id is initialized in Helpers.ckeditor()) -->
    <!-- For more info and examples you can check out http://ckeditor.com -->
    <textarea class="form-control" id="js-ckeditor" name="Descrip" placeholder="Main Description" rows="8" required><?php echo$Descripcion ?></textarea>
  </div>
</div>



<?php 

if ($resultExperiencia == 5) { 

  if (!$_GET['id']==null) {

   echo "<button type='submit' class='btn btn-block  btn-alt-primary' name='Guardar'>
   <i class='fa fa-save mr-5'></i>Actualizar
   </button>";

 }


}else{ 

  if (!$_GET['id']==null) {
    echo "<button type='submit' class='btn btn-block  btn-alt-primary' name='Guardar'>
    <i class='fa fa-save mr-5'></i>Actualizar
    </button>";

  }else{
    echo "<button type='submit' class='btn btn-block  btn-alt-primary' name='Guardar'>
    <i class='fa fa-save mr-5'></i>Guardar
    </button>";
  } 
}
?>

<?php  if (!$_GET['id']==null) {

  echo "<a href='experiencia' class='btn btn-block  btn-alt-primary' style='margin-left: 5px; margin-right: 5px;'>Añadir Nuevo</a>";
} ?>



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
        <h3 class="block-title">Listas de experiencia de <?php echo $PrimerNombre[0]; ?> </h3>

      </div>
      <div class="block-content block-content-full">

       <?php 

       if ($resultExperiencia >=1) {?>

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
              echo "<tr class='table-active'>
              <td class='text-center' scope='row'>".$n."</td>
              <td>".$item['Cargo']."</td>
              <td class='text-center'>
              <div class='btn-group'>
              <a href='experiencia?id=".base64_encode($item['IDExperiencia'])."' class='btn btn-sm btn-alt-primary js-tooltip-enabled' data-toggle='tooltip' title='' data-original-title='editar'>
              <i class='fa fa-pencil'></i> Editar
              </a>
              <button id='val".$n."' value=".base64_encode($item['IDExperiencia'])." data-toggle='modal' data-target='#exampleModal' class='btn btn-sm btn-alt-primary js-tooltip-enabled' data-toggle='tooltip' title='' data-original-title='eliminar'> <i class='fa fa-times'></i> Eliminar</button>
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
        echo $PrimerNombre[0] . " aún no has agregado experiencia profesionales.";
      }
      ?>


    </div>
  </div>
</form>
<!-- END Status -->





</div>

  <br>
  <div class="content py-5 text-center">
    <br>
    <a href="educacion?notificar=1" class="btn btn-rounded btn-noborder btn-alt-primary mr-5 mb-5"> <i class="si si-action-undo fa-2x5"> </i> Retroceder</a>
    <a href="habilidades?notificar=1" class="btn btn-rounded btn-noborder btn-alt-primary mr-5 mb-5"> <i class="si si-action-redo fa-2x5"> </i> Siguiente</a>
  </div>

  <br>

<!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Experiencia Laboral</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="Modelos/ModelosExperiencia/EliminarExperiencia.php" method="POST">
          <p>Seguro que desea eliminar</p>
          <input type="text" name="" id="Nombre" class="form-control"  disabled="true">
          <input type="hidden" name="IDEliminar"  id="IDEliminar">


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
                <h3 class="font-size-h2 font-w300 mt-20" data-toggle="appear" data-class="animated flipInY" id="titulos" style="color: #0B3486;">experiencias laborales</h3>
                <p class="text-muted" style="text-align: justify;" data-toggle="appear" data-class="animated fadeInUp">
                 <?php echo $PrimerNombre[0] ." ". $PrimerApellido[0]; ?>: Deberás agregar tus <b style="color: red;">experiencias</b> laborales ya sea en tu área , práctias profesionales , horas sociales o algún tipo <b style="color: red;">experiencias</b> laborales
                 <br><br>
                 Solo se puede añadir 5 <b style="color: red;">experiencias</b> laborales por lo tanto ya no podrás agregar otro, Si desea agregar deberá eliminar o actualizar.
                 <br><br>
                 <b style="color: #0B3486;">Nota: </b> Una vez agreado sus  <b style="color: red;">experiencias</b>  laborales deberá dar clic en botón siguiente para añadir sus habilidades.
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
                <img src="../../assets/img/icono/icono-advertencia.png" class="img-fluid" s  data-toggle="appear" data-class="animated flipInY" class="img-fluid" style="width: 100px; height: 100px;">
                <h3 class="font-size-h2 font-w300 mt-20"  data-toggle="appear" data-class="animated flipInY" id="titulos" style="color: #0B3486;">no hay Expereincias laborales</h3>
                <p class="text-muted" style="text-align: justify;" data-toggle="appear" data-class="animated fadeInUp">
                 <?php echo $PrimerNombre[0] ." ". $PrimerApellido[0]; ?>: Deberás agregar por lo <b>menos una experiencias</b> ya que es requesito completar el formulario  para poder continuar con el proceso. Ya sea de tu área , horas sociales , voluntariados, prácticas profesionales o alguna experiencia.
                 <br><br>
                 <b style="color: #0B3486;">Nota: Una vez agreado sus estudios deberá dar clic en el botón siguiente para añadir sus habilidades.</b>
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

<?php include_once 'templates/footer.php';
include_once 'templates/script.php';
include_once '../../templates/alertas.php';
?>

<script type="text/javascript">

  <?php if (!$_GET['id']==null) { ?>

   $(document).ready(function(){
    $("#estado option[value='<?php echo $Estado ?>'").attr("selected",true);
    $("#sueldo option[value='<?php echo $rangoSalarial ?>'").attr("selected",true);

  });


 <?php } ?>


 
 window.onload=function(){
  $("table tbody tr").click(function(){
        // Tomar la captura la información  de la tabla 
        var nombre= $(this).find("td:eq(1)").text(); 
        document.getElementById('Nombre').value=nombre;


        
      });    
}

$(".btn-group button").click(function(){

 var IDEliminar =$('#IDEliminar').val($(this).val());

});


$(document).ready(function() {
  $('#area').on('change', '#AreaCategoria', function() {
    var selected = $('#AreaCategoria option:selected');
    var value = selected.val();
        //var price = selected.data('price');
        if (value != "") {

         buscargar_cargos(value,"","");
       }

     })
});

<?php if (!$_GET['id']==null ) {?>
  $(buscargar_cargos(<?php echo $IDCategoria;?>,<?php echo $IDcargo;?>,'<?php echo $NombreCargo;?>'));
<?php }else{ ?>
  $(buscargar_cargos("","",""));
<?php } ?>


function buscargar_cargos(consulta,IDCargo,NombreCargo){
  $.ajax({
    url: 'Modelos/cargos/cargos.php' ,
    type: 'POST' ,
    dataType: 'html',
    data: {consulta: consulta,IDCargo:IDCargo,NombreCargo:NombreCargo},
  })
  .done(function(respuesta){
    $("#resultCargos").html(respuesta);
  })
  .fail(function(){
    console.log("error");
  });
}


$(document).ready(function() {

  <?php if($FechaFinal == "Actualmente"){ ?>

    $("#resultinput").html('<input type="text" name="mostrar"  id="mostrar" class="form-control" value="Actualmente" disabled >');

    $("#periodoFinal").html('<input type="hidden" name="FechaFinal"  id="FechaFinal"class="form-control" value="Actualmente" required >');

  <?php }else{ ?>
    $("#periodoFinal").html('<input type="date" name="FechaFinal"  id="FechaFinal"class="form-control" value="<?php echo $FechaFinal; ?>" required>');
  <?php } ?>

  $('#Actualmente').click(function () {
    //check if checkbox is checked
    if ($(this).is(':checked')) {

     $("#resultinput").html('<input type="text" name="mostrar"  id="mostrar" class="form-control" value="Actualmente" disabled >');

     $("#periodoFinal").html('<input type="hidden" name="FechaFinal"  id="FechaFinal"class="form-control" value="Actualmente" required >');


   } else {

    $("#resultinput").html("");

    $("#periodoFinal").html('<input type="date" name="FechaFinal"  id="FechaFinal"class="form-control" value="<?php echo $FechaFinal; ?>" required>');
  }
});

});

</script>
