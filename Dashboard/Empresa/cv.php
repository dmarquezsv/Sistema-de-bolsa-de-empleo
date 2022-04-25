<?php
include_once '../../BD/Conexion.php';
include_once '../../BD/Consultas.php';
include_once 'templates/head.php';
$Conexion = new Consultas();
include_once 'templates/seguridadCpanel.php';
$id = base64_decode($_GET['id']);

if (!$_GET['Postulacion']==null){

  $Postulacion = base64_decode($_GET['Postulacion']);

  $sql16="SELECT COUNT(`IDOfertaTrabajo`)AS 'PerfilVisto' FROM `usuario_postulaciones` WHERE `IDpostulaciones` = ? AND `IDUsuario` = ? AND Estado = 'enviado' AND Aprobacion ='en espera'";

  $stmt16 =  Conexion::conectar()->prepare($sql16);
  if (!$stmt16->execute(array($Postulacion,$id))){
    echo "No se ha podido ejecutar la consulta sql16 ";
  }

  while ($item=$stmt16->fetch())
  {
    $resultCandidatoVisto = $item['PerfilVisto'];
  }

  if($resultCandidatoVisto == 1){

    $sql15 = "UPDATE `usuario_postulaciones` SET `Estado` = 'Visto' WHERE `IDpostulaciones` = ? AND `IDUsuario` = ? ";
    $stmt15 =  Conexion::conectar()->prepare($sql15);
    if (!$stmt15->execute(array($Postulacion,$id))){
      echo "No se ha podido ejecutar la consulta sql15 ";
    }

  }

}


//vERIFICA SI EXISTE UN REPORTE CON LA FECHA ACTUAL SI ES CERO CREA EL  REPORTE  SI ES 1 INCREMENTA CONTADOR DE VISITAS
$sql18="SELECT COUNT(`IDReporte`) AS 'FechaDelDia' FROM `reportes_generales` WHERE `fecha` = ? AND `IDEmpresa` = ? AND `Tipo` = 'Perfiles vistos'";
$stmt18 =  Conexion::conectar()->prepare($sql18);
$fechadelDia =date("Y-m-d");

$stmt18->execute(array($fechadelDia, $IDEmpresa));
while ($item=$stmt18->fetch()){

  $ResultReporteDelDia = $item['FechaDelDia'];
}


//Este bloque sirve para realizar los reportes para las empresas por lo tanto
//realiza el conteo de visitas de los perfiles visto por fechas 
if($ResultReporteDelDia == 0){

  $sql19="INSERT INTO `reportes_generales` (`IDEmpresa`, `Tipo`, `contador`, `fecha`) VALUES (:IDEmpresa, 'Perfiles vistos', '1', :fecha)";
  $stmt19 =  Conexion::conectar()->prepare($sql19);
  $stmt19->bindParam('IDEmpresa',$IDEmpresa  , PDO::PARAM_STR);
  $stmt19->bindParam('fecha',$fechadelDia  , PDO::PARAM_STR);
  if (!$stmt19->execute()){

    echo "No se ha podido guardar el conteo de reportes";
  }

}else{

  //Realizamos una consulta para buscar  el conteo  con su respectivo fecha y empresa. La opcion sera perfiles vistos por dia
  $sql20="SELECT `contador` FROM reportes_generales WHERE `fecha` = ?  AND `IDEmpresa` = ? AND `Tipo` = 'Perfiles vistos'";
  $stmt20 =  Conexion::conectar()->prepare($sql20);
  $stmt20->execute(array($fechadelDia, $IDEmpresa));
  while ($item=$stmt20->fetch()){

    $contador = $item['contador']; // resultado del contado de visitas
  }

 $incremento = $contador + 1; // el aumento en 1 por cada visitas

//Actualizamos la visita del contador
 $sql19="UPDATE `reportes_generales` SET `contador`= :contador WHERE `fecha` = :fecha  AND `IDEmpresa` = :IDEmpresa AND `Tipo` = 'Perfiles vistos'";
 $stmt19 =  Conexion::conectar()->prepare($sql19);
 $stmt19->bindParam('contador',$incremento  , PDO::PARAM_STR);
 $stmt19->bindParam('fecha',$fechadelDia  , PDO::PARAM_STR);
 $stmt19->bindParam('IDEmpresa',$IDEmpresa  , PDO::PARAM_STR);
 if (!$stmt19->execute()){

  echo "No se ha podido guardar el conteo de reportes";
}


}
//fIN DEL BLOQUE DEL REPORTE

$sql="SELECT COUNT(`IDCandidatos`) as 'existeRegistro' FROM `guardar_candidatos_empresas` WHERE `IDUsuario` = ? AND `IDEmpresa` = ?";
$stmt =  Conexion::conectar()->prepare($sql);
$stmt->execute(array($id, $IDEmpresa));
while ($item=$stmt->fetch()){

  $resultPerfilGuardado = $item['existeRegistro'];
}


