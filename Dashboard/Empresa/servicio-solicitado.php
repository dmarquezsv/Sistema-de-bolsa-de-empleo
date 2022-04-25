<?php
include_once '../../BD/Conexion.php';
include_once '../../BD/Consultas.php';
include_once '../../main/funcionesApp.php';
include_once 'templates/head.php';
$Conexion = new Consultas();
$FuncionesApp = new funcionesApp();

$sql ="SELECT `nombre_encargado` , `Email` , tel, `comentario` , `FechaSolicitada` , `Estado` FROM `servicio_solicitado_empresa` WHERE `IDUsuario` = ?  ORDER BY `servicio_solicitado_empresa`.`IDServcio` DESC";
$stmt = $Conexion->ejecutar_consulta_simple_Where($sql , $IDUser);

?>
<title>Empresa | Reclutador</title>
<?php 
include_once 'templates/styles.php';
include_once 'templates/MenuRight.php';
include_once 'templates/MenuLeft.php';
include_once 'templates/header.php';
?>

<style type="text/css">

  #imgbanner{

    background: url('../assets/media/photos/Soporte_Tecnico.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    height:auto;
  }



</style>

<main id="main-container">

  <div class="bg-image bg-image-bottom" id="imgbanner">
    <div class="">
      <div class="content content-top text-center overflow-hidden">
        <div class="pt-40 pb-20">

          <h2 class="h4 font-w400  invisible" id="titulos"  style="color: white;" data-toggle="appear" data-class="animated fadeInUp">Historial del Servicio solicitado</h2>
        </div>
      </div>
    </div>
  </div>
  <div style="margin-right:2%; margin-left:2%;">


    <div class="content py-5 ">

      <br>

      <div class="text-center">
        <a href="./" class="btn  btn-rounded btn-noborder btn-alt-primary btn-lg mr-5 mb-5"> <i class="si si-action-undo fa-2x5"> </i> Retroceder</a>

        <a href="solicitar-servicio-empresa" class="btn  btn-rounded btn-noborder btn-alt-primary btn-lg mr-5 mb-5"> <i class="fa fa-building-o"> </i> Solicitar Servicio</a>  
      </div>

      <br><br>

      <p>A continuación se muestran el historial de los servicios solicitado para utilizar la plataforma de mundo empleo a las cuales has solicitado, desde la más reciente a la más antigua.
      </p>

      

    </div>


    <!-- Dynamic Table Full Pagination -->
    <div class="block">

      <div class="block-content block-content-full">
        <!-- DataTables functionality is initialized with .js-dataTable-full-pagination class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->

        <div class="table-responsive ">
          <table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
            <thead>
              <tr>
                <th>#</th>
                <th>Persona Encargada</th>
                <th>E-mail</th>
                <th>teléfono</th>
                <th>Comentario</th>
                <th>Fecha Solicitado</th>
                <th>Estado</th>
              </tr>
            </thead>
            <tbody>

              <?php 

              $N = 1;

              while ($item=$stmt->fetch())
              {         

                echo '<tr>
                <td>'.$N.'</td>
                <td>'.$item['nombre_encargado'].'</td>
                <td>'.$item['Email'].'</td>
                <td>'.$item['tel'].'</td>
                <td>'.$item['comentario'].'</td>
                <td>'.$item['FechaSolicitada'].'</td>
                <td><b>'.$item['Estado'].'</b></td>
                </tr>';
                $N++;
              }


              ?>


            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- END Dynamic Table Full Paginatio-->


  </div>
</div>

</main>



<?php include_once 'templates/footer.php';
include_once 'templates/script.php';
include_once '../../templates/alertas.php';
?>

