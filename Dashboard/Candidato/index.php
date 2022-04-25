<?php
include_once '../../BD/Conexion.php';
include_once '../../BD/Consultas.php';
include_once 'templates/head.php';
$Conexion = new Consultas();

include_once 'templates/validar-perfil.php';

$sqlEstadoCuenta="SELECT `Estado` FROM `usuario_perfil` WHERE `IDUsuario` = ?";
$stmtValidarPerfil= $Conexion->ejecutar_consulta_simple_Where($sqlEstadoCuenta , $IDUser);
while ($item=$stmtValidarPerfil->fetch())
{
    $verificaPerfil = $item['Estado'];
}

if($verificaPerfil!="Activo"){

    if($VerificaUsuarioSinPerfil == 0){
        echo "<script>location.href='perfil?notificar=1';</script>";
    }else if($VerificaUsuarioEducacion == 0){
        echo "<script>location.href='educacion?notificar=1';</script>";
    }else if($VerificaUsuarioExperiencia == 0){
        echo "<script>location.href='experiencia?notificar=1';</script>";
    }else if($VerificaUsuarioHabilidades == 0)
    {
        echo "<script>location.href='habilidades?notificar=1';</script>";
    }
    else if($VerificaUsuarioIdiomas == 0){
        echo "<script>location.href='habilidades?notificar=1';</script>";
         
    }else{
        echo "<script>location.href='documentos?notificar=1';</script>";
    }

}   




//Extraer la informacion desde la base para sabar
//el conteo  para mostrar en los cuadros Agregar Experiencia, Educacion
//Referencia entre otro.
$resultPerfil = $Conexion->ejecutar_consulta_conteo("usuario_perfil" , "IDUsuario" , $IDUser); //10
$resultEducacion = $Conexion->ejecutar_consulta_conteo("usuario_educacion" , "IDUsuario" , $IDUser); //
$resultExperiencia = $Conexion->ejecutar_consulta_conteo("usuario_experiencia" , "IDUsuario" , $IDUser);


$ResultIdiomas = $Conexion->ejecutar_consulta_conteo("usuarios_idiomas","IDUsuario",$IDUser);
$ResultTecnicas = $Conexion->ejecutar_consulta_conteo("usuarios_habilidades","IDUsuario",$IDUser);
$resultHabilidades = $Conexion->ejecutar_consulta_conteo("usuarios_conocimentos" , "IDUsuario" , $IDUser);
$totalHabilidades =   $resultHabilidades + $ResultTecnicas + $ResultIdiomas;
$resultReferencia = $Conexion->ejecutar_consulta_conteo("usuario_referencia" , "IDUsuario" , $IDUser);


$PorcentajePerfil = 0;

if ($resultPerfil >=1 ) {
    $PorcentajePerfil = 14.28571428571429 + $PorcentajePerfil;
}

if ($resultEducacion >= 1) {
    $PorcentajePerfil = 14.28571428571429 + $PorcentajePerfil;
}

if ($resultExperiencia >= 1) {
    $PorcentajePerfil = 14.28571428571429 + $PorcentajePerfil;
}

if ($ResultIdiomas >= 1) {
    $PorcentajePerfil = 14.28571428571429 + $PorcentajePerfil;
}

if ($ResultTecnicas >= 1) {
    $PorcentajePerfil = 14.28571428571429 + $PorcentajePerfil;
}

if ($resultHabilidades >= 1) {
    $PorcentajePerfil = 14.28571428571429 + $PorcentajePerfil;
}

if ($resultReferencia >= 1) {
    $PorcentajePerfil = 14.28571428571429 + $PorcentajePerfil;
}


$resultVisitas = $Conexion->ejecutar_consulta_conteo("usuarios_visitas " , "IDUsuario" , $IDUser);
//Extraemos desde la base las visatas de las empresas.
//
$sql = "SELECT  EP.IDEmpresa , EP.Confidencial, EP.Nombre ,EP.logo , UV.visitas FROM usuarios_visitas UV INNER JOIN empresa_perfil EP ON UV.IDEmpresa = EP.IDEmpresa LEFT JOIN usuarios_cuentas UC ON UV.IDUsuario = UC.IDUsuario WHERE UV.IDUsuario = $IDUser ";
$stmtVisitas =  $Conexion->ejecutar_consulta_simple($sql);