if ($resultPerfilGuardado == 0) {

  $sql10 = "INSERT INTO `guardar_candidatos_empresas` (`IDUsuario`, `IDEmpresa` , fecha_registro) VALUES (:IDUsuario, :IDEmpresa,:fecha_registro) ";
  $stmt10 =  Conexion::conectar()->prepare($sql10);
  $stmt10->bindParam('IDUsuario', $id , PDO::PARAM_STR);
  $stmt10->bindParam('IDEmpresa',$IDEmpresa  , PDO::PARAM_STR);
  $fechaActual =date("Y-m-d");
  $stmt10->bindParam('fecha_registro',$fechaActual  , PDO::PARAM_STR);

  if (!$stmt10->execute()){

    echo "No se ha podido guardar el usuario";
  }

}



$sql14 = "SELECT COUNT(`IDEmpresa`) AS 'ResultVisitas' FROM usuarios_visitas WHERE `IDEmpresa` = ? AND `IDUsuario` =? ";
$stmt14 =  Conexion::conectar()->prepare($sql14);
if (!$stmt14->execute(array($IDEmpresa,$id))){
  echo "No se ha podido guardar el usuario";
}


while ($item=$stmt14->fetch())
{
 $resultPerfilVisto = $item['ResultVisitas'];
}


if($resultPerfilVisto == 0){

  $sql11="INSERT INTO `usuarios_visitas` (`IDEmpresa`, `IDUsuario`, `visitas`) VALUES (:IDEmpresa, :IDUsuario, 1)";
  $stmt11 =  Conexion::conectar()->prepare($sql11);
  $stmt11->bindParam('IDEmpresa',$IDEmpresa  , PDO::PARAM_STR);
  $stmt11->bindParam('IDUsuario', $id , PDO::PARAM_STR);
  if (!$stmt11->execute()){

    echo "No se ha podido guardar el usuario";
  }

}else{

  $sql12 = "SELECT `visitas` FROM `usuarios_visitas` WHERE `IDEmpresa` = :IDEmpresa AND `IDUsuario` = :IDUsuario";
  $stmt12 =  Conexion::conectar()->prepare($sql12);
  $stmt12->bindParam('IDEmpresa',$IDEmpresa  , PDO::PARAM_STR);
  $stmt12->bindParam('IDUsuario', $id , PDO::PARAM_STR);
  if (!$stmt12->execute()){
    echo "No se ha podido guardar el usuario";
  }

  while ($item=$stmt12->fetch())
  {
   $visitas = $item['visitas'];
 }

 $sumarVisitas =  $visitas + 1;


 $sql13="UPDATE `usuarios_visitas` SET `visitas`= :visitas WHERE `IDEmpresa` = :IDEmpresa AND `IDUsuario` = :IDUsuario";
 $stmt13 =  Conexion::conectar()->prepare($sql13);
 $stmt13->bindParam('visitas',$sumarVisitas  , PDO::PARAM_STR);
 $stmt13->bindParam('IDEmpresa',$IDEmpresa  , PDO::PARAM_STR);
 $stmt13->bindParam('IDUsuario', $id , PDO::PARAM_STR);
 if (!$stmt13->execute()){
  echo "No se ha podido guardar el usuario";
}


}


$sql ="SELECT `Nombre` , `Apellidos` , `Correo` , `Foto` , UltimaConexion FROM `usuarios_cuentas` WHERE `IDUsuario` = ? ";
$stmt = $Conexion->ejecutar_consulta_simple_Where($sql , $id);

while ($item=$stmt->fetch())
{
 $Nombres = $item['Nombre'];
 $Apellidos = $item['Apellidos'];
 $Email = $item['Correo'];
 $Foto =  $item['Foto'];  
 $UltimaConexion = $item['UltimaConexion'];

}

