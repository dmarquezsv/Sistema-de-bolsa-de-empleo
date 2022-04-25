<?php 

include_once 'templates/head.php';
$sql="SELECT OT.IDpostulaciones ,EP.IDEmpresa , EP.lugar ,EP.Nombre AS 'NombreEMPRESA' , EP.logo ,EP.paginaweb , TE.Area ,EP.Confidencial ,P.IDPais , P.Nombre AS 'Pais' , PD.IDDepartamento,PD.Nombre 'Departamento' , T.Nombre AS 'Categoria' ,CD.IDDesempenado ,CD.nombre AS 'Desempeno' , `Plaza` , OT.Descripcion , `Vacante` , `TipoContratacion` , `Genero` , `EdadMenor` , `EdadMayor` , `SalarioMinimo` , `SalarioMaximo`, `Vihiculo` , `TipoVehiculo` , `Experiencia` ,Exp.IDAreaExperiencia ,Exp.Nombre AS 'NivelExperiencia' , `FechaPublicacion` , OT.Expira , OT.Estado FROM empresa_ofertas_trabajos OT INNER JOIN empresa_perfil EP ON OT.IDEmpresa = EP.IDEmpresa LEFT JOIN soporte_tipo_empresa TE ON EP.IDTipoEmpresa = TE.IDTipoEmpresa LEFT JOIN soporte_paises P ON OT.IDPais = P.IDPais LEFT JOIN soporte_paises_departamento PD ON OT.IDDepartamento = PD.IDDepartamento LEFT JOIN soporte_areas_trabajos T ON OT.IDCategoria = T.IDCategoria LEFT JOIN soporte_cargos_desempenado CD ON OT.IDDesempenado = CD.IDDesempenado LEFT JOIN soporte_tipo_experiencia Exp ON OT.IDAreaExperiencia = Exp.IDAreaExperiencia  WHERE OT.IDpostulaciones = ?";

$id = base64_decode($_GET['id']);
$IDOferta = $FuncionesApp->test_input($id);

$stmt = $Conexion->ejecutar_consulta_simple_Where($sql ,$IDOferta);


while ($item=$stmt->fetch())
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



   $sql2="SELECT `genero`,`IDPais` , `IDDepartamento` , `Vehiculo` , `ExperienciaLaboral` , TE.`IDAreaExperiencia`, `Disponiblidad` , `edad` , `SalarioMinimo` , `SalarioMaximo` FROM usuario_perfil UP LEFT JOIN soporte_tipo_experiencia TE ON TE.IDAreaExperiencia = UP.IDAreaExperiencia WHERE `IDUsuario` = ? ";
   $stmt2 = $Conexion->ejecutar_consulta_simple_Where($sql2 ,$IDUser);

   $VehiculoUser ="";
   $experienciaLaboralUser ="";
   $edaduser ="";
   $timeExperienciaLaboral ="";
   $DisponiblidadUser ="";
   $salarioMinimoUser ="";
   $salarioMaximoUser ="";
   $generoUser ="";

   while ($item=$stmt2->fetch())
   {


  $VehiculoUser = $item['Vehiculo']; //Ya
  $experienciaLaboralUser = $item['ExperienciaLaboral'];//Ya
  $edaduser = $item['edad']; // Ya
 $timeExperienciaLaboral = $item['IDAreaExperiencia']; // Ya
 $DisponiblidadUser = $item['Disponiblidad']; // Ya
 $salarioMinimoUser = $item['SalarioMinimo']; 
 $salarioMaximoUser = $item['SalarioMaximo']; 

 $generoUser = $item['genero'];
 $IDPais = $item['IDPais'];
 $IDDepartamento = $item['IDDepartamento'];

 


 

}


$sql4 ="SELECT `IDDesempenado` AS 'ResultCargo'  FROM `usuario_experiencia` WHERE `IDUsuario` = ? AND `IDDesempenado` = ? LIMIT 0,1";
$stmt4 =  Conexion::conectar()->prepare($sql4);
$stmt4->execute(array($IDUser , $IDCargo));
$resultCargoUser ="";
while ($item=$stmt4->fetch())
{
  $resultCargoUser = $item['ResultCargo'];
}


