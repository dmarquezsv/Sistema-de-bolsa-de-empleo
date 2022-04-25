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



?>
<title>Perfil de empresa | MUNDO EMPLEO CA</title>
<?php 
include_once 'templates/styles.php';
include_once 'templates/MenuRight.php';
include_once 'templates/MenuLeft.php';
include_once 'templates/header.php';
?>

<style type="text/css">

  #imgbanner{

    background: url('../assets/media/photos/inicio_sesion_empresa.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    height:200px;
  }

</style>


<main id="main-container">

 <div class="bg-image bg-image-bottom" id="imgbanner">
  <div class="">
    <div class="content content-top text-center overflow-hidden">
      <div class="pt-40 pb-20">

        <h2 class="h4 font-w400  invisible" id="titulos"  style="color: white;" data-toggle="appear" data-class="animated fadeInUp">Crea el Perfil empresa <?php echo $PrimerNombre[0] ?> ! </h2>
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
          <h3 class="block-title">Información de la empresa </h3>
          
          <div class="block-options">


            <div id="registroFinalizado"></div>
            <div id="registroFinalizado2"></div>
            

          </div>
        </div>
        <div class="block-content block-content-full">
          <p> <?php echo $PrimerNombre[0] ." ". $PrimerApellido[0]; ?>:  <b style="color:#0B3486;">Completa el formulario </b> ya que es requesito para tener acceso a la plataforma. <br>  <b style="color:#0B3486;"> IMPORTANTE: Los campos con asterisco (*) son obligatorios </b> y deben ser completados para continuar con el proceso de registro.</p>


          <div class="form-group row">
            <label class="col-12" for="example-select4">Área de la empresa*  <?php if ($resultPerfil==1) { echo "Si desea cambiar el departamento debe seleccionar el pais de origen"; }?></label>
            <div class="col-12" id="areaempresa">
              <!-- Select2 (.js-select2 class is initialized in Helpers.select2()) -->
              <!-- For more info and examples you can check out https://github.com/select2/select2 -->
              <select class="js-select2 form-control" id="example-select4" name="areaempresa" style="width: 100%;" data-placeholder="Selecciona una opción" required>
                <option></option>

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
          <label class="col-12" for="example-select2">Seleccione su país de origen*  <?php if ($resultPerfil==1) { echo "Si desea cambiar el departamento debe seleccionar el pais de origen"; }?></label>
          <div class="col-12" id="pais">
            <!-- Select2 (.js-select2 class is initialized in Helpers.select2()) -->
            <!-- For more info and examples you can check out https://github.com/select2/select2 -->
            <select class="js-select2 form-control" id="example-select2" name="OrigenPais" style="width: 100%;" data-placeholder="Selecciona una opción" required>
              <option></option>

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

          <div id="resultDepartamento"></div>

        </div>
      </div>

      <div class="form-group row">
        <label class="col-12">Nombre de la empresa *</label>
        <div class="col-12">
         <input type="text" class="form-control" name="nombreempresa"  id="nombreempresa" required placeholder="Por favor, digite el nombre de la empresa">
       </div>
     </div>

     <div class="form-group row">
      <label class="col-12">Razón social *</label>
      <div class="col-12">
       <input type="text" class="form-control" name="razonsocial"  id="razonsocial" required placeholder="Por favor, digite la razón social">
     </div>
   </div>

   <div class="form-group row">
    <label class="col-12">Dirección de la empresa / opcional</label>
    <div class="col-12">
     <input type="text" class="form-control" name="ubicacionEmpresa" id="ubicacionEmpresa"  placeholder="Por favor, digite la dirección de la empresa">

   </div>
 </div>



 <div class="form-group row">
  <label class="col-12">Descripción breve de tu empresa *</label>
  <div class="col-12">

   <textarea class="form-control" id="js-ckeditor" name="DescriptionEmpresa" placeholder="Main Description" rows="8" required></textarea>



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
        <label class="col-12">correo eléctronico de la empresa*</label>
        <div class="col-12">
         <input type="text" class="form-control" name="emailEmpresa" id="emailEmpresa" required placeholder="Por favor, ingrese E-mail de la empresa">
       </div>
     </div>




     <div class="form-group row">
      <label class="col-12">Teléfono directo + extensión  /opcional</label>
      <div class="col-12">
       <input type="text" class="form-control" name="telefono" id="telefono" required  placeholder="+ 000 0000 0000">
     </div>
   </div>

   <div class="form-group row">
    <label class="col-12">Móvil del reclutador + extensión *</label>
    <div class="col-12">
     <input type="text" class="form-control" name="celular" id="celular"   placeholder="+ 000 0000 0000">
   </div>
 </div>



 <div class="form-group row" style="margin-left: 2px;">
  <label class="col-12">Redes sociales /opcional</label>
  <br>
  <label class="col-12"><b>Añade los enlaces correspodientes.</b></label>
  <br>

  <label class="col-12">Facebook</label>
  <input type="text" class="form-control" name="Facebook" id="Facebook"  placeholder="https://www.facebook.com/tu_empresa">
  <label class="col-12">Instagram </label>
  <input type="text" class="form-control" name="Instagram" id="Instagram"  placeholder="https://www.instagram.com/tu_empresa/">
  <label class="col-12">Youtube </label>
  <input type="text" class="form-control" name="youtube" id="youtube" placeholder="https://www.youtube.com/channel/tu_empresa">
  <label class="col-12">whatsapp </label>
  <input type="text" class="form-control" name="whatsapp" id="whatsapp"  placeholder="+000 00000000">