$sql2 ="SELECT `UltimaActualizacion` FROM `usuario_perfil` WHERE IDUsuario = ?";
$stmt2 = $Conexion->ejecutar_consulta_simple_Where($sql2 , $IDUser);
while ($item=$stmt2->fetch())
{
    $CVActualizacion = $item['UltimaActualizacion'];
}

$sql3 ="SELECT `UltimaConexion` FROM `usuarios_cuentas` WHERE `IDUsuario` = ? ";
$stmt3 = $Conexion->ejecutar_consulta_simple_Where($sql3 , $IDUser);
while ($item=$stmt3->fetch())
{
    $UltimaConexion = $item['UltimaConexion'];
}

$fechaActual = date('d-m-Y');
if ($UltimaConexion == "") {

    $sql4 ="UPDATE `usuarios_cuentas` SET `UltimaConexion` = :UltimaConexion WHERE `IDUsuario` = :IDUsuario";
    $stmt =  Conexion::conectar()->prepare($sql4);
    $stmt->bindParam(':IDUsuario', $IDUser , PDO::PARAM_STR);
    $stmt->bindParam(':UltimaConexion', $fechaActual , PDO::PARAM_STR);
    $stmt->execute();
}else if($UltimaConexion != $fechaActual ){

   $sql4 ="UPDATE `usuarios_cuentas` SET `UltimaConexion` = :UltimaConexion WHERE `IDUsuario` = :IDUsuario";
   $stmt =  Conexion::conectar()->prepare($sql4);
   $stmt->bindParam(':IDUsuario', $IDUser , PDO::PARAM_STR);
   $stmt->bindParam(':UltimaConexion', $fechaActual , PDO::PARAM_STR);
   $stmt->execute();
}

$sql5 ="SELECT COUNT(`IDOfertaTrabajo`) AS 'TotalAplicado' FROM usuario_postulaciones WHERE IDUsuario = ? AND `Estado` = 'Enviado' ";
$stmt5 =  Conexion::conectar()->prepare($sql5);
$stmt5->execute(array($IDUser));

while ($item=$stmt5->fetch())
{
    $TotalAplicado= $item['TotalAplicado'];
}

$sql6 ="SELECT COUNT(`IDOfertaTrabajo`) AS 'TotalVisto' FROM usuario_postulaciones WHERE IDUsuario = ? AND `Estado` = 'Visto'";
$stmt6 =  Conexion::conectar()->prepare($sql6);
$stmt6->execute(array($IDUser));

while ($item=$stmt6->fetch())
{
    $TotalVisto= $item['TotalVisto'];
}
?>
<title>Candidato | Home</title>
<?php 
include_once 'templates/styles.php';
include_once 'templates/MenuRight.php';
include_once 'templates/MenuLeft.php';
include_once 'templates/header.php';
?>
<style type="text/css">

    #imgbanner{

        background: url('../assets/media/photos/Incio_de_Sesion_Usuario.jpg');
        background-repeat: no-repeat;
        background-size: cover;
        height: 200px;
    }



</style>

<main id="main-container">

  <div class="bg-image bg-image-bottom" id="imgbanner">
    <div class="">
        <div class="content content-top text-center overflow-hidden">
            <div class="pt-40 pb-20">

                <h2 class="h2 font-w400  invisible" id="titulos"  style="color: white;" data-toggle="appear" data-class="animated fadeInUp">¡ Bienvenido a tu panel <br> <?php echo $PrimerNombre[0] ?> ! </h2>
            </div>
        </div>
    </div>
</div>