$sql2 ="SELECT P.IDPais ,P.Nombre AS'Pais' , PD.IDDepartamento , PD.Nombre AS 'Departamento' , `EducacionSecundaria` , `Descripcion` , `LicenciaConducir` , `Vehiculo` , `ManejoVehiculo` ,`CorreoAlternativo` , `Telefono` , `Celular` , `Discapacidad` , `TipoDiscapacidad` , `ExperienciaLaboral` , TE.IDAreaExperiencia , TE.Nombre AS 'Experiencia' , `Portafolio` , `Disponiblidad` , `SituacionActual` , `FechaNaciento` , `edad` , `UltimaActualizacion` ,`SalarioMinimo` , `SalarioMaximo` , `confidencial` , `identificacion` ,`numidentificacion` , `urlvideo` FROM usuario_perfil UP INNER JOIN soporte_paises P ON UP.IDPais = P.IDPais LEFT JOIN soporte_paises_departamento PD ON UP.IDDepartamento = PD.IDDepartamento LEFT JOIN soporte_tipo_experiencia TE ON UP.IDAreaExperiencia = TE.IDAreaExperiencia WHERE UP.IDUsuario = ?";
$stmt2 = $Conexion->ejecutar_consulta_simple_Where($sql2 , $id);
while ($item=$stmt2->fetch())
{

    $Pais = $item['Pais'];//yA
    $Departamento = $item['Departamento'];//YA
    $Educacion = $item['EducacionSecundaria']; // Ya
    $Descripcion = $item['Descripcion'];//yA
    $LicenciaConducir = $item['LicenciaConducir']; //Ya
    $Vehiculo = $item['Vehiculo']; //Ya
    $Manejas = $item['ManejoVehiculo']; // Ya
    $CorreoAlternativo = $item['CorreoAlternativo'];
    $Telefono = $item['Telefono']; // Ya
    $Celular = $item['Celular']; // Ya
    $Discapacitado =$item['Discapacidad']; // Ya
    $ExperienciaLaboral = $item['ExperienciaLaboral']; // Ya
    $NombreExperiencia = $item['Experiencia']; // Ya
    $Portafolio = $item['Portafolio']; //YA
    $Disponibilidad = $item['Disponiblidad']; // Ya
    $SituacionActual = $item['SituacionActual'];
    $FechaNaciento = $item['FechaNaciento']; // Ya
    $edad = $item['edad']; // Ya
    $cvActualizado =$item['UltimaActualizacion'];

    $SalarioMinimo = $item['SalarioMinimo']; //Ya
    $SalarioMaximo = $item['SalarioMaximo']; //Ya
    $confidencial = $item['confidencial'];
    $identificacion = $item['identificacion'];
    $numidentificacion = $item['numidentificacion'];
    $urlVideo =$item['urlvideo'];
  }

  $sql3 = "SELECT Cargo , TA.IDCategoria , TA.Nombre AS 'Categoria' ,TE.IDTipoEmpresa ,TE.Area , CD.IDDesempenado , CD.nombre AS 'Desempeno' , Lugar , Descripcion ,RangoSalarial , FechaInicio , FechaFinal , PaginaEmpresa ,Estado FROM usuario_experiencia UE INNER JOIN soporte_areas_trabajos TA ON UE.IDCategoria = TA.IDCategoria LEFT JOIN soporte_cargos_desempenado CD ON UE.IDDesempenado = CD.IDDesempenado LEFT JOIN soporte_tipo_empresa TE ON UE.IDTipoEmpresa = TE.IDTipoEmpresa WHERE `IDUsuario` = ?";

  $stmt3 = $Conexion->ejecutar_consulta_simple_Where($sql3 , $id);

  $sql4 = "SELECT CentroEduacativo , Especialidad ,C.Id_Carrera , C.nombre AS 'Carrera'  , NivelEstudio , FechaInicio ,FechaFinal , P.IDPais , P.Nombre AS 'Pais' FROM usuario_educacion UE INNER JOIN carrera C ON UE.Id_Carrera = C.Id_Carrera LEFT JOIN soporte_paises P ON UE.IDPais = P.IDPais WHERE `IDUsuario` = ? ";

  $stmt4 = $Conexion->ejecutar_consulta_simple_Where($sql4 , $id);

  $sql5 = "SELECT Idioma , Nivel FROM `usuarios_idiomas` WHERE IDUsuario = ?";
  $stmt5 = $Conexion->ejecutar_consulta_simple_Where($sql5 , $id);

  $sql6 ="SELECT  AH.Nombre 'Habilidad' , Nivel FROM usuarios_habilidades UH INNER JOIN soporte_areas_habilidades AH ON UH.IDHabilidades = AH.IDHabilidades WHERE IDUsuario = ?";
  $stmt6 = $Conexion->ejecutar_consulta_simple_Where($sql6 , $id);

  $sql7 ="SELECT  AE.Nombre 'Tecnica' , Nivel FROM usuarios_conocimentos UC INNER JOIN soporte_areas_experiencia AE ON UC.IDTipo = AE.IDTipo WHERE IDUsuario = ?";

  $stmt7 = $Conexion->ejecutar_consulta_simple_Where($sql7 , $id);

  $sql8 ="SELECT * FROM `usuario_referencia` WHERE `IDUsuario` = ?";
  $stmt8 = $Conexion->ejecutar_consulta_simple_Where($sql8 , $id);

  $sql9 ="SELECT * FROM `usuarios_documentos`  WHERE `IDUsuario` = ?";
  $stmt9 = $Conexion->ejecutar_consulta_simple_Where($sql9 , $id);

  $ResultDocumentos = $Conexion->ejecutar_consulta_conteo("usuarios_documentos","IDUsuario",$id);

  $sql17 = "SELECT COUNT(`IDSeguimiento`)AS 'Seguimiento' FROM `guardar_seguimiento_candidato` WHERE IDUsuario = ? AND IDEmpresa = ?";
  $stmt17 =  Conexion::conectar()->prepare($sql17);


  if (!$stmt17->execute(array($id,$IDEmpresa))){
    echo "No se ha podido encuentran seguimiento stmt17";
  }

  while ($item=$stmt17->fetch())
  {
   $Seguimiento = $item['Seguimiento'];
 }


 ?>
 <title>Empresa | Perfil candidato</title>
 <?php 
 include_once 'templates/styles.php';
 include_once 'templates/MenuRight.php';
 include_once 'templates/MenuLeft.php';
 include_once 'templates/header.php';
 ?>

 <style type="text/css">
   .float{
    position:fixed;
    width:50px;
    height:50px;
    bottom: 100px;
    right: 25px;
    background-color:red;
    color:#FFF;
    border-radius:50px;
    text-align:center;
    font-size:20px;
    box-shadow: 2px 2px 3px #999;
    z-index:100;
  }
  .float:hover {
    text-decoration: none;
    color: #25d366;
    background-color:#fff;
  }

  .my-float{
    margin-top:16px;
  }


  

  .float3{
    position:fixed;
    width:50px;
    height:50px;
    bottom: 155px;
    right: 25px;
    background-color:#9ccc65;
    color:#FFF;
    border-radius:50px;
    text-align:center;
    font-size:20px;
    box-shadow: 2px 2px 3px #999;
    z-index:100;
  }
  .float3:hover {
    text-decoration: none;
    color: #25d366;
    background-color:#fff;
  }

  .my-float3{
    margin-top:16px;
  }

  .float4{
    position:fixed;
    width:50px;
    height:50px;
    bottom: 210px;
    right: 25px;
    background-color:#3f9ce8;
    color:#FFF;
    border-radius:50px;
    text-align:center;
    font-size:20px;
    box-shadow: 2px 2px 3px #999;
    z-index:100;
  }
  .float4:hover {
    text-decoration: none;
    color: #25d366;
    background-color:#fff;
  }

  .my-float4{
    margin-top:16px;
  }






  .float7{
    position:fixed;
    width:50px;
    height:50px;
    bottom: 265px;
    right: 25px;
    background-color:orange;
    color:#FFF;
    border-radius:50px;
    text-align:center;
    font-size:20px;
    box-shadow: 2px 2px 3px #999;
    z-index:100;
  }
  .float7:hover {
    text-decoration: none;
    color: #25d366;
    background-color:#fff;
  }

  .my-float7{
    margin-top:16px;
  }

  /**/
  .float8{
    position:fixed;
    width:50px;
    height:50px;
    bottom: 45px;
    right: 25px;
    background-color:#26c6da;
    color:#FFF;
    border-radius:50px;
    text-align:center;
    font-size:20px;
    box-shadow: 2px 2px 3px #999;
    z-index:100;
  }
  .float8:hover {
    text-decoration: none;
    color: #25d366;
    background-color:#fff;
  }

  .my-float8{
    margin-top:16px;
  }


  #imgbanner{

    background: url('../assets/media/photos/1700x500.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    height: auto;
  }

  #conexion{
    color: white;
  }

  @media only screen and (max-width: 767px) {

    #imgbanner{

     background: url('../assets/media/photos/300x300.jpg');
     background-repeat: no-repeat;
     background-size: cover;

   }

   .text-white {
    color: #000 !important;

  }


}