$sql5="SELECT `Cargo` FROM `usuarios_cuentas` WHERE `IDUsuario` = ? ";
$stmt5 =  Conexion::conectar()->prepare($sql5);
$stmt5->execute(array($IDUser));
$cargoCuenta="";
while ($item=$stmt5->fetch())
{
  $cargoCuenta = $item['Cargo'];
}


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

if(!isset($_SESSION['iduser'])){

 $Porcentaje = 0;

}

if($cargoCuenta != "Candidato"){
  $Porcentaje = 0;
}


//verificamos si el usuario se ha postulado si es cero no ha aplicado si es 1 el usuario ya aplico
$sql3 = "SELECT COUNT(IDUsuario) as 'Resultado' FROM usuario_postulaciones WHERE`IDpostulaciones` = ? AND IDUsuario = ? ";
$stmt3 =  Conexion::conectar()->prepare($sql3);
$stmt3->execute(array($IDOferta , $IDUser));
while ($item=$stmt3->fetch())
{
  $resultPostulacion = $item['Resultado'];
}

$fechaActual =date("Y-m-d");

 ?>
<title>MUNDO EMPLEO | CENTRO AMERICA</title>
<?php include_once 'templates/style.php'; ?>
<?php include_once 'templates/header.php'; ?>
<?php include_once 'templates/leftmunu.php'; ?>

<style type="text/css">

  form.search-box .input-form input {
   height: 50px;
   width: 100%;
   color: #777777;
   font-size: 18px;
   font-weight: 400;
   padding: 9px 33px 9px 32px;

   border-radius: 0px;
   position: relative;
 }

 #select1{
   height: 50px;
 }

 #btn-oferta{

   background: #FCC201;
   padding: 7px;
   border-radius: 7px;
   color: white;
   font-weight: bold;
 }

 #btn-oferta:hover{
   background: #0B3486;
   font-weight: bold;
 }

 .pagination-plugin span, .pagination-plugin a, .pagination-plugin a:focus {
   background: #2e2751;
 }

 .pagination-plugin li.current a, .pagination-plugin li:hover a {
   background: #FCC201;
 }


 #imgbanner{

   background: url('img/bannercadaservicio/Amarillo/Office.jpg');
   background-repeat: no-repeat;
   background-size: cover;

 }


 .single-job-items {
   padding: 36px 30px;
   display: flex;
   justify-content: space-between;
   flex-wrap: wrap;
   -webkit-transition: .4s;
   -moz-transition: .4s;
   -o-transition: .4s;
   transition: .4s;
 }

 .single-job-items .job-tittle a h4 {
   color: #28395a;
   font-size: 24px;
   -webkit-transition: .4s;
   -moz-transition: .4s;
   -o-transition: .4s;
   transition: .4s;
 }


 .single-job-items .job-tittle ul li {
   display: inline-block;
   margin-right: 48px;
   font-size: 15px;
   color: #808080;
   line-height: 1.8;
 }

 .single-job-items .company-img img {
   overflow: hidden;
   float: left;
   margin-right: 100px;
   z-index: 999;

 }

 #resumen-trabajo{

   padding: 30px 30px 30px 30px;
   border: 1px solid #ededed;


 }

 #resumen-trabajo ul li {
   display: flex;
   justify-content: space-between;
   margin-bottom: 12px;
 }


 #imglogo{

   width: 8em; 
   height: 8em;

 }

 @media only screen and (max-width: 767px) {

   #imglogo{

    width: 8em; 
    height: 8em;


  }


}

</style>




<div class="breadcrumbs " id="imgbanner">
  <div class="container">
   <div class="row">
    <div class="col-12">
     <div class="bread-inner">
      <!-- Bread Menu -->
      <div class="bread-menu">
       <ul>
        <li><a href="">OFerta de empleo</a></li>
        <li><a href="">Detalles</a></li>
      </ul>
    </div>
    <!-- Bread Title -->
    <div class="bread-title"><h2 id="titulos">Ofeta de empleo.</h2> </div>
  </div>
