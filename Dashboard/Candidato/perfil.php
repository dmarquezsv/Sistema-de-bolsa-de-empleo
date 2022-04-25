<?php
include_once '../../BD/Conexion.php';
include_once '../../BD/Consultas.php';
include_once 'templates/head.php';
$Conexion = new Consultas();

//Consulta para extraer los paies
$sql = "SELECT * FROM `soporte_paises` ORDER BY `soporte_paises`.`Nombre` ASC ";
$stmt = $Conexion->ejecutar_consulta_simple($sql);

//Conusltas  para extrear los tipos de experiencia
$sql2 = "SELECT * FROM `soporte_tipo_experiencia`";
$stmt2 = $Conexion->ejecutar_consulta_simple($sql2);

//
$sql3 = "SELECT * FROM `soporte_areas_trabajos` ORDER BY `soporte_areas_trabajos`.`Nombre` ASC ";
$stmt3 = $Conexion->ejecutar_consulta_simple($sql3);

$ResultTrabajo = $Conexion->ejecutar_consulta_conteo("usuario_areas","IDUsuario",$IDUser);
$sql4 ="SELECT IDAreas , TA.Nombre 'Area' FROM usuario_areas UA INNER JOIN soporte_areas_trabajos TA ON UA.IDCategoria = TA.IDCategoria WHERE IDUsuario = ?";
$stmt4 = $Conexion->ejecutar_consulta_simple_Where($sql4 , $IDUser);
//

$resultPerfil = $Conexion->ejecutar_consulta_conteo("usuario_perfil" , "IDUsuario" , $IDUser);

if ($resultPerfil >=1) {

 $sql5 ="SELECT P.IDPais ,P.Nombre AS'Pais' , PD.IDDepartamento , PD.Nombre AS 'Departamento' , `Direccion` ,`EducacionSecundaria` , `Descripcion` , `genero`,`LicenciaConducir` , `Vehiculo` , `ManejoVehiculo` ,`CorreoAlternativo` , `Telefono` , `Celular` , `Discapacidad` , `TipoDiscapacidad` , `ExperienciaLaboral` , TE.IDAreaExperiencia , TE.Nombre AS 'Experiencia' , `Portafolio` , `Disponiblidad` , `SituacionActual` , `FechaNaciento` , `edad` , `SalarioMinimo` , `SalarioMaximo` , `confidencial` ,`identificacion` , `numidentificacion` , urlvideo FROM usuario_perfil UP INNER JOIN soporte_paises P ON UP.IDPais = P.IDPais LEFT JOIN soporte_paises_departamento PD ON UP.IDDepartamento = PD.IDDepartamento LEFT JOIN soporte_tipo_experiencia TE ON UP.IDAreaExperiencia = TE.IDAreaExperiencia WHERE UP.IDUsuario = ?";
 $stmt5 = $Conexion->ejecutar_consulta_simple_Where($sql5 , $IDUser);
 while ($item=$stmt5->fetch())
 {
  $IDPais = $item['IDPais'];
  $Pais = $item['Pais'];
  $IDDepartamento = $item['IDDepartamento'];
  $Departamento = $item['Departamento'];
  $Educacion = $item['EducacionSecundaria'];
  $Descripcion = $item['Descripcion'];
  $LicenciaConducir = $item['LicenciaConducir'];
  $Vehiculo = $item['Vehiculo'];
  $Manejas = $item['ManejoVehiculo'];
  $CorreoAlternativo = $item['CorreoAlternativo'];
  $Telefono = $item['Telefono'];
  $Celular = $item['Celular'];
  $Discapacitado =$item['Discapacidad'];
  // $TipoDiscapacidad = $item['TipoDiscapacidad'];
  $ExperienciaLaboral = $item['ExperienciaLaboral'];
  $IDAreaExperiencia = $item['IDAreaExperiencia'];
  $NombreExperiencia = $item['Experiencia'];
  $Portafolio = $item['Portafolio'];
  $Disponibilidad = $item['Disponiblidad'];
  $SituacionActual = $item['SituacionActual'];
  $FechaNaciento = $item['FechaNaciento'];
  $edad = $item['edad'];
  $genero = $item['genero'];
  $salarioMinimo = $item['SalarioMinimo'];
  $salarioMaximo = $item['SalarioMaximo'];
  $confidencial = $item['confidencial'];
  $identificacion = $item['identificacion'];
  $numidentificacion = $item['numidentificacion'];
  $direccion = $item['Direccion'];
}



}

$VerificaUsuarioSinPerfil = $Conexion->ejecutar_consulta_conteo("usuario_perfil" , "IDUsuario" , $IDUser);


?>
<title>Candidato | Perfil</title>
<?php 
include_once 'templates/styles.php';
include_once 'templates/MenuRight.php';
include_once 'templates/MenuLeft.php';
include_once 'templates/header.php';
?>

