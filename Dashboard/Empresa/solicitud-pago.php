<?php
include_once '../../BD/Conexion.php';
include_once '../../BD/Consultas.php';
include_once '../../main/funcionesApp.php';
include_once 'templates/head.php';
$Conexion = new Consultas();
$FuncionesApp = new funcionesApp();

$sql ="SELECT IDPago,`Enlace` , `comentario` , `Estado` FROM `solicitud_pago_empresa` WHERE `IDUsuario` = ?  ORDER BY `solicitud_pago_empresa`.`IDPago`  DESC";
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

          <h2 class="h4 font-w400  invisible" id="titulos"  style="color: white;" data-toggle="appear" data-class="animated fadeInUp">Solicitud de pago </h2>
        </div>
      </div>
    </div>
  </div>

  <div style="margin-right:2%; margin-left:2%;">

    <div class="container">
    <h2 class="content-heading">Área De Pagos <a class="btn  btn-rounded btn-noborder btn-alt-primary mr-5 mb-5" href="cpanel-visitante">
      <i class="si si-action-undo fa-2x5"> </i> Retroceder
    </a></h2>

    <p>A continuación se muestran los servicios de pago que realizado en la plataforma de mundo empleo a las cuales has solicitado desde la más reciente a la más antigua. <br><br><b>NOTA:</b> En la Columna <b>ESTADO</b> tiene varias opciones el primero es: <b>En espera</b>  la cual significa aun no has realizado el pago.<br>
      <ul>
        <li>Si el estado se encuentra <b>RECHAZADO:</b> Significa que no puedes utilizar plataforma. Por lo tanto la empresa se pondra contacto ya sea por teléfono o via chat. Para Solucionar problema.</li>
        <li>Si el estado se encuentra <b>Finalizado:</b> Significa que la empresas ya realizo el proceso de pago y esta listo para utilizar plataforma.</li>
      </ul>
    </p>

    </div>

    <!-- Dynamic Table Full Pagination -->
    <div class="block">

      <div class="block-content block-content-full">
        <!-- DataTables functionality is initialized with .js-dataTable-full-pagination class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->

        <div class="table-responsive">
          <table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
            <thead>
              <tr>
                <th>#</th>
                <th>Enlace de pago</th>
                <th>comentario</th>
                <th>Estado</th>
                <th>Opciones</th>
              </tr>
            </thead>
            <tbody>

              <?php 

              $N = 1;

              while ($item=$stmt->fetch())
              {         


                if ($item['Estado']== "Finalizado") {
                 $enlace = '<b>Pago realizado</b>';
               }
               else if($item['Estado']== "RECHAZADO"){
                $enlace = '<b>No se ha podido realizar el pago</b>';
              }
              else{
               $enlace = '<b><a href="'.$item['Enlace'].'" target="_blank">Realizar Pago</a></b>';

             }

             if ($item['Estado']== "Finalizado") {
               $opciones = '-';
             }else{
              $opciones = ' <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled"   data-toggle="modal" data-target="#exampleModal"  title="Enviar comentario" data-original-title="View Customer">
              <i class="fa fa-comment"></i>
              </button>
              <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled"   data-toggle="modal" data-target="#exampleModal"  title="Enviar comentario" data-original-title="View Customer">
              <i class="fa fa-envelope-o"></i>
              </button>';
            }


            echo '<tr>
            <td>'.$N.'</td>
            <td>'.$enlace.'</td>
            <td>'.$item['comentario'].'</td>
            <td>'.$item['Estado'].'</td>
            <td class="text-center">
            '.$opciones.'
            </td>

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


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Enviar un comentario</h5>
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

