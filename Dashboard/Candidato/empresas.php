<?php
include_once '../../BD/Conexion.php';
include_once '../../BD/Consultas.php';
include_once '../../main/funcionesApp.php';
include_once 'templates/head.php';
$Conexion = new Consultas();
$FuncionesApp = new funcionesApp();
include_once 'templates/validar-perfil.php';

$sql3 = "SELECT * FROM `soporte_tipo_empresa`";
$stmt3 = $Conexion->ejecutar_consulta_simple($sql3);

$sql4 = "SELECT * FROM `soporte_paises`";
$stmt4 = $Conexion->ejecutar_consulta_simple($sql4);

?>
<title>Candidato | empresas</title>
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

  #imglogo{

    width: 100%; 
    height: 5em;
    
  }

  @media only screen and (max-width: 767px) {

    #imglogo{

      width: 100%; 
      height: 5em;


    }


  }



  @media only screen and (min-width: 600px) and (max-width: 799px){

   #imglogo{

    width: 100%; 
    height: 5em;

  }

}


</style>

<main id="main-container">

  <div class="bg-image bg-image-bottom" id="imgbanner" >
    <div>
      <div class="content content-top text-center overflow-hidden">
        <div class="pt-40 pb-20">
          <h3 class="font-size-h2 font-w300 mt-20"  data-toggle="appear" data-class="animated flipInY" id="titulos" style="color: white;">Área De Empresas </h3>
        </div>
      </div>
    </div>
  </div>



  <div style="margin-right:2%; margin-left:2%;">

    <!-- Page Content -->
    <div class="content">

      <a href="./" class="btn btn-rounded btn-noborder btn-alt-primary mr-5 mb-5"> <i class="si si-action-undo fa-2x5"> </i> Retroceder</a>
      <br><br>

      <div class=" text-center">

        <p>Esta plataforma cuenta con las herramientas para que puedas encontrar las ofertas de trabajos por medio busqueda de empresa. tambien podrás visualizar el perfil  aquellas empresas que no tienen habilitado la confidelidad. Caso contrario no podrás visualizar las empresas.</p>

        <br><br>
        <form  action="empresas" method="post">
          <div class="row">

            <div class="col-lg-4 col-md-4 col-12">
              <select class="js-select2 form-control" id="example-select" name="idarea" style="width: 100%;" data-placeholder="Selecciona una área" >
                <option></option>
                <option value="">Indiferente</option>
                <?php 
                while ($item=$stmt3->fetch())
                {
                 echo "<option value=".$item['IDTipoEmpresa'].">".$item['Area']."</option>";
               }

               ?>
             </select>
           </div>

           <div class="col-lg-4 col-md-4 col-12">


            <select class="js-select2 form-control" id="example-select2" name="idpais" style="width: 100%;" data-placeholder="Selecciona un pais" >
              <option></option>
              <option value="">Indiferente</option>
              <?php 
              while ($item=$stmt4->fetch())
              {
               echo "<option value=".$item['IDPais'].">".$item['Nombre']."</option>";
             }

             ?>
           </select>


         </div>

         <div class="col-lg-4 col-md-4 col-12">
          <center>
            <input type="submit" name="buscarArea" id="buscarArea" value="Buscar" class="btn btn-alt-primary btn-lg btn-block btn-rounded">
          </center>
        </div>
      </form>
    </div>

  </div>

  <br>  

  
  <div class="row">

    <?php 



    if($_POST['idarea'] !="" &&  $_POST['idpais'] !="")
    { 
      $idarea = $_POST['idarea'];
      $idpais = $_POST['idpais'];

      $sql = "SELECT `IDEmpresa`,`logo` , TP.Area , EP.`Nombre` ,P.Nombre AS 'Pais' , PD.Nombre 'Departamento' , EP.Confidencial FROM empresa_perfil EP INNER JOIN soporte_tipo_empresa TP ON EP.IDTipoEmpresa = TP.IDTipoEmpresa LEFT JOIN soporte_paises_departamento PD ON EP.IDDepartamento = PD.IDDepartamento LEFT JOIN soporte_paises P ON EP.IDPais = P.IDPais WHERE EP.Confidencial = 'No' AND `estado` = 'Activo' AND EP.IDTipoEmpresa = $idarea  AND P.IDPais = $idpais";       
    }
    else if($_POST['idarea'] !=""){

     $idarea = $_POST['idarea'];

     $sql = "SELECT `IDEmpresa`,`logo` , TP.Area , EP.`Nombre` ,P.Nombre AS 'Pais' , PD.Nombre 'Departamento' , EP.Confidencial FROM empresa_perfil EP INNER JOIN soporte_tipo_empresa TP ON EP.IDTipoEmpresa = TP.IDTipoEmpresa LEFT JOIN soporte_paises_departamento PD ON EP.IDDepartamento = PD.IDDepartamento LEFT JOIN soporte_paises P ON EP.IDPais = P.IDPais WHERE EP.Confidencial = 'No'  AND `estado` = 'Activo' AND EP.IDTipoEmpresa = $idarea";

   }
   else if($_POST['idpais'] != "")
   { 
    $idpais = $_POST['idpais'];
    $sql = "SELECT `IDEmpresa`,`logo` , TP.Area , EP.`Nombre` ,P.Nombre AS 'Pais' , PD.Nombre 'Departamento' , EP.Confidencial FROM empresa_perfil EP INNER JOIN soporte_tipo_empresa TP ON EP.IDTipoEmpresa = TP.IDTipoEmpresa LEFT JOIN soporte_paises_departamento PD ON EP.IDDepartamento = PD.IDDepartamento LEFT JOIN soporte_paises P ON EP.IDPais = P.IDPais WHERE EP.Confidencial = 'No' AND `estado` = 'Activo' AND P.IDPais = $idpais";       
  }
  else{

    $sql5 = "SELECT `IDPais` FROM `usuario_perfil` WHERE `IDUsuario` = ?";
    $stmt5 = $Conexion->ejecutar_consulta_simple_Where($sql5 , $IDUser);
    $LugarUbicado ="";
    while ($item=$stmt5->fetch())
    {
     $LugarUbicado = $item['IDPais'];
     }


   $sql = "SELECT `IDEmpresa`,`logo` , TP.Area , EP.`Nombre` ,P.Nombre AS 'Pais' , PD.Nombre 'Departamento' , EP.Confidencial FROM empresa_perfil EP INNER JOIN soporte_tipo_empresa TP ON EP.IDTipoEmpresa = TP.IDTipoEmpresa LEFT JOIN soporte_paises_departamento PD ON EP.IDDepartamento = PD.IDDepartamento LEFT JOIN soporte_paises P ON EP.IDPais = P.IDPais WHERE EP.Confidencial = 'No' AND `estado` = 'Activo' AND EP.IDPais = $LugarUbicado";

 }


 define("NRO_REGISTROS",1);

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



