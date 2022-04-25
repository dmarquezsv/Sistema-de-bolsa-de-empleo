<?php
include_once '../../BD/Conexion.php';
include_once '../../BD/Consultas.php';
include_once 'templates/head.php';
$Conexion = new Consultas();
$idEmpresa = base64_decode($_GET['idempresa']);


$sql = "SELECT `IDEmpresa`,C.Nombre AS 'UserNombre' , C.Apellidos ,C.Correo , C.Estado ,C.FechaRegistro AS 'FechaRegistoUser' ,C.UltimaConexion , TP.Area , EP.`Nombre` ,P.Nombre AS 'Pais' , PD.Nombre 'Departamento' , `lugar` , `Mapa` , `Descripcion` , `Email` , `CodigoPostal` , `Telefono` , `Celular` , `facebook` , `instagram` , `whatsapp` , `youtube` , `logo` , `paginaweb` , EP.fecha_registro , `Expira` , EP.estado , `Confidencial` , `razonSocial`FROM empresa_perfil EP INNER JOIN soporte_tipo_empresa TP ON EP.IDTipoEmpresa = TP.IDTipoEmpresa LEFT JOIN soporte_paises_departamento PD ON EP.IDDepartamento = PD.IDDepartamento LEFT JOIN soporte_paises P ON EP.IDPais = P.IDPais LEFT JOIN usuarios_cuentas C ON C.IDUsuario = EP.IDUsuario WHERE `IDEmpresa` =  ?";

$stmt = $Conexion->ejecutar_consulta_simple_Where($sql , $idEmpresa);

while ($item=$stmt->fetch())
{   
  $NombreUsuario = $item['UserNombre'];
  $ApellidosUsuario =$item['Apellidos'];
  $EmailUsuario = $item['Correo'];
  $FechaRegistroUsuario = $item['Correo'];
  $UltimaConexionUsuario = $item['UltimaConexion'];
  $FechaRegistroUser = $item['FechaRegistoUser'];
  $fechaEstablecida = $item['Expira'];
  $confidencial = $item['Confidencial'];
  $estadoUser = $item['Estado'];
  $FechaRegistroEmpresa = $item['fecha_registro'];
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
  $razonSocial = $item['razonSocial'];

}


$sql2 = "SELECT IDpostulaciones,  Plaza, OT.Expira , OT.Estado FROM empresa_ofertas_trabajos OT INNER JOIN empresa_perfil EP ON OT.IDEmpresa = EP.IDEmpresa WHERE  EP.IDEmpresa = ? ORDER BY `OT`.`IDpostulaciones` DESC ";
$fechaActual =date("Y-m-d");

$salida = "";
$stmt2 =  Conexion::conectar()->prepare($sql2);

$OfertasPublicas = $Conexion->ejecutar_consulta_conteo("empresa_ofertas_trabajos" , "IDEmpresa" , $idEmpresa);

$sql3= "SELECT COUNT(`IDpostulaciones`)AS 'Activo' FROM empresa_ofertas_trabajos WHERE Estado = 'Activo' AND `IDEmpresa` = ?";
$stmt3 = $Conexion->ejecutar_consulta_simple_Where($sql3 ,$idEmpresa);
while ($item=$stmt3->fetch())
{
  $OfertasActivas = $item['Activo'];
}

$sql4= "SELECT COUNT(`IDpostulaciones`)AS 'Inactiva' FROM empresa_ofertas_trabajos WHERE Estado = 'Inactiva' AND `IDEmpresa` =?";
$stmt4 = $Conexion->ejecutar_consulta_simple_Where($sql4 ,$idEmpresa);
while ($item=$stmt4->fetch())
{
  $OfertasInactivas = $item['Inactiva'];
}

$sql5 = "SELECT COUNT(IDOfertaTrabajo) AS 'Postulaciones' FROM usuario_postulaciones P INNER JOIN empresa_ofertas_trabajos OT ON P.IDpostulaciones =OT.IDpostulaciones WHERE OT.IDEmpresa = ? AND OT.Estado = 'Activo' AND P.Estado = 'enviado' AND P.Aprobacion = 'en espera'";