<style type="text/css">
  #imgbanner{

    background: url('../assets/media/photos/photo34@2x.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    height: 200px;
  }
</style>

<main id="main-container">

	<div class="bg-image bg-image-bottom" id="imgbanner" >
    <div>
      <div class="content content-top text-center overflow-hidden">
        <div class="pt-40 pb-20">
          <h3 class="font-size-h2 font-w300 mt-20"  data-toggle="appear" data-class="animated flipInY" id="titulos" style="color: white;">Perfil usuario </h3>
        </div>
      </div>
    </div>
  </div>

  <div class="bg-body-white border-b">
    <div class="content py-5 text-center">
      <nav class="breadcrumb bg-body-white mb-0 barraMenu">
        <a class="breadcrumb-item" href="javascript:void(0)"><b>Perfil</b></a>
        <span class="breadcrumb-item active"><b>Información del usuario</b></span>
      </nav>
    </div>
  </div> 

  <br>


  <div style="margin-right:2%; margin-left:2%;" data-toggle="appear" data-class="animated bounceInLeft">

    <?php if ($VerificaUsuarioSinPerfil == 1 ) {?>
      <br>
      <div class="content py-5 text-center">
        <button class="btn btn-rounded btn-noborder btn-alt-primary mr-5 mb-5" disabled><i class="si si-action-undo fa-2x5"> </i> Retroceder</button>
        <a href="educacion?notificar=1" class="btn btn-rounded btn-noborder btn-alt-primary mr-5 mb-5"> <i class="si si-action-redo fa-2x5"> </i> Siguiente</a>
      </div>
      <br>
    <?php } ?>

    <div class="row gutters-tiny">
      <!-- Basic Info -->
      <div class="col-md-7">
        <?php if ($resultPerfil==1) { ?>
          <form action="Modelos/ModelosPerfil/ActualizarPerfil.php" method="POST">
          <?php }else{ ?>
            <form action="Modelos/ModelosPerfil/NuevoPerfil.php" method="POST">
            <?php } ?>
            <input type="hidden" name="Iduser" value="<?php echo $IDUser; ?>"> 
            <div class="block block-rounded block-themed">
              <div class="block-header bg-gd-primary">

                <div class="block-options">
                  <button type="submit" class="btn btn-sm btn-alt-primary" name="Guardar" id="Guardar">
                    <i class="fa fa-save mr-5"></i><?php if ($resultPerfil ==1) {
                      echo "Actualizar";
                    }else{
                      echo "Guardar";
                    } 
                    ?>
                  </button>             

                </div>
              </div>
              <div class="block-content block-content-full">

               <div class="alert alert-primary alert-dismissible fade show indicaciones text-justify" role="alert">
                <i class="fa fa-info-circle fa-2x5 text-dark"></i>  Indicaciones : Los campos con asterisco (*) son obligatorios y deben ser completados para continuar con el proceso de registro.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <div class="alert alert-primary alert-dismissible fade show indicaciones text-justify" role="alert">
                <i class="fa fa-info-circle fa-2x5 text-dark"></i> Crea tu perfil en la plataforma. Para ello<b style="color:#0B3486;"> deberá completar el formulario. </b> Luego  tendrá que seguir <b style="color:#0B3486;"> ciertos pasos para terminar el proceso.</b> <b style="color: red;">Es requisito</b>.
                
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <div class="form-group row">
                <label class="col-12" for="example-select2">Seleccione su país de origen * </label>
                <div class="col-12" id="pais">
                  <!-- Select2 (.js-select2 class is initialized in Helpers.select2()) -->
                  <!-- For more info and examples you can check out https://github.com/select2/select2 -->
                  <select class="js-select2 form-control" id="example-select2" name="OrigenPais" style="width: 100%;" data-placeholder="Selecciona una opción" required>
                    <?php if ($resultPerfil==1) { ?>
                      <option value="<?php echo$IDPais ?>" ><?php echo$Pais ?></option>
                    <?php }else{ ?>
                     <option></option>
                   <?php } ?>

                   <?php 
                   while ($item=$stmt->fetch())
                   {  
                     if($IDPais == $item['IDPais']){

                     }else{
                      echo "<option value=".$item['IDPais'].">".$item['Nombre']."</option>"; 
                    }

                  }

                  ?>
                </select>
              </div>
            </div>


            <div class="form-group row">
              <div class="col-12">
               <?php if ($resultPerfil==1) { ?>
                <input type="hidden" id="departamentophp" value="<?php echo$IDPais ?>">
                <label class="css-control css-control-primary css-radio">
                  <input type="radio" class="css-control-input" id="DepartamentoActivo"  value="<?php echo$IDDepartamento ?>" name="DepartamentoActivo"  checked>
                  <span class="css-control-indicator"></span> Departamento activo en <?php echo$Departamento; ?>
                </label>
                <br>
                <div id="resultDepartamento"></div>
              <?php }else{ ?>
                <div id="resultDepartamento"></div>
              <?php } ?>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-12">Dirección exacta / opcional</label>

            <div class="col-12">
             <?php if ($resultPerfil==1) { ?> 

               <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="si si-globe fa-2x5"></i>
                  </span>
                </div>
                <input type="text" class="form-control" id="direccionExacta" name="direccionExacta" maxlength="100" placeholder="Digite la Dirección" value=" <?php echo $direccion ?>">
              </div>

            <?php }else{ ?>

              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="si si-globe fa-2x5"></i>
                  </span>
                </div>
                <input type="text" class="form-control" id="direccionExacta" name="direccionExacta"   maxlength="100" placeholder="Digite la Dirección">
              </div>

            <?php } ?>

          </div>
        </div>





        <div class="form-group row">
          <label class="col-12">Edad *</label>
          <div class="col-12"> 
            <?php if ($resultPerfil==1) { ?> 
             <input type="number" class="form-control" name="edad" id="edad" min="18" max="100" value="<?php echo$edad ?>" required>
           <?php }else{ ?>
             <input type="number" class="form-control" name="edad" id="edad" min="18" max="100" required placeholder="edad">
           <?php } ?>

         </div>
       </div>




       <div class="form-group row">
        <label class="col-12">Aspiraciones salariales  /opcional</label>
        <br>
        <label class="col-12">Salario MÍnimo *</label>
        <div class="col-12"> 

         <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">
              $
            </span>
          </div>
          <input type="number" name="salarioMinimo" min="0"  class="form-control" placeholder="rango del salario minimo" value="<?php echo$salarioMinimo ?>">
          <div class="input-group-append">
            <span class="input-group-text">.00</span>
          </div>
        </div>



      </div>
    </div>


    <div class="form-group row">
      <label class="col-12">Salario Máximo *</label>
      <div class="col-12"> 


        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">
              $
            </span>
          </div>
          <input type="number" name="salarioMaximo" min="0"  class="form-control" placeholder="rango del salario maximo" value="<?php echo$salarioMaximo ?>">       
          <div class="input-group-append">
            <span class="input-group-text">.00</span>
          </div>
        </div>


      </div>
    </div>

    <div class="form-group row">
      <label class="col-12">Género*</label>
      <div class="col-lg-12 col-md-12 col-12">
       <?php if ($resultPerfil==1) { 
        if ($genero == "F") {
          ?> 
          <label class="css-control css-control-primary css-radio">
            <input type="radio" class="css-control-input" value="F" id="genero" name="genero" checked required>
            <span class="css-control-indicator"></span> Femenino
          </label>
          <label class="css-control css-control-secondary css-radio">
            <input type="radio" class="css-control-input" Value="M" id="genero" name="genero" required>
            <span class="css-control-indicator"></span> Masculino
          </label>
        <?php }else{ ?>
          <label class="css-control css-control-primary css-radio">
            <input type="radio" class="css-control-input" Value="F" id="genero" name="genero" required>
            <span class="css-control-indicator"></span> Femenino
          </label>
          <label class="css-control css-control-secondary css-radio">
            <input type="radio" class="css-control-input" Value="M" id="genero" name="genero" checked required>
            <span class="css-control-indicator"></span> Masculino
          </label>
        <?php }}else{ ?>
          <label class="css-control css-control-primary css-radio">
            <input type="radio" class="css-control-input" Value="F" id="genero" name="genero" required>
            <span class="css-control-indicator"></span> Femenino
          </label>
          <label class="css-control css-control-secondary css-radio">
            <input type="radio" class="css-control-input "Value="M" id="genero" name="genero" required>
            <span class="css-control-indicator"></span> Masculino
          </label>
        <?php } ?>
      </div>
    </div>


    <div class="form-group row">
      <label class="col-12">Tipo de Currículo* <a href="#"  data-toggle='modal' data-target='#exampleModal' class='js-tooltip-enabled' data-toggle='tooltip' title='' data-original-title='eliminar'>¿Qué significa esto?</a></label>
      <div class="col-12">
       <?php if ($resultPerfil==1) { 
        if ($confidencial == "Publico") {
          ?> 
          <label class="css-control css-control-primary css-radio">
            <input type="radio" class="css-control-input" id="confidencial" value="Publico" name="confidencial"  required checked>
            <span class="css-control-indicator"></span> Publico
          </label>
          <label class="css-control css-control-secondary css-radio">
            <input type="radio" class="css-control-input" id="confidencial" value="Privado" name="confidencial" required>
            <span class="css-control-indicator"></span> Privado
          </label>
        <?php }else{ ?>
         <label class="css-control css-control-primary css-radio">
          <input type="radio" class="css-control-input" id="confidencial" value="Publico" name="confidencial"  required>
          <span class="css-control-indicator"></span> Publico
        </label>
        <label class="css-control css-control-secondary css-radio">
          <input type="radio" class="css-control-input" id="confidencial" value="Privado" name="confidencial" required checked>
          <span class="css-control-indicator"></span> Privado
        </label>
      </label>
    <?php } ?>
  <?php }else{ ?>

    <label class="css-control css-control-primary css-radio">
      <input type="radio" class="css-control-input" id="confidencial" value="Publico" name="confidencial"  required>
      <span class="css-control-indicator"></span> Publico
    </label>
    <label class="css-control css-control-secondary css-radio">
      <input type="radio" class="css-control-input" id="confidencial" value="Privado" name="confidencial" required>
      <span class="css-control-indicator"></span> Privado
    </label>
  <?php } ?>
