<?php
include_once '../../BD/Conexion.php';
include_once '../../BD/Consultas.php';
include_once '../../main/funcionesApp.php';
include_once 'templates/head.php';
$Conexion = new Consultas();
$FuncionesApp = new funcionesApp();
include_once 'templates/validar-perfil.php';
?>
<title>Empresa | oferta trabajos</title>
<?php 
include_once 'templates/styles.php';
include_once 'templates/MenuRight.php';
include_once 'templates/MenuLeft.php';
include_once 'templates/header.php';
?>

<style type="text/css">
  #imgbanner{

    background: url('../assets/media/photos/Area_de_Empresa.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    height: auto;
  }
</style>

<main id="main-container">

  <div class="bg-image bg-image-bottom" style="background-image: url('../assets/media/photos/photo34@2x.jpg');">
        <div class="bg-primary-dark-op">
            <div class="content content-top text-center overflow-hidden">
                <div class="pt-40 pb-20">
                 <center><img src="../../assets/img/logo/logoMundoEmpleo.png" data-toggle="appear" data-class="animated bounceInDown" class="img-fluid" style="width: 250px; height: 100px;"></center>
                 <h2 class="h4 font-w400 text-white-op invisible" id="titulos" data-toggle="appear" data-class="animated fadeInUp">Perfil De Empresa</h2>
             </div>
         </div>
     </div>
 </div>

  <div style="margin-right:2%; margin-left:2%;">

    <div class="content">
      <h2 class="content-heading">Área De Empresas <a class="btn btn-secondary" href="empresa?id=<?php echo$_GET['id'] ?>">
        <i class="fa fa-caret-left text-primary mr-5 "></i> Regresar
      </a></h2> 

      <p>En esta área puedas encontrar las ofertas de trabajos que la  empresas <?php echo base64_decode($_GET['Empresa']) ?>  ha publicado hasta el momento desde la más recientes hasta la más antigua</p>
    </div>


    <div class="block">
      <div class="block-content block-content-full">
        <div class="table-responsive ">

          <?php  
          include_once '../../../../BD/Conexion.php';
          include_once '../../../../BD/Consultas.php';
          include_once '../../../../main/funcionesApp.php';
          $FuncionesApp = new funcionesApp();

          $idEmpresa=base64_decode($_GET['id']);

          $sql = "SELECT IDpostulaciones, EP.Nombre 'Empresa',EP.logo , EP.Confidencial ,Plaza, OT.Expira FROM empresa_ofertas_trabajos OT INNER JOIN empresa_perfil EP ON OT.IDEmpresa = EP.IDEmpresa WHERE OT.FechaPublicacion <= ? AND OT.Expira >= ? AND EP.IDEmpresa = ? ORDER BY `OT`.`IDpostulaciones` DESC ";
          $fechaActual =date("Y-m-d");

          $salida = "";

          $stmt =  Conexion::conectar()->prepare($sql);

          if ($stmt->execute(array($fechaActual,$fechaActual,$idEmpresa))){

            if ($stmt->rowCount()>0){
              $N = 1;

              $salida.=' <table class="table table-striped table-bordered js-dataTable-full-pagination">
              <thead>
              <tr>
              <th class="text-center">#</th>
              <th>Logo</th>
              <th>Empresa</th>
              <th>Plaza</th>
              <th>Expira</th>
              <th>Opción</th>
              </tr>
              </thead>
              <tbody>';


              while ($item=$stmt->fetch())
              {
                if ($item['Confidencial'] == "Si") {
                  $PefilFoto = '<center><img src="../../main/img/LogosEmpresas/confidential.png" " style="width: 75%; height: 100px;"></center>';
                }else{
                  $PefilFoto = '<center><img src="../../main/img/LogosEmpresas/'.$item['logo'].'" style="width: 75%; height: 100px;"></center>';
                }

                if ($item['Confidencial'] == "Si") {
                  $NombreEmpresa = 'Confidencial';
                }else{
                  $NombreEmpresa = $item['Empresa'];
                }

                $salida.=' <tr>
                <td>'.$N.'</td>
                <td>'.$PefilFoto.'</td>
                <td>'.$NombreEmpresa.'</td>
                <td>'.$item['Plaza'].'</td>
                <td>'.$item['Expira'].'</td>
                <td>
                <a href="../../oferta_trabajo?id='.base64_encode($item['IDpostulaciones']).'" class="btn btn-lg btn-block btn-secondary" data-toggle="tooltip" title="Ver perfil de empresa" target="_blank"> <i class="fa fa-briefcase"></i> Ver oferta</a>
                </td>
                </tr>';
                $N++;

              }

              $salida.="</tbody></table>";

            }else{

              $salida = "No hay datos :(";
            }

          }else{
            echo "Problema para ejectar la consulta";
          }

          echo $salida;


          ?>

        </div>
      </div>
    </div>
    <!-- END Dynamic Table Full Paginatio-->



  </div>
  
</main>



<?php include_once 'templates/footer.php';
include_once 'templates/script.php';
include_once '../../templates/alertas.php';
?>