@media only screen and (min-width: 600px) and (max-width: 799px){

  #imgbanner{

   background: url('../assets/media/photos/600x300.jpg');
   background-repeat: no-repeat;
   background-size: cover;

 }

 .text-white {
  color: #000 !important;

}

}


</style>

<main id="main-container">


  <a href="cv-pdf.php?id=<?php echo $_GET['id'] ?>" class="float"  data-toggle="tooltip" title="Descargar curriculum vitae por pdf" data-original-title="Descargar curriculum vitae por pdf">
    <i class="fa fa-file-pdf-o my-float"></i>
  </a>




  <a href="chat?chats=<?php echo base64_encode($_SESSION['iduser']); ?>&estado=<?php echo base64_encode('Notificar'); ?>&usuario=<?php echo $_GET['id'] ?>&email=<?php echo $Email ?>" class="float3" data-toggle="tooltip" title="Chat con el candidato" data-original-title="Chat con el candidato">
    <i class="fa fa-wechat  my-float3"></i>
  </a>

  <a href="#" class="float4">
    <i class="fa fa-pencil  my-float4" data-toggle="tooltip" title="Notificar al usuario para actualizar el perfil" data-original-title="Notificar al usuario para actualizar el perfil"></i>
  </a>



  <a href="javascript:void(0)" id="clicEnviarEmail" data-toggle="tooltip" title="Enviar E-mail el curriculum vitae a un correo electrónico"  data-original-title="Enviar E-mail el curriculum vitae a un correo electrónico" class="float7"><i id="clicEnviarEmail" class="fa fa-envelope-o my-float7"></i> </a>

  <?php 
  if ($Seguimiento==1) {?>
    <a href="seguimiento-candidato?id=<?php echo $_GET['id'] ?>"  data-toggle="tooltip" title="Usuario en segumiento"  data-original-title="Usuario en segumiento" class="float8" style=" background-color:green"><i id="clicEnviarEmail" class="fa fa-check  my-float8"></i> </a>
  <?php }else{ ?>
    <a href="javascript:void(0)" id="clicSeguimiento" data-toggle="tooltip" title="Seguimiento de candidatos"  data-original-title="Seguimiento de candidatos" class="float8"><i id="clicEnviarEmail" class="fa fa-user-o my-float8"></i> </a>
  <?php } ?>

  <div href="#" class="float6">
    <div id="resultcvemail"></div>
  </div>  


  <!-- Terms Modal -->
  <div class="modal fade" id="modal-terms1" tabindex="-1" role="dialog" aria-labelledby="modal-terms" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-slidedown" role="document">
      <div class="modal-content">
        <div class="block block-themed block-transparent mb-0">
          <div class="block-header bg-primary-dark">
            <h3 class="block-title">Enviar curriculum vitae via E-mail</h3>
            <div class="block-options">
              <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                <i class="si si-close"></i>
              </button>
            </div>
          </div>
          <div class="block-content">
            <div class="block">
              <div class="block-content block-content-full">

                <label>Ingrese el correo electrónico</label>
                <input type="text" name="emailusuario" id="emailusuario" class="form-control">
                
              </div>
            </div>
            <div class="modal-footer">
              <button type='button' class='btn btn-alt-primary' name='enviarEmail' id="enviarEmail">
                <i class='fa fa-save mr-5'></i>Enviar
              </button>

              <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Cerrar</button>

            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END Terms Modal -->


  <!-- Terms Modal -->
  <div class="modal fade" id="modal-terms3" tabindex="-1" role="dialog" aria-labelledby="modal-terms" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-slidedown" role="document">
      <div class="modal-content">
        <div class="block block-themed block-transparent mb-0">
          <div class="block-header bg-primary-dark">
            <h3 class="block-title">Seguimiento del candidato</h3>
            <div class="block-options">
              <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                <i class="si si-close"></i>
              </button>
            </div>
          </div>
          <div class="block-content">
            <div class="block">
              <div class="block-content block-content-full">
                <form action="Modelos/ModelosSeguimientos/agregar-seguimiento.php" method="POST"> 
                  <p>Recuerda: el propósito es hacer el seguimiento de tus candidatos y llevar un registro de las etapas en las que estos se encuentran. Desea agregar a
                    <?php if ($confidencial == "Privado"){  ?>
                     <b>N/D</b>
                   <?php }else{ ?>
                    <b><?php echo$Nombres ." ". $Apellidos; ?></b>
                  <?php } ?>
                </p>

                <input type="hidden" name="idCandidatos" value="<?php echo$id ?>"> 
                <input type="hidden" name="IDEmpresa" value="<?php echo $IDEmpresa ?>" >

                <?php if ($confidencial == "Privado"){  ?>
                 <input type="hidden" name="nombreUsuario" value="N/D" >
               <?php }else{ ?>
                <input type="hidden" name="nombreUsuario" value="<?php echo$Nombres ." ". $Apellidos; ?>" >
              <?php } ?>






            </div>
          </div>
          <div class="modal-footer">
            <button type='submit' class='btn btn-alt-primary' name='Confirmar' id="Confirmar">
              <i class='fa fa-save mr-5'></i>Confirmar
            </button>
          </form>
          <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Cerrar</button>

        </div>

      </div>
    </div>
  </div>
