<?php
include_once '../../BD/Conexion.php';
include_once '../../BD/Consultas.php';
include_once '../../main/funcionesApp.php';
include_once 'templates/head.php';
$Conexion = new Consultas();
$FuncionesApp = new funcionesApp();

$sql = "SELECT * FROM `soporte_areas_trabajos` ORDER BY `Nombre` ASC ";
$stmt = $Conexion->ejecutar_consulta_simple($sql);

$resultExperiencia = $Conexion->ejecutar_consulta_conteo("usuario_experiencia","IDUsuario",$IDUser);

$sql2 = "SELECT * FROM `soporte_tipo_empresa` ORDER BY `Area` ASC ";
$stmt2 = $Conexion->ejecutar_consulta_simple($sql2);

$sql3 ="SELECT IDExperiencia , Cargo FROM `usuario_experiencia` WHERE IDUsuario = ?";
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
<title>Candidato | Perfil</title>
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
          <h2 class="h4 font-w400 text-white-op invisible" data-toggle="appear" data-class="animated fadeInUp">Experiencia Laboral</h2>
        </div>
      </div>
    </div>
  </div>



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
            <h3 class="block-title">Area Experiencia Profesionale</h3>
            <div class="block-options">
              <?php if (!$_GET['id']==null) {
                echo "<button type='submit' class='btn btn-sm btn-alt-primary' name='Guardar'>
                <i class='fa fa-save mr-5'></i>Actualizar
                </button>";
              }else{
                echo "<button type='submit' class='btn btn-sm btn-alt-primary' name='Guardar'>
                <i class='fa fa-save mr-5'></i>Guardar
                </button>";
              } 
              ?>
              <a href="index" class="btn btn-sm btn-alt-primary">Regresar</a>
            </div>
          </div>
          <div class="block-content block-content-full">
            <p> <?php echo $PrimerNombre[0] ." ". $PrimerApellido[0]; ?>:En esta sección deberas agregar tus expereincias laborales , practias professionales o algun tipo de servio que hayas elaborado por ejemplos horas sociales  y asi los recluatadores sepan de tus expereincias. <b>Puedes ingresar hasta 5 estudios</b>.</p>

            <p><b>IMPORTANTE:</b> Los campos con asterisco (*) son obligatorios y deben ser completados para continuar con el proceso de registro.</p>

            <div class="form-group row">
              <label class="col-6" for="ecom-product-meta-title">Cargo ejercido o Puesto de trabajo *</label>
              <div class="col-6">
                <input type="text" class="form-control" id="Puesto" name="Puesto"  value="<?php echo$Cargo ?>"> 
              </div>
            </div>

            <div class="form-group row">
              <label class="col-12" for="example-select2">Seleccione la área*</label>
              <div class="col-12" id="pais">
                <!-- Select2 (.js-select2 class is initialized in Helpers.select2()) -->
                <!-- For more info and examples you can check out https://github.com/select2/select2 -->
                <select class="js-select2 form-control" id="AreaCategoria" name="AreaCategoria" style="width: 100%;" data-placeholder="Selecciona una opción">
                  <option value="<?php echo $IDCategoria; ?>"><?php echo $NombreCategoria; ?></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                  <?php 
                  while ($item=$stmt->fetch())
                  {
                   echo "<option value=".$item['IDCategoria'].">".$item['Nombre']."</option>";
                 }

                 ?>
               </select>
             </div>
           </div>


           <div class="form-group row">
            <label class="col-12" for="example-select2">Sector de empresa*</label>
            <div class="col-12" id="pais">
              <!-- Select2 (.js-select2 class is initialized in Helpers.select2()) -->
              <!-- For more info and examples you can check out https://github.com/select2/select2 -->
              <select class="js-select2 form-control" id="example-select3" name="SectorEmpresa" style="width: 100%;" data-placeholder="Selecciona una opción">
                <option value="<?php echo $IDTipoEmpresa; ?>"><?php echo $NombreArea; ?></option>
                <?php 
                while ($item=$stmt2->fetch())
                {
                 echo "<option value=".$item['IDTipoEmpresa'].">".$item['Area']."</option>";
               }

               ?>
             </select>
           </div>
         </div>

         <div class="form-group row">
          <label class="col-12" for="example-select2">Cargo Desempeñado*</label>
          <div class="col-12">
            <!-- Select2 (.js-select2 class is initialized in Helpers.select2()) -->
            <!-- For more info and examples you can check out https://github.com/select2/select2 -->
            <select class="js-select2 form-control" id="example-select4" name="cargo" style="width: 100%;" data-placeholder="Selecciona una opción">
              <option value="<?php echo $IDcargo; ?>"><?php echo $NombreCargo; ?></option>
              <?php 
              while ($item=$stmt4->fetch())
              {
               echo "<option value=".$item['IDDesempenado'].">".$item['nombre']."</option>";
             }

             ?>
           </select>
         </div>
       </div>

       <div class="form-group row">
        <label class="col-6" for="ecom-product-meta-title">Nombre de la Empresa *</label>
        <div class="col-6">
          <input type="text" class="form-control" id="Empresa" name="Empresa"  value="<?php echo$Empresa ?>"> 
        </div>
      </div>







      <div class="form-group row">
        <label class="col-6">Rango Salarial*</label>
        <div class="col-6">
         <select class='form-control' name="Sueldo">
            <?php if (!$_GET['id']==null) {
              echo "<option selected value=".$rangoSalarial.">".$rangoSalarial."</option>";
            }else{
              echo "<option selected value='' disabled>Seleccione una opción</option>"; 
            }
            ?>
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
           <option value="$2401-$2700">$2401-$2700</option>
           <option value="$3001-$3300">$3001-$3300</option>
           <option value="más de $6000">más de $3300</option>
         </select>
       </div>
     </div>







     <div class="form-group row">
      <label class="col-6">Periodo de inicio*</label>
      <div class="col-6">
       <input type="number" name="FechaInicio" class="form-control" value="<?php echo$FechaInico ?>">
     </div>
   </div>

   <div class="form-group row">
    <label class="col-6">Periodo de Finalización*</label>
    <div class="col-6">
     <input type="number" name="FechaFinal" class="form-control" value="<?php echo$FechaFinal ?>"> 
   </div>
 </div>



 <div class="form-group row">
  <label class="col-6">Pagina de la empresa / Opcional</label>
  <div class="col-6">
   <input type="text" name="webempresa" class="form-control" value="<?php echo $webempresa ?>">
 </div>
