<?php
include_once '../../BD/Conexion.php';
include_once '../../BD/Consultas.php';
include_once '../../main/funcionesApp.php';
include_once 'templates/head.php';
$Conexion = new Consultas();
$FuncionesApp = new funcionesApp();
include_once 'templates/validar-perfil.php';

if($VerificaUsuarioHabilidades == 0)
{
  echo "<script>location.href='habilidades?advertencia=1';</script>";
}
else if($VerificaUsuarioIdiomas == 0){
 echo "<script>location.href='habilidades?advertencia=1';</script>";
}

$ResultReferencia = $Conexion->ejecutar_consulta_conteo("usuario_referencia","IDUsuario",$IDUser);


$sql ="SELECT `IDReferencia` , `Encargado` , `Empresa` FROM `usuario_referencia` WHERE `IDUsuario` = ?";
$stmt = $Conexion->ejecutar_consulta_simple_Where($sql , $IDUser);

if (!$_GET['id']==null) {

  $id = base64_decode($_GET['id']);
  $IDReferencia = $FuncionesApp->test_input($id);

  $sql2 = "SELECT * FROM `usuario_referencia` WHERE `IDReferencia` = ? ";
  $stmt2 = $Conexion->ejecutar_consulta_simple_Where($sql2 , $IDReferencia);

  while ($item=$stmt2->fetch())
  {
    $Encargado = $item['Encargado'];
    $Empresa = $item['Empresa'];
    $Cargo = $item['Cargo'];
    $Correo = $item['Correo'];
    $Telefono = $item['Telefono'];
  }

}

?>
<title>Candidato | Referencias</title>
<?php 
include_once 'templates/styles.php';
include_once 'templates/MenuRight.php';
include_once 'templates/MenuLeft.php';
include_once 'templates/header.php';
?>