</div>
</div>
<!-- END Terms Modal -->

<!-- Page Content -->
<!-- User Info -->
<div  class="bg-image bg-image-bottom" id="imgbanner" >
  <div class=" py-30">
    <div class="content content-full text-center">
      <!-- Avatar -->
      <div class="mb-15">
        <a class="img-link" href="cv">
          <img class="img-avatar img-avatar96 img-avatar-thumb" src="../../assets/img/user/<?php echo $Foto ?>" alt="">
        </a>
      </div>
      <!-- END Avatar -->

      <!-- Personal -->
      <?php if ($confidencial == "Privado"){  ?>
        <h1 class="h3 text-white font-w700 mb-10">N/D</h1>  
      <?php }else{ ?>
        <h1 class="h3 text-white font-w700 mb-10"><?php echo$Nombres ." ". $Apellidos; ?></h1>
      <?php } ?>
      <h2 class="h5 text-white-op">
       <a class="text-white" href="mailto:<?php echo$Email ?>" style="color: #0B3486;"><?php echo$Email ?></a>
       <p class="h5 text-white font-w700 mb-10"><?php echo$Disponibilidad ?></p>
     </h2>




     <br><br>
     <h6 id="conexion">Ultima Conexion: <?php echo$UltimaConexion ?></h6>
     <h6 id="conexion">CV Actualizado: <?php echo$cvActualizado ?></h6>
   </div>
 </div>