</div>
</div>


<div class="form-group row">
  <label class="col-12">Descripción breve de tu perfil profesional *</label>
  <div class="col-12">
   <?php if ($resultPerfil==1) { ?> 
     <textarea class="form-control" id="js-ckeditor" name="DescriptionUser" placeholder="Main Description" rows="8" required><?php echo$Descripcion ?></textarea>
   <?php }else{ ?>
     <textarea class="form-control" id="js-ckeditor" name="DescriptionUser" placeholder="Main Description" rows="8" required></textarea>
   <?php } ?>


 </div>
</div>







</div>
</div>




</div>
<!-- END Basic Info -->

<!-- More Options -->
<div class="col-md-5">
  <!-- Status -->
  <div class="block block-rounded block-themed">
    <div class="block-header bg-gd-primary">
      <h3 class="block-title">Información adicional</h3>

    </div>
    <div class="block-content block-content-full">


     <div class="form-group row">
      <label class="col-12">Tipo de identificación</label>
      <div class="col-12">
        <select class='form-control' id="identificacion" name="identificacion" required>
         <?php if ($resultPerfil==1) { ?>

         <?php }else{ ?>
           <option selected value="" disabled>Seleccione una opción</option>
         <?php } ?>
         <option value="Cédula de identidad">Cédula de identidad</option>
         <option value="Cédula de extranjería">Cédula de extranjería</option>
         <option value="Pasaporte">Pasaporte</option>
         <option value="NIF o NIT">NIF o NIT</option>
         <option value="DUI">DUI</option>
       </select>
     </div>
   </div>

   <div class="form-group row">
    <label class="col-12" for="ecom-product-meta-title">N° identificación - Sin guiones</label>
    <div class="col-12">
     <?php if ($resultPerfil==1) { ?>
      <input type="text" class="form-control" id="numidentificacion"  name="numidentificacion" value="<?php echo$numidentificacion ?>" placeholder="N° identificación"  pattern="[0-9]*"  title="Solo números" required> 
    <?php }else{ ?>
      <input type="text" class="form-control" id="numidentificacion"  name="numidentificacion" placeholder="000000000" pattern="[0-9]*"  title="Solo números" required>
    <?php } ?>
  </div>
