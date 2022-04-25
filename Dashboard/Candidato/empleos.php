<?php
include_once '../../BD/Conexion.php';
include_once '../../BD/Consultas.php';
include_once '../../main/funcionesApp.php';
include_once 'templates/head.php';
$Conexion = new Consultas();
$FuncionesApp = new funcionesApp();
include_once 'templates/validar-perfil.php';
$sql = "SELECT * FROM soporte_areas_trabajos";
$stmt = $Conexion->ejecutar_consulta_simple($sql);

$sql2 = "SELECT * FROM `soporte_paises`";
$stmt2 = $Conexion->ejecutar_consulta_simple($sql2);

?>
<title>Candidato | empleos</title>
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
           <center><img src="../../assets/img/logo/logoMundoEmpleo.png" data-toggle="appear" data-class="animated bounceInDown" class="img-fluid" style="width: 250px; height: 100px;"></center>
          <h2 class="h4 font-w400 text-white-op invisible" id="titulos" data-toggle="appear" data-class="animated fadeInUp">Empleos</h2>
        </div>
      </div>
    </div>
  </div>

  <div style="margin-right:2%; margin-left:2%;">
    <br>

    <div class="row">
      
      <div class="col-sm-4">
        <form action="filtros-empleos.php" action="POST"> 
          <select class="form-control" id="example-select1" required name="area">
            <option selected value="" disabled>Seleccione una área</option>
            <option value="CualquierÁrea">Cualquier Área</option>
            <?php 
            while ($item=$stmt->fetch())
            {
             echo "<option value=".$item['IDCategoria'].">".$item['Nombre']."</option>";
           }

           ?>
         </select>
       </div>
       <div class="col-sm-4">
        <select class="form-control" id="example-select2" required name="pais">
          <option selected disabled value="">Seleccione un pais</option>      
          <option value="CualquierPais">Cualquier Pais</option>
          <?php 
          while ($item=$stmt2->fetch())
          {
           echo "<option value=".$item['IDPais'].">".$item['Nombre']."</option>";
         }

         ?>
       </select>
     </div>
     <div class="col-sm-4">
      <center>
        <input type="submit" name="Buscar" value="Buscar" class="btn btn-primary btn-lg btn-block">
      </center>
      
    </div>
  </form>
</div>
<br><br><br>
<div class="block">
  <div class="block-content block-content-full">
    <div class="table-responsive ">

      <?php  
      include_once '../../../../BD/Conexion.php';
      include_once '../../../../BD/Consultas.php';
      include_once '../../../../main/funcionesApp.php';
      $FuncionesApp = new funcionesApp();

      $sql = "SELECT IDpostulaciones, EP.Nombre 'Empresa',EP.logo , EP.Confidencial ,Plaza, OT.Expira FROM empresa_ofertas_trabajos OT INNER JOIN empresa_perfil EP ON OT.IDEmpresa = EP.IDEmpresa WHERE OT.FechaPublicacion <= ? AND OT.Expira >= ? ORDER BY `OT`.`IDpostulaciones` DESC ";
      $fechaActual =date("Y-m-d");

      $salida = "";

      $stmt =  Conexion::conectar()->prepare($sql);

      if ($stmt->execute(array($fechaActual,$fechaActual))){

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

<script type="text/javascript">



  $('#buscar').on('click', function() {

    var selected = $('#example-select1 option:selected');
    var area = selected.val();

    var selected2 = $('#example-select2 option:selected');
    var pais = selected2.val();

    if (area ==""){

      swal({title:'alerta',text:'Por favor seleccione una área',type:'error'});
    }
    else if(pais == "")
    {
     swal({title:'alerta',text:'Por favor Seleccione un pais',type:'error'}); 
   }



 });


</script>
