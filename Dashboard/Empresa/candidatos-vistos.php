<?php
include_once '../../BD/Conexion.php';
include_once '../../BD/Consultas.php';
include_once '../../main/funcionesApp.php';
include_once 'templates/head.php';
$Conexion = new Consultas();
$FuncionesApp = new funcionesApp();
include_once 'templates/seguridadCpanel.php';
?>
<title>Empresa | Candidatos vistos</title>

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

  background: url('../assets/media/photos/busqueda-candidato.jpg');
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
        <h3 class="font-size-h2 font-w300 mt-20"  data-toggle="appear" data-class="animated flipInY" id="titulos" style="color: white;">Candidatos Vistos </h3>
      </div>
    </div>
  </div>
</div>


<div class="bg-body-light border-b">
  <div class="content py-5 text-center">
    <nav class="breadcrumb bg-body-light mb-0">
      <a class="breadcrumb-item" href="candidatos">candidatos</a>
      <span class="breadcrumb-item active">Perfiles vistos</span>
    </nav>
  </div>
</div>

<div class="content py-5 text-center">

  <br>
  <a href="candidatos" class="btn  btn-rounded btn-noborder btn-alt-primary mr-5 mb-5"> <i class="si si-action-undo fa-2x5"> </i> Retroceder</a>

  
  
  <br><br>
  <p>Indicaciones:  A continuación se muestran los perfiles vistos durente todo este tiempo, desde la más reciente a la más antigua</p>



</div>








<div class="block" >
  <div class="block-content block-content-full"><br>

    <?php 

    $sql = "SELECT DISTINCT
    UP.IDUsuario,
    C.Foto,
    C.Nombre,
    C.Apellidos,
    UP.edad,
    UP.genero,
    UP.ExperienciaLaboral,
    TE.Nombre AS 'anosExperiencia',
    UP.UltimaActualizacion,
    UP.SalarioMinimo,
    UP.SalarioMaximo,
    P.Nombre AS 'Pais',
    PD.Nombre AS 'Departamento',
    `fecha_registro`,
    confidencial
    FROM
    guardar_candidatos_empresas CE
    LEFT JOIN usuario_perfil UP ON
    CE.IDUsuario = UP.IDUsuario
    LEFT JOIN soporte_paises P ON
    UP.IDPais = P.IDPais
    LEFT JOIN soporte_paises_departamento PD ON
    UP.IDDepartamento = PD.IDDepartamento
    LEFT JOIN usuarios_cuentas C ON
    UP.IDUsuario = C.IDUsuario
    LEFT JOIN soporte_tipo_experiencia TE ON
    UP.`IDAreaExperiencia` = TE.IDAreaExperiencia
    WHERE
    C.Cargo = 'Candidato' AND C.Estado = 'Activo' AND `IDEmpresa` = ?";

    $stmt =  Conexion::conectar()->prepare($sql);

    if (!$stmt->execute(array($IDEmpresa))) {
      die("El error de Conexión es ejecutar_consulta_simple");
    }

    if ($stmt->rowCount()>0){



      $salida.='<table class="table table-striped table-bordered  js-dataTable-full-pagination table-responsive">
      <thead>
      <tr  class="text-center">
      <th></th>
      <th>Nombres</th>
      <th>edad</th>
      <th></th>
      <th>Pais / Departamento</th>
      <th>Salario</th>
      <th>Años Experiencias</th>
      <th>última Experiencia</th>
      <th>N° Experiencia</th>
      <th>Último Estudio</th>
      <th>N° Estudios</th>
      <th>Fecha Registrada</th>
      <th>Opciones</th>
      </tr>
      </thead>

      <tfoot>
      <tr  class="text-center">
      <th></th>
      <th>Nombres</th>
      <th>edad</th>
      <th></th>
      <th>Pais / Departamento</th>
      <th>Salario</th>
      <th>Años Experiencias</th>
      <th>última Experiencia</th>
      <th>N° Experiencia</th>
      <th>Último Estudio</th>
      <th>N° Estudios</th>
      <th>Fecha Registrada</th>
      <th>Opciones</th>
      </tr>
      </tfoot>

      <tbody  class="text-center">';




      while ($item=$stmt->fetch())
      {
        $sql2 = "SELECT `Cargo` FROM `usuario_experiencia` WHERE `IDUsuario` = ? AND  `FechaFinal` = ( SELECT MAX(`FechaFinal`) FROM usuario_experiencia WHERE `IDUsuario` = ?) LIMIT 0,1";
        $stmt2 =  Conexion::conectar()->prepare($sql2);
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

        $resultPerfilGuardado = $Conexion->ejecutar_consulta_conteo("guardar_candidatos_empresas" , "IDUsuario" , $item['IDUsuario']);

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
        <td>'.$item['anosExperiencia'].'</td>
        <td>'.$item2['Cargo'].'</td>
        <td>'.$item3['TotalExperiencia'].'</td>
        <td>'.$item4['NivelEstudio'].'</td>
        <td>'.$item5['TotalEstudios'].'</td>
        <td>'.$item['fecha_registro'].'</td>
        <td>
        <div class="btn-group">

        <a href="cv?id='.base64_encode($item['IDUsuario']).'" class="btn btn-secondary text-center" data-toggle="tooltip" title="Ver Perfil del candidato" data-original-title="Ver Perfil del candidato"  target="_blank"> <i class="si si-user"></i></a>

        </div>
        </td>


        </tr>';


      }



      $salida.="</tbody></table>";



    }else{

      $salida = "No hay datos";
    }

    echo $salida;

    ?>


  </div>
</div>




</main>



<?php include_once 'templates/footer.php';
include_once 'templates/script.php';
include_once '../../templates/alertas.php';
?>