</div>


<div class="form-group row">
  <label class="col-12">Licencia de conducir *</label>
  <div class="col-12">
    <?php if ($resultPerfil==1) { 
      if ($LicenciaConducir == "Si") {
        ?> 
        <label class="css-control css-control-primary css-radio">
          <input type="radio" class="css-control-input" id="Licencia"  value="Si" name="Licencia"  checked required>
          <span class="css-control-indicator"></span> Si
        </label>
        <label class="css-control css-control-secondary css-radio">
          <input type="radio" class="css-control-input" id="Licencia" Value="No" name="Licencia" required>
          <span class="css-control-indicator"></span> No
        </label>
      <?php } else{ ?>

        <label class="css-control css-control-primary css-radio">
          <input type="radio" class="css-control-input" id="Licencia"  value="Si" name="Licencia" required>
          <span class="css-control-indicator"></span> Si
        </label>
        <label class="css-control css-control-secondary css-radio">
          <input type="radio" class="css-control-input" id="Licencia" Value="No" name="Licencia" checked required>
          <span class="css-control-indicator"></span> No
        </label>
      <?php } ?>

    <?php }else{ ?>
     <label class="css-control css-control-primary css-radio">
      <input type="radio" class="css-control-input" id="Licencia"  value="Si" name="Licencia" required>
      <span class="css-control-indicator"></span> Si
    </label>
    <label class="css-control css-control-secondary css-radio">
      <input type="radio" class="css-control-input" id="Licencia" Value="No" name="Licencia" required>
      <span class="css-control-indicator"></span> No
    </label>

  <?php } ?>


</div>
</div>