<div style="margin-right:2%; margin-left:2%;">

   <div class="row gutters-tiny invisible" data-toggle="appear" data-class="animated bounceInLeft" >

     <div class="col-6 col-md-4 col-xl-2">
        <a class=" text-center" href="actualizar-cuenta">
            <div class="block-content ribbon ribbon-bookmark ribbon-crystal  cuadros">
                <p class="mt-5">
                    <i class="si si-user-follow fa-3x text-white"></i>
                </p>
                <p class="font-w600 text-white" style="margin-bottom: 33px;">Cuenta <br> Usuario</p> 
            </div>
        </a>
        </div>
        <!-- Row #1 -->
        <div class="col-6 col-md-4 col-xl-2">
            <a class=" text-center" href="perfil-candidato" >
                <div class="block-content ribbon ribbon-bookmark ribbon-crystal ribbon-left cuadros">
                    <p class="mt-5">
                       <img src="../assets/iconos/candidato/Actualizar_Perfil.png">
                   </p>


                   <p class='font-w600 text-white'>Perfil <br>  Profesional</p>

               </div>
           </a>
       </div>
       <div class="col-6 col-md-4 col-xl-2">
        <a class=" text-center" href="educacion-academico">
            <div class="block-content ribbon ribbon-bookmark ribbon-crystal ribbon-left cuadros">
                <div class="ribbon-box"><?php echo $resultEducacion; ?></div>
                <p class="mt-5">
                   <img src="../assets/iconos/candidato/Agregar_Educacion.png">
               </p>
               <p class="font-w600 text-white">Educación <br> Académico</p>
           </div>
       </a>
   </div>


   <div class="col-6 col-md-4 col-xl-2">
    <a class=" text-center" href="experiencia-laboral"  >
        <div class="block-content ribbon ribbon-bookmark ribbon-crystal ribbon-left cuadros" >
            <div class="ribbon-box"><?php echo $resultExperiencia; ?></div>
            <p class="mt-5">
                <img src="../assets/iconos/candidato/Experiencia_Laboral.png">
            </p>
            <p class="font-w600 text-white">Experiencia <br>Laboral</p>
        </div>
    </a>
</div>



<div class="col-6 col-md-4 col-xl-2">
    <a class=" text-center" href="habilidades-usuario">
        <div class="block-content ribbon ribbon-bookmark ribbon-crystal ribbon-left cuadros">
            <div class="ribbon-box"><?php echo $totalHabilidades; ?></div>
            <p class="mt-5">
                <img src="../assets/iconos/candidato/Habilidades.png">
            </p>
            <p class="font-w600 text-white">Habilidades <br> Usuario</p>
        </div>
    </a>
</div>
<div class="col-6 col-md-4 col-xl-2">
    <a class=" text-center" href="referencia-trabajo">
        <div class="block-content ribbon ribbon-bookmark ribbon-crystal ribbon-left cuadros">
         <div class="ribbon-box"><?php echo $resultReferencia; ?></div>
         <p class="mt-5">
            <img src="../assets/iconos/candidato/Referencias.png">
        </p>
        <p class="font-w600 text-white">Referencias <br> Trabajos</p>
    </div>
</a>
</div>
<!-- END Row #1 -->

</div>


<div class="row gutters-tiny invisible" data-toggle="appear" data-class="animated bounceInLeft" >

    <div class="col-6 col-md-4 col-xl-2">
        <a class=" text-center" href="../../todas-las-ofertas.php">
            <div class="block-content ribbon ribbon-bookmark ribbon-crystal ribbon-left cuadros">
                <p class="mt-5">
                    <img src="../assets/iconos/candidato/Buscar_Empleo.png">
                </p>
                <p class="font-w600 text-white">Buscar <br>Empleos</p>
            </div>
        </a>
    </div>

    <div class="col-6 col-md-4 col-xl-2">
        <a class=" text-center" href="alertas">
            <div class="block-content ribbon ribbon-bookmark ribbon-crystal ribbon-left cuadros">
                <p class="mt-5">
                    <img src="../assets/iconos/candidato/Alertas_Trabajo.png">
                </p>
                <p class="font-w600 text-white">Alertas <br> Trabajos</p>
            </div>
        </a>
    </div>

    <div class="col-6 col-md-4 col-xl-2">
        <a class=" text-center" href="empresas">
            <div class="block-content ribbon ribbon-bookmark ribbon-crystal ribbon-left cuadros">
                <p class="mt-5">
                    <img src="../assets/iconos/candidato/Area_de_Empresa.png">
                </p>
                <p class="font-w600 text-white">Listado <br> Empresa</p>
            </div>
        </a>
    </div>

    <div class="col-6 col-md-4 col-xl-2">
        <a class=" text-center" href="postulaciones">
            <div class="block-content ribbon ribbon-bookmark ribbon-crystal ribbon-left cuadros">
                <p class="mt-5">
                    <img src="../assets/iconos/candidato/Mis_Postulaciones.png">
                </p>
                <p class="font-w600 text-white">Mis <br> Postulaciones</p>
            </div>
        </a>
    </div>

    <div class="col-6 col-md-4 col-xl-2">
        <a class=" text-center" href="favoritos">
            <div class="block-content ribbon ribbon-bookmark ribbon-crystal ribbon-left cuadros">
                <p class="mt-5">
                    <img src="../assets/iconos/candidato/Favoritos.png">
                </p>
                <p class="font-w600 text-white">Mis <br> Favoritos</p>
            </div>
        </a>
    </div>

    <div class="col-6 col-md-4 col-xl-2">
        <a class=" text-center" href="chats-empresas">
            <div class="block-content ribbon ribbon-bookmark ribbon-crystal ribbon-left cuadros">
                <p class="mt-5">
                    <img src="../assets/iconos/candidato/Chat_Empresa.png">
                </p>
                <p class="font-w600 text-white">Chats con<br>empresas</p>
            </div>
        </a>
    </div>






