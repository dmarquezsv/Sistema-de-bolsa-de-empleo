<?php  

include '../../../../BD/Conexion.php';
include_once '../../../../BD/Consultas.php';
$Conexion = new Consultas();
include_once '../../../../main/funcionesApp.php';
$FuncionesApp = new funcionesApp();

session_start();
$IDUser  = $_SESSION['iduser'];

$sqlEspecial="SELECT IDEmpresa  , IDPais FROM `empresa_perfil` WHERE `IDUsuario` = ?";
$stmtEspecial = $Conexion->ejecutar_consulta_simple_Where($sqlEspecial ,$IDUser);
while ($item=$stmtEspecial->fetch())
{ 
  $IDEmpresa = $item['IDEmpresa'];
  $IDPaisUbicadoEmpresa = $item['IDPais'];

}



if ($_POST['buscar'] == "buscar") {

  $concatenarConsulta="";




  if ($_POST['IDPAIS']!=null ) {
    $concatenarConsulta.=" AND P.IDPais =".$_POST['IDPAIS'];
  }else{
    $concatenarConsulta.=" AND P.IDPais =".$IDPaisUbicadoEmpresa;
  }


  if ($_POST['IDDepartamento']!=null ) {

    if($_POST['IDDepartamento'] == "Indiferente"){

      $concatenarConsulta.="";

    }else{

      $concatenarConsulta.=" AND PD.IDDepartamento=".$_POST['IDDepartamento'];   
    } 


  }


  if ($_POST['educacionSecundaria']!=null ) {


    if ($_POST['educacionSecundaria'] == "Indiferente") {

      $concatenarConsulta.=" AND (EducacionSecundaria = 'Completa' OR  EducacionSecundaria = 'Incompleta')";
    }else{

      $educacion = $_POST['educacionSecundaria'];

      $concatenarConsulta.=" AND EducacionSecundaria='". $educacion."'";

    }


  }


  if ($_POST['genero']!=null ) {

    if ($_POST['genero'] == "Indiferente") {
     $concatenarConsulta.=" AND (UP.genero = 'M' OR  UP.genero = 'F')";
   }else{

    $genero = $_POST['genero'];
    $concatenarConsulta.=" AND UP.genero='". $genero."'";
  }


}



if ($_POST['licenciaConducir']!=null ) {

 if($_POST['licenciaConducir'] == "Indiferente"){

  $concatenarConsulta.="";

}else{
  $licencia = $_POST['licenciaConducir'];
  $concatenarConsulta.=" AND LicenciaConducir='". $licencia."'";

}

}


if ($_POST['vehiculo']!=null ) {

  if($_POST['vehiculo'] == "Indiferente"){

    $concatenarConsulta.="";

  }else{

    $vehiculo = $_POST['vehiculo'];
    $concatenarConsulta.=" AND Vehiculo='". $vehiculo."'";

  }

}



if ($_POST['tipoVehiculo']!=null ) {

  if ($_POST['tipoVehiculo'] == "Indiferente") {
   $concatenarConsulta.=" AND (ManejoVehiculo = 'automóviles' OR  ManejoVehiculo = 'motocicletas' OR  ManejoVehiculo = 'automóviles y Motocicleta' OR  ManejoVehiculo = 'vehículos para transporte de personas' OR  ManejoVehiculo = 'camiones de carga' OR ManejoVehiculo = 'vehículos agrícolas' OR ManejoVehiculo = 'vehículos industriales' )";
 }else{

  $tipoVehiculo = $_POST['tipoVehiculo'];
  $concatenarConsulta.=" AND ManejoVehiculo='". $tipoVehiculo."'";
}


}


if ($_POST['discapacidad']!=null ) {

  if($_POST['discapacidad'] == "Indiferente"){

    $concatenarConsulta.="";

  }else{

    $discapacidad = $_POST['discapacidad'];
    $concatenarConsulta.=" AND Discapacidad='". $discapacidad."'";
  }

}


if ($_POST['ExperienciaLaboral']!=null ) {

 if ($_POST['ExperienciaLaboral'] == "Indiferente") {
   $concatenarConsulta.=" AND (ExperienciaLaboral = 'Si' OR  ExperienciaLaboral = 'No')";
 }else{

  $ExperienciaLaboral = $_POST['ExperienciaLaboral'];
  $concatenarConsulta.=" AND ExperienciaLaboral='". $ExperienciaLaboral."'";
}

}

if ($_POST['yearsExpiriencia']!=null ) {

 if ($_POST['yearsExpiriencia'] == "11") {
   $concatenarConsulta.="";
 }else{

  $ExperienciaLaboral = $_POST['yearsExpiriencia'];
  $concatenarConsulta.=" AND TE.IDAreaExperiencia='". $ExperienciaLaboral."'";
}

}



if ($_POST['disponibilidad']!=null ) {

 if ($_POST['disponibilidad'] == "Indiferente") {
   $concatenarConsulta.="";
 }else{

  $disponibilidad = $_POST['disponibilidad'];
  $concatenarConsulta.=" AND Disponiblidad='". $disponibilidad."'";
}

}


if ($_POST['SituacionActual']!=null ) {

 if ($_POST['SituacionActual'] == "Indiferente") {
   $concatenarConsulta.="";
 }else{

  $SituacionActual = $_POST['SituacionActual'];
  $concatenarConsulta.=" AND SituacionActual='". $SituacionActual."'";
}

}


if ($_POST['foto']!=null ) {

 if ($_POST['foto'] == "Indiferente") {
   $concatenarConsulta.="";
 }else{

  if ($_POST['foto'] == "No") {

    $concatenarConsulta.=" AND C.Foto ='avatar15.jpg'";
  }else{

    $concatenarConsulta.=" AND C.Foto !='avatar15.jpg'";
  }
  
}

}


if ($_POST['edadmenor']!=null ) {
  $concatenarConsulta.=" AND `edad` >=".$_POST['edadmenor'];
}

if ($_POST['edadmayor']!=null ) {
  $concatenarConsulta.=" AND `edad` <=".$_POST['edadmayor'];
}


if ($_POST['salarioMenor']!=null ) {
  $concatenarConsulta.=" AND `SalarioMinimo` >=".$_POST['salarioMenor'];
}

if ($_POST['salarioMayor']!=null ) {
  $concatenarConsulta.=" AND `SalarioMaximo` <=".$_POST['salarioMayor'];
}


//Fin de los datos generales


//Logica experiencia laborales


if($_POST['evaluarAreaLaboral1']!=null){

  if(!empty($_POST['evaluarAreaLaboral2'])){


    if($_POST['laboral1'] == "" && $_POST['laboral2'] ==""){

      $concatenarConsulta.=" AND ( UE.IDCategoria =".$_POST['evaluarAreaLaboral1']." OR UE.IDCategoria =".$_POST['evaluarAreaLaboral2']." )";

    }else{
      $concatenarConsulta.=" AND (UE.IDDesempenado = '".$_POST['laboral1']."' OR UE.IDDesempenado = '".$_POST['laboral2']."')";

    }

  }else{

    if($_POST['laboral1']!=null){

      $concatenarConsulta.=" AND UE.IDDesempenado =".$_POST['laboral1'];  

    }else{
      $concatenarConsulta.=" AND UE.IDCategoria =".$_POST['evaluarAreaLaboral1'];
    }

  }


}




if($_POST['cargoejercido']!=null){

  $buscarCargo = $_POST['cargoejercido'];
  $concatenarConsulta.=" AND UE.Cargo LIKE '%$buscarCargo%'";  

}


//Fin de loa logica de las experiencia laborales


//LOGICA PARA LOS IDIOMAS

if ($_POST['idioma1']!=null ) {

  $idioma1 = $_POST['idioma1'];
  $idioma2 = $_POST['idioma2'];
  $NivelIdioma2 = $_POST['NivelIdioma2'];
  $NivelIdioma1 = $_POST['NivelIdioma1'];

  if (!empty($_POST['idioma2'])){




   if (!empty($_POST['idioma2']) && !empty($_POST['NivelIdioma2']))  {


     $concatenarConsulta.=" AND (I.Idioma ='".$idioma1."' AND I.Nivel ='".$NivelIdioma1."' OR I.Idioma = '".$idioma2."' AND I.Nivel = '".$NivelIdioma2."')";

   }else{

    $concatenarConsulta.=" AND (I.Idioma ='".$idioma1."' OR I.Idioma = '".$idioma2."')"; 
  }

//Comienzo del else de POST IDIOMA 2
}else{

 if (!empty($_POST['idioma1']) && !empty($_POST['NivelIdioma1']))  {


  $concatenarConsulta.=" AND (I.Idioma = '".$idioma1."' AND I.Nivel = '".$NivelIdioma1."')";

}else{
 $concatenarConsulta.=" AND (I.Idioma = '".$idioma1."')";
}



  }//Fin de el else para evaluar post idioma2
  
}//Si  POST IDIOMA1

//Logica de los estudios

if($_POST['NivelEstudio1']!=null && $_POST['carrera1']!=null){

  $NivelEstudio1 = $_POST['NivelEstudio1'];
  $carrera1 = $_POST['carrera1'];
  $NivelEstudio2 = $_POST['NivelEstudio2'];
  $carrera2 = $_POST['carrera2'];

  if (!empty($_POST['NivelEstudio2'])){

    if(!empty($_POST['PaisDelEstudio2'])){

      $PaisEstudio1 = $_POST['PaisDelEstudio'];
      $PaisEstudio2 = $_POST['PaisDelEstudio2'];

      $concatenarConsulta.=" AND (E.NivelEstudio ='".$NivelEstudio1."' AND E.Id_Carrera =".$carrera1." AND E.IDPais =".$PaisEstudio1." OR  E.NivelEstudio ='".$NivelEstudio2."' AND E.Id_Carrera =".$carrera2." AND E.IDPais =".$PaisEstudio2." )";    

    }else{

      if($carrera2 !=""){

        $concatenarConsulta.=" AND (E.NivelEstudio ='".$NivelEstudio1."' AND E.Id_Carrera =".$carrera1."  OR  E.NivelEstudio ='".$NivelEstudio2."' AND E.Id_Carrera =".$carrera2." )";          
      }

    }
    

  }else{ 


    if($_POST['PaisDelEstudio'] !=null){

      $PaisEstudio1 = $_POST['PaisDelEstudio'];

      $concatenarConsulta.=" AND (E.NivelEstudio ='".$NivelEstudio1."' AND E.Id_Carrera =".$carrera1." AND E.IDPais =".$PaisEstudio1.")";    

    }else{

      $concatenarConsulta.=" AND (E.NivelEstudio ='".$NivelEstudio1."' AND E.Id_Carrera =".$carrera1." )";    
    }
  }
  

}

//LOGICA DE ESTUDIOS PERO ESPECILADA
if($_POST['estudioespecialidad']!=null){

  $buscarEstudio = $_POST['estudioespecialidad'];
  $concatenarConsulta.=" AND E.Especialidad LIKE '%$buscarEstudio%'";  

}




$sql11 = "SELECT DISTINCT
UP.IDUsuario,
C.Foto,
C.Nombre,
C.Apellidos,
C.UltimaConexion,
UP.confidencial,
UP.edad,
UP.genero,
UP.ExperienciaLaboral,
TE.Nombre AS 'anosExperiencia',
UP.UltimaActualizacion,
UP.SalarioMinimo,
UP.SalarioMaximo,
P.Nombre AS 'Pais',
PD.Nombre AS 'Departamento',
`Disponiblidad`,
`SituacionActual`
FROM
usuario_perfil UP
INNER JOIN soporte_paises P ON
UP.IDPais = P.IDPais
LEFT JOIN soporte_paises_departamento PD ON
UP.IDDepartamento = PD.IDDepartamento
LEFT JOIN usuarios_cuentas C ON
UP.IDUsuario = C.IDUsuario
LEFT JOIN soporte_tipo_experiencia TE ON
UP.`IDAreaExperiencia` = TE.IDAreaExperiencia
LEFT JOIN usuario_educacion E ON
UP.IDUsuario = E.IDUsuario
LEFT JOIN usuarios_idiomas I ON
UP.IDUsuario = I.IDUsuario
LEFT JOIN usuario_experiencia UE ON
UP.IDUsuario = UE.IDUsuario
LEFT JOIN usuarios_habilidades UH ON
UP.IDUsuario = UH.IDUsuario
WHERE
C.Cargo = 'Candidato' AND C.Estado = 'Activo'".$concatenarConsulta."";

$stmt11 =  Conexion::conectar()->prepare($sql11);

if (!$stmt11->execute()) {
  die("El error de Conexión es ejecutar_consulta_simple");
}



$clientes = array(); //creamos un array

while ($item=$stmt11->fetch())
{
  $sql12 = "SELECT `Cargo` FROM `usuario_experiencia` WHERE `IDUsuario` = ? AND  `FechaFinal` = ( SELECT MAX(`FechaFinal`) FROM usuario_experiencia WHERE `IDUsuario` = ?) LIMIT 0,1";
  $stmt12 =  Conexion::conectar()->prepare($sql12);
  $stmt12->execute(array($item['IDUsuario'],$item['IDUsuario']));
  $item2=$stmt12->fetch();



  $sql14 = "SELECT `NivelEstudio` FROM `usuario_educacion` WHERE `IDUsuario` = ? AND `FechaFinal` = ( SELECT MAX(`FechaFinal`) FROM usuario_educacion WHERE `IDUsuario` = ?) LIMIT 0,1 ";    
  $stmt14 =  Conexion::conectar()->prepare($sql14);
  $stmt14->execute(array($item['IDUsuario'] , $item['IDUsuario']));
  $item4=$stmt14->fetch();

  

  $Foto = '<img class="img-avatar img-avatar-thumb" style="width: 80px; height: 80px;" src="../../assets/img/user/'.$item['Foto'].'" alt="userfoto">';
  $edad = '<a href="cv?id='.base64_encode($item['IDUsuario']).'" class="clicName" target="_blank">'.$item['edad'].'</a>';
  $genero ='<a href="cv?id='.base64_encode($item['IDUsuario']).'" class="clicName" target="_blank">'.$item['genero'].'</a>';
  $Pais = '<a href="cv?id='.base64_encode($item['IDUsuario']).'" class="clicName" target="_blank">'.$item['Pais']." ".$item['Departamento'].'</a>'; 
  $anosExperiencia ='<a href="cv?id='.base64_encode($item['IDUsuario']).'" class="clicName" target="_blank">'.$item['anosExperiencia'].'</a>';
  $cargo = '<a href="cv?id='.base64_encode($item['IDUsuario']).'" class="clicName" target="_blank">'.$item2['Cargo'].'</a>'; 
  $NivelEstudio = '<a href="cv?id='.base64_encode($item['IDUsuario']).'" class="clicName" target="_blank">'.$item4['NivelEstudio'].'</a>';
  $ConexionCandidato = '<a href="cv?id='.base64_encode($item['IDUsuario']).'" class="clicName" target="_blank">'.$item['UltimaConexion'].'</a>';
  $cv ='<a href="cv?id='.base64_encode($item['IDUsuario']).'"  class="btn btn-secondary text-center boton" data-toggle="tooltip" title="Ver Perfil del candidato" data-original-title="Ver Perfil del candidato"  target="_blank"> <i class="si si-user"></i></a>';
  $Disponiblidad ='<a href="cv?id='.base64_encode($item['IDUsuario']).'" class="clicName" target="_blank">'.$item['Disponiblidad'].'</a>'; 
  $SituacionActual = '<a href="cv?id='.base64_encode($item['IDUsuario']).'" class="clicName" target="_blank">'.$item['SituacionActual'].'</a>';

  
  $sql="SELECT COUNT(`IDCandidatos`) as 'existeRegistro' FROM `guardar_candidatos_empresas` WHERE `IDUsuario` = ? AND `IDEmpresa` = ?";
  $stmt =  Conexion::conectar()->prepare($sql);
  $stmt->execute(array($item['IDUsuario'], $IDEmpresa));
  $item6=$stmt->fetch();
  $resultPerfilGuardado = $item6['existeRegistro'];


  $confidencial = $item['confidencial'];

  $nombre="";

  if ($resultPerfilGuardado == 0) {
    if ($confidencial == "Privado"){
      $nombre = '<a href="cv?id='.base64_encode($item['IDUsuario']).'" class="clicName" target="_blank">N/D</a>';
    }else{
      $nombre ='<a href="cv?id='.base64_encode($item['IDUsuario']).'" class="clicName" target="_blank">'.$item['Nombre']." ".$item['Apellidos'].'</a>';
    }
  }else{

    if ($confidencial == "Privado"){
      $nombre = '<a style="color: #3eb318" href="cv?id='.base64_encode($item['IDUsuario']).'" class="clicName" target="_blank">N/D</a>';
      
    }else{
      $nombre ='<a style="color: #3eb318" href="cv?id='.base64_encode($item['IDUsuario']).'" class="clicName" target="_blank">'.$item['Nombre']." ".$item['Apellidos'].'</a>';

    }   
  }

  $clientes[] = array('Foto'=> $Foto,'nombre'=> $nombre,'edad'=> $edad ,'genero'=> $genero,'Pais'=> $Pais  , 'anosExperiencia'=> $anosExperiencia , 'cargo'=> $cargo  , 'NivelEstudio'=> $NivelEstudio, 'Disponiblidad' => $Disponiblidad , 'SituacionActual'=> $SituacionActual ,'ConexionCandidato'=> $ConexionCandidato,'cv'=> $cv);

}

//Creamos el JSON
print json_encode($clientes, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX


//vERIFICA SI EXISTE UN REPORTE CON LA FECHA ACTUAL SI ES CERO CREA EL  REPORTE  SI ES 1 INCREMENTA CONTADOR DE VISITAS
$sql18="SELECT COUNT(`IDReporte`) AS 'FechaDelDia' FROM `reportes_generales` WHERE `fecha` = ? AND `IDEmpresa` = ? AND `Tipo` = 'Busquedas realizadas'";
$stmt18 =  Conexion::conectar()->prepare($sql18);
$fechadelDia =date("Y-m-d");

$stmt18->execute(array($fechadelDia, $IDEmpresa));
while ($item=$stmt18->fetch()){

  $ResultReporteDelDia = $item['FechaDelDia'];
}


//Este bloque sirve para realizar los reportes para las empresas por lo tanto
//realiza el conteo de visitas de los perfiles visto por fechas 
if($ResultReporteDelDia == 0){

  $sql19="INSERT INTO `reportes_generales` (`IDEmpresa`, `Tipo`, `contador`, `fecha`) VALUES (:IDEmpresa, 'Busquedas realizadas', '1', :fecha)";
  $stmt19 =  Conexion::conectar()->prepare($sql19);
  $stmt19->bindParam('IDEmpresa',$IDEmpresa  , PDO::PARAM_STR);
  $stmt19->bindParam('fecha',$fechadelDia  , PDO::PARAM_STR);
  if (!$stmt19->execute()){

    echo "No se ha podido guardar el conteo de reportes";
  }

}else{

  //Realizamos una consulta para buscar  el conteo  con su respectivo fecha y empresa. La opcion sera perfiles vistos por dia
  $sql20="SELECT `contador` FROM reportes_generales WHERE `fecha` = ?  AND `IDEmpresa` = ? AND `Tipo` = 'Busquedas realizadas'";
  $stmt20 =  Conexion::conectar()->prepare($sql20);
  $stmt20->execute(array($fechadelDia, $IDEmpresa));
  while ($item=$stmt20->fetch()){

    $contador = $item['contador']; // resultado del contado de visitas
  }

 $incremento = $contador + 1; // el aumento en 1 por cada visitas

//Actualizamos la visita del contador
 $sql19="UPDATE `reportes_generales` SET `contador`= :contador WHERE `fecha` = :fecha  AND `IDEmpresa` = :IDEmpresa AND `Tipo` = 'Busquedas realizadas'";
 $stmt19 =  Conexion::conectar()->prepare($sql19);
 $stmt19->bindParam('contador',$incremento  , PDO::PARAM_STR);
 $stmt19->bindParam('fecha',$fechadelDia  , PDO::PARAM_STR);
 $stmt19->bindParam('IDEmpresa',$IDEmpresa  , PDO::PARAM_STR);
 if (!$stmt19->execute()){

  echo "No se ha podido guardar el conteo de reportes";
}


}
//fIN DEL BLOQUE DEL REPORTE



//aqui termienda la busqueda

}else if($_POST['buscar'] == "palabrasClaves")
{ 
  $concatenarConsulta="";

  if($_POST['IDPAIS']!=null){

    $buscarcargos = $_POST['IDPAIS'];
    

    $concatenarConsulta.=" AND (UE.Cargo LIKE '%$buscarcargos%' )";



    
  }

  $sql11 = "SELECT DISTINCT
  UP.IDUsuario,
  C.Foto,
  C.Nombre,
  C.Apellidos,
  C.UltimaConexion,
  UP.confidencial,
  UP.edad,
  UP.genero,
  UP.ExperienciaLaboral,
  TE.Nombre AS 'anosExperiencia',
  UP.UltimaActualizacion,
  UP.SalarioMinimo,
  UP.SalarioMaximo,
  P.Nombre AS 'Pais',
  PD.Nombre AS 'Departamento',
  `Disponiblidad`,
  `SituacionActual`
  FROM
  usuario_perfil UP
  INNER JOIN soporte_paises P ON
  UP.IDPais = P.IDPais
  LEFT JOIN soporte_paises_departamento PD ON
  UP.IDDepartamento = PD.IDDepartamento
  LEFT JOIN usuarios_cuentas C ON
  UP.IDUsuario = C.IDUsuario
  LEFT JOIN soporte_tipo_experiencia TE ON
  UP.`IDAreaExperiencia` = TE.IDAreaExperiencia
  LEFT JOIN usuario_educacion E ON
  UP.IDUsuario = E.IDUsuario
  LEFT JOIN usuarios_idiomas I ON
  UP.IDUsuario = I.IDUsuario
  LEFT JOIN usuario_experiencia UE ON
  UP.IDUsuario = UE.IDUsuario
  LEFT JOIN usuarios_habilidades UH ON
  UP.IDUsuario = UH.IDUsuario
  WHERE
  C.Cargo = 'Candidato' AND C.Estado = 'Activo' AND UP.IDPais = ?".$concatenarConsulta."";

  $stmt11 =  Conexion::conectar()->prepare($sql11);

  
  if (!$stmt11->execute(array($IDPaisUbicadoEmpresa))) {
    die("El error de Conexión es ejecutar_consulta_simple");
  }




$clientes = array(); //creamos un array

while ($item=$stmt11->fetch())
{
  $sql12 = "SELECT `Cargo` FROM `usuario_experiencia` WHERE `IDUsuario` = ? AND  `FechaFinal` = ( SELECT MAX(`FechaFinal`) FROM usuario_experiencia WHERE `IDUsuario` = ?) LIMIT 0,1";
  $stmt12 =  Conexion::conectar()->prepare($sql12);
  $stmt12->execute(array($item['IDUsuario'],$item['IDUsuario']));
  $item2=$stmt12->fetch();

  

  $sql14 = "SELECT `NivelEstudio` FROM `usuario_educacion` WHERE `IDUsuario` = ? AND `FechaFinal` = ( SELECT MAX(`FechaFinal`) FROM usuario_educacion WHERE `IDUsuario` = ?) LIMIT 0,1 ";    
  $stmt14 =  Conexion::conectar()->prepare($sql14);
  $stmt14->execute(array($item['IDUsuario'] , $item['IDUsuario']));
  $item4=$stmt14->fetch();



  

  $Foto = '<img class="img-avatar img-avatar-thumb" style="width: 80px; height: 80px;" src="../../assets/img/user/'.$item['Foto'].'" alt="userfoto">';
  $edad = '<a href="cv?id='.base64_encode($item['IDUsuario']).'" class="clicName" target="_blank">'.$item['edad'].'</a>';
  $genero ='<a href="cv?id='.base64_encode($item['IDUsuario']).'" class="clicName" target="_blank">'.$item['genero'].'</a>';
  $Pais = '<a href="cv?id='.base64_encode($item['IDUsuario']).'" class="clicName" target="_blank">'.$item['Pais']." ".$item['Departamento'].'</a>'; 
  $anosExperiencia ='<a href="cv?id='.base64_encode($item['IDUsuario']).'" class="clicName" target="_blank">'.$item['anosExperiencia'].'</a>';
  $cargo = '<a href="cv?id='.base64_encode($item['IDUsuario']).'" class="clicName" target="_blank">'.$item2['Cargo'].'</a>'; 
  $NivelEstudio = '<a href="cv?id='.base64_encode($item['IDUsuario']).'" class="clicName" target="_blank">'.$item4['NivelEstudio'].'</a>';
  $ConexionCandidato = '<a href="cv?id='.base64_encode($item['IDUsuario']).'" class="clicName" target="_blank">'.$item['UltimaConexion'].'</a>';
  $cv ='<a href="cv?id='.base64_encode($item['IDUsuario']).'"  class="btn btn-secondary text-center boton" data-toggle="tooltip" title="Ver Perfil del candidato" data-original-title="Ver Perfil del candidato"  target="_blank"> <i class="si si-user"></i></a>';
  $Disponiblidad ='<a href="cv?id='.base64_encode($item['IDUsuario']).'" class="clicName" target="_blank">'.$item['Disponiblidad'].'</a>'; 
  $SituacionActual = '<a href="cv?id='.base64_encode($item['IDUsuario']).'" class="clicName" target="_blank">'.$item['SituacionActual'].'</a>';

  $sql="SELECT COUNT(`IDCandidatos`) as 'existeRegistro' FROM `guardar_candidatos_empresas` WHERE `IDUsuario` = ? AND `IDEmpresa` = ?";
  $stmt =  Conexion::conectar()->prepare($sql);
  $stmt->execute(array($item['IDUsuario'], $IDEmpresa));
  $item6=$stmt->fetch();
  $resultPerfilGuardado = $item6['existeRegistro'];

  $confidencial = $item['confidencial'];

  $nombre="";

  if ($resultPerfilGuardado == 0) {
    if ($confidencial == "Privado"){
      $nombre = '<a href="cv?id='.base64_encode($item['IDUsuario']).'" class="clicName" target="_blank">N/D</a>';
    }else{
      $nombre ='<a href="cv?id='.base64_encode($item['IDUsuario']).'" class="clicName" target="_blank">'.$item['Nombre']." ".$item['Apellidos'].'</a>';
    }
  }else{

    if ($confidencial == "Privado"){
      $nombre = '<a style="color: #3eb318" href="cv?id='.base64_encode($item['IDUsuario']).'" class="clicName" target="_blank">N/D</a>';
      
    }else{
      $nombre ='<a style="color: #3eb318" href="cv?id='.base64_encode($item['IDUsuario']).'" class="clicName" target="_blank">'.$item['Nombre']." ".$item['Apellidos'].'</a>';

    }   
  }


  $clientes[] = array('Foto'=> $Foto,'nombre'=> $nombre,'edad'=> $edad ,'genero'=> $genero,'Pais'=> $Pais  , 'anosExperiencia'=> $anosExperiencia , 'cargo'=> $cargo  , 'NivelEstudio'=> $NivelEstudio, 'Disponiblidad' => $Disponiblidad , 'SituacionActual'=> $SituacionActual ,'ConexionCandidato'=> $ConexionCandidato,'cv'=> $cv);

}

//Creamos el JSON
print json_encode($clientes, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX




}
else{

  $sql11 = "SELECT DISTINCT
  UP.IDUsuario,
  C.Foto,
  C.Nombre,
  C.Apellidos,
  C.UltimaConexion,
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
  `Disponiblidad`,
  `SituacionActual`
  FROM
  usuario_perfil UP
  INNER JOIN soporte_paises P ON
  UP.IDPais = P.IDPais
  LEFT JOIN soporte_paises_departamento PD ON
  UP.IDDepartamento = PD.IDDepartamento
  LEFT JOIN usuarios_cuentas C ON
  UP.IDUsuario = C.IDUsuario
  LEFT JOIN soporte_tipo_experiencia TE ON
  UP.`IDAreaExperiencia` = TE.IDAreaExperiencia
  WHERE
  C.Cargo = 'Candidato'  AND C.Estado = 'Activo' AND UP.IDPais = ? ";

  $stmt11 =  Conexion::conectar()->prepare($sql11);

  if (!$stmt11->execute(array($IDPaisUbicadoEmpresa))) {
    die("El error de Conexión es ejecutar_consulta_simple");
  }



$clientes = array(); //creamos un array

while ($item=$stmt11->fetch())
{
  $sql12 = "SELECT `Cargo` FROM `usuario_experiencia` WHERE `IDUsuario` = ? AND  `FechaFinal` = ( SELECT MAX(`FechaFinal`) FROM usuario_experiencia WHERE `IDUsuario` = ?) LIMIT 0,1";
  $stmt12 =  Conexion::conectar()->prepare($sql12);
  $stmt12->execute(array($item['IDUsuario'],$item['IDUsuario']));
  $item2=$stmt12->fetch();



  $sql14 = "SELECT `NivelEstudio` FROM `usuario_educacion` WHERE `IDUsuario` = ? AND `FechaFinal` = ( SELECT MAX(`FechaFinal`) FROM usuario_educacion WHERE `IDUsuario` = ?) LIMIT 0,1 ";    
  $stmt14 =  Conexion::conectar()->prepare($sql14);
  $stmt14->execute(array($item['IDUsuario'] , $item['IDUsuario']));
  $item4=$stmt14->fetch();



  $Foto = '<img class="img-avatar img-avatar-thumb" style="width: 80px; height: 80px;" src="../../assets/img/user/'.$item['Foto'].'" alt="userfoto">';
  $edad = '<a href="cv?id='.base64_encode($item['IDUsuario']).'" class="clicName" target="_blank">'.$item['edad'].'</a>';
  $genero ='<a href="cv?id='.base64_encode($item['IDUsuario']).'" class="clicName" target="_blank">'.$item['genero'].'</a>';
  $Pais = '<a href="cv?id='.base64_encode($item['IDUsuario']).'" class="clicName" target="_blank">'.$item['Pais']." ".$item['Departamento'].'</a>'; 
  $anosExperiencia ='<a href="cv?id='.base64_encode($item['IDUsuario']).'" class="clicName" target="_blank">'.$item['anosExperiencia'].'</a>';
  $cargo = '<a href="cv?id='.base64_encode($item['IDUsuario']).'" class="clicName" target="_blank">'.$item2['Cargo'].'</a>'; 
  $NivelEstudio = '<a href="cv?id='.base64_encode($item['IDUsuario']).'" class="clicName" target="_blank">'.$item4['NivelEstudio'].'</a>';
  $ConexionCandidato = '<a href="cv?id='.base64_encode($item['IDUsuario']).'" class="clicName" target="_blank">'.$item['UltimaConexion'].'</a>';

  $cv ='<a href="pdf-maquetado?id='.base64_encode($item['IDUsuario']).'"  class="btn btn-danger text-center boton" data-toggle="tooltip" title="Ver Perfil del candidato" data-original-title="Ver Perfil del candidato" target="_blank">  <i class="fa fa-file-pdf-o"></i> </a>';
  
  $Disponiblidad ='<a href="cv?id='.base64_encode($item['IDUsuario']).'" class="clicName" target="_blank">'.$item['Disponiblidad'].'</a>'; 
  $SituacionActual = '<a href="cv?id='.base64_encode($item['IDUsuario']).'" class="clicName" target="_blank">'.$item['SituacionActual'].'</a>';

  $sql="SELECT COUNT(`IDCandidatos`) as 'existeRegistro' FROM `guardar_candidatos_empresas` WHERE `IDUsuario` = ? AND `IDEmpresa` = ?";
  $stmt =  Conexion::conectar()->prepare($sql);
  $stmt->execute(array($item['IDUsuario'], $IDEmpresa));
  $item6=$stmt->fetch();
  $resultPerfilGuardado = $item6['existeRegistro'];
  
  $confidencial = $item['confidencial'];

  $nombre="";

  if ($resultPerfilGuardado == 0) {
    if ($confidencial == "Privado"){
      $nombre = '<a href="cv?id='.base64_encode($item['IDUsuario']).'" class="clicName" target="_blank">N/D</a>';
    }else{
      $nombre ='<a href="cv?id='.base64_encode($item['IDUsuario']).'" class="clicName" target="_blank">'.$item['Nombre']." ".$item['Apellidos'].'</a>';
    }
  }else{

    if ($confidencial == "Privado"){
      $nombre = '<a style="color: #3eb318;" href="cv?id='.base64_encode($item['IDUsuario']).'" class="clicName" target="_blank">N/D</a>';
      
    }else{
      $nombre ='<a style="color: #3eb318;" href="cv?id='.base64_encode($item['IDUsuario']).'" class="clicName" target="_blank">'.$item['Nombre']." ".$item['Apellidos'].'</a>';

    }   
  }


  $clientes[] = array('Foto'=> $Foto,'nombre'=> $nombre,'edad'=> $edad ,'genero'=> $genero,'Pais'=> $Pais  , 'anosExperiencia'=> $anosExperiencia , 'cargo'=> $cargo  , 'NivelEstudio'=> $NivelEstudio, 'Disponiblidad' => $Disponiblidad , 'SituacionActual'=> $SituacionActual ,'ConexionCandidato'=> $ConexionCandidato,'cv'=> $cv);

}

//Creamos el JSON
print json_encode($clientes, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX



//vERIFICA SI EXISTE UN REPORTE CON LA FECHA ACTUAL SI ES CERO CREA EL  REPORTE  SI ES 1 INCREMENTA CONTADOR DE VISITAS
$sql18="SELECT COUNT(`IDReporte`) AS 'FechaDelDia' FROM `reportes_generales` WHERE `fecha` = ? AND `IDEmpresa` = ? AND `Tipo` = 'Busquedas realizadas'";
$stmt18 =  Conexion::conectar()->prepare($sql18);
$fechadelDia =date("Y-m-d");

$stmt18->execute(array($fechadelDia, $IDEmpresa));
while ($item=$stmt18->fetch()){

  $ResultReporteDelDia = $item['FechaDelDia'];
}


//Este bloque sirve para realizar los reportes para las empresas por lo tanto
//realiza el conteo de visitas de los perfiles visto por fechas 
if($ResultReporteDelDia == 0){

  $sql19="INSERT INTO `reportes_generales` (`IDEmpresa`, `Tipo`, `contador`, `fecha`) VALUES (:IDEmpresa, 'Busquedas realizadas', '1', :fecha)";
  $stmt19 =  Conexion::conectar()->prepare($sql19);
  $stmt19->bindParam('IDEmpresa',$IDEmpresa  , PDO::PARAM_STR);
  $stmt19->bindParam('fecha',$fechadelDia  , PDO::PARAM_STR);
  if (!$stmt19->execute()){

    echo "No se ha podido guardar el conteo de reportes";
  }

}else{

  //Realizamos una consulta para buscar  el conteo  con su respectivo fecha y empresa. La opcion sera perfiles vistos por dia
  $sql20="SELECT `contador` FROM reportes_generales WHERE `fecha` = ?  AND `IDEmpresa` = ? AND `Tipo` = 'Busquedas realizadas'";
  $stmt20 =  Conexion::conectar()->prepare($sql20);
  $stmt20->execute(array($fechadelDia, $IDEmpresa));
  while ($item=$stmt20->fetch()){

    $contador = $item['contador']; // resultado del contado de visitas
  }

 $incremento = $contador + 1; // el aumento en 1 por cada visitas

//Actualizamos la visita del contador
 $sql19="UPDATE `reportes_generales` SET `contador`= :contador WHERE `fecha` = :fecha  AND `IDEmpresa` = :IDEmpresa AND `Tipo` = 'Busquedas realizadas'";
 $stmt19 =  Conexion::conectar()->prepare($sql19);
 $stmt19->bindParam('contador',$incremento  , PDO::PARAM_STR);
 $stmt19->bindParam('fecha',$fechadelDia  , PDO::PARAM_STR);
 $stmt19->bindParam('IDEmpresa',$IDEmpresa  , PDO::PARAM_STR);
 if (!$stmt19->execute()){

  echo "No se ha podido guardar el conteo de reportes";
}


}
//fIN DEL BLOQUE DEL REPORTE


}



?>