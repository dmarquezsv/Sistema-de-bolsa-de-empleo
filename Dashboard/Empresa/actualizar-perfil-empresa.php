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

$sql3= "SELECT TE.IDTipoEmpresa,TE.Area AS 'TipoEmpresa' ,P.IDPais ,P.Nombre AS 'Pais' , PD.IDDepartamento,PD.Nombre AS 'Departamento' , EP.Nombre , `lugar`,`Mapa`,`Descripcion` , `Email` , `CodigoPostal` , `Telefono` ,`Celular` ,`facebook` ,`instagram` ,`whatsapp` ,`youtube` ,`logo` ,`paginaweb` , `Confidencial` , `razonSocial` FROM empresa_perfil EP INNER JOIN soporte_tipo_empresa TE ON EP.IDTipoEmpresa = TE.IDTipoEmpresa LEFT JOIN soporte_paises P ON EP.IDPais = P.IDPais LEFT JOIN soporte_paises_departamento PD ON EP.IDDepartamento = PD.IDDepartamento WHERE IDUsuario = ?";

$stmt3 = $Conexion->ejecutar_consulta_simple_Where($sql3 ,$IDUser);
while ($item=$stmt3->fetch())
{
   $IDTipoEmpresa=$item['IDTipoEmpresa'];//Ya
   $TipoEmpresa = $item['TipoEmpresa'];//YA
   $IDPais = $item['IDPais'];//Ya
   $Pais =  $item['Pais'];//Ya
   $IDDepartamento = $item['IDDepartamento'];//ya
   $Departamento = $item['Departamento'];//ya
   $Nombre = $item['Nombre']; // Ya
   $lugar = $item['lugar'];//ya
   $Mapa = $item['Mapa'];//ya
   $descripcion = $item['Descripcion'];//ya
   $Email = $item['Email'];//ya
   $CodigoPOstal = $item['CodigoPostal'];//Ya
   $Telefono = $item['Telefono'];
   $Celular = $item['Celular'];
   $facebook = $item['facebook'];
   $instagram = $item['instagram'];
   $whatsapp = $item['whatsapp'];
   $youtube = $item['youtube'];
   $paginaweb =   $item['paginaweb'];
   $Confidencial = $item['Confidencial'];
   $razonSocial = $item['razonSocial'];
 }

 

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

    background: url('../assets/media/photos/Area_de_Empresa.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    height: auto;
  }

</style>

