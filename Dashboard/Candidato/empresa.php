<?php
include_once '../../BD/Conexion.php';
include_once '../../BD/Consultas.php';
include_once 'templates/head.php';
$Conexion = new Consultas();
$idEmpresa = base64_decode($_GET['id']);
include_once 'templates/validar-perfil.php';

$sql = "SELECT `IDEmpresa`,`logo` , TP.Area , EP.`Nombre` ,P.Nombre AS 'Pais' , PD.Nombre 'Departamento' , `lugar` , `Mapa` , `Descripcion` , `Email` , `CodigoPostal` , `Telefono` ,`Celular` , `facebook` , `instagram` , `whatsapp` , `youtube`  , `paginaweb` , `estado` FROM empresa_perfil EP INNER JOIN soporte_tipo_empresa TP ON EP.IDTipoEmpresa = TP.IDTipoEmpresa LEFT JOIN soporte_paises_departamento PD ON EP.IDDepartamento = PD.IDDepartamento LEFT JOIN soporte_paises P ON EP.IDPais = P.IDPais WHERE `IDEmpresa` = ?";

$stmt = $Conexion->ejecutar_consulta_simple_Where($sql , $idEmpresa);



$sql2 = "SELECT IDpostulaciones, EP.Nombre 'Empresa',EP.logo , EP.Confidencial ,Plaza, OT.Expira FROM empresa_ofertas_trabajos OT INNER JOIN empresa_perfil EP ON OT.IDEmpresa = EP.IDEmpresa WHERE OT.FechaPublicacion <= ? AND OT.Expira >= ? AND EP.IDEmpresa = ? ORDER BY `OT`.`IDpostulaciones` DESC ";
$fechaActual =date("Y-m-d");

$salida = "";
$stmt2 =  Conexion::conectar()->prepare($sql2);


while ($item=$stmt->fetch())
{

  $Logo = $item['logo'];
  $Area = $item['Area'];
  $Nombre = $item['Nombre'];
  $Pais =  $item['Pais'];
  $Departamento = $item['Departamento'];
  $Lugar = $item['lugar'];
  $Mapa = $item['Mapa'];
  $Description = $item['Descripcion'];
  $Email = $item['Email'];
  $CodigoPostal = $item['CodigoPostal'];
  $Telefono = $item['Telefono'];
  $Celular = $item['Celular'];
  $facebook = $item['facebook'];
  $Instagrama = $item['instagram'];
  $Whatsapp = $item['whatsapp'];
  $Youtube = $item['youtube'];
  $urlweb =  $item['paginaweb'];
  $estado =  $item['estado'];
}


?>
<title>Candidato | Empresa</title>
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

   <div class="row gutters-tiny invisible" data-toggle="appear" data-class="animated bounceInLeft" >

     <!-- Page Content -->
     <div class="content">
      <h2 class="content-heading">Nombre Empresa: <b><?php echo$Nombre;?></b></h2>

      <div class="block">
        <br><br><br>
        <div class="col-md-6 col-xl-4 invisible" data-toggle="appear">
         <!-- Property -->
         <div class="block block-rounded">

           <div class="block-content p-0 overflow-hidden text-center">

             <a class="img-link" href="javascript:void(0)">
               <img class="img-fluid rounded-top" src="../../main/img/LogosEmpresas/<?php echo$Logo ?>" class="img-fluid img-thumbnail" id="imglogo">
             </a>

             
           </div>

         </div>
         <!-- END Property -->
       </div>

       <!-- Project -->
       <div class="block-content block-content-full">
        <div class="row py-20">
          <div class="col-sm-6 invisible" data-toggle="appear">
            <!-- Image Slider (.js-slider class is initialized in Helpers.slick()) -->
            <!-- For more info and examples you can check out http://kenwheeler.github.io/slick/ -->


            <!-- Project Info -->
            <table class="table table-striped table-borderless mt-20">
              <tbody>
                <tr>
                  <td class="font-w600">País & Ciudad</td>
                  <td><?php echo$Pais." - ". $Departamento;?></td>
                </tr>



                <tr>
                  <td class="font-w600">WhatsApp </td>
                  <td><?php if($Whatsapp == ""){echo "-";}else{ echo $Whatsapp;} ?></td>
                </tr>

                <tr>
                  <td class="font-w600">Área</td>
                  <td><?php echo$Area; ?></td>
                </tr>
                <tr>
                  <td class="font-w600">Website</td>
                  <td>


                    <?php if ($urlweb !="") {
                     echo '<a href='.$urlweb.' target="_blank">'.$urlweb.'</a>';
                   } 
                   else{
                    echo "No Disponible";
                  }
                  ?>

                </td>
              </tr>
              <tr>
                <td class="font-w600">Redes Sociales</td>
                <td>
                 <div class="float-left">

                  <?php if($facebook !=""){ echo '<a href="https://www.facebook.com/'.$facebook.'" target="_blank"><i class="fa fa-facebook-square fa-2x" style="color: black;"></i></a>';} ?>

                  <?php if($Instagrama !=""){ echo '<a  href="https://www.instagram.com/"'.$Instagrama.'" target="_blank"><i class="fa fa-instagram fa-2x" style="color: black;"></i></a>';} ?>

                  <?php if($Youtube !=""){ echo '<a  href="https://www.youtube.com/channel/"'.$Youtube.'" target="_blank"><i class="fa fa-youtube-play fa-2x" style="color: black;"></i></a>';} ?>

                </div>
              </td>
            </tr>
          </tbody>
        </table>
        <!-- END Project Info -->
        <div class="table-responsive">
          <?php 


          if ($stmt2->execute(array($fechaActual,$fechaActual,$idEmpresa))){
            if ($stmt2->rowCount()>0){
              $salida.=' <table class="table table-sm">
              <thead>
              <tr>
              <th>Plaza</th>
              <th>Expira</th>
              <th>Oferta</th>
              </tr>
              </thead>
              <tbody>';
              while ($item=$stmt2->fetch())
              {
                $salida.='
                <tr>
                <td>'.$item['Plaza'].'</td>
                <td>'.$item['Expira'].'</td>
                <td>
                <a href="../../oferta_trabajo?id='.base64_encode($item['IDpostulaciones']).'" class="btn btn-alt-primary btn-lg  btn-rounded" data-toggle="tooltip" title="Ver oferta de trabajo" target="_blank"> <i class="fa fa-briefcase fa-2x5"></i> </a>
                </td>
                </tr>';         
              }

              $salida.="</tbody></table>";

            }else{

              $salida = '<div class="alert alert-primary" role="alert">
              No hay ofertas de trabajos publicado
              </div>';

            }

          }else{
            echo "Problema para ejectar la consulta";
          }

          echo $salida;


          ?>
        </div>

      </div>
      <div class="col-sm-6 nice-copy">
        <!-- Project Description -->
        <h3 class="mb-10">Sobre Nosotros</h3>
        <?php echo$Description; ?>
        <br>

        <?php if($Mapa !="") {
          echo ' <h3 class="mb-10">Mapa</h3>
          <div class="map-responsive">
          '.$Mapa .'
          </div>';
        } 

        ?>

      </div>
    </div>
  </div>
  <!-- END Project -->




</div>      


</div>


</main>



<?php include_once 'templates/footer.php';
include_once 'templates/script.php';

?>
