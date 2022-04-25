<?php
include_once '../../BD/Conexion.php';
include_once '../../BD/Consultas.php';
include_once '../../main/funcionesApp.php';
include_once 'templates/head.php';
$Conexion = new Consultas();
$FuncionesApp = new funcionesApp();
include_once 'templates/validar-perfil.php';

$resultdocumento = $Conexion->ejecutar_consulta_conteo("usuarios_documentos","IDUsuario",$IDUser);

$sql ="SELECT * FROM `usuarios_documentos`  WHERE `IDUsuario` = ?";
$stmt = $Conexion->ejecutar_consulta_simple_Where($sql , $IDUser);


?>
<title>Candidato | Documentos</title>
<?php 
include_once 'templates/styles.php';
include_once 'templates/MenuRight.php';
include_once 'templates/MenuLeft.php';
include_once 'templates/header.php';
?>

<style type="text/css">
  #imgbanner{

    background: url('../assets/media/photos/Administracion.jpg');
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
          <h3 class="font-size-h2 font-w300 mt-20"  data-toggle="appear" data-class="animated flipInY" id="titulos" style="color: white;">ANEXAR DOCUMENTOS </h3>
        </div>
      </div>
    </div>
  </div>

    <div class="bg-body-white border-b">
    <div class="content py-5 text-center">
      <nav class="breadcrumb bg-body-white mb-0 barraMenu">
        <a class="breadcrumb-item" href="javascript:void(0)"><b>Perfil</b></a>
        <span class="breadcrumb-item active"><b>Área Documentos</b></span>
      </nav>
    </div>
  </div>

  <div style="margin-right:2%; margin-left:2%;">

    <div class="content py-5 text-center">
      <br>
      <a href="./" class="btn btn-rounded btn-noborder btn-alt-primary mr-5 mb-5"> <i class="si si-action-undo fa-2x5"> </i> Ir al panel</a>

      <a href="referencia-trabajo" class="btn btn-rounded btn-noborder btn-alt-primary mr-5 mb-5"> <i class="si si-action-undo fa-2x5"> </i> Retroceder</a>

      <button class="btn btn-rounded btn-noborder btn-alt-primary mr-5 mb-5" disabled><i class="si si-action-redo fa-2x5"> </i> Siguiente</button>

    </div>

    <br>


    <div class="row gutters-tiny">
      <!-- Basic Info -->
      <div class="col-md-7">

        <div class="block block-rounded block-themed">
          <div class="block-header bg-gd-primary">
            <h3 class="block-title">área de docuemtnos</h3>
            <div class="block-options">

              <form action="Modelos/ModelosDocumentos/guardardocumento2.php" method="POST" enctype="multipart/form-data">

                <input type="hidden" name="Iduser" value="<?php echo $IDUser; ?>">



              </div>
            </div>
            <div class="block-content block-content-full">

              <div class="alert alert-primary text-justify indicaciones" role="alert">
              <i class="fa fa-info-circle fa-2x5 text-dark"></i>  Indicaciones: <?php echo $PrimerNombre[0] ." ". $PrimerApellido[0]; ?> :En esta sección podrás agregar los docuemtnos como la <b style="color:#0B3486;">solvencia de la policía, documentos de identidad y anexar tu curriculum vitae </b> y los reclutadores visualizarán los archivos <b  style="color:#0B3486;">Solo documentos PDF</b>. 
            </div>

              

              

              <?php if ($resultdocumento == 5) {
                echo '<div class="alert alert-warning" role="alert">
                Se agreado 3 documentos por lo tanto ya no podras agregar otro, Si desea agregar debera eliminar.
                </div>';
              }
              ?>


              <div class="form-group row">
                <label class="col-12" for="ecom-product-meta-title">Nombre del archivo*</label>
                <div class="col-12"> 
                  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del archivo solo PDF" required>
                </div>
              </div>


              <div class="form-group row">
                <label class="col-12" for="ecom-product-meta-title">Subir documentos en pdf*</label>
                <div class="col-12"> 
                  <input type="file" name="archivo" id="archivo" class="form-control" accept="application/pdf" required/>
                </div>
              </div>


                <?php 
                if ($resultdocumento == 5) { 

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
          <h3 class="block-title">Listas de documentos de <?php echo $PrimerNombre[0]; ?> </h3>

        </div>
        <div class="block-content block-content-full">

         <?php 

         if ($resultdocumento >=1) {?>

           <table class="table table-borderless table-vcenter">
            <thead>
              <tr>
                <th class="text-center" style="width: 50px;">#</th>
                <th>Nombre del documento</th>
                <th>comprobante</th>
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
               <td>".$item['Documento']."</td>
               <td><a href='../../documentos/documentos_usuarios/".$item['IDUsuario']."/".$item['Documento']."' target='_blank'>Ver comprobante</a></td>
               <td class='text-center'>
               <div class='btn-group'>
               <button id='val".$n."' value=".base64_encode($item['IDDocumento'])." data-toggle='modal' data-target='#exampleModal' class='btn btn-sm btn-alt-primary js-tooltip-enabled' data-toggle='tooltip' title='' data-original-title='eliminar'> <i class='fa fa-times'></i> Eliminar</button>                           
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
        echo $PrimerNombre[0] . " aún no has ningun documento.";
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
        <h5 class="modal-title" id="exampleModalLabel">Eliminar el documento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="Modelos/ModelosDocumentos/eliminardocumentos2.php" method="POST">
          <p>Seguro que desea eliminar</p>
          <input type="text" name="" id="Nombre" class="form-control"  disabled="true">
          <input type="hidden" name="IDEliminar"  id="IDEliminar">
          <input type="hidden" name="Iduser2" value="<?php echo $IDUser; ?>">
          <input type="hidden"  id="Nombredocumento"  name="documento" class="form-control"  >
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

</div>


</main>



<?php include_once 'templates/footer.php';
include_once 'templates/script.php';
include_once '../../templates/alertas.php';
?>



<?php  if(isset($_GET['documentoError'])){ echo "<script>swal({title:'Advertenicia',text:'Debe anexar curriculum vitae. Recuerda poner el nombre del archivo curriculum vitae ".$PrimerNombre[0] ." ". $PrimerApellido[0]." ',type:'warning'  });</script>"; } ?>

<script type="text/javascript">

  window.onload=function(){
    $("table tbody tr").click(function(){
        // Tomar la captura la información  de la tabla 
        var nombre= $(this).find("td:eq(0)").text(); 
        document.getElementById('Nombre').value=nombre;

        var nombre= $(this).find("td:eq(0)").text(); 
        document.getElementById('Nombredocumento').value=nombre;

        
      });    
  }

  $(".btn-group button").click(function(){

   var IDEliminar =$('#IDEliminar').val($(this).val());

 })

</script>