</div>
</div>
</div>
</div>




<section class="latest-blog section-space">
  <div class="container">

   <div class="row">

    <div class="col-xl-8 col-lg-8 col-md-8">

     <?php if(!isset($_SESSION['iduser'])){ ?>
      <div class="alert alert-warning text-center" role="alert">No has iniciado Sesión</div>
    <?php } ?>

    <?php
    if ($FechaPublicacion <= $fechaActual && $Expira >= $fechaActual) {
      echo "";
    }else{
      echo '<div class="alert alert-warning" role="alert">La oferta de empleo a vencido. '.$Expira.'</div>';

    }
    ?>

    <div class="single-job-items ">
      <div class="job-items">
       <div class="company-img company-img-details">
        <?php if ($Confidencial == "Si") {
         echo  '<a href="#"><img src="main/img/LogosEmpresas/confidencial.jpg" alt=""  class="img-fluid" style="width: 100px; height: 100px;"></a>';
       }else{
         echo  '<a href="#"><img src="main/img/LogosEmpresas/'.$Logo.'" alt=""  class="img-fluid"  id="imglogo"></a>';
       } 
       ?>
     </div>
     <div class="job-tittle">
       <a href="#">
        <h4><?php echo $Plaza ?> </h4>
      </a>
      <ul>
        <?php if ($Confidencial != "Si") {?>
         <li><?php echo$NombreEmpresa ?></li> 	
       <?php }else{ ?> 
         <li>Empresa: Confidencial</li> 	
       <?php } ?>

       <li><i class="fas fa-map-marker-alt"></i><?php echo$Pais; ?>, <?php echo$Departamento; ?></li>
       <li>$<?php echo$SalarioMinimo; ?> - $<?php echo $SalarioMaximo; ?></li>
     </ul>
   </div>
 </div>
</div>

<br><br>

<div class="job-post-details">
 <div class="post-details1 mb-50">
  <!-- Small Section Tittle -->
  <div class="small-section-tittle">
   <h4>Descripción del trabajo</h4> <br>
 </div>
 <?php echo$Descripcion; ?>  <br>
</div>				
</div>
</div>



