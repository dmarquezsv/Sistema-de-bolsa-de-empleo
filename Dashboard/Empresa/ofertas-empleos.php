<?php
include_once '../../BD/Conexion.php';
include_once '../../BD/Consultas.php';
include_once '../../main/funcionesApp.php';
include_once 'templates/head.php';
$Conexion = new Consultas();
$FuncionesApp = new funcionesApp();
include_once 'templates/seguridadCpanel.php';

$OfertasPublicas = $Conexion->ejecutar_consulta_conteo("empresa_ofertas_trabajos" , "IDEmpresa" , $IDEmpresa);

$sql= "SELECT COUNT(`IDpostulaciones`)AS 'Activo' FROM empresa_ofertas_trabajos WHERE Estado = 'Activo' AND `IDEmpresa` = ?";
$stmt = $Conexion->ejecutar_consulta_simple_Where($sql ,$IDEmpresa);
while ($item=$stmt->fetch())
{
  $OfertasActivas = $item['Activo'];
}

$sql2= "SELECT COUNT(`IDpostulaciones`)AS 'Inactiva' FROM empresa_ofertas_trabajos WHERE Estado = 'Inactiva' AND `IDEmpresa` =?";
$stmt2 = $Conexion->ejecutar_consulta_simple_Where($sql2 ,$IDEmpresa);
while ($item=$stmt2->fetch())
{
  $OfertasInactivas = $item['Inactiva'];
}

$sql3 = "SELECT COUNT(IDOfertaTrabajo) AS 'Postulaciones' FROM usuario_postulaciones P INNER JOIN empresa_ofertas_trabajos OT ON P.IDpostulaciones =OT.IDpostulaciones WHERE OT.IDEmpresa = ? AND OT.Estado = 'Activo' AND P.Estado = 'enviado' AND P.Aprobacion = 'en espera'";

$stmt3 = $Conexion->ejecutar_consulta_simple_Where($sql3 ,$IDEmpresa);
while ($item=$stmt3->fetch())
{
  $Postulaciones = $item['Postulaciones'];
}

?>
<title>Empresa | Ofertas de Trabajos</title>
<?php 
include_once 'templates/styles.php';
include_once 'templates/MenuRight.php';
include_once 'templates/MenuLeft.php';
include_once 'templates/header.php';
?>

<style type="text/css">


 th
 {
  font-size: 10px;
  font-family: sans-serif;
  font-weight: normal;

}

td{
 font-size: 12px;
 font-family: sans-serif;
 font-weight: normal;
}


#imgbanner{

  background: url('../assets/media/photos/ofertas_trabajos.jpg');
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
          <h3 class="font-size-h2 font-w300 mt-20"  data-toggle="appear" data-class="animated flipInY" id="titulos" style="color: white;">Oferta de empleos</h3>
        </div>
      </div>
    </div>
  </div>


<!-- Terms Modal -->
<div class="modal fade" id="modal-terms3" tabindex="-1" role="dialog" aria-labelledby="modal-terms2" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-slidedown" role="document">
    <div class="modal-content">
      <div class="block block-themed block-transparent mb-0">
        <div class="block-header bg-primary-dark">
          <h3 class="block-title">Indicaciones</h3>
          <div class="block-options">
            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
              <i class="si si-close"></i>
            </button>
          </div>
        </div>
        <div class="block-content">
          <div class="block">
            <div class="block-content block-content-full text-center">

             <img src="../../assets/recusosMundoEmpleo/logo.png" class="img-fluid" style="height: 100px; width: 250px;"  data-toggle="appear" data-class="animated flipInY">
             <h3 class="font-size-h2 font-w300 mt-20" data-toggle="appear" data-class="animated flipInY"  id="titulos" style="color: #0B3486;">Preguntas frecuentes </h3>



             <p class="text-center">
               <button type="button" class="btn btn-sm btn-hero btn-noborder mb-10 mx-5" data-dismiss="modal" style="background:#FCC201; color:#0B3486; font-weight: bold;">Cerrar</button>
             </p>

             <br>

           </div>
         </div>

       </form>
     </div>
   </div>
 </div>