</div>
<!-- END User Info -->



<div style="margin-right:2%; margin-left:2%;">
 <div class="row gutters-tiny invisible" data-toggle="appear" data-class="animated bounceInLeft" >

   <!-- Project -->
   <div class="block-content block-content-full">
    <div class="row py-20">
      <div class="col-sm-6 invisible" data-toggle="appear">
        <h3 class="mb-10">Datos Personales</h3>
        <!-- Project Info -->
        <table class="table table-striped table-borderless mt-20">
          <tbody>
            <tr>
              <td class="font-w600">Nacionalidad & Zona de residencia</td>
              <td><?php echo$Pais ." - ".$Departamento; ?></td>
            </tr>
            <tr>
              <td class="font-w600">Identificación: <?php echo$identificacion ?></td>
              <td><?php echo$numidentificacion ?></td>
            </tr>
            <tr>
              <td class="font-w600">Fecha de nacimiento & Edad </td>
              <td><?php echo $edad ." Años"; ?></td>
            </tr>

            <tr>
              <td class="font-w600">Experiencia Laboral</td>
              <td><?php echo$ExperienciaLaboral ?></td>
            </tr>

            <tr>
              <td class="font-w600">Tipo de Experiencia o servicio</td>
              <td><?php echo$NombreExperiencia ?></td>
            </tr>

            <tr>
              <td class="font-w600">Teléfono</td>
              <td>Tel: <?php echo$Telefono . " - Cel: ".$Celular; ?> </td>
            </tr>

            <tr>
              <td class="font-w600">E-mail alternativo</td>
              <td><?php echo$CorreoAlternativo; ?> </td>
            </tr>

            <tr>
              <td class="font-w600">Vehículo & Licencia</td>
              <td>Veh: <?php echo$Vehiculo . " - Lic: ".$LicenciaConducir; ?> </td>
            </tr>

            <tr>
              <td class="font-w600">Experiencia en Vehiculo</td>
              <td><?php echo$Manejas;?> </td>
            </tr>

            <tr>
              <td class="font-w600">Discapacidad</td>
              <td><?php echo$Discapacitado;?> </td>
            </tr>

            <tr>
              <td class="font-w600">Situación actual</td>
              <td><?php echo$SituacionActual;?> </td>
            </tr>

            <tr>
              <td class="font-w600">Salario en busqueda de</td>
              <td>Minimo $<?php echo$SalarioMinimo;?> - Maximo $<?php echo$SalarioMaximo;?></td>
            </tr>

            <tr>
              <td class="font-w600">Portafolio</td>
              <td>
                <?php if ($Portafolio ==null) {
                  echo "No disponible";
                }else{
                  ?>
                  <a href="<?php echo$Portafolio;?>" target="_blank">Ir a la web</a>
                <?php } ?>
              </td>
            </tr>

          </tbody>
        </table>
        <!-- END Project Info -->
        <h3 class="mb-10 text-center">Documentos Personales</h3>
        <table class="table table-striped table-borderless mt-20">
          <tbody>
           <?php 
           if ($ResultDocumentos >=1) {
            $n=1;
            while ($item=$stmt9->fetch())
            {
             echo "<tr class='table-active'>
             <th class='text-center' scope='row'>".$n."</th>
             <td>".$item['Documento']."</td>
             <td><a href='../../documentos/documentos_usuarios/".$item['IDUsuario']."/".$item['Documento']."' target='_blank'>Ver comprobante</a></td>
             </td>
             </tr>";
             $n++;
           }
         }else
         {
          echo "<p class='mb-10 text-center'>Aun no hay documentos subido por el usuario</p>";
        }


        ?>
      </tbody>
    </table>

  </div>
  <div class="col-sm-6 nice-copy" style="font-family: 'Arial'; color: black;">
    <!-- Project Description -->
    <h3 class="mb-10">Acerca de mi</h3>
    <br>
    <?php echo $Descripcion; ?> 
    <br>



  </div>
</div>
</div>
<!-- END Project -->
</div>      