<div class="form-group row">
  <label class="col-12">Posees vehículo *</label>
  <div class="col-12">
   <?php if ($resultPerfil==1) { 
    if ($Vehiculo == "Si") {
      ?> 

      <label class="css-control css-control-primary css-radio">
        <input type="radio" class="css-control-input" id="vehículo" value="Si" name="vehículo"  checked required>
        <span class="css-control-indicator"></span> Si
      </label>
      <label class="css-control css-control-secondary css-radio">
        <input type="radio" class="css-control-input" id="vehículo" value="No" name="vehículo" required>
        <span class="css-control-indicator"></span> No
      </label>
    <?php }else{ ?>
      <label class="css-control css-control-primary css-radio">
        <input type="radio" class="css-control-input" id="vehículo" value="Si" name="vehículo"  required>
        <span class="css-control-indicator"></span> Si
      </label>
      <label class="css-control css-control-secondary css-radio">
        <input type="radio" class="css-control-input" id="vehículo" value="No" name="vehículo" checked required>
        <span class="css-control-indicator"></span> No
      </label>
    <?php } ?>
  <?php }else{ ?>

    <label class="css-control css-control-primary css-radio">
      <input type="radio" class="css-control-input" id="vehículo" value="Si" name="vehículo"  required>
      <span class="css-control-indicator"></span> Si
    </label>
    <label class="css-control css-control-secondary css-radio">
      <input type="radio" class="css-control-input" id="vehículo" value="No" name="vehículo" required>
      <span class="css-control-indicator"></span> No
    </label>
  <?php } ?>
</div>
</div>


<div class="form-group row">
  <label class="col-12">El candidato posee conocimientos en manejar algún tipo veihiculo*</label>
  <div class="col-12">
   <select class='form-control' id="Manejo" name="Manejo" required>
     <?php if ($resultPerfil==1) { ?>

     <?php }else{ ?>
       <option selected value="" disabled>Seleccione una opción</option>
     <?php } ?>
     <option value="automóviles">automóviles</option>
     <option value="motocicletas">motocicletas</option>
     <option value="automóviles y Motocicleta">automóviles y Motocicleta</option>
     <option value="vehículos para transporte de personas">vehículos para transporte de personas</option>
     <option value="camiones de carga">camiones de carga</option>
     <option value="vehículos agrícolas">vehículos agrícolas</option>
     <option value="vehículos industriales">vehículos industriales</option>
     <option value="Ninguno">Ninguno</option>

   </select>
 </div>
</div>

<div class="form-group row">
  <label class="col-12" for="ecom-product-meta-title">correo electrónico alternativo /Opcional</label>
  <div class="col-12">
   <?php if ($resultPerfil==1) { ?>
    <input type="text" class="form-control" id="Email"  name="Email" value="<?php echo$CorreoAlternativo ?>" placeholder="email@ejemplo.com"> 
  <?php }else{ ?>
    <input type="text" class="form-control" id="Email"  name="Email" placeholder="email@ejemplo.com">
  <?php } ?>
</div>
</div>


<div class="form-group row">
  <label class="col-12" for="ecom-product-meta-title">Número de Celular + extensión*</label>
  <div class="col-12">
    <?php if ($resultPerfil==1) { ?>
      <input type="text" class="form-control" id="Celular"  name="Celular" value="<?php echo$Celular ?>" required  placeholder="+000 00000000"  pattern="[\(]?[\+]?(\d{2}|\d{3})[\)]?[\s]?((\d{6}|\d{8})|(\d{3}[\*\.\-\s]){3}|(\d{2}[\*\.\-\s]){4}|(\d{4}[\*\.\-\s]){2})|\d{8}|\d{10}|\d{12}" title="+### ########">

    <?php }else{ ?>
      <input type="text" class="form-control" id="Celular"  name="Celular" required placeholder="+000 00000000" pattern="[\(]?[\+]?(\d{2}|\d{3})[\)]?[\s]?((\d{6}|\d{8})|(\d{3}[\*\.\-\s]){3}|(\d{2}[\*\.\-\s]){4}|(\d{4}[\*\.\-\s]){2})|\d{8}|\d{10}|\d{12}" title="+### ########">
    <?php } ?>

  </div>
</div>

<div class="form-group row">
  <label class="col-12" for="ecom-product-meta-title">Número telefónico + extensión /Opcional</label>
  <div class="col-12">
    <?php if ($resultPerfil==1) { ?>
      <input type="text" class="form-control" id="telefono" name="telefono"  value="<?php echo$Telefono ?>" placeholder="+000 00000000"  pattern="[\(]?[\+]?(\d{2}|\d{3})[\)]?[\s]?((\d{6}|\d{8})|(\d{3}[\*\.\-\s]){3}|(\d{2}[\*\.\-\s]){4}|(\d{4}[\*\.\-\s]){2})|\d{8}|\d{10}|\d{12}" title="+### ########"> 
    <?php }else{ ?>
      <input type="text" class="form-control" id="telefono" name="telefono" placeholder="+000 00000000" pattern="[\(]?[\+]?(\d{2}|\d{3})[\)]?[\s]?((\d{6}|\d{8})|(\d{3}[\*\.\-\s]){3}|(\d{2}[\*\.\-\s]){4}|(\d{4}[\*\.\-\s]){2})|\d{8}|\d{10}|\d{12}" title="+### ########">
    <?php } ?>

  </div>