</div>
</div>
<!-- END Terms Modal -->


  <div style="margin-right:2%; margin-left:2%;">

    <div class="content py-5 text-center">

      <h1 class="content-heading">LISTADO DE OFERTAS PUBLICADAS <br>
        <br>
        <a href="./" class="btn  btn-rounded btn-noborder btn-alt-primary mr-5 mb-5"> <i class="si si-action-undo fa-2x5"> </i> Retroceder</a>

        <a href="nueva-oferta-empleo" class="btn  btn-rounded btn-noborder btn-alt-primary  btn-lg mr-5 mb-5"><i class="fa fa-briefcase fa-2x5">  </i>  Añadir oferta empleo</a>  

      </div>

      <div class="content">



        <h5 style="font-family: sans-serif; color: black;">Información General</h5><hr>
        <div class="row">
          <!-- Row #1 -->
          <div class="col-md-6 col-xl-3">
            <a class="block block-link-shadow" href="javascript:void(0)">
              <div class="block-content block-content-full clearfix">
                <div class="float-right">
                 <i class="si si-briefcase fa-2x text-dark-op" style="margin-left: 5px; "> <?php echo $OfertasPublicas; ?></i>
               </div>
               <div class="float-left mt-10">
                <div class="font-w600 mb-5">Ofertas empleos</div>
                <div class="font-size-sm text-muted">Publicadas</div>
              </div>
            </div>
          </a>
        </div>



        <div class="col-md-6 col-xl-3">
          <a class="block block-link-shadow" href="javascript:void(0)">
            <div class="block-content block-content-full clearfix">
              <div class="float-right">
                <i class="si si-briefcase fa-2x text-dark-op"> <?php echo$OfertasActivas; ?></i>
              </div>
              <div class="float-left mt-10">
                <div class="font-w600 mb-5">Ofertas empleos</div>
                <div class="font-size-sm text-muted">Activas</div>
              </div>
            </div>
          </a>
        </div>



        <div class="col-md-6 col-xl-3">
          <a class="block block-link-shadow" href="javascript:void(0)">
            <div class="block-content block-content-full clearfix">
              <div class="float-right">
                <i class="si si-briefcase fa-2x text-dark-op"> <?php echo$OfertasInactivas; ?></i>
              </div>
              <div class="float-left mt-10">
                <div class="font-w600 mb-5">Ofertas empleos</div>
                <div class="font-size-sm text-muted">Inactivas</div>
              </div>
            </div>
          </a>
        </div>


        <div class="col-md-6 col-xl-3">
          <a class="block block-link-shadow" href="javascript:void(0)">
            <div class="block-content block-content-full clearfix">
              <div class="float-right">
                <i class="si si-briefcase fa-2x text-dark-op"> <?php echo$Postulaciones; ?></i>
              </div>
              <div class="float-left mt-10">
                <div class="font-w600 mb-5">Aplicaciones</div>
                <div class="font-size-sm text-muted">Candidatos</div>
              </div>
            </div>
          </a>
        </div>




      </div> 
      <p style="font-size: 18px; color: black; font-family: sans-serif;">A continuación se muestran las ofertas publicadas las cuales has publicado todo en este tiempo, desde la más reciente a la más antigua.
      </p>



    </div>

    <div class="block" >
      <div class="block-content block-content-full">

       <?php  

       $sqlEspecial="SELECT IDEmpresa FROM `empresa_perfil` WHERE `IDUsuario` = ?";
       $stmtEspecial = $Conexion->ejecutar_consulta_simple_Where($sqlEspecial ,$_SESSION['iduser']);
       while ($item=$stmtEspecial->fetch())
       { 
        $IDEmpresa = $item['IDEmpresa'];
      }

      $sql = "SELECT OT.IDpostulaciones ,EP.IDEmpresa , TE.Area , P.Nombre AS 'Pais' , PD.Nombre 'Departamento' , T.Nombre AS 'Categoria' , CD.nombre AS 'Desempeno' , `Plaza` , `FechaPublicacion` , OT.Expira , OT.Estado FROM empresa_ofertas_trabajos OT INNER JOIN empresa_perfil EP ON OT.IDEmpresa = EP.IDEmpresa LEFT JOIN soporte_tipo_empresa TE ON EP.IDTipoEmpresa = TE.IDTipoEmpresa LEFT JOIN soporte_paises P ON OT.IDPais = P.IDPais LEFT JOIN soporte_paises_departamento PD ON OT.IDDepartamento = PD.IDDepartamento LEFT JOIN soporte_areas_trabajos T ON OT.IDCategoria = T.IDCategoria LEFT JOIN soporte_cargos_desempenado CD ON OT.IDDesempenado = CD.IDDesempenado WHERE EP.IDEmpresa = ? ORDER BY `OT`.`IDpostulaciones` DESC ";

      $salida = "";

      $stmt =  Conexion::conectar()->prepare($sql);

      if ($stmt->execute(array($IDEmpresa))){

       $formatoEstado;

       if ($stmt->rowCount()>0){
        $N = 1;



        $salida.='<table class="table table-striped table-bordered  js-dataTable-full-pagination">
        <thead>
        <tr>
        <th class="text-center">Plaza</th>
        <th>Área</th>
        <th>Desempeño</th>
        <th>Pais / Departamento</th>
        <th>Desde / hasta</th>
        <th>Aplicaciones</th>
        <th>Estado</th>
        <th>Opción</th>
        </tr>
        </thead>
        <tbody>';


        while ($item=$stmt->fetch())
        {
          $ResultCandidatos = $Conexion->ejecutar_consulta_conteo("usuario_postulaciones","IDpostulaciones",$item['IDpostulaciones']);

          if ($item['Estado'] == "Activo") {
            $formatoEstado = '<span class="badge badge-success"  style="font-size: 18px; font-family: sans-serif;">Activo</span>';

            $FormatoDesactivar = '<a href="Modelos/ModelosOfertasEmpleos/DesactivarOfertaEmpleo.php?id='.base64_encode($item['IDpostulaciones']).'" class="btn btn-secondary" data-toggle="tooltip" title="Desactivar la oferta de empleo" data-original-title="Desactivar la oferta de empleo"  > <i class="si si-lock"></i></a>';

          }else if($item['Estado'] == "Inactiva"){
            $formatoEstado = '<span class="badge badge-danger"  style="font-size: 18px; font-family: sans-serif;">Inactiva</span>';
            $FormatoDesactivar = '<a href="Modelos/ModelosOfertasEmpleos/ActivarOfertaEmpleo.php?id='.base64_encode($item['IDpostulaciones']).'" class="btn btn-secondary" data-toggle="tooltip" title="Activar la oferta de empleo" data-original-title="Activar la oferta de empleo"  > <i class="si si-action-undo"></i></a>';
          }else if ($item['Estado'] == "Vencido") {
            $formatoEstado = '<span class="badge badge-primary"  style="font-size: 18px; font-family: sans-serif;">Vencido</span>';
            $FormatoDesactivar = '';
          }



          $salida.='<tr>
          <td>'.$item['Plaza'].'</td>
          <td>'.$item['Categoria'].'</td>
          <td>'.$item['Desempeno'].'</td>
          <td>'.$item['Pais'].' / '.$item['Departamento'].'</td>
          <td>'.$item['FechaPublicacion'].' / '.$item['Expira'].'</td>
          <td class="text-center">'.$ResultCandidatos.'</td>
          <td>'.$formatoEstado.'</td>
          <td class="text-center">
          <div class="btn-group">

          <a href="candidatos-postulados?id='.base64_encode($item['IDpostulaciones']).'&publicacion='.base64_encode($item['Plaza']).'" class="btn btn-secondary" data-toggle="tooltip" title="Ver postulaciones de candidatos" data-original-title="Ver postulaciones de candidatos"  target="_blank"> <i class="si si-users"></i></a>

          <a href="../../vista-previa-oferta-empleo?id='.base64_encode($item['IDpostulaciones']).'" class="btn btn-secondary" data-toggle="tooltip" title="Ver oferta de trabajo" data-original-title="Ver oferta de trabajo"  target="_blank"> <i class="si si-briefcase"></i></a>

          <a href="actualizar-oferta-empleo.php?id='.base64_encode($item['IDpostulaciones']).'" class="btn btn-secondary" data-toggle="tooltip" title="actualizar la oferta de empleo" data-original-title="actualizar la oferta de empleos"> <i class="si si-note"></i></a>

          '.$FormatoDesactivar.'

          <button id="val'.$N.'" value="'.base64_encode($item['IDpostulaciones']).'"  data-toggle="modal" data-target="#exampleModal" class="btn btn-secondary"  title="Eliminar la oferta de empleo" data-original-title="Eliminar la oferta de empleo" > <i class="fa fa-trash-o" style="font-size: 20px;"></i> </button>





          </div>
          </td>
          </tr>';
          $N++;

        }

        $salida.="</tbody></table>";

      }else{

        $salida = "No hay  ofertas emepleos publicados";
      }

    }else{
      echo "Problema para ejectar la consulta";
    }

    echo $salida;


    ?>

  </div>
</div>


</div>

</main>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar oferta de empleo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="Modelos/ModelosOfertasEmpleos/EliminarOfertaTrabajo.php" method="POST">
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