</div> 



<!--nuevo contenido-->

<div class="row gutters-tiny invisible" data-toggle="appear" data-class="animated bounceInRight" >

   <div class="col-md-6">
    <div class="block block-transparent bg-gd-dusk">
        <div class="block-content block-content-full">
            <div class="block block-transparent  d-flex align-items-center w-100" class="cuadros">
                <div class="block-content block-content-full">

                    <center>
                        <a class="img-link" href="cv" >
                            <img class="img-avatar img-avatar-thumb" style="width: 135px; height: 135px;" src="../../assets/img/user/<?php echo $FotoUser ?>" alt="userfoto">
                        </a>
                    </center>


                    <div class="block-content block-content-full block-content-sm text-center">
                        <div class="font-w600 text-white mb-5"><b><?php echo $NombresUser . " " . $ApellidosUser ?></b></div>
                        <div class="font-size-sm text-white"><b><?php echo $CorreoUser ?></b></div>
                    </div>


                    <div class="block-content text-center">
                        <div class="row items-push">
                            <div class="col-lg-6 col-md-6 col-12">
                                <br>
                                <div class="mb-5">
                                    <button type="button" data-toggle="modal" data-target="#modal-terms" class="btn btn-hero btn-rounded btn-noborder btn-alt-primary mr-5 mb-5">
                                     <i class="si si-eye fa-2x5 text-white"> </i> <?php echo $resultVisitas ?>  visitas
                                 </button>

                             </div>

                         </div>
                         <div class="col-lg-6 col-md-6 col-12">
                            <br>
                            <button  class="btn btn-hero btn-rounded btn-noborder btn-alt-primary mr-5 mb-5" data-toggle="modal" data-target="#modal-terms2">Subir Foto</button>
                            <br><br>
                        </div>
                    </div>
                </div>



            </div>
        </div>      
    </div>
</div>
</div>


<div class="col-md-6">
    <div class="block block-transparent bg-gd-dusk">
        <div class="block-content block-content-full">
            <div class="block block-transparent  d-flex align-items-center w-100" class="cuadros">
                <div class="block-content block-content-full">



                    <div class="py-15 px-20 clearfix border-black-op-b">
                        <div class="float-right mt-15 d-none d-sm-block">
                            <i class="si si-book-open fa-2x text-white"></i>
                        </div>
                        <div class="font-size-sm font-w600 text-uppercase text-white">Resumen Perfil Profesional</div>
                        <hr>
                        <div class="row">
                            <div class="col-sm">
                                <h6 class="text-white">Actualizado: <?php 
                                if ($CVActualizacion == "") {
                                    echo "No has creado un perfil";
                                }else{
                                     $date = date_create($CVActualizacion);  echo date_format($date,"d/m/Y"); 
                                }?> </h6> 
                            </div>

                            <div class="col-sm">
                              <h6 class="text-white">Completado: <?php echo round($PorcentajePerfil,2); ?>%</h6> 
                          </div>

                      </div>

                  </div>


                  <div class="py-15 px-20 clearfix border-black-op-b">
                    <div class="float-right mt-15 d-none d-sm-block">
                        <i class="si si-eye fa-2x text-white"></i>
                    </div>
                    <div class="font-size-sm font-w600 text-uppercase text-white">Resumen del estado de tus postulaciones</div>
                    <hr>

                    <div class="row">
                     <div class="col">
                      <a href="postulaciones" class="text-white"><b>Aplicado en <?php echo$TotalAplicado ?> ofertas</b></a>
                  </div>
                  <div class="col">
                      <a href="postulaciones" class="text-white"><b>CV visto en <?php echo $TotalVisto ?> ofertas</b></a>
                  </div>
              </div>

          </div>

          <div class="py-15 px-20 clearfix border-black-op-b">
            <div class="float-right mt-15 d-none d-sm-block">
                <i class="si si-doc fa-2x text-white"></i>
            </div>
            <div class="font-size-sm font-w600 text-uppercase text-white">otros</div>
            <hr>

            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <a href="cv.php" class="btn btn-hero btn-rounded btn-noborder btn-alt-primary mr-5 mb-5" >Ver Perfil</a>


                </div>

                <div class="col-lg-6 col-md-6 col-12">
                    <a href="documentos-usuario" class="btn btn-hero btn-rounded btn-noborder btn-alt-primary mr-5 mb-5" > Subir Documentos</a>
                </div>
            </div>



        </div>




    </div>