<div class="col-xl-4 col-lg-4 col-md-4">



 <h4>Resumen del trabajo</h4>
 <br>
 <div id="resumen-trabajo" >


  <ul>
   <li>Fecha de publicacion: <?php echo $FechaPublicacion;?></li>
   <li>Expira: <?php echo $Expira; ?></li>
   <li>Vacante: <?php echo $Vacante; ?></li>
   <li>Tipo de Contratación: <?php echo $TipoContrato ?></li>
   <li>Experiencia: <?php echo $Experiencia; ?></li>
   <li>Nivel de Experiencia: <?php echo $NivelExperiencia; ?></li>
   <li>Edad: <?php echo $EdadMenor;?>  / <?php echo $EdadMayor; ?></li>

   <li>Género: <?php if ($Genero =="M") {echo "Masculino";}else if($Genero =="F"){echo "Femenino";}else{ echo "Indiferente";}  ?></li>
   <li>Cargo Solicitado: <?php echo $Cargo ?></li>

   <li>Vehículo: <?php echo $Vehiculo ?></li>
   <li>Tipo Vehículo: <?php echo $TipoVehiculo ?></li>
   <li>Estado: <?php echo $Estado ?></li>
   <li>Porcentaje para aplicar: <?php echo $Porcentaje ?>%</li>

 </ul>

 <br>

 <?php 

 $salidaFavoritos = ' <br>
 <center>
 <div id="respuestafavoritos"></div>
 </center>';



 if(!isset($_SESSION['iduser'])){

  echo '<center><a href="login-candidato?id='.$_GET['id'].'&direccionar=oferta_trabajo" class="bizwheel-btn theme-1 effect" >Iniciar Sesión</a></center>'; 
  echo "<br>";
  echo '<center><a href="crear-cuenta-candidato" class="bizwheel-btn theme-1 effect" >Crear Cuenta</a></center>'; 

}else if($cargoCuenta != "Candidato"){

 echo ' <div class="alert alert-warning text-center" role="alert">
 Las funcionalidades solo aplican para los candidatos.
 </div>';




}else if($Estado !="Activo"){

 echo ' <div class="alert alert-warning text-center" role="alert">
 La oferta de empleo ha finzalizado
 </div>';          
}
else if($resultPostulacion == 1){

 echo '<center><a href="Dashboard/Candidato/postulaciones" class="bizwheel-btn theme-1 effect" >Haz aplicado a la oferta</a></center>'; 
 
}
else{



  if($FechaPublicacion <= $fechaActual && $Expira >= $fechaActual){

   if ($Porcentaje <= 49) {
    echo ' <div class="alert alert-warning text-center" role="alert">
    No puedes aplicar a esta oferta.Para poder aplicar necesita un 50% en adelante.
    </div>';

    echo $salidaFavoritos;
  }else{

    if ($Genero == "Indiferente"){
      echo '<center><div id="respuestaAplicarOferta"></div></center>';
      echo $salidaFavoritos;
    }else{

     if($generoUser == $Genero){
      echo '<center><div id="respuestaAplicarOferta"></div></center>';
      echo $salidaFavoritos;

    }
    else{
      echo ' <div class="alert alert-warning text-center" role="alert">
      No puedes aplicar a esta oferta de empleo debido al genero solicitado.
      </div>';
    }

           }//Evalua el genero


           }// evalua el porcentaje del usuario


         }else{
          echo ' <div class="alert alert-warning text-center" role="alert">
          La oferta de empleo ha expirado.
          </div>';
        }



}// else de evaluar si es un candidato


?>

</div>


</div>



</section>
<!--/ End Latest Blog -->



<?php include_once 'templates/footer.php'; ?>
<?php include_once 'templates/script.php'; ?>