</div>





<div class="form-group row">
  <label class="col-6">Discapacidad*</label>
  <div class="col-6" id="testForm">
   <?php if ($resultPerfil==1) { 
    if ($Discapacitado == "Si") {
      ?>

      <label class="css-control css-control-primary css-radio">
        <input type="radio" class="css-control-input" value="Si" id="Discapacidad" name="Discapacidad"  checked required>
        <span class="css-control-indicator"></span> Si
      </label>
      <label class="css-control css-control-secondary css-radio">
        <input type="radio" class="css-control-input" Value="No" id="Discapacidad2" name="Discapacidad" required>
        <span class="css-control-indicator"></span> No
      </label>
    <?php }else{ ?>


      <label class="css-control css-control-primary css-radio">
        <input type="radio" class="css-control-input" value="Si" id="Discapacidad" name="Discapacidad" required>
        <span class="css-control-indicator"></span> Si
      </label>
      <label class="css-control css-control-secondary css-radio">
        <input type="radio" class="css-control-input" Value="No" id="Discapacidad2" name="Discapacidad" checked required>
        <span class="css-control-indicator"></span> No
      </label>
    <?php }} else{ ?>

      <label class="css-control css-control-primary css-radio">
        <input type="radio" class="css-control-input" value="Si" id="Discapacidad" name="Discapacidad" required>
        <span class="css-control-indicator"></span> Si
      </label>
      <label class="css-control css-control-secondary css-radio">
        <input type="radio" class="css-control-input" Value="No" id="Discapacidad2" name="Discapacidad" required>
        <span class="css-control-indicator"></span> No
      </label>
    <?php } ?>


    <div id="ResultDiscapacitado"></div>

  </div>
</div>

<div class="form-group row">
  <label class="col-6">Experiencia laboral*</label>
  <div class="col-6" >

    <?php if ($resultPerfil==1) { 
      if ($ExperienciaLaboral == "Si") {
        ?>
        <label class="css-control css-control-primary css-radio">
          <input type="radio" class="css-control-input" value="Si" id="ExperienciaUser" name="ExperienciaUser" checked required>
          <span class="css-control-indicator"></span> Si
        </label>
        <label class="css-control css-control-secondary css-radio">
          <input type="radio" class="css-control-input" Value="No" id="ExperienciaUser" name="ExperienciaUser" required>
          <span class="css-control-indicator"></span> No
        </label>
      <?php }else{ ?>
        <label class="css-control css-control-primary css-radio">
          <input type="radio" class="css-control-input" value="Si" id="ExperienciaUser" name="ExperienciaUser" required>
          <span class="css-control-indicator"></span> Si
        </label>
        <label class="css-control css-control-secondary css-radio">
          <input type="radio" class="css-control-input" Value="No" id="ExperienciaUser" name="ExperienciaUser" checked required>
          <span class="css-control-indicator"></span> No
        </label>
      <?php }}else{ ?>

        <label class="css-control css-control-primary css-radio">
          <input type="radio" class="css-control-input" value="Si" id="ExperienciaUser" name="ExperienciaUser" required>
          <span class="css-control-indicator"></span> Si
        </label>
        <label class="css-control css-control-secondary css-radio">
          <input type="radio" class="css-control-input" Value="No" id="ExperienciaUser" name="ExperienciaUser" required>
          <span class="css-control-indicator"></span> No
        </label>
      <?php } ?>
    </div>
  </div>


  <div class="form-group row">
    <label class="col-12" for="ecom-product-meta-title">Años de experiencia laboral*</label>
    <div class="col-12">
      <select class="form-control" id="AreaExperiencia" name="AreaExperiencia" style="width: 100%;" data-placeholder="Selecciona una opción" required>
        <?php if ($resultPerfil==1) { ?> 
          <option selected  value="<?php echo$IDAreaExperiencia ?>"><?php echo$NombreExperiencia ?></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
        <?php }else{ ?>
          <option selected disabled value="">Seleccione una opción</option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
        <?php } ?>
        <?php 
        while ($item=$stmt2->fetch())
        {
          if($IDAreaExperiencia == $item['IDAreaExperiencia']){

          }else{
            echo "<option value=".$item['IDAreaExperiencia'].">".$item['Nombre']."</option>";   
          }

        }

        ?>
      </select>
    </div>
  </div>


  <div class="form-group row">
    <label class="col-12" for="ecom-product-meta-title">Portafolio online /Opcional</label>
    <div class="col-12">
      <?php if ($resultPerfil==1) { ?> 
        <input type="text" class="form-control" id="Portafolio" name="Portafolio"  value="<?php echo$Portafolio ?>" placeholder="http://portafolifio.com">
      <?php }else{ ?>
        <input type="text" class="form-control" id="Portafolio" name="Portafolio" placeholder="http://portafolifio.com">
      <?php } ?>
    </div>
  </div>


  <div class="form-group row">
    <label class="col-12">Disponiblidad de tiempo *</label>
    <div class="col-12">
     <select class='form-control' id="Disponibilidad" name="Disponibilidad" required>
       <?php if ($resultPerfil==1) { ?> 

       <?php }else{ ?>
        <option selected value="" disabled>Seleccione una opción</option>
      <?php } ?>

      <option value="Disponibilidad completa">Disponibilidad completa</option>
          <option value="Medio tiempo">Medio tiempo</option>
          <option value="Temporal">Temporal</option>
          <option value="Freelance">Freelance</option>
          <option value="Pasantía">Pasantía</option>
          <option value="Por horas">Por horas</option>
          <option value="Por proyecto">Por proyecto</option>
          <option value="Por comisión">Por comisión</option>
          <option value="Independiente">Independiente</option>
          <option value="Remoto">Remoto</option>
          <option value="No Disponible">No Disponible</option>
    </select>
  </div>