$stmt5 = $Conexion->ejecutar_consulta_simple_Where($sql5 ,$idEmpresa);
while ($item=$stmt5->fetch())
{
  $Postulaciones = $item['Postulaciones'];
}



?>
<title>Perfil de Empresa</title>
<?php 
include_once 'templates/styles.php';
include_once 'templates/MenuRight.php';
include_once 'templates/MenuLeft.php';
include_once 'templates/header.php';
?>
<style type="text/css">

</style>

<style type="text/css">

  #imgbanner{

    background: url('../assets/media/photos/inicio_sesion_empresa.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    height:auto;
  }

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

 .map-responsive iframe{
  left:0;
  top:0;
  width:100%;
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
          <h3 class="font-size-h2 font-w300 mt-20"  data-toggle="appear" data-class="animated flipInY" id="titulos" style="color: white;">Empresas</h3>
        </div>
      </div>
    </div>
  </div>



  <div style="margin-right:2%; margin-left:2%;">



    <div class="content py-5 text-center">

      <h2 class="content-heading text-center">Nombre Empresa: <br> <b><?php echo$Nombre;?></b></h2>

      <br>

      <a href="empresas" class="btn btn-rounded btn-noborder btn-alt-primary mr-5 mb-5"> <i class="si si-action-undo fa-2x5"> </i> Retroceder</a>


      <a href="actualizar-perfil-empresa?iduser=<?php echo $_GET['iduser'];?>&idempresa=<?php echo $_GET['idempresa']?>"  class="btn btn-rounded btn-noborder btn-alt-primary mr-5 mb-5"  >
        <i class="fa fa-caret-right fa-2x5"> </i> Actualizar Empresa
      </a>

      <?php if($estadoUser =="Token"){ ?>

        <a href="Modelos/usuarios/activar-usuarios.php?iduser=<?php echo $_GET['iduser'];?>&idempresa=<?php echo $_GET['idempresa']?>" class="btn btn-rounded btn-noborder btn-alt-primary mr-5 mb-5"> <i class="fa fa-check-circle fa-2x5"> </i> Activar Usuario</a>

      <?php }else if($estadoUser =="Activo"){ ?>

        <a href="Modelos/usuarios/desactivar-usuarios.php?iduser=<?php echo $_GET['iduser'];?>&idempresa=<?php echo $_GET['idempresa']?>" class="btn btn-rounded btn-noborder btn-alt-primary mr-5 mb-5"> <i class="fa fa-close fa-2x5"> </i> desactivar Usuario</a>

      <?php }else if($estadoUser =="Denegado"){ ?>

        <a href="Modelos/usuarios/activar-usuarios.php?iduser=<?php echo $_GET['iduser'];?>&idempresa=<?php echo $_GET['idempresa']?>" class="btn btn-rounded btn-noborder btn-alt-primary mr-5 mb-5"> <i class="fa fa-check-circle fa-2x5"> </i> Activar Usuario</a>

        <?php  } ?>

        <a href="habilitar-paises?iduser=<?php echo $_GET['iduser'];?>&idempresa=<?php echo $_GET['idempresa']?>" class="btn btn-rounded btn-noborder btn-alt-primary mr-5 mb-5">Habilitar países</a>

        <a href="servicio-solicitado?iduser=<?php echo $_GET['iduser'];?>&idempresa=<?php echo $_GET['idempresa']?>" class="btn btn-rounded btn-noborder btn-alt-primary mr-5 mb-5">solicitudes</a>

        <br><br>




        <div class="col-lg-12">


         <h5>Información ofetas de empleos</h5><hr>
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


      </div>  <!--FIN DEL ROW OFERTAS-->




    </div> 

    <br>

  </div>


  <div class="row gutters-tiny invisible" data-toggle="appear" data-class="animated bounceInLeft" >

    <div class="content">

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
            <h6>Informe de la empresa</h6>
            <!-- Project Info -->
            <table class="table table-striped table-borderless mt-20">
              <tbody>

                <tr>
                  <td class="font-w600">Fecha Registro</td>
                  <td><?php echo$FechaRegistroEmpresa?></td>
                </tr>

                <tr>
                  <td class="font-w600">Expira</td>
                  <td><?php echo$fechaEstablecida?></td>
                </tr>

                <tr>
                  <td class="font-w600">Ubicación</td>
                  <td>  

                    <?php if($Mapa !="") {
                      echo '<a href="'.$Mapa.'">Ver Mapa</a>';
                    } 
                    else{
                      echo "No hay mapa";
                    }
                    ?>

                  </td>
                </tr>

                <tr>
                  <td class="font-w600">País & Ciudad</td>
                  <td><?php echo$Pais." - ". $Departamento;?></td>
                </tr>

                <tr>
                  <td class="font-w600">Codigo Postal</td>
                  <td><?php echo$CodigoPostal?></td>
                </tr>



                <tr>
                  <td class="font-w600">Estado:</td>
                  <td><?php echo "Estado: ".$estado." - Confidencial: ". $confidencial?></td>
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

                  <?php if($facebook !=""){ echo '<a href="'.$facebook.'" target="_blank"><i class="fa fa-facebook-square fa-2x" style="color: black;"></i></a>';} ?>

                  <?php if($Instagrama !=""){ echo '<a  href="'.$Instagrama.'" target="_blank"><i class="fa fa-instagram fa-2x" style="color: black;"></i></a>';} ?>

                  <?php if($Youtube !=""){ echo '<a  href="'.$Youtube.'" target="_blank"><i class="fa fa-youtube-play fa-2x" style="color: black;"></i></a>';} ?>

                </div>
              </td>
            </tr>
          </tbody>
        </table>
        <!-- END Project Info -->
        <div class="table-responsive">
          <?php 


          if ($stmt2->execute(array($idEmpresa))){
            if ($stmt2->rowCount()>0){
              $n=1;
              $salida.='<table class="table table-striped table-bordered  js-dataTable-full-pagination">
              <thead>
              <tr>
              <th>N°</th>
              <th>Plaza</th>
              <th>Expira</th>
              <th>Oferta</th>
              <th>Ver</th>
              </tr>
              </thead>
              <tbody>';
              while ($item=$stmt2->fetch())
              {
                $salida.='
                <tr>
                <td>'.$n.'</td>
                <td>'.$item['Plaza'].'</td>
                <td>'.$item['Expira'].'</td>
                <td>'.$item['Estado'].'</td>
                <td>
                <a href="../../oferta_trabajo?id='.base64_encode($item['IDpostulaciones']).'" class="btn btn-alt-primary btn-lg  btn-rounded" data-toggle="tooltip" title="Ver oferta de trabajo" target="_blank"> <i class="fa fa-briefcase fa-2x5"></i> </a>
                </td>
                </tr>';
                $n++;        
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



        <h3 class="mb-10">Descripción de la empresa</h3>
        <?php echo$Description; ?>
        <h3>Razón Social</h3>
        <?php echo $razonSocial; ?>
        <br>
        <br>
        <h6>Informe del usuario</h6>
        <!-- Project Info -->
        <table class="table table-striped table-borderless mt-20">
          <tbody>

            <tr>
              <td class="font-w600">Nombre de Usuario </td>
              <td><?php echo$NombreUsuario." ". $ApellidosUsuario?></td>
            </tr>

            <tr>
              <td class="font-w600">Estado del Usuario </td>
              <td><?php echo$estadoUser?></td>
            </tr>

            <tr>
              <td class="font-w600">contaco del reclutador</td>
              <td><?php echo"Tel: ".$Telefono." - Cel:". $Celular?></td>
            </tr>

            <tr>
              <td class="font-w600">E-mail personal</td>
              <td><?php echo $EmailUsuario?></td>
            </tr>

            <tr>
              <td class="font-w600">E-mail Empresa</td>
              <td><?php echo $Email?></td>
            </tr>

            <tr>
              <td class="font-w600">Fecha Registro</td>
              <td><?php echo $FechaRegistroUsuario?></td>
            </tr>

          

            <tr>
              <td class="font-w600">Ultima conexión</td>
              <td><?php echo $UltimaConexionUsuario?></td>
            </tr>

          </tbody>
        </table>



      </div>
    </div>
  </div>
  <!-- END Project -->




</div>      


</div>


</div>


</main>



<?php include_once 'templates/footer.php';
include_once 'templates/script.php';
include_once '../../templates/alertas.php';
?>
