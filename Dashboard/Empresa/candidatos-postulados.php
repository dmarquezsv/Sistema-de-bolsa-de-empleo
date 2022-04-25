<?php
include_once '../../BD/Conexion.php';
include_once '../../BD/Consultas.php';
include_once '../../main/funcionesApp.php';
include_once 'templates/head.php';
$Conexion = new Consultas();
$FuncionesApp = new funcionesApp();
include_once 'templates/seguridadCpanel.php';
?>
<title>Candidos postulados | Mundo empleo</title>
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
<?php 
include_once 'templates/styles.php';
include_once 'templates/MenuRight.php';
include_once 'templates/MenuLeft.php';
include_once 'templates/header.php';
?>



<main id="main-container">

	
  <div class="bg-image bg-image-bottom" id="imgbanner" >
    <div>
      <div class="content content-top text-center overflow-hidden">
        <div class="pt-40 pb-20">
          <h3 class="font-size-h2 font-w300 mt-20"  data-toggle="appear" data-class="animated flipInY" id="titulos" style="color: white;"><?php echo base64_decode($_GET['publicacion']); ?></h3>
        </div>
      </div>
    </div>
  </div>



  <div class="bg-body-light border-b">
    <div class="content py-5 text-center">
      <nav class="breadcrumb bg-body-light mb-0">
        <a class="breadcrumb-item" href="ofertas-empleos.php">Plaza</a>
        <span class="breadcrumb-item active"><?php echo base64_decode($_GET['publicacion']); ?></span>
      </nav>
    </div>
  </div>

  <br>



  <div class="container">
    <p style=" color: black; font-family: sans-serif;" class="text-center">A continuación se muestran los candidatos aplicado a la oferta de trabajo. Desde la más reciente a la más antigua.   
    </div>
  </p>

  <div class="block" >
    <div class="block-content block-content-full"><br>
      <div class="contenidos">
       <?php  


       $sql11 = "SELECT DISTINCT
       UP.IDUsuario,
       C.Foto,
       C.Nombre,
       C.Apellidos,
       UP.confidencial,
       UP.edad,
       UP.genero,
       UP.ExperienciaLaboral,
       TE.Nombre AS 'anosExperiencia',
       UP.UltimaActualizacion,
       UP.SalarioMinimo,
       UP.SalarioMaximo,
       P.Nombre AS 'Pais' ,
       PD.Nombre  AS 'Departamento',
       `FechaInscrita`
       FROM usuario_postulaciones Pos
       INNER JOIN usuario_perfil UP ON
       Pos.`IDUsuario` = UP.IDUsuario LEFT JOIN
       soporte_paises P ON
       UP.IDPais = P.IDPais
       LEFT JOIN soporte_paises_departamento PD ON
       UP.IDDepartamento = PD.IDDepartamento
       LEFT JOIN usuarios_cuentas C ON
       UP.IDUsuario = C.IDUsuario
       LEFT JOIN soporte_tipo_experiencia TE ON
       UP.`IDAreaExperiencia` = TE.IDAreaExperiencia
       WHERE `IDpostulaciones` = ?";

       $stmt =  Conexion::conectar()->prepare($sql11);

       if (!$stmt->execute(array(base64_decode($_GET['id'])))) {
        die("El error de Conexión es ejecutar_consulta_simple");
      }

      if ($stmt->rowCount()>0){


        $sql="SELECT OT.IDpostulaciones ,EP.IDEmpresa , EP.lugar ,EP.Nombre AS 'NombreEMPRESA' , EP.logo ,EP.paginaweb , TE.Area ,EP.Confidencial ,P.IDPais , P.Nombre AS 'Pais' , PD.IDDepartamento,PD.Nombre 'Departamento' , T.Nombre AS 'Categoria' ,CD.IDDesempenado ,CD.nombre AS 'Desempeno' , `Plaza` , OT.Descripcion , `Vacante` , `TipoContratacion` , `Genero` , `EdadMenor` , `EdadMayor` , `SalarioMinimo` , `SalarioMaximo`, `Vihiculo` , `TipoVehiculo` , `Experiencia` ,Exp.IDAreaExperiencia ,Exp.Nombre AS 'NivelExperiencia' , `FechaPublicacion` , OT.Expira , OT.Estado FROM empresa_ofertas_trabajos OT INNER JOIN empresa_perfil EP ON OT.IDEmpresa = EP.IDEmpresa LEFT JOIN soporte_tipo_empresa TE ON EP.IDTipoEmpresa = TE.IDTipoEmpresa LEFT JOIN soporte_paises P ON OT.IDPais = P.IDPais LEFT JOIN soporte_paises_departamento PD ON OT.IDDepartamento = PD.IDDepartamento LEFT JOIN soporte_areas_trabajos T ON OT.IDCategoria = T.IDCategoria LEFT JOIN soporte_cargos_desempenado CD ON OT.IDDesempenado = CD.IDDesempenado LEFT JOIN soporte_tipo_experiencia Exp ON OT.IDAreaExperiencia = Exp.IDAreaExperiencia  WHERE OT.IDpostulaciones = ?";

        $stmt6 = $Conexion->ejecutar_consulta_simple_Where($sql ,base64_decode($_GET['id']));

        while ($item=$stmt6->fetch())
        {

         $IDEmpresa = $item['IDEmpresa'];
           $NombreEmpresa = $item['NombreEMPRESA'];//Ya
           $Logo = $item['logo']; // Ya
           $paginaweb = $item['paginaweb']; //Ya
           $AreaEmpresa = $item['Area']; // Ya
           $Confidencial = $item['Confidencial'];
           $Pais = $item['Pais']; // Ya
           $Departamento = $item['Departamento']; // Ya
           $Categoria = $item['Categoria'];
           $Cargo = $item['Desempeno']; //Ya
           $Plaza = $item['Plaza']; // Ya
           $Descripcion = $item['Descripcion'];
           $Vacante = $item['Vacante'];
           $TipoVehiculo = $item['TipoVehiculo']; // Ya
           
           $NivelExperiencia = $item['NivelExperiencia']; //Ya
           $FechaPublicacion = $item['FechaPublicacion']; // Ya
           $Expira = $item['Expira']; // Ya
           $Estado = $item['Estado']; 
           
           $Lugar = $item['lugar']; // Ya

           $IDPaisOferta = $item['IDPais'];
           $IDDepartamentoOferta = $item['IDDepartamento'];
           $Genero = $item['Genero']; // Ya
           
           $EdadMenor = $item['EdadMenor']; // Ya
           $EdadMayor = $item['EdadMayor']; //Ya
           $Vehiculo = $item['Vihiculo']; // Ya
           $Experiencia = $item['Experiencia']; //Ya
           $IDExperienciaRequeridad = $item['IDAreaExperiencia'];//Ya
           $TipoContrato = $item['TipoContratacion']; // Ya
           $SalarioMinimo = $item['SalarioMinimo']; // Ya
           $SalarioMaximo = $item['SalarioMaximo']; // Ya
           $IDCargo = $item['IDDesempenado'];

         }


         $salida.='<table class="table table-striped table-bordered  js-dataTable-full-pagination table-responsive">
         <thead>
         <tr class="text-center">
         <th></th>
         <th>Nombre</th>
         <th>edad</th>
         <th></th>
         <th>Pais / Departamento</th>
         <th>Salario</th>
         <th>Experiencia</th>
         <th>Años Experiencias</th>
         <th>última Experiencia</th>
         <th>N° Experiencia</th>
         <th>Último Estudio</th>
         <th>N° Estudios</th>
         <th>%</th>
         <th>Inscrito</th>
         <th>Opciones</th>
         </tr>
         </thead>
         <tbody class="text-center">';




         while ($item=$stmt->fetch())
         {
          $sql6 = "SELECT `Cargo` FROM `usuario_experiencia` WHERE `IDUsuario` = ? AND  `FechaFinal` = ( SELECT MAX(`FechaFinal`) FROM usuario_experiencia WHERE `IDUsuario` = ?) LIMIT 0,1";
          $stmt2 =  Conexion::conectar()->prepare($sql6);
          $stmt2->execute(array($item['IDUsuario'],$item['IDUsuario']));
          $item2=$stmt2->fetch();

          $sql3 = "SELECT COUNT(`IDExperiencia`)AS 'TotalExperiencia' FROM usuario_experiencia WHERE IDUsuario = ?";
          $stmt3 =  Conexion::conectar()->prepare($sql3);
          $stmt3->execute(array($item['IDUsuario']));
          $item3=$stmt3->fetch();

          $sql4 = "SELECT `NivelEstudio` FROM `usuario_educacion` WHERE `IDUsuario` = ? AND `FechaFinal` = ( SELECT MAX(`FechaFinal`) FROM usuario_educacion WHERE `IDUsuario` = ?) LIMIT 0,1 ";    
          $stmt4 =  Conexion::conectar()->prepare($sql4);
          $stmt4->execute(array($item['IDUsuario'] , $item['IDUsuario']));
          $item4=$stmt4->fetch();

          $sql5 = "SELECT COUNT(`IDEducacion`) AS 'TotalEstudios' FROM usuario_educacion WHERE `IDUsuario` = ? ";   
          $stmt5 =  Conexion::conectar()->prepare($sql5);
          $stmt5->execute(array($item['IDUsuario']));
          $item5=$stmt5->fetch();

          $sql2 = "SELECT `genero`,`IDPais` , `IDDepartamento` , `Vehiculo` , `ExperienciaLaboral` , TE.`IDAreaExperiencia`, `Disponiblidad` , `edad` , `SalarioMinimo` , `SalarioMaximo` FROM usuario_perfil UP LEFT JOIN soporte_tipo_experiencia TE ON TE.IDAreaExperiencia = UP.IDAreaExperiencia WHERE `IDUsuario` = ? ";

          $stmt7 = $Conexion->ejecutar_consulta_simple_Where($sql2 ,$item['IDUsuario']);
          $item7=$stmt7->fetch();

         $VehiculoUser = $item7['Vehiculo']; //Ya
         $experienciaLaboralUser = $item7['ExperienciaLaboral'];//Ya
         $edaduser = $item7['edad']; // Ya
         $timeExperienciaLaboral = $item7['IDAreaExperiencia']; // Ya
         $DisponiblidadUser = $item7['Disponiblidad']; // Ya
         $salarioMinimoUser = $item7['SalarioMinimo']; 
         $salarioMaximoUser = $item7['SalarioMaximo']; 
         $generoUser = $item7['genero'];
         $IDPais = $item7['IDPais'];
         $IDDepartamento = $item7['IDDepartamento'];


         $sql8 ="SELECT `IDDesempenado` AS 'ResultCargo'  FROM `usuario_experiencia` WHERE `IDUsuario` = ? AND `IDDesempenado` = ? LIMIT 0,1";
         $stmt8 =  Conexion::conectar()->prepare($sql8);
         $stmt8->execute(array($item['IDUsuario'] , $IDCargo));
         $item8=$stmt8->fetch();
         
         $resultCargoUser = $item8['ResultCargo'];

         $Porcentaje = 0;

         if ($Vehiculo == "Requerido") {

           if ($VehiculoUser == "Si") {
             $Porcentaje = 10 +$Porcentaje;
           }

         }else if($Vehiculo == "No Requerido"){

          $Porcentaje = 10 +$Porcentaje;
        }

        if ($experienciaLaboralUser == $Experiencia) {
         $Porcentaje = 20 +$Porcentaje;
       }else if($Experiencia == "No")
       {
         $Porcentaje = 20 +$Porcentaje;
       }



       if ($EdadMenor <=$edaduser && $EdadMayor >=$edaduser) {
         $Porcentaje = 10 +$Porcentaje;
       }


       if ($timeExperienciaLaboral == $IDExperienciaRequeridad) {
         $Porcentaje = 15 +$Porcentaje;
       }

       if ($DisponiblidadUser == $TipoContrato) {

         $Porcentaje = 20 +$Porcentaje;    
       }

       if ($resultCargoUser == $IDCargo) {

         $Porcentaje = 15 +$Porcentaje;    
       }


       if ($salarioMinimoUser  <= $SalarioMinimo) {
         $Porcentaje = 5 +$Porcentaje;
       }

       if ($SalarioMaximo >=$salarioMaximoUser) {
         $Porcentaje = 5 +$Porcentaje;
       }


       $sql9="SELECT COUNT(`IDCandidatos`) as 'existeRegistro' FROM `guardar_candidatos_empresas` WHERE `IDUsuario` = ? AND `IDEmpresa` = ?";
       $stmt9 =  Conexion::conectar()->prepare($sql9);
       $stmt9->execute(array($item['IDUsuario'], $IDEmpresa));
       $item9=$stmt9->fetch();
       $resultPerfilGuardado = $item9['existeRegistro'];

       $confidencial = $item['confidencial'];

       $nombre="";
       if ($resultPerfilGuardado == 0) {
        if ($confidencial == "Privado"){
          $nombre = "N/D";
        }else{
          $nombre = $item['Nombre']." ".$item['Apellidos'];
        }
      }else{

        if ($confidencial == "Privado"){
          $nombre ='<p style="color: #3eb318">N/D</p>';  
        }else{
          $nombre ='<p style="color: #3eb318">'.$item['Nombre'].' '.$item['Apellidos'] .'</p>';  
        }
      }






      $salida.='<tr>
      <td><img class="img-avatar img-avatar-thumb" style="width: 80px; height: 80px;" src="../../assets/img/user/'.$item['Foto'].'" alt="userfoto"></td>
      <td>'.$nombre.'</td>
      <td>'.$item['edad'].'</td>
      <td>'.$item['genero'].'</td>
      <td>'.$item['Pais']." ".$item['Departamento'].'</td>
      <td>$'.$item['SalarioMinimo'].' / $'.$item['SalarioMaximo'].'</td>
      <td>'.$item['ExperienciaLaboral'].'</td>
      <td>'.$item['anosExperiencia'].'</td>
      <td>'.$item2['Cargo'].'</td>
      <td>'.$item3['TotalExperiencia'].'</td>
      <td>'.$item4['NivelEstudio'].'</td>
      <td>'.$item5['TotalEstudios'].'</td>
      <td><b>'.$Porcentaje.'%</b></td>
      <td>'.$item['FechaInscrita'].'</td>
      <td>
      <a href="cv?id='.base64_encode($item['IDUsuario']).'"  class="btn btn-secondary text-center boton" data-toggle="tooltip" title="Ver Perfil del candidato" data-original-title="Ver Perfil del candidato"  target="_blank"> <i class="si si-user"></i></a>
      </td>


      </tr>';


    }



    $salida.="</tbody></table>";



  }else{

    $salida = '<div class="alert alert-primary text-center" role="alert">
    No hay ningún candidato postulado
    </div>';
  }

  echo $salida;

  ?>
</div>

</div>
</div>


</main>



<?php include_once 'templates/footer.php';
include_once 'templates/script.php';
include_once '../../templates/alertas.php';
?>

<script type="text/javascript">

  $(".contenidos").on("click",".boton",function(){


    var valores = "";
        // Obtenemos todos los valores contenidos en los <td> de la fila
        // seleccionada
        $(this).parents("tr").find("td:eq(1)").each(function() {
          valores += $(this).html() + "\n";

          $('td:eq(1)').css('color', '#18ba5a' );

        });
        

      });

    </script>