</div>


<div class="form-group row">
  <label class="col-12">Situación Actual *</label>
  <div class="col-12">
   <select class='form-control' id="SituacionActual" name="SituacionActual" required>
    <?php if ($resultPerfil==1) { ?> 

    <?php }else{ ?>
      <option selected value="" disabled>Seleccione una opción</option>
    <?php } ?>
    <option value="Estudiando">Estudiando </option>
    <option value="Trabajando">Trabajando </option>
    <option value="Estudiando y trabajando">Estudiando y trabajando </option>
    <option value="Pasantía/Práctica">Pasantía/Práctica </option>
    <option value="Voluntariado">Voluntariado </option>
    <option value="Ninguna">Ninguna</option>
  </select>
</div>
</div>

<div class="form-group row">
  <label class="col-12">Educación Secundaria Nivel Alcanzado*</label>
  <div class="col-lg-12 col-md-12 col-12">
   <?php if ($resultPerfil==1) { 
    if ($Educacion == "Completa") {
      ?> 
      <label class="css-control css-control-primary css-radio">
        <input type="radio" class="css-control-input" value="Completa" id="Educacion" name="Educacion" checked required>
        <span class="css-control-indicator"></span> Completa
      </label>
      <label class="css-control css-control-secondary css-radio">
        <input type="radio" class="css-control-input" Value="Incompleta" id="Educacion" name="Educacion" required>
        <span class="css-control-indicator"></span> Incompleta
      </label>
    <?php }else{ ?>
      <label class="css-control css-control-primary css-radio">
        <input type="radio" class="css-control-input" value="Completa" id="Educacion" name="Educacion" required>
        <span class="css-control-indicator"></span> Completa
      </label>
      <label class="css-control css-control-secondary css-radio">
        <input type="radio" class="css-control-input" Value="Incompleta" id="Educacion" name="Educacion" checked required>
        <span class="css-control-indicator"></span> Incompleta
      </label>
    <?php }}else{ ?>
      <label class="css-control css-control-primary css-radio">
        <input type="radio" class="css-control-input" value="Completa" id="Educacion" name="Educacion" required>
        <span class="css-control-indicator"></span> Completa
      </label>
      <label class="css-control css-control-secondary css-radio">
        <input type="radio" class="css-control-input" Value="Incompleta" id="Educacion" name="Educacion" required>
        <span class="css-control-indicator"></span> Incompleta
      </label>
    <?php } ?>
  </div>
</div>

<button type="submit" class="btn  btn-block btn-alt-primary" name="Guardar" id="Guardar">
  <i class="fa fa-save mr-5"></i><?php if ($resultPerfil ==1) {
    echo "Actualizar";
  }else{
    echo "Guardar";
  } 
  ?>
</button>             



</div>
</div>
</form>

<!-- END Status -->


 


</div>
  


    <?php if ($VerificaUsuarioSinPerfil == 1 ) {?>
     
      <div class="content py-5 text-center">
          <br><br>
        <button class="btn btn-rounded btn-noborder btn-alt-primary mr-5 mb-5" disabled><i class="si si-action-undo fa-2x5"> </i> Retroceder</button>
        <a href="educacion?notificar=1" class="btn btn-rounded btn-noborder btn-alt-primary mr-5 mb-5"> <i class="si si-action-redo fa-2x5"> </i> Siguiente</a>
      </div>
      <br>
    <?php } ?>

</main>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tipo de Currículo*</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Público: Cuando tu currículo sea consultado por una empresa esta podrá visualizar todos los datos del mismo.</p>
        <br>
        <p>Privado: Cuando tu currículo sea consultado por una empresa no se podrá visualizar tu nombre y tu actual lugar de trabajo.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
      
    </div>
  </div>
</div>