<!-- Blog and Sidebar -->
<div class="content">
  <div class="row items-push">
    <!-- Posts -->
    <div class="col-xl-8">
      <div class="mb-50" style="font-family: 'Arial'; color: black;">
        <div class="overflow-hidden rounded mb-20">
          <h1>Experiencia Laboral</h1>
          <hr>
        </div>

        <?php  

        while ($item=$stmt3->fetch())
        { 

         $MostrarLugar ="";
         $SitioWeb = "";
         if($confidencial == "Privado"){$MostrarLugar = "-";}else{ $MostrarLugar = $item['Lugar']; }
         if ($item['PaginaEmpresa'] =="") {
           $SitioWeb ="No hay sitio web";
         }else{
          $SitioWeb ="Página web";
        }

        echo '<h3 class="h4 font-w700 text-uppercase mb-5">'. $item['Cargo'].'</h3>
        <div class="text-muted mb-10">
        <span class="mr-15">
        <i class="fa fa-fw fa-calendar mr-5"></i>'.$item['FechaInicio'].' - '.$item['FechaFinal'].'
        </span>
        <a class="text-muted mr-15" href="javascript:void(0)">
        <i class="fa fa-fw fa-user mr-5"></i>Cargo desempeñado: '.$item['Desempeno'].'
        </a>
        <a class="text-muted" href="javascript:void(0)">
        <i class="fa fa-fw fa-tag mr-5"></i>Área de la empresa: '.$item['Area'].'
        </a>
        </div>

        <div class="text-muted mb-10">

        <a class="text-muted mr-15" href="javascript:void(0)">
        <i class="fa fa-fw fa-user mr-5"></i>Rango Salarial: '.$item['RangoSalarial'].'
        </a>
        <a class="text-muted" href="'.$item['PaginaEmpresa'].'">
        <i class="fa fa-fw fa-tag mr-5"></i>'.$SitioWeb.'
        </a>
        <span class="mr-15">
        <i class="fa fa-fw fa-calendar mr-5"></i>Empresa: '.$MostrarLugar.'
        </span>
        <span class="mr-15">
        <i class="fa fa-fw fa-calendar mr-5"></i>'.$item['Estado'].'
        </span>
        </div>
        '.$item['Descripcion'].'
        <br>
        ';
      }

      ?>
    </div>


    <div class="overflow-hidden rounded">
      <h1>Referencia</h1>
      <hr>
    </div>

    <div class="content">
      <div class="row">

        <?php 

        while ($item=$stmt8->fetch())
        {
          echo ' <div class="col-md-6 col-xl-4">
          <div class="block block-themed">
          <div class="block-content block-content-full bg-primary-darker text-center">
          <img class="img-avatar img-avatar-thumb" src="../../assets/img/user/avatar15.jpg" alt="">
          <div class="font-w600 text-white mt-10">'.$item['Encargado'].'</div>
          <div class="font-size-sm text-white-op">'.$item['Cargo'].'</div>
          <div class="font-size-sm text-white-op">'.$item['Empresa'].'</div>
          </div>
          <div class="block-content block-content-full">
          <div class="list-group">

          <a class="btn btn-rounded btn-alt-success" href="mailto:'.$item['Correo'].'">
          <i class="fa fa-envelope mr-5"></i>E-mail
          </a>

          <p style="text-align: center;">Teléfono:<br>'.$item['Telefono'].'</p>

          </div>
          </div>
          </div>
          </div>';

        }

        ?>








      </div>
    </div>



    <hr class="d-xl-none">
  </div>
  <!-- END Posts -->

  <!-- Sidebar -->
  <div class="col-xl-4">
    <!-- Twitter Feed -->
    <div class="block block-transparent">
      <div class="block-header">
        <h3 class="block-title text-uppercase">Educación</h3>
      </div>
      <div class="block-content">

        <?php 

        while ($item=$stmt4->fetch())
        {
         $Estudios;
         if($item['Especialidad'] ==""){
          $Estudios = $item['Carrera'];
        }else{
          $Estudios = $item['Especialidad'];
        }

        echo '<div class="media">
        <div class="media-body" style="font-family: "Arial";">
        <p style="color: black;">Centro Educativo / Universidad:<br><b>'.$item['CentroEduacativo'].'</b><br> Especialidad / Carrera Universitaria:<br><b>'.$Estudios.' </b> 
        <br>Estado: <b>'.$item['NivelEstudio'].'</b>
        <br>Pais:<b>'.$item['Pais'].'</b>
        <br>Fecha estudios:<b>'.$item['FechaInicio'].' - '.$item['FechaFinal'].'</b>
        </p>
        </div>
        </div>';
      }


      ?>

      <div class="media">
        <div class="media-body">
          <h6>Educación secundaria: <b><?php echo$Educacion; ?> </b></h6>
        </div>
      </div> 

      <div class="block-header">
        <h3 class="block-title text-uppercase">Idiomas</h3>
      </div>

      <div class="media mb-20">
        <div class="media-body">
          <ul class="nav nav-pills flex-column push">

            <?php 

            while ($item=$stmt5->fetch())
            {
              echo '
              <li class="nav-item">
              <a class="nav-link d-flex align-items-center justify-content-between" href="javascript:void(0)">
              <span><i class="fa fa-language fa-magic mr-5"></i>'.$item['Idioma'].'</span>
              <span class="badge badge-pill badge-danger">'.$item['Nivel'].'</span>
              </a>
              </li>
              ';
            }

            ?>


          </ul>
        </div>
      </div>  

      <div class="block-header">
        <h3 class="block-title text-uppercase">Habilidades Personales</h3>
      </div>

      <div class="media">
        <div class="media-body">
          <ul class="nav nav-pills flex-column push">

            <?php 

            while ($item=$stmt6->fetch())
            {
              echo '
              <li class="nav-item">
              <a class="nav-link d-flex align-items-center justify-content-between" href="javascript:void(0)">
              <span><i class="fa fa-fw fa-pencil mr-5"></i>'.$item['Habilidad'].'</span>
              <span class="badge badge-pill badge-primary">'.$item['Nivel'].'</span>
              </a>
              </li>
              ';
            }

            ?>
          </ul>
        </div>
      </div> 

      <div class="block-header">
        <h3 class="block-title text-uppercase">Habilidades Técnica</h3>
      </div>

      <div class="media mb-20">
        <div class="media-body">
          <ul class="nav nav-pills flex-column push">

            <?php 

            while ($item=$stmt7->fetch())
            {
              echo '
              <li class="nav-item">
              <a class="nav-link d-flex align-items-center justify-content-between" href="javascript:void(0)">
              <span><i class="fa fa-fw fa-pencil mr-5"></i>'.$item['Tecnica'].'</span>
              <span class="badge badge-pill badge-success">'.$item['Nivel'].'</span>
              </a>
              </li>
              ';
            }

            ?>


          </ul>
        </div>
      </div> 

    </div>
  </div>
  <!-- END Twitter Feed -->
