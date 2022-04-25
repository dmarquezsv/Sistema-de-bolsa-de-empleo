<?php
include_once '../../BD/Conexion.php';
include_once '../../BD/Consultas.php';
include_once '../../main/funcionesApp.php';
include_once 'templates/head.php';
$Conexion = new Consultas();
$FuncionesApp = new funcionesApp();

//Consulta para extraer los paies
$sql = "SELECT * FROM `soporte_paises` ORDER BY `soporte_paises`.`Nombre` ASC ";
$stmt = $Conexion->ejecutar_consulta_simple($sql);

$sql2 = "SELECT * FROM `soporte_tipo_empresa` ORDER BY `soporte_tipo_empresa`.`Area` ASC";
$stmt2 = $Conexion->ejecutar_consulta_simple($sql2);

$resultPerfil = $Conexion->ejecutar_consulta_conteo("empresa_perfil" , "IDUsuario" , $IDUser);

?>
<title>Empresa | Perfil</title>
<?php 
include_once 'templates/styles.php';
include_once 'templates/MenuRight.php';
include_once 'templates/MenuLeft.php';
include_once 'templates/header.php';
?>

<style type="text/css">
  .bg-gd-dusk {
    background: #d262e3;
    background: linear-gradient(135deg,#0B3486,#39899bbf 100%) !important;
  }
</style>

<main id="main-container">

	<div class="bg-image bg-image-bottom" style="background-image: url('../assets/media/photos/photo34@2x.jpg');">
    <div class="bg-primary-dark-op">
      <div class="content content-top text-center overflow-hidden">
        <div class="pt-40 pb-20">
          <center> <img src="../../assets/img/logo/logo2_footer.png" data-toggle="appear" data-class="animated bounceInDown"> </center>
          <h1 class="font-w700 text-white mb-10 invisible" data-toggle="appear" data-class="animated fadeInUp">Mundo Empleo</h1>
          <h2 class="h4 font-w400 text-white-op invisible" data-toggle="appear" data-class="animated fadeInUp">Crear Perfil empresa</h2>
        </div>
      </div>
    </div>
  </div>




  <div style="margin-right:2%; margin-left:2%;" data-toggle="appear" data-class="animated bounceInLeft">
    <div class="row gutters-tiny">
      <!-- Basic Info -->
      <div class="col-md-7">
        <input type="hidden" name="Iduser" id="Iduser" value="<?php echo $IDUser; ?>"> 
        <div class="block block-rounded block-themed">
          <div class="block-header bg-gd-primary">
            <h3 class="block-title">Información del usuario </h3>
             <div id="status"></div>
            <div class="block-options">
              <button class="btn btn-sm btn-alt-primary"   id="Guardar" name="Guardar">
                <i class="fa fa-save mr-5"></i>Guardar
              </button>
              
            </div>
          </div>
          <div class="block-content block-content-full">
            <p> <?php echo $PrimerNombre[0] ." ". $PrimerApellido[0]; ?> Cualquier tipo de información que esté relacionada con tus datos personales no será compartida ni publicada en esta plataforma.Tus datos personales solo seran mostradas con los reclutadores que desean aplicar a una oferta de trabajo y saber de que trata la empresa.</p>

            <p>IMPORTANTE: Los campos con asterisco (*) son obligatorios y deben ser completados para continuar con el proceso de registro.</p>


            <div class="form-group row">
              <label class="col-12" for="example-select4">Actividad de la empresa *  <?php if ($resultPerfil==1) { echo "Si desea cambiar el departamento debe seleccionar el pais de origen"; }?></label>
              <div class="col-12" id="areaempresa">
                <!-- Select2 (.js-select2 class is initialized in Helpers.select2()) -->
                <!-- For more info and examples you can check out https://github.com/select2/select2 -->
                <select class="js-select2 form-control" id="example-select4" name="areaempresa" style="width: 100%;" data-placeholder="Selecciona una opción" required>
                  <?php if ($resultPerfil==1) { ?>
                    <option value="<?php echo$IDPais ?>" ><?php echo$Pais ?></option>
                  <?php }else{ ?>
                   <option></option>
                 <?php } ?>

                 <?php 
                 while ($item=$stmt2->fetch())
                 {
                   echo "<option value=".$item['IDTipoEmpresa'].">".$item['Area']."</option>";
                 }

                 ?>
               </select>
             </div>
           </div>



           <div class="form-group row">
            <label class="col-12" for="example-select2">Seleccione su pais de origen*  <?php if ($resultPerfil==1) { echo "Si desea cambiar el departamento debe seleccionar el pais de origen"; }?></label>
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
                 echo "<option value=".$item['IDPais'].">".$item['Nombre']."</option>";
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

            <div id="resultDepartamento"></div>

          <?php }else{ ?>
            <div id="resultDepartamento"></div>
          <?php } ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-4">Nombre de la empresa *</label>
        <div class="col-8">
         <?php if ($resultPerfil==1) { ?> 
          <input type="text" class="form-control" name="nombreempresa"  id="nombreempresa" value="<?php echo$FechaNaciento ?>" required>
        <?php }else{ ?>
         <input type="text" class="form-control" name="nombreempresa"  id="nombreempresa" required placeholder="Por favor, ingrese el nombre de la empresa">
       <?php } ?>

     </div>
   </div>


   <div class="form-group row">
    <label class="col-4">Ubicación de la empresa*</label>
    <div class="col-8">
     <?php if ($resultPerfil==1) { ?> 
      <input type="text" class="form-control" name="ubicacionEmpresa"  id="ubicacionEmpresa" value="<?php echo$FechaNaciento ?>" required>
    <?php }else{ ?>
     <input type="text" class="form-control" name="ubicacionEmpresa" id="ubicacionEmpresa" required placeholder="Por favor, ingrese la ubicación de la empresa">
   <?php } ?>

 </div>