<style type="text/css">
  #imgbanner{

    background: url('../assets/media/photos/Referencias_de_Trabajo.jpg');
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
          <h3 class="font-size-h2 font-w300 mt-20"  data-toggle="appear" data-class="animated flipInY" id="titulos" style="color: white;">Referencias </h3>
        </div>
      </div>
    </div>
  </div>

  <div class="bg-body-white border-b">
    <div class="content py-5 text-center">
      <nav class="breadcrumb bg-body-white mb-0 barraMenu">
        <a class="breadcrumb-item" href="javascript:void(0)"><b>Perfil</b></a>
        <span class="breadcrumb-item active"><b>Área referencias</b></span>
      </nav>
    </div>
  </div>

  <div style="margin-right:2%; margin-left:2%;">

    <div class="content py-5 text-center">
      <br>
      <a href="habilidades?notificar=1" class="btn btn-rounded btn-noborder btn-alt-primary mr-5 mb-5"> <i class="si si-action-undo fa-2x5"> </i> Retroceder</a>
      <a href="documentos?notificar=1" class="btn btn-rounded btn-noborder btn-alt-primary mr-5 mb-5"> <i class="si si-action-redo fa-2x5"> </i> Siguiente</a>
    </div>

    <br>

    <div class="row gutters-tiny">
      <!-- Basic Info -->
      <div class="col-md-7">

        <div class="block block-rounded block-themed">
          <div class="block-header bg-gd-primary">
            <div class="block-options">

              <?php 
              if (!$_GET['id']==null) {
                echo "<form action='Modelos/ModelosReferencias/ActualizarRefencia.php' method='POST' >";
                echo "<input type='hidden' name='IDReferencia' value='".$_GET['id']."'>";
              }else{
                echo "<form action='Modelos/ModelosReferencias/NuevaRefencia.php' method='POST' >";
              }
              ?>
              <input type="hidden" name="Iduser" value="<?php echo $IDUser; ?>">

              <?php  if (!$_GET['id']==null) {  echo "<a href='referencia' class='btn btn-sm btn-alt-primary' style='margin-left: 5px; margin-right: 5px;'>Añadir Nuevo</a>";
            }?>

            <?php 
            if ($ResultReferencia == 3) { 

              if (!$_GET['id']==null) {

               echo "<button type='submit' class='btn btn-sm btn-alt-primary' name='Guardar'>
               <i class='fa fa-save mr-5'></i>Actualizar
               </button>";

             }
             else{
              echo "<button type='button' class='btn btn-sm btn-alt-primary' name='' disabled>
              <i class='fa fa-close mr-5'></i>
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
         <i class="fa fa-info-circle fa-2x5 text-dark"></i>  Indicaciones : <?php echo $PrimerNombre[0] ." ". $PrimerApellido[0]; ?>: En esta sección deberás añadir tus <b style="color:#0B3486;" > referencias de trabajos es opcional. </b> 
       </div>

      

        <?php if ($ResultReferencia == 3) {
          echo '<div class="alert alert-warning" role="alert">
          Se agreado 3 referencia por lo tanto ya no podras agregar otro, Si desea agregar debera eliminar o actualizar.
          </div>';
        }
        ?>

        <div class="form-group row">
          <label class="col-12" for="ecom-product-meta-title">Nombre de la persona *</label>
          <div class="col-12"> 
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo$Encargado ?>" required placeholder="Digite el nombre de la persna"> 
          </div>
        </div>

        <div class="form-group row">
          <label class="col-12" for="ecom-product-meta-title">Nombre de la empresa / Opcional</label>
          <div class="col-12"> 
            <input type="text" class="form-control" id="empresa" name="empresa"  value="<?php echo$Empresa ?>" placeholder="Digite el nombre de la empresa">
          </div>
        </div>


        <div class="form-group row">
          <label class="col-12" for="ecom-product-meta-title">Cargo de la persona / Opcional</label>
          <div class="col-12"> 
            <input type="text" class="form-control" id="cargo" name="cargo"  value="<?php echo$Cargo ?>"  placeholder="Digite el cargo" >
          </div>
        </div>

        <div class="form-group row">
          <label class="col-12" for="ecom-product-meta-title">Correo Electrónico de la persona | Opcional</label>
          <div class="col-12"> 
            <input type="text" class="form-control" id="email" name="email" placeholder="email@ejemplo.com" value="<?php echo$Correo ?>">
          </div>
        </div>

        <div class="form-group row">
          <label class="col-12" for="ecom-product-meta-title">Teléfono de la Persona*</label>
          <div class="col-12"> 
            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="+000 0000-0000" value="<?php echo$Telefono ?>" >
          </div>
        </div>



            <?php 
            if ($ResultReferencia == 3) { 

              if (!$_GET['id']==null) {

               echo "<button type='submit' class='btn btn-block btn-alt-primary' name='Guardar'>
               <i class='fa fa-save mr-5'></i>Actualizar
               </button>";

             }
             else{
              echo "<button type='button' class='btn btn-block btn-alt-primary' name='' disabled>
              <i class='fa fa-close mr-5'></i>
              </button>";
            }

          }else{
            if (!$_GET['id']==null) {
              echo "<button type='submit' class='btn btn-block btn-alt-primary' name='Guardar'>
              <i class='fa fa-save mr-5'></i>Actualizar
              </button>";


            }else{
              echo "<button type='submit' class='btn btn-block btn-alt-primary' name='Guardar'>
              <i class='fa fa-save mr-5'></i>Guardar
              </button>";
            } 
          }
          ?> 

          <?php  if (!$_GET['id']==null) {  echo "<a href='referencia' class='btn btn-block btn-alt-primary' style='margin-left: 5px; margin-right: 5px;'>Añadir Nuevo</a>";
            }?>


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
    <h3 class="block-title">Listas de Referencias de <?php echo $PrimerNombre[0]; ?> </h3>

  </div>
  <div class="block-content block-content-full">

   <?php 

   if ($ResultReferencia >=1) {?>

     <table class="table table-borderless table-vcenter">
      <thead>
        <tr>
          <th class="text-center" style="width: 50px;">#</th>
          <th>Encargado</th>
          <th>Empresa</th>
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
         <td>".$item['Encargado']."</td>
         <td>".$item['Empresa']."</td>
         <td class='text-center'>
         <div class='btn-group'>
         <a href='?id=".base64_encode($item['IDReferencia'])."' class='btn btn-sm btn-alt-primary js-tooltip-enabled' data-toggle='tooltip' title='' data-original-title='editar'>
         <i class='fa fa-pencil'></i> Editar
         </a>
         <button id='val".$n."' value=".base64_encode($item['IDReferencia'])." data-toggle='modal' data-target='#exampleModal' class='btn btn-sm btn-alt-primary js-tooltip-enabled' data-toggle='tooltip' title='' data-original-title='eliminar'> <i class='fa fa-times'></i> Eliminar</button>                           
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
  echo $PrimerNombre[0] . "  aún no has agregado referencias.";
}
?>


</div>
</div>

<!-- Fin de Area de Idiomas -->


</div>

<div class="content py-5 text-center">
      <br>
      <a href="habilidades?notificar=1" class="btn btn-rounded btn-noborder btn-alt-primary mr-5 mb-5"> <i class="si si-action-undo fa-2x5"> </i> Retroceder</a>
      <a href="documentos?notificar=1" class="btn btn-rounded btn-noborder btn-alt-primary mr-5 mb-5"> <i class="si si-action-redo fa-2x5"> </i> Siguiente</a>
    </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar la referencia</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="Modelos/ModelosReferencias/EliminarReferencia.php" method="POST">
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
                <img src="../../assets/recusosMundoEmpleo/logo.png" class="img-fluid" style="height: 100px; width: 250px;">
                <h3 class="font-size-h2 font-w300 mt-20"  data-toggle="appear" data-class="animated flipInY" id="titulos" style="color: #0B3486;">Referencias de trabajos / Opcional </h3>
                <p class="text-muted" style="text-align: justify;" data-toggle="appear" data-class="animated fadeInUp">
                 <?php echo $PrimerNombre[0] ." ". $PrimerApellido[0]; ?>: Deberás agregar tus referencias laborales ya sea en tu área , prácticas profesionales , horas sociales o algún tipo experiencias laborales. Este apartado es opcional.
                 <br><br>
                 Solo  puede añadir 3 referencias  por lo tanto ya no podrás agregar otra, Si desea agregar deberá eliminar o actualizar.
                 <br><br>
                 <b style="color: #0B3486;">Nota: Una vez agregado sus referencias debera dar clic en el botón siguiente para anexar su curriculum vitae.</b>
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