<script type="text/javascript">

  $(document).ready(function() {

    $.ajax({
     url: 'Dashboard/Candidato/Modelos/ModelosFavoritos/MostrarFavoritosOferta.php' ,
     type: 'POST' ,
     dataType: 'html',
     data: {usuario:"<?php echo $IDUser; ?>",idtrabajo:"<?php echo $IDOferta; ?>"},
   })
    .done(function(respuesta){
     $("#respuestafavoritos").html(respuesta);
   })
    .fail(function(){
     swal({title:'alerta',text:'Por favor intente de nuevo',type:'error'}); 
   });


  });


  function AgregarFavoritos(usuario , idtrabajo){

    $.ajax({
      url: 'Dashboard/Candidato/Modelos/ModelosFavoritos/agregarFavoritos.php' ,
      type: 'POST' ,
      dataType: 'html',
      data: {usuario: usuario , idtrabajo:idtrabajo},

      beforeSend: function() {

       swal({
        title: "Cargando...",
        text: "Por favor espera",
        imageUrl: "assets/img/icono/loader.gif",
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
    .done(function(respuesta){
      $("#respuestafavoritos").html(respuesta);
    })
    .fail(function(request, errorType, errorMessage){
      swal({title:'alerta',text:'Intente de nuevo para procesar el envio',type:'error'});
      console.log(errorType);
      alert(errorMessage);
    })
    .always(function(){
      swal({title:'éxito',text:'Se agrado a tus favoritos',type:'success' , timer: 2000});
    })

  }

  function EliminarFavoritos(usuario , idtrabajo){

    $.ajax({
      url: 'Dashboard/Candidato/Modelos/ModelosFavoritos/EliminarFavoritos2.php' ,
      type: 'POST' ,
      dataType: 'html',
      data: {usuario: usuario , idtrabajo:idtrabajo},
      beforeSend: function() {

       swal({
        title: "Cargando...",
        text: "Por favor espera",
        imageUrl: "assets/img/icono/loader.gif",
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
    .done(function(respuesta){
      $("#respuestafavoritos").html(respuesta);
    })
    .fail(function(request, errorType, errorMessage){
      swal({title:'alerta',text:'Intente de nuevo para procesar el envio',type:'error'});
      console.log(errorType);
      alert(errorMessage);
    })
    .always(function(){
      swal({title:'éxito',text:'Se a Eliminado de tus favoritos',type:'success' , timer: 2000});
    })

  }

  $('#respuestafavoritos').on('click','#agregar' , function(){
    AgregarFavoritos("<?php echo $IDUser; ?>","<?php echo $IDOferta; ?>");
  });


  $('#respuestafavoritos').on('click','#eliminar' , function(){

    EliminarFavoritos("<?php echo $IDUser; ?>","<?php echo $IDOferta; ?>");

  });

///LOGIA PARA POSTULARSE A UN TRABAJO


$(document).ready(function() {

 $.ajax({
  url: 'Dashboard/Candidato/Modelos/ModelosPostularse/VerficarPostarleTrabajo.php' ,
  type: 'POST' ,
  dataType: 'html',
  data: {usuario:"<?php echo $IDUser; ?>",idtrabajo:"<?php echo $IDOferta; ?>"},
})
 .done(function(respuesta){
  $("#respuestaAplicarOferta").html(respuesta);
})
 .fail(function(){
  swal({title:'alerta',text:'Por favor intente de nuevo',type:'error'}); 
});


});




function Postularse(usuario , idtrabajo){

 $.ajax({
   url: 'Dashboard/Candidato/Modelos/ModelosPostularse/AgregarPostulacionTrabajo.php' ,
   type: 'POST' ,
   dataType: 'html',
   data: {usuario: usuario , idtrabajo:idtrabajo},
   beforeSend: function() {
    swal({title:'éxito',text:'Procesando el envio del mensaje. Por favor espere.',type:'success'  , timer: 2000});
  }
})
 .done(function(respuesta){
   $("#respuestaAplicarOferta").html(respuesta);
 })
 .fail(function(request, errorType, errorMessage){
   swal({title:'alerta',text:'Intente de nuevo para procesar el envio',type:'error'});
   console.log(errorType);
   alert(errorMessage);
 })
 .always(function(){
   swal({title:'éxito',text:'Te has postulado con éxito',type:'success' , timer: 2000});
 })

}


function EliminarPostulacion(usuario , idtrabajo){

 $.ajax({
   url: 'Dashboard/Candidato/Modelos/ModelosPostularse/EliminarPostulacionTrabajo.php' ,
   type: 'POST' ,
   dataType: 'html',
   data: {usuario: usuario , idtrabajo:idtrabajo},
   beforeSend: function() {
    swal({title:'éxito',text:'Procesando el envio del mensaje. Por favor espere.',type:'success'  , timer: 2000});
  }
})
 .done(function(respuesta){
   $("#respuestaAplicarOferta").html(respuesta);
 })
 .fail(function(request, errorType, errorMessage){
   swal({title:'alerta',text:'Intente de nuevo para procesar el envio',type:'error'});
   console.log(errorType);
   alert(errorMessage);
 })
 .always(function(){
   swal({title:'éxito',text:'Se a Eliminado la postulación',type:'success' , timer: 2000});
 })
}



$('#respuestaAplicarOferta').on('click','#agregarOferta' , function(){

  Postularse("<?php echo $IDUser; ?>","<?php echo $IDOferta; ?>");

});


$('#respuestaAplicarOferta').on('click','#eliminarOferta' , function(){
  EliminarPostulacion("<?php echo $IDUser; ?>","<?php echo $IDOferta; ?>");
});


$('#eliminarOferta').on('click', function(){
  EliminarPostulacion("<?php echo $IDUser; ?>","<?php echo $IDOferta; ?>");
});


</script>