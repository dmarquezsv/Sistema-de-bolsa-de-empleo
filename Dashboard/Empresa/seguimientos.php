<?php
include_once '../../BD/Conexion.php';
include_once '../../BD/Consultas.php';
include_once '../../main/funcionesApp.php';
include_once 'templates/head.php';
$Conexion = new Consultas();
$FuncionesApp = new funcionesApp();
include_once 'templates/seguridadCpanel.php';
$sql="SELECT
C.IDUsuario,
C.Nombre,
C.Apellidos,
fecha,
P.confidencial
FROM
guardar_seguimiento_candidato S
INNER JOIN usuarios_cuentas C ON
S.IDUsuario = C.IDUsuario
LEFT JOIN usuario_perfil P ON
C.IDUsuario = P.IDUsuario
WHERE
`IDEmpresa` = ?";
$stmt =  Conexion::conectar()->prepare($sql);
$stmt->execute(array($IDEmpresa));


?>
<title>Seguimiento Candidato | MUNDO EMPLEO CA</title>
<?php 
include_once 'templates/styles.php';
include_once 'templates/MenuRight.php';
include_once 'templates/MenuLeft.php';
include_once 'templates/header.php';
?>

<style type="text/css">

  #imgbanner{

    background: url('../assets/media/photos/Seguimientos-Candidatos.jpg');
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
        <h3 class="font-size-h2 font-w300 mt-20"  data-toggle="appear" data-class="animated flipInY" id="titulos" style="color: white;">Seguimiento De Candidatos </h3>
      </div>
    </div>
  </div>
</div>


<div style="margin-right:2%; margin-left:2%;">

  <div class="content py-5 text-center">

    <br>
    <a href="./" class="btn  btn-rounded btn-noborder btn-alt-primary mr-5 mb-5"> <i class="si si-action-undo fa-2x5"> </i> Retroceder</a>

    <a href="candidatos" class="btn  btn-rounded btn-noborder btn-alt-primary mr-5 mb-5" > <i class="si si-magnifier fa-2x5"> </i> Buscar candidatos</a>

    <br>

  </div>


<!-- END Terms Modal -->

    
  <!-- Dynamic Table Full Pagination -->
  <div class="block">

    <div class="block-content block-content-full">
      <!-- DataTables functionality is initialized with .js-dataTable-full-pagination class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->

      <div class="table-responsive ">
        <table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
          <thead>
             <tr class="text-center">
              <th>#</th>
              <th>Nombre Candidato</th>
              <th>Fecha del seguimiento</th>
              <th>Tipo de Seguimiento</th>
              <th>Comentario</th>
              <th>Ultima Modificación</th>
              <th>Opción</th>
            </tr>
          </thead>

          <tfoot>
              <tr  class="text-center">
               <th>#</th>
              <th>Nombre Candidato</th>
              <th>Fecha del seguimiento</th>
              <th>Tipo de Seguimiento</th>
              <th>Comentario</th>
              <th>Ultima Modificación</th>
              <th>Opción</th>
              </tr>
            </tfoot>

          <tbody class="text-center">

            <?php 

            $N = 1;



            while ($item=$stmt->fetch())
            { 

              $sql2="SELECT T.Nombre AS 'TipoSelecion', Comentario, fecha_registro FROM proceso_seleccion_candidato S INNER JOIN tipo_seleccion_candidatos T ON S.IDSeleccion = T.IDSeleccion WHERE `IDEmpresa` = ? AND `IDUsuario` = ? ORDER BY IDProceso DESC LIMIT 1 ";
              $stmt2 =  Conexion::conectar()->prepare($sql2);
              $stmt2->execute(array($IDEmpresa,$item['IDUsuario']));
              $item2=$stmt2->fetch();

              $NombreCandidato="";
              if($item['confidencial'] == "Publico"){

                $NombreCandidato = $item['Nombre'].' '.$item['Apellidos'];
              }else{
                $NombreCandidato = "N/D";
              }       

              echo '<tr>
              <td>'.$N.'</td>
              <td>'.$NombreCandidato.'</td>
              <td>'.$item['fecha'].'</td>
              <td>'.$item2['TipoSelecion'].'</td>
              <td>'.$item2['Comentario'].'</td>
              <td>'.$item2['fecha_registro'].'</td>
              <td><a href="seguimiento-candidato?id='.base64_encode($item['IDUsuario']).'" class="btn btn-secondary text-center" data-toggle="tooltip" title="Ver seguimiento del candidato" data-original-title="Ver seguimiento del candidato"  > <i class="si si-user"></i></a></td>
              
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