</div>




<div class="form-group row">
  <label class="col-6">Estado*</label>
  <div class="col-6">
   <select class='form-control' name="estado">
       <?php if (!$_GET['id']==null) {
              echo "<option selected value=".$Estado.">".$Estado."</option>";
            }else{
              echo "<option selected value='' disabled>Seleccione una opción</option>"; 
            }
            ?>
     <option value="Activo">Activo</option>
     <option value="Pausa">Pausa</option>
     <option value="Finalizado">Finalizado</option>
   </select>
 </div>
</div>



<div class="form-group row">
  <label class="col-12">Descripción breve de lo que realizaste*</label>
  <div class="col-12">
    <!-- CKEditor (js-ckeditor id is initialized in Helpers.ckeditor()) -->
    <!-- For more info and examples you can check out http://ckeditor.com -->
    <textarea class="form-control" id="js-ckeditor" name="Descrip" placeholder="Main Description" rows="8"><?php echo$Descripcion ?></textarea>
  </div>
</div>



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
        <h3 class="block-title">Listas de Experiencia de <?php echo $PrimerNombre[0]; ?> </h3>

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
             <a href='experiencia?id=".base64_encode($item['IDExperiencia'])."' class='btn btn-sm btn-secondary js-tooltip-enabled' data-toggle='tooltip' title='' data-original-title='editar'>
             <i class='fa fa-pencil'></i>
             </a>
             <button id='val".$n."' value=".base64_encode($item['IDExperiencia'])." data-toggle='modal' data-target='#exampleModal' class='btn btn-sm btn-secondary js-tooltip-enabled' data-toggle='tooltip' title='' data-original-title='eliminar'> <i class='fa fa-times'></i> </button>
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
      echo $PrimerNombre[0] . " Aún no has agregado experiencia professionales.";
    }
    ?>


  </div>
</div>
</form>
<!-- END Status -->





</div>


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



<?php include_once 'templates/footer.php';
include_once 'templates/script.php';
include_once '../../templates/alertas.php';
?>

<script type="text/javascript">

  window.onload=function(){
    $("table tbody tr").click(function(){
        // Tomar la captura la información  de la tabla 
        var nombre= $(this).find("td:eq(1)").text(); 
        document.getElementById('Nombre').value=nombre;

        



        
      });    
  }

   $(".btn-group button").click(function(){
        
         var IDEliminar =$('#IDEliminar').val($(this).val());

   })


</script>
