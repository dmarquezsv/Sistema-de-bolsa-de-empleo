<?php
include_once '../../BD/Conexion.php';
include_once '../../BD/Consultas.php';
include_once '../../main/funcionesApp.php';
include_once 'templates/head.php';
$Conexion = new Consultas();
$FuncionesApp = new funcionesApp();
include_once 'templates/validar-perfil.php';

$sql3 = "SELECT * FROM `soporte_areas_trabajos` ORDER BY `soporte_areas_trabajos`.`Nombre` ASC ";
$stmt3 = $Conexion->ejecutar_consulta_simple($sql3);

$ResultTrabajo = $Conexion->ejecutar_consulta_conteo("usuario_areas","IDUsuario",$IDUser);
$sql4 ="SELECT IDAreas , CD.nombre FROM usuario_areas UA INNER JOIN soporte_areas_trabajos TA ON UA.IDCategoria = TA.IDCategoria LEFT JOIN soporte_cargos_desempenado CD ON UA.IDDesempenado = CD.IDDesempenado WHERE IDUsuario = ?";
$stmt4 = $Conexion->ejecutar_consulta_simple_Where($sql4 , $IDUser);



?>
<title>Candidato | alertas de trabajos</title>
<?php 
include_once 'templates/styles.php';
include_once 'templates/MenuRight.php';
include_once 'templates/MenuLeft.php';
include_once 'templates/header.php';
?>

<style type="text/css">
  #imgbanner{

    background: url('../assets/media/photos/Alertas_de_Trabajo.jpg');
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
          <h3 class="font-size-h2 font-w300 mt-20"  data-toggle="appear" data-class="animated flipInY" id="titulos" style="color: white;">Notificaciones de trabajos </h3>
        </div>
      </div>
    </div>
  </div>



  <div style="margin-right:2%; margin-left:2%;">

    <br>
    <a href="./" class="btn btn-rounded btn-noborder btn-alt-primary mr-5 mb-5"> <i class="si si-action-undo fa-2x5"> </i> Retroceder</a>
    <br><br>

    <div class="row gutters-tiny">
      <!-- Basic Info -->
      <div class="col-md-7">

        <div class="block block-rounded block-themed">
          <div class="block-header bg-gd-primary">

            <div class="block-options">
              <form action="Modelos/ModelosAreasTrabajos/NuevaAreaTrabajo.php" method="POST">
                <input type="hidden" name="Iduser" value="<?php echo $IDUser; ?>">
              </div>
            </div>
            <div class="block-content block-content-full">

              <p> <?php echo $PrimerNombre[0] ." ". $PrimerApellido[0]; ?>: en esta sección deberás añadir tu área de trabajo. Así la plataforma te notificará a tu e-mail las ofertas de trabajos del día. Si no desea recibir las ofertas de trabajos deberá eliminar las que añadio.</p>

              <p><b>IMPORTANTE:</b> Los campos con asterisco (*) son obligatorios y deben ser completados para continuar con el proceso de registro.</p>

              <?php  if ($ResultTrabajo == 5) { 

                echo '<div class="alert alert-warning" role="alert">
                Se agreado 5 áreas trabajos por lo tanto ya no podras agregar otro, Si desea agregar debera eliminar.
                </div>';

              } 
              ?>

              <div class="form-group row">
                <label class="col-12" for="example-select2">Seleccione la áreas*</label>
                <div class="col-12" id="area">
                  <select class="js-select2 form-control" id="AreaCategoria" name="areas" style="width: 100%;" data-placeholder="Selecciona una opción" required>
                    <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                    <?php 
                    while ($item=$stmt3->fetch())
                    {
                     echo "<option value=".$item['IDCategoria'].">".$item['Nombre']."</option>";
                   }

                   ?>
                 </select>
               </div>
             </div>


             <div class="form-group row">
              <label class="col-12" for="example-select2" >seleccione el Cargo *</label>
              <div class="col-12">

                <div id="resultCargos">
                </div>

                <input type="hidden" name="alertaCargo" id="alertaCargo">

              </div>
            </div>

               <?php 
                if ($ResultTrabajo == 5) { 

                  echo "<button type='button' class='btn  btn-block btn-alt-primary' name='' disabled>
                  <i class='fa fa-close mr-5'></i>
                  </button>";

                }else{

                  echo "<button type='submit' class='btn  btn-block btn-alt-primary' name='Guardar'>
                  <i class='fa fa-save mr-5'></i>Guardar
                  </button>";
                  
                }
                ?>

          </div>
        </div>
      </form>


    </div>
    <!-- END Basic Info -->


    <!-- More Options -->
    <div class="col-md-5">
     <!-- Area de Idiomas -->
     <div class="block block-rounded block-themed">
      <div class="block-header bg-gd-primary">
        <h3 class="block-title">Áreas de interes de trabajo de <?php echo $PrimerNombre[0]; ?> </h3>

      </div>
      <div class="block-content block-content-full">


       <?php 

       if ($ResultTrabajo >=1) {?>

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
           while ($item=$stmt4->fetch())
           {
             echo "<tr class='table-active'>
             <th class='text-center' scope='row'>".$n."</th>
             <td>".$item['nombre']."</td>
             <td class='text-center'>
             <div class='btn-group'>
             <button id='val".$n."' value=".base64_encode($item['IDAreas'])." data-toggle='modal' data-target='#exampleModal' class='btn btn-sm btn-alt-primary js-tooltip-enabled' data-toggle='tooltip' title='' data-original-title='eliminar'> <i class='fa fa-times'></i> Eliminar </button>                
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
      echo $PrimerNombre[0] . " aún no has agregado interes de trabajo.";
    }
    ?>


  </div>
</div>

<!-- Fin de Area de Idiomas -->


</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar área de trabajo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="Modelos/ModelosAreasTrabajos/EliminarAreaTrabajos.php" method="POST">
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


$(document).ready(function() {
  $('#resultCargos').on('change', '#cargo', function() {
    var selected2 = $('#cargo option:selected');
    var value2 = selected2.val();
        
      var selected2 =$('#alertaCargo').val(value2);

     })
});

 $(buscargar_cargos("","",""));
  function buscargar_cargos(consulta,IDCargo,NombreCargo){
  $.ajax({
    url: 'Modelos/cargos/buscarCargosAlertas.php' ,
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


  window.onload=function(){
    $("table tbody tr").click(function(){
        // Tomar la captura la información  de la tabla 
        var nombre= $(this).find("td:eq(0)").text(); 
        document.getElementById('Nombre').value=nombre;
        
      });    
  }

  $(".btn-group button").click(function(){

   var IDEliminar =$('#IDEliminar').val($(this).val());

 })

</script>