</div>

<div class="form-group row">
  <label class="col12">Página Web de la empresa /opcional</label>
  <div class="col-12">

   <input type="text" class="form-control" name="paginaweb"  id="paginaweb" placeholder="https://www.tuempresa.com">


 </div>
</div>



<div class="form-group row">
  <label class="col-12">Activar Confidencial* 
    <a href="#"  data-toggle='modal' data-target='#exampleModal2' class='js-tooltip-enabled' data-toggle='tooltip' title='' data-original-title='eliminar'>¿Qué significa esto?</a>
  </label>
  <div class="col-12">

    <label class="css-control css-control-primary css-radio">
      <input type="radio" class="css-control-input" id="confidencial1" value="Si" name="confidencial"  required>
      <span class="css-control-indicator"></span> Si
    </label>
    <label class="css-control css-control-secondary css-radio">
      <input type="radio" class="css-control-input" id="confidencial2" value="No" name="confidencial" required>
      <span class="css-control-indicator"></span> No
    </label>

  </div>
</div>

<div id="result"></div>

</div>
</div>
</div>
</div>
</div>

</main>




<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confidencial*</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <p>Los candidatos no podran revisar tu perfil de empresa si tiene activado Confidencial. Caso lo contrario se muestra los siguientes datos</p>
        <ul>
          <li>Pais & Ciudad</li>
          <li>Descripción breve de tu empresa</li>
          <li>Área</li>
          <li>Redes Sociales</li>
          <li>Página Web empresa</li>
        </ul>

        <p>Si tiene activado Confidencial cuando publique una oferta de trabajo tu nombre y logo de empresa no aparece.</p>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
      
    </div>
  </div>
</div>





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

                <P style="text-align: left;" data-toggle="appear" data-class="animated fadeInUp">Completa el formulario que se te muestra a continuación ya que es requesito para tener acceso a las herramientas que brinda la plataforma.</P>



                <ul style="text-align: left; " data-toggle="appear" data-class="animated fadeInUp">
                 <li>1 – Llena los datos de tu empresa <b style="color: red;">(Obligatorio)</b>.</li><br>
                 <li>2 - Una vez completado los datos tu empresa se le notificará a soporte técnico para contactarte y darte una orientación.</li><br>
                 <li>3 – Solo tendrá 10 días hábiles para usar la plataforma.</li><br>
                 <li>4 – Una vez terminado su periodo de prueba. Deberá solicitar el servicio de Mundo Empleo Centroamérica</li><br>
               </ul>




               <p class="text-muted" style="text-align: justify;" data-toggle="appear" data-class="animated fadeInUp">
                 <?php echo $PrimerNombre[0] ." ". $PrimerApellido[0]; ?>: Cualquier tipo de información que esté relacionada con tus datos personales no será compartida ni publicada en esta plataforma. 
               </p>




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

