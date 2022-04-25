<?php
include_once '../../BD/Conexion.php';
include_once '../../BD/Consultas.php';
include_once '../../main/funcionesApp.php';
include_once 'templates/head.php';
$Conexion = new Consultas();
$FuncionesApp = new funcionesApp();
include_once 'templates/validar-perfil.php';




?>
<title>Candidato | Favoritos</title>
<?php 
include_once 'templates/styles.php';
include_once 'templates/MenuRight.php';
include_once 'templates/MenuLeft.php';
include_once 'templates/header.php';
?>
<style type="text/css">
  #imgbanner{

    background: url('../assets/media/photos/Postulaciones.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    height: auto;
  }

  #imglogo{

    width: 70%; 
    height: 12em;
    
  }

  @media only screen and (max-width: 767px) {

    #imglogo{

      width: 60%; 
      height: 12em;

    }


  }



  @media only screen and (min-width: 600px) and (max-width: 799px){

   #imglogo{

    width: 60%; 
    height: 10em;

  }

}


</style>



<main id="main-container">

  <div class="bg-image bg-image-bottom" id="imgbanner" >
    <div>
      <div class="content content-top text-center overflow-hidden">
        <div class="pt-40 pb-20">
          <h3 class="font-size-h2 font-w300 mt-20"  data-toggle="appear" data-class="animated flipInY" id="titulos" style="color: white;">Mis Postulaciones</h3>
        </div>
      </div>
    </div>
  </div>




  <div style="margin-right:2%; margin-left:2%;">

   <div class="content">

     <h3 id="titulos">Favoritos</h3><hr>

     <p>A continuación se muestran las ofertas de empleo las cuales has aguardado, desde la más reciente a la más antigua.
      <b>NOTA: Se mostrarán las ofertas activas mientra la fecha siga vigente  caso contrario ya no mostrarán</b></p>

     <a href="./" class="btn btn-rounded btn-noborder btn-alt-primary mr-5 mb-5"> <i class="si si-action-undo fa-2x5"> </i> Retroceder</a>


    </div>     
    <!-- Dynamic Table Full Pagination -->
    <div>

     <br> <br> <br> 
     
     <div class="row row-deck items-push">


      <?php 

      $fechaActual =date("Y-m-d");
      $sql = "SELECT FP.IDUsuario , FP.IDpostulaciones ,EP.logo,IDFavoritos , EP.Nombre AS 'Empresa', EP.Confidencial , OT.Plaza ,`fecha` , OT.Expira ,OT.Estado FROM usuario_favoritos_postulaciones FP INNER JOIN empresa_ofertas_trabajos OT ON FP.IDpostulaciones = OT.IDpostulaciones LEFT JOIN empresa_perfil EP ON EP.IDEmpresa = OT.IDEmpresa WHERE OT.FechaPublicacion <=  '$fechaActual' AND OT.Expira >= '$fechaActual' AND FP.IDUsuario = $IDUser ";



      define("NRO_REGISTROS",6);

      /* Pagination Code starts */
      $per_page_html = '';
      $page = 1;
      $start=0;
      if(!empty($_POST["page"])) {
        $page = $_POST["page"];
        $start=($page-1) * NRO_REGISTROS;
      }
      $limit=" limit " . $start . "," . NRO_REGISTROS;
      $pagination_statement = Conexion::conectar()->prepare($sql);

      $pagination_statement->execute();

      $row_count = $pagination_statement->rowCount();
      if(!empty($row_count)){
        $per_page_html .= "<div style='text-align:center;margin:20px 0px;'>";
        $page_count=ceil($row_count/NRO_REGISTROS);
        if($page_count>1) {
          for($i=1;$i<=$page_count;$i++){
            if($i==$page){
              $per_page_html .= '<input type="submit" name="page" value="' . $i . '" class="btn btn-alt-primary  btn-rounded"  />';
            } else {
              $per_page_html .= '<input type="submit" name="page" value="' . $i . '" class="btn btn-alt-primary  btn-rounded" />';
            }
          }
        }
        $per_page_html .= "</div>";
      }

      $query = $sql.$limit;
      $pdo_statement = Conexion::conectar()->prepare($query);
      $pdo_statement->execute();
      $resultados = $pdo_statement->fetchAll();

      $N = 1;

      if(!empty($resultados)) {
        foreach($resultados as $row) {

          $PefilFoto = "";
          $NombreEmpresa = "";

          if ($row['Confidencial'] == "Si") {
           $PefilFoto = '<center><img src="../../main/img/LogosEmpresas/confidential.png" class="img-fluid img-thumbnail" style="width: 100px;"></center>';
         }else{
          $PefilFoto = '<center><img src="../../main/img/LogosEmpresas/'.$row['logo'].'" class="img-fluid img-thumbnail" style="width: 100px;"></center>';
        }


        if ($row['Confidencial'] == "Si") {
         $NombreEmpresa = 'Confidencial';
       }else{
        $NombreEmpresa = $row['Empresa'];
      }

      echo '
      <div class="col-md-6 col-xl-4">
      <div class="block block-rounded text-center">
      <div class="block-content">
      '.$PefilFoto.'
      </div>
      <div class="block-content block-content-full">
      <div class="font-size-h5 font-w600 mb-0">'.$NombreEmpresa.'</div>
      <div class="font-size-h5 font-w600 mb-0" >'.$row['Plaza'].'</div> <br>
      <div class="font-size-h6 text-muted">Inscrita '.$row['fecha'].' <br> Expira '.$row['Expira'].'</div>
      <div class="font-size-h6 text-muted">'.$row['Estado'].'</div>
      </div> 
      <div class="block-content block-content-full bg-body-light">

      <a href="../../oferta_trabajo?id='.base64_encode($row['IDpostulaciones']).'" class="btn btn-alt-primary  btn-rounded" data-toggle="tooltip" title="Ver oferta de trabajo" target="_blank" style="margin-top: 6px;"> <i class="fa fa-briefcase fa-2x5"></i> </a>


      <button id="val'.$n.'" value="'.base64_encode($row['IDFavoritos']).'" data-toggle="modal" data-target="#exampleModal"  class="btn btn-alt-primary btn-rounded" data-toggle="tooltip" title="Eliminar la postualación de trabajo" data-original-title="eliminar" style="margin-top: 8px;"> <i class="fa fa-trash-o fa-2x5"></i></button>


      </div>
      </div>
      </div>

      ';

      $N++;

    }



  }else{



    ?>


  </div>

  
  <?php   echo '<div class="container alert alert-primary" role="alert">
  <p class="text-center"><b>No hay ninguna oferta de trabajo guardada</b></p>
  </div>'; } ?>



</div>
<!-- END Dynamic Table Full Paginatio-->


</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar de mis favoritos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="Modelos/ModelosFavoritos/ElimnarFavorito.php" method="POST">
          <p>Seguro que desea eliminar</p>
          
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

<br>

<div class="row">
  <div class="col-lg-12 col-md-12 col-12">
   <form name="frmSearch" action="" method="post">
    <?php echo$per_page_html; ?>
  </form>
</div>
</div>

</main>



<?php include_once 'templates/footer.php';
include_once 'templates/script.php';
include_once '../../templates/alertas.php';
?>

<script type="text/javascript">


  $(".block-content button").click(function(){


   var IDEliminar =$('#IDEliminar').val($(this).val());

 });


</script>