if(!empty($resultados)) {
  foreach($resultados as $row) {

   echo '

   <div class="col-md-6 col-xl-4 invisible" data-toggle="appear">
   <!-- Property -->
   <div class="block block-rounded">
   <br><br>
   <div class="block-content p-0 overflow-hidden text-center">
   <a class="img-link" href="empresa?id='.base64_encode($row['IDEmpresa']).'">
   <img class="img-fluid rounded-top" src="../../main/img/LogosEmpresas/'.$row['logo'].'" class="img-fluid img-thumbnail" id="imglogo">
   </a>
   </div>
   <div class="block-content border-bottom">
   <h4 class="font-size-h5 font-w300 mb-5 text-center">'.$row['Nombre'].'</h4>
   <h5 class="font-size-h5 mb-10 text-center">'.$row['Area'].'</h5>
   </div>
   <div class="block-content border-bottom">
   <div class="row">
   <div class="col-6">
   <p>
   <i class="si si-globe fa-2x text-muted mr-5"></i>  '.$row['Pais'].'
   </p>
   </div>
   <div class="col-6">
   <p>
   <i class="si si-globe-alt fa-2x text-muted mr-5"></i>  '.$row['Departamento'].'
   </p>
   </div>
   </div>
   </div>
   <div class="block-content block-content-full">
   <div class="row">
   <div class="col-12">
   <a class="btn btn-alt-primary btn-lg btn-block btn-rounded" href="empresa?id='.base64_encode($row['IDEmpresa']).'">
   Ver Empresas
   </a>
   </div>

   </div>
   </div>
   </div>
   <!-- END Property -->
   </div>
   ';


 }



}else {
 echo  '<div class="container alert alert-primary" role="alert">
 No hay empresas registrada
 </div>';
}

?>

</div>

</div>
<!-- END Page Content -->

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



  $('#buscarArea').on('click', function() {


    var pais = $('.pais option:selected');
    var evaluarPais = pais.val();

    var area = $('.area option:selected');
    var evaluararea = area.val();



    swal({
      title: "Cargando...",
      text: "Por favor espera",
      imageUrl: "../../assets/img/icono/loader.gif",
      button: false,
      closeOnClickOutside: false,
      closeOnEsc: false,
      imageWidth: 100,
      imageHeight: 100,
      showCancelButton: false,
      showConfirmButton: false
    });



  });





</script>