</div>      
</div>
</div>
</div>

</div>








</div><!--Fin del conenido-->


<!-- Terms Modal -->
<div class="modal fade" id="modal-terms" tabindex="-1" role="dialog" aria-labelledby="modal-terms" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-slidedown" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Vistas empresas</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <h3 class="text-center">Empresas que ha vistos tu perfil</h3>
                    <p>A continuación se muestran las empresas que han visitados tu perfil desde la más reciente a la más antigua. <b>Las empresas con estado confidencial no podras ver el perfil de empresas por motivo de privacidad.</b></p>

                    <!-- Dynamic Table Full -->
                    <div class="block">
                        <div class="block-content block-content-full">
                            <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                            <table class="table table table-responsive table-bordered table-striped table-vcenter js-dataTable-full ">
                                <thead>
                                    <tr>
                                        <th class="text-center">N°</th>
                                        <th class="text-center" style="width: 50%;">Logo</th>
                                        <th>Empresa</th>
                                        <th class="text-center">Vistas</th>
                                        <th style="width: 50%;">Opción</th>
                                    </tr>
                                </thead>
                                <tbody>


                                    <?php 

                                    $total=1;
                                    $LogoImagen = "";
                                    $Empresa = "";
                                    $Boton = "";
                                    while ($item=$stmtVisitas->fetch()){

                                        if ($item['Confidencial'] == "Si") {
                                            $LogoImagen ='<img src="../../main/img/LogosEmpresas/confidential.png" class="img-fluid img-thumbnail" style="width: 100px;">';
                                        }
                                        else{
                                            $LogoImagen ='<img src="../../main/img/LogosEmpresas/'.$item['logo'].'" class="img-fluid img-thumbnail" style="width: 100px;">';
                                        }

                                        if ($item['Confidencial'] == "Si") {
                                            $Empresa ='Confidencial';
                                        }
                                        else{
                                            $Empresa =$item['Nombre'];
                                        }

                                        if ($item['Confidencial'] == "Si") {
                                            $Boton ="<center><button class='btn btn-primary btn-icon-split' disabled ><i class='fa fa-close'></i></button></center>";
                                        }
                                        else{
                                            $Boton ="<center><a href='empresa?id=".base64_encode($item['IDEmpresa'])."'  class='btn btn-primary btn-icon-split' target='_blank'>Ver empresa</a></center>";
                                        }

                                        echo "<tr>
                                        <td>".$total."</td>
                                        <td class='text-center'>".$LogoImagen."</td>
                                        <td class='text-center' >".$Empresa."</td>
                                        <td class='text-center'><b>".$item['visitas']."</b></td>
                                        <td>".$Boton."</td>
                                        </tr>";
                                        $total++;
                                    }

                                    ?>



                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END Dynamic Table Full -->



                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Cerrar</button>

            </div>
        </div>
    </div>
</div>
<!-- END Terms Modal -->








</main>

<?php 
include_once 'templates/footer.php';
include_once 'templates/Instrucciones.php';
include_once 'templates/script.php';
include_once '../../templates/alertas.php';
?>

   <?php  if(isset($_GET['seguridad'])){ echo "<script>swal({title:'Advertenicia',text:' Verifica tu correo electrónico para confirmar el cambio de contraseña. Para poder volver iniciar sesión de nuevo',type:'warning'  });</script>"; } ?>