</div>

<div class="form-group row">
  <label class="col-4">Ubicación por medio de mapa opcional. <a href="#">Haz clic para  más información</a></label>
  <div class="col-8">
   <?php if ($resultPerfil==1) { ?> 
    <input type="text" class="form-control" name="mapaempresa" id="mapaempresa"value="<?php echo$FechaNaciento ?>" required>
  <?php }else{ ?>
   <input type="text" class="form-control" name="mapaempresa" id="mapaempresa"  placeholder="Por favor, ingrese la ubicación  por medio de mapa">
 <?php } ?>

</div>
</div>

<div class="form-group row">
  <label class="col-12">Descripción breve de tu empresa *</label>
  <div class="col-12">
   <?php if ($resultPerfil==1) { ?> 
     <textarea class="form-control" id="js-ckeditor" name="DescriptionEmpresa" placeholder="Main Description" rows="8" required><?php echo$Descripcion ?></textarea>
   <?php }else{ ?>
     <textarea class="form-control" id="js-ckeditor" name="DescriptionEmpresa" placeholder="Main Description" rows="8" required></textarea>
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
        <label class="col-4">Email de la empresa*</label>
        <div class="col-8">
         <?php if ($resultPerfil==1) { ?> 
          <input type="text" class="form-control" name="emailEmpresa" id="emailEmpresa" value="<?php echo$FechaNaciento ?>" required>
        <?php }else{ ?>
         <input type="text" class="form-control" name="emailEmpresa" id="emailEmpresa" required placeholder="Por favor, ingrese E-mail de la empresa">
       <?php } ?>

     </div>
   </div>

   <div class="form-group row">
    <label class="col-4">Codigo Postal*</label>
    <div class="col-8">
     <?php if ($resultPerfil==1) { ?> 
      <input type="text" class="form-control" name="codigopostal" id="codigopostal" value="<?php echo$FechaNaciento ?>" required>
    <?php }else{ ?>
     <input type="text" class="form-control" name="codigopostal" id="codigopostal" required placeholder="Por favor, ingrese el codigo postal">
   <?php } ?>

 </div>
</div>


<div class="form-group row">
  <label class="col-4">Teléfono*</label>
  <div class="col-8">
   <?php if ($resultPerfil==1) { ?> 
    <input type="text" class="form-control" name="telefono" id="telefono" value="<?php echo$FechaNaciento ?>" required>
  <?php }else{ ?>
   <input type="text" class="form-control" name="telefono" id="telefono" required  placeholder="+ 000 0000 0000">
 <?php } ?>

</div>
</div>

<div class="form-group row">
  <label class="col-4">Celular opcional</label>
  <div class="col-8">
   <?php if ($resultPerfil==1) { ?> 
    <input type="text" class="form-control" name="celular"  id="celular" value="<?php echo$FechaNaciento ?>">
  <?php }else{ ?>
   <input type="text" class="form-control" name="celular" id="celular"   placeholder="+ 000 0000 0000">
 <?php } ?>

</div>
</div>



<div class="form-group row" style="margin-left: 2px;">
  <label class="col-4">Redes Sociales opcional</label>
  <br>
  <label class="col-12">Solo deberas poner el nombre de tu fanpage de cada uno. <b>SOLO EL NOMBRE</b></label>
  <br>

  <?php if ($resultPerfil==1) { ?> 
    <input type="text" class="form-control" name="celular" value="<?php echo$FechaNaciento ?>" required>
  <?php }else{ ?>
    <label class="col-12">Facebook</label>
    <input type="text" class="form-control" name="Facebook" id="Facebook"  placeholder="tuempresa">
    <label class="col-12">Instagram </label>
    <input type="text" class="form-control" name="Instagram" id="Instagram"  placeholder="tuempresa">
    <label class="col-12">Youtube </label>
    <input type="text" class="form-control" name="youtube" id="youtube" placeholder="tuempresa">
    <label class="col-12">whatsapp </label>
    <input type="text" class="form-control" name="whatsapp" id="whatsapp"  placeholder="+ 000 0000 0000">

  <?php } ?>

</div>

<div class="form-group row">
  <label class="col-4">Página Web opcional</label>
  <div class="col-8">
   <?php if ($resultPerfil==1) { ?> 
    <input type="text" class="form-control" name="paginaweb" id="paginaweb" value="<?php echo$FechaNaciento ?>" >
  <?php }else{ ?>
   <input type="text" class="form-control" name="paginaweb"  id="paginaweb" placeholder="https://www.tuempresa.com">
 <?php } ?>

</div>
</div>



<div class="form-group row">
  <label class="col-6">Desea poner la empresa en Confidencial*</label>
  <div class="col-6">
   <?php if ($resultPerfil==1) { 
    if ($Vehiculo == "Si") {
      ?> 

      <label class="css-control css-control-primary css-radio">
        <input type="radio" class="css-control-input" id="confidencial" value="Si" name="confidencial"  checked required>
        <span class="css-control-indicator"></span> Si
      </label>
      <label class="css-control css-control-secondary css-radio">
        <input type="radio" class="css-control-input" id="confidencial" value="No" name="confidencial" required>
        <span class="css-control-indicator"></span> No
      </label>
    <?php }else{ ?>
      <label class="css-control css-control-primary css-radio">
        <input type="radio" class="css-control-input" id="confidencial" value="Si" name="confidencial"  required>
        <span class="css-control-indicator"></span> Si
      </label>
      <label class="css-control css-control-secondary css-radio">
        <input type="radio" class="css-control-input" id="confidencial" value="No" name="confidencial" checked required>
        <span class="css-control-indicator"></span> No
      </label>
    <?php } ?>
  <?php }else{ ?>

    <label class="css-control css-control-primary css-radio">
      <input type="radio" class="css-control-input" id="confidencial1" value="Si" name="confidencial"  required>
      <span class="css-control-indicator"></span> Si
    </label>
    <label class="css-control css-control-secondary css-radio">
      <input type="radio" class="css-control-input" id="confidencial2" value="No" name="confidencial" required>
      <span class="css-control-indicator"></span> No
    </label>
  <?php } ?>
</div>
</div>

<div id="result"></div>

</div>
</div>
</div>
</div>
</div>

</main>



<?php include_once 'templates/footer.php';
include_once 'templates/script.php';
include_once '../../templates/alertas.php';
?>

<script type="text/javascript">
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



  $('#Guardar').on('click', function() {

    var AreaEmpresas = $('#example-select4 option:selected');
    var AreaSelecionada = AreaEmpresas.val();
    var Pais = $('#example-select2 option:selected');
    var PaisSelecciona = Pais.val();
    var Departamento = $('#IDDepartemento option:selected');
    var DepartamentoSeleccionado = Departamento.val();
    var nombreEmpresa =$('#nombreempresa').val();
    var ubicacionEmpresa =$('#ubicacionEmpresa').val();
    var mapa =$('#mapaempresa').val();
    var descripcion = CKEDITOR.instances['js-ckeditor'].getData();
    var Email =$('#emailEmpresa').val();
    var codigopostal = $('#codigopostal').val();
    var telefono = $('#telefono').val();
    var celular= $('#celular').val();
    var facebook= $('#Facebook').val();
    var instagram= $('#Instagram').val();
    var whatsapp= $('#whatsapp').val();
    var youtube= $('#youtube').val();
    var paginaweb= $('#paginaweb').val();
    var confidencial = $('input:radio[name=confidencial]:checked').val();
    var iduser =$('#Iduser').val();

    if (AreaSelecionada == ""){
      swal({title:'alerta',text:'Seleccione una actividad de la empresa',type:'error'});
    }else if(PaisSelecciona == ""){
      swal({title:'alerta',text:'Seleccione su pais de origen',type:'error'});
    }else if(DepartamentoSeleccionado == ""){
      swal({title:'alerta',text:'Seleccione su departamento de origen',type:'error'});
    }else if(nombreEmpresa ==""){
      swal({title:'alerta',text:'Ingrese el nombre de la empresa',type:'error'});
    }else if(ubicacionEmpresa ==""){
      swal({title:'alerta',text:'Ingrese la Ubicación de la empresa',type:'error'});
    }else if(descripcion ==""){
      swal({title:'alerta',text:'Ingrese descripción de la empresa',type:'error'});
    }else if (Email =="") {
      swal({title:'alerta',text:'Ingrese el E-mail de la empresa',type:'error'});
    }else if(codigopostal==""){
      swal({title:'alerta',text:'Ingrese el codigo postal',type:'error'});
    }else if(telefono ==""){
      swal({title:'alerta',text:'Ingrese el Teléfono de la empresa',type:'error'});
    }else if(!$("input[name='confidencial']").is(':checked')){
      swal({title:'alerta',text:'Seleccione la opción de confidencial',type:'error'});
    }else{


     $.ajax({
      url: 'Modelos/ModelosEmpresa/crear-perfil-empresa.php' ,
      type: 'POST' ,
      dataType: 'html',
      data: {usuario:"<?php echo $IDUser; ?>",areaEmpresa:AreaSelecionada,Pais:PaisSelecciona,Departamento:DepartamentoSeleccionado,NombreEmpresa:nombreEmpresa,ubicacionEmpresa:ubicacionEmpresa,mapa:mapa,descripcion:descripcion,Email:Email,codigopostal:codigopostal,telefono:telefono,celular:celular,facebook:facebook,instagram:instagram,whatsapp:whatsapp,youtube:youtube,paginaweb:paginaweb,confidencial:confidencial},

      beforeSend: function() {
        $('#status').html('<i class="fa fa-asterisk fa-spin"></i>Procesando el envio');
      }

    })
     .done(function(response){
      $('#result').html(response);
    })
     .fail(function(request, errorType, errorMessage){
      //timeout, error, abort, parseerror
      swal({title:'alerta',text:'Intente de nuevo para procesar el envio',type:'error'});
      console.log(errorType);
      alert(errorMessage);
    })
     .always(function(){
      $('#status').text('');
     

    })



   }


 });









</script>