</div>
<!-- END Sidebar -->
</div>
</div>
<!-- END Blog and Sidebar -->

</div>
</main>



<?php include_once 'templates/footer.php';
include_once 'templates/script.php';
?>



<script>

 $('.float5').on('click', function() {

   $.ajax({
    url: 'cv-email.php' ,
    type: 'get' ,
    data: {usuario:"<?php echo $_GET['id'] ?>"},
    beforeSend: function() {

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

    }
  })
   .fail(function(request, errorType, errorMessage){
    swal({title:'alerta',text:'Intente de nuevo para procesar el envio',type:'error'});
    console.log(errorType);
    alert(errorMessage);
  })
   .always(function(){
    swal({title:'éxito',text:'Se ha enviado el documento en tu correo registrado por la platafoma',type:'success'});
    $("#resultcvemail").html('');
  })


 });


</script>


<script>

 $('#enviarEmail').on('click', function() {

  var emailEnviar =$('#emailusuario').val();
  

  $.ajax({
    url: 'cv-email-destino.php' ,
    type: 'get' ,
    data: {usuario:"<?php echo $_GET['id'] ?>",emailEnviar:emailEnviar},
    beforeSend: function() {

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

    }
  })
  .fail(function(request, errorType, errorMessage){
    swal({title:'alerta',text:'Intente de nuevo para procesar el envio',type:'error'});
    console.log(errorType);
    alert(errorMessage);
  })
  .always(function(){
    swal({title:'éxito',text:'Se ha enviado el documento al usuario',type:'success'});
    $("#resultcvemail").html('');
    $('#emailusuario').val("");
  })


});


</script>


<script>

 $('.float').on('click', function() {

  swal({title:'Cargando...',text:'Generando el documento  PDF. Por favor espere.',type:'success'  ,   button: false, showConfirmButton: false , timer: 6000});


});
</script>


<script>

 $('#clicEnviarEmail').on('click', function() {

  $("#modal-terms1").modal("show");


});
</script>


<script>

 $('#clicSeguimiento').on('click', function() {

  $("#modal-terms3").modal("show");


});
</script>



<script>

  $('.float4').on('click', function() {

   $.ajax({
    url: 'Modelos/notificaciones/NotificarActualizacionCV.php',
    type: 'POST' ,
    dataType: 'html',
    data: {IDSolicitud:"<?php echo $IDUser; ?>",candidato:"<?php echo $id; ?>",email:"<?php echo $Email; ?>"},

    beforeSend: function() {

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

    }

  })
   .done(function(response){
    var result = response;

    if (result == 1){

     swal({title:'Se ha notificado al usuario',text:'El usuario te notificará cuando actualice el perfil.',type:'success'});


   }else{
    swal({title:'alerta',text:'Intente de nuevo para procesar el envio',type:'error'});

  } 

})
   .fail(function(request, errorType, errorMessage){
      //timeout, error, abort, parseerror
      swal({title:'alerta',text:'Intente de nuevo para procesar el envio',type:'error'});
      console.log(errorType);
      alert(errorMessage);

    })
   .always(function(){
    $("#resultcvemail").html('');

  })


 });

</script>