<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Anexar video Youtube*</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p style="text-align: justify;">Sube un video a youtbe donde explique tus habilidades,pasatiempo, etc</p>
        


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
      
    </div>
  </div>
</div>




<?php 
include_once 'templates/footer.php';
include_once 'templates/script.php';
include_once '../../templates/alertas.php';
?>

<?php if (isset($_GET['notificar'])) {?>
  <!-- Onboarding Modal functionality is initialized in js/pages/be_pages_dashboard.min.js which was auto compiled from _es6/pages/be_pages_dashboard.js -->
  <div class="modal fade" id="modal-onboarding" tabindex="-1" role="dialog" aria-labelledby="modal-onboarding" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-popout" role="document">
      <div class="modal-content rounded">
        <div class="block block-rounded block-transparent mb-0 bg-pattern" style="background-image: url('assets/media/various/bg-pattern-inverse.png');">
          <div class="block-header justify-content-end">
            <div class="block-options">
              <a class="font-w600 text-danger" href="#" data-dismiss="modal" aria-label="Close">
               Salir
             </a>
           </div>
         </div>
         <div class="block-content block-content-full">

           <div class="pb-50">
            <div class="row justify-content-center text-center">
              <div class="col-md-10 col-lg-8">
                <img src="../../assets/recusosMundoEmpleo/logo.png" class="img-fluid" style="height: 100px; width: 250px;"  data-toggle="appear" data-class="animated flipInY">

                <h1 data-toggle="appear"  style="color: #0B3486;" data-class="animated fadeInUp">Indicaciones:</h1>

                <P style="text-align: left;" data-toggle="appear" data-class="animated fadeInUp">Permitir a los reclutadores conocer más acerca de tu trayectoria, principios, habilidades y experiencia a través de tu perfil publicado. Tu perfil es tu carta de presentación y genera confianza en la iniciativa para ser reclutado. <br><br>
                  Completa tu perfil ya que es <b style="color: red;">requisito</b> para tener acceso a la plataforma siguiendo estas instrucciones: 
                </P>
                <ul style="text-align: left; " data-toggle="appear" data-class="animated fadeInUp">
                 <li>1 – Llena los datos de tu perfil profesional. <b style="color: red;">(Obligatorio).</b> </li><br>
                 <li>2- Llena los datos de tus estudios académicos. “Diplomas, Estudios superiores, cursos, etc.”  <b style="color: red;">(Obligatorio).</b>.</li><br>
                 <li>3– Llena los datos de tus experiencias laborales. “pasantías, horas sociales, voluntariado, etc.”  <b style="color: red;">(Obligatorio).</b>.)</li><br>
                 <li>4– Agrega tus habilidades tales como idiomas, habilidades personales <b style="color: red;">(Obligatorio)</b> y las habilidades técnicas es (Opcional).</li><br>
                 Adicionalmente puedes agregar, pero es opcional:<br><br>
                 <li>5- Referencias de trabajos. </li><br>
                 <li>6- Anexar tu hoja de vida en PDF u otro tipo de documento. </li><br>
               </ul>



               <a class="btn  btn-alt-primary " href="#" data-dismiss="modal" aria-label="Close">OK</a>
               




             </div>
           </div>
         </div>



       </div>
     </div>
   </div>
 </div>
</div>
<!-- END Onboarding Modal -->
<?php }  ?>





<script>


  $(document).ready(function(){

    $("#identificacion option[value='<?php echo $identificacion ?>'").attr("selected",true);
    $("#Manejo option[value='<?php echo $Manejas ?>'").attr("selected",true);
    $("#Disponibilidad option[value='<?php echo $Disponibilidad ?>'").attr("selected",true);
    $("#SituacionActual option[value='<?php echo $SituacionActual ?>'").attr("selected",true);  

  });


  $(document).ready(function() {
    var idDepartamento =$('#departamentophp').val();
    var id = parseInt(idDepartamento);

    if (!id == "") {
     buscar_datos(id);
   }

 });

  $(document).ready(function() {
    $('#Discapacidad2').on('click', function() {

     $('input[name=Discapacidad]:checked', '#testForm').val();
     $("#ResultDiscapacitado").html("");       

   });
  });





  $(document).ready(function() {
    $('#pais').on('change', '#example-select2', function() {
      var selected = $('#example-select2 option:selected');
      var value = selected.val();
        //var price = selected.data('price');
        if (value != "") {

         buscar_datos(value);
       }

     })
  });

  $(buscar_datos());

  function buscar_datos(consulta){
    $.ajax({
      url: 'Modelos/ModelosPaises/ModelosBuscarDepartamentos.php' ,
      type: 'POST' ,
      dataType: 'html',
      data: {consulta: consulta},
    })
    .done(function(respuesta){
      $("#resultDepartamento").html(respuesta);
    })
    .fail(function(){
      console.log("error");
    });
  }


  

</script>