<main id="main-container">


  <div class="bg-image bg-image-bottom" id="imgbanner">
    <div class="">
      <div class="content content-top text-center overflow-hidden">
        <div class="pt-40 pb-20">
          <h2 class="h4 font-w400  invisible" id="titulos"  style="color: white;" data-toggle="appear" data-class="animated fadeInUp">Perfil de Empresa  </h2>
        </div>
      </div>
    </div>
  </div>



  <div style="margin-right:2%; margin-left:2%;" data-toggle="appear" data-class="animated bounceInLeft">
    <div class="row gutters-tiny">
      <!-- Basic Info -->
      <div class="col-md-7">
        <form action="Modelos/ModelosEmpresa/actualizar-perfil-empresa.php" method="POST">
          <input type="hidden" name="Iduser" id="Iduser" value="<?php echo$IDUser; ?>"> 
          <div class="block block-rounded block-themed">
            <div class="block-header bg-gd-primary">
              <h3 class="block-title">Información de la empresa </h3>
              <div id="status"></div>
              <div class="block-options">
                <a href="cpanel-visitante" class="btn btn-sm btn-alt-primary">Retroceder</a>
                <button class="btn btn-sm btn-alt-primary"   id="Guardar" name="Guardar">
                  <i class="fa fa-save mr-5"></i>Actualizar
                </button>

              </div>
            </div>
            <div class="block-content block-content-full">
             <p> <?php echo $PrimerNombre[0] ." ". $PrimerApellido[0]; ?>:  <b style="color:#0B3486;">Completa el formulario </b> ya que es requesito para tener acceso a la plataforma. <br>  <b style="color:#0B3486;"> IMPORTANTE: Los campos con asterisco (*) son obligatorios </b> y deben ser completados para continuar con el proceso de registro.</p>


             <div class="form-group row">
              <label class="col-12" for="example-select4">Área de la empresa* </label>
              <div class="col-12" id="areaempresa">
                <!-- Select2 (.js-select2 class is initialized in Helpers.select2()) -->
                <!-- For more info and examples you can check out https://github.com/select2/select2 -->
                <select class="js-select2 form-control" id="example-select4" name="areaempresa" style="width: 100%;" data-placeholder="Selecciona una opción" required>
                  <option value="<?php echo$IDTipoEmpresa; ?>"><?php echo $TipoEmpresa; ?></option>

                  <?php 
                  while ($item=$stmt2->fetch())
                  {
                    if($IDTipoEmpresa == $item['IDTipoEmpresa']){

                    }else{
                      echo "<option value=".$item['IDTipoEmpresa'].">".$item['Area']."</option>";   
                    }


                  }

                  ?>
                </select>
              </div>
            </div>



            <div class="form-group row">
              <label class="col-12" for="example-select2">Seleccione su país de origen* </label>
              <div class="col-12" id="pais">
                <!-- Select2 (.js-select2 class is initialized in Helpers.select2()) -->
                <!-- For more info and examples you can check out https://github.com/select2/select2 -->
                <select class="js-select2 form-control" id="example-select2" name="OrigenPais" style="width: 100%;" data-placeholder="Selecciona una opción" required>
                  <option value="<?php echo$IDPais; ?>"><?php echo $Pais; ?></option>

                  <?php 
                  while ($item=$stmt->fetch())
                  { 
                    if($IDPais == $item['IDPais']){

                    }else
                    {
                      echo "<option value=".$item['IDPais'].">".$item['Nombre']."</option>";
                    }

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
               <input type="text" class="form-control" name="nombreempresa"  id="nombreempresa"  value="<?php echo$Nombre; ?>" required placeholder="Por favor, ingrese el nombre de la empresa">

             </div>
           </div>

           <div class="form-group row">
            <label class="col-12">Razón social *</label>
            <div class="col-12">
              <input type="text" class="form-control" name="razonsocial"  id="razonsocial" required value="<?php echo$razonSocial; ?>" placeholder="Por favor, digite la razón social">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-12">Dirección de la empresa /opcional</label>
            <div class="col-12">

             <input type="text" class="form-control" value="<?php echo$lugar; ?>" name="ubicacionEmpresa" id="ubicacionEmpresa"  placeholder="Por favor, ingrese la ubicación de la empresa">

           </div>
         </div>



         <div class="form-group row">
          <label class="col-12">Descripción breve de tu empresa *</label>
          <div class="col-12">

           <textarea class="form-control" id="js-ckeditor" name="DescriptionEmpresa" placeholder="Main Description" rows="8" required ><?php echo $descripcion; ?></textarea>



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
           <input type="text" class="form-control" name="emailEmpresa" id="emailEmpresa" required placeholder="Por favor, ingrese E-mail de la empresa" value="<?php echo$Email ?>">
         </div>
       </div>





       <div class="form-group row">
        <label class="col-12">Teléfono directo /opcional</label>
        <div class="col-12">
         <input type="text" class="form-control" name="telefono" id="telefono"   placeholder="+ 000 0000 0000" value="<?php echo$Telefono ?>">
       </div>
     </div>

     <div class="form-group row">
      <label class="col-12">Móvil del reclutador*</label>
      <div class="col-12">
       <input type="text" class="form-control" name="celular" id="celular"  required  placeholder="+ 000 0000 0000" value="<?php echo$Celular; ?>">
     </div>
   </div>



   <div class="form-group row" style="margin-left: 2px;">
    <label class="col-12">Redes sociales /opcional</label>
    <br>
    <label class="col-12"><b>Añade los enlaces correspodiente.</b></label>
    <br>

    <label class="col-12">Facebook</label>
    <input type="text" class="form-control" name="Facebook" id="Facebook"  placeholder="https://www.facebook.com/tu_empresa" value="<?php echo$facebook ?>">
    <label class="col-12">Instagram </label>
    <input type="text" class="form-control" name="Instagram" id="Instagram"   placeholder="https://www.instagram.com/tu_empresa/" value="<?php echo$instagram ?>">
    <label class="col-12">Youtube </label>
    <input type="text" class="form-control" name="youtube" id="youtube" placeholder="https://www.youtube.com/channel/tu_empresa" value="<?php echo$youtube ?>">
    <label class="col-12">whatsapp </label>
    <input type="text" class="form-control" name="whatsapp" id="whatsapp"  placeholder="+ 000 0000 0000" value="<?php echo$whatsapp ?>">


  </div>

  <div class="form-group row">
    <label class="col12">Página Web de la empresa /opcional</label>
    <div class="col-12">
     <input type="text" class="form-control" name="paginaweb"  id="paginaweb" placeholder="https://www.tuempresa.com" value="<?php echo$paginaweb ?>"> 
   </div>
 </div>



 <div class="form-group row">
   <label class="col-12">Activar Confidencial* 
    <a href="#"  data-toggle='modal' data-target='#exampleModal2' class='js-tooltip-enabled' data-toggle='tooltip' title='' data-original-title='eliminar'>¿Qué significa esto?</a>
  </label>
  <div class="col-12">
    <?php 
    if ($Confidencial == "Si" ) {

      ?>

      <label class="css-control css-control-primary css-radio">
        <input type="radio" class="css-control-input" id="confidencial1" value="Si" name="confidencial"  required checked>
        <span class="css-control-indicator"></span> Si
      </label>
      <label class="css-control css-control-secondary css-radio">
        <input type="radio" class="css-control-input" id="confidencial2" value="No" name="confidencial" required>
        <span class="css-control-indicator"></span> No
      </label>
    <?php }else{ ?>

      <label class="css-control css-control-primary css-radio">
        <input type="radio" class="css-control-input" id="confidencial1" value="Si" name="confidencial"  required>
        <span class="css-control-indicator"></span> Si
      </label>
      <label class="css-control css-control-secondary css-radio">
        <input type="radio" class="css-control-input" id="confidencial2" value="No" name="confidencial" required checked>
        <span class="css-control-indicator"></span> No
      </label>

    <?php } ?>

  </div>
</div>

<div id="result"></div>

<button class="btn btn-block btn-alt-primary"   id="Guardar" name="Guardar">
  <i class="fa fa-save mr-5"></i>Actualizar
</button>

</div>
</div>
</div>
</div>
</div>

</main>

</form>



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

        <p>Los candidatos no podran revisar tu perfil de empresa si tiene activado Confidencial. Caso  contrario ,se muestra los siguientes datos</p>
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

<?php include_once 'templates/footer.php';
include_once 'templates/script.php';
include_once '../../templates/alertas.php';
?>

<script type="text/javascript">
  $(document).ready(function() {
    var idDepartamento =$('#departamentophp').val();
    var id = parseInt(idDepartamento);

    var capturarPais = $('#example-select2 option:selected');
    var value2 = capturarPais.val();

    buscar_datos(value2);


    if (!id == "") {
     buscar_datos(id);
   }

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
      data: {consulta: consulta ,existeDepartamento : <?php echo$IDDepartamento ?> , nombreDepartamento: '<?php echo$Departamento ?>'},
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
    }else if(celular ==""){
      swal({title:'alerta',text:'Ingrese el celular del responsable',type:'error'});
    }else if(!$("input[name='confidencial']").is(':checked')){
      swal({title:'alerta',text:'Seleccione la opción de confidencial',type:'error'});
    }

  });









</script>
