<?php
include_once '../../BD/Conexion.php';
include_once '../../BD/Consultas.php';
include_once 'templates/head.php';
$Conexion = new Consultas();
include_once 'templates/validar-perfil.php';

$sql ="SELECT `Nombre` , `Apellidos` , `Correo` , `Foto` , UltimaConexion FROM `usuarios_cuentas` WHERE `IDUsuario` = ? ";
$stmt = $Conexion->ejecutar_consulta_simple_Where($sql , $IDUser);

while ($item=$stmt->fetch())
{
 $Nombres = $item['Nombre'];
 $Apellidos = $item['Apellidos'];
 $Email = $item['Correo'];
 $Foto =  $item['Foto'];  
 $UltimaConexion = $item['UltimaConexion'];

}

$sql2 ="SELECT P.IDPais ,P.Nombre AS'Pais' , PD.IDDepartamento , PD.Nombre AS 'Departamento' , `EducacionSecundaria` , `Descripcion` , `LicenciaConducir` , `Vehiculo` , `ManejoVehiculo` ,`CorreoAlternativo` , `Telefono` , `Celular` , `Discapacidad` , `TipoDiscapacidad` , `ExperienciaLaboral` , TE.IDAreaExperiencia , TE.Nombre AS 'Experiencia' , `Portafolio` , `Disponiblidad` , `SituacionActual` , `FechaNaciento` , `edad` ,`SalarioMinimo` , `SalarioMaximo` , `confidencial` , `identificacion` ,`numidentificacion` ,`urlvideo` FROM usuario_perfil UP INNER JOIN soporte_paises P ON UP.IDPais = P.IDPais LEFT JOIN soporte_paises_departamento PD ON UP.IDDepartamento = PD.IDDepartamento LEFT JOIN soporte_tipo_experiencia TE ON UP.IDAreaExperiencia = TE.IDAreaExperiencia WHERE UP.IDUsuario = ?";
$stmt2 = $Conexion->ejecutar_consulta_simple_Where($sql2 , $IDUser);
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

    $SalarioMinimo = $item['SalarioMinimo']; //Ya
    $SalarioMaximo = $item['SalarioMaximo']; //Ya
    $confidencial = $item['confidencial'];
    $identificacion = $item['identificacion'];
    $numidentificacion = $item['numidentificacion'];
    $urlVideo =$item['urlvideo'];

  }

  $sql3 = "SELECT Cargo , TA.IDCategoria , TA.Nombre AS 'Categoria' ,TE.IDTipoEmpresa ,TE.Area , CD.IDDesempenado , CD.nombre AS 'Desempeno' , Lugar , Descripcion ,RangoSalarial , FechaInicio , FechaFinal , PaginaEmpresa ,Estado FROM usuario_experiencia UE INNER JOIN soporte_areas_trabajos TA ON UE.IDCategoria = TA.IDCategoria LEFT JOIN soporte_cargos_desempenado CD ON UE.IDDesempenado = CD.IDDesempenado LEFT JOIN soporte_tipo_empresa TE ON UE.IDTipoEmpresa = TE.IDTipoEmpresa WHERE `IDUsuario` = ?";

  $stmt3 = $Conexion->ejecutar_consulta_simple_Where($sql3 , $IDUser);

  $sql4 = "SELECT CentroEduacativo , Especialidad ,C.Id_Carrera , C.nombre AS 'Carrera'  , NivelEstudio , FechaInicio ,FechaFinal , P.IDPais , P.Nombre AS 'Pais' FROM usuario_educacion UE INNER JOIN carrera C ON UE.Id_Carrera = C.Id_Carrera LEFT JOIN soporte_paises P ON UE.IDPais = P.IDPais WHERE `IDUsuario` = ? ";

  $stmt4 = $Conexion->ejecutar_consulta_simple_Where($sql4 , $IDUser);

  $sql5 = "SELECT Idioma , Nivel FROM `usuarios_idiomas` WHERE IDUsuario = ?";
  $stmt5 = $Conexion->ejecutar_consulta_simple_Where($sql5 , $IDUser);

  $sql6 ="SELECT  AH.Nombre 'Habilidad' , Nivel FROM usuarios_habilidades UH INNER JOIN soporte_areas_habilidades AH ON UH.IDHabilidades = AH.IDHabilidades WHERE IDUsuario = ?";
  $stmt6 = $Conexion->ejecutar_consulta_simple_Where($sql6 , $IDUser);

  $sql7 ="SELECT  AE.Nombre 'Tecnica' , Nivel FROM usuarios_conocimentos UC INNER JOIN soporte_areas_experiencia AE ON UC.IDTipo = AE.IDTipo WHERE IDUsuario = ?";

  $stmt7 = $Conexion->ejecutar_consulta_simple_Where($sql7 , $IDUser);

  $sql8 ="SELECT * FROM `usuario_referencia` WHERE `IDUsuario` = ?";
  $stmt8 = $Conexion->ejecutar_consulta_simple_Where($sql8 , $IDUser);

  $sql9 ="SELECT * FROM `usuarios_documentos`  WHERE `IDUsuario` = ?";
  $stmt9 = $Conexion->ejecutar_consulta_simple_Where($sql9 , $IDUser);

  $ResultDocumentos = $Conexion->ejecutar_consulta_conteo("usuarios_documentos","IDUsuario",$IDUser);

  ?>
  <title>Candidato | curriculum vitae</title>
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
    bottom:80px;
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
    margin-top:14px;
  }




  .float3{
    position:fixed;
    width:50px;
    height:50px;
    bottom: 150px;
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
    margin-top:14px;
  }

  .float4{
    position:fixed;
    width:60px;
    height:60px;
    bottom: 315px;
    right: 25px;
    background-color:#3f9ce8;
    color:#FFF;
    border-radius:50px;
    text-align:center;
    font-size:30px;
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

  .float5{
    position:fixed;
    width:60px;
    height:60px;
    bottom: 385px;
    right: 25px;
    background-color:#ef5350;
    color:#FFF;
    border-radius:50px;
    text-align:center;
    font-size:30px;
    box-shadow: 2px 2px 3px #999;
    z-index:100;
  }
  .float5:hover {
    text-decoration: none;
    color: #25d366;
    background-color:#fff;
  }

  .my-float5{
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


  <a href="cv-pdf.php" class="float"  data-toggle="tooltip" title="Descargar curriculum vitae por pdf" data-original-title="Descargar curriculum vitae por pdf">
    <i class="fa fa-file-pdf-o my-float"></i>
  </a>



  <div href="#" class="float3" data-toggle="tooltip" title="Enviar tu curriculum vitae a mi correo" data-original-title="Enviar tu curriculum vitae a mi correo">
    <i class="fa fa-envelope-o my-float5"></i>
  </div>


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
       <!-- END Actions -->
     </div>
   </div>
 </div>
 <!-- END User Info -->



 <div style="margin-right:2%; margin-left:2%;">
   <div class="row gutters-tiny invisible" data-toggle="appear" data-class="animated bounceInLeft" >

    <!-- Project -->
    <div class="block-content block-content-full">
       <a href="./" class="btn btn-rounded btn-noborder btn-alt-primary mr-5 mb-5"> <i class="si si-action-undo fa-2x5"> </i> Ir al panel</a>
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
                <td><?php echo$edad ." Años"; ?></td>
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
                <td class="font-w600">Teléfonos</td>
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


        </div>
        <div class="col-sm-6 nice-copy" style="font-family: 'Arial'; color: black;">
          <!-- Project Description -->
          <h3 class="mb-10">Acerca de mi</h3>

          <br>
          <?php echo $Descripcion; ?> 
          <br>


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

 $('.float3').on('click', function() {

   $.ajax({
    url: 'cv-email.php' ,
    type: 'POST' ,
    dataType: 'html',
    beforeSend: function() {

      swal({
        title: "Cargando...",
        text: "Procesando el envio del documento. Por favor espere.",
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
    swal({title:'documento enviado',text:'Se ha enviado el documentoa a tu correo electrónico, registrado por la platafoma',type:'success'});
  })


 });


</script>


<script>

 $('.float').on('click', function() {


  swal({title:'Cargando...',text:'Generando el documento  PDF. Por favor espere.',type:'success'  ,   button: false, showConfirmButton: false , timer: 6000});

});
</script>