<?php include_once 'templates/footer.php';
include_once 'templates/script.php';
include_once '../../templates/alertas.php';
?>

<script type="text/javascript">
  $(document).ready(function() {

   $("#registroFinalizado").html('<button class="btn btn-sm btn-alt-primary"   id="Guardar" name="Guardar"><i class="fa fa-save mr-5"></i>Guardar</button> ');


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



  $('#registroFinalizado').on('click', function() {

   var AreaEmpresas = $('#example-select4 option:selected');
   var AreaSelecionada = AreaEmpresas.val();
   var Pais = $('#example-select2 option:selected');
   var PaisSelecciona = Pais.val();
   var Departamento = $('#IDDepartemento option:selected');
   var DepartamentoSeleccionado = Departamento.val();
   var nombreEmpresa =$('#nombreempresa').val();
   var ubicacionEmpresa =$('#ubicacionEmpresa').val();
   var descripcion = CKEDITOR.instances['js-ckeditor'].getData();
   var Email =$('#emailEmpresa').val();  
   var telefono = $('#telefono').val();
   var celular= $('#celular').val();
   var facebook= $('#Facebook').val();
   var instagram= $('#Instagram').val();
   var whatsapp= $('#whatsapp').val();
   var youtube= $('#youtube').val();
   var paginaweb= $('#paginaweb').val();
   var confidencial = $('input:radio[name=confidencial]:checked').val();
   var iduser =$('#Iduser').val();
   var razonsocial= $('#razonsocial').val();



   if (AreaSelecionada == ""){
    swal({title:'alerta',text:'Seleccione una actividad de la empresa',type:'error'});
  }else if(PaisSelecciona == ""){
    swal({title:'alerta',text:'Seleccione su pais de origen',type:'error'});
  }else if(DepartamentoSeleccionado == ""){
    swal({title:'alerta',text:'Seleccione su departamento de origen',type:'error'});
  }else if(nombreEmpresa ==""){
    swal({title:'alerta',text:'Ingrese el nombre de la empresa',type:'error'});
  }else if(razonsocial == ""){
    swal({title:'alerta',text:'Ingrese la razon social',type:'error'});
  }
  else if(descripcion ==""){
    swal({title:'alerta',text:'Ingrese descripción de la empresa',type:'error'});
  }else if (Email =="") {
    swal({title:'alerta',text:'Ingrese el E-mail de la empresa',type:'error'});
  }else if(celular ==""){
    swal({title:'alerta',text:'Ingrese el celular del responsable',type:'error'});
  }
  else if(!$("input[name='confidencial']").is(':checked')){
    swal({title:'alerta',text:'Seleccione la opción de confidencial',type:'error'});
  }else{


   $.ajax({
    url: 'Modelos/empresas/crear-perfil-empresa.php' ,
    type: 'POST' ,
    dataType: 'html',
    data: {usuario:'<?php echo $_GET['id']; ?>',areaEmpresa:AreaSelecionada,Pais:PaisSelecciona,Departamento:DepartamentoSeleccionado,NombreEmpresa:nombreEmpresa,ubicacionEmpresa:ubicacionEmpresa,descripcion:descripcion,Email:Email,telefono:telefono,celular:celular,facebook:facebook,instagram:instagram,whatsapp:whatsapp,youtube:youtube,paginaweb:paginaweb,confidencial:confidencial,nombre:"<?php echo $PrimerNombre[0]; ?>",apellido:"<?php echo $PrimerApellido[0]; ?>",email:"<?php echo $_GET['email']; ?>",razonsocial:razonsocial},

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


      $("#registroFinalizado").html('');
      $("#registroFinalizado2").html('<a href="empresas?result=1" class="btn btn-sm btn-alt-primary">Finalizar</a>');

      swal({
        title: "Perfil creado",
        text: "Se le noticara al usuario",
        type: "success",
        confirmButtonText: 'Confirmar',
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          setTimeout("location.href='empresas?result=1'");
        } 

      });







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
    $('#status').text('');


  })



 }


});









